<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tindakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'antrian_id',
        'nama_tindakan',
        'jenis_tindakan',
        'harga',
        'catatan',
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }


}
