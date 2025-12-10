<x-customer-layout>
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
            <a class="btn btn-outline" href="{{ route('login') }}">Log in</a>
            <a class="btn btn-solid" href="{{ route('register') }}">Register</a>
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
