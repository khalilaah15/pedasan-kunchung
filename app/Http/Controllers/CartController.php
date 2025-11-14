<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Tambah produk ke keranjang (session)
     */
    public function add(Request $request)
    {
        $request->validate([
            'id_katalog' => 'required|integer',
            'nama_katalog' => 'required|string',
            'harga_katalog' => 'required|numeric',
            'qty' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        // Cek jika sudah ada di keranjang
        if (isset($cart[$request->id_katalog])) {
            $cart[$request->id_katalog]['qty'] += $request->qty;
        } else {
            $cart[$request->id_katalog] = [
                'id_katalog' => $request->id_katalog,
                'nama_katalog' => $request->nama_katalog,
                'harga_katalog' => $request->harga_katalog,
                'qty' => $request->qty
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'totalItems' => collect($cart)->sum('qty'),
            'cart' => $cart
        ]);
    }

    /**
     * Tampilkan halaman keranjang
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('dashboard.cart', compact('cart'));
    }

    /**
     * Hapus item dari keranjang
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }
}