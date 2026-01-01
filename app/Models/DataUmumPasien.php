<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUmumPasien extends Model
{
    use HasFactory;

    protected $table = 'data_umum_pasiens';
    protected $fillable = [
        'nama_du',
        'satuan',
    ];

    public function nilai()
    {
        return $this->hasMany(NilaiDataUmumPasien::class);
    }
}
