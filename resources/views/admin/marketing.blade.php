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
    <a href="#" class="tab-btn active">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M10 2a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V2Zm0 12V2h2V12h-2Z"/>
        </svg>
        Marketing Kit
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
                <div class="card-actions">
                    <a href="#" class="btn btn-white copy-btn" data-text="{{ $kit->deskripsi }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M2.5 4a1 1 0 0 1 1-1H5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3.5a1 1 0 0 1-1-1V4zm0 3a1 1 0 0 1 1-1H5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3.5a1 1 0 0 1-1-1V7zm0 3a1 1 0 0 1 1-1H5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3.5a1 1 0 0 1-1-1v-1z"/>
                        </svg>
                        Copy
                    </a>
                    <a href="{{ $kit->gambar_url }}" download class="btn btn-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1-.5v2.5a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v8.793L5.354 9.146a.5.5 0 1 0-.708.708l2 2z"/>
                        </svg>
                        Download
                    </a>
                </div>
            </div>
            <div class="card-actions">
                <button class="btn btn-white edit-btn" data-id="{{ $kit->id_marketing_kit }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11.49 2.323c.438-.504 1.105-.504 1.543 0 .438.504.438 1.265 0 1.769l-4.5 4.5a1.11 1.11 0 0 1-.665.336 1.11 1.11 0 0 1-.665-.336l-4.5-4.5a1.11 1.11 0 0 1 0-1.769c.438-.504 1.105-.504 1.543 0l4.5 4.5a1.11 1.11 0 0 1 .665.336 1.11 1.11 0 0 1 .665-.336l4.5-4.5Z"/>
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

        <form>
            <div class="form-group">
                <label for="judul" class="label">Judul</label>
                <input type="text" id="judul" class="input" placeholder="Judul marketing kit" value="Judul marketing kit">
            </div>

            <div class="form-group">
                <label for="deskripsi" class="label">Deskripsi</label>
                <textarea id="deskripsi" class="input" rows="3" placeholder="Deskripsi untuk promosi">Deskripsi untuk promosi</textarea>
            </div>

            <div class="form-group">
                <label for="url_gambar" class="label">URL Gambar</label>
                <input type="text" id="url_gambar" class="input" placeholder="https://..." value="https://...">
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-red">Simpan</button>
                <button type="button" class="btn btn-white">Batal</button>
            </div>
        </form>
    </div>
</div>
@endsection