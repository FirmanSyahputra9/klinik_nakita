<x-layouts.app :title="__('Detail Pasien')">
    <div class="max-w-5xl mx-auto mt-6 sm:mt-10 bg-white dark:bg-gray-800 rounded-2xl shadow p-4 sm:p-8">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 mb-6 space-y-4 sm:space-y-0">
            <a href="{{ url()->previous() }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white self-start sm:self-auto">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>

            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-gray-500 dark:text-gray-300 text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ $user->pasien->name }}</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        {{ $user->pasien->gender_label ?? '-' }} ,
                        {{ $user->pasien->umur ?? '-' }} Tahun
                        &nbsp;•&nbsp; Gol. Darah {{ $user->pasien->gol_darah ?? '-' }}
                    </p>
                    <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">
                        <span class="font-semibold text-gray-800 dark:text-gray-100">No. Telepon:</span> {{ $user->pasien->phone ?? '-' }}<br>
                        <span class="font-semibold text-gray-800 dark:text-gray-100">Email:</span> {{ $user->email ?? '-' }}
                    </p>
                </div>
            </div>
        </div>

        <hr class="my-4 border-gray-300 dark:border-gray-600">

        <!-- Konten Utama Scrollable -->
        <div class="space-y-10 pb-10">

            <!-- Informasi Pribadi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">

                <!-- Data Pribadi -->
                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                    <h3 class="font-semibold mb-2 text-gray-800 dark:text-gray-100">Data Pribadi</h3>
                    <div class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                        <p><span class="font-medium text-gray-800 dark:text-gray-100">NIK:</span> {{ $user->pasien->nik ?? '-' }}</p>
                        <p><span class="font-medium text-gray-800 dark:text-gray-100">Tanggal Lahir:</span> {{ $user->pasien->tanggal_lahir ?? '-' }}</p>
                        <p><span class="font-medium text-gray-800 dark:text-gray-100">Jenis Kelamin:</span> {{ $user->pasien->gender_label ?? '-' }}</p>
                        <p><span class="font-medium text-gray-800 dark:text-gray-100">Tanggal Registrasi:</span> {{ $user->create_at ?? '-' }}</p>
                    </div>
                </div>

                <!-- Kontak & Alamat -->
                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                    <h3 class="font-semibold mb-2 text-gray-800 dark:text-gray-100">Kontak & Alamat</h3>
                    <div class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                        <p><span class="font-medium text-gray-800 dark:text-gray-100">No. Telepon:</span> {{ $user->pasien->phone ?? '-' }}</p>
                        <p><span class="font-medium text-gray-800 dark:text-gray-100">Email:</span> {{ $user->email }}</p>
                        <p><span class="font-medium text-gray-800 dark:text-gray-100">Alamat:</span> {{ $user->pasien->alamat }}</p>
                    </div>
                </div>

                <!-- Kontak Darurat -->
                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                    <h3 class="font-semibold mb-2 text-gray-800 dark:text-gray-100">Kontak Darurat</h3>
                    <div class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                        <p><span class="font-medium text-gray-800 dark:text-gray-100">Nama:</span> {{ $user->kontak_darurat_nama ?? '-' }}</p>
                        <p><span class="font-medium text-gray-800 dark:text-gray-100">Hubungan:</span> {{ $user->kontak_darurat_hubungan ?? '-' }}</p>
                        <p><span class="font-medium text-gray-800 dark:text-gray-100">No. Telepon:</span> {{ $user->kontak_darurat_no_telepon ?? '-' }}</p>
                    </div>
                </div>

                <!-- Informasi Medis -->
                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                    <h3 class="font-semibold mb-2 text-gray-800 dark:text-gray-100">Informasi Medis</h3>
                    <div class="bg-white dark:bg-gray-900 rounded-lg p-3 flex flex-wrap gap-2 border border-gray-200 dark:border-gray-600">
                        @if ($riwayat)
                        @forelse ($riwayat as $item)
                        <span class="px-3 py-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100 rounded-full text-xs">
                            {{ $item->data_pemeriksaan->diagnosa ?? '-' }}
                        </span>
                        @empty
                        <span class="px-3 py-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100 rounded-full text-xs">-</span>
                        @endforelse
                        @else
                        <span class="px-3 py-1 bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100 rounded-full text-xs">-</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Hasil Lab -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                <h3 class="font-semibold mb-4 text-gray-800 dark:text-gray-100">Hasil Pemeriksaan Lab</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden">
                        <thead class="bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">Pemeriksaan</th>
                                <th class="px-4 py-2 text-left">Hasil</th>
                                <th class="px-4 py-2 text-left">Nilai Normal</th>
                                <th class="px-4 py-2 text-left">Status</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-300 dark:divide-gray-700">
                            @if ($hasil)
                            @forelse ($hasil as $item)
                            @forelse ($item->lab as $aitem)
                            <tr class="text-gray-700 dark:text-gray-300">
                                <td class="px-4 py-2">{{ $aitem->jenis->jenis_pemeriksaan ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $aitem->nilai ?? '-' }} {{ $aitem->jenis->satuan ?? '-' }}</td>
                                <td class="px-4 py-2">
                                    {{ $aitem->jenis->normal_min ?? '-' }} ~ {{ $aitem->jenis->normal_max ?? '-' }}
                                    {{ $aitem->jenis->satuan ?? '-' }}
                                </td>
                                <td class="px-4 py-2 text-green-600 dark:text-green-400 font-semibold">Normal</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-gray-400 dark:text-gray-500">
                                    Belum ada hasil pemeriksaan
                                </td>
                            </tr>
                            @endforelse
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-gray-400 dark:text-gray-500">
                                    Belum ada hasil pemeriksaan
                                </td>
                            </tr>
                            @endforelse
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <!-- Tombol Edit -->
        <div class="mt-8 text-center sm:text-right">
            <a href="{{ route('users.edit', $user->id) }}"
                class="inline-flex items-center bg-indigo-600 text-white dark:bg-indigo-500 dark:hover:bg-indigo-600 px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                <i class="fas fa-edit mr-2"></i> Edit Data
            </a>
        </div>
    </div>
</x-layouts.app>