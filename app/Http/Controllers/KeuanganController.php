<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index(Request $request)
    {
        $periode = $request->input('periode', 'harian');
        $laporans = Laporan::query();

        if ($periode == 'harian') {
            $laporans->whereDate('tanggal', now()->toDateString());
        } elseif ($periode == 'mingguan') {
            $laporans->whereBetween('tanggal', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($periode == 'bulanan') {
            $laporans->whereMonth('tanggal', now()->month);
        }

       // Kelompokkan laporan per karyawan
        $data = Karyawan::with(['laporans' => function ($query) use ($laporans) {
            $query->whereIn('id', $laporans->pluck('id'));
        }])->get();

        return view('keuangan-admin', compact('data', 'periode'));
    }
}

