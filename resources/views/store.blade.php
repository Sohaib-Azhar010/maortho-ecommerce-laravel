@extends('layouts.shop')

@section('content')
<div class="site-section mt-5 pt-5 pb-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="store-filter-bar d-flex flex-wrap">
                    <a href="{{ route('store') }}"
                       class="store-filter-item {{ $activeCategory ? '' : 'active' }}">
                        All
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('store', ['category' => $category->id]) }}"
                           class="store-filter-item {{ $activeCategory && $activeCategory->id === $category->id ? 'active' : '' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        @if($products->count())
            <div class="row">
                @foreach($products as $product)
                    <div class="col-sm-6 col-lg-4 text-center item mb-4">
                        <div class="product-card position-relative">
                            @if(!is_null($product->sale_price))
                                <span class="badge-sale">SALE</span>
                            @endif

                            <a href="{{ route('products.show', $product) }}" class="d-block product-image">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                                @else
                                    <img src="https://placehold.co/300x300/f8f9fa/png?text={{ urlencode($product->title) }}" alt="{{ $product->title }}">
                                @endif
                            </a>

                            @php
                                $waNumber = config('services.whatsapp.number');
                                $productUrl = route('products.show', $product);
                                $waText = rawurlencode("Hi, I have a question about {$product->title} ({$productUrl})");
                            @endphp
                            @if($waNumber)
                                <a href="https://wa.me/{{ $waNumber }}?text={{ $waText }}"
                                   target="_blank"
                                   class="product-whatsapp-btn">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            @endif

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

            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center py-5">
                    <p class="text-muted mb-0">No products available in the store yet.</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection



