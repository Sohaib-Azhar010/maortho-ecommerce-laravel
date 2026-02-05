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
<div class="container features-overlap">
    <div class="row">
        <div class="col-md-4">
            <div class="feature-box bg-teal">
                <h3 class="feature-title">Free Shipping</h3>
                <p class="feature-subtitle">Amet sit amet dolor</p>
                <p class="feature-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box bg-green">
                <h3 class="feature-title">Season Sale 50% Off</h3>
                <p class="feature-subtitle">Amet sit amet dolor</p>
                <p class="feature-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box bg-yellow">
                <h3 class="feature-title">Buy A Gift Card</h3>
                <p class="feature-subtitle">Amet sit amet dolor</p>
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

        @if(isset($featuredProducts) && $featuredProducts->count())
            <div class="row">
                @foreach($featuredProducts as $product)
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        <div class="product-card">
                            @if(!is_null($product->sale_price))
                                <span class="badge-sale">SALE</span>
                            @elseif($loop->first)
                                <span class="badge-sale" style="background-color: var(--pharma-teal)">NEW</span>
                            @endif

                            <a href="{{ route('products.show', $product) }}" class="d-block product-image">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                                @else
                                    <img src="https://placehold.co/300x300/f8f9fa/png?text={{ urlencode($product->title) }}" alt="{{ $product->title }}">
                                @endif
                            </a>

                            <h3 class="product-title">
                                <a href="{{ route('products.show', $product) }}">{{ $product->title }}</a>
                            </h3>

                            <p class="product-price">
                                @if(!is_null($product->sale_price))
                                    @if(!is_null($product->price))
                                        <span class="original-price">
                                            PKR {{ number_format($product->price, 2) }}
                                        </span>
                                    @endif
                                    PKR {{ number_format($product->sale_price, 2) }}
                                @elseif(!is_null($product->price))
                                    PKR {{ number_format($product->price, 2) }}
                                @else
                                    <span class="text-muted">Contact for price</span>
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center py-5">
                    <p class="text-muted mb-0">No featured products yet. Mark products as featured in the admin panel to showcase them here.</p>
                </div>
            </div>
        @endif
        
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ route('store') }}" class="btn btn-hero">View All Products</a>
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
                    <p class="price">PKR 120.00</p>
                </div>
             </div>
             <div class="col-lg-6 mb-5 mb-lg-0" style="position: relative;">
                <div class="text-center">
                    <a href="#" class="d-block product-image" style="background: none; height: auto;">
                        <img src="https://placehold.co/300x400/transparent/000?text=Product+2" alt="Image" class="img-fluid" style="max-height: 350px;">
                    </a>
                    <h3 class="text-dark"><a href="#">Cetyl Pure</a></h3>
                    <p class="price">PKR 120.00</p>
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
