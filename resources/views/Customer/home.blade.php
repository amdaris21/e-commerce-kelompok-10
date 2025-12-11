<x-customer-layout>

<style>
    
    .hero{
        padding-top: 18px;
    }

    .hero-card{
        border: 1px solid var(--garis);
        border-radius: 28px;
        background: linear-gradient(135deg, #1A1A1A, #0F0F0F 55%, #0B0B0B);
        padding: 18px;
        display: grid;
        grid-template-columns: 1fr;
        gap: 18px;
        overflow:hidden;
        color: #FFFFFF; /* Force White Text on Dark Card */
    }
    @media (min-width: 900px){
        .hero-card{
            grid-template-columns: 1.15fr .85fr;
            padding: 26px;
            gap: 26px;
        }
    }

    .hero-pill{
        display:inline-flex;
        gap:8px;
        padding:8px 12px;
        font-size:12px;
        border-radius:999px;
        background: rgba(255,255,255,0.1);
        border:1px solid rgba(255,255,255,0.2);
        color: #CCC;
    }
    .hero-title{
        margin:14px 0 0;
        font-size:34px;
        font-weight:1000;
        line-height:1.05;
        color: #FFFFFF;
    }
    @media(min-width:900px){
        .hero-title{ font-size:52px;}
    }
    .hero-title span{ color: #888; }

    .hero-desc{
        margin-top:10px;
        color: #AAA;
        max-width:58ch;
    }

    .product-card{
        border:1px solid var(--garis);
        background: linear-gradient(180deg, #161616, #0E0E0E);
        border-radius:22px;
        overflow:hidden;
        transition:.25s ease;
        position:relative;
        color: #FFFFFF;
    }

    .product-name{
        font-size:16px;
        font-weight:700;
        margin-bottom:8px;
        color: #FFFFFF;
    }

    .product-price{
        font-size:17px;
        font-weight:800;
        color: #FFFFFF;
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

    .slider-container {
        position: relative;
        max-width: 1120px;
        margin: 24px auto 0;
        border-radius: 28px;
        overflow: hidden;
        aspect-ratio: 21/9;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .slider-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
        height: 100%;
    }
    
    .slide {
        min-width: 100%;
        height: 100%;
        position: relative;
    }
    
    .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .slider-dots {
        position: absolute;
        bottom: 16px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
        z-index: 10;
    }
    .slider-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        cursor: pointer;
        transition: 0.3s;
    }
    .slider-dot.active {
        background: #FFF;
        transform: scale(1.2);
    }
</style>


<main>

    <div class="container">
        <div class="slider-container">
            <div class="slider-track" id="sliderTrack">
                <div class="slide">
                    <img src="{{ asset('images/banner-sale.jpg') }}" alt="Sale Banner">
                </div>
                <div class="slide">
                    <img src="{{ asset('images/banner-collection.jpg') }}" alt="Collection Banner">
                </div>
            </div>
            
            <div class="slider-dots" id="sliderDots">
                <div class="slider-dot active" data-index="0"></div>
                <div class="slider-dot" data-index="1"></div>
            </div>
        </div>
    </div>

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
                        @foreach($products->take(6) as $item)
                        @php
                            $hImg = null;
                            if ($item->thumbnail && !empty($item->thumbnail->image)) {
                                $hImg = $item->thumbnail->image;
                            } elseif ($item->images && $item->images->first()) {
                                $hImg = $item->images->first()->image;
                            }
                            $hUrl = $hImg ? asset('storage/'.$hImg) : null;
                        @endphp
                        <div class="hero-tile">
                            @if($hUrl)
                                <img src="{{ $hUrl }}" alt="Product">
                            @endif
                        </div>
                        @endforeach
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.getElementById('sliderTrack');
        const dots = document.querySelectorAll('.slider-dot');
        const slideCount = dots.length;
        let currentIndex = 0;
        
        function updateSlider(index) {
            track.style.transform = `translateX(-${index * 100}%)`;
            dots.forEach(dot => dot.classList.remove('active'));
            dots[index].classList.add('active');
            currentIndex = index;
        }

        setInterval(() => {
            let nextIndex = (currentIndex + 1) % slideCount;
            updateSlider(nextIndex);
        }, 5000);

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                updateSlider(index);
            });
        });
    });
</script>

</x-customer-layout>