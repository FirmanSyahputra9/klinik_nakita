<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrians';

    protected $fillable = [
        'pasien_id',
        'registrasi_id',
        'dokter_id',
        'kode_antrian',
        'status',
    ];
    protected $casts = [
        'status' => 'boolean',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
