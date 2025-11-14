<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Tampilkan keranjang (dari session)
     */
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('dashboard.cart', compact('cart'));
    }

    /**
     * Tambah ke keranjang (via modal pop-up)
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'id_katalog' => 'required|integer',
            'qty' => 'required|integer|min:1',
            'catatan' => 'nullable|string',
        ]);

        $product = Katalog::findOrFail($request->id_katalog);

        $cart = Session::get('cart', []);

        if (isset($cart[$product->id_katalog])) {
            $cart[$product->id_katalog]['qty'] += $request->qty;
        } else {
            $cart[$product->id_katalog] = [
                'id_katalog' => $product->id_katalog,
                'nama_katalog' => $product->nama_katalog,
                'harga_katalog' => $product->harga_katalog,
                'qty' => $request->qty,
                'catatan' => $request->catatan ?? '',
                'gambar' => $product->file_katalog,
            ];
        }

        Session::put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Produk ditambahkan ke keranjang!',
            'totalItems' => collect($cart)->sum('qty'),
        ]);
    }

    /**
     * Hapus item dari keranjang
     */
    public function remove($id)
    {
        $cart = Session::get('cart', []);
        unset($cart[$id]);
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }

    /**
     * Proses checkout (simpan ke database)
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'alamat_pengiriman' => 'required|string',
            'nomor_telepon' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong.');
        }

        // Hitung total
        $totalHarga = collect($cart)->sum(fn($item) => $item['harga_katalog'] * $item['qty']);

        // Simpan transaksi
        $transaksi = new Transaksi();
        $transaksi->id_user = Auth::id(); // sesuai kolom id_user
        $transaksi->nama_penerima = $request->nama_penerima;
        $transaksi->alamat_pengiriman = $request->alamat_pengiriman;
        $transaksi->nomor_telepon = $request->nomor_telepon;
        $transaksi->total_harga = $totalHarga;
        $transaksi->catatan = $request->catatan;
        $transaksi->save();

        // Simpan detail transaksi
        foreach ($cart as $item) {
            $detail = new DetailTransaksi();
            $detail->id_transaksi = $transaksi->id_transaksi;
            $detail->id_katalog = $item['id_katalog'];
            $detail->qty = $item['qty'];
            $detail->harga_satuan = $item['harga_katalog'];
            $detail->subtotal = $item['harga_katalog'] * $item['qty'];
            $detail->save();

            // Kurangi stok
            $katalog = Katalog::find($item['id_katalog']);
            $katalog->stok_katalog -= $item['qty'];
            $katalog->save();
        }

        // Kosongkan keranjang
        Session::forget('cart');

        return redirect()->route('checkout.success', $transaksi->id_transaksi)
                         ->with('success', 'Pesanan berhasil dibuat!');
    }

    /**
     * Halaman sukses checkout
     */
    public function success($id)
    {
        $transaksi = Transaksi::with(['detail.katalog'])->findOrFail($id);
        return view('dashboard.checkout_success', compact('transaksi'));
    }
}