<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';

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

    public function resep()
    {
        return $this->hasMany(Resep::class);
    }
}
