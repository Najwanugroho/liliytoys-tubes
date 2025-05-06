<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatatanController extends Controller
{
    public function index()
    {

        $catatan = [
            ['id' => 1, 'nama' => 'v Skuter', 'waktu' => '08.00 - 08.20', 'harga' => 10000, 'status' => 'Lunas'],
            ['id' => 2, 'nama' => 'v Melukis', 'waktu' => '08.00', 'harga' => 15000, 'status' => 'Belum'],

        ];

        return view('catatan', compact('catatan'));
    }

    public function updateStatus(Request $request)
    {
        // Ambil data dari request
        $id = $request->input('id');
        $status = $request->input('status');


        return response()->json([
            'success' => true,
            'message' => "Status catatan ID $id diubah menjadi $status."
        ]);
    }
}
