<div>
    <h2 class="text-xl font-bold text-gray-800 mb-4">Pendaftaran(Appointments) ({{ $totalAppointment }})</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full border-separate border-spacing-y-3 text-xs whitespace-nowrap">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="px-2 py-2 text-left">Kode</th>
                    <th class="px-2 py-2 text-left">Tanggal</th>
                    <th class="px-2 py-2 text-left">Nama Pasien</th>
                    <th class="px-2 py-2 text-left">Dokter</th>
                    <th class="px-2 py-2 text-left">Keluhan</th>
                    <th class="px-2 py-2 text-left">Status</th>
                </tr>
            </thead>

            <tbody class="text-gray-700">

                @foreach ($appointment as $item)
                    <tr class="bg-white shadow rounded-lg hover:bg-gray-50">
                        <td class="px-2 py-2">{{ $item->appointment_code }}</td>
                        <td class="px-2 py-2">{{ $item->tanggal_kunjungan }}</td>
                        <td class="px-2 py-2">{{ $item->pasiens->name }}</td>
                        <td class="px-2 py-2">{{ $item->dokters->name }}</td>
                        <td class="px-2 py-2">{{ $item->keluhan }}</td>
                        <td class="px-2 py-2 {{ $item->status? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }}">{{ $item->status ? 'Check-In' : 'Belum' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $appointment->links('pagination::tailwind') }}
        </div>
    </div>
</div>
