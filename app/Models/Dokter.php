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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aktif()
    {
        return $this->hasOne(DokterAktif::class);
    }

    public function jadwals()
    {
        return $this->hasMany(DokterJadwal::class);
    }
}
