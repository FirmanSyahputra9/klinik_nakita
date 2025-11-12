<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokters';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'alamat',
        'spesialisasi',
        'phone',
        'email',
        'status',
        'nik',
        'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
