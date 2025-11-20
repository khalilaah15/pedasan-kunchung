<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function download($id)
    {
        $query = Transaksi::with(['detail.katalog', 'user']);

        if (Auth::user()->role === 'seller') {
            // Seller hanya bisa download milik sendiri
            $query->where('id_user', Auth::id());
        }
        // Admin bisa download semua (opsional: batasi jika perlu)

        $transaksi = $query->findOrFail($id);

        $pdf = Pdf::loadView('dashboard.invoice', compact('transaksi'))
                ->setPaper('a4', 'portrait');

        return $pdf->download("invoice-{$transaksi->id_transaksi}.pdf");
    }
}