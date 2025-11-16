<?php

namespace App\Actions\Fortify;

use App\Models\Nik;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Pasien;
use Illuminate\Support\Facades\Hash;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => $this->passwordRules(),
            'name' => ['required', 'string', 'max:255'],
            'gol_darah' => ['nullable', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255', 'unique:pasiens,alamat'],
            'nik' => ['required', 'string', 'max:255', 'unique:pasiens,nik'],
            'birth_date' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:male,female'],
            'phone' => ['required', 'string', 'max:255'],
        ])->validate();

        $user = User::create([
            'username' => $input['username'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $formatPhone = trim(chunk_split(preg_replace('/\D/', '', $input['phone']), 4, ' '));
        Pasien::create([
            'user_id' => $user->id,
            'name' => $input['name'],
            'gol_darah' => $input['gol_darah'] ?? null,
            'alamat' => $input['alamat'],
            'nik' => $input['nik'],
            'birth_date' => $input['birth_date'] ?? null,
            'gender' => $input['gender'] ?? null,
            'phone' => $formatPhone,
            'no_rm' => null
        ]);

        return $user;
    }
}
