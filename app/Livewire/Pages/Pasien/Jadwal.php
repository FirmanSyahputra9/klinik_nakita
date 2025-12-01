<?php

namespace App\Livewire\Pages\Pasien;

use App\Models\Dokter;
use App\Models\DokterAktif;
use Livewire\Component;
use Livewire\WithPagination;

class Jadwal extends Component
{
    use WithPagination;
    public $search = '';
    public $filterSpesialisasi = '';
    public $filterStatus = '';

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingFilterSpesialisasi(){
        $this->resetPage();
    }
    public function updatingFilterStatus(){
        $this->resetPage();
    }

    public function render()
    {
        $dayOrder = ['Senin' => 1, 'Selasa' => 2, 'Rabu' => 3, 'Kamis' => 4, 'Jumat' => 5, 'Sabtu' => 6, 'Minggu' => 7];

        $dokters = Dokter::whereHas('aktif',
            function ($query) {
                $query->where('aktif', 'like', '%' . $this->filterStatus . '%');
            })->with(['jadwals', 'aktif'])->when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->when($this->filterSpesialisasi, function ($query) {
            return $query->where('spesialisasi', 'like', '%' . $this->filterSpesialisasi . '%');
        })
            ->whereHas('jadwals')
            ->get();
        $dokters = $dokters->map(function ($dokter) use ($dayOrder) {

            $sortedJadwals = $dokter->jadwals->sortBy(function ($jadwal) use ($dayOrder) {
                return $dayOrder[$jadwal->hari] ?? 99;
            });

            $groupedJadwals = $sortedJadwals->reduce(function ($carry, $item) {

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

            $dokter->grouped_jadwals = $groupedJadwals;
            return $dokter;
        });

        $status = DokterAktif::select('aktif')->distinct()->pluck('aktif');
        $spesialisai = Dokter::select('spesialisasi')->distinct()->pluck('spesialisasi');
        return view('livewire..pages.pasien.jadwal',[
            'dokters' => $dokters,
            'status' => $status,
            'spesialisai' => $spesialisai
        ]);
    }
}
