<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pedasan Kunchung')</title>

    {{-- Vite Asset --}}
    @vite(['resources/css/main.css', 'resources/js/main.js'])

    <!-- Before closing body tag -->
    @vite(['resources/js/app.js', 'resources/js/testimoni.js'])

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
                <img src="{{ asset('images/pedasan-kunchung.png') }}" alt="Pedasan Kunchung Logo" style="max-width: 100%; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
            </div>
            <form>
                <button class="nav-btn" formaction="{{ route('login') }}">Masuk / Daftar</button>
            </form>
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
                <img src="{{ asset('images/pedasan-kunchung.png') }}" alt="Pedasan Kunchung" style="height: 40px;">
            </div>
            <p class="footer-text">Pedasan Kunchung 2025</p>
        </div>
    </footer>
</body>
</html>