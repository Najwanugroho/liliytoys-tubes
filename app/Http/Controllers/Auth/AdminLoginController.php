<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login'); // Mengembalikan tampilan login admin
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password,
        ], $request->remember)) {
            // Login berhasil, arahkan ke halaman admin home
            return redirect()->route('admin.home');
        }

        // Login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        // Redirect ke halaman login
        return redirect('/landing');
    }
}
