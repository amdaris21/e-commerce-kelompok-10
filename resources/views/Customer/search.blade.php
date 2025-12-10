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
            <input type="text" name="q" placeholder="Cari aksesoris y2k..." value="{{ $keyword }}" required>
        </form>

        <div class="auth">
            <a class="btn btn-outline" href="{{ route('login') }}">Log in</a>
            <a class="btn btn-solid" href="{{ route('register') }}">Register</a>
        </div>
    </div>
</header>

<main>
    <section class="container section">
        {{-- SEARCH TITLE --}}
        <div class="section-head">
            <h2 class="section-title">Hasil Pencarian: “{{ $keyword }}”</h2>
            <div style="color: var(--muted2); font-size: 14px;">
                {{ $products->total() }} produk ditemukan
            </div>
        </div>

        {{-- FILTER OPSIONAL (untuk nilai tambah) --}}
        <form class="filter-row" action="{{ route('customer.search') }}" method="GET">
            <input type="hidden" name="q" value="{{ $keyword }}">
            <input class="filter-input" type="number" name="min_price" placeholder="Harga Min" value="{{ request('min_price') }}">
            <input class="filter-input" type="number" name="max_price" placeholder="Harga Max" value="{{ request('max_price') }}">
            <select class="filter-input" name="sort">
                <option value="">Urutkan</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama A-Z</option>
            </select>
            <button class="btn btn-solid" type="submit">Filter</button>
        </form>

        {{-- PRODUCT GRID --}}
        <div class="product-grid">
            @forelse($products as $product)
                @php
                    $imgPath = $product->thumbnail->image 
                        ?? ($product->images->first()->image ?? null);
                    $imgUrl = $imgPath ? asset('storage/'.$imgPath) : asset('images/default-product.png');
                @endphp

                <article class="product-card">
                    <a class="product-photo" href="{{ url('/products/'.$product->id) }}">
                        <img src="{{ $imgUrl }}" alt="{{ $product->name }}">
                    </a>

                    <div class="product-body">
                        <div class="product-category">
                            {{ optional($product->category)->name ?? 'Uncategorized' }}
                        </div>

                        <div class="product-name">
                            {{ $product->name }}
                        </div>

                        <div class="product-row">
                            <div class="product-price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>

                        <a class="btn btn-solid btn-full" href="{{ url('/products/'.$product->id) }}">
                            Detail →
                        </a>
                    </div>
                </article>
            @empty
                <div class="empty">Produk tidak ditemukan untuk "{{ $keyword }}". Coba kata kunci lain.</div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        <div class="pagination">
            {{ $products->links() }}
        </div>
    </section>
</main>

<footer>
    © {{ date('Y') }} Y2K Accessories — Laravel
</footer>

</x-app-layout>