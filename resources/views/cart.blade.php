@extends('layouts.shop')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Table Section -->
    <div class="site-section py-5">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="https://via.placeholder.com/150" alt="Ibuprofen" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">Ibuprofen</h2>
                                    </td>
                                    <td>$55.00</td>
                                    <td>
                                        <div class="input-group mb-3 mx-auto" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                            </div>
                                            <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$49.00</td>
                                    <td><a href="#" class="btn btn-primary btn-sm">X</a></td>
                                </tr>

                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="https://via.placeholder.com/150" alt="Bioderma" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">Bioderma</h2>
                                    </td>
                                    <td>$49.00</td>
                                    <td>
                                        <div class="input-group mb-3 mx-auto" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                            </div>
                                            <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$49.00</td>
                                    <td><a href="#" class="btn btn-primary btn-sm">X</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <!-- Update Cart / Continue Shopping -->
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <button class="btn btn-primary btn-sm btn-block w-100 py-3 text-uppercase fw-bold">Update Cart</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-outline-primary btn-sm btn-block w-100 py-3 text-uppercase fw-bold">Continue Shopping</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Coupon</label>
                            <p>Enter your coupon code if you have one.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-md w-100 py-3">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">$230.00</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">$230.00</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg py-3 btn-block w-100 text-uppercase fw-bold">Proceed To Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Promo Section -->
    <div class="site-section bg-turquoise py-5">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="promo-card p-5 h-100 bg-white rounded shadow-sm d-flex align-items-center" style="background-image: url('https://via.placeholder.com/600x400'); background-size: cover; background-position: center;">
                        <div class="promo-text-content p-4" style="background: rgba(255,255,255,0.8); border-radius: 10px;">
                            <h2 class="h3 text-black text-uppercase fw-bold mb-3">Pharma Products</h2>
                            <p class="text-muted pb-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates sed dolorum excepturi rem odio voluptatem.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="promo-card p-5 h-100 bg-white rounded shadow-sm d-flex align-items-center" style="background-image: url('https://via.placeholder.com/600x400'); background-size: cover; background-position: center;">
                        <div class="promo-text-content p-4" style="background: rgba(255,255,255,0.8); border-radius: 10px;">
                            <h2 class="h3 text-black text-uppercase fw-bold mb-3">Rated By Experts</h2>
                            <p class="text-muted pb-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates sed dolorum excepturi rem odio voluptatem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
