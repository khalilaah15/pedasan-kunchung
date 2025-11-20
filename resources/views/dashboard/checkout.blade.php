@extends('layouts.dashboard')

@section('title', 'Checkout - Pedasan Kunchung')

@section('content')
<h3>Checkout</h3>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">

    <!-- Form Pengiriman -->
    <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_penerima" class="label">Nama Penerima</label>
                <input type="text" id="nama_penerima" name="nama_penerima" class="input" required value="{{ old('nama_penerima') }}">
            </div>

            <div class="form-group">
                <label for="alamat_pengiriman" class="label">Alamat Pengiriman</label>
                <textarea id="alamat_pengiriman" name="alamat_pengiriman" class="input" rows="3" required>{{ old('alamat_pengiriman') }}</textarea>
            </div>

            <div class="form-group">
                <label for="nomor_telepon" class="label">Nomor Telepon</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon" class="input" required value="{{ old('nomor_telepon') }}">
            </div>

            <div class="form-group">
                <label for="catatan" class="label">Catatan</label>
                <textarea id="catatan" name="catatan" class="input" rows="2" placeholder="Isi ulang catatan akhir">{{ old('catatan') }}</textarea>
            </div>

            <button type="submit" class="btn btn-red" style="width: 100%; margin-top: 20px;">Konfirmasi Pesanan</button>
        </form>
    </div>

    <!-- Ringkasan -->
    <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
        <h4>Ringkasan Pesanan</h4>
        @php $total = 0 @endphp
        @foreach($cart as $item)
            @php $subtotal = $item['harga_katalog'] * $item['qty']; $total += $subtotal; @endphp
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                <span>{{ $item['nama_katalog'] }} (x{{ $item['qty'] }})</span>
                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>
        @endforeach
        <hr>
        <div style="display: flex; justify-content: space-between; font-weight: bold; font-size: 1.1rem;">
            <span>Total:</span>
            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
        </div>

        <div style="margin-top: 20px; background: #f8f9fa; padding: 15px; border-radius: 8px;">
            <strong>QR Pembayaran</strong><br>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=PEDASAN_{{ Str::random(8) }}" 
                 alt="QR Code" 
                 style="width: 150px; height: 150px; margin: 10px 0;">
            <small>Scan untuk bayar via BCA</small>
        </div>
    </div>

</div>
@endsection