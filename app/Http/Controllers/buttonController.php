<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventaris;

class buttonController extends Controller
{
    public function tambah(Request $request)
    {

        $stok = Inventaris::find($request->id);

        if (!$stok) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan']);
        }else {
            $stok->stok_awal = $stok->stok_awal + 1;
            $stok->save();
        }
        // dd($stok);
        return redirect()->route('inventaris-admin')->with('status', 'Stok berhasil diperbarui');


    }
    public function kurang(Request $request)
    {
        $stok = Inventaris::find($request->id);

        if (!$stok) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan']);
        }else {
            $stok->stok_awal = $stok->stok_awal - 1;
            $stok->save();
        }
        // dd($stok);
        return redirect()->route('inventaris-admin')->with('status', 'Stok berhasil diperbarui');
    }


    public function kurangiRusak(Request $request)
    {
        $stok = Inventaris::find($request->id);

    if (!$stok) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan']);
        }else {
            $stok->rusak = $stok->rusak - 1;
            $stok->save();
        }
        // dd($stok);
        return redirect()->route('inventaris-admin')->with('status', 'Stok berhasil diperbarui');
    }

    public function tambahiRusak(Request $request)
    {
        $stok = Inventaris::find($request->id);

        if (!$stok) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan']);
        }else {
            if ($stok->rusak < $stok->stok_awal) {
                $stok->rusak = $stok->rusak + 1;
            } 
            // $stok->rusak = $stok->rusak + 1;
            $stok->save();
        }
        // dd($stok);
        return redirect()->route('inventaris-admin')->with('status', 'Stok berhasil diperbarui');
    }

}
