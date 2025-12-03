<div class="dark:bg-gray-800">
    <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-4">Dokter Aktif ({{ $jadwalsTotal }})</h2>

    <div class="overflow-x-auto">
        <table class="w-full text-xs uppercase border border-gray-300 rounded-lg whitespace-nowrap ">
            <thead class="bg-gray-200 text-gray-700 dark:text-white dark:bg-gray-600 dark:border-y">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Lengkap</th>
                    <th class="px-4 py-2 text-left">Spesialisasi</th>
                    <th class="px-4 py-2 text-left">No. Telepon</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Jadwal</th>
                </tr>
            </thead>

            <tbody class="bg-white dark:bg-gray-800 divide-y">
                @forelse ($jadwals as $item)
                    <tr class="dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"">
                        <td class="px-4 py-2 min-w-32 max-w-32 overflow-x-auto thin-scroll">{{ $item->dokter->name }}</td>
                        <td class="px-4 py-2 min-w-32 max-w-32 overflow-x-auto thin-scroll">{{ $item->dokter->spesialisasi }}</td>
                        <td class="px-4 py-2 min-w-32 max-w-32 overflow-x-auto thin-scroll">{{ $item->dokter->phone }}</td>
                        <td class="px-4 py-2 min-w-32 max-w-32 overflow-x-auto thin-scroll">{{ $item->dokter->user->email }}</td>
                        <td class="px-4 py-2 min-w-32 max-w-32 overflow-x-auto thin-scroll">{{ $item->mulai_aktif }} - {{ $item->selesai_aktif }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-400">
                            Tidak ada jadwal dokter untuk hari ini
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>{{ $jadwals->links('pagination::tailwind')}}</div>
</div>
