@extends('layouts.shop')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}" class="breadcrumb-link">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong>
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
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="post" class="p-5 border rounded">
                        @csrf
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('c_fname') is-invalid @enderror" id="c_fname" name="c_fname" value="{{ old('c_fname') }}" required>
                                @error('c_fname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('c_lname') is-invalid @enderror" id="c_lname" name="c_lname" value="{{ old('c_lname') }}" required>
                                @error('c_lname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('c_email') is-invalid @enderror" id="c_email" name="c_email" value="{{ old('c_email') }}" placeholder="" required>
                                @error('c_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <label for="c_subject" class="text-black">Subject </label>
                                <input type="text" class="form-control @error('c_subject') is-invalid @enderror" id="c_subject" name="c_subject" value="{{ old('c_subject') }}">
                                @error('c_subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-12">
                                <label for="c_message" class="text-black">Message </label>
                                <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control @error('c_message') is-invalid @enderror">{{ old('c_message') }}</textarea>
                                @error('c_message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
