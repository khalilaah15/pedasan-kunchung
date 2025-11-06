<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pedasan Kunchung')</title>

    {{-- Vite Asset --}}
    @vite(['resources/css/auth.css', 'resources/js/auth.js'])

    {{-- Favicon --}}
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌶️</text></svg>">
</head>
<body>
    <div class="auth-container">
        @yield('content')
    </div>
</body>
</html>