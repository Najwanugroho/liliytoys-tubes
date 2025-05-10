<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use App\Models\Catatan;
use App\Models\Pengeluaran;
use App\Models\Karyawan;
use Carbon\Carbon;

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

        $data = Catatan::all();
        if (!$karyawan) {
            return redirect()->route('karyawan.login')->with('error', 'Harap login terlebih dahulu.');
        }

        $today = Carbon::today();

        $catatansChecked = Catatan::where('checked', 1)->get();

        $pendapatan = Catatan::where('status', 'Lunas')
        ->whereDate('created_at', $today)
        ->sum('harga');
        //dd($pendapatan);

        $pengeluaran = Pengeluaran::whereDate('created_at', $today)
        ->sum('nominal');

        $pendapatanBersih = $pendapatan - $pengeluaran;

        return view('karyawan-home', [
            'username' => $karyawan->username,
            'pendapatan' => $pendapatan,
            'pengeluaran' => $pengeluaran,
            'pendapatanBersih' => $pendapatanBersih,
        ]);
    }

    public function update(Request $request)
    {
        $karyawan = karyawan::find($request->id);

        if (!$karyawan) {
            return redirect()->route('karyawan.login')->with('error', 'Harap login terlebih dahulu.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'jenis_kelamin' => 'required|string',
            'no_telp' => 'required|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        // dd($request);
        $karyawan->update([
            'username' => $request->nama,
            // 'nama' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Data karyawan berhasil diperbarui.');
    }
}
