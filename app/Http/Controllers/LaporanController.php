<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
{
    $data = [
        ['id' => 1, 'nama' => 'Skuter', 'waktu' => '08.00 - 08.20', 'harga' => '10.000', 'status' => 'Lunas'],
        ['id' => 2, 'nama' => 'Melukis', 'waktu' => '08.00', 'harga' => '15.000', 'status' => 'Lunas'],
        ['id' => 3, 'nama' => 'Mobil', 'waktu' => '08.00 - 08.15', 'harga' => '15.000', 'status' => 'Lunas'],
        ['id' => 4, 'nama' => 'Motor', 'waktu' => '08.00 - 08.15', 'harga' => '15.000', 'status' => 'Lunas'],
    ];

    return view('laporan-keuangan-harian', [
        'user' => 'User123',
        'tanggal' => '05/05/2025',
        'data' => $data,
        'pendapatan' => 4000000
    ]);
}

}
