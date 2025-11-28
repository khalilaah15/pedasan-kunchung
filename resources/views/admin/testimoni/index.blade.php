@extends('layouts.admin')

@section('title', 'Admin Dashboard - Pedasan Kunchung')

@vite(['resources/css/testimoni.css'])

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
    <a href="{{ route('admin.marketing') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M10 2a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V2Zm0 12V2h2V12h-2Z"/>
        </svg>
        Marketing Kit
    </a>
    <a href="{{ route('admin.testimoni.index') }}" class="tab-btn active">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M10 2a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V2Zm0 12V2h2V12h-2Z"/>
        </svg>
        Testimoni
    </a>
</div>

<div class="testimoni-container">
    <h1 class="testimoni-title">Kelola Testimoni</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="testimoni-stats">
        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-icon stat-icon-blue">
                    <svg class="stats-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2v-1"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Total Testimoni</div>
                    <div class="stat-value">{{ $stats['total'] ?? 0 }}</div>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-icon stat-icon-green">
                    <svg class="stats-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Disetujui</div>
                    <div class="stat-value">{{ $stats['disetujui'] ?? 0 }}</div>
                </div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-card-content">
                <div class="stat-icon stat-icon-yellow">
                    <svg class="stats-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <div class="stat-label">Menunggu</div>
                    <div class="stat-value">{{ $stats['menunggu'] ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimoni-table-container">
        <table class="testimoni-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Testimoni</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimoni as $item)
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center;">
                                <div class="avatar-icon" style="background-color: #3b82f6;">
                                    {{ $item->user ? substr($item->user->nama, 0, 1) : '?' }}
                                </div>
                                <div style="margin-left: 12px;">
                                    <div style="font-weight: 600; color: #1f2937; font-size: 0.875rem;">
                                        {{ $item->user->nama ?? 'User Tidak Ditemukan' }}
                                    </div>
                                    <div style="color: #6b7280; font-size: 0.75rem;">
                                        {{ $item->user->email ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="testimoni-message">{{ Str::limit($item->pesan, 80) }}</div>
                        </td>
                        <td>
                            <div class="testimoni-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="rating-star-icon" fill="currentColor" viewBox="0 0 20 20" style="color: {{ $i <= $item->rating ? '#fbbf24' : '#d1d5db' }};">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                        </td>
                        <td>
                            <span class="testimoni-status {{ $item->disetujui ? 'status-approved' : 'status-pending' }}">
                                {{ $item->disetujui ? 'Disetujui' : 'Menunggu' }}
                            </span>
                        </td>
                        <td>
                            <span class="testimoni-date">{{ $item->created_at->translatedFormat('d M Y') }}</span>
                        </td>
                        <td>
                            <div class="testimoni-actions" style="gap: 4px; flex-wrap: wrap;">
                                @if(!$item->disetujui)
                                    <form action="{{ route('admin.testimoni.approve', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="testimoni-btn testimoni-btn-success" style="padding: 4px 8px; font-size: 0.75rem;">
                                            Setujui
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.testimoni.reject', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="testimoni-btn testimoni-btn-danger" style="padding: 4px 8px; font-size: 0.75rem;" onclick="return confirm('Tolak testimoni ini?')">
                                            Tolak
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.testimoni.delete', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="testimoni-btn testimoni-btn-danger" style="padding: 4px 8px; font-size: 0.75rem;" onclick="return confirm('Hapus testimoni ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="testimoni-empty" style="text-align: center; padding: 2rem;">
                            <svg class="empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 48px; height: 48px;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                            <p style="margin: 1rem 0;">Belum ada testimoni.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection