<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    protected $table = 'kasirs';

    protected $fillable = [
        'antrian_id',
        'status',
        'biaya_layanan',
    ];
    protected $casts = [
        'status' => 'boolean',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }
}
