<?php

namespace App\Livewire;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\Obat;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;


class AdminDashboard extends Component
{
    public $totalPengguna;
    public $penggunaBaru;
    public $penggunaHariIni;
    public $totalDokter;
    public $dokterSpesialis;
    public $dokterUmum;
    public $totalJanji;
    public $totalJanjiHariIni;
    public $totalJanjiBaru;
    public $totalObat;
    public $obatSisaSedikit;
    public $obatHabis;

    public function mount()
    {
        $this->totalPengguna = User::where('role', 'user')->count();
        $this->penggunaBaru = User::where('role', 'user')
            ->where('approved', true)
            ->whereNotNull('approved_at')
            ->whereBetween('approved_at', [Carbon::now()->subDays(30), Carbon::now()])
            ->count();
        $this->penggunaHariIni = User::where('role', 'user')
            ->where('approved', true)
            ->whereNotNull('approved_at')
            ->whereBetween('approved_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
            ->count();

        $this->totalDokter = Dokter::count();
        $this->dokterSpesialis = Dokter::where('spesialisasi', '!=', 'Dokter Umum')->count();
        $this->dokterUmum = Dokter::where('spesialisasi', 'Dokter Umum')->count();
        $this->totalJanji = Antrian::count();
        $this->totalJanjiHariIni = Antrian::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->count();
        $this->totalJanjiBaru = Antrian::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();
        $this->totalObat = Obat::count();
        $this->obatSisaSedikit = Obat::where('stok', '<=', 20)->count();
        $this->obatHabis = Obat::where('stok', 0)->count();
    }

    public function render()
    {

        return view('livewire.admin-dashboard', [
            'totalPengguna' => $this->totalPengguna,
            'penggunabaru' => $this->penggunaBaru,
            'penggunaHariIni' => $this->penggunaHariIni,
            'totalDokter' => $this->totalDokter,
            'dokterSpesialis' => $this->dokterSpesialis,
            'dokterUmum' => $this->dokterUmum,
            'totalJanji' => $this->totalJanji,
            'totalJanjiHariIni' => $this->totalJanjiHariIni,
            'totalJanjiBaru' => $this->totalJanjiBaru,
            'totalObat' => $this->totalObat
        ]);
    }
}
