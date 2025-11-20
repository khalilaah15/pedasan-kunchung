@extends('layouts.dashboard')

@section('title', 'Checkout Berhasil - Pedasan Kunchung')

@section('content')
<div style="text-align: center; padding: 40px 20px;">
    <h2 style="color: #CC0000;">✅ Pesanan Berhasil!</h2>
    <p style="font-size: 1.2rem; margin: 20px 0;">
        Terima kasih telah berbelanja di Pedasan Kunchung!
    </p>
    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; display: inline-block; margin: 20px 0;">
        <p><strong>No. Pesanan:</strong> #{{ str_pad($transaksi->id_transaksi, 6, '0', STR_PAD_LEFT) }}</p>
        <p><strong>Total:</strong> {{ $transaksi->formattedTotal }}</p>
        <p><strong>Status:</strong> <span style="color: #FFC107;">{{ ucfirst($transaksi->status) }}</span></p>
    </div>
    <a href="{{ route('dashboard') }}" class="btn btn-white" style="display: inline-block; margin-top: 20px;">
        Kembali ke Dashboard
    </a>
</div>
@endsection