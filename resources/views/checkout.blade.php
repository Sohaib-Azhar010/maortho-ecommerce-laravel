@extends('layouts.shop')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}" class="breadcrumb-link">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <form class="p-3 p-lg-5 border bg-white" method="POST" action="{{ route('checkout.payfast') }}">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group mb-4">
                            <label for="customer_name" class="text-black">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="customer_email" class="text-black">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="customer_email" name="customer_email" value="{{ old('customer_email') }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="customer_mobile" class="text-black">Mobile Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="customer_mobile" name="customer_mobile" value="{{ old('customer_mobile') }}" placeholder="92-3XXXXXXXXX" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="customer_cnic" class="text-black">CNIC (optional)</label>
                            <input type="text" class="form-control" id="customer_cnic" name="customer_cnic" value="{{ old('customer_cnic') }}" placeholder="12345-1234567-1">
                        </div>

                        <div class="form-group mb-4">
                            <label for="billing_address" class="text-black">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-3" id="billing_address" name="billing_address" placeholder="Street address" value="{{ old('billing_address') }}" required>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-6">
                                <label for="billing_city" class="text-black">City <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="billing_city" name="billing_city" value="{{ old('billing_city') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="billing_country" class="text-black">Country <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="billing_country" name="billing_country" value="{{ old('billing_country', 'Pakistan') }}" required>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="billing_postal_code" class="text-black">Postal / Zip</label>
                            <input type="text" class="form-control" id="billing_postal_code" name="billing_postal_code" value="{{ old('billing_postal_code') }}">
                        </div>

                        <hr class="my-4">

                        <h2 class="h5 mb-3 text-black">Payment Details (Bank Account)</h2>

                        <div class="form-group mb-4">
                            <label for="bank_code" class="text-black">Bank Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="bank_code" name="bank_code" value="{{ old('bank_code') }}" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="account_number" class="text-black">Account Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="account_number" name="account_number" value="{{ old('account_number') }}" required>
                        </div>

                        <button type="submit" class="btn btn-hero btn-square btn-lg w-100 mt-3 text-uppercase fw-bold">
                            Proceed to PayFast
                        </button>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border bg-white">
                                <table class="table site-block-order-table mb-4">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartItems as $productId => $item)
                                            <tr>
                                                <td>
                                                    {{ $item['title'] }}
                                                    <strong class="mx-2">x</strong> {{ $item['quantity'] }}
                                                </td>
                                                <td>PKR {{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                            <td class="text-black font-weight-bold">PKR {{ number_format($subtotal, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                            <td class="text-black font-weight-bold"><strong>PKR {{ number_format($subtotal, 2) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p class="text-muted small mb-0">
                                    Your payment will be processed securely via PayFast. We do not store your card or account details on our servers.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
