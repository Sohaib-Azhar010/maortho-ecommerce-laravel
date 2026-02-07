@extends('layouts.admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="fa fa-home"></i>
            </span>
            Dashboard
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active" aria-current="page">
                    <span>Overview</span> <i class="fa fa-info-circle text-primary ms-1"></i>
                </li>
            </ol>
        </nav>
    </div>
    
    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2 text-uppercase small">Categories</h6>
                            <h3 class="mb-0 text-theme">{{ $stats['categories'] }}</h3>
                        </div>
                        <div class="bg-light rounded-circle p-3">
                            <i class="fa fa-list fa-2x text-theme"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.categories.index') }}" class="text-theme text-decoration-none small">
                            View All <i class="fa fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2 text-uppercase small">Products</h6>
                            <h3 class="mb-0 text-theme">{{ $stats['products'] }}</h3>
                            <small class="text-muted">{{ $stats['featured_products'] }} featured</small>
                        </div>
                        <div class="bg-light rounded-circle p-3">
                            <i class="fa fa-box fa-2x text-theme"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.products.index') }}" class="text-theme text-decoration-none small">
                            View All <i class="fa fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2 text-uppercase small">Messages</h6>
                            <h3 class="mb-0 text-theme">{{ $stats['messages'] }}</h3>
                            @if($stats['unread_messages'] > 0)
                                <small class="text-danger fw-bold">{{ $stats['unread_messages'] }} new</small>
                            @else
                                <small class="text-muted">All read</small>
                            @endif
                        </div>
                        <div class="bg-light rounded-circle p-3">
                            <i class="fa fa-envelope fa-2x text-theme"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.messages.index') }}" class="text-theme text-decoration-none small">
                            View All <i class="fa fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2 text-uppercase small">Feedback</h6>
                            <h3 class="mb-0 text-theme">{{ $stats['feedback'] }}</h3>
                        </div>
                        <div class="bg-light rounded-circle p-3">
                            <i class="fa fa-comments fa-2x text-theme"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.feedback.index') }}" class="text-theme text-decoration-none small">
                            View All <i class="fa fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
