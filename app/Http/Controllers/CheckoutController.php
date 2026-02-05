<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\PayFastClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function __construct(protected PayFastClient $payFast)
    {
    }

    protected function getCart(Request $request): array
    {
        return $request->session()->get('cart', []);
    }

    public function show(Request $request)
    {
        $cart = $this->getCart($request);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = collect($cart)->sum(fn ($item) => ($item['price'] ?? 0) * ($item['quantity'] ?? 1));

        return view('checkout', [
            'cartItems' => $cart,
            'subtotal' => $subtotal,
        ]);
    }

    public function startPayFast(Request $request)
    {
        $cart = $this->getCart($request);
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = collect($cart)->sum(fn ($item) => ($item['price'] ?? 0) * ($item['quantity'] ?? 1));
        $total = $subtotal; // add shipping / taxes later if needed

        $data = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'customer_mobile' => ['required', 'string', 'max:20'],
            'customer_cnic' => ['nullable', 'string', 'max:30'],
            'billing_address' => ['required', 'string', 'max:500'],
            'billing_city' => ['required', 'string', 'max:255'],
            'billing_country' => ['required', 'string', 'max:255'],
            'billing_postal_code' => ['nullable', 'string', 'max:20'],
            // Bank/account info for PayFast - DO NOT store long term
            'bank_code' => ['required', 'string', 'max:50'],
            'account_number' => ['required', 'string', 'max:50'],
        ]);

        // Create pending order and items
        $orderNumber = 'ORD-' . Str::upper(Str::random(10));

        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_mobile' => $data['customer_mobile'],
            'customer_cnic' => $data['customer_cnic'] ?? null,
            'billing_address' => $data['billing_address'],
            'billing_city' => $data['billing_city'],
            'billing_country' => $data['billing_country'],
            'billing_postal_code' => $data['billing_postal_code'] ?? null,
            'subtotal' => $subtotal,
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'title' => $item['title'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        // Call PayFast Customer Validation to send OTP (account flow)
        $accessToken = $this->payFast->getAccessToken($request->ip());

        $validateResponse = $this->payFast->customerValidate([
            'basket_id' => $order->order_number,
            'txnamt' => $order->total,
            'customer_email_address' => $data['customer_email'],
            'account_type_id' => $this->payFast->accountTypeId(), // e.g. account payment
            'customer_mobile_no' => $data['customer_mobile'],
            'bank_code' => $data['bank_code'],
            'account_number' => $data['account_number'],
            'cnic_number' => $data['customer_cnic'] ?? '',
            'order_date' => now()->format('Y-m-d H:i:s'),
        ], $accessToken, $request->ip());

        if (!($validateResponse['success'] ?? false)) {
            $order->update([
                'status' => 'failed',
                'payfast_status_code' => $validateResponse['code'] ?? null,
                'payfast_status_message' => $validateResponse['message'] ?? null,
                'payfast_meta' => $validateResponse,
            ]);

            return redirect()->route('checkout')->with('error', $validateResponse['message'] ?? 'Unable to initiate payment. Please try again.');
        }

        $order->update([
            'payfast_transaction_id' => $validateResponse['transaction_id'] ?? null,
            'payfast_meta' => array_merge($order->payfast_meta ?? [], [
                'eci' => $validateResponse['eci'] ?? null,
            ]),
        ]);

        // Store sensitive account details only in session for the next step; do not persist
        $request->session()->put("payfast_tmp_{$order->id}", [
            'bank_code' => $data['bank_code'],
            'account_number' => $data['account_number'],
        ]);

        return redirect()->route('checkout.otp', $order);
    }

    public function showOtpForm(Order $order)
    {
        if ($order->status !== 'pending') {
            return redirect()->route('checkout.success', $order);
        }

        return view('checkout-otp', compact('order'));
    }

    public function confirmPayFast(Request $request, Order $order)
    {
        if ($order->status !== 'pending') {
            return redirect()->route('checkout.success', $order);
        }

        $data = $request->validate([
            'otp' => ['required', 'string', 'max:10'],
        ]);

        $sessionKey = "payfast_tmp_{$order->id}";
        $tmp = $request->session()->get($sessionKey);
        if (!$tmp) {
            return redirect()->route('checkout')->with('error', 'Payment session expired, please try again.');
        }

        $accessToken = $this->payFast->getAccessToken($request->ip());

        $transactionResponse = $this->payFast->initiateTransaction([
            'basket_id' => $order->order_number,
            'txnamt' => $order->total,
            'customer_email_address' => $order->customer_email,
            'account_type_id' => $this->payFast->accountTypeId(),
            'customer_mobile_no' => $order->customer_mobile,
            'bank_code' => $tmp['bank_code'],
            'account_number' => $tmp['account_number'],
            'cnic_number' => $order->customer_cnic ?? '',
            'order_date' => now()->format('Y-m-d H:i:s'),
            'otp' => $data['otp'],
            'transaction_id' => $order->payfast_transaction_id,
        ], $accessToken, $request->ip());

        $request->session()->forget($sessionKey);

        $order->update([
            'payfast_status_code' => $transactionResponse['status_code'] ?? null,
            'payfast_status_message' => $transactionResponse['status_msg'] ?? null,
            'payfast_meta' => array_merge($order->payfast_meta ?? [], [
                'transaction_response' => $transactionResponse,
            ]),
        ]);

        if ($transactionResponse['success'] ?? false) {
            $order->update([
                'status' => 'paid',
            ]);
            // Clear cart on successful payment
            $request->session()->forget('cart');

            return redirect()->route('checkout.success', $order);
        }

        $order->update([
            'status' => 'failed',
        ]);

        return redirect()->route('checkout')->with('error', $transactionResponse['status_msg'] ?? 'Payment failed, please try again.');
    }

    public function success(Order $order)
    {
        if (!in_array($order->status, ['paid', 'pending'])) {
            return redirect()->route('home');
        }

        return view('checkout-success', compact('order'));
    }
}
