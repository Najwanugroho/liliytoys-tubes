<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function tambah(Request $request)
    {
        $request->validate([
            'kategori_barang' => 'required|string|max:255',
        ]);

        Kategori::create([
            'kategori_barang' => $request->kategori_barang
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan')
                     ->with('reloadKategori', true);

    }

    public function list()
    {
        $kategori = Kategori::all();
        return response()->json($kategori);
    }
}
