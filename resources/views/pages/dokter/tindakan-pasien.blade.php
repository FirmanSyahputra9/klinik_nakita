<x-layouts.app :title="__('Tindakan Pasien')">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Data Pasien</h1>
        <p class="text-gray-600 dark:text-gray-300 mt-1">Selamat Datang, dr. Aditya Hutagalung</p>
    </div>

    <!-- MAIN CARD -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">

        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-6">Data Pasien</h2>

        <!-- GRID RESPONSIF: PATIENT CARD + TAMBAH PEMERIKSAAN -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- ========================= -->
            <!-- 1. KARTU DATA PASIEN      -->
            <!-- ========================= -->
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-green-800 to-green-900 dark:bg-gray-800 rounded-2xl p-6 text-white shadow-lg">

                    <h3 class="text-2xl font-bold">{{ $data->pasiens->no_rm }}</h3>
                    <p class="text-xl font-semibold mt-1">{{ $data->pasiens->name }}</p>

                    <div class="space-y-2 text-sm pt-4 border-t border-green-400 dark:border-gray-100 mt-4">
                        <p><span class="font-medium">Tgl Bergabung:</span> {{ $data->pasiens->create_at }}</p>
                        <p><span class="font-medium">NIK:</span> {{ $data->pasiens->nik }}</p>
                        <p><span class="font-medium">JK:</span> {{ $data->pasiens->gender_label }}</p>
                        <p><span class="font-medium">Tanggal Lahir:</span> {{ $data->pasiens->birth_date_formatted }}</p>
                        <p><span class="font-medium">Umur:</span> {{ $data->pasiens->umur }} Tahun</p>
                        <p><span class="font-medium">No. Telp:</span> {{ $data->pasiens->phone }}</p>
                        <p><span class="font-medium">Alamat:</span> {{ $data->pasiens->address }}</p>
                    </div>

                </div>
            </div>

            <!-- ========================= -->
            <!-- 2. FORM TAMBAH PEMERIKSAAN -->
            <!-- ========================= -->
            <div class="border rounded-lg p-4 bg-white dark:bg-gray-800 shadow">

                <h3 class="font-semibold text-lg mb-3 text-gray-800 dark:text-gray-100">Tambah Pemeriksaan</h3>

                <form action="{{ route('jenis-pemeriksaan.store') }}" method="POST">
                    @csrf

                    <label class="font-medium text-gray-700 dark:text-gray-100">Nama Pemeriksaan</label>
                    <input list="listPemeriksaan" name="new_pemeriksaan"
                        class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white"
                        placeholder="Pilih atau ketik...">

                    <datalist id="listPemeriksaan">
                        @foreach ($jenisPemeriksaans ?? [] as $jenis)
                        <option value="{{ $jenis->jenis_pemeriksaan }}">
                            @endforeach
                    </datalist>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">

                        <div>
                            <label class="font-medium">Normal Min</label>
                            <input type="text" name="normal_min"
                                class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div>
                            <label class="font-medium">Normal Max</label>
                            <input type="text" name="normal_max"
                                class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                        </div>

                    </div>

                    <label class="font-medium mt-4 block">Satuan</label>
                    <input list="listSatuan" name="new_satuan"
                        class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">

                    <datalist id="listSatuan">
                        <option value="mg/dL">
                        <option value="g/dL">
                        <option value="%">
                        <option value="/µL">
                        <option value="U/L">
                        <option value="Negatif">
                    </datalist>

                    <button type="submit"
                        class="mt-4 bg-blue-600 hover:bg-blue-700 dark:bg-gray-600 dark:hover:bg-gray-900 text-white px-4 py-2 rounded">
                        Simpan
                    </button>

                </form>
            </div>

        </div>

        <!-- ================================================= -->
        <!-- FORM PEMERIKSAAN (Alergi, Keluhan, Diagnosa, dll) -->
        <!-- ================================================= -->
        <form action="{{ route('data-pemeriksaan.store') }}" method="POST">
            @csrf

            <input type="hidden" name="antrian_id" value="{{ $antrian->id }}">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-10">

                <!-- Alergi -->
                <div>
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Alergi</h2>
                    <textarea name="alergi" rows="3" class="w-full border rounded p-3 dark:bg-gray-700 dark:text-white">{{ $antrian->alergi->alergi ?? '' }}</textarea>

                    <textarea name="reaksi" rows="3" class="w-full border rounded p-3 mt-3 dark:bg-gray-700 dark:text-white">{{ $antrian->alergi->reaksi ?? '' }}</textarea>
                </div>

                <!-- Keluhan & Diagnosis -->
                <div>
                    <h2 class="text-xl font-bold mb-2 text-gray-800 dark:text-gray-100">Keluhan Utama</h2>
                    <textarea name="keluhan" rows="3" readonly
                        class="w-full border rounded p-3 dark:bg-gray-700 dark:text-white">{{ $data->keluhan ?? '' }}</textarea>

                    <textarea name="diagnosis" rows="3" class="w-full border rounded p-3 mt-3 dark:bg-gray-700 dark:text-white">{{ $antrian->data_pemeriksaan->diagnosa ?? '' }}</textarea>
                </div>

                <!-- Tindakan -->
                <div>
                    <h2 class="text-xl font-bold mb-2 text-gray-800 dark:text-gray-100">Tindakan</h2>

                    <input list="listNamaTindakan" name="nama_tindakan"
                        class="w-full border rounded p-3 dark:bg-gray-700 dark:text-white"
                        placeholder="Nama tindakan..."
                        value="{{ $antrian->tindakan->nama_tindakan ?? '' }}">
                    <datalist id="listNamaTindakan">
                        @foreach ($jenisPemeriksaans ?? [] as $jp)
                        <option value="{{ $jp->jenis_pemeriksaan }}">
                            @endforeach
                    </datalist>

                    <input list="listJenisTindakan" name="jenis_tindakan"
                        class="w-full border rounded p-3 mt-3 dark:bg-gray-700 dark:text-white"
                        placeholder="Jenis tindakan..."
                        value="{{ $antrian->tindakan->jenis_tindakan ?? '' }}">
                    <datalist id="listJenisTindakan">
                        <option value="Rawat Jalan">
                        <option value="Rawat Inap">
                        <option value="Tindakan Kecil">
                        <option value="Tindakan Besar">
                        <option value="Laboratorium">
                        <option value="Radiologi">
                    </datalist>

                    <textarea name="catatan_tindakan" rows="3"
                        class="w-full border rounded p-3 mt-3 dark:bg-gray-700 dark:text-white">{{ $antrian->tindakan->catatan ?? '' }}</textarea>
                </div>

            </div>

            <div class="flex justify-end gap-3 mt-10 pt-6 border-t">
                <button type="submit"
                    class="px-8 py-2 bg-blue-600 dark:bg-gray-600 hover:bg-blue-700 dark:hover:bg-gray-900 text-white rounded-lg">
                    Simpan Hasil
                </button>
            </div>

        </form>

        <!-- ================================================= -->
        <!-- TABEL LABORATORIUM - RESPONSIVE SCROLL           -->
        <!-- ================================================= -->
        <div class="mt-10">
            <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">Pemeriksaan Laboratorium</h2>

            <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow border">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-100">
                        <tr>
                            <th class="px-4 py-3 border">Pemeriksaan</th>
                            <th class="px-4 py-3 border">Normal</th>
                            <th class="px-4 py-3 border">Input Nilai</th>
                            <th class="px-4 py-3 border">Catatan</th>
                            <th class="px-4 py-3 border text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($jenisPemeriksaans ?? [] as $jenis)
                        @php $hasil = $antrian->lab->firstWhere('jenis_pemeriksaan_id', $jenis->id); @endphp

                        <tr class="border dark:border-gray-700">
                            <td class="px-4 py-3 border">{{ $jenis->jenis_pemeriksaan }}</td>

                            <td class="px-4 py-3 border">
                                {{ $jenis->normal_min }} - {{ $jenis->normal_max }} {{ $jenis->satuan }}
                            </td>

                            <form action="{{ route('pemeriksaan-lab.store') }}" method="POST">
                                @csrf
                                <td class="px-4 py-3 border">

                                    <input type="hidden" name="antrian_id" value="{{ $antrian->id }}">
                                    <input type="hidden" name="jenis_pemeriksaan_id" value="{{ $jenis->id }}">

                                    <div class="flex items-center gap-2">
                                        <input type="text" name="nilai"
                                            class="border rounded px-3 py-2 w-full dark:bg-gray-700 dark:text-white"
                                            placeholder="Isi nilai..." value="{{ $hasil->nilai ?? '' }}">
                                        <span>{{ $jenis->satuan }}</span>
                                    </div>

                                    <!-- Indikator hasil -->
                                    @if ($hasil?->nilai)
                                    @php
                                    $val = $hasil->nilai;
                                    if ($val < $jenis->normal_min) { $status='rendah'; }
                                        elseif ($val > $jenis->normal_max) { $status='tinggi'; }
                                        else { $status='normal'; }
                                        @endphp

                                        <div class="mt-1 text-xs font-semibold 
                                                {{ $status === 'normal' ? 'text-green-600'
                                                : ($status === 'rendah' ? 'text-orange-500' : 'text-red-600') }}">
                                            {{ strtoupper($status) }}
                                        </div>
                                        @endif
                                </td>

                                <td class="px-4 py-3 border">
                                    <textarea name="catatan"
                                        class="w-full border rounded px-3 py-2 dark:bg-gray-700 dark:text-white">{{ $hasil->catatan ?? '' }}</textarea>
                                </td>

                                <td class="px-4 py-3 border text-center">
                                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg dark:bg-gray-600 dark:hover:bg-gray-800">
                                        Simpan
                                    </button>
                                </td>
                            </form>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>

    </div>

    @if (session('refresh'))
    <script>
        window.location.reload();
    </script>
    @endif

</x-layouts.app>