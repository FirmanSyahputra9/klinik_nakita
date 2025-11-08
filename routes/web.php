<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::middleware(['auth', 'is.admin'])->prefix('admin')->group(function () {
    Route::view('/', 'pages.admin.dashboard')
        ->name('dashboard');
    Route::view('/users', 'pages.admin.users')
        ->name('users');
    Route::view('/appointment', 'pages.admin.appointment')->name('appointmentadmin');
});

Route::middleware(['auth', 'is.user'])->prefix('user')->group(function () {
    Route::view('/', 'pages.pasien.dashboard')
        ->name('dashboarduser');
    Route::view('/jadwal', 'pages.pasien.jadwal')
        ->name('jadwaluser');
    Route::view('/riwayat', 'pages.pasien.riwayat')
        ->name('riwayatuser');
    Route::view('/hasil', 'pages.pasien.hasil')
        ->name('hasiluser');
    Route::view('/obat', 'pages.pasien.obat')
        ->name('obatuser');

});

Route ::middleware(['auth'])->prefix('dokter')->group(function () {
    Route::view('/', 'pages.dokter.dashboard')
        ->name('dashboarddokter');
    Route::view('/janji', 'pages.dokter.janji')
        ->name('janjidokter');
    Route::view('/data', 'pages.dokter.data')
        ->name('datapasien');
    Route::view('/resep', 'pages.dokter.resep')
        ->name('resep');
    Route::view('/jadwal', 'pages.dokter.jadwal')
        ->name('jadwalpraktek');
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
