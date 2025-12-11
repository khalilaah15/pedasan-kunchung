<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        // Filter tanggal
        $startDate = $request->start_date ?? now()->startOfMonth()->toDateString();
        $endDate = $request->end_date ?? now()->endOfMonth()->toDateString();

        // Data transaksi
        $penjualan = Transaksi::with(['user'])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Grafik: Penjualan per bulan
        $monthlySales = Transaksi::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('SUM(total_harga) as total')
        )
        ->where('status', 'Completed')
        ->groupBy('month')
        ->orderBy('month')
        ->get()
        ->pluck('total', 'month')
        ->toArray();

        // Reseller dropdown
        $resellers = User::where('role', 'seller')->get();

        return view('admin.penjualan', compact(
            'penjualan', 
            'monthlySales', 
            'startDate', 
            'endDate',
            'resellers'
        ));
    }

    // API untuk chart
    public function chartData()
    {
        $data = Transaksi::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_harga) as total')
        )
        ->whereYear('created_at', now()->year)
        ->where('status', 'Completed')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month')
        ->toArray();

        // Format untuk Chart.js
        $labels = [];
        $values = [];
        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date('M', mktime(0, 0, 0, $i, 1));
            $values[] = $data[$i] ?? 0;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $values
        ]);
    }
}