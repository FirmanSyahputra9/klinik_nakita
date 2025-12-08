<div>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Data Pasien</h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

            <!-- FILTER -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
                <h2 class="font-semibold text-lg">Data Pasien</h2>

                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <input type="text" wire:model.live.debounce.500ms="search"
                        placeholder="Cari nama, No. RM, telepon..."
                        class="border border-gray-300 rounded-md px-3 py-2 w-full sm:w-64 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white">

                    <input type="date" wire:model.live.debounce.500ms="filterDate"
                        class="border border-gray-300 rounded-md px-3 py-2 w-full sm:w-48 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white">
                </div>
            </div>

            <!-- ========================= -->
            <!--     DESKTOP TABLE         -->
            <!-- ========================= -->
            <div class="hidden md:block overflow-x-auto">
                <table class="min-w-full dark:border border-spacing-y-2">
                    <thead>
                        <tr class="bg-blue-50 text-gray-700 text-sm dark:text-white dark:bg-gray-600">
                            <th class="px-4 py-2 text-left">Nama</th>
                            <th class="px-4 py-2 text-left">Umur</th>
                            <th class="px-4 py-2 text-left">Jenis Kelamin</th>
                            <th class="px-4 py-2 text-left">No. Rekam Medis</th>
                            <th class="px-4 py-2 text-left">Tanggal Kunjungan</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="text-sm text-gray-800 dark:text-gray-300">
                        @forelse ($antrian as $item)
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="px-4 py-3">
                                <div class="font-semibold">{{ $item->pasien->name }}</div>
                                <div class="text-xs text-gray-500">{{ $item->pasien->phone }}</div>
                            </td>
                            <td class="px-4 py-3">{{ $item->pasien->umur }} Tahun</td>
                            <td class="px-4 py-3">{{ $item->pasien->gender_label }}</td>
                            <td class="px-4 py-3">{{ $item->pasien->no_rm }}</td>
                            <td class="px-4 py-3">{{ $item->registrasi->tanggal_kunjungan }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('data.show', $item->id) }}"
                                    class="inline-flex items-center justify-center w-9 h-9 bg-blue-500 dark:bg-gray-600 rounded-md hover:bg-blue-600 dark:hover:bg-gray-800 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 3.487l2.651 2.651M7.5 16.5l9.362-9.362M3 21h6l11-11a2.121 2.121 0 00-3-3L6 18v6z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-6 text-center text-gray-400">Belum ada data pasien</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $antrian->links('pagination::tailwind') }}
                </div>
            </div>

            <!-- ========================= -->
            <!--     MOBILE CARD VIEW      -->
            <!-- ========================= -->
            <div class="md:hidden space-y-4">

                @forelse ($antrian as $item)
                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 bg-white dark:bg-gray-800 shadow relative">

                    <!-- ICON EDIT (tetap stabil & rapi) -->
                    <a href="{{ route('data.show', $item->id) }}"
                        class="absolute top-3 right-3 w-9 h-9 bg-blue-500 dark:bg-gray-600 rounded-md flex items-center justify-center shadow hover:bg-blue-600 dark:hover:bg-gray-900 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 3.487l2.651 2.651M7.5 16.5l9.362-9.362M3 21h6l11-11a2.121 2.121 0 00-3-3L6 18v6z" />
                        </svg>
                    </a>

                    <div class="pr-12">
                        <p class="font-semibold text-gray-800 dark:text-gray-100 text-lg">
                            {{ $item->pasien->name }}
                        </p>
                        <p class="text-gray-500 dark:text-gray-300 text-sm">{{ $item->pasien->phone }}</p>

                        <div class="mt-3 space-y-1 text-sm text-gray-700 dark:text-gray-300">
                            <p><span class="font-medium">Umur:</span> {{ $item->pasien->umur }} Tahun</p>
                            <p><span class="font-medium">Jenis Kelamin:</span> {{ $item->pasien->gender_label }}</p>
                            <p><span class="font-medium">No. RM:</span> {{ $item->pasien->no_rm }}</p>
                            <p><span class="font-medium">Tgl Kunjungan:</span> {{ $item->registrasi->tanggal_kunjungan }}</p>
                        </div>
                    </div>

                </div>
                @empty
                <p class="text-center text-gray-500 py-6">Belum ada data pasien</p>
                @endforelse

                <div class="mt-3">
                    {{ $antrian->links('pagination::tailwind') }}
                </div>
            </div>

        </div>
    </div>
</div>