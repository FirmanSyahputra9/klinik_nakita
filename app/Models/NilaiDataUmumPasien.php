<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiDataUmumPasien extends Model
{
    use HasFactory;

    protected $table = 'nilai_data_umum_pasiens';
    protected $fillable = [
        'antrian_id',
        'data_umum_pasien_id',
        'nilai',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }

    public function dataUmumPasien()
    {
        return $this->belongsTo(DataUmumPasien::class);
    }
}
