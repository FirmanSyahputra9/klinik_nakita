<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataPemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'antrian_id',
        'keluhan',
        'diagnosa',
        'rencana',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }
}
