<?php

namespace App\Http\Controllers;
use App\Models\Laporan;


use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil data laporan harian yang diperlukan
        $data = Laporan::whereDate('tanggal', now()->toDateString())
        ->get();

        $pendapatan = Laporan::whereDate('tanggal', now()->toDateString())
        ->sum('harga');

        // Kirimkan data ke view
        return view('laporan-keuangan-harian', compact('data', 'pendapatan'));
    }

    public function tambah(Request $request)
    {
        try {
            $laporan = $request->input('laporan');
            
            // Proses data laporan, misalnya menyimpannya ke dalam database
            foreach ($laporan as $item) {
                // Menyimpan laporan ke database
                Laporan::create([
                    'nama_permainan' => $item['nama_permainan'],
                    'harga' => preg_replace('/[^\d]/', '', $item['harga']),
                    'status' => $item['status'],
                    'tanggal' => now(),
                ]);
            }
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

}
