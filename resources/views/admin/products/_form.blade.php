@csrf

<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $product->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Optional description...">{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label d-flex justify-content-between align-items-center">
                <span>Bullet Points (optional)</span>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="addBulletRow()">
                    <i class="fa fa-plus me-1"></i> Add bullet
                </button>
            </label>
            <small class="text-muted d-block mb-2">Add any number of bullet points to highlight key features.</small>
            <div id="bullet-points-wrapper">
                @php
                    $bullets = old('bullet_points', $product->bullet_points ?? []);
                    if (is_string($bullets)) {
                        $bullets = preg_split('/\r\n|\r|\n/', $bullets) ?: [];
                    }
                    if (!is_array($bullets)) {
                        $bullets = [];
                    }
                @endphp
                @forelse($bullets as $index => $bullet)
                    <div class="input-group mb-2 bullet-row">
                        <input type="text" name="bullet_points[]" class="form-control" value="{{ $bullet }}" placeholder="Bullet text">
                        <button type="button" class="btn btn-outline-danger" onclick="removeBulletRow(this)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                @empty
                    <div class="input-group mb-2 bullet-row">
                        <input type="text" name="bullet_points[]" class="form-control" placeholder="Bullet text">
                        <button type="button" class="btn btn-outline-danger" onclick="removeBulletRow(this)">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="">-- Select category (optional) --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? null) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Main Image <span class="text-danger">*</span></label>
            <input type="file" name="image" id="image" class="form-control" {{ isset($product->id) ? '' : 'required' }}>
            @if(!empty($product->image))
                <small class="d-block mt-1">
                    Current: <span class="text-muted">{{ $product->image }}</span>
                </small>
            @endif
            <small class="text-muted">Required main product image.</small>
        </div>

        <div class="mb-3">
            <label for="table_image" class="form-label">Table Image (optional)</label>
            <input type="file" name="table_image" id="table_image" class="form-control">
            @if(!empty($product->table_image))
                <small class="d-block mt-1">
                    Current: <span class="text-muted">{{ $product->table_image }}</span>
                </small>
            @endif
            <small class="text-muted">Optional secondary image for tables or listings.</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Pricing</label>
            <div class="row g-2">
                <div class="col-6">
                    <input type="number" step="0.01" min="0" name="price" class="form-control" placeholder="Price" value="{{ old('price', $product->price ?? '') }}">
                </div>
                <div class="col-6">
                    <input type="number" step="0.01" min="0" name="sale_price" class="form-control" placeholder="Sale price" value="{{ old('sale_price', $product->sale_price ?? '') }}">
                </div>
            </div>
            <small class="text-muted d-block mt-1">
                If sale price is set (and less than or equal to price), original price will be shown with a cut and sale price highlighted.
            </small>
        </div>

        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" role="switch" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_featured">Featured product (show under Popular Products)</label>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@push('scripts')
    <script>
        function addBulletRow() {
            const wrapper = document.getElementById('bullet-points-wrapper');
            const div = document.createElement('div');
            div.className = 'input-group mb-2 bullet-row';
            div.innerHTML = `
                <input type="text" name="bullet_points[]" class="form-control" placeholder="Bullet text">
                <button type="button" class="btn btn-outline-danger" onclick="removeBulletRow(this)">
                    <i class="fa fa-trash"></i>
                </button>
            `;
            wrapper.appendChild(div);
        }

        function removeBulletRow(button) {
            const row = button.closest('.bullet-row');
            if (row) {
                const wrapper = document.getElementById('bullet-points-wrapper');
                if (wrapper.querySelectorAll('.bullet-row').length > 1) {
                    row.remove();
                } else {
                    row.querySelector('input').value = '';
                }
            }
        }
    </script>
@endpush


