@extends('layouts.dashboard')

@section('title', 'Dashboard Reseller - Pedasan Kunchung')

@section('content')

@php
use Illuminate\Support\Str;
@endphp

<!-- Tab Navigation -->
<div class="tab-nav">
    <a href="{{ route('dashboard') }}" class="tab-btn active">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l1.196 4.785A.5.5 0 0 1 16 9v5a.5.5 0 0 1-.5.5H15.5a.5.5 0 0 1-.5-.5V9h-1v5a.5.5 0 0 1-.5.5H13a.5.5 0 0 1-.5-.5V9h-1v5a.5.5 0 0 1-.5.5H10a.5.5 0 0 1-.5-.5V9h-1v5a.5.5 0 0 1-.5.5H7a.5.5 0 0 1-.5-.5V9H6v5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V9H4v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V9H2a.5.5 0 0 1-.485-.379L1.11 6.917A.5.5 0 0 1 1 6.5v-1A.5.5 0 0 1 1.5 5h1.5v-1A.5.5 0 0 1 3.5 3h1.5v-1A.5.5 0 0 1 5.5 1H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H14.5a.5.5 0 0 1-.491-.592L12.89 3H2.11L.5 1.5ZM1 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 1.5 6H1Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 2.5 7H2Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 3.5 8H3Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 4.5 9H4Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 5.5 10H5Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 6.5 11H6Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 7.5 12H7Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 8.5 13H8Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 9.5 14H9Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 10.5 15H10Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 11.5 16H11Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 12.5 17H12Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 13.5 18H13Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 14.5 19H14Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 15.5 20H15Z"/>
        </svg>
        Katalog
    </a>
    <a href="{{ route('dashboard.histori') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm2 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 0.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h1Z"/>
        </svg>
        Histori
    </a>
    <a href="{{ route('dashboard.marketing') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M10 2a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V2Zm0 12V2h2V12h-2Z"/>
        </svg>
        Marketing Kit
    </a>
    <a href="{{ route('testimoni.saya') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M10 2a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V2Zm0 12V2h2V12h-2Z"/>
        </svg>
        Testimoni
    </a>
</div>

<!-- Product Catalog -->
<h3>Katalog Produk</h3>

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
                    <button class="add-to-cart-btn" 
                            data-id="{{ $product->id_katalog }}"
                            data-name="{{ $product->nama_katalog }}"
                            data-price="{{ $product->harga_katalog }}"
                            data-image="{{ $product->file_katalog }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm14 0H2v12h12V2zm-8 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                        Tambah ke Keranjang
                    </button>
                </div>
            </div>
        @endforeach
    @endif
</div>

<!-- Modal Tambah ke Keranjang -->
<div class="modal-overlay-cart">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Tambah ke Keranjang</h3>
            <button class="close-btn-cart">&times;</button>
        </div>

        <form id="add-to-cart-form">
            @csrf
            <input type="hidden" name="id_katalog" id="modal_product_id">

            <div class="form-group">
                <label for="modal_product_name" class="label">Nama Produk</label>
                <input type="text" id="modal_product_name" class="input" readonly>
            </div>

            <div class="form-group">
                <label for="modal_product_price" class="label">Harga</label>
                <input type="text" id="modal_product_price" class="input" readonly>
            </div>

            <div class="form-group">
                <label for="modal_qty" class="label">Jumlah</label>
                <input type="number" id="modal_qty" name="qty" class="input" value="" min="0" required placeholder="Masukkan jumlah">
            </div>

            <div class="form-group">
                <label for="modal_catatan" class="label">Catatan</label>
                <textarea id="modal_catatan" name="catatan" class="input" rows="2" placeholder="Contoh: Sambal ekstra pedas"></textarea>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-red">Tambah ke Keranjang</button>
                <button type="button" class="btn btn-white btn-cancel-cart">Batal</button>
            </div>
        </form>
    </div>
</div>
@endsection