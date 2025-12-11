<x-customer-layout>
<style>
    :root {
        --bg: #FDFBF7; /* Bone White / Cream background */
        --card-bg: #FFFFFF;
        --text-main: #1A1A1A;
        --text-muted: #666666;
        --accent-pink: #FFC0CB; /* Light pink */
        --accent-pink-text: #E06C75; 
        --border-color: #E6E4DF;
        --status-pending-bg: #F9F7F2; /* Subtle cream instead of yellow */
        --status-pending-text: #000000; /* Black icon */
        --btn-black: #000000;
        --btn-black-hover: #333333;
    }

    body {
        background-color: var(--bg);
        color: var(--text-main);
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .payment-container {
        max-width: 1120px;
        margin: 40px auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 32px;
    }

    /* Headers */
    .page-header {
        max-width: 1120px;
        margin: 0 auto;
        padding: 24px 20px 0;
    }

    .page-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--text-main);
    }
    
    .back-link {
        color: var(--text-main);
        text-decoration: none;
        font-size: 24px;
    }

    .order-id {
        font-size: 14px;
        color: var(--text-muted);
        margin-bottom: 24px;
    }

    /* Cards */
    .card {
        background: var(--card-bg);
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.04); /* Softer, slightly larger shadow */
        border: 1px solid var(--border-color);
    }

    .card-title {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--text-main);
    }

    /* Left Column - Status */
    .status-box {
        background-color: var(--btn-black); /* Black Background */
        border: 1px solid var(--btn-black);
        border-radius: 12px;
        padding: 40px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 200px;
    }

    .status-icon {
        width: 48px;
        height: 48px;
        background: #FFFFFF; /* White Circle */
        border-radius: 50%;
        display: grid;
        place-items: center;
        color: var(--btn-black); /* Black Icon */
        font-size: 20px;
        margin-bottom: 16px;
    }

    .status-text {
        font-size: 18px;
        font-weight: 700;
        color: #FFFFFF; /* White Text */
        margin-bottom: 8px;
    }

    .status-desc {
        font-size: 14px;
        color: #E0E0E0; /* Light Grey Text */
        max-width: 80%;
    }

    /* Left Column - Instruction */
    .bank-card {
        background: #F8F9FA;
        border: 1px solid #E9ECEF;
        border-radius: 12px;
        padding: 24px; /* More padding */
        display: flex;
        align-items: flex-start;
        gap: 20px;
    }

    .bank-logo {
        width: 60px;
        height: 40px;
        background: white;
        border-radius: 6px;
        display: grid;
        place-items: center;
        font-weight: 900;
        color: var(--text-main); /* Black text */
        border: 1px solid #ddd;
        flex-shrink: 0;
    }

    .bank-details {
        flex: 1;
    }

    .bank-name {
        font-weight: 700;
        font-size: 15px;
        margin-bottom: 4px;
        color: var(--text-main);
    }
    
    .manual-verif {
        font-size: 12px;
        color: var(--accent-pink-text); /* Use Pink for accent */
        margin-bottom: 16px;
        font-weight: 600;
    }

    .account-row {
        display: flex;
        justify-content: space-between;
        font-size: 14px;
        margin-bottom: 8px;
        color: var(--text-muted);
    }
    
    .account-number {
        font-family: monospace;
        font-size: 16px;
        font-weight: 700;
        color: var(--text-main);
    }

    /* Right Column - Summary */
    .summary-item {
        display: flex;
        gap: 16px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 20px;
    }
    
    .summary-img {
        width: 70px; /* Key visual larger */
        height: 70px;
        border-radius: 12px;
        object-fit: cover;
        background: #f0f0f0;
    }

    .summary-info {
        flex: 1;
    }

    .summary-name {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 6px;
        color: var(--text-main);
        line-height: 1.4;
    }

    .summary-price {
        font-size: 13px;
        color: var(--text-muted);
    }

    .calc-row {
        display: flex;
        justify-content: space-between;
        font-size: 14px;
        color: var(--text-muted);
        margin-bottom: 12px;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 16px;
        font-weight: 700;
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid var(--border-color);
        color: var(--text-main);
    }

    .total-price {
        color: var(--accent-pink-text); /* Pink total */
        font-size: 24px; /* Larger total */
    }
    
    .confirm-btn {
        display: block;
        width: 100%;
        background: var(--accent-pink); /* Pink Background */
        color: var(--text-main); /* Black Text for contrast */
        text-align: center;
        padding: 16px;
        border-radius: 12px;
        font-weight: 700;
        margin-top: 24px;
        text-decoration: none;
        transition: 0.2s;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 0.5px;
    }
    .confirm-btn:hover {
        background: var(--accent-pink-text); /* Darker Pink on hover */
        color: white; /* White text on darker pink */
    }

    /* Header Styles */
    header {
        position: sticky;
        top: 0;
        background: var(--bg);
        border-bottom: 1px solid var(--border-color);
        padding: 16px 20px;
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
        color: var(--text-main);
        text-decoration: none;
    }
    .brand-logo {
        width: 42px;
        height: 42px;
        background: var(--btn-black);
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-weight: 900;
        color: #FFFFFF;
        font-size: 16px;
    }
    .brand-name {
        font-weight: 800;
        font-size: 16px;
        line-height: 1.2;
    }
    .brand-tag {
        font-size: 12px;
        color: var(--text-muted);
        font-weight: 500;
    }

    @media (max-width: 900px) {
        .payment-container {
            grid-template-columns: 1fr;
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

<div class="page-header">
    <!-- Title Removed as per request -->
    <div class="order-id">ID Pesanan: #{{ $transaction->code }}</div>
</div>

<div class="payment-container">
    <!-- Left Column -->
    <div class="left-col">
        <div class="card">
            <h3 class="card-title">Status Pembayaran</h3>
            <div class="status-box">
                <div class="status-icon">
                    <i class="fa-solid fa-exclamation"></i>
                </div>
                <div class="status-text">Pembayaran Diperlukan</div>
                <div class="status-desc">Silakan selesaikan pembayaran Anda untuk memproses pesanan.</div>
            </div>
        </div>

        <div class="card">
            <h3 class="card-title">Instruksi Pembayaran</h3>
            
            <!-- QRIS Payment -->
            <div class="bank-card" style="flex-direction: column; align-items: center; text-align: center;">
                <div class="bank-logo" style="width: auto; height: 32px; padding: 0 12px; border: 1px solid var(--text-main); color: var(--text-main);">QRIS</div>
                <div class="bank-details" style="width: 100%; margin-top: 16px;">
                    <div class="bank-name">Scan QR Code</div>
                    <div class="manual-verif">NAMA MERCHANT: Y2K ACCESSORIES</div>
                    
                    <div style="margin: 24px 0;">
                        <!-- Placeholder QR Code -->
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=Y2K-ORDER-{{ $transaction->code }}" alt="QRIS Code" style="width: 180px; height: 180px; border: 2px solid var(--text-main); border-radius: 8px; padding: 8px; background: white; display: block; margin: 0 auto;">
                    </div>
                    
                    <div style="font-size: 13px; color: var(--text-muted); line-height: 1.5;">
                        Scan QRIS di atas menggunakan<br>Gopay, OVO, Dana, ShopeePay, atau Mobile Banking.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Summary -->
    <div class="right-col">
        <div class="card">
            <h3 class="card-title">Ringkasan Pesanan</h3>
            
            @foreach($transaction->transactionDetails as $detail)
            <div class="summary-item">
                <img src="{{ asset('storage/' . ($detail->product->thumbnail->image ?? 'images/default-product.png')) }}" class="summary-img" alt="product">
                <div class="summary-info">
                    <div class="summary-name">{{ $detail->product->name }}</div>
                    <div class="summary-price">{{ $detail->qty }}x Rp{{ number_format($detail->product->price, 0, ',', '.') }}</div>
                </div>
                <div style="font-weight:600; font-size:14px;">
                    Rp{{ number_format($detail->subtotal, 0, ',', '.') }}
                </div>
            </div>
            @endforeach

            <div class="calc-row">
                <span>Subtotal</span>
                <span>Rp{{ number_format($transaction->grand_total - $transaction->shipping_cost - $transaction->tax, 0, ',', '.') }}</span>
            </div>
            <div class="calc-row">
                <span>Pengiriman</span>
                <span>Rp{{ number_format($transaction->shipping_cost, 0, ',', '.') }}</span>
            </div>
            <div class="calc-row">
                <span>Pajak</span>
                <span>Rp{{ number_format($transaction->tax, 0, ',', '.') }}</span>
            </div>

            <div class="total-row">
                <span>Total</span>
                <span class="total-price">Rp{{ number_format($transaction->grand_total, 0, ',', '.') }}</span>
            </div>

            <form action="{{ route('transaction.confirm', $transaction->id) }}" method="POST">
                @csrf
                <button type="submit" class="confirm-btn">Konfirmasi Pembayaran</button>
            </form>
        </div>
    </div>
</div>
</x-customer-layout>