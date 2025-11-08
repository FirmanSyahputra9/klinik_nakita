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

});

Route ::middleware(['auth'])->prefix('dokter')->group(function () {
    Route::view('/', 'pages.dokter.dashboard')
        ->name('dashboarddokter');
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
