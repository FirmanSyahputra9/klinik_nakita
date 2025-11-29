<x-layouts.app :title="__('Detail Dokter')">
    <div class="max-w-5xl mx-auto mt-6 sm:mt-10 bg-white rounded-2xl shadow p-6">

        <!-- HEADER -->
        <div class="flex items-start space-x-4 mb-6">
            <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>

            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-user-md text-blue-600 text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-xl sm:text-2xl font-semibold">{{ $dokter->username }}</h2>
                    <p class="text-gray-600 text-sm">{{ $dokter->dokter->spesialisasi }} • NIK:
                        {{ $dokter->dokter->nik }}</p>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <!-- GRID DETAIL DOKTER -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Data Pribadi -->
            <div class="bg-gray-50 rounded-xl p-4">
                <h3 class="font-semibold mb-2 text-gray-800">Data Pribadi</h3>
                <div class="text-sm text-gray-700 space-y-1">
                    <p><span class="font-medium">Nama Lengkap:</span> {{ $dokter->dokter->name }}</p>
                    <p><span class="font-medium">Spesialisasi:</span> {{ $dokter->dokter->spesialisasi }}</p>
                    <p><span class="font-medium">NIK:</span> {{ $dokter->dokter->nik }}</p>
                    <p><span class="font-medium">Status:</span>
                        {{ $dokter->dokter->status = 'aktif' ? 'Aktif' : 'Tidak Aktif' }}</p>
                </div>
            </div>

            <!-- Kontak -->
            <div class="bg-gray-50 rounded-xl p-4">
                <h3 class="font-semibold mb-2 text-gray-800">Kontak</h3>
                <div class="text-sm text-gray-700 space-y-1">
                    <p><span class="font-medium">Email:</span> {{ $dokter->email }}</p>
                    <p><span class="font-medium">No. Telepon:</span> {{ $dokter->dokter->phone }}</p>
                    <p><span class="font-medium">Alamat:</span> {{ $dokter->dokter->alamat }}</p>
                </div>
            </div>
        </div>

        <!-- JADWAL PRAKTIK -->
        <div class="bg-gray-50 rounded-xl p-4 mt-6" x-data="{ edit: false }">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold text-gray-800">Jadwal Praktik</h3>
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
                    <table class="w-full text-sm border border-gray-300 rounded-lg overflow-hidden text-center">
                        <thead class="bg-gray-200 text-gray-700">
                            <tr>
                                <th class="px-4 py-2">Hari</th>
                                <th class="px-4 py-2">Aktif Mulai</th>
                                <th class="px-4 py-2">Aktif Selesai</th>
                                <th class="px-4 py-2">Keterangan</th>
                                <th class="px-4 py-2">Aktif?</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y">
                            @foreach ($allDays as $day)
                                @php
                                    $item = $jadwalMap->get($day);
                                @endphp
                                <tr>
                                    <td class="px-4 py-2">{{ $day }}</td>
                                    <input type="text" name="dokterId" id=""
                                        value="{{ $dokter->dokter->id }}" hidden>
                                    <td class="px-4 py-2">
                                        <span x-show="!edit">
                                            {{ $item?->mulai_aktif ? $item->mulai_aktif : '-' }}
                                        </span>
                                        <input type="time" x-show="edit" class="border rounded px-2 py-1 w-24"
                                            name="jadwals[{{ $item?->id ?? 'new_' . $day }}][mulai]"
                                            value="{{ $item?->mulai_aktif ?? '' }}">
                                    </td>
                                    <td class="px-4 py-2">
                                        <span x-show="!edit">
                                            {{ $item?->selesai_aktif ? $item->selesai_aktif : '-' }}
                                        </span>
                                        <input type="time" x-show="edit" class="border rounded px-2 py-1 w-24"
                                            name="jadwals[{{ $item?->id ?? 'new_' . $day }}][selesai]"
                                            value="{{ $item?->selesai_aktif ?? '' }}">
                                    </td>
                                    <td class="px-4 py-2">
                                        <span x-show="!edit">{{ $item?->keterangan ?? '-' }}</span>
                                        <input type="text" x-show="edit" class="border rounded px-2 py-1 w-full"
                                            name="jadwals[{{ $item?->id ?? 'new_' . $day }}][keterangan]"
                                            value="{{ $item?->keterangan ?? '' }}">
                                    </td>
                                    <td class="px-4 py-2">
                                        <input type="checkbox" x-show="edit" class="mx-auto"
                                            name="jadwals[{{ $item?->id ?? 'new_' . $day }}][aktif]" value="1"
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
