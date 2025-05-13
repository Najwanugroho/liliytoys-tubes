<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_barang', // Tambahkan field yang bisa diisi secara massal
    ];

    protected $table = 'kategori';
}