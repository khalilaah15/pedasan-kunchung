<?php

namespace App\Http\Controllers;

use App\Models\MarketingKit;
use Illuminate\Http\Request;

class MarketingKitController extends Controller
{
    public function index()
    {
        $kits = MarketingKit::orderBy('created_at', 'desc')->get();
        return view('dashboard.marketing', compact('kits'));
    }

    public function copyText(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Teks berhasil disalin ke clipboard (simulasi).'
        ]);
    }
}