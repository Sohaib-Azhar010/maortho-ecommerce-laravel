@extends('layouts.shop')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">About Us</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="site-section bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <h2 class="h3 mb-4 text-black">About MAORTHO</h2>
                    <p class="lead text-muted">
                        Your trusted partner for premium orthopedic equipment and supports, dedicated to improving your quality of life through innovative medical solutions.
                    </p>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6 mb-4">
                    <h3 class="h4 text-black mb-3">Who We Are</h3>
                    <p class="text-muted">
                        MAORTHO is a leading provider of orthopedic products and medical supports, specializing in high-quality equipment designed to aid in recovery, provide comfort, and enhance mobility. We understand that orthopedic care is essential for maintaining an active and healthy lifestyle, and we are committed to offering products that meet the highest standards of quality and effectiveness.
                    </p>
                </div>
                <div class="col-md-6 mb-4">
                    <h3 class="h4 text-black mb-3">Our Mission</h3>
                    <p class="text-muted">
                        Our mission is to provide accessible, high-quality orthopedic solutions that help individuals recover from injuries, manage chronic conditions, and maintain optimal musculoskeletal health. We believe everyone deserves access to premium orthopedic care products that can significantly improve their daily lives.
                    </p>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <h3 class="h4 text-black mb-4">What We Offer</h3>
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="feature-box-about text-center p-4 bg-light rounded">
                                <i class="fa fa-bone fa-3x text-teal mb-3"></i>
                                <h5 class="text-black mb-3">Orthopedic Supports</h5>
                                <p class="text-muted mb-0">
                                    Comprehensive range of braces, supports, and orthopedic devices for joints, back, neck, and limbs.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="feature-box-about text-center p-4 bg-light rounded">
                                <i class="fa fa-heartbeat fa-3x text-teal mb-3"></i>
                                <h5 class="text-black mb-3">Recovery Equipment</h5>
                                <p class="text-muted mb-0">
                                    Specialized equipment designed to aid in post-surgical recovery and rehabilitation processes.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="feature-box-about text-center p-4 bg-light rounded">
                                <i class="fa fa-shield-alt fa-3x text-teal mb-3"></i>
                                <h5 class="text-black mb-3">Quality Assurance</h5>
                                <p class="text-muted mb-0">
                                    All our products meet international quality standards and are sourced from trusted manufacturers.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <h3 class="h4 text-black mb-4">Why Choose MAORTHO?</h3>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-check-circle text-teal me-3 mt-1"></i>
                                <div>
                                    <h6 class="text-black mb-2">Premium Quality Products</h6>
                                    <p class="text-muted mb-0">We carefully select only the finest orthopedic products that have been tested and proven effective.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-check-circle text-teal me-3 mt-1"></i>
                                <div>
                                    <h6 class="text-black mb-2">Expert Guidance</h6>
                                    <p class="text-muted mb-0">Our team is knowledgeable about orthopedic products and can help you find the right solution.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-check-circle text-teal me-3 mt-1"></i>
                                <div>
                                    <h6 class="text-black mb-2">Wide Range of Products</h6>
                                    <p class="text-muted mb-0">From knee braces to back supports, we offer a comprehensive selection of orthopedic equipment.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-check-circle text-teal me-3 mt-1"></i>
                                <div>
                                    <h6 class="text-black mb-2">Customer Care</h6>
                                    <p class="text-muted mb-0">We prioritize your satisfaction and are committed to providing excellent customer service.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="bg-light p-4 rounded">
                        <h3 class="h4 text-black mb-3">Our Commitment</h3>
                        <p class="text-muted mb-0">
                            At MAORTHO, we are dedicated to helping you achieve better orthopedic health. Whether you're recovering from an injury, managing a chronic condition, or looking to prevent future issues, we have the products and expertise to support your journey. We understand that every individual's needs are unique, and we're here to help you find the perfect orthopedic solution.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

