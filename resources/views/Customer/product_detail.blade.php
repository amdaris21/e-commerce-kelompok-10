<x-customer-layout>

<style>
    :root {
         --pink_tua: #d26b6bff;
         --pink: #f0bbbbff;
    }

    main.container {
        margin-top: 32px;
    }

    .product-detail {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 48px;
        align-items: start;
        background-color: #0E0E0E; /* Force Black Box on Pink Global BG */
        padding: 30px;
        border-radius: 24px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.5);
        border: 1px solid #222;
        color: #FFFFFF;
    }
    @media (max-width: 768px) {
        .product-detail {
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 20px;
        }
    }

    .product-photo {
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0,0,0,0.85);
        background: #0E0E0E;
    }
    .product-photo img {
        width: 100%;
        height: auto;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .product-photo img:hover {
        transform: scale(1.05);
    }

    .product-body {
        padding: 0 12px;
    }
    .product-category {
        font-size: 14px;
        color: #AAA;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 8px;
    }
    .product-name {
        font-size: 32px;
        font-weight: 900;
        margin-bottom: 12px;
        color: #FFFFFF;
    }
    .product-price {
        font-size: 24px;
        font-weight: 800;
        color: #FFFFFF;
        margin-bottom: 20px;
    }
    .product-description {
        font-size: 16px;
        line-height: 1.6;
        color: #CCCCCC;
        margin-bottom: 30px;
    }

    .qty-wrapper {
        margin-bottom: 24px;
    }
    .qty-row {
        display: flex; 
        gap: 16px; 
        align-items: center; 
        margin-bottom: 16px;
    }
    .qty-control {
        display: flex;
        align-items: center;
        border: 1px solid #333;
        padding: 4px;
        border-radius: 12px;
        background: #1A1A1A;
    }
    .qty-btn {
        background: transparent;
        border: none;
        color: #FFF;
        width: 32px;
        height: 32px;
        font-weight: 700;
        cursor: pointer;
        display: grid;
        place-items: center;
        transition: 0.2s;
    }
    .qty-btn:hover {
        color: var(--pink-accent);
        background: rgba(255,255,255,0.05);
        border-radius: 8px;
    }
    .qty-input {
        background: transparent;
        border: none;
        color: #FFF;
        width: 40px;
        text-align: center;
        font-weight: 700;
        font-size: 16px;
        /* Hide Default Spinners */
        -moz-appearance: textfield;
    }
    .qty-input::-webkit-outer-spin-button,
    .qty-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .qty-stock {
        color: #888;
        font-size: 14px;
    }

    .action-row {
        display: flex;
        gap: 12px;
    }
    .btn-add-cart {
        width: 100%;
        padding: 16px 0;
        border-radius: 16px;
        border: 1px solid #FFF;
        background: transparent;
        color: #FFF;
        font-weight: 900;
        cursor: pointer;
        transition: 0.3s;
    }
    .btn-add-cart:hover {
        background: #FFF;
        color: #000;
    }

    .btn-full {
        display: inline-block;
        width: 100%;
        background-color: var(--pink);
        color: var(--hitam);
        font-weight: 900;
        padding: 16px 0;
        border-radius: 16px;
        border: none;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    .btn-full:hover {
        background-color: var(--pink_tua);
    }

    .product-reviews {
        margin-top: 40px;
        border-top: 1px solid #333;
        padding-top: 24px;
    }
    .product-reviews h2 {
        font-size: 24px;
        font-weight: 700;
        color: #FFFFFF;
        margin-bottom: 16px;
    }
    .review {
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid #222;
        color: #CCC;
    }
    .review strong {
        color: #FFF;
        font-weight: 700;
    }
    .review-date {
        font-size: 14px;
        color: #888;
    }
    .review p {
        margin: 8px 0 0;
        line-height: 1.4;
    }
</style>

<main class="container">
    <div class="product-detail">
        <div class="product-photo">
            @if($product->thumbnail && $product->thumbnail->image)
            <img src="{{ asset('storage/' . $product->thumbnail->image) }}" alt="{{ $product->name }}">
            @else
            <img src="{{ asset('images/default-product.png') }}" alt="Default product image">
            @endif
        </div>
        <div class="product-body">
            <div class="product-category">
                {{ optional($product->category)->name ?? 'Uncategorized' }}
            </div>
            <h1 class="product-name">{{ $product->name }}</h1>
            <div class="product-price">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </div>
            <div class="product-description">
                {{ $product->about }}
            </div>

            <!-- Quantity & Actions -->
            <div class="qty-wrapper">
                <div class="qty-row">
                    <div class="qty-control">
                        <button type="button" id="btn-minus" class="qty-btn">-</button>
                        <input type="number" id="qty-input" class="qty-input" name="quantity" value="1" min="1">
                        <button type="button" id="btn-plus" class="qty-btn">+</button>
                    </div>
                    <span class="qty-stock">Stok Tersedia: {{ $product->stock }}</span>
                </div>

                <div class="action-row">
                    <form action="{{ route('cart.store') }}" method="POST" style="flex: 1;">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" id="qty-form-input" name="quantity" value="1">
                        <button type="submit" class="btn-add-cart">MASUKKAN KERANJANG</button>
                    </form>
                    
                    <a href="#" onclick="event.preventDefault(); document.getElementById('checkout-form').submit();" class="btn-full" style="flex: 1;">CHECKOUT</a>
                    
                    <form id="checkout-form" action="{{ route('transaction.show', $product->id) }}" method="GET" style="display: none;">
                        <input type="hidden" id="qty-checkout-input" name="quantity" value="1">
                    </form>
                </div>
            </div>
        </div>

        <div class="product-reviews">
            <h2>Ulasan Produk ({{ $product->productReviews->count() }})</h2>

            @forelse ($product->productReviews as $review)
                <div class="review">
                    <strong>{{ $review->user->name }}</strong> 
                    <span class="review-date"> - {{ $review->created_at->format('d M Y') }}</span>
                    <p>{{ $review->comment }}</p>
                </div>
            @empty
                <p>Belum ada ulasan untuk produk ini.</p>
            @endforelse
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnMinus = document.getElementById('btn-minus');
        const btnPlus = document.getElementById('btn-plus');
        const qtyInput = document.getElementById('qty-input');
        const qtyFormInput = document.getElementById('qty-form-input');
        const qtyCheckoutInput = document.getElementById('qty-checkout-input');
        const maxStock = {{ $product->stock }};

        function updateHiddenInputs(val) {
            if (qtyFormInput) qtyFormInput.value = val;
            if (qtyCheckoutInput) qtyCheckoutInput.value = val;
        }

        btnMinus.addEventListener('click', () => {
            let val = parseInt(qtyInput.value) || 1;
            if(val > 1) {
                val = val - 1;
                qtyInput.value = val;
                updateHiddenInputs(val);
            }
        });

        btnPlus.addEventListener('click', () => {
            let val = parseInt(qtyInput.value) || 1;
            if(val < maxStock) {
                val = val + 1;
                qtyInput.value = val;
                updateHiddenInputs(val);
            }
        });

        qtyInput.addEventListener('change', function() {
            let val = parseInt(this.value) || 1;
            if (val < 1) val = 1;
            if (val > maxStock) val = maxStock;
            this.value = val;
            updateHiddenInputs(val);
        });
    });
</script>
</x-customer-layout>