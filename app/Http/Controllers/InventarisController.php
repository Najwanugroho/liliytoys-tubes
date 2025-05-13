<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function showInventaris(Request $request)
    {
        // Simpan halaman sebelumnya di session
        session(['previous_page' => url()->previous()]);
    
        // Ambil data inventaris
        $data = Inventaris::all();
    
        return view('inventaris', compact('data'));
    }
    

}
