<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua katalog yang stok > 0 (atau semua, sesuai kebutuhan)
        $products = Katalog::where('stok_katalog', '>', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home', compact('products'));
    }
}
