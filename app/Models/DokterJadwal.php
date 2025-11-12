<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokterJadwal extends Model
{
    protected $table = 'dokter_jadwals';

    protected $fillable = [
        'dokter_id',
        'aktif',
        'aktif_mulai',
        'aktif_selesai',
    ];
}
