<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisPemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_pemeriksaan',
        'normal_min',
        'normal_max',
        'satuan',
    ];

    public function lab()
    {
        return $this->hasMany(PemeriksaanLaboratorium::class);
    }
}
