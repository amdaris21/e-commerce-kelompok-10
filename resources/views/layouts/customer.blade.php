<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root{
            --bg: #0B0B0B;
            --panel: #121212;
            --panel2: #171717;
            --garis: #242424;
            --garis2: #343434;
            --teks: #F2F2F2;
            --muted: #B9B9B9;
            --muted2: #9C9C9C;
            --putih: #FFFFFF;
            --hitam: #000000;
            --pink: #f0bbbbff;
            --pink-tua: #d26b6bff;
        }

        *{ box-sizing: border-box; }
        html, body {
            height: 100%;
            margin: 0;
            background: var(--bg);
            color: var(--teks);
            font-family: 'Figtree', sans-serif;
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 20px;
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

        .search {
            display: none;
            flex: 1;
            max-width: 520px;
            position: relative;
        }
        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted2);
            font-size: 14px;
        }
        .search input {
            width: 100%;
            padding: 10px 12px 10px 34px;
            border-radius: 18px;
            border: 1px solid var(--garis);
            background: #e7e7e7ff;
            color: #111;
            outline: none;
            font-weight: 600;
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
            white-space: nowrap;
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

        footer {
            border-top: 1px solid var(--garis);
            padding: 18px;
            text-align: center;
            color: var(--muted2);
            font-size: 13px;
            margin-top: 40px;
            background: var(--bg);
        }
    </style>
</head>
<body class="font-sans antialiased">
    
    <header>
        <div class="container header-bar">
            <a class="brand" href="{{ route('customer.home') }}">
                <div class="brand-logo">Y2K</div>
                <div>
                    <div class="brand-name">Y2K Accessories</div>
                    <div class="brand-tag">ring • necklace • bracelet • sunglasses • charms</div>
                </div>
            </a>

            <form class="search" action="{{ route('customer.search') }}" method="GET">
                <div class="search-icon">⌕</div>
                <input type="text" name="q" placeholder="Cari aksesoris y2k..." value="{{ request('q') }}" required>
            </form>

            <div class="auth">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('dashboard') }}" class="btn-outline">Dashboard</a>
                    @else
                         <a href="{{ route('transaction.history') }}" class="btn-outline">History</a>
                         <a href="{{ route('profile.edit') }}" class="btn-solid">Profile</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn-outline">Log in</a>
                    <a href="{{ route('register') }}" class="btn-solid">Register</a>
                @endauth
            </div>
        </div>
    </header>
    <div>
        {{ $slot }}
    </div>

</body>

</html>
