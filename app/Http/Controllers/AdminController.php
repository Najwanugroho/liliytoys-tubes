<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Karyawan;


class AdminController extends Controller
{
    // public function showLoginForm()
    // {
    //     return view('auth.admin-login');
    // }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('username', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect('admin.home');
    //     } else {
    //         return redirect()->route('admin.login.form')->withErrors(['error' => 'Username or Password is incorrect']);
    //     }
    // }

    public function index()
    {
        $karyawans = Karyawan::all();
        return view('admin-home', compact('karyawans')); 
    }
}

