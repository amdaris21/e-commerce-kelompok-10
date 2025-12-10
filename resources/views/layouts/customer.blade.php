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
        :root {
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
            --pink-light: #ffafc4ff;
        }

        body {
            background: var(--bg);
            color: var(--teks);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        /* Common Components */
        .btn { display: inline-flex; align-items: center; justify-content: center; gap: 8px; padding: 10px 14px; border-radius: 16px; text-decoration: none; font-weight: 800; font-size: 14px; transition: 0.2s; }
        .btn-outline { background: var(--panel); border: 1px solid var(--garis); color: var(--teks); }
        .btn-outline:hover { background: var(--panel2); }
        .btn-solid { background: var(--putih); color: var(--hitam); border: 1px solid #EAEAEA; }
        .btn-solid:hover { background: #EEE; }

        .container { max-width: 1120px; margin: 0 auto; padding: 0 16px; }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased bg-[#0B0B0B] text-[#F2F2F2]">
    <div class="min-h-screen flex flex-col">
        <!-- Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
