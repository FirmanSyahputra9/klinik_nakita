<?php

namespace App\Livewire\Pages\Short;

use App\Models\Dokter;
use App\Models\DokterJadwal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DokterAktif extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public function mount() {}

    public function render()
    {
        $hariIni = Carbon::now()->locale('id')->translatedFormat('l');


        $jadwals = DokterJadwal::where('hari', $hariIni)->whereHas('dokter')->with('dokter', 'dokter.user')->paginate(4, ['*'], 'DokterJadwal-short')
            ->tap(function ($jadwals) {
                foreach ($jadwals as $jadwal) {
                    $jadwal->mulai_aktif = date('H:i', strtotime($jadwal->aktif_mulai));
                    $jadwal->selesai_aktif = date('H:i', strtotime($jadwal->aktif_selesai));
                }
            });

        $jadwalsTotal = DokterJadwal::where('hari', $hariIni)->whereHas('dokter')->count();

        return view('livewire..pages.short.dokter-aktif', [
            'jadwals' => $jadwals,
            'jadwalsTotal' => $jadwalsTotal

        ]);
    }
}
