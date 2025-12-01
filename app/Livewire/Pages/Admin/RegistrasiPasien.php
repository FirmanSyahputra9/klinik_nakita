<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Dokter;
use App\Models\User;
use Livewire\Component;

class RegistrasiPasien extends Component
{
    public $nama = '';
    public $selectedPasienId = null;
    public $pasienData = [];

    public function updatedSelectedPasienId($value)
    {
        $pasien = User::with('pasien')->find($value);
        if ($pasien) {
            $this->pasienData = [
                'name' => $pasien->pasien->name,
                'no_rm' => $pasien->pasien->no_rm,
                'phone' => $pasien->pasien->phone,
            ];
        } else {
            $this->pasienData = [];
        }
    }

    public function render()
    {
        $pasien = User::whereHas('pasien', function ($query) {
            $query->where('name', 'like', '%' . $this->nama . '%');
        })->with(['pasien'])->get();

        $dokter = Dokter::with(['jadwals'])->get();

        $dayOrder = ['Senin' => 1, 'Selasa' => 2, 'Rabu' => 3, 'Kamis' => 4, 'Jumat' => 5, 'Sabtu' => 6, 'Minggu' => 7];

        $groupedJadwals = [];

        foreach ($dokter as $d) {
            $sortedJadwals = $d->jadwals->sortBy(function ($jadwal) use ($dayOrder) {
                return $dayOrder[$jadwal->hari] ?? 99;
            });

            $groupedJadwals[$d->id] = $sortedJadwals->reduce(function ($carry, $item) {
                $mulai = $item->aktif_mulai->format('H:i');
                $selesai = $item->aktif_selesai->format('H:i');
                $signature = $mulai . ' - ' . $selesai;

                $lastGroup = end($carry);
                if ($lastGroup && $lastGroup['signature'] === $signature) {
                    $carry[key($carry)]['hari_selesai'] = $item->hari;
                } else {
                    $carry[] = [
                        'hari_mulai' => $item->hari,
                        'hari_selesai' => $item->hari,
                        'signature' => $signature,
                        'mulai' => $mulai,
                        'selesai' => $selesai,
                    ];
                }

                return $carry;
            }, []);
        }
        return view('livewire..pages.admin.registrasi-pasien', [
            'pasien' => $pasien,
            'dokter' => $dokter,
            'groupedJadwals' => $groupedJadwals
        ]);
    }
}
