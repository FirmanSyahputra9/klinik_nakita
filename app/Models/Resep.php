<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'reseps';

    protected $fillable = [
        'antrian_id',
        'obat_id',
        'dosis',
        'frekuensi',
        'waktu_konsumsi',
        'kuantitas',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }



}
