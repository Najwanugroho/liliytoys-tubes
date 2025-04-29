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
        $validatedData = $request->validate([
            'username' => 'required|unique:karyawans|max:255',
            'email' => 'required|email|unique:karyawans',
            'jenis_kelamin' => 'required|in:L,P',
            'no_telp' => 'required|string',
            'password' => 'required|min:6',
        ]);

        $karyawan = Karyawan::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'no_telp' => $validatedData['no_telp'],
            'password' => bcrypt($validatedData['password']),
        ]);

        if ($karyawan) {
            session()->flash('success', "Karyawan {$karyawan->username} berhasil didaftarkan");
            return redirect()->route('admin.home');
        }

        session()->flash('error', 'Gagal mendaftarkan karyawan');
        return back();

    }
}
