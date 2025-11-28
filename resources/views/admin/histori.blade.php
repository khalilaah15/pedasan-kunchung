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
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm2 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 0.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h1Z"/>
        </svg>
        Histori
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