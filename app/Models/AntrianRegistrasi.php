<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AntrianRegistrasi extends Model
{
    protected $table = 'antrian_registrasis';

    protected $fillable = [
        'registrasi_id',
        'status',
        'waktu_dikonfirmasi',
    ];

    protected $casts = [
        'waktu_dikonfirmasi' => 'datetime',
        'status' => 'boolean',
    ];

    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class);
    }
}
