<x-customer-layout>
    <style>
        :root{
            --bg: #FDFBF7;
            --text-main: #1A1A1A;
            --text-muted: #666666;
            --accent-pink: #FFB6C1;
            --btn-black: #000000;
        }

        body {
            background-color: var(--bg);
            color: var(--text-main);
        }

        header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255, 250, 251, 0.95);
            border-bottom: 1px solid #E6E4DF;
            backdrop-filter: blur(10px);
        }

        .header-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 12px 0;
            max-width: 1120px;
            margin: 0 auto;
            padding-left: 16px; 
            padding-right: 16px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: var(--text-main);
        }
        .brand-logo {
            width: 38px;
            height: 38px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            background: var(--btn-black);
            color: white;
            font-weight: 900;
            letter-spacing: .5px;
        }
        .brand-name {
            font-weight: 900;
            line-height: 1.1;
        }
        .brand-tag {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .main-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 24px;
            letter-spacing: -0.5px;
        }

        .transaction-card {
            background: white;
            border: 1px solid #E6E4DF;
            border-radius: 16px;
            margin-bottom: 16px;
            overflow: hidden;
            transition: all 0.2s;
        }
        
        .transaction-card:hover {
            border-color: var(--text-muted);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .card-header {
            padding: 16px 20px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fafafa;
        }

        .trx-code {
            font-weight: 700;
            font-size: 14px;
            color: var(--text-main);
        }

        .trx-date {
            font-size: 13px;
            color: var(--text-muted);
        }

        .card-body {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .trx-info {
           display: flex;
           flex-direction: column;
           gap: 4px;
        }

        .trx-total {
            font-weight: 800;
            font-size: 16px;
        }

        .trx-status {
            font-size: 13px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 99px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .status-unpaid {
            background: #FFF0F0;
            color: #D32F2F;
            border: 1px solid #FFCDD2;
        }

        .status-paid {
            background: #E8F5E9;
            color: #2E7D32;
            border: 1px solid #C8E6C9;
        }

        .status-shipped {
             background: #E3F2FD;
             color: #1565C0;
             border: 1px solid #BBDEFB;
        }

        .nav-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border: 1px solid var(--text-main);
            color: var(--text-main);
            padding: 8px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            transition: all 0.2s;
        }
        .nav-btn:hover {
            background: var(--text-main);
            color: #FFFFFF;
            transform: translateY(-1px);
        }

        .nav-group {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn-detail {
            background: var(--btn-black);
            color: white;
            padding: 10px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 13px;
            border: none;
            transition: all 0.2s;
        }

        .btn-detail:hover {
            background: var(--accent-pink);
            color: var(--btn-black);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-muted);
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 20px;
            color: #ddd;
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
            
            <div class="nav-group">
                <a href="{{ route('customer.home') }}" class="nav-btn">Beranda</a>
                <a href="{{ route('profile.edit') }}" class="nav-btn">Profile</a>
            </div>
        </div>
    </header>

    <main class="main-container">
        <h1 class="page-title">Riwayat Transaksi</h1>

        @if($transactions->count() > 0)
            @foreach($transactions as $trx)
                <div class="transaction-card">
                    <div class="card-header">
                        <div>
                            <span class="trx-code">{{ $trx->code }}</span>
                            <span class="trx-date"> • {{ $trx->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="status-badge {{ $trx->payment_status == 'paid' ? 'status-paid' : ($trx->payment_status == 'shipped' ? 'status-shipped' : 'status-unpaid') }}">
                            {{ ucfirst($trx->payment_status) }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="trx-info">
                            <span class="trx-status text-muted">{{ $trx->transactionDetails->first()->product->name ?? 'Product' }} (x{{ $trx->transactionDetails->first()->qty }})</span>
                            <span class="trx-total">Total: Rp {{ number_format($trx->grand_total, 0, ',', '.') }}</span>
                        </div>
                        <a href="{{ route('transaction.detail', $trx->id) }}" class="btn-detail">Lihat Detail</a>
                    </div>
                </div>
            @endforeach

            <div class="mt-4">
                {{ $transactions->links() }}
            </div>
        @else
            <div class="empty-state">
                <div class="empty-icon">📂</div>
                <h3>Belum ada transaksi</h3>
                <p>Kamu belum melakukan pembelian apapun.</p>
                <a href="{{ route('customer.home') }}" class="nav-btn" style="margin-top: 20px;">Belanja Sekarang</a>
            </div>
        @endif
    </main>
</x-customer-layout>
