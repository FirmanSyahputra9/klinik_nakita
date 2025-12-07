<x-layouts.app :title="__('Detail Dokter')">
    <div class="max-w-5xl mx-auto mt-6 sm:mt-10 bg-white dark:bg-gray-800 rounded-2xl shadow p-6">

        <!-- HEADER -->
        <div class="flex items-start space-x-4 mb-6">
            <a href="{{ url()->previous() }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>

            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-blue-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                    <i class="fas fa-user-md text-blue-600 dark:text-blue-300 text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 dark:text-gray-100">{{ $dokter->username }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 text-sm">
                        {{ $dokter->dokter->spesialisasi }} • NIK: {{ $dokter->dokter->nik }}
                    </p>
                </div>
            </div>
        </div>

        <hr class="my-4 border-gray-300 dark:border-gray-600">

        <!-- GRID DETAIL DOKTER -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Data Pribadi -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                <h3 class="font-semibold mb-2 text-gray-800 dark:text-gray-100">Data Pribadi</h3>
                <div class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    <p><span class="font-medium text-gray-800 dark:text-gray-100">Nama Lengkap:</span> {{ $dokter->dokter->name }}</p>
                    <p><span class="font-medium text-gray-800 dark:text-gray-100">Spesialisasi:</span> {{ $dokter->dokter->spesialisasi }}</p>
                    <p><span class="font-medium text-gray-800 dark:text-gray-100">NIK:</span> {{ $dokter->dokter->nik }}</p>
                    <p><span class="font-medium text-gray-800 dark:text-gray-100">Status:</span>
                        {{ $dokter->dokter->status = 'aktif' ? 'Aktif' : 'Tidak Aktif' }}
                    </p>
                </div>
            </div>

            <!-- Kontak -->
            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                <h3 class="font-semibold mb-2 text-gray-800 dark:text-gray-100">Kontak</h3>
                <div class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    <p><span class="font-medium text-gray-800 dark:text-gray-100">Email:</span> {{ $dokter->email }}</p>
                    <p><span class="font-medium text-gray-800 dark:text-gray-100">No. Telepon:</span> {{ $dokter->dokter->phone }}</p>
                    <p><span class="font-medium text-gray-800 dark:text-gray-100">Alamat:</span> {{ $dokter->dokter->alamat }}</p>
                </div>
            </div>
        </div>

        <!-- JADWAL PRAKTIK -->
        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4 mt-6" x-data="{ edit: false }">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold text-gray-800 dark:text-gray-100">Jadwal Praktik</h3>
                <button type="button" @click="edit = !edit"
                    class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                    <span x-text="edit ? 'Batal' : 'Edit'"></span>
                </button>
            </div>

            <form action="{{ route('dokter-jadwal.update', $dokter->id) }}" method="POST">
                @csrf
                @method('PUT')

                @php
                $allDays = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                $jadwalMap = $dokter->dokter->jadwals->keyBy('hari');
                @endphp

                <div class="overflow-x-auto">
                    <table class="w-full text-sm border border-gray-300 dark:border-gray-600 rounded-lg overflow-hidden text-center">
                        <thead class="bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-100">
                            <tr>
                                <th class="px-4 py-2">Hari</th>
                                <th class="px-4 py-2">Aktif Mulai</th>
                                <th class="px-4 py-2">Aktif Selesai</th>
                                <th class="px-4 py-2">Keterangan</th>
                                <th class="px-4 py-2">Aktif?</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-300 dark:divide-gray-700">
                            @foreach ($allDays ?? [] as $day)
                            @php $item = $jadwalMap->get($day); @endphp
                            <tr class="text-gray-700 dark:text-gray-300">
                                <td class="px-4 py-2">{{ $day }}</td>
                                <input type="text" name="dokterId" value="{{ $dokter->dokter->id }}" hidden>

                                <td class="px-4 py-2">
                                    <span x-show="!edit">
                                        {{ $item?->mulai_aktif ?: '-' }}
                                    </span>
                                    <input type="time" x-show="edit"
                                        class="border dark:border-gray-600 dark:bg-gray-900 rounded px-2 py-1 w-24"
                                        name="jadwals[{{ $item?->id ?? 'new_' . $day }}][mulai]"
                                        value="{{ $item?->mulai_aktif ?? '' }}">
                                </td>

                                <td class="px-4 py-2">
                                    <span x-show="!edit">
                                        {{ $item?->selesai_aktif ?: '-' }}
                                    </span>
                                    <input type="time" x-show="edit"
                                        class="border dark:border-gray-600 dark:bg-gray-900 rounded px-2 py-1 w-24"
                                        name="jadwals[{{ $item?->id ?? 'new_' . $day }}][selesai]"
                                        value="{{ $item?->selesai_aktif ?? '' }}">
                                </td>

                                <td class="px-4 py-2">
                                    <span x-show="!edit">{{ $item?->keterangan ?? '-' }}</span>
                                    <input type="text" x-show="edit"
                                        class="border dark:border-gray-600 dark:bg-gray-900 rounded px-2 py-1 w-full"
                                        name="jadwals[{{ $item?->id ?? 'new_' . $day }}][keterangan]"
                                        value="{{ $item?->keterangan ?? '' }}">
                                </td>

                                <td class="px-4 py-2">
                                    <input type="checkbox" x-show="edit"
                                        class="mx-auto accent-blue-600 dark:accent-blue-400"
                                        name="jadwals[{{ $item?->id ?? 'new_' . $day }}][aktif]"
                                        value="1"
                                        {{ $item?->aktif_mulai ? 'checked' : '' }}>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Tombol Simpan hanya muncul saat edit -->
                <div class="mt-4" x-show="edit">
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-layouts.app>