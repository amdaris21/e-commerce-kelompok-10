<x-customer-layout>

<style>
    :root{
        --bg: #FDFBF7;
        --panel: #FFFFFF;
        --panel2: #F3F1ED;
        --garis: #E6E4DF;
        --garis2: #D1D1D1;
        --teks: #1A1A1A;
        --muted: #666666;
        --muted2: #888888;
        --putih: #FFFFFF;
        --hitam: #000000;
        --pink_tua: #d26b6bff;
        --pink: #f0bbbbff
    }

    *{
        box-sizing: border-box;
    }
    html, body {
        height: 100%;
        margin: 0;
        background: var(--bg);
        color: var(--teks);
        font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    }

    .container {
        max-width: 1120px;
        margin: 0 auto;
        padding: 0 20px 40px;
    }

    header {
        position: sticky;
        top: 0;
        z-index: 50;
        background: var(--bg);
        border-bottom: 1px solid var(--garis);
    }

    .header-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        padding: 12px 0;
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: var(--teks);
    }
    .brand-logo {
        width: 38px;
        height: 38px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        background: var(--putih);
        color: var(--hitam);
        font-weight: 900;
        letter-spacing: 0.5px;
    }
    .brand-name {
        font-weight: 900;
        line-height: 1.1;
    }
    .brand-tag {
        font-size: 12px;
        color: var(--muted2);
        margin-top: 2px;
    }
    
    @media (min-width: 768px) {
        .search { display: block; }
    }

    .auth a {
        font-weight: 700;
        font-size: 14px;
        padding: 10px 18px;
        border-radius: 24px;
        text-decoration: none;
        transition: background-color 0.25s ease;
    }
    .auth .btn-outline {
        border: 1px solid var(--garis);
        background: var(--panel);
        color: var(--teks);
        margin-right: 10px;
    }
    .auth .btn-outline:hover {
        background: var(--panel2);
    }
    .auth .btn-solid {
        background: var(--putih);
        color: var(--hitam);
    }
    .auth .btn-solid:hover {
        background: #EEE;
    }

    main.container {
        margin-top: 32px;
    }

    /* Updated to match Cream/Black Theme */
    .product-detail {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 48px;
        align-items: start;
        background-color: var(--hitam); /* Change to Black */
        padding: 40px;
        border-radius: 24px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        color: var(--putih); /* Default text white in this box */
    }
    @media (max-width: 768px) {
        .product-detail {
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 24px;
        }
    }

    .product-photo {
        border-radius: 18px;
        overflow: hidden;
        /* box-shadow: 0 8px 24px rgba(0,0,0,0.85); */
        background: #111;
        border: 1px solid #333;
    }
    .product-photo img {
        width: 100%;
        height: auto;
        object-fit: cover;
        transition: transform 0.4s ease;
        display: block;
    }
    .product-photo img:hover {
        transform: scale(1.05);
    }

    .product-body {
        color: var(--putih);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 0;
    }
    .product-category {
        font-size: 13px;
        color: #888;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 12px;
        font-weight: 600;
    }
    .product-name {
        font-size: 38px;
        font-weight: 900;
        margin-bottom: 16px;
        color: var(--putih);
        line-height: 1.1;
    }
    .product-price {
        font-size: 28px;
        font-weight: 800;
        color: var(--putih);
        margin-bottom: 24px;
        letter-spacing: -0.5px;
    }
    .product-description {
        font-size: 16px;
        line-height: 1.7;
        color: #ccc;
        margin-bottom: 36px;
    }

    .btn-full {
        display: inline-block;
        width: 100%;
        background-color: var(--pink);
        color: var(--hitam);
        font-weight: 800;
        padding: 18px 0;
        border-radius: 14px;
        border: none;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        transition: all 0.2s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 16px;
    }
    .btn-full:hover {
        background-color: var(--pink_tua);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(240, 187, 187, 0.4);
    }

    .btn-dark-outline {
        background-color: transparent;
        border: 2px solid var(--putih);
        color: var(--putih);
    }
    .btn-dark-outline:hover {
        background-color: var(--putih);
        color: var(--hitam);
        box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
    }

    .product-reviews {
        grid-column: 1 / -1; /* Make reviews span full width if inside grid, or margin top */
        margin-top: 60px;
        border-top: 1px solid #333;
        padding-top: 40px;
    }

    .product-reviews h2 {
        font-size: 20px;
        font-weight: 800;
        color: var(--putih);
        margin-bottom: 24px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .review {
        margin-bottom: 24px;
        padding-bottom: 24px;
        border-bottom: 1px solid #222;
        color: #bbb;
    }
    .review:last-child {
        border-bottom: none;
    }

    .review strong {
        color: var(--putih);
        font-weight: 700;
        font-size: 15px;
        margin-right: 8px;
    }

    .review-date {
        font-size: 12px;
        color: #666;
    }

    .review p {
        margin: 8px 0 0;
        line-height: 1.5;
        font-size: 14px;
    }


    footer {
        border-top: 1px solid var(--garis);
        padding: 24px;
        text-align: center;
        color: var(--muted2);
        font-size: 13px;
        margin-top: 48px;
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
            @auth
                <a class="btn-outline" href="{{ route('profile.edit') }}">Profile</a>
            @else
                <a href="{{ route('login') }}" class="btn-outline">Log in</a>
                <a href="{{ route('register') }}" class="btn-solid">Register</a>
            @endauth
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
            
            <div class="product-actions" style="display: flex; gap: 12px;">
                <form action="{{ route('cart.store') }}" method="POST" style="flex: 1;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn-full btn-dark-outline">
                        Masukkan Keranjang
                    </button>
                </form>
                
                <a href="{{ route('transaction.show', $product->id) }}" class="btn-full" style="flex: 1;">
                    Checkout
                </a>
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

</x-customer-layout>