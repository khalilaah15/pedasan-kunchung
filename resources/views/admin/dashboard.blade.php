@extends('layouts.admin')

@section('title', 'Admin Dashboard - Pedasan Kunchung')

@vite(['resources/css/admin.css'])

@section('content')

<!-- Notifikasi Sukses -->
@if(session('success'))
    <div style="background: #4caf50; color: white; padding: 10px; border-radius: 6px; margin-bottom: 20px; text-align: center;">
        {{ session('success') }}
    </div>
@endif

<!-- Tab Navigation -->
<div class="tab-nav">
    <a href="{{ route('admin.dashboard') }}" class="tab-btn active">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l1.196 4.785A.5.5 0 0 1 16 9v5a.5.5 0 0 1-.5.5H15.5a.5.5 0 0 1-.5-.5V9h-1v5a.5.5 0 0 1-.5.5H13a.5.5 0 0 1-.5-.5V9h-1v5a.5.5 0 0 1-.5.5H10a.5.5 0 0 1-.5-.5V9h-1v5a.5.5 0 0 1-.5.5H7a.5.5 0 0 1-.5-.5V9H6v5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V9H4v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V9H2a.5.5 0 0 1-.485-.379L1.11 6.917A.5.5 0 0 1 1 6.5v-1A.5.5 0 0 1 1.5 5h1.5v-1A.5.5 0 0 1 3.5 3h1.5v-1A.5.5 0 0 1 5.5 1H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H14.5a.5.5 0 0 1-.491-.592L12.89 3H2.11L.5 1.5ZM1 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 1.5 6H1Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 2.5 7H2Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 3.5 8H3Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 4.5 9H4Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 5.5 10H5Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 6.5 11H6Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 7.5 12H7Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 8.5 13H8Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 9.5 14H9Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 10.5 15H10Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 11.5 16H11Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 12.5 17H12Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 13.5 18H13Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 14.5 19H14Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 15.5 20H15Z"/>
        </svg>
        Katalog
    </a>
    <a href="{{ route('admin.histori') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm2 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 0.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h1Z"/>
        </svg>
        History
    </a>
    <a href="{{ route('admin.marketing') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M10 2a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V2Zm0 12V2h2V12h-2Z"/>
        </svg>
        Marketing Kit
    </a>
    <a href="{{ route('admin.testimoni.index') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M10 2a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V2Zm0 12V2h2V12h-2Z"/>
        </svg>
        Testimoni
    </a>
</div>

<!-- Page Title -->
<h3>Manajemen Katalog</h3>

<!-- Add Product Button -->
<a href="#" class="add-product-btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm2 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 0.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h1Z"/>
    </svg>
    Tambah Produk
</a>

<!-- Product Grid -->
<div class="product-grid">
    @if($products->isEmpty())
        <p style="text-align: center; color: #666;">Belum ada produk.</p>
    @else
        @foreach($products as $product)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ $product->gambar_url }}" alt="{{ $product->nama_katalog }}" style="max-width: 100%; height: auto;">
                </div>
                <div class="product-info">
                    <h3 class="product-title">{{ $product->nama_katalog }}</h3>
                    <p class="product-desc">{{ Str::limit($product->deskripsi_katalog, 50) }}</p>
                    <p class="product-price">{{ $product->hargaFormat }}</p>
                    <div class="product-actions">
                        <button class="edit-btn" data-edit-url="{{ route('admin.products.edit', $product->id_katalog) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M11.49 2.323c.438-.504 1.105-.504 1.543 0 .438.504.438 1.265 0 1.769l-4.5 4.5a1.11 1.11 0 0 1-.665.336 1.11 1.11 0 0 1-.665-.336l-4.5-4.5a1.11 1.11 0 0 1 0-1.769c.438-.504 1.105-.504 1.543 0l4.5 4.5a1.11 1.11 0 0 1 .665.336 1.11 1.11 0 0 1 .665-.336l4.5-4.5Z"/>
                            </svg>
                            Edit
                        </button>

                        <form action="{{ route('admin.products.destroy', $product->id_katalog) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

<!-- Modal Tambah Produk Baru -->
<div class="modal-overlay">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Tambah Produk Baru</h3>
            <button class="close-btn">&times;</button>
        </div>

        @if ($errors->any())
            <div style="background: #f44336; color: white; padding: 12px; border-radius: 6px; margin-bottom: 15px;">
                <strong>Oops! Ada yang salah:</strong>
                <ul style="margin: 8px 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" id="addProductForm" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div style="background: #f44336; color: white; padding: 12px; border-radius: 6px; margin-bottom: 15px;">
                    <strong>Oops! Ada yang salah:</strong>
                    <ul style="margin: 8px 0 0 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="nama_produk" class="label">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" class="input" value="{{ old('nama_produk') }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi" class="label">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="input" rows="3">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="price-stock-container">
                <div class="form-group price-input">
                    <label for="harga" class="label">Harga (Rp)</label>
                    <input type="number" id="harga" name="harga" class="input" value="{{ old('harga', 0) }}" min="0" step="0.01" required>
                </div>
                <div class="form-group stock-input">
                    <label for="stok" class="label">Stok</label>
                    <input type="number" id="stok" name="stok" class="input" value="{{ old('stok', 0) }}" min="0" required>
                </div>
            </div>

            <div class="form-group">
                <label for="file_gambar" class="label">Unggah Gambar</label>
                <input type="file" id="file_gambar" name="file_gambar" class="input" accept="image/*" required>
                <small style="color: #666;">Maksimal 2MB, format: JPG, PNG, GIF</small>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-red">Simpan</button>
                <button type="button" class="btn btn-white">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Produk -->
<div class="modal-overlay-edit">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Edit Produk</h3>
            <button class="close-btn-edit">&times;</button>
        </div>

        <form action="" method="POST" id="editProductForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" id="edit_id" name="id">

            <div class="form-group">
                <label for="edit_nama_produk" class="label">Nama Produk</label>
                <input type="text" id="edit_nama_produk" name="nama_produk" class="input" required>
            </div>

            <div class="form-group">
                <label for="edit_deskripsi" class="label">Deskripsi</label>
                <textarea id="edit_deskripsi" name="deskripsi" class="input" rows="3"></textarea>
            </div>

            <div class="price-stock-container">
                <div class="form-group price-input">
                    <label for="edit_harga" class="label">Harga (Rp)</label>
                    <input type="number" id="edit_harga" name="harga" class="input" min="0" step="0.01" required>
                </div>
                <div class="form-group stock-input">
                    <label for="edit_stok" class="label">Stok</label>
                    <input type="number" id="edit_stok" name="stok" class="input" min="0" required>
                </div>
            </div>

            <div class="form-group">
                <label for="edit_file_gambar" class="label">Ganti Gambar (opsional)</label>
                <input type="file" id="edit_file_gambar" name="file_gambar" class="input" accept="image/*">
                <small style="color: #666;">Biarkan kosong jika tidak ingin ganti gambar</small>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-red">Simpan Perubahan</button>
                <button type="button" class="btn btn-white btn-batal-edit">Batal</button>
            </div>
        </form>
    </div>
</div>
@endsection