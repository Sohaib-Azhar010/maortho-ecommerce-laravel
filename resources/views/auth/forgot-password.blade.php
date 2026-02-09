@extends('layouts.shop')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 fw-bold">Reset Password</h2>
                    <p class="text-muted text-center mb-4">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.</p>

                    @if (session('status'))
                        <div class="alert alert-success mb-4 text-center">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">Email Password Reset Link</button>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('login') }}" class="text-primary small">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
