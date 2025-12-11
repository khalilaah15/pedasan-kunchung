@extends('layouts.admin')

@section('title', 'Histori Pemesanan - Admin Dashboard')

@vite(['resources/css/admin-histori.css', 'resources/js/admin-histori.js'])

@section('content')
<!-- Tab Navigation -->
<div class="tab-nav">
    <a href="{{ route('admin.dashboard') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l1.196 4.785A.5.5 0 0 1 16 9v5a.5.5 0 0 1-.5.5H15.5a.5.5 0 0 1-.5-.5V9h-1v5a.5.5 0 0 1-.5.5H13a.5.5 0 0 1-.5-.5V9h-1v5a.5.5 0 0 1-.5.5H10a.5.5 0 0 1-.5-.5V9h-1v5a.5.5 0 0 1-.5.5H7a.5.5 0 0 1-.5-.5V9H6v5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V9H4v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V9H2a.5.5 0 0 1-.485-.379L1.11 6.917A.5.5 0 0 1 1 6.5v-1A.5.5 0 0 1 1.5 5h1.5v-1A.5.5 0 0 1 3.5 3h1.5v-1A.5.5 0 0 1 5.5 1H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H14.5a.5.5 0 0 1-.491-.592L12.89 3H2.11L.5 1.5ZM1 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 1.5 6H1Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 2.5 7H2Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 3.5 8H3Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 4.5 9H4Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 5.5 10H5Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 6.5 11H6Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 7.5 12H7Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 8.5 13H8Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 9.5 14H9Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 10.5 15H10Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 11.5 16H11Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 12.5 17H12Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 13.5 18H13Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 14.5 19H14Zm1 2a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1A.5.5 0 0 0 15.5 20H15Z"/>
        </svg>
        Katalog
    </a>
    <a href="{{ route('admin.histori') }}" class="tab-btn active">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <polyline points="12 6 12 12 16 14"></polyline>
        </svg>
        History
    </a>
    <a href="{{ route('admin.marketing') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <path d="M12 8v8"></path>
            <path d="M8 12h8"></path>
        </svg>
        Marketing Kit
    </a>
    <a href="{{ route('admin.testimoni.index') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
        Testimoni
    </a>
    <a href="{{ route('admin.penjualan') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="1" x2="12" y2="23"></line>
            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
        </svg>
        Penjualan
    </a>
    <a href="{{ route('admin.reseller') }}" class="tab-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 0 4-1 4-1 1h-3zM6 7a1 1 0 1 1 2 0v2a1 1 0 1 1-2 0V7z"/>
        </svg>
        Reseller
    </a>
</div>

<!-- Histori Section -->
<div class="transaction-container">
    <h3 class="table-title">Histori Pemesanan</h3>

    @if($histori->isEmpty())
        <p class="text-center" style="color: #666;">Belum ada pemesanan.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Reseller</th>
                    <th>Produk</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>
                @foreach($histori as $item)
                    <tr>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>
                            {{ $item->user->name ?? 'User #' . $item->id_user }}<br>
                            <small style="color: #666;">{{ $item->user->email ?? '-' }}</small>
                        </td>
                        <td>
                            <?php $first = true; ?>
                            @foreach($item->detail as $detail)
                                @if(!$first) , @endif
                                {{ $detail->katalog->nama_katalog }} × {{ $detail->qty }}
                                <?php $first = false; ?>
                            @endforeach
                        </td>
                        <td>{{ $item->formattedTotal }}</td>
                        <td>
                            @php
                                $badge = [
                                    'Pending' => ['class' => 'status-pending', 'text' => 'Pending'],
                                    'Processing' => ['class' => 'status-processing', 'text' => 'Processing'],
                                    'Completed' => ['class' => 'status-completed', 'text' => 'Completed'],
                                    'Cancelled' => ['class' => 'status-cancelled', 'text' => 'Cancelled']
                                ][$item->status] ?? ['class' => '', 'text' => $item->status];
                            @endphp
                            <span class="status-badge {{ $badge['class'] }}">{{ $badge['text'] }}</span>
                        </td>
                        <td>
                            <select class="action-dropdown" 
                                    data-id="{{ $item->id_transaksi }}"
                                    onchange="updateStatus(this)">
                                <option value="Pending" @if($item->status == 'Pending') selected @endif>Pending</option>
                                <option value="Processing" @if($item->status == 'Processing') selected @endif>Processing</option>
                                <option value="Completed" @if($item->status == 'Completed') selected @endif>Completed</option>
                                <option value="Cancelled" @if($item->status == 'Cancelled') selected @endif>Cancelled</option>
                            </select>
                        </td>
                        <td>
                            <a href="{{ route('invoice.download', $item->id_transaksi) }}" class="invoice-btn">
                                Download
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- Modal Konfirmasi -->
<div id="modalConfirm" class="modal-confirm">
    <div class="modal-content">
        <div class="modal-title">Konfirmasi Aksi</div>
        <div id="confirmMessage"></div>
        <div class="modal-actions">
            <button class="btn btn-red" id="confirmActionBtn"></button>
            <button class="btn btn-white btn-cancel">Batal</button>
        </div>
    </div>
</div>

@push('scripts')
<script>
window.updateStatus = async function(select) {
    const id = select.getAttribute('data-id');
    const status = select.value;
    
    try {
        const res = await fetch(`/admin-histori/${id}/status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ status })
        });

        const result = await res.json();
        if (result.success) {
            // Update badge di baris yang sama
            const badge = select.closest('tr').querySelector('.status-badge');
            badge.className = 'status-badge';
            if (status === 'Pending') {
                badge.classList.add('status-pending');
                badge.textContent = 'Pending';
            } else if (status === 'Processing') {
                badge.classList.add('status-processing');
                badge.textContent = 'Processing';
            } else if (status === 'Completed') {
                badge.classList.add('status-completed');
                badge.textContent = 'Completed';
            } else {
                badge.classList.add('status-cancelled');
                badge.textContent = 'Cancelled';
            }
            alert(result.message);
        }
    } catch (e) {
        alert('Gagal: ' + e.message);
    }
};
</script>
@endpush
@endsection