<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoriController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $histori = Transaksi::with(['user', 'detail.katalog'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.histori', compact('histori'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Processing,Completed,Cancelled'
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->save();

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diperbarui.',
            'status' => $transaksi->status
        ]);
    }
}