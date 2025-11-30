<?php

namespace App\Livewire\Pages\Dokter;

use App\Models\Antrian;
use App\Models\Dokter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Janji extends Component
{

    public function render()
    {
        $today = date('Y-m-d');
        $dokterId = Dokter::where('user_id', Auth::id())->value('id');

        $janji = Antrian::with(['pasien', 'registrasi', 'dokter'])
            ->where('dokter_id', $dokterId)
            ->whereHas('registrasi', function ($q) use ($today) {
                $q->whereDate('tanggal_kunjungan', $today);
            })
            ->orderBy('status', 'asc')
            ->paginate(10)->through(function ($item) {
                if ($item->registrasi && $item->registrasi->tanggal_kunjungan) {
                    $item->registrasi->tanggal_kunjungan = \Carbon\Carbon::parse($item->registrasi->tanggal_kunjungan)
                        ->format('d M Y');
                }
                return $item;
            });

        return view('livewire..pages.dokter.janji', [
            'janji' => $janji
        ]);
    }
}
