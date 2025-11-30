<?php

namespace App\Livewire\Pages\Admin;

use App\Models\DokterJadwal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class DataDokter extends Component
{
    use WithPagination;
    public $search = '';
    protected $queryString = ['search'];



    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function formatHariRange($jadwals)
    {
        if ($jadwals->isEmpty()) return '-';

        $urutanHari = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        ];

        $sorted = $jadwals->sortBy(function ($item) use ($urutanHari) {
            return array_search($item->hari, $urutanHari);
        })->values();

        $ranges = [];
        $start = $sorted[0]->hari;
        $previous = $sorted[0]->hari;

        foreach ($sorted->slice(1) as $item) {
            $current = $item->hari;
            if (array_search($current, $urutanHari) == array_search($previous, $urutanHari) + 1) {
                $previous = $current;
                continue;
            }
            $ranges[] = $start === $previous ? $start : "$start-$previous";

            $start = $current;
            $previous = $current;
        }
        $ranges[] = $start === $previous ? $start : "$start-$previous";

        return implode(', ', $ranges);
    }


    public function render()
    {

        $today = Carbon::now()->locale('id')->translatedFormat('l');

        $subQueryJadwal = DokterJadwal::query()
            ->select(DB::raw('1'))
            ->where('hari', $today)
            ->whereColumn('dokter_id', 'dokters.id')
            ->limit(1);

        $dokters = User::query()
            ->whereHas('dokter', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('spesialisasi', 'like', '%' . $this->search . '%');
            })

            ->join('dokters', 'users.id', '=', 'dokters.user_id')
            ->select('users.*')
            ->addSelect(['has_today_schedule' => $subQueryJadwal])
            ->orderBy('has_today_schedule', 'DESC')
            ->orderBy('dokters.name', 'asc')
            ->with('dokter', 'dokter.jadwals')
            ->paginate(10, ['*'], 'dokter-page')->tap(function ($paginator) {
                $paginator->getCollection()->transform(function ($item) {
                    if ($item->created_at) {
                        $item->create_at = Carbon::parse($item->created_at)->format('d M Y');
                    }
                    return $item;
                });
            });


        return view('livewire.pages.admin.data-dokter', [
            'dokters' => $dokters
        ]);
    }
}
