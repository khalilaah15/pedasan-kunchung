<!-- resources/views/landing.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedasan Kunchung - Reseller Snack Pedas Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#CC0000',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav id="navbar" style="position: fixed; top: 0; left: 0; right: 0; z-index: 9999;">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div style="background-color: #CC0000;" class="text-white px-3 py-2 rounded shadow-lg">
                        <div class="text-sm font-bold leading-tight">PEDASAN<br>KUNCHUNG</div>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="#beranda" id="navLink" class="font-medium" style="color: white; text-shadow: 0 1px 3px rgba(0,0,0,0.3);">Beranda</a>
                    <button id="navButton" class="px-6 py-2 rounded-full font-semibold shadow-md" style="background-color: white; color: #CC0000; border: 2px solid white;">
                        Masuk / Daftar
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" style="background-color: #CC0000;" class="text-white py-20 relative overflow-hidden">
        <div class="container mx-auto px-6 pt-20">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="z-10">
                    <div class="inline-block bg-orange-500 text-white px-4 py-2 rounded-full text-sm font-semibold mb-6">
                        <i class="fas fa-fire mr-2"></i>🔥 Snack Pedas Lezat!
                    </div>
                    <h1 class="text-5xl font-bold mb-6 leading-tight">
                        Raih Untung Maksimal dengan Pedasan Kunchung
                    </h1>
                    <p class="text-lg mb-8 text-gray-100">
                        Gabung sebagai reseller dan dapatkan akses ke produk snack pedas pilihan, marketing kit lengkap, dan dukungan penuh untuk kesuksesan bisnis Anda.
                    </p>
                    <button class="bg-white px-8 py-4 rounded-full font-bold text-lg inline-flex items-center hover:bg-gray-100 transition" style="color: #CC0000;">
                        Mulai Sekarang
                        <i class="fas fa-arrow-right ml-3"></i>
                    </button>
                </div>
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1599490659213-e2b9527bd087?w=800&h=800&fit=crop" 
                         alt="Makaroni Pedas" 
                         class="rounded-full w-full max-w-md mx-auto shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="font-semibold mb-2 block" style="color: #CC0000;">Tentang Kami</span>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Kenapa Pilih Pedasan Kunchung?
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    PedasKing adalah brand snack pedas premium yang telah dipercaya ribuan reseller di seluruh Indonesia. Kami menyediakan produk berkualitas dengan sistem kemitraan yang menguntungkan.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="card bg-white p-8 rounded-2xl shadow-lg text-center border border-gray-100">
                    <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-box text-2xl" style="color: #CC0000;"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Produk Berkualitas</h3>
                    <p class="text-gray-600">
                        Snack pedas pilihan dengan bahan berkualitas dan rasa yang konsisten
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="card bg-white p-8 rounded-2xl shadow-lg text-center border border-gray-100">
                    <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-chart-line text-2xl" style="color: #CC0000;"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Margin Menguntungkan</h3>
                    <p class="text-gray-600">
                        Dapatkan keuntungan maksimal dengan harga reseller spesial
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="card bg-white p-8 rounded-2xl shadow-lg text-center border border-gray-100">
                    <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-star text-2xl" style="color: #CC0000;"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Support Penuh</h3>
                    <p class="text-gray-600">
                        Marketing kit lengkap dan dukungan tim untuk kesuksesan bisnis Anda
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-20" style="background-color: #CC0000;">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="bg-white px-4 py-2 rounded-full font-semibold mb-4 inline-block" style="color: #CC0000;">
                    Katalog Produk
                </span>
                <h2 class="text-4xl font-bold text-white mb-4">
                    Produk Snack Pedas Pilihan
                </h2>
                <p class="text-gray-100 max-w-2xl mx-auto">
                    Berbagai varian rasa pedas yang pasti disukai pelanggan Anda
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Product 1 -->
                <div class="card bg-white rounded-2xl overflow-hidden shadow-xl">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1621939514649-280e2ee25f60?w=600&h=400&fit=crop" 
                             alt="Makaroni Pedas" 
                             class="w-full h-64 object-cover">
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Best Seller
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Makaroni Pedas</h3>
                        <p class="text-gray-600 mb-4">Pedas dikali super! terbaik hingga panas</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold" style="color: #CC0000;">Rp 333.333</span>
                            <button class="btn-primary text-white px-4 py-2 rounded-lg font-semibold">
                                <i class="fas fa-shopping-cart mr-2"></i>Pesan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="card bg-white rounded-2xl overflow-hidden shadow-xl">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1599490659213-e2b9527bd087?w=600&h=400&fit=crop" 
                             alt="Makaroni Pedas" 
                             class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Makaroni Pedas</h3>
                        <p class="text-gray-600 mb-4">Pedas dikali super! terbaik hingga panas</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold" style="color: #CC0000;">Rp 333.333</span>
                            <button class="btn-primary text-white px-4 py-2 rounded-lg font-semibold">
                                <i class="fas fa-shopping-cart mr-2"></i>Pesan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="card bg-white rounded-2xl overflow-hidden shadow-xl">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1621939514649-280e2ee25f60?w=600&h=400&fit=crop" 
                             alt="Makaroni Pedas" 
                             class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-gray-800">Makaroni Pedas</h3>
                        <p class="text-gray-600 mb-4">Pedas dikali super! terbaik hingga panas</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold" style="color: #CC0000;">Rp 333.333</span>
                            <button class="btn-primary text-white px-4 py-2 rounded-lg font-semibold">
                                <i class="fas fa-shopping-cart mr-2"></i>Pesan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="font-semibold mb-2 block" style="color: #CC0000;">Testimoni</span>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Apa Kata Reseller Kami
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Ribuan reseller telah sukses berbisnis bersama Pedasan Kunchung
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="card bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex mb-4">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <p class="text-gray-700 mb-6 italic">
                        "Snack pedasnya laris banget! Pelanggan selalu repeat order. Untungnya juga lumayan."
                    </p>
                    <div class="border-t pt-4">
                        <p class="font-bold text-gray-800">Ibu Siti</p>
                        <p class="text-gray-600 text-sm">Reseller Jakarta</p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="card bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex mb-4">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <p class="text-gray-700 mb-6 italic">
                        "Marketing kitnya sangat membantu untuk promosi di sosmed. Penjualan meningkat drastis!"
                    </p>
                    <div class="border-t pt-4">
                        <p class="font-bold text-gray-800">Pak Budi</p>
                        <p class="text-gray-600 text-sm">Reseller Bandung</p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="card bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex mb-4">
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                        <i class="fas fa-star star"></i>
                    </div>
                    <p class="text-gray-700 mb-6 italic">
                        "Pelayanan cepat, stok selalu ready. Cocok banget buat yang bisnis sampingan."
                    </p>
                    <div class="border-t pt-4">
                        <p class="font-bold text-gray-800">Mbak Rina</p>
                        <p class="text-gray-600 text-sm">Reseller Surabaya</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="text-white py-20" style="background-color: #CC0000;">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">
                Siap Memulai Bisnis Pedasan Kunchung?
            </h2>
            <p class="text-lg mb-8 text-gray-100 max-w-2xl mx-auto">
                Daftar sekarang dan dapatkan akses penuh ke katalog produk, sistem pemesanan, dan marketing kit lengkap untuk mendukung bisnis Anda
            </p>
            <button class="bg-white px-10 py-4 rounded-full font-bold text-lg inline-flex items-center hover:bg-gray-100 transition" style="color: #CC0000;">
                Daftar Sebagai Reseller
                <i class="fas fa-arrow-right ml-3"></i>
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="text-white px-3 py-2 rounded" style="background-color: #CC0000;">
                        <div class="text-sm font-bold leading-tight">PEDASAN<br>KUNCHUNG</div>
                    </div>
                </div>
                <div class="text-gray-400">
                    Pedasan Kunchung 2025
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>