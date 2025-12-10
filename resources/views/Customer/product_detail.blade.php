<x-customer-layout>
    <style>
        /* Page-specific overrides only */
        .product-detail {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 48px;
            align-items: start;
            background-color: var(--hitam); /* Changed to Black */
            padding: 30px;
            border-radius: 24px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            margin-top: 32px;
            border: 1px solid #222;
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
            background: #111;
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
            color: var(--putih); /* White text */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0 12px;
        }
        .product-category {
            font-size: 14px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 8px;
        }
        .product-name {
            font-size: 32px;
            font-weight: 900;
            margin-bottom: 12px;
            color: var(--putih);
        }
        .product-price {
            font-size: 24px;
            font-weight: 800;
            color: var(--putih);
            margin-bottom: 20px;
        }
        .product-description {
            font-size: 16px;
            line-height: 1.6;
            color: #CCC; /* Light Gray */
            margin-bottom: 30px;
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
            background-color: var(--pink-tua);
        }

        .product-reviews {
            margin-top: 40px;
            border-top: 1px solid #333;
            padding-top: 24px;
            color: #FFFFFF;
        }
        .product-reviews h2 {
            font-size: 24px;
            font-weight: 700;
            color: var(--putih);
            margin-bottom: 16px;
        }
        .review {
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid #ffffffff;
            color: #ffffffff;
        }
        .review strong {
            color: var(--putih);
            font-weight: 700;
        }
        .review-date {
            font-size: 14px;
            color: #666;
        }
        .review p {
            margin: 8px 0 0;
            line-height: 1.4;
        }

        .qty-control input::-webkit-outer-spin-button,
        .qty-control input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .btn-outline {
            display: inline-block;
            width: 100%;
            background-color: transparent;
            color: var(--putih);
            font-weight: 900;
            padding: 16px 0;
            border-radius: 16px;
            border: 1px solid var(--putih);
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-outline:hover {
            background-color: var(--putih);
            color: var(--hitam);
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

                <div style="margin-bottom: 24px;">
                    <div style="display: flex; gap: 16px; align-items: center; margin-bottom: 16px;">
                        <div class="qty-control" style="display: flex; align-items: center; border: 1px solid #333; padding: 4px; border-radius: 12px; background: #0E0E0E;">
                            <button type="button" id="btn-minus" style="background: transparent; border: none; color: #FFF; width: 32px; height: 32px; font-weight: 700; cursor: pointer;">-</button>
                            <input type="number" id="qty-input" name="quantity" value="1" min="1" style="background: transparent; border: none; color: #FFF; width: 40px; text-align: center; font-weight: 700; -moz-appearance: textfield; font-size: 16px;">
                            <button type="button" id="btn-plus" style="background: transparent; border: none; color: #FFF; width: 32px; height: 32px; font-weight: 700; cursor: pointer;">+</button>
                        </div>
                        <span style="color: #888; font-size: 14px;">Stok Tersedia: {{ $product->stock }}</span>
                    </div>

                    <div style="display: flex; gap: 12px;">
                        <form action="{{ route('cart.store') }}" method="POST" style="flex: 1;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" id="qty-form-input" name="quantity" value="1">
                            <button type="submit" class="btn-outline">MASUKKAN KERANJANG</button>
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

    <footer>
        © {{ date('Y') }} Y2K Accessories — Laravel
    </footer>

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