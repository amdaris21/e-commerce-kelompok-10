<x-customer-layout>
    <style>
        main.container {
            max-width: 1120px;
            margin: 40px auto;
            padding: 30px 20px;
            background: var(--panel);
            border-radius: 22px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.7);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 48px;
        }
        @media (max-width: 768px) {
            main.container {
                grid-template-columns: 1fr;
                margin: 20px 10px;
                gap: 30px;
            }
        }
        .product-summary {
            background: #0E0E0E;
            border-radius: 22px;
            padding: 24px;
            text-align: center;
            box-shadow: inset 0 0 15px rgba(0,0,0,0.5);
        }
        .product-summary img {
            width: 100%;
            max-width: 320px;
            border-radius: 22px;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            margin-bottom: 16px;
            margin-left: 70px;
            transition: transform 0.3s ease;
        }
        .product-summary img:hover {
            transform: scale(1.05);
        }
        .product-category {
            font-size: 14px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 10px;
        }
        .product-name {
            font-size: 28px;
            font-weight: 900;
            color: var(--putih);
            margin-bottom: 12px;
        }
        .product-price {
            font-size: 24px;
            font-weight: 800;
            color: var(--pink);
            margin-bottom: 12px;
        }
        form.checkout-form {
            background: var(--panel2);
            border-radius: 22px;
            padding: 32px;
            box-shadow: inset 0 0 12px rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
        }
        form.checkout-form label {
            font-weight: 700;
            font-size: 14px;
            color: var(--muted);
            margin-bottom: 6px;
            display: block;
        }
        form.checkout-form input,
        form.checkout-form textarea,
        form.checkout-form select {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1.5px solid var(--garis2);
            background: var(--panel);
            color: var(--putih);
            font-size: 16px;
            outline: none;
            resize: vertical;
            margin-bottom: 20px;
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
            box-sizing: border-box;
        }
        form.checkout-form input:focus,
        form.checkout-form textarea:focus,
        form.checkout-form select:focus {
            border-color: var(--pink-light);
            box-shadow: 0 0 8px var(--pink-light);
        }
        textarea {
            min-height: 100px;
        }
        button.submit-btn {
            background-color: var(--pink);
            border: none;
            padding: 16px 0;
            border-radius: 16px;
            font-weight: 900;
            font-size: 16px;
            color: var(--hitam);
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }
        button.submit-btn:hover {
            background-color: var(--pink-tua);
        }
        .error-message {
            color: #f87171;
            font-size: 13px;
            margin-top: -16px;
            margin-bottom: 12px;
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
    <section class="product-summary">
        <img src="{{ asset('storage/' . ($product->thumbnail->image ?? ($product->images->first()->image ?? 'images/default-product.png'))) }}" alt="{{ $product->name }}">
        <div class="product-category">{{ optional($product->category)->name ?? 'Uncategorized' }}</div>
        <h2 class="product-name">{{ $product->name }}</h2>
        <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
    </section>

    <form method="POST" action="{{ route('transaction.process') }}" class="checkout-form">
        @csrf
        <input type="hidden" name="store_id" value="{{ $product->store_id }}">
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <label for="fullname">Nama Lengkap</label>
        <input id="fullname" name="fullname" type="text" placeholder="Masukkan nama lengkap" value="{{ old('fullname') }}" required>
        @error('fullname')<div class="error-message">{{ $message }}</div>@enderror

        <label for="address">Alamat Lengkap</label>
        <textarea id="address" name="address" placeholder="Masukkan alamat lengkap" required>{{ old('address') }}</textarea>
        @error('address')<div class="error-message">{{ $message }}</div>@enderror

        <label for="city">Kota</label>
        <input id="city" name="city" type="text" placeholder="Masukkan kota" value="{{ old('city') }}" required>
        @error('city')<div class="error-message">{{ $message }}</div>@enderror

        <label for="postal_code">Kode Pos</label>
        <input id="postal_code" name="postal_code" type="text" placeholder="Masukkan kode pos" value="{{ old('postal_code') }}" required>
        @error('postal_code')<div class="error-message">{{ $message }}</div>@enderror

        <label for="shipping_type">Jenis Pengiriman</label>
        <select id="shipping_type" name="shipping_type" required>
            <option value="" disabled {{ old('shipping_type') ? '' : 'selected' }}>Pilih jenis pengiriman</option>
            <option value="reguler" {{ old('shipping_type') == 'reguler' ? 'selected' : '' }}>Reguler - 3-5 hari</option>
            <option value="express" {{ old('shipping_type') == 'express' ? 'selected' : '' }}>Express - 1-2 hari</option>
            <option value="same_day" {{ old('shipping_type') == 'same_day' ? 'selected' : '' }}>Same Day Delivery</option>
        </select>
        @error('shipping_type')<div class="error-message">{{ $message }}</div>@enderror

        <button type="submit" class="submit-btn">Selesaikan Pembelian</button>
    </form>
</main>

<footer>
    © {{ date('Y') }} Y2K Accessories — Laravel
</footer>

</x-app-layout>