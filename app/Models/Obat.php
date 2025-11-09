<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';

    protected $fillable = [
    'kode',
    'nama',
    'stok',
    'satuan',
    'harga_beli',
    'harga_jual',
    'tanggal_kadaluwarsa',
    'deskripsi',
];
    public $timestamps = false;
}
