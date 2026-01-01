<div>
    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">Pendaftaran(Appointments)
        ({{ $totalAppointment }})</h2>

    <div class="overflow-x-auto ">
        <table class="min-w-full border-spacing-y-3 text-xs whitespace-nowrap">
            <thead class="bg-blue-50 uppercase text-xs font-semibold   ">
                <tr class="bg-blue-50 dark:bg-gray-600 text-xs text-gray-700 dark:text-white dark:border-y">
                    <th class="px-2 py-2 text-left">Kode</th>
                    <th class="px-2 py-2 text-left">Tanggal</th>
                    <th class="px-2 py-2 text-left">Nama Pasien</th>
                    <th class="px-2 py-2 text-left">Dokter</th>
                    <th class="px-2 py-2 text-left">Keluhan</th>
                    <th class="px-2 py-2 text-left">Status</th>
                </tr>
            </thead>

            <tbody class="text-gray-700 ">
                @forelse ($appointment as $item)
                    <tr
                        class="bg-white dark:bg-gray-800 shadow rounded-lg text-sm hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"">
                        <td class="px-2 py-2">{{ $item->appointment_code }}</td>
                        <td class="px-2 py-2">{{ $item->tanggal_kunjungan }}</td>
                        <td class="px-2 py-2">{{ $item->pasiens->name }}</td>
                        <td class="px-2 py-2">{{ $item->dokters->name }}</td>
                        <td class="px-2 py-2">{{ $item->keluhan }}</td>
                        <td
                            class="px-2 py-2
                             @if ($item->status ?? ('' && $item->antrians->kasir->status ?? '')) text-gray-600
                            @elseif ($item->status ?? ('' && !$item->antrians->kasir->status ?? ''))
                                 text-green-600
                            @else
                                 text-yellow-600 @endif
                            ">
                            @if ($item->status ?? ('' && $item->antrians->kasir->status ?? ''))
                                Selesai
                            @elseif ($item->status ?? ('' && !$item->antrians->kasir->status ?? ''))
                                Acc
                            @else
                                Antrian
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-400">
                            Belum ada data pendaftaran
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $appointment->links('pagination::tailwind') }}
        </div>
    </div>
</div>
