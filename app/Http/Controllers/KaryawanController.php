<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;


class KaryawanController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.karyawan-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::guard('karyawan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/karyawan-home');
        }

        return back()->withErrors([
            'username' => 'username atau password salah.',
        ]);
    }

    public function index()
    {
        $karyawan = Auth::guard('karyawan')->user();

        return view('karyawan-home', [
            'username' => $karyawan->username,
            'pendapatan' => 0, 
            'pengeluaran' => 0, 
            'pendapatanBersih' => 0, 
        ]);  
    }
}

// public function index()
    // {
    //     return view('karyawan-home', [
    //         'username' => 'User123',
    //         'pendapatan' => 3335000,
    //         'pengeluaran' => 'Karcis',
    //         'pendapatanBersih' => 3330000
    //     ]);
    // }
