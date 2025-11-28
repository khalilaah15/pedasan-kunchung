<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        // Gunakan ini untuk mengambil semua testimoni termasuk yang user-nya mungkin sudah dihapus
        $testimoni = Testimoni::with('user')->latest()->get();

        $stats = [
            'total' => Testimoni::count(),
            'disetujui' => Testimoni::where('disetujui', true)->count(),
            'menunggu' => Testimoni::where('disetujui', false)->count()
        ];

        return view('admin.testimoni.index', compact('testimoni', 'stats'));
    }

    public function approve($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->update(['disetujui' => true]);

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil disetujui!');
    }

    public function reject($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil ditolak dan dihapus!');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->route('admin.testimoni.index')
            ->with('success', 'Testimoni berhasil dihapus!');
    }
}