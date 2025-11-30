<?php

use App\Http\Controllers\AdminDokterJadwalController;
use App\Http\Controllers\AdminUser as AdminUser;
use App\Http\Controllers\AlergiController;
use App\Http\Controllers\DokterController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\RegistrasiController as RegistrasiController;
use App\Http\Controllers\ObatController as ObatController;
use App\Http\Controllers\PasienController as PasienController;
use App\Http\Controllers\AppointmentController as AppointmentController;
use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\DataPemeriksaanController;
use App\Http\Controllers\DokterDashboardController;
use App\Http\Controllers\DokterJadwalController;
use App\Http\Controllers\DokterJanjiController;
use App\Http\Controllers\JenisPemeriksaanController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PasienDashboardController;
use App\Http\Controllers\PasienHasilController;
use App\Http\Controllers\PasienObatController;
use App\Http\Controllers\PasienRiwayatController;
use App\Http\Controllers\PemeriksaanLaboratoriumController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\UserJadwalDokter;
use App\Models\DataPasien;
use App\Models\PemeriksaanLaboratorium;

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
    Route::post('/appointment/{id}/konfirmasi', [AppointmentController::class, 'konfirmasi'])->name('appointment.konfirmasi');
    Route::post('/appointment/{id}/selesai', [AppointmentController::class, 'selesai'])->name('appointment.selesai');
    Route::post('/appointment/{id}/batalkan', [AppointmentController::class, 'batalkan'])->name('appointment.batalkan');
    Route::resource('kasir', KasirController::class);
    Route::post('/kasir/{id}/konfirmasi', [KasirController::class, 'konfirmasi'])->name('kasir.konfirmasi');
    Route::view('/tambah-kas', 'pages.admin.tambah-kas')
        ->name('tambahkas');
    Route::get('/kasir/create', [KasirController::class, 'create'])->name('kasir.create');

    Route::resource('/stok-obat', ObatController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('dokter-jadwal', AdminDokterJadwalController::class);

    // Route::resource('pasien', PasienController::class);
});

Route::middleware(['auth', 'is.user'])->prefix('user')->group(function () {
    Route::get('/', [PasienDashboardController::class, 'index'])
        ->name('dashboarduser');
    Route::resource('jadwaldokter', UserJadwalDokter::class);
    Route::view('/riwayat', 'pages.pasien.riwayat')
        ->name('riwayatuser');
    Route::resource('riwayat', PasienRiwayatController::class);
    Route::resource('hasil', PasienHasilController::class);
    Route::resource('obat', PasienObatController::class);
    Route::get('registrasi/{id}', [RegistrasiController::class, 'index'])->name('registrasi.index');
    Route::resource('registrasi', RegistrasiController::class)->except(['index']);
});


Route::middleware(['auth', 'is.dokter'])->prefix('dokter')->group(function () {
    Route::get('/', [DokterDashboardController::class, 'index'])->name('dashboarddokter');
    Route::resource('janji', DokterJanjiController::class);
    Route::resource('resep', ResepController::class);
    Route::post('/janji/{id}/konfirmasi', [DokterJanjiController::class, 'konfirmasi'])->name('janji.konfirmasi');
    Route::post('/janji/{id}/selesai', [DokterJanjiController::class, 'selesai'])->name('janji.selesai');
    Route::resource('jadwal', DokterJadwalController::class);
    Route::resource('data', PasienController::class);
    Route::resource('data-pasien', DataPasienController::class);
    Route::resource('jenis-pemeriksaan', JenisPemeriksaanController::class);
    Route::resource('data-pemeriksaan', DataPemeriksaanController::class);
    Route::resource('pemeriksaan-lab', PemeriksaanLaboratoriumController::class);
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
