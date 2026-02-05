<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected function getCart(Request $request): array
    {
        return $request->session()->get('cart', []);
    }

    protected function saveCart(Request $request, array $cart): void
    {
        $request->session()->put('cart', $cart);
    }

    public function index(Request $request)
    {
        $cart = $this->getCart($request);

        $subtotal = collect($cart)->sum(function ($item) {
            return ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
        });

        return view('cart', [
            'cartItems' => $cart,
            'subtotal' => $subtotal,
        ]);
    }

    public function add(Request $request, Product $product)
    {
        $cart = $this->getCart($request);

        $qty = max(1, (int) $request->input('quantity', 1));

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $qty;
        } else {
            $cart[$product->id] = [
                'title' => $product->title,
                'price' => $product->sale_price ?? $product->price,
                'quantity' => $qty,
                'image' => $product->image,
            ];
        }

        $this->saveCart($request, $cart);

        return redirect()->route('cart')->with('success', 'Product added to cart.');
    }

    public function update(Request $request)
    {
        $cart = $this->getCart($request);

        // Single-item removal from cart via update form
        if ($request->filled('remove')) {
            $removeId = (int) $request->input('remove');
            unset($cart[$removeId]);
            $this->saveCart($request, $cart);

            return redirect()->route('cart')->with('success', 'Product removed from cart.');
        }

        $quantities = $request->input('quantities', []);

        foreach ($quantities as $productId => $qty) {
            if (!isset($cart[$productId])) {
                continue;
            }

            $qty = (int) $qty;
            if ($qty <= 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['quantity'] = $qty;
            }
        }

        $this->saveCart($request, $cart);

        return redirect()->route('cart')->with('success', 'Cart updated.');
    }

    public function remove(Request $request, Product $product)
    {
        $cart = $this->getCart($request);

        unset($cart[$product->id]);

        $this->saveCart($request, $cart);

        return redirect()->route('cart')->with('success', 'Product removed from cart.');
    }
}
