<?php

use App\Http\Controllers\AdminUser as AdminUser;
use App\Http\Controllers\DokterController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\RegistrasiController as RegistrasiController;
use App\Http\Controllers\ObatController as ObatController;
use App\Http\Controllers\PasienController as PasienController;
use App\Http\Controllers\AppointmentController as AppointmentController;
use App\Http\Controllers\DokterDashboardController;
use App\Http\Controllers\DokterJadwalController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\UserJadwalDokter;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::middleware(['auth', 'is.admin'])->prefix('admin')->group(function () {
    Route::view('/', 'pages.admin.dashboard')
        ->name('dashboard');
    Route::resource('users', AdminUser::class);
    Route::post('users/approve/{id}', [AdminUser::class, 'approve'])
        ->name('users.approve');
    Route::resource('appointment', AppointmentController::class);
    Route::resource('kasir', KasirController::class);
    Route::view('/tambah-kas', 'pages.admin.tambah-kas')
        ->name('tambahkas');
    Route::resource('/stok-obat', ObatController::class);
    Route::resource('dokter', DokterController::class);
    // Route::resource('pasien', PasienController::class);
});

Route::middleware(['auth', 'is.user'])->prefix('user')->group(function () {
    Route::view('/', 'pages.pasien.dashboard')
        ->name('dashboarduser');
    Route::resource('jadwaldokter', UserJadwalDokter::class);
    Route::view('/riwayat', 'pages.pasien.riwayat')
        ->name('riwayatuser');
    Route::view('/hasil', 'pages.pasien.hasil')
        ->name('hasiluser');
    Route::view('/obat', 'pages.pasien.obat')
        ->name('obatuser');
    Route::get('registrasi/{id}', [RegistrasiController::class, 'index'])->name('registrasi.index');

    Route::resource('registrasi', RegistrasiController::class)->except(['index']);
});


Route::middleware(['auth'])->prefix('dokter')->group(function () {
    Route::get('/', [DokterDashboardController::class, 'index'])->name('dashboarddokter');
    Route::view('/janji', 'pages.dokter.janji')
        ->name('janjidokter');
    Route::view('/resep', 'pages.dokter.resep')
        ->name('resep');
    Route::resource('jadwal', DokterJadwalController::class);
    Route::resource('data', PasienController::class);
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
