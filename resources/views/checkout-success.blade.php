@extends('layouts.shop')

@section('content')
<div class="site-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="border p-4 bg-white rounded shadow-sm text-center">
                    <h2 class="h3 mb-3 text-black">Thank you for your order!</h2>
                    <p class="mb-2">Your order <strong>{{ $order->order_number }}</strong> has been
                        <span class="text-success fw-bold">{{ $order->status === 'paid' ? 'paid' : 'placed' }}</span>.
                    </p>
                    <p class="mb-4">We’ve sent a confirmation email to <strong>{{ $order->customer_email }}</strong>.</p>

                    <div class="mb-4">
                        <h5 class="text-black">Order Summary</h5>
                        <ul class="list-unstyled mb-0">
                            @foreach($order->items as $item)
                                <li class="d-flex justify-content-between">
                                    <span>{{ $item->title }} × {{ $item->quantity }}</span>
                                    <span>PKR {{ number_format($item->subtotal, 2) }}</span>
                                </li>
                            @endforeach
                            <li class="d-flex justify-content-between border-top pt-2 mt-2">
                                <strong>Total</strong>
                                <strong>PKR {{ number_format($order->total, 2) }}</strong>
                            </li>
                        </ul>
                    </div>

                    <a href="{{ route('store') }}" class="btn btn-hero btn-square px-4 py-2 mt-2">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


