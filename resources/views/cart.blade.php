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
                <form id="cart-form" class="col-md-12" method="post" action="{{ route('cart.update') }}">
                    @csrf
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
                                @forelse($cartItems as $productId => $item)
                                    <tr data-price="{{ $item['price'] }}" data-row-total="{{ $item['price'] * $item['quantity'] }}">
                                        <td class="product-thumbnail">
                                            @if(!empty($item['image']))
                                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['title'] }}" class="img-fluid">
                                            @else
                                                <img src="https://placehold.co/150x150" alt="{{ $item['title'] }}" class="img-fluid">
                                            @endif
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $item['title'] }}</h2>
                                        </td>
                                        <td>PKR {{ number_format($item['price'], 2) }}</td>
                                        <td>
                                            <div class="input-group mb-3 mx-auto" style="max-width: 120px;">
                                                <input type="number"
                                                       name="quantities[{{ $productId }}]"
                                                       class="form-control text-center cart-qty"
                                                       min="0"
                                                       value="{{ $item['quantity'] }}">
                                            </div>
                                        </td>
                                        <td data-row-total-display>PKR {{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm cart-remove-btn" type="button" data-product-id="{{ $productId }}">X</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5">
                                            <p class="text-muted mb-0">Your cart is empty.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-6 pl-5">
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
                                        <div class="col-md-6 text-right" data-cart-subtotal>
                                            <strong class="text-black">PKR {{ number_format($subtotal, 2) }}</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                        <div class="col-md-6 text-right" data-cart-total>
                                            <strong class="text-black">PKR {{ number_format($subtotal, 2) }}</strong>
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
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('cart-form');
            if (!form) return;

            const qtyInputs = form.querySelectorAll('.cart-qty');

            const getRowTotals = () => {
                let subtotal = 0;
                form.querySelectorAll('tr[data-price]').forEach(row => {
                    const total = parseFloat(row.dataset.rowTotal || '0');
                    subtotal += total;
                });
                return subtotal;
            };

            const getTotalQuantity = () => {
                let totalQty = 0;
                form.querySelectorAll('.cart-qty').forEach(input => {
                    const v = parseInt(input.value, 10);
                    if (!isNaN(v) && v > 0) totalQty += v;
                });
                return totalQty;
            };

            const formatPKR = (amount) => 'PKR ' + amount.toFixed(2);

            const updateSummary = () => {
                const subtotal = getRowTotals();
                const subtotalEl = document.querySelector('[data-cart-subtotal] strong');
                const totalEl = document.querySelector('[data-cart-total] strong');
                if (subtotalEl) subtotalEl.textContent = formatPKR(subtotal);
                if (totalEl) totalEl.textContent = formatPKR(subtotal);

                const bagCountEl = document.querySelector('.bag-count');
                if (bagCountEl) {
                    bagCountEl.textContent = getTotalQuantity();
                }
            };

            const recalcRow = (input) => {
                const row = input.closest('tr[data-price]');
                if (!row) return;
                const price = parseFloat(row.dataset.price || '0');
                let qty = parseInt(input.value, 10);
                if (isNaN(qty) || qty < 0) qty = 0;
                input.value = qty;
                const rowTotal = price * qty;
                row.dataset.rowTotal = rowTotal;
                const totalCell = row.querySelector('[data-row-total-display]');
                if (totalCell) totalCell.textContent = formatPKR(rowTotal);
            };

            let debounceTimer;
            const syncServer = () => {
                const fd = new FormData(form);
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: fd,
                }).catch(() => {
                    // Silent fail; session update is best-effort
                });
            };

            qtyInputs.forEach(input => {
                input.addEventListener('input', () => {
                    recalcRow(input);
                    updateSummary();
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(syncServer, 300);
                });
            });

            form.querySelectorAll('.cart-remove-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (!confirm('Remove this item from cart?')) return;
                    const productId = btn.dataset.productId;
                    const row = btn.closest('tr[data-price]');
                    if (row) {
                        row.remove();
                    }
                    // add hidden input to set quantity 0
                    const hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = `quantities[${productId}]`;
                    hidden.value = '0';
                    form.appendChild(hidden);

                    updateSummary();
                    syncServer();
                });
            });

            // Initial summary fix
            updateSummary();
        });
    </script>
@endpush
