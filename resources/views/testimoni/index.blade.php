@extends('layouts.app')

@section('title', 'Testimoni Pelanggan')

@vite(['resources/css/testimoni.css'])

@section('content')
<div class="testimoni-container">
    <div class="testimoni-header">
        <div>
            <h1 class="testimoni-title">Testimoni Pelanggan</h1>
            <p class="testimoni-subtitle">Lihat apa kata pelanggan tentang kami</p>
        </div>
        @auth
        <div class="testimoni-actions">
            <a href="{{ route('testimoni.saya') }}" class="testimoni-btn testimoni-btn-primary">
                <svg class="testimoni-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Testimoni Saya
            </a>
            <a href="{{ route('testimoni.create') }}" class="testimoni-btn testimoni-btn-success">
                <svg class="testimoni-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Beri Testimoni
            </a>
        </div>
        @endauth
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($testimoni->count() > 0)
        <div class="testimoni-grid">
            @foreach($testimoni as $item)
                <div class="testimoni-card">
                    <div class="testimoni-card-header">
                        <div class="avatar-icon testimoni-avatar">
                            {{ substr($item->user->name, 0, 1) }}
                        </div>
                        <div class="testimoni-user-info">
                            <div class="testimoni-user-name">{{ $item->user->name }}</div>
                            <div class="testimoni-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="rating-star-icon {{ $i <= $item->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="testimoni-message">{{ $item->pesan }}</p>
                    <div class="testimoni-card-footer">
                        <span class="testimoni-date">{{ $item->created_at->translatedFormat('d M Y') }}</span>
                        <span class="testimoni-status status-approved">Disetujui</span>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="testimoni-empty">
            <svg class="empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
            </svg>
            <h3 class="empty-title">Belum ada testimoni</h3>
            <p class="empty-description">Jadilah yang pertama memberikan testimoni!</p>
            @auth
            <a href="{{ route('testimoni.create') }}" class="testimoni-btn testimoni-btn-primary">
                Beri Testimoni Pertama
            </a>
            @else
            <a href="{{ route('login') }}" class="testimoni-btn testimoni-btn-primary">
                Login untuk Beri Testimoni
            </a>
            @endauth
        </div>
    @endif
</div>
@endsection