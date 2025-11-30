<x-layouts.app :title="__('Detail Pasien')">
    <div class="max-w-5xl mx-auto mt-6 sm:mt-10 bg-white rounded-2xl shadow p-4 sm:p-8 ">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 mb-6 space-y-4 sm:space-y-0">
            <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800 self-start sm:self-auto">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>

            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-gray-500 text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-xl sm:text-2xl font-semibold">{{ $user->pasien->name }}</h2>
                    <p class="text-sm text-gray-600">
                        {{ $user->pasien->gender_label ?? '-' }} ,
                        {{ $user->pasien->umur ?? '-' }} Tahun
                        &nbsp;•&nbsp; Gol. Darah {{ $user->pasien->gol_darah ?? '-' }}
                    </p>
                    <p class="text-sm text-gray-700 mt-1">
                        <span class="font-semibold">No. Telepon:</span> {{ $user->pasien->phone ?? '-' }}<br>
                        <span class="font-semibold">Email:</span> {{ $user->email ?? '-' }}
                    </p>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <!-- Konten Utama Scrollable -->
        <div class="space-y-10 pb-10">

            <!-- Informasi Pribadi (Tetap Ada Kontennya, Tidak Ada Navigasi) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">

                <!-- Data Pribadi -->
                <div class="bg-gray-50 rounded-xl p-4">
                    <h3 class="font-semibold mb-2 text-gray-800">Data Pribadi</h3>
                    <div class="text-sm text-gray-700 space-y-1">
                        <p><span class="font-medium">NIK:</span> {{ $user->pasien->nik ?? '-' }}</p>
                        <p><span class="font-medium">Tanggal Lahir:</span> {{ $user->pasien->tanggal_lahir ?? '-' }}</p>
                        <p><span class="font-medium">Jenis Kelamin:</span> {{ $user->pasien->gender_label ?? '-' }}</p>
                        <p><span class="font-medium">Tanggal Registrasi:</span>
                            {{ $user->create_at ?? '-' }}</p>
                    </div>
                </div>

                <!-- Kontak & Alamat -->
                <div class="bg-gray-50 rounded-xl p-4">
                    <h3 class="font-semibold mb-2 text-gray-800">Kontak & Alamat</h3>
                    <div class="text-sm text-gray-700 space-y-1">
                        <p><span class="font-medium">No. Telepon:</span> {{ $user->pasien->phone ?? '-' }}</p>
                        <p><span class="font-medium">Email:</span> {{ $user->email }}</p>
                        <p><span class="font-medium">Alamat:</span> {{ $user->pasien->alamat }}</p>
                    </div>
                </div>

                <!-- Kontak Darurat -->
                <div class="bg-gray-50 rounded-xl p-4">
                    <h3 class="font-semibold mb-2 text-gray-800">Kontak Darurat</h3>
                    <div class="text-sm text-gray-700 space-y-1">
                        <p><span class="font-medium">Nama:</span> {{ $user->kontak_darurat_nama ?? '-' }}</p>
                        <p><span class="font-medium">Hubungan:</span> {{ $user->kontak_darurat_hubungan ?? '-' }}</p>
                        <p><span class="font-medium">No. Telepon:</span>
                            {{ $user->kontak_darurat_no_telepon ?? '-' }}</p>
                    </div>
                </div>

                <!-- Informasi Medis -->
                <div class="bg-gray-50 rounded-xl p-4">
                    <h3 class="font-semibold mb-2 text-gray-800">Informasi Medis</h3>
                    <div class="bg-white rounded-lg p-3 flex flex-wrap gap-2 border border-gray-200">
                        @if ($riwayat)
                            @forelse ($riwayat as $item)
                                <span
                                    class="px-3 py-1 bg-gray-200 text-gray-800 rounded-full text-xs">{{ $item->data_pemeriksaan->diagnosa ?? '-' }}</span>
                            @empty
                                <span class="px-3 py-1 bg-gray-200 text-gray-800 rounded-full text-xs">-</span>
                            @endforelse
                        @else
                            <span class="px-3 py-1 bg-gray-200 text-gray-800 rounded-full text-xs">-</span>
                        @endif
                    </div>
                </div>
            </div>


            <!-- Hasil Lab (Dummy) -->
            <div class="bg-gray-50 rounded-xl p-4">
                <h3 class="font-semibold mb-4 text-gray-800">Hasil Pemeriksaan Lab</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-gray-300 rounded-lg overflow-hidden">
                        <thead class="bg-gray-200 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left">Pemeriksaan</th>
                                <th class="px-4 py-2 text-left">Hasil</th>
                                <th class="px-4 py-2 text-left">Nilai Normal</th>
                                <th class="px-4 py-2 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">

                            @if ($hasil)
                                @forelse ($hasil as $item)
                                    @forelse ($item->lab as $aitem)
                                        <tr>
                                            <td class="px-4 py-2">{{ $aitem->jenis->jenis_pemeriksaan ?? '-' }}</td>
                                            <td class="px-4 py-2">{{ $aitem->nilai ?? '-' }}
                                                {{ $aitem->jenis->satuan ?? '-' }}</td>
                                            <td class="px-4 py-2">{{ $aitem->jenis->normal_min ?? '-' }} ~
                                                {{ $aitem->jenis->normal_max ?? '-' }}
                                                {{ $aitem->jenis->satuan ?? '-' }}</td>
                                            <td class="px-4 py-2 text-green-600 font-semibold">Normal</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-6 text-gray-400">
                                                Belum ada hasil pemeriksaan
                                            </td>
                                        </tr>
                                    @endforelse
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-6 text-gray-400">
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
                class="inline-flex items-center bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                <i class="fas fa-edit mr-2"></i> Edit Data
            </a>
        </div>
    </div>
</x-layouts.app>
