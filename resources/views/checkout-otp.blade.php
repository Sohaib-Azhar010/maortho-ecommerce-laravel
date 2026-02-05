@extends('layouts.shop')

@section('content')
<div class="site-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="border p-4 bg-white rounded shadow-sm">
                    <h2 class="h4 mb-3 text-black text-center">Verify Payment</h2>
                    <p class="text-muted text-center mb-4">
                        An OTP has been sent to your registered mobile number. Please enter it below to confirm your payment for
                        <strong>{{ $order->order_number }}</strong>.
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('checkout.otp.confirm', $order) }}">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="otp" class="text-black">OTP Code</label>
                            <input type="text" id="otp" name="otp" class="form-control text-center" maxlength="10" required>
                        </div>

                        <button type="submit" class="btn btn-hero btn-square btn-lg w-100 text-uppercase fw-bold">
                            Confirm Payment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


