@extends('layouts.shop')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Get In Touch Section -->
    <div class="site-section bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-5 text-black">Get In Touch</h2>
                </div>
                <div class="col-md-12">
                    <form action="#" method="post" class="p-5 border rounded">
                        @csrf
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" name="c_fname" required>
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_lname" name="c_lname" required>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="c_email" name="c_email" placeholder="" required>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <label for="c_subject" class="text-black">Subject </label>
                                <input type="text" class="form-control" id="c_subject" name="c_subject">
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12">
                                <label for="c_message" class="text-black">Message </label>
                                <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block w-100 py-3 text-uppercase fw-bold" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Offices Section -->
    <div class="site-section bg-turquoise py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-5 text-white">Offices</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <h3 class="h5 text-black text-uppercase fw-bold mb-3">New York</h3>
                        <p class="text-muted mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <h3 class="h5 text-black text-uppercase fw-bold mb-3">London</h3>
                        <p class="text-muted mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <h3 class="h5 text-black text-uppercase fw-bold mb-3">Canada</h3>
                        <p class="text-muted mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
