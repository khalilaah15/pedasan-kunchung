<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class ResellerController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $resellers = User::where('role', 'seller')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.reseller', compact('resellers'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'in:active,inactive']);
        
        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return redirect()->back()->with('success', 'Status reseller diperbarui.');
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate(['role' => 'in:seller,admin']);
        
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Role reseller diperbarui.');
    }
}