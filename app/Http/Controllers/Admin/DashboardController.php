<?php

namespace App\Http\Controllers\Admin;

use App\Models\Katalog;
use Illuminate\Http\Request;

class DashboardController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $products = Katalog::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('products'));
    }
}