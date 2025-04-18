<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Karyawan;

class RegisterKaryawanController extends Controller
{
    public function showForm()
    {
        return view('register-karyawan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:karyawans,email',
            'jenis_kelamin' => 'required|in:Pria,Perempuan',
            'no_telp' => 'required',
            'password' => 'required|min:6',
        ]);

        Karyawan::create([
            'username' => $request->username,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin-home')->with('success', 'Karyawan berhasil didaftarkan!');

    }
}
