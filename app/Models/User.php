<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'nik',
        'show',
        'gender',
        'birth_date',
        'phone',
        'role',
        'email',
        'password',
        'approved_at',
        'approved',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected $casts = [
        'approved' => 'boolean',
        'email_verified_at' => 'datetime',
        'approved_at' => 'datetime',
        'birth_date' => 'date',
        'password' => 'hashed',
    ];


    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    // Cek apakah user disetujui
    public function isApproved(): bool
    {
        return (bool) $this->approved;
    }

    // Accessor untuk status teks
    public function getApprovedStatusAttribute(): string
    {
        return $this->approved ? 'Ya' : 'Tidak';
    }
}
