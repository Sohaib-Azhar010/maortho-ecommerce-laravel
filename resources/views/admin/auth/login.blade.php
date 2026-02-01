<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - MAORTHO</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex align-items-center justify-content-center vh-100 bg-light">
        <div class="row w-100">
            <div class="col-md-4 mx-auto">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-theme mb-2">MAORTHO</h2>
                            <h5 class="text-muted fw-light">Admin Dashboard</h5>
                        </div>
                        
                        <h6 class="fw-light mb-4 text-center">Sign in to continue.</h6>
                        
                        <form class="pt-3" method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="email" class="form-label text-muted small fw-bold">Email Address</label>
                                <input type="email" name="email" class="form-control form-control-lg bg-light border-0" id="email" placeholder="Email Address" value="{{ old('email') }}" required style="font-size: 0.9rem;">
                                @error('email')
                                    <div class="text-danger mt-1 small"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="form-label text-muted small fw-bold">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control form-control-lg bg-light border-0" id="password" placeholder="Password" required style="font-size: 0.9rem;">
                                    <button class="btn btn-light border-0 password-toggle" type="button" id="togglePassword">
                                        <i class="bi bi-eye-slash text-muted" id="eyeIcon"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn btn-theme btn-lg fw-bold shadow-sm py-3 text-uppercase" style="font-size: 0.9rem; letter-spacing: 1px;">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-4 text-muted small">
                    &copy; 2026 MAORTHO Dashboard
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye / eye slash icon
            if(type === 'password'){
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        });
    </script>
</body>
</html>
