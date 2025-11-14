@extends('layouts.dashboard')

@section('title', 'Keranjang - Pedasan Kunchung')

@section('content')
<h3>Keranjang Belanja</h3>

@if(empty($cart))
    <p class="text-center" style="color: #666;">Keranjang Anda kosong.</p>
    <a href="{{ route('dashboard') }}" class="btn btn-white" style="display: inline-block; margin-top: 20px;">Kembali ke Katalog</a>
@else
    <div class="cart-items">
        @foreach($cart as $item)
            <div class="cart-item" style="border: 1px solid #eee; padding: 15px; margin-bottom: 15px; border-radius: 8px;">
                <div style="display: flex; gap: 15px; align-items: center;">
                    <img src="{{ asset('storage/' . $item['gambar']) }}" 
                         alt="{{ $item['nama_katalog'] }}" 
                         style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                    <div style="flex: 1;">
                        <h4>{{ $item['nama_katalog'] }}</h4>
                        <p>Harga: Rp {{ number_format($item['harga_katalog'], 0, ',', '.') }}</p>
                        <p>Jumlah: {{ $item['qty'] }}</p>
                        <p>Total: Rp {{ number_format($item['harga_katalog'] * $item['qty'], 0, ',', '.') }}</p>
                        @if($item['catatan'])
                            <p>Catatan: {{ $item['catatan'] }}</p>
                        @endif
                    </div>
                    <form action="{{ route('cart.remove', $item['id_katalog']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-white">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="cart-total" style="margin-top: 20px; padding: 15px; background: #f5f5f5; border-radius: 8px;">
            <h4>Total: Rp {{ number_format(collect($cart)->sum(fn($item) => $item['harga_katalog'] * $item['qty']), 0, ',', '.') }}</h4>
            <a href="{{ route('cart.checkout.form') }}" class="btn btn-red" style="margin-top: 10px;">Checkout</a>
        </div>
    </div>
<a href="{{ route('dashboard') }}" class="btn btn-white" style="display: inline-block; margin-top: 20px;">Kembali ke Katalog</a>
@endif
@endsection