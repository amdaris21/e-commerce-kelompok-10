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
    }

    *{ box-sizing: border-box; }
    html,body{ height: 100%; }
    body{
        margin: 0;
        background: var(--bg);
        color: var(--teks);
        font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
    }

    .container{
        max-width: 1120px;
        margin: 0 auto;
        padding: 0 16px;
    }

    header{
        position: sticky;
        top: 0;
        z-index: 50;
        background: var(--bg);
        border-bottom: 1px solid var(--garis);
    }

    .header-bar{
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        padding: 12px 0;
    }

    .brand{
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: inherit;
    }
    .brand-logo{
        width: 38px;
        height: 38px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        background: var(--hitam);
        color: var(--putih);
        font-weight: 900;
        letter-spacing: .5px;
    }
    .brand-name{
        font-weight: 900;
        line-height: 1.1;
    }
    .brand-tag{
        font-size: 12px;
        color: var(--muted2);
        margin-top: 2px;
    }

    .search{
        display: none;
        flex: 1;
        max-width: 520px;
        position: relative;
    }
    .search-icon{
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--muted2);
        font-size: 14px;
    }
    .search input{
        width: 100%;
        padding: 10px 12px 10px 34px;
        border-radius: 18px;
        border: 1px solid var(--garis);
        background: #F3F3F3;
        color: var(--teks);
        outline: none;
    }

    @media (min-width: 768px){
        .search{ display: block; }
    }

    .btn{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 14px;
        border-radius: 16px;
        text-decoration: none;
        font-weight: 800;
        font-size: 14px;
    }
    .btn-outline{
        background: var(--panel);
        border: 1px solid var(--garis);
        color: var(--teks);
    }
    .btn-outline:hover{
        background: var(--panel2);
    }
    .btn-solid{
        background: var(--hitam);
        color: var(--putih);
        border: 1px solid #000;
    }

    .hero{
        padding-top: 18px;
    }

    .hero-card{
        border: 1px solid var(--hitam);
        border-radius: 20px;
        background: radial-gradient(circle at top right, #333, #000);
        padding: 40px;
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
        overflow:hidden;
        color: var(--putih);
        position: relative;
    }
    @media (min-width: 900px){
        .hero-card{
            grid-template-columns: 1.2fr .8fr;
            padding: 50px;
            gap: 40px;
        }
    }

    .hero-pill{
        display:inline-flex;
        gap:8px;
        padding:6px 14px;
        font-size:12px;
        border-radius:999px;
        background: rgba(255,255,255,0.1);
        border:1px solid rgba(255,255,255,0.2);
        color: #ddd;
        backdrop-filter: blur(4px);
        margin-bottom: 20px;
    }
    .hero-title{
        margin:0;
        font-size:42px;
        font-weight:900;
        line-height:1;
        letter-spacing: -1px;
        color: var(--putih);
        text-transform: uppercase;
    }
    @media(min-width:900px){
        .hero-title{ font-size:68px;}
    }
    .hero-title span{ 
        display: block;
        color: #888;
        font-size: 0.5em; 
        font-weight: 700;
        margin-top: 5px;
        letter-spacing: 2px;
    }

    .hero-desc{
        margin-top:20px;
        color: #bbb;
        max-width:50ch;
        font-size: 16px;
        line-height: 1.5;
    }

    .product-grid{
        display:grid;
        grid-template-columns:repeat(2,1fr);
        gap:14px;
    }
    @media(min-width:768px){
        .product-grid{ grid-template-columns:repeat(3,1fr);}
    }
    @media(min-width:1100px){
        .product-grid{ grid-template-columns:repeat(4,1fr);}
    }

    .product-card{
        border:1px solid var(--garis);
        background:var(--panel);
        border-radius:22px;
        overflow:hidden;
        transition:.18s ease;
    }
    .product-card:hover{
        border-color:var(--garis2);
        background:var(--panel2);
    }

    .product-photo{
        display:block;
        background:#0E0E0E;
        aspect-ratio:1/1;
    }
    .product-photo img{
        width:100%;
        height:100%;
        object-fit:cover;
    }

    .empty{
        grid-column:1 / -1;
        text-align:center;
        padding:24px;
        color:var(--muted2);
    }

    footer{
        border-top:1px solid var(--garis);
        padding:18px;
        text-align:center;
        color:var(--muted2);
        font-size:13px;
        margin-top:16px;
    }

    .product-card{
        border:1px solid var(--garis);
        background: linear-gradient(180deg, #161616, #0E0E0E);
        border-radius:22px;
        overflow:hidden;
        transition:.25s ease;
        position:relative;
    }

    .product-card:hover{
        border-color:#444;
        background:linear-gradient(180deg, #1B1B1B, #0D0D0D);
        transform:translateY(-4px);
        box-shadow:0 12px 28px rgba(0,0,0,0.35);
    }

    .product-photo{
        display:block;
        width:100%;
        aspect-ratio:1/1;
        background:#0F0F0F;
        border-bottom:1px solid #1E1E1E;
        overflow:hidden;
    }

    .product-photo img{
        width:100%;
        height:100%;
        object-fit:cover;
        transition:0.4s ease;
    }

    .product-card:hover .product-photo img{
        transform:scale(1.06);
    }

    .product-body{
        padding:16px 18px 20px;
    }

    .product-category{
        font-size:12px;
        color:var(--muted2);
        text-transform:uppercase;
        letter-spacing:.5px;
        margin-bottom:4px;
    }

    .product-name{
        font-size:16px;
        font-weight:700;
        margin-bottom:8px;
        color:var(--putih);
    }

    .product-row{
        display:flex;
        align-items:center;
        justify-content:space-between;
        margin-bottom:12px;
    }

    .product-price{
        font-size:17px;
        font-weight:800;
        color:var(--putih);
    }

    .btn-full{
        display:block;
        width:100%;
        text-align:center;
        margin-top:8px;
        border-radius:14px;
        padding:10px 0;
        transition:.2s;
    }

    .btn-full:hover{
        transform:translateY(-2px);
    }


    .section{
        margin-top: 32px;
    }
    .section-head{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 18px;
    }
    .section-title{
        font-size: 28px;
        font-weight: 900;
        color: var(--teks);
    }
    .section-link{
        color: var(--muted);
        text-decoration: none;
        font-size: 14px;
    }
    .section-link:hover{
        color: var(--teks);
    }

    .chips{
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }
    .chip{
        padding: 8px 14px;
        border-radius: 999px;
        background: var(--panel);
        border: 1px solid var(--garis);
        color: var(--muted);
        text-decoration: none;
        font-size: 14px;
        transition: .2s;
    }
    .chip.active{
        background: var(--putih);
        color: var(--hitam);
    }
    .chip:hover{
        background: var(--panel2);
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

    <form class="search" action="{{ route('customer.search') }}" method="GET">
        <div class="search-icon">⌕</div>
        <input type="text" name="q" placeholder="Cari aksesoris y2k..." required>
    </form>


        <div class="auth">
            @auth
                <a class="btn btn-outline" href="{{ route('profile.edit') }}">Profile</a>
            @else
                <a class="btn btn-outline" href="{{ route('login') }}">Log in</a>
                <a class="btn btn-solid" href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>
</header>


<main>

    <section class="container hero">
        <div class="hero-card">
            <div>
                <div class="hero-pill">early-2000s spirit • bold monochrome • glitchy</div>
                <h1 class="hero-title">Y2K <span>ACCESSORIES DROP</span></h1>
                <p class="hero-desc">
                    Our accessory focus: ring, necklace, bracelet & charms.
                </p>
                <div class="hero-actions">
                    <a class="btn btn-solid" href="#produk">Shop Now</a>
                    <a class="btn btn-outline" href="#new">New Arrivals</a>
                </div>
            </div>

            <div>
                <div class="hero-box">
                    <div class="hero-box-top">
                        <span>FEATURED</span>
                        <span class="mini-tag">LIMITED</span>
                    </div>
                    <div class="hero-grid">
                        <div class="hero-tile"></div>
                        <div class="hero-tile"></div>
                        <div class="hero-tile"></div>
                        <div class="hero-tile"></div>
                        <div class="hero-tile"></div>
                        <div class="hero-tile"></div>
                    </div>
                </div>

                <div class="stamp">⚡ Drop terbaru minggu ini</div>
            </div>
        </div>
    </section>

    <section class="container section">
        <div class="section-head">
            <h2 class="section-title">Kategori</h2>
            <a class="section-link" href="{{ route('customer.home') }}">Reset</a>
        </div>

        <div class="chips">
            <a class="chip {{ request('category') ? '' : 'active' }}" href="{{ route('customer.home') }}">Semua</a>

            @foreach($categories as $cat)
                <a class="chip {{ (string)request('category') === (string)$cat->id ? 'active' : '' }}"
                   href="{{ route('customer.home', ['category' => $cat->id]) }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </section>

    <section id="produk" class="container section">
        <div class="section-head">
            <h2 class="section-title">Trending Accessories</h2>
        </div>

        <div class="product-grid">
            @forelse($products as $product)
                @php
                    $imgPath = null;
                    if ($product->thumbnail && !empty($product->thumbnail->image)) {
                        $imgPath = $product->thumbnail->image;
                    } elseif ($product->images && $product->images->first()) {
                        $imgPath = $product->images->first()->image;
                    }

                    $imgUrl = $imgPath ? asset('storage/'.$imgPath) : null;
                @endphp

                <article class="product-card">
                    <a class="product-photo" href="{{ url('/products/'.$product->id) }}">
                        @if($imgUrl)
                            <img src="{{ $imgUrl }}" alt="{{ $product->name }}">
                        @else
                            <div class="no-photo">No Image</div>
                        @endif
                    </a>

                    <div class="product-body">
                        <div class="product-category">{{ optional($product->category)->name ?? 'Uncategorized' }}</div>
                        <div class="product-name">{{ $product->name }}</div>

                        <div class="product-row">
                            <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        </div>

                        <a class="btn btn-solid btn-full" href="{{ url('/products/'.$product->id) }}">Detail →</a>
                    </div>
                </article>
            @empty
                <div class="empty">Produk tidak ditemukan.</div>
            @endforelse
        </div>

        <div class="pagination">
            {{ $products->links() }}
        </div>
    </section>

</main>



<footer>
    © {{ date('Y') }} Y2K Accessories — Laravel
</footer>

</x-customer-layout>

