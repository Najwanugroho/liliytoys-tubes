<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use App\Models\Catatan;
use App\Models\Pengeluaran;




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

        $catatansChecked = Catatan::where('checked', 1)->get();  // Ambil catatan yang sudah diceklis
        
        $pendapatan = Catatan::where('checked', 1)->sum('harga');
        $pengeluaran = Pengeluaran::sum('nominal');
        $pendapatanBersih = $pendapatan - $pengeluaran;

        return view('karyawan-home', [
            'username' => $karyawan->username,
            'pendapatan' => $pendapatan,
            'pengeluaran' => $pengeluaran,
            'pendapatanBersih' => $pendapatanBersih,
        ]);  
    }
}
