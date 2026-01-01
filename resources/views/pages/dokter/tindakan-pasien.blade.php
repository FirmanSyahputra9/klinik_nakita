<x-layouts.app :title="__('Tindakan Pasien')">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Data Pasien</h1>
        <p class="text-gray-600 dark:text-gray-300 mt-1">Selamat Datang, {{ Auth::user()->name ?? '' }}</p>
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
                <div
                    class="bg-gradient-to-br from-green-800 to-green-900 dark:bg-gray-800 rounded-2xl p-6 text-white shadow-lg">

                    <h3 class="text-2xl font-bold">{{ $data->pasiens->no_rm }}</h3>
                    <p class="text-xl font-semibold mt-1">{{ $data->pasiens->name }}</p>

                    <div class="space-y-2 text-sm pt-4 border-t border-green-400 dark:border-gray-100 mt-4">
                        <p><span class="font-medium">Tgl Bergabung:</span> {{ $data->pasiens->create_at }}</p>
                        <p><span class="font-medium">NIK:</span> {{ $data->pasiens->nik }}</p>
                        <p><span class="font-medium">JK:</span> {{ $data->pasiens->gender_label }}</p>
                        <p><span class="font-medium">Tanggal Lahir:</span> {{ $data->pasiens->birth_date_formatted }}
                        </p>
                        <p><span class="font-medium">Umur:</span> {{ $data->pasiens->umur }} Tahun</p>
                        <p><span class="font-medium">No. Telp:</span> {{ $data->pasiens->phone }}</p>
                        <p><span class="font-medium">Alamat:</span> {{ $data->pasiens->address }}</p>
                    </div>

                </div>
            </div>

            <!-- ========================= -->
            <!-- 2. FORM TAMBAH PEMERIKSAAN -->
            <!-- ========================= -->
            <div class="relative border rounded-lg p-4 bg-white dark:bg-gray-800 shadow">

                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-full h-1 bg-red-600 rotate-12 opacity-80"></div>
                    <div class="w-full h-1 bg-red-600 -rotate-12 opacity-80 absolute"></div>
                </div>
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
        <!-- PEMERIKSAAN UMUM (DUMMY / FRONTEND ONLY)         -->
        <!-- ================================================= -->
        <form action="{{ route('data-pemeriksaan.store') }}" method="POST">
            @csrf
            <div class="mt-10 bg-white dark:bg-gray-800 rounded-xl shadow p-6 border">

                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-6">
                    Pemeriksaan Umum (isi nilai tanpa satuan)
                </h2>
                <input type="hidden" name="antrian_id" value="{{ $antrian->id }}">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <!-- Tekanan Darah -->
                    <div x-data="{
                        value: @js(optional($antrian->nilai_du->where('dataUmumPasien.nama_du', 'Tekanan Darah')->first())->nilai),
                        sanitize() {
                            this.value = (this.value ?? '').replace(/[^0-9\/]/g, '');
                    
                            let parts = this.value.split('/');
                    
                            if (parts.length > 2) {
                                parts = parts.slice(0, 2);
                            }
                    
                            if (parts[0]?.length > 3) parts[0] = parts[0].slice(0, 3);
                            if (parts[1]?.length > 3) parts[1] = parts[1].slice(0, 3);
                    
                            this.value = parts.join('/');
                        }
                    }">
                        <label class="font-medium">Tekanan Darah</label>

                        <div class="relative mt-1">
                            <input type="text" name="tekanan_darah" x-model="value" @input="sanitize"
                                placeholder="120/80" inputmode="numeric" autocomplete="off"
                                class="w-full border rounded px-3 py-2 pr-16 dark:bg-gray-700 dark:text-white">

                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                mmHg
                            </span>
                        </div>
                    </div>


                    <!-- Nadi -->
                    <div x-data="{ value: '{{ optional($antrian->nilai_du->where('dataUmumPasien.nama_du', 'Nadi')->first())->nilai ?? '' }}' }"
                        @input="
                                value = value.replace(/[^0-9]/g, '');
                                if (value.length > 4) value = value.slice(0, 4);
                            ">
                        <label class="font-medium">Nadi</label>

                        <div class="relative mt-1">
                            <input type="text" name="nadi" x-model="value" inputmode="numeric" autocomplete="off"
                                placeholder="80"
                                class="w-full border rounded px-3 py-2 pr-20 dark:bg-gray-700 dark:text-white">

                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                x/menit
                            </span>
                        </div>
                    </div>



                    <!-- Suhu -->
                    <div x-data="{ value: '{{ optional($antrian->nilai_du->where('dataUmumPasien.nama_du', 'Suhu Tubuh')->first())->nilai ?? '' }}' }"
                        @input="
                            value = value.replace(/,/g, '.');
                            value = value.replace(/[^0-9.]/g, '');
                            const parts = value.split('.');
                            if (parts.length > 2) {
                                value = parts[0] + '.' + parts[1];
                            }
                            if (value.length > 5) {
                                value = value.slice(0, 5);
                            }
                        ">
                        <label class="font-medium">Suhu</label>

                        <div class="relative mt-1">
                            <input type="text" name="suhu" x-model="value" placeholder="36.5" inputmode="decimal"
                                autocomplete="off"
                                class="w-full border rounded px-3 py-2 pr-14 dark:bg-gray-700 dark:text-white">

                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                °C
                            </span>
                        </div>
                    </div>


                    <!-- Respirasi -->
                    <div x-data="{
                        value: '{{ optional($antrian->nilai_du->where('dataUmumPasien.nama_du', 'Respirasi')->first())->nilai ?? '' }}'
                    }"
                        @input="
                            value = value.replace(/[^0-9]/g, '');
                            if (value.length > 4) value = value.slice(0, 4);
                        ">
                        <label class="font-medium">Respirasi</label>

                        <div class="relative mt-1">
                            <input type="text" name="respirasi" x-model="value" placeholder="20"
                                inputmode="numeric" autocomplete="off"
                                class="w-full border rounded px-3 py-2 pr-20 dark:bg-gray-700 dark:text-white">

                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                x/menit
                            </span>
                        </div>
                    </div>

                    <!-- Berat Badan -->
                    <div x-data="{
                        value: '{{ optional($antrian->nilai_du->where('dataUmumPasien.nama_du', 'Berat Badan')->first())->nilai ?? '' }}'
                    }"
                        @input="
                        value = value.replace(/[^0-9.]/g, '');
                        if ((value.match(/\./g) || []).length > 1) {
                            value = value.slice(0, -1);
                        }
                        if (value.length > 5) {
                            value = value.slice(0, 5);
                        }
                    ">
                        <label class="font-medium">Berat Badan</label>

                        <div class="relative mt-1">
                            <input type="text" name="berat_badan" x-model="value" placeholder="60"
                                inputmode="decimal" autocomplete="off"
                                class="w-full border rounded px-3 py-2 pr-12 dark:bg-gray-700 dark:text-white">

                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                kg
                            </span>
                        </div>
                    </div>



                    <!-- Tinggi Badan -->
                    <div x-data="{ value: '{{ optional($antrian->nilai_du->where('dataUmumPasien.nama_du', 'Berat Badan')->first())->nilai ?? '' }}' }"
                        @input="
                            value = value.replace(/[^0-9]/g, '');
                            if (value.length > 3) {
                                value = value.slice(0, 3);
                            }
                        ">
                        <label class="font-medium">Tinggi Badan</label>

                        <div class="relative mt-1">
                            <input type="text" name="tinggi_badan" x-model="value" placeholder="165"
                                inputmode="numeric" autocomplete="off"
                                class="w-full border rounded px-3 py-2 pr-12 dark:bg-gray-700 dark:text-white">

                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                                cm
                            </span>
                        </div>
                    </div>

                    <!-- Kesadaran -->
                    <div>
                        <label class="font-medium">Kesadaran</label>

                        <select name="kesadaran"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">

                            <option value="">-- Pilih --</option>

                            <option value="Compos Mentis"
                                {{ optional($antrian->nilai_du->where('dataUmumPasien.nama_du', 'Kesadaran')->first())->nilai === 'Compos Mentis' ? 'selected' : '' }}>
                                Compos Mentis
                            </option>

                            <option value="Somnolen"
                                {{ optional($antrian->nilai_du->where('dataUmumPasien.nama_du', 'Kesadaran')->first())->nilai === 'Somnolen' ? 'selected' : '' }}>
                                Somnolen
                            </option>

                            <option value="Sopor"
                                {{ optional($antrian->nilai_du->where('dataUmumPasien.nama_du', 'Kesadaran')->first())->nilai === 'Sopor' ? 'selected' : '' }}>
                                Sopor
                            </option>

                            <option value="Koma"
                                {{ optional($antrian->nilai_du->where('dataUmumPasien.nama_du', 'Kesadaran')->first())->nilai === 'Koma' ? 'selected' : '' }}>
                                Koma
                            </option>

                        </select>
                    </div>

                    <!-- Keadaan Umum -->
                    <div class="md:col-span-2" x-data="{
                        value: @js(optional($antrian->nilai_du->where('dataUmumPasien.nama_du', 'Keadaan Umum')->first())->nilai ?? '')
                    }"
                        @input="
        value = value.replace(/[^a-zA-Z\s\/]/g, '');
        value = value.replace(/\s{2,}/g, ' ');
        if (value.length > 100) value = value.slice(0, 100);
    ">
                        <label class="font-medium">Keadaan Umum</label>

                        <input type="text" name="keadaan_umum" x-model="value"
                            placeholder="Baik / Tampak sakit ringan / Lemah" autocomplete="off"
                            class="w-full border rounded px-3 py-2 mt-1 dark:bg-gray-700 dark:text-white">
                    </div>


                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-10">

                <!-- Alergi -->
                <div>
                    <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">Alergi</h2>
                    <textarea name="alergi" rows="3" placeholder="Riwayat alergi pasien"
                        class="w-full border rounded p-3 dark:bg-gray-700 dark:text-white">{{ $antrian->alergi->alergi ?? '' }}</textarea>

                    <textarea name="reaksi" rows="3" placeholder="Reaksi alergi"
                        class="w-full border rounded p-3 mt-3 dark:bg-gray-700 dark:text-white">{{ $antrian->alergi->reaksi ?? '' }}</textarea>
                </div>

                <!-- Keluhan -->
                <div>
                    <h2 class="text-xl font-bold mb-2 text-gray-800 dark:text-gray-100">Keluhan Utama</h2>
                    <textarea readonly rows="3" class="w-full border rounded p-3 dark:bg-gray-700 dark:text-white">{{ $data->keluhan ?? '' }}</textarea>
                </div>

                <!-- Tindakan -->
                <div>
                    <h2 class="text-xl font-bold mb-2 text-gray-800 dark:text-gray-100">Tindakan</h2>

                    <input list="listNamaTindakan" name="nama_tindakan"
                        class="w-full border rounded p-3 dark:bg-gray-700 dark:text-white"
                        placeholder="Nama tindakan medis" value="{{ $antrian->tindakan->nama_tindakan ?? '' }}">

                    <datalist id="listNamaTindakan">
                        @foreach ($jenisPemeriksaans ?? [] as $jp)
                            <option value="{{ $jp->jenis_pemeriksaan }}">
                        @endforeach
                    </datalist>

                    <input list="listJenisTindakan" name="jenis_tindakan"
                        class="w-full border rounded p-3 mt-3 dark:bg-gray-700 dark:text-white"
                        placeholder="Jenis tindakan" value="{{ $antrian->tindakan->jenis_tindakan ?? '' }}">

                    <datalist id="listJenisTindakan">
                        <option value="Rawat Jalan">
                        <option value="Rawat Inap">
                        <option value="Tindakan Kecil">
                        <option value="Tindakan Besar">
                        <option value="Laboratorium">
                        <option value="Radiologi">
                    </datalist>

                    <textarea name="catatan_tindakan" rows="3" placeholder="Catatan tindakan"
                        class="w-full border rounded p-3 mt-3 dark:bg-gray-700 dark:text-white">{{ $antrian->tindakan->catatan ?? '' }}</textarea>
                </div>

            </div>

            <!-- ========================= -->
            <!-- DIAGNOSIS SEMENTARA       -->
            <!-- ========================= -->
            <div class="mt-10">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                    Diagnosis Sementara
                </h2>

                <textarea name="diagnosis" rows="3" placeholder="Diagnosis sementara berdasarkan anamnesis dan tindakan awal"
                    class="w-full border rounded p-3 dark:bg-gray-700 dark:text-white">{{ $antrian->data_pemeriksaan->diagnosa ?? '' }}</textarea>
            </div>

            <div class="flex justify-end gap-3 mt-10 pt-6 border-t">
                <button type="submit"
                    class="px-8 py-2 bg-blue-600 dark:bg-gray-600 hover:bg-blue-700 dark:hover:bg-gray-900 text-white rounded-lg">
                    Simpan Hasil
                </button>
            </div>

        </form>

        <!-- ================================================= -->
        <!-- TABEL LABORATORIUM (PALING BAWAH)                -->
        <!-- ================================================= -->
        <div class="mt-12">
            <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">Pemeriksaan Laboratorium</h2>

            <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl shadow border">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-3 border">Pemeriksaan</th>
                            <th class="px-4 py-3 border">Normal</th>
                            <th class="px-4 py-3 border">Input Nilai</th>
                            <th class="px-4 py-3 border">Catatan</th>
                            <th class="px-4 py-3 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <!-- isi tabel tetap -->
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
