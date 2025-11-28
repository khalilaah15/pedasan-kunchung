@extends('layouts.app')

@section('title', 'Raih Untung Maksimal dengan Pedasan Kunchung')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <span class="tag tag-orange">#1 Snack Pedas Terlaris</span>
                <h1>Raih Untung Maksimal dengan Pedasan Kunchung</h1>
                <p>Gabung sebagai reseller dan dapatkan akses ke produk snack pedas pilihan, marketing kit lengkap, dan dukungan penuh.</p>
                <a href="#" class="btn btn-white">Mulai Sekarang →</a>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/piring-main.png') }}" alt="Snack Pedas Premium">
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container" style="text-align: center;">
            <span class="tag tag-pink">Tentang Kami</span>
            <h2 class="about-title">Kenapa Pilih Pedasan Kunchung?</h2>
            <p class="about-text text-center">PedasKing adalah brand snack pedas premium yang telah dipercaya ribuan reseller di seluruh Indonesia. Kami menyediakan produk berkualitas dengan sistem kemitraan yang menguntungkan.</p>

            <div class="feature-cards">
                <div class="feature-card">
                    <div class="feature-icon">🛒</div>
                    <h3 class="feature-title">Produk Berkualitas</h3>
                    <p class="feature-desc">Snack pedas pilihan dengan bahan berkualitas dan rasa yang konsisten</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📈</div>
                    <h3 class="feature-title">Margin Menguntungkan</h3>
                    <p class="feature-desc">Dapatkan keuntungan maksimal dengan harga reseller special</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⭐</div>
                    <h3 class="feature-title">Support Penuh</h3>
                    <p class="feature-desc">Marketing kit lengkap dan dukungan tim untuk kesuksesan bisnis Anda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products">
        <div class="container" style="text-align: center;">
            <span class="tag tag-pink">Katalog Produk</span>
            <h2 class="products-title">Produk Snack Pedas Pilihan</h2>
            <p class="products-subtitle text-center">Berbagai varian rasa pedas yang pasti disukai pelanggan Anda</p>

            <div class="product-grid">
                @if($products->isEmpty())
                    <p style="text-align: center; color: #666; grid-column: 1 / -1;">Belum ada produk tersedia.</p>
                @else
                    @foreach($products as $product)
                        <div class="product-card">
                            <div class="product-image">
                                <!-- Tampilkan gambar dari storage -->
                                <img src="{{ asset('storage/' . $product->file_katalog) }}" 
                                    alt="{{ $product->nama_katalog }}"
                                    onerror="this.src='https://via.placeholder.com/300x200?text=No+Image'">
                                
                                <!-- Badge stok -->
                                <span class="stock-badge">Stok: {{ $product->stok_katalog }}</span>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">{{ $product->nama_katalog }}</h3>
                                <p class="product-desc">{{ Str::limit($product->deskripsi_katalog, 60) }}</p>
                                <p class="product-price">{{ $product->hargaFormat }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container" style="text-align: center;">
            <span class="tag tag-pink">Testimoni</span>
            <h2 class="testimonials-title">Apa Kata Reseller Kami</h2>
            <p class="testimonials-subtitle text-center">Ribuan reseller telah sukses berbisnis bersama Pedasan Kunchung</p>

            <div class="testimonial-grid">
                @php
                    // Ambil 3 testimoni yang sudah disetujui dari database
                    use App\Models\Testimoni;
                    $testimonials = Testimoni::with('user')
                        ->where('disetujui', true)
                        ->orderBy('created_at', 'desc')
                        ->limit(3)
                        ->get();
                @endphp

                @foreach($testimonials as $testimonial)
                    <div class="testimonial-card">
                        <!-- Rating Stars -->
                        <div class="stars">
                            @for($i = 1; $i <= 5; $i++)
                                <span style="color: {{ $i <= $testimonial->rating ? '#fbbf24' : '#d1d5db' }}; font-size: 18px;">
                                    ★
                                </span>
                            @endfor
                        </div>
                        
                        <p class="testimonial-text">"{{ $testimonial->pesan }}"</p>
                        <p class="testimonial-author">{{ $testimonial->user->nama ?? 'Reseller' }}</p>
                        <p class="testimonial-role">
                            @if($testimonial->user && !empty($testimonial->user->nama_toko))
                                {{ $testimonial->user->nama_toko }}
                            @else
                                Reseller Setia
                            @endif
                        </p>
                    </div>
                @endforeach

                <!-- Jika testimoni dari database kurang dari 3, tampilkan dummy -->
                @if($testimonials->count() < 3)
                    @php
                        $dummyCount = 3 - $testimonials->count();
                        $dummyTestimonials = [
                            [
                                'rating' => 5,
                                'pesan' => 'Snack pedasnya laris banget! Pelanggan selalu repeat order. Untungnya juga lumayan.',
                                'author' => 'Ibu Siti',
                                'role' => 'Reseller Jakarta'
                            ],
                            [
                                'rating' => 5, 
                                'pesan' => 'Marketing kitnya sangat membantu untuk promosi di sosmed. Penjualan meningkat drastis!',
                                'author' => 'Pak Budi',
                                'role' => 'Reseller Bandung'
                            ],
                            [
                                'rating' => 5,
                                'pesan' => 'Pelayanan cepat, stok selalu ready. Cocok banget buat yang mau bisnis sampingan.',
                                'author' => 'Mbak Rina', 
                                'role' => 'Reseller Surabaya'
                            ]
                        ];
                    @endphp

                    @for($i = 0; $i < $dummyCount; $i++)
                        <div class="testimonial-card">
                            <div class="stars">
                                @for($j = 1; $j <= 5; $j++)
                                    <span style="color: {{ $j <= $dummyTestimonials[$i]['rating'] ? '#fbbf24' : '#d1d5db' }}; font-size: 18px;">
                                        ★
                                    </span>
                                @endfor
                            </div>
                            <p class="testimonial-text">"{{ $dummyTestimonials[$i]['pesan'] }}"</p>
                            <p class="testimonial-author">{{ $dummyTestimonials[$i]['author'] }}</p>
                            <p class="testimonial-role">{{ $dummyTestimonials[$i]['role'] }}</p>
                        </div>
                    @endfor
                @endif
            </div>

            <!-- Tombol untuk melihat lebih banyak testimoni -->
            <div style="margin-top: 2rem;">
                <a href="{{ route('testimoni.saya') }}" class="btn btn-outline">
                    Lihat Semua Testimoni
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2 class="cta-title">Siap Memulai Bisnis Pedasan Kunchung?</h2>
            <p class="cta-text">Daftar sekarang dan dapatkan akses penuh ke katalog produk, sistem pemesanan, dan marketing kit lengkap untuk mendukung bisnis Anda.</p>
            <a href="{{ route('login') }}" class="btn btn-white">Daftar Sebagai Reseller →</a>
        </div>
    </section>
@endsection