<x-layouts.app :title="__('Jadwal')">
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Jadwal Praktek</h1>
            </div>
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-lg shadow-sm transition">
                Tambah Jadwal
            </button>
        </div>

        <!-- Card Container -->
        <div class="bg-white border rounded-xl shadow-sm p-5">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Jadwal Praktek</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($dokterJadwals->jadwals as $jadwal)
                    <div class="border rounded-xl p-4 shadow-sm hover:shadow-md transition">
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $jadwal->hari }}</h3>
                            <span class="bg-green-100 text-green-700 text-sm px-3 py-1 rounded-full font-medium">
                                Aktif
                            </span>
                        </div>

                        <p class="text-gray-600">{{ $jadwal->aktif_mulai->format('H:i') }} - {{ $jadwal->aktif_selesai->format('H:i') }}
                        </p>

                        <p class="text-gray-600 mb-4">
                            {{ $jadwal->keterangan }}
                        </p>

                        <button
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium w-full py-2 rounded-lg transition">
                            Edit
                        </button>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-layouts.app>
