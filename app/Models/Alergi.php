<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alergi extends Model
{
    use HasFactory;

    protected $fillable = [
        'antrian_id',
        'alergi',
        'reaksi',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }
}
