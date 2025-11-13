<?php
// app/Http/Controllers/Auth/RegisterController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            //'nama_toko' => 'required|string|max:255', // Wajib untuk seller
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            // Role otomatis seller, admin hanya bisa dibuat manual
        ]);

        $user = User::create([
            'nama' => $validated['nama'],
            //'nama_toko' => $validated['nama_toko'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'seller', // Default role seller
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }
}