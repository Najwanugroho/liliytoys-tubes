<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('karyawan')->attempt($credentials)) {
            return redirect()->route('karyawan-home');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }
}
