@extends('layouts.auth')

@section('title', 'Masuk - Pedasan Kunchung')

@section('content')

<!-- Success Message -->
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<!-- Error Message -->
@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<a href="/" class="back-link">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
    </svg>
    Kembali
</a>

<div class="logo">
    <img src="{{ asset('images/pedasan-kunchung-login.png') }}" alt="Pedasan Kunchung Logo">
</div>

<h2 class="title">Pedasan Kunchung</h2>
<p class="subtitle">Sistem Manajemen Reseller</p>

<div class="tab-selector">
    <div class="tab-btn active" data-target="login-form">Masuk</div>
    <div class="tab-btn" data-target="register-form">Daftar</div>
</div>

<!-- Login Form -->
<!-- Login Form -->
<div id="login-form" class="form-section">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="login-email" class="label">Email</label>
            <input type="email" id="login-email" name="email" class="input" value="{{ old('email') }}" placeholder="email@example.com" required autofocus>
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="login-password" class="label">Password</label>
            <input type="password" id="login-password" name="password" class="input" placeholder="********" required>
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="submit-btn">Masuk</button>
    </form>
</div>

<!-- Register Form -->
<div id="register-form" class="form-section" style="display: none;">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="reg-nama" class="label">Nama Lengkap</label>
            <input type="text" id="reg-nama" name="nama" class="input" value="{{ old('nama') }}" placeholder="Nama lengkap" required>
            @error('nama')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- <div class="form-group">
            <label for="reg-nama_toko" class="label">Nama Toko</label>
            <input type="text" id="reg-nama_toko" name="nama_toko" class="input" value="{{ old('nama_toko') }}" placeholder="Nama toko" required>
            @error('nama_toko')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div> -->
        <div class="form-group">
            <label for="reg-email" class="label">Email</label>
            <input type="email" id="reg-email" name="email" class="input" value="{{ old('email') }}" placeholder="email@example.com" required>
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="reg-password" class="label">Password</label>
            <input type="password" id="reg-password" name="password" class="input" placeholder="********" required>
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="reg-password_confirmation" class="label">Konfirmasi Password</label>
            <input type="password" id="reg-password_confirmation" name="password_confirmation" class="input" placeholder="********" required>
        </div>
        <button type="submit" class="submit-btn">Daftar</button>
    </form>
</div>
@endsection