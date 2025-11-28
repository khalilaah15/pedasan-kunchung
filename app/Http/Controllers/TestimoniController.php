<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    // Public page - hanya tampilkan testimoni yang disetujui
    public function index()
    {
        $testimoni = Testimoni::with('user')
            ->where('disetujui', true)
            ->latest()
            ->get();

        return view('testimoni.index', compact('testimoni'));
    }

    // Halaman testimoni saya (seller only)
    public function testimoniSaya()
    {
        $testimoni = Testimoni::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('testimoni.testimoni-saya', compact('testimoni'));
    }

    public function create()
    {
        // Cek apakah user sudah memiliki testimoni yang pending
        $existingTestimoni = Testimoni::where('user_id', Auth::id())
            ->where('disetujui', false)
            ->exists();

        if ($existingTestimoni) {
            return redirect()->route('testimoni.saya')
                ->with('warning', 'Anda sudah memiliki testimoni yang menunggu persetujuan. Silakan edit testimoni yang sudah ada.');
        }

        return view('testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesan' => 'required|string|min:10|max:500',
            'rating' => 'required|integer|between:1,5'
        ]);

        Testimoni::create([
            'user_id' => Auth::id(),
            'pesan' => $request->pesan,
            'rating' => $request->rating,
            'disetujui' => false // Otomatis menunggu persetujuan admin
        ]);

        return redirect()->route('testimoni.saya')
            ->with('success', 'Testimoni berhasil dikirim! Akan ditampilkan setelah disetujui admin.');
    }

    public function edit($id)
    {
        $testimoni = Testimoni::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        // Hanya bisa edit testimoni yang belum disetujui
        if ($testimoni->disetujui) {
            return redirect()->route('testimoni.saya')
                ->with('warning', 'Testimoni yang sudah disetujui tidak dapat diubah.');
        }

        return view('testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pesan' => 'required|string|min:10|max:500',
            'rating' => 'required|integer|between:1,5'
        ]);

        $testimoni = Testimoni::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        // Hanya bisa update testimoni yang belum disetujui
        if ($testimoni->disetujui) {
            return redirect()->route('testimoni.saya')
                ->with('warning', 'Testimoni yang sudah disetujui tidak dapat diubah.');
        }

        $testimoni->update([
            'pesan' => $request->pesan,
            'rating' => $request->rating,
            'disetujui' => false // Tetap menunggu persetujuan setelah edit
        ]);

        return redirect()->route('testimoni.saya')
            ->with('success', 'Testimoni berhasil diperbarui! Menunggu persetujuan admin kembali.');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $testimoni->delete();

        return redirect()->route('testimoni.saya')
            ->with('success', 'Testimoni berhasil dihapus!');
    }
}