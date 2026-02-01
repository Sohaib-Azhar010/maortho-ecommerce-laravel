@extends('layouts.shop')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section py-5">
        <div class="container">
            <!-- Returning Customer Alert -->
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="border p-4 rounded bg-light" role="alert">
                        Returning customer? <a href="#" class="text-teal">Click here</a> to login
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border bg-white">
                        <div class="form-group mb-4">
                            <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                            <select id="c_country" class="form-control">
                                <option value="1">Select a country</option>
                                <option value="2">Pakistan</option>
                                <option value="3">USA</option>
                                <option value="4">UK</option>
                                <option value="5">China</option>
                            </select>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" name="c_fname">
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_lname" name="c_lname">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="c_companyname" class="text-black">Company Name </label>
                            <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                        </div>

                        <div class="form-group mb-4">
                            <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-3" id="c_address" name="c_address" placeholder="Street address">
                            <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-6">
                                <label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_state_country" name="c_state_country">
                            </div>
                            <div class="col-md-6">
                                <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-6">
                                <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                            </div>
                            <div class="col-md-6">
                                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="c_create_account" class="text-black" data-bs-toggle="collapse" href="#create_an_account" aria-expanded="false" aria-controls="create_an_account">
                                <input type="checkbox" name="c_create_account" value="1" id="c_create_account"> Create an account?
                            </label>
                        </div>

                        <div class="form-group mb-4">
                            <label for="c_ship_different_address" class="text-black" data-bs-toggle="collapse" href="#ship_different_address" aria-expanded="false" aria-controls="ship_different_address">
                                <input type="checkbox" name="c_ship_different_address" value="1" id="c_ship_different_address"> Ship To A Different Address?
                            </label>
                        </div>

                        <div class="form-group mb-4">
                            <label for="c_order_notes" class="text-black">Order Notes</label>
                            <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                            <div class="p-3 p-lg-5 border bg-white">
                                <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                                <div class="input-group w-75 couponcode-wrap">
                                    <input type="text" class="form-control py-3" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm py-3 px-4" type="button" id="button-addon2">APPLY</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border bg-white">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bioderma <strong class="mx-2">x</strong> 1</td>
                                            <td>$55.00</td>
                                        </tr>
                                        <tr>
                                            <td>Ibuprofen <strong class="mx-2">x</strong> 1</td>
                                            <td>$45.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                            <td class="text-black font-weight-bold">$350.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                            <td class="text-black font-weight-bold"><strong>$350.00</strong></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Payment Methods -->
                                <div class="border mb-3 rounded">
                                    <h3 class="h6 mb-0 py-3 px-4"><a class="d-block text-teal" data-bs-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>
                                    <div class="collapse" id="collapsebank">
                                        <div class="py-2 px-4">
                                            <p class="mb-0 text-muted">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border mb-3 rounded">
                                    <h3 class="h6 mb-0 py-3 px-4"><a class="d-block text-teal" data-bs-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>
                                    <div class="collapse" id="collapsecheque">
                                        <div class="py-2 px-4">
                                            <p class="mb-0 text-muted">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border mb-5 rounded">
                                    <h3 class="h6 mb-0 py-3 px-4"><a class="d-block text-teal" data-bs-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>
                                    <div class="collapse" id="collapsepaypal">
                                        <div class="py-2 px-4">
                                            <p class="mb-0 text-muted">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg py-3 btn-block w-100 text-uppercase fw-bold" onclick="window.location='{{ url('/') }}'">Place Order</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
