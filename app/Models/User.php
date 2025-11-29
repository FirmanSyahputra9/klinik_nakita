<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * Kolom yang dapat diisi secara massal.
     */
    protected $table = 'users';

    protected $fillable = [
        'show',
        'username',
        'email',
        'role',
        'approved',
        'approved_at',
        'email_verified_at',
        'password',
    ];

    /**
     * Kolom yang disembunyikan saat serialisasi.
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Casting tipe data kolom.
     */
    protected $casts = [
        'approved' => 'boolean',
        'email_verified_at' => 'datetime',
        'approved_at' => 'datetime',    
        'password' => 'hashed',
    ];


    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }
    public function isApproved(): bool
    {
        return (bool) $this->approved;
    }

    public function getApprovedStatusAttribute(): string
    {
        return $this->approved ? 'Ya' : 'Tidak';
    }

    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'user_id');
    }

    public function dokter()
    {
        return $this->hasOne(Dokter::class, 'user_id');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id');
    }
}
