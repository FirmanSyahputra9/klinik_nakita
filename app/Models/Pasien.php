<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'no_rm',
        'gol_darah',
        'alamat',
        'nik',
        'birth_date',
        'gender',
        'phone',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    /**
     * Relasi ke model User
     * (Pasien milik satu user)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registrasi()
    {
        return $this->hasMany(Registrasi::class);
    }
}
