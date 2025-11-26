<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemeriksaanLaboratorium extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan_laboratoriums';

    protected $fillable = [
        'antrian_id',
        'jenis_pemeriksaan_id',
        'nilai',
        'catatan',
        'status',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }

    public function jenis()
    {
        return $this->belongsTo(JenisPemeriksaan::class, 'jenis_pemeriksaan_id');
    }

    
}
