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
        'selesai',
    ];
    protected $casts = [
        'status' => 'boolean',
        'selesai' => 'boolean',
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

    public function data_pemeriksaan()
    {
        return $this->hasOne(DataPemeriksaan::class);
    }

    public function tindakan()
    {
        return $this->hasOne(Tindakan::class);
    }

    public function lab()
    {
        return $this->hasMany(PemeriksaanLaboratorium::class);
    }

    public function alergi()
    {
        return $this->hasOne(Alergi::class);
    }

    public function resep()
    {
        return $this->hasOne(Resep::class);
    }

    public function kasir()
    {
        return $this->hasOne(Kasir::class);
    }

}
