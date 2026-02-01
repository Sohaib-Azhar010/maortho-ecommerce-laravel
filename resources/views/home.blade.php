@extends('layouts.shop')

@section('content')

<!-- Hero Section -->
<div class="hero-section text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <span class="hero-subtitle text-uppercase d-block">Premium Orthopedic Equipment & Supports</span>
                <h1 class="hero-title">WELCOME TO MAORTHO</h1>
                <a href="#" class="btn btn-hero">SHOP NOW</a>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="container">
    <div class="row g-0">
        <div class="col-md-4">
            <div class="feature-box bg-teal">
                <div class="feature-icon">
                    <i class="fa fa-truck"></i>
                </div>
                <h3 class="feature-title">Free Shipping</h3>
                <p class="feature-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box bg-green">
                <div class="feature-icon">
                    <i class="fa fa-refresh"></i>
                </div>
                <h3 class="feature-title">Season Sale 50% Off</h3>
                <p class="feature-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box bg-yellow">
                <div class="feature-icon">
                    <i class="fa fa-credit-card"></i>
                </div>
                <h3 class="feature-title">Buy A Gift Card</h3>
                <p class="feature-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
        </div>
    </div>
</div>

<!-- Popular Products -->
<div class="site-section mt-5 pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Popular Products</h2>
            </div>
        </div>
        <div class="row">
            <!-- Product 1 -->
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
                <div class="product-card">
                    <span class="badge-sale">SALE</span>
                    <div class="product-image">
                        <img src="https://placehold.co/300x300/f8f9fa/png?text=Bioderma" alt="Image">
                    </div>
                    <h3 class="product-title"><a href="#">Bioderma</a></h3>
                    <p class="product-price"><span class="original-price">$95.00</span> $55.00</p>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://placehold.co/300x300/f8f9fa/png?text=Chanca+Piedra" alt="Image">
                    </div>
                    <h3 class="product-title"><a href="#">Chanca Piedra</a></h3>
                    <p class="product-price">$70.00</p>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://placehold.co/300x300/f8f9fa/png?text=Umcka+Cold+Care" alt="Image">
                    </div>
                    <h3 class="product-title"><a href="#">Umcka Cold Care</a></h3>
                    <p class="product-price">$120.00</p>
                </div>
            </div>
            <!-- Product 4 -->
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
                <div class="product-card">
                    <div class="product-image">
                        <img src="https://placehold.co/300x300/f8f9fa/png?text=Cetyl+Pure" alt="Image">
                    </div>
                    <h3 class="product-title"><a href="#">Cetyl Pure</a></h3>
                    <p class="product-price"><span class="original-price">$45.00</span> $20.00</p>
                </div>
            </div>
            <!-- Product 5 -->
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
                <div class="product-card">
                    <span class="badge-sale">SALE</span>
                    <div class="product-image">
                        <img src="https://placehold.co/300x300/f8f9fa/png?text=CLA+Core" alt="Image">
                    </div>
                    <h3 class="product-title"><a href="#">CLA Core</a></h3>
                    <p class="product-price">$38.00</p>
                </div>
            </div>
            <!-- Product 6 -->
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
                <div class="product-card">
                    <span class="badge-sale" style="background-color: var(--pharma-teal)">NEW</span>
                    <div class="product-image">
                        <img src="https://placehold.co/300x300/f8f9fa/png?text=Poo+Pourri" alt="Image">
                    </div>
                    <h3 class="product-title"><a href="#">Poo Pourri</a></h3>
                    <p class="product-price">$89.00</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="#" class="btn btn-hero">View All Products</a>
            </div>
        </div>
    </div>
</div>

<!-- Promo Section -->
<div class="site-section bg-secondary bg-image" style="background-image: url('https://placehold.co/1920x600/f1f8e9/f1f8e9'); height: 400px; display: flex; align-items: center; position: relative;">
     <div class="container">
         <div class="row align-items-stretch">
             <!-- Fake separation for design -->
             <div class="col-lg-6 mb-5 mb-lg-0 " style="position: relative;">
                <div class="text-center">
                    <a href="#" class="d-block product-image" style="background: none; height: auto;">
                        <img src="https://placehold.co/300x400/transparent/000?text=Product+1" alt="Image" class="img-fluid" style="max-height: 350px;">
                    </a>
                    <h3 class="text-dark"><a href="#">Umcka Cold Care</a></h3>
                    <p class="price">$120.00</p>
                </div>
             </div>
             <div class="col-lg-6 mb-5 mb-lg-0" style="position: relative;">
                <div class="text-center">
                    <a href="#" class="d-block product-image" style="background: none; height: auto;">
                        <img src="https://placehold.co/300x400/transparent/000?text=Product+2" alt="Image" class="img-fluid" style="max-height: 350px;">
                    </a>
                    <h3 class="text-dark"><a href="#">Cetyl Pure</a></h3>
                    <p class="price">$120.00</p>
                 </div>
             </div>
         </div>
     </div>
</div>

<!-- Testimonials -->
<div class="site-section mt-5 pt-5 pb-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title mb-5">Testimonials</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="testimonial-card bg-white shadow-sm rounded">
                    <img src="https://placehold.co/100x100/e9ecef/777?text=Person1" alt="Image" class="testimonial-avatar">
                    <p class="testimonial-text">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, ipsum! Dolores, distinctio. Quam, nemo, provident.&rdquo;</p>
                    <p class="testimonial-author">&mdash; Kelly Holmes</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="testimonial-card bg-white shadow-sm rounded">
                    <img src="https://placehold.co/100x100/e9ecef/777?text=Person2" alt="Image" class="testimonial-avatar">
                    <p class="testimonial-text">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, ipsum! Dolores, distinctio. Quam, nemo, provident.&rdquo;</p>
                    <p class="testimonial-author">&mdash; Rebecca Morando</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="testimonial-card bg-white shadow-sm rounded">
                    <img src="https://placehold.co/100x100/e9ecef/777?text=Person3" alt="Image" class="testimonial-avatar">
                    <p class="testimonial-text">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, ipsum! Dolores, distinctio. Quam, nemo, provident.&rdquo;</p>
                    <p class="testimonial-author">&mdash; Lucas Gallone</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
