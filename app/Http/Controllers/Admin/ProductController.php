<?php

namespace App\Http\Controllers\Admin;

use App\Models\Katalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ProductController extends \App\Http\Controllers\Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'file_gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // max 2MB
        ]);

        // Simpan file gambar
        $path = $request->file('file_gambar')->storeAs(
            'images', // folder di storage/app/public/
            time() . '_' . $request->file('file_gambar')->getClientOriginalName(), // nama unik
            'public' // disk public
        );

        // Buat produk baru
        $product = new Katalog();
        $product->nama_katalog = $request->nama_produk;
        $product->deskripsi_katalog = $request->deskripsi;
        $product->harga_katalog = $request->harga;
        $product->stok_katalog = $request->stok;
        $product->file_katalog = $path; // simpan path relatif (misal: images/1731234567_makaroni.jpg)
        $product->save();

        return Redirect::back()->with('success', 'Produk berhasil ditambahkan!');
    }
}