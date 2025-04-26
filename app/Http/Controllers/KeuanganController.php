<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        return view('keuangan-admin'); // pastikan view ini ada di resources/views/keuangan-admin.blade.php
    }
}
