<?php

namespace App\Http\Controllers\Auth;

use App\Livewire\Actions\Logout;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginResponseController implements LoginResponseContract
{
    public function toResponse($request)
    {
        // redirect berdasarkan role
        $user = $request->user();

        if ($user->approved === false) {
            Auth::logout();
            return redirect('/login')->with('error', 'Anda belum disetujui oleh admin');
        }

        if ($user->role === 'admin' || $user->role === 'superadmin') {
            return redirect('/admin');
        } elseif ($user->role === 'doctor') {
            return redirect('/dokter');
        } elseif ($user->role === 'user') {
            return redirect('/user');
        }

        return redirect('/'); // default
    }
}
