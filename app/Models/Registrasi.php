<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    protected $table = 'registrasis';

    protected $fillable = [
        'appointment_code',
        'pasien_id',
        'dokter_id',
        'dokter_jadwal_id',
        'tanggal_kunjungan',
        // 'jam_berobat',
        'status',
        'keluhan',
        'hide',
    ];
    protected $casts = [
        'status' => 'boolean',
        'hide' => 'boolean',
    ];

    public function dokter_jadwals()
    {
        return $this->belongsTo(DokterJadwal::class, 'dokter_jadwal_id');
    }

    public function pasiens()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function dokters()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}
