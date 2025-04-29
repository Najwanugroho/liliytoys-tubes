<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class InventarisAdminController extends Controller
{
    public function index()
{
    $data = collect([
        ['id' => 'A01', 'jenis' => 'Skuter Injak', 'stok_awal' => 10, 'rusak' => 4],
        ['id' => 'A02', 'jenis' => 'Skuter Biasa', 'stok_awal' => 10, 'rusak' => 2],
        ['id' => 'A03', 'jenis' => 'Skuter Listrik', 'stok_awal' => 2, 'rusak' => 1],
    ]);

    return view('inventaris-admin', compact('data'));
}
}
