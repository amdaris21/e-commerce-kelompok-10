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
            --bg: #FAF9F6; /* Putih Tulang / Bone White */
            --panel: #FFFFFF;
            --panel2: #FFF0F5;
            --garis: #FFC0CB; /* Pink Muda */
            --garis2: #FFB6C1;
            --teks: #000000;
            --muted: #888888;
            --muted2: #666666;
            --putih: #FFFFFF;
            --hitam: #000000;
            --pink-accent: #FF69B4;
        }
        body {
            font-family: 'Figtree', sans-serif;
            background-color: var(--bg);
            color: var(--teks);
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 16px;
        }
        
        /* Header & Nav - WHITE THEME */
        header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: #FFFFFF;
            border-bottom: 1px solid #E5E5E5;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        }
        .header-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            padding: 14px 0;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #000;
        }
        .brand-logo {
            width: 42px;
            height: 42px;
            border-radius: 50%; /* Circle as per image/modern style */
            display: grid;
            place-items: center;
            background: #000;
            color: #FFF;
            font-weight: 900;
            letter-spacing: .5px;
            font-size: 13px;
        }
        .brand-name {
            font-weight: 900;
            line-height: 1.1;
            font-size: 16px;
        }
        .brand-tag {
            font-size: 12px;
            color: #666;
            margin-top: 2px;
            font-weight: 500;
        }

        /* Search - Centered Pill */
        .search{
            display: none;
            flex: 1;
            max-width: 600px;
            position: relative;
        }
        .search-icon{
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 16px;
        }
        .search input{
            width: 100%;
            padding: 12px 12px 12px 48px;
            border-radius: 99px; /* Pill shape */
            border: 1px solid #E5E5E5;
            background: #FFF;
            color: #000;
            outline: none;
            font-weight: 500;
            font-size: 15px;
            transition: 0.2s;
        }
        .search input:focus {
            border-color: #000;
        }
        @media (min-width: 768px){
            .search{ display: block; }
        }

        /* Access / Auth Buttons */
        .auth { display: flex; gap: 12px; align-items: center; }
        
        .btn{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 24px;
            border-radius: 99px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            transition: all 0.2s;
        }
        
        /* Specific Profile Button Style from Image */
        .btn-profile {
            background: #F5F5F5;
            color: #000;
            border: 1px solid #E5E5E5;
        }
        .btn-profile:hover {
            background: #EAEAEA;
            border-color: #CCC;
        }

        .btn-outline{
            background: transparent;
            border: 1px solid #000;
            color: #000;
        }
        .btn-outline:hover{
            background: #000;
            color: #FFF;
        }
        .btn-solid{
            background: #000;
            color: #FFF;
        }
        .btn-solid:hover{
            background: #333;
        }

        main {
            flex: 1;
        }

        footer {
            border-top: 1px solid var(--garis);
            padding: 18px;
            text-align: center;
            color: var(--muted2);
            font-size: 13px;
            margin-top: 60px;
            background: var(--bg);
        }
    </style>
</head>
<body class="font-sans antialiased">
    
    <header>
        <div class="container header-bar">
            <!-- Brand -->
            <a class="brand" href="{{ route('customer.home') }}">
                <div class="brand-logo">Y2K</div>
                <div>
                    <div class="brand-name">Y2K Accessories</div>
                    <div class="brand-tag">ring • necklace • bracelet • sunglasses • charms</div>
                </div>
            </a>

            <!-- Search -->
            <form class="search" action="{{ route('customer.search') }}" method="GET">
                <div class="search-icon">⌕</div>
                <input type="text" name="q" placeholder="Cari aksesoris y2k..." required>
            </form>

            <!-- Auth / Profile -->
            <div class="auth">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('dashboard') }}" class="btn btn-outline">Dashboard</a>
                    @else
                         <a href="{{ route('profile.edit') }}" class="btn btn-profile">Profile</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline">Log in</a>
                    <a href="{{ route('register') }}" class="btn btn-solid">Register</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>
        © {{ date('Y') }} Y2K Accessories — Laravel
    </footer>

</body>
</html>
