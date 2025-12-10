<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
        }
        body {
            font-family: 'Figtree', sans-serif;
            background-color: var(--bg);
            color: var(--teks);
            margin: 0;
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
            background: var(--hitam);
            border-bottom: 1px solid #222;
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
            color: var(--putih);
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
            color: #888;
            margin-top: 2px;
        }
        .auth a {
            font-weight: 700;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 24px;
            text-decoration: none;
            transition: all 0.2s;
        }
        .auth .btn-outline {
            border: 1px solid #333;
            background: transparent;
            color: var(--putih);
            margin-right: 10px;
        }
        .auth .btn-outline:hover {
            border-color: var(--putih);
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
            color: var(--muted);
            font-size: 13px;
            margin-top: 60px;
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
                    <div class="brand-tag">ring • necklace • bracelet • charms</div>
                </div>
            </a>

            <div class="auth">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('dashboard') }}" class="btn-outline">Dashboard</a>
                    @else
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
