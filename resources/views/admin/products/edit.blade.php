@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h5 class="card-title mb-0 d-flex align-items-center text-theme">
                        <i class="fa fa-edit me-2"></i> Edit Product
                    </h5>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-arrow-left me-1"></i> Back to list
                    </a>
                </div>

                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @include('admin.products._form', ['product' => $product])

                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-theme px-4">
                            <i class="fa fa-save me-1"></i> Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


