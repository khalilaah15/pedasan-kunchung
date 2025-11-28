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
        // Validasi seperti di ProductController
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file_gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan file gambar — SAMA PERSIS seperti di ProductController
        $path = $request->file('file_gambar')->storeAs(
            'marketing_kit', // folder khusus
            time() . '_' . $request->file('file_gambar')->getClientOriginalName(),
            'public'
        );

        // Simpan ke database
        $kit = new MarketingKit();
        $kit->judul = $request->judul;
        $kit->deskripsi = $request->deskripsi;
        $kit->file_gambar = $path; // simpan path relatif
        $kit->save();

        return back()->with('success', 'Marketing kit berhasil ditambahkan!');
    }

    // Edit
    public function edit($id)
    {
        try {
            $kit = MarketingKit::findOrFail($id);
            
            return response()->json([
                'id_marketing_kit' => $kit->id_marketing_kit,
                'judul' => $kit->judul,
                'deskripsi' => $kit->deskripsi,
                'file_gambar' => $kit->file_gambar,
                'created_at' => $kit->created_at,
                'updated_at' => $kit->updated_at
            ]);
        } catch (\Exception $e) {
            // Return JSON error instead of HTML
            return response()->json([
                'error' => 'Data tidak ditemukan',
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $kit = MarketingKit::findOrFail($id);
            
            $data = [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi
            ];

            // Handle file upload jika ada
            if ($request->hasFile('file_gambar')) {
                // Hapus file lama jika ada
                if ($kit->file_gambar && Storage::exists('public/' . $kit->file_gambar)) {
                    Storage::delete('public/' . $kit->file_gambar);
                }
                
                $file = $request->file('file_gambar');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('marketing-kits', $fileName, 'public');
                $data['file_gambar'] = $filePath;
            }

            $kit->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Marketing kit berhasil diperbarui!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
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