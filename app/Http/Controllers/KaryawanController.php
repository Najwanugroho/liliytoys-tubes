<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan-home', [
            'username' => 'User123',
            'pendapatan' => 3335000,
            'pengeluaran' => 'Karcis',
            'pendapatanBersih' => 3330000
        ]);
    }
}
