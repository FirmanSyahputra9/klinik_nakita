<?php

namespace App\Livewire\Pages\Dokter;

use App\Models\Antrian;
use App\Models\Dokter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DataPasien extends Component
{
    use WithPagination;

    public $search = '';
    public $filterDate = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterDate()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->filterDate = date('Y-m-d');
    }

    public function render()
    {
        $dokterId = Dokter::where('user_id', Auth::id())->value('id');

        $antrian = Antrian::where('status', true)
            ->where('dokter_id', $dokterId)
            ->whereHas('pasien', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('no_rm', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%');
            })->whereHas('registrasi', function ($query) {
                $query->where('tanggal_kunjungan', 'like', '%' . $this->filterDate . '%');
            })
            ->with(['pasien', 'dokter'])
            ->orderBy('registrasi_id', 'desc')
            ->paginate(10, ['*'], 'antrian-page');

        $antrian->map(function ($item) {
            $item->pasien->umur = Carbon::parse($item->pasien->birth_date)->age;
            $item->pasien->gender_label = $item->pasien->gender == 'female' ? 'Perempuan' : 'Laki-laki';

            if ($item->registrasi && $item->registrasi->tanggal_kunjungan) {
                $item->registrasi->tanggal_kunjungan = Carbon::parse($item->registrasi->tanggal_kunjungan)
                    ->locale('id')
                    ->translatedFormat('d F Y');
            }

            return $item;
        });

        return view('livewire.pages.dokter.data-pasien', [
            'antrian' => $antrian
        ]);
    }
}
