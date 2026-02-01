<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAORTHO</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">MAORTHO</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">STORE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active text-primary' : '' }}" href="{{ route('contact') }}">CONTACT</a>
                    </li>
                </ul>
            </div>
            
            <div class="d-flex align-items-center">
                <a href="#" class="text-dark me-3"><i class="fa fa-search"></i></a>
                <a href="{{ route('cart') }}" class="text-dark icon-bag">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="bag-count">2</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="footer-heading">About Us</h5>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates sed dolorum excepturi iure eaque, aut unde.</p>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5 class="footer-heading">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#">Supplements</a></li>
                        <li><a href="#">Vitamins</a></li>
                        <li><a href="#">Diet Nutrition</a></li>
                        <li><a href="#">Tea & Coffee</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5 class="footer-heading">My Account</h5>
                    <ul class="footer-links">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Order History</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4 col-md-4 mb-4">
                    <h5 class="footer-heading">Contact Info</h5>
                    <ul class="footer-links contact-info">
                        <li>
                            <i class="fa fa-map-marker-alt"></i>
                            <span>203 Fake St. Mountain View, San Francisco, California, USA</span>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <span>+2 392 3929 210</span>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <span>email@yourdomain.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="row mt-5 pt-4 border-top">
                <div class="col-md-12 text-center text-muted">
                    <p>Copyright &copy; 2026 All rights reserved | <a href="#" target="_blank" class="text-primary">MAORTHO</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
