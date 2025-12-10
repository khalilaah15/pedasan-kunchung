<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Reseller - Pedasan Kunchung')</title>

    {{-- Vite Asset --}}
    @vite(['resources/css/dashboard.css', 'resources/js/dashboard.js'])

    {{-- Font Awesome untuk ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('scripts')

    {{-- Favicon --}}
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌶️</text></svg>">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <img src="{{ asset('images/pedasan-kunchung.png') }}" alt="Pedasan Kunchung Logo" style="max-width: 100%; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
        </div>
        <div class="welcome">
            <strong>Dashboard Reseller</strong><br>
            Selamat Datang, {{ Auth::user()->name ?? 'Reseller' }}
        </div>
        <div class="nav-buttons">
            <!-- Keranjang Button -->
            <a href="{{ route('cart.index') }}" class="btn btn-white cart-btn">
                <i class="fas fa-shopping-cart"></i>
                <span class="btn-text">Keranjang</span>
                <span class="badge">
                    {{ session()->get('cart') ? collect(session('cart'))->sum('qty') : 0 }}
                </span>
            </a>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <button type="submit" class="btn btn-white">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="btn-text">Logout</span>
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>
</body>
</html>