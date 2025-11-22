<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterJadwal extends Model
{
    use HasFactory;
    protected $table = 'dokter_jadwals';

    protected $fillable = [
        'dokter_id',
        'hari',
        'aktif_mulai',
        'aktif_selesai',
        'keterangan',
    ];
    protected $casts = [
        'aktif_mulai' => 'datetime',
        'aktif_selesai' => 'datetime',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function registrasi()
    {
        return $this->hasMany(Registrasi::class, 'dokter_jadwal_id');
    }
}
