<?php

namespace App\Http\Controllers;

use App\Models\MarketingKit;

class MarketingKitController extends Controller
{
    public function index()
    {
        $kits = MarketingKit::orderBy('created_at', 'desc')->get();
        return view('dashboard.marketing', compact('kits'));
    }
}