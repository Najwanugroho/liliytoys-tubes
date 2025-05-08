<?php

namespace App\Http\Controllers;
use App\Models\Inventaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class InventarisAdminController extends Controller
{
    public function index(Request $request){
        $tab = $request->get('tab', 'skuter');
        $data = Inventaris::where('kategori', $tab)->get();

        return view('inventaris-admin', compact('data', 'tab'));
    }

    public function tambah(Request $request){

        $request->validate([
            'kategori' => 'required|string',
            'jenis' => 'required|string',
            'stok_awal' => 'required|integer',
        ]);

        Inventaris::create([
            'kategori' => $request->kategori,
            'jenis' => $request->jenis,
            'stok_awal' => $request->stok_awal,
            'rusak' => $request->rusak,
        ]);

        return redirect('/inventaris-admin?tab=' . $request->kategori)->with('success', 'Barang berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        $item = Inventaris::find($request->id);
        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan']);
        }

        $field = $request->field;
        $value = $request->value;

        if (in_array($field, ['stok_awal', 'rusak'])) {
            $item->$field = $value;
            $item->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Field tidak valid']);
    }



}
