<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Obat;
use Livewire\Component;
use Livewire\WithPagination;

class StokObat extends Component
{
    use WithPagination;
    public $search;
    public $filterSatuan;
    public $filterStok;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterSatuan()
    {
        $this->resetPage();
    }

    public function updatingFilterStok()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->search = request()->query('search', '');
        $this->filterSatuan = request()->query('filterSatuan', '');
        $this->filterStok = request()->query('filterStok', '');
    }
    public function render()
    {
        $query = Obat::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                    ->orWhere('kode', 'like', '%' . $this->search . '%')
                    ->orWhere('satuan', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filterSatuan) {
            $query->where('satuan', $this->filterSatuan);
        }

        if ($this->filterStok) {
            if ($this->filterStok === 'low') {
                $query->where('stok', '<=', 10);
            } elseif ($this->filterStok === 'safe') {
                $query->where('stok', '>', 10);
            }
        }


        $obats = $query->paginate(10, ['*'], 'obat-page');


        $satuan = Obat::select('satuan')->distinct()->pluck('satuan');
        return view('livewire.pages.admin.stok-obat', [
            'obats' => $obats,
            'satuan' => $satuan
        ]);
    }
}
