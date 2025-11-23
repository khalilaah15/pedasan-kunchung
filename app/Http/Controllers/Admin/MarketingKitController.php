<?php

namespace App\Http\Controllers\Admin;

use App\Models\MarketingKit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MarketingKitController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $kits = MarketingKit::orderBy('created_at', 'desc')->get();
        return view('admin.marketing', compact('kits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file_gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $kit = new MarketingKit();
        $kit->judul = $request->judul;
        $kit->deskripsi = $request->deskripsi;

        $path = $request->file('file_gambar')->store('marketing_kit', 'public');
        $kit->file_gambar = $path;

        $kit->save();

        return back()->with('success', 'Marketing kit berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kit = MarketingKit::findOrFail($id);
        return response()->json($kit);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $kit = MarketingKit::findOrFail($id);
        $kit->judul = $request->judul;
        $kit->deskripsi = $request->deskripsi;

        if ($request->hasFile('file_gambar')) {
            if ($kit->file_gambar) {
                Storage::disk('public')->delete($kit->file_gambar);
            }
            $path = $request->file('file_gambar')->store('marketing_kit', 'public');
            $kit->file_gambar = $path;
        }

        $kit->save();

        return back()->with('success', 'Marketing kit berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kit = MarketingKit::findOrFail($id);
        if ($kit->file_gambar) {
            Storage::disk('public')->delete($kit->file_gambar);
        }
        $kit->delete();

        return back()->with('success', 'Marketing kit berhasil dihapus!');
    }
}