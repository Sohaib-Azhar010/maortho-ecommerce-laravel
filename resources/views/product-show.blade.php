@extends('layouts.shop')

@section('content')
<div class="site-section mt-5 pt-5 pb-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent px-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('store') }}">Store</a></li>
                        @if($product->category)
                            <li class="breadcrumb-item">
                                <a href="{{ route('store', ['category' => $product->category_id]) }}">
                                    {{ $product->category->name }}
                                </a>
                            </li>
                        @endif
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <a href="{{ asset('storage/' . $product->image) }}" target="_blank" class="d-block product-detail-image-wrapper mb-4">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="img-fluid product-detail-image">
                </a>

                @if($product->table_image)
                    <div class="product-table-image-wrapper text-center">
                        <a href="{{ asset('storage/' . $product->table_image) }}" target="_blank" class="d-inline-block w-100 h-100">
                            <img src="{{ asset('storage/' . $product->table_image) }}" alt="{{ $product->title }} table image" class="product-table-image">
                        </a>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <h1 class="h3 mb-3">{{ $product->title }}</h1>

                @if($product->category)
                    <p class="mb-2 text-muted">
                        Category:
                        <a href="{{ route('store', ['category' => $product->category_id]) }}" class="text-teal text-decoration-none">
                            {{ $product->category->name }}
                        </a>
                    </p>
                @endif

                <div class="mb-3">
                    @if(!is_null($product->sale_price))
                        @if(!is_null($product->price))
                            <span class="original-price d-inline-block me-2">
                                PKR {{ number_format($product->price, 2) }}
                            </span>
                        @endif
                        <span class="product-detail-price">
                            PKR {{ number_format($product->sale_price, 2) }}
                        </span>
                    @elseif(!is_null($product->price))
                        <span class="product-detail-price">
                            PKR {{ number_format($product->price, 2) }}
                        </span>
                    @else
                        <span class="text-muted">Contact for price</span>
                    @endif
                </div>

                @if($product->description)
                    <p class="mb-4 text-muted">{{ $product->description }}</p>
                @endif

                @if(is_array($product->bullet_points) && count($product->bullet_points))
                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted mb-2" style="letter-spacing: 1px;">Key Features</h6>
                        <ul class="list-unstyled product-detail-bullets">
                            @foreach($product->bullet_points as $bullet)
                                <li>
                                    <span class="bullet-dot"></span>
                                    <span>{{ $bullet }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="d-flex flex-wrap gap-2 mb-4">
                    <a href="{{ route('cart') }}" class="btn btn-hero px-4 py-2">Add to Cart</a>
                    <a href="{{ route('store') }}" class="btn btn-outline-dark px-4 py-2">Back to Store</a>
                </div>
            </div>
        </div>

        @if($relatedProducts->count())
            <div class="row mt-5 pt-4">
                <div class="col-12">
                    <h3 class="h5 mb-4">You may also like</h3>
                </div>
                @foreach($relatedProducts as $related)
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        <div class="product-card">
                            <a href="{{ route('products.show', $related) }}" class="d-block product-image">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}">
                                @else
                                    <img src="https://placehold.co/300x300/f8f9fa/png?text={{ urlencode($related->title) }}" alt="{{ $related->title }}">
                                @endif
                            </a>
                            <h3 class="product-title">
                                <a href="{{ route('products.show', $related) }}">{{ $related->title }}</a>
                            </h3>
                            <p class="product-price">
                                @if(!is_null($related->sale_price))
                                    @if(!is_null($related->price))
                                        <span class="original-price">
                                            PKR {{ number_format($related->price, 2) }}
                                        </span>
                                    @endif
                                    PKR {{ number_format($related->sale_price, 2) }}
                                @elseif(!is_null($related->price))
                                    PKR {{ number_format($related->price, 2) }}
                                @else
                                    <span class="text-muted">Contact for price</span>
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection


