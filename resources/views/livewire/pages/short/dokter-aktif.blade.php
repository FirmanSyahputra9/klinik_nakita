<div>
    <h2 class="text-lg font-bold text-gray-800 mb-4">Dokter Aktif ({{ $jadwalsTotal }})</h2>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border border-gray-300 rounded-lg whitespace-nowrap ">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Nama Lengkap</th>
                    <th class="px-4 py-2 text-left">Spesialisasi</th>
                    <th class="px-4 py-2 text-left">No. Telepon</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Jadwal</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y">
                @forelse ($jadwals as $item)
                    <tr>
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
