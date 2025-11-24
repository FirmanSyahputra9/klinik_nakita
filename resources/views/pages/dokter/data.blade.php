<x-layouts.app :title="__('Data')">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-2">Data Pasien </h1>


        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-semibold text-lg">Data Pasien</h2>
                <input type="text" placeholder="Cari Pasien..."
                    class="border border-gray-300 rounded-md px-3 py-2 w-64 focus:outline-none focus:ring focus:ring-blue-200" />
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border-separate border-spacing-y-2">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700 text-sm">
                            <th class="text-left px-4 py-2">Nama</th>
                            <th class="text-left px-4 py-2">Umur</th>
                            <th class="text-left px-4 py-2">Jenis Kelamin</th>
                            <th class="text-left px-4 py-2">No. Rekam Medis</th>
                            <th class="text-left px-4 py-2">Tanggal Kunjungan</th>
                            <th class="text-left px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-800">
                        @if ($antrian)
                            @foreach ($antrian as $item)
                                <tr class="bg-white hover:bg-gray-50 rounded-lg shadow-sm">
                                    <td class="px-4 py-3">
                                        <div class="font-semibold">{{ $item->pasien->name }}</div>
                                        <div class="text-gray-500 text-xs">{{ $item->pasien->phone }}</div>
                                    </td>
                                    <td class="px-4 py-3">{{ $item->pasien->umur }} Tahun</td>
                                    <td class="px-4 py-3">{{ $item->pasien->gender_label }}</td>
                                    <td class="px-4 py-3">{{ $item->pasien->no_rm }}</td>
                                    <td class="px-4 py-3">
                                        {{ $item->registrasi->tanggal_kunjungan }}</td>
                                    <td class="px-4 py-3 flex items-center gap-3">

                                        <!-- Tombol Edit (Pencil Square) -->
                                        <a href="{{ route('data.show', $item->id) }}"
                                            class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16.862 3.487l2.651 2.651M7.5 16.5l9.362-9.362M3 21h6l11-11a2.121 2.121 0 00-3-3L6 18v6z" />
                                            </svg>
                                        </a>

                                        <!-- Tombol Lihat (Eye) -->
                                        <button
                                            class="p-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>

                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
