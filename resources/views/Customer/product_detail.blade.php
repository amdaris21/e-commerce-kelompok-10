<x-customer-layout>

    <style>
        .product-detail {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 48px;
            align-items: start;
            background-color: var(--panel);
            padding: 30px;
            border-radius: 24px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.7);
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
            color: var(--teks);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0 12px;
        }
        .product-category {
            font-size: 14px;
            color: var(--muted);
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
            color: #FFFFFF;
            margin-bottom: 20px;
        }
        .product-description {
            font-size: 16px;
            line-height: 1.6;
            color: var(--muted2);
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
            background-color: var(--pink_tua);
        }

        .product-reviews {
        margin-top: 40px;
        border-top: 1px solid var(--garis);
        padding-top: 24px;
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
            border-bottom: 1px solid var(--garis2);
            color: var(--muted2);
        }

        .review strong {
            color: var(--putih);
            font-weight: 700;
        }

        .review-date {
            font-size: 14px;
            color: var(--muted);
        }

        .review p {
            margin: 8px 0 0;
            line-height: 1.4;
        }
    </style>

    <header>
        <div class="container header-bar">
            <a class="brand" href="{{ route('customer.home') }}">
                <div class="brand-logo">Y2K</div>
                <div>
                    <div class="brand-name">Y2K Accessories</div>
                    <div class="brand-tag">ring • necklace • bracelet • charms</div>
                </div>
            </a>

        <div class="auth">
            <a href="{{ route('login') }}" class="btn-outline">Log in</a>
            <a href="{{ route('register') }}" class="btn-solid">Register</a>
        </div>
    </div>
</header>

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
            <a href="{{ route('transaction.show', $product->id) }}" class="btn-full">Checkout</a>
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

</x-app-layout>