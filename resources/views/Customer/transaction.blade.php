<x-customer-layout>
    <style>
        :root{
            --bg: #FDFBF7; /* Cream background */
            --panel: #FFFFFF;
            --panel2: #F3F1ED;
            --garis: #E6E4DF;
            --garis2: #D1D1D1;
            --teks: #1A1A1A; /* Black text */
            --muted: #666666;
            --putih: #FFFFFF;
            --hitam: #000000;
            --pink: #f0bbbbff; /* Light pink accent */
            --pink-tua: #d26b6bff;
            --pink-light: #ffafc4ff;
        }

        body {
            background-color: var(--bg);
            color: var(--teks);
        }

        .page-title {
            font-size: 32px;
            font-weight: 900;
            margin: 32px 0 40px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* 2-Column Layout */
        .checkout-layout {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 40px;
            align-items: start;
        }
        @media (max-width: 900px) {
            .checkout-layout {
                grid-template-columns: 1fr;
            }
        }

        /* Card Styles */
        .card {
            background: var(--hitam);
            border-radius: 20px;
            padding: 30px;
            color: var(--putih);
            margin-bottom: 30px;
            border: 1px solid #222;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        
        .card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            border-bottom: 1px solid #333;
            padding-bottom: 16px;
        }

        .step-number {
            background: var(--putih);
            color: var(--hitam);
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 14px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 800;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #AAA;
        }
        input, textarea, select {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            background: #111;
            border: 1px solid #333;
            color: var(--putih);
            font-size: 15px;
            font-family: inherit;
            outline: none;
            transition: all 0.2s;
        }
        input:focus, textarea:focus, select:focus {
            border-color: var(--putih);
            background: #000;
        }
        .row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Order Item */
        .order-item {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #333;
        }
        .order-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        .order-img {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            object-fit: cover;
            background: #222;
        }
        .order-info {
            flex: 1;
        }
        .order-name {
            font-weight: 700;
            margin-bottom: 4px;
        }
        .order-price {
            color: #FFF;
            font-weight: 600;
        }
        
        /* Summary Card */
        .summary-card {
            position: sticky;
            top: 100px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 15px;
            color: #CCC;
        }
        .summary-row.total {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #333;
            font-weight: 900;
            font-size: 20px;
            color: var(--pink);
        }

        .process-btn {
            width: 100%;
            background: var(--pink);
            color: var(--hitam);
            padding: 18px;
            border-radius: 14px;
            border: none;
            font-weight: 900;
            font-size: 16px;
            cursor: pointer;
            margin-top: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.2s;
        }
        .process-btn:hover {
            background: var(--pink-tua);
            transform: translateY(-2px);
        }
        
        /* Quantity Control */
        .qty-control {
            display: flex; 
            align-items: center; 
            gap: 10px; 
            margin-top: 8px;
        }
        .qty-btn {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border: 1px solid #333;
            background: #222;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-family: monospace;
        }
        .qty-btn:hover {
            background: #333;
        }
    </style>

<main class="container">
    <h1 class="page-title">Checkout</h1>

    <form action="{{ route('transaction.process') }}" method="POST" class="checkout-layout">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        
        <!-- Updated Quantity Input that syncs with JS -->
        <input type="hidden" name="quantity" value="{{ request('quantity', 1) }}">

        <!-- LEFT COLUMN -->
        <div class="left-column">
            
            <!-- STEP 1: ADDRESS -->
            <div class="card">
                <div class="card-header">
                    <div class="step-number">1</div>
                    <h2 class="card-title">Alamat Pengiriman</h2>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Nama Lengkap *</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat Lengkap *</label>
                    <textarea name="address" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>

                <div class="row-2">
                    <div class="form-group">
                        <label class="form-label">Kota *</label>
                        <input type="text" name="city" placeholder="Kota" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kode Pos *</label>
                        <input type="text" name="postal_code" placeholder="Kode Pos" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Detail Pengiriman *</label>
                    <select name="shipping_type" required>
                        <option value="reguler">Reguler (Rp 10.000)</option>
                        <option value="express">Express (Rp 25.000)</option>
                        <option value="same_day">Same Day (Rp 50.000)</option>
                    </select>
                </div>
            </div>

            <!-- STEP 2: ORDER DETAIL -->
            <div class="card">
                 <div class="card-header">
                    <div class="step-number">2</div>
                    <h2 class="card-title">Detail Pesanan</h2>
                </div>

                <div class="order-item">
                    <img src="{{ asset('storage/' . ($product->thumbnail->image ?? ($product->images->first()->image ?? 'images/default-product.png'))) }}" alt="{{ $product->name }}" class="order-img">
                    <div class="order-info">
                        <div class="order-name">{{ $product->name }}</div>
                        <div class="order-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        
                        <!-- Quantity Control -->
                        <div class="qty-control">
                            <button type="button" class="qty-btn" id="qty-minus">-</button>
                            <span id="qty-display" style="font-weight:700;">{{ request('quantity', 1) }}</span>
                            <button type="button" class="qty-btn" id="qty-plus">+</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="right-column">
            <div class="card summary-card">
                 <div class="card-header" style="border:none; padding:0; margin-bottom:20px;">
                    <h2 class="card-title">Ringkasan Pesanan</h2>
                </div>
                
                <div class="summary-row">
                    <span>Subtotal Produk</span>
                    <span id="subtotal-display">Rp {{ number_format($product->price * request('quantity', 1), 0, ',', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span>Biaya Layanan</span>
                    <span>Rp 2.000</span>
                </div>
                <div class="summary-row">
                    <span>Pengiriman</span>
                    <span id="shipping-display">Rp 10.000</span> 
                </div>

                <div class="summary-row total">
                    <span>Total Pembayaran</span>
                    <span id="total-price">Rp {{ number_format(($product->price * request('quantity', 1)) + 12000, 0, ',', '.') }}</span>
                </div>

                <button type="submit" class="process-btn">Buat Pesanan</button>
            </div>
        </div>
    </form>
</main>

<footer>
    © {{ date('Y') }} Y2K Accessories
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const shippingSelect = document.querySelector('select[name="shipping_type"]');
        const shippingDisplay = document.getElementById('shipping-display');
        const totalDisplay = document.getElementById('total-price');
        const subtotalDisplay = document.getElementById('subtotal-display');
        
        // Quantity Elements
        const qtyInput = document.querySelector('input[name="quantity"]');
        const qtyDisplay = document.getElementById('qty-display');
        const btnMinus = document.getElementById('qty-minus');
        const btnPlus = document.getElementById('qty-plus');
        
        // Base values
        const productPrice = {{ $product->price }};
        const serviceFee = 2000;
        const maxStock = {{ $product->stock }};
        
        let currentQty = parseInt(qtyInput.value) || 1;
        let currentShippingCost = 10000; // Default Reguler

        const shippingCosts = {
            'reguler': 10000,
            'express': 25000,
            'same_day': 50000
        };

        function formatRupiah(number) {
            return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function updateTotals() {
            // Calculate totals
            const subtotal = productPrice * currentQty;
            const grandTotal = subtotal + serviceFee + currentShippingCost;
            
            // Update DOM
            qtyDisplay.textContent = currentQty;
            qtyInput.value = currentQty;
            subtotalDisplay.textContent = formatRupiah(subtotal);
            totalDisplay.textContent = formatRupiah(grandTotal);
        }

        // Shipping Change Listener
        shippingSelect.addEventListener('change', function() {
            const selectedType = this.value;
            currentShippingCost = shippingCosts[selectedType] || 0;
            
            if (currentShippingCost > 0) {
                shippingDisplay.textContent = formatRupiah(currentShippingCost);
            } else {
                shippingDisplay.textContent = '-';
            }
            
            updateTotals();
        });

        // Quantity Listeners
        btnMinus.addEventListener('click', function() {
            if (currentQty > 1) {
                currentQty--;
                updateTotals();
            }
        });

        btnPlus.addEventListener('click', function() {
            if (currentQty < maxStock) {
                currentQty++;
                updateTotals();
            }
        });
    });
</script>

</x-customer-layout>
