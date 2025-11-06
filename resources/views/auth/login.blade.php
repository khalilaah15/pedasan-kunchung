@extends('layouts.auth')

@section('title', 'Masuk - Pedasan Kunchung')

@section('content')
<a href="/" class="back-link">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
    </svg>
    Kembali
</a>

<div class="logo">
    <img src="https://via.placeholder.com/80x80?text=PEDASAN+KUNCHUNG" alt="Pedasan Kunchung Logo">
</div>

<h2 class="title">Pedasan Kunchung</h2>
<p class="subtitle">Sistem Manajemen Reseller</p>

<div class="tab-selector">
    <div class="tab-btn active" data-target="login-form">Masuk</div>
    <div class="tab-btn" data-target="register-form">Daftar</div>
</div>

<!-- Login Form -->
<div id="login-form" class="form-section">
    <form action="/dashboard">
        <div class="form-group">
            <label for="email" class="label">Email</label>
            <input type="email" id="email" class="input" placeholder="email@example.com">
        </div>
        <div class="form-group">
            <label for="password" class="label">Password</label>
            <input type="password" id="password" class="input" placeholder="********">
        </div>
        <button type="submit" class="submit-btn">Masuk</button>
    </form>
</div>

<!-- Register Form -->
<div id="register-form" class="form-section" style="display: none;">
    <form>
        <div class="form-group">
            <label for="reg-nama" class="label">Nama Lengkap</label>
            <input type="nama" id="reg-nama" class="input" placeholder="nama lengkap">
        </div>
        <div class="form-group">
            <label for="reg-email" class="label">Email</label>
            <input type="email" id="reg-email" class="input" placeholder="email@example.com">
        </div>
        <div class="form-group">
            <label for="reg-password" class="label">Password</label>
            <input type="password" id="reg-password" class="input" placeholder="********">
        </div>
        <div class="form-group">
            <label for="reg-confirm" class="label">Konfirmasi Password</label>
            <input type="password" id="reg-confirm" class="input" placeholder="********">
        </div>
        <button type="submit" class="submit-btn">Daftar</button>
    </form>
</div>
@endsection