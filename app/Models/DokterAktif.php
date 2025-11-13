<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterAktif extends Model
{
    use HasFactory;

    protected $table = 'dokter_aktifs';

    protected $fillable = [
        'dokter_id',
        'aktif',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
