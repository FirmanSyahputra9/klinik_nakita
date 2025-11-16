<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = 'registrasis';

    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'tanggal_kunjungan',
        'jam_berobat',
        'keluhan',
    ];

    public function pasiens()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function dokters()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}
