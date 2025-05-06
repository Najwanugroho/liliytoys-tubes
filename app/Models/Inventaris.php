<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $fillable = ['kategori', 'jenis', 'stok_awal', 'rusak'];
}
