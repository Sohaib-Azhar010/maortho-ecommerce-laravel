@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h5 class="card-title mb-0 d-flex align-items-center text-theme">
                        <i class="fa fa-box me-2"></i> Product Management
                    </h5>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-theme rounded-pill fw-bold shadow-sm">
                        <i class="fa fa-plus me-1"></i> Add Product
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 25%;">Title</th>
                                <th style="width: 15%;">Category</th>
                                <th style="width: 20%;">Price</th>
                                <th style="width: 10%;">Featured</th>
                                <th style="width: 25%;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td><span class="text-muted fw-bold">#{{ $product->id }}</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($product->table_image ?? $product->image)
                                                <div class="me-3" style="width: 40px; height: 40px; overflow: hidden; border-radius: 4px;">
                                                    <img src="{{ asset('storage/' . ($product->table_image ?? $product->image)) }}" alt="{{ $product->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                                </div>
                                            @endif
                                            <div>
                                                <div class="fw-bold text-dark">{{ $product->title }}</div>
                                                @if($product->category)
                                                    <small class="text-muted d-block">{{ $product->category->name }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            {{ optional($product->category)->name ?? 'Uncategorized' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if(!is_null($product->sale_price))
                                            <span class="text-muted text-decoration-line-through me-1">
                                                {{ $product->price !== null ? 'PKR '.number_format($product->price, 2) : '' }}
                                            </span>
                                            <span class="fw-bold text-success">
                                                PKR {{ number_format($product->sale_price, 2) }}
                                            </span>
                                        @elseif(!is_null($product->price))
                                            <span class="fw-bold">
                                                PKR {{ number_format($product->price, 2) }}
                                            </span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->is_featured)
                                            <span class="badge bg-success-subtle text-success border border-success-subtle">
                                                <i class="fa fa-star me-1"></i> Featured
                                            </span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">
                                                <i class="fa fa-minus me-1"></i> No
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-inverse-info btn-icon btn-sm" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-inverse-danger btn-icon btn-sm ms-2" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <i class="fa fa-box-open text-muted fa-3x mb-3"></i>
                                            <h5 class="text-muted">No products found</h5>
                                            <p class="text-muted mb-0">Get started by creating a new product.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($products instanceof \Illuminate\Pagination\AbstractPaginator)
                    <div class="mt-3">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection


