<?php

namespace App\Livewire\Pages\Dokter;

use App\Models\Antrian;
use App\Models\Dokter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Janji extends Component
{
    use WithPagination;

    public $filterDate;

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
        $today = date('Y-m-d');
        $dokterId = Dokter::where('user_id', Auth::id())->value('id');

        $janji = Antrian::with(['pasien', 'registrasi', 'dokter'])
            ->where('dokter_id', $dokterId)
            ->whereHas('registrasi', function ($q) {
                $q->whereDate('tanggal_kunjungan', $this->filterDate);
            })
            ->orderBy('status', 'asc')
            ->paginate(10)
            ->through(function ($item) {
                if (optional($item->registrasi)->tanggal_kunjungan) {
                    $item->registrasi->tanggal_kunjungan = \Carbon\Carbon::parse($item->registrasi->tanggal_kunjungan)
                        ->format('d M Y');
                }
                return $item;
            });

        $status = Antrian::select('status')->distinct()->pluck('status');


        return view('livewire..pages.dokter.janji', [
            'janji' => $janji,
            'status' => $status
        ]);
    }
}
