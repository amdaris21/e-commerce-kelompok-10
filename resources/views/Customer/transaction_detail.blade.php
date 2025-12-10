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
        --putih: #FFFFFF;
        --hitam: #000000;
        --pink: #f0bbbbff;
        --pink-tua: #d26b6bff;
        --pink-light: #ffafc4ff;
        --orange: #ff6600;
    }

    * {
        box-sizing: border-box;
    }
    body, html {
        margin: 0;
        background: var(--bg);
        color: var(--teks);
        font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        min-height: 100vh;
    }
    header {
        position: sticky;
        top: 0;
        background: var(--bg);
        border-bottom: 1px solid var(--garis);
        padding: 12px 20px;
        z-index: 50;
    }
    .header-bar {
        max-width: 1120px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        color: var(--teks);
        text-decoration: none;
    }
    .brand-logo {
        width: 38px;
        height: 38px;
        background: var(--putih);
        border-radius: 14px;
        display: grid;
        place-items: center;
        font-weight: 900;
        color: var(--hitam);
        font-size: 18px;
    }
    main.container {
        max-width: 1120px;
        margin: 40px auto;
        padding: 30px 20px;
        background: var(--panel);
        border-radius: 22px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.7);
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        color: var(--teks);
    }
    .left, .right {
        flex: 1 1 400px;
    }
    .section-title {
        font-size: 24px;
        font-weight: 900;
        margin-bottom: 20px;
    }
    .product-item {
        display: flex;
        align-items: center;
        gap: 16px;
        border-bottom: 1px solid var(--garis2);
        padding: 12px 0;
    }
    .product-item img {
        width: 64px;
        height: 64px;
        border-radius: 12px;
        object-fit: cover;
        background-color: var(--panel2);
        flex-shrink: 0;
    }
    .product-info {
        flex: 1;
    }
    .product-name {
        font-weight: 700;
        font-size: 16px;
        margin-bottom: 4px;
        color: var(--putih);
    }
    .product-store {
        font-size: 12px;
        color: var(--muted);
    }
    .product-qty-price {
        font-weight: 700;
        color: var(--pink);
    }
    /* Detail Pembayaran */
    .payment-detail {
        background-color: var(--panel2);
        border-radius: 20px;
        padding: 24px;
        box-shadow: inset 0 0 12px rgba(0,0,0,0.5);
    }
    .payment-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 12px;
    }
    .payment-row strong {
        font-weight: 700;
    }
    .btn-pay {
        display: block;
        width: 100%;
        padding: 16px 0;
        background-color: var(--orange);
        border: none;
        border-radius: 16px;
        font-weight: 900;
        font-size: 18px;
        color: var(--putih);
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s ease;
        margin-top: 12px;
    }
    .btn-pay:hover {
        background-color: #e15500;
    }
    .coupon-box {
        background-color: var(--panel2);
        border-radius: 12px;
        padding: 12px 18px;
        margin-bottom: 32px;
        cursor: pointer;
        display: flex;
        gap: 8px;
        align-items: center;
        box-shadow: inset 0 0 5px rgba(0,0,0,0.3);
        font-weight: 600;
        color: var(--pink-light);
    }
    .coupon-box:hover {
        background-color: var(--pink-tua);
        color: var(--putih);
    }
    @media (max-width: 900px) {
        main.container {
            flex-direction: column;
        }
        .left, .right {
            max-width: 100%;
        }
    }
</style>

<header>
    <div class="header-bar">
        <a href="{{ route('customer.home') }}" class="brand">
            <div class="brand-logo">Y2K</div>
            <div>
                <div class="brand-name">Y2K Accessories</div>
                <div class="brand-tag">ring • necklace • bracelet • charms</div>
            </div>
        </a>
    </div>
</header>

<main class="container">
    <div class="left">
        <h2 class="section-title">Pembayaran</h2>

        @foreach($transaction->transactionDetails as $detail)
        <div class="product-item">
            <img src="{{ asset('storage/' . ($detail->product->thumbnail->image ?? ($detail->product->images->first()->image ?? 'images/default-product.png'))) }}" alt="{{ $detail->product->name }}">
            <div class="product-info">
                <div class="product-name">{{ $detail->product->name }}</div>
                <div class="product-store"><i class="fa-solid fa-store"></i> {{ $detail->product->store->name }}</div>
            </div>
            <div class="product-qty-price">Rp{{ number_format($detail->subtotal,0,',','.') }} x {{ $detail->qty }}</div>
        </div>
        @endforeach

        <div class="coupon-box">
            <span>💸</span> Makin hemat pakai Kupon. Yuk pakai sebelum hangus
        </div>

        <h2 class="section-title">Metode Pembayaran</h2>
        <!-- Anda bisa tambahkan pilihan metode pembayaran di sini -->
        <div style="margin-top:12px; color: var(--muted);"> (Metode pembayaran akan ditampilkan di sini) </div>

    </div>
    <div class="right">
        <div class="payment-detail">
            <h2 class="section-title">Detail Pembayaran</h2>
            <div class="payment-row">
                <span>Metode Pembayaran</span>
                <span>Belum dipilih</span>
            </div>
            <div class="payment-row">
                <span>Total Pesanan</span>
                <span>Rp{{ number_format($transaction->grand_total - $transaction->shipping_cost,0,',','.') }}</span>
            </div>
            <div class="payment-row">
                <strong>Total Pembayaran</strong>
                <strong>Rp{{ number_format($transaction->grand_total,0,',','.') }}</strong>
            </div>
            <button class="btn-pay">Bayar</button>
            <p style="margin-top:12px; font-size:12px; color: var(--muted); text-align:center;">
                Pembayaran Aman 100% Dijamin oleh <a href="#" style="color: var(--pink-light); font-weight: 700;">Trade Guard 🔒</a>
            </p>
        </div>
    </div>
</main>

<footer>
    © {{ date('Y') }} Y2K Accessories — Laravel
</footer>
</x-customer-layout>