<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class PengeluaranController extends Controller
{
    public function store(Request $request)
    {
        if ($request->jenis_pengeluaran === 'lainnya') {
            $request->validate([
                'jenis_pengeluaran_custom' => 'required|string',
                'nominal_custom' => 'required|numeric|min:1',
            ]);
    
            Pengeluaran::create([
                'jenis_pengeluaran' => $request->jenis_pengeluaran_custom,
                'nominal' => $request->nominal_custom,
                'user_id' => auth()->user()->id ?? null,
            ]);
        } else {
            $request->validate([
                'jenis_pengeluaran' => 'required|string',
                'nominal' => 'required|numeric|min:1',
            ]);
    
            Pengeluaran::create([
                'jenis_pengeluaran' => $request->jenis_pengeluaran,
                'nominal' => $request->nominal,
                'user_id' => auth()->user()->id ?? null,
            ]);
        }


        return redirect()->route('karyawan.home')->with('success', 'Pengeluaran ditambahkan!');
    }
}
