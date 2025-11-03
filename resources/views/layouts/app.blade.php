<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pedasan Kunchung')</title>

    {{-- Vite Asset --}}
    @vite(['resources/css/main.css', 'resources/js/main.js'])

    {{-- Favicon --}}
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌶️</text></svg>">

    {{-- Meta Tags --}}
    <meta name="description" content="Gabung sebagai reseller Pedasan Kunchung dan raih untung maksimal dengan snack pedas premium.">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <img src="https://via.placeholder.com/120x40?text=PEDASAN+KUNCHUNG" alt="Pedasan Kunchung Logo">
            </div>
            <button class="nav-btn">Masuk / Daftar</button>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <img src="https://via.placeholder.com/120x40?text=PEDASAN+KUNCHUNG" alt="Pedasan Kunchung Footer Logo">
            </div>
            <div class="footer-text">
                Pedasan Kunchung 2025
            </div>
        </div>
    </footer>
</body>
</html>