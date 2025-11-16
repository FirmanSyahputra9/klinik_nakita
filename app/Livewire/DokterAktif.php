<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Dokter;
use Illuminate\Support\Facades\Auth;

class DokterAktif extends Component
{
    public $dokter;
    public $isAktif;

    public function mount()
    {
        $this->dokter = Dokter::whereHas('aktif')->where('user_id', Auth::id())->first();

        if ($this->dokter) {
            $this->isAktif = (bool) $this->dokter->aktif->aktif;
        } else {
            $this->isAktif = false;
        }
    }

    public function updateStatus()
    {
        if ($this->dokter && $this->dokter->aktif) {
            $this->dokter->aktif->update([
                'aktif' => $this->isAktif
            ]);

            session()->flash(
                'status',
                'Status berhasil diperbarui menjadi ' .
                    ($this->isAktif ? 'Aktif' : 'Tidak Aktif') . '.'
            );
        } else {
            session()->flash('error', 'Data dokter tidak ditemukan.');
        }
    }

    public function render()
    {
        return view('livewire.dokter-aktif');
    }
}
