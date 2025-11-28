@extends('layouts.admin')

@section('title', 'Marketing Kit - Admin Dashboard')

@vite(['resources/css/admin-marketing.css', 'resources/js/admin-marketing.js'])

@section('content')
<!-- Tab Navigation -->
<div class="tab-nav">
    <a href="{{ route('admin.dashboard') }}" class="tab-btn">
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
    <a href="{{ route('admin.marketing') }}" class="tab-btn active">
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
<h3>Marketing Kit</h3>

<!-- Add Kit Button -->
<a href="#" class="add-kit-btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm2 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 0.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h1Z"/>
    </svg>
    Tambah Kit
</a>

<!-- Card Grid -->
<div class="card-grid">
    @forelse($kits as $kit)
        <div class="marketing-card">
            <div class="card-image">
                <img src="{{ $kit->gambar_url }}" alt="{{ $kit->judul }}">
            </div>
            <div class="card-info">
                <h3 class="card-title">{{ $kit->judul }}</h3>
                <p class="card-desc">{{ Str::limit($kit->deskripsi, 100) }}</p>
            </div>
            <div class="card-actions">
                <button class="btn btn-white edit-btn" data-id="{{ $kit->id_marketing_kit }}" data-bs-toggle="modal" data-bs-target="#editMarketingKitModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.94l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                    Edit
                </button>
                <form action="{{ route('admin.marketing.destroy', $kit->id_marketing_kit) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-white delete-btn" onclick="return confirm('Yakin hapus?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-center" style="grid-column: 1 / -1;">Belum ada marketing kit.</p>
    @endforelse
</div>

<!-- Modal Tambah Kit -->
<div class="modal-overlay">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Tambah Marketing Kit</h3>
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

        <form action="{{ route('admin.marketing.store') }}" 
              method="POST" 
              enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="judul" class="label">Judul</label>
                <input type="text" id="judul" name="judul" class="input" value="{{ old('judul') }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi" class="label">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="input" rows="3">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="form-group">
                <label for="file_gambar" class="label">Upload Gambar</label>
                <input type="file" id="file_gambar" name="file_gambar" class="input" accept="image/*" required>
                <small style="color: #666;">Maksimal 2MB, format: JPG, PNG, GIF, SVG</small>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-red">Simpan</button>
                <button type="button" class="btn btn-white close-modal">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Marketing Kit -->
<div class="modal-overlay-edit">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Edit Marketing Kit</h3>
            <button class="close-btn-edit">&times;</button>
        </div>

        <form action="" method="POST" id="editMarketingKitForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" id="edit_id" name="id">

            <div class="form-group">
                <label for="edit_judul" class="label">Judul Marketing Kit</label>
                <input type="text" id="edit_judul" name="judul" class="input" required>
            </div>

            <div class="form-group">
                <label for="edit_deskripsi" class="label">Deskripsi</label>
                <textarea id="edit_deskripsi" name="deskripsi" class="input" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="edit_file_gambar" class="label">Ganti File Gambar (opsional)</label>
                <input type="file" id="edit_file_gambar" name="file_gambar" class="input" accept="image/*">
                <small style="color: #666;">Biarkan kosong jika tidak ingin ganti gambar</small>
            </div>

            <div class="form-group">
                <label class="label">Gambar Saat Ini</label>
                <div id="currentImageInfo" class="current-file-info">
                    <img id="currentImagePreview" src="" alt="Preview" style="max-width: 200px; max-height: 150px; display: none; margin-bottom: 8px;">
                    <span id="currentImageName" style="color: #666;">-</span>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-red">Simpan Perubahan</button>
                <button type="button" class="btn btn-white btn-batal-edit">Batal</button>
            </div>
        </form>
    </div>
</div>
@endsection