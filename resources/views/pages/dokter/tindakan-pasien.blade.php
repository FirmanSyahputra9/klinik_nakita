<x-layouts.app :title="__('Tindakan Pasien')">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Data Pasien</h1>
        <p class="text-gray-600 mt-1">Selamat Datang, dr. Aditya Hutagalung</p>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Data Pasien</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- Left card -->
            <div class="lg:col-span-1">
                <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-2xl p-6 text-white shadow-lg">
                    <div class="space-y-3">
                        <div>
                            <h3 class="text-2xl font-bold">{{ $data->pasiens->no_rm }}</h3>
                            <p class="text-xl font-semibold mt-1">{{ $data->pasiens->name }}</p>
                        </div>

                        <div class="space-y-2 text-sm pt-4 border-t border-green-500">
                            <p><span class="font-medium">Tgl Bergabung:</span> {{ $data->pasiens->create_at }}</p>
                            <p><span class="font-medium">NIK:</span> {{ $data->pasiens->nik }}</p>
                            <p><span class="font-medium">JK:</span> {{ $data->pasiens->gender_label }}</p>
                            <p><span class="font-medium">Tanggal Lahir:</span>
                                {{ $data->pasiens->birth_date_formatted }}</p>
                            <p><span class="font-medium">Umur:</span> {{ $data->pasiens->umur }} Tahun</p>
                            <p><span class="font-medium">No. Telp:</span> {{ $data->pasiens->phone }}</p>
                            <p><span class="font-medium">Alamat:</span> {{ $data->pasiens->address }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border rounded mb-4 p-4 bg-white shadow">

                <h3 class="font-semibold text-lg text-gray-800">
                    Tambah Pemeriksaan
                </h3>

                <p class="text-sm text-gray-600 mb-3">
                </p>

                <form action="{{ route('jenis-pemeriksaan.store') }}" method="POST">
                    @csrf
                    <label class="font-medium text-gray-700">Nama Pemeriksaan</label>
                    <input list="listPemeriksaan" name="new_pemeriksaan" class="w-full border rounded px-3 py-2"
                        placeholder="Pilih atau ketik...">
                    <datalist id="listPemeriksaan">
                        @foreach ($jenisPemeriksaans as $jenis)
                            <option value="{{ $jenis->jenis_pemeriksaan }}">
                        @endforeach
                    </datalist>


                    <div class="mb-3">
                        <label class="font-medium text-gray-700">Nilai Normal</label>
                        <input type="text" name="new_normal" class="w-full border rounded px-3 py-2"
                            placeholder="Masukkan nilai...">
                    </div>

                    <label class="font-medium text-gray-700">Satuan</label>
                    <input list="listSatuan" name="new_satuan" class="w-full border rounded px-3 py-2"
                        placeholder="Pilih atau ketik...">

                    <datalist id="listSatuan">
                        <option value="mg/dL">
                        <option value="g/dL">
                        <option value="%">
                        <option value="/µL">
                        <option value="U/L">
                        <option value="Negatif">
                    </datalist>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Simpan
                    </button>

                </form>
            </div>
        </div>

        <form action="{{ route('data-pemeriksaan.store') }}" method="POST">
            @csrf

            <!-- kirim antrian_id -->
            <input type="hidden" name="antrian_id" value="{{ $antrian->id }}">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Form Alergi -->
                <div class="mt-10">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Form Alergi</h2>

                    <textarea name="alergi" rows="3" class="w-full border rounded p-3"
                        placeholder="Tulis alergi pasien (jika ada)...">{{ $antrian->alergi->alergi ?? '' }}</textarea>

                    <textarea name="reaksi" rows="3" class="w-full border rounded p-3 mt-3" placeholder="Reaksi alergi...">{{ $antrian->alergi->reaksi ?? '' }}</textarea>
                </div>

                <!-- Keluhan & Diagnosis -->
                <div class="mt-10">
                    <h2 class="text-xl font-bold">Keluhan Utama</h2>

                    <textarea name="keluhan" rows="3" class="w-full border rounded p-3" readonly>{{ $data->keluhan ?? '' }}</textarea>

                    <textarea name="diagnosis" rows="3" class="w-full border rounded p-3 mt-3"
                        placeholder="Tuliskan diagnosis pasien...">{{ $antrian->data_pemeriksaan->diagnosa ?? '' }}</textarea>
                </div>

                <!-- Tindakan -->
                <div class="mt-10">
                    <h2 class="text-xl font-bold">Tindakan</h2>

                    <!-- Combo box nama tindakan -->
                    <input list="listNamaTindakan" name="nama_tindakan" class="w-full border rounded p-3"
                        value="{{ $antrian->tindakan->nama_tindakan ?? '' }}"
                        placeholder="Pilih atau ketik nama tindakan...">
                    <datalist id="listNamaTindakan">
                        @foreach ($jenisPemeriksaans as $jp)
                            <option value="{{ $jp->jenis_pemeriksaan }}">
                        @endforeach
                    </datalist>

                    <!-- Combo box jenis tindakan -->
                    <input list="listJenisTindakan" name="jenis_tindakan" class="w-full border rounded p-3 mt-3"
                        value="{{ $antrian->tindakan->jenis_tindakan ?? '' }}"
                        placeholder="Pilih atau ketik jenis tindakan...">
                    <datalist id="listJenisTindakan">
                        <option value="Rawat Jalan">
                        <option value="Rawat Inap">
                        <option value="Tindakan Kecil">
                        <option value="Tindakan Besar">
                        <option value="Laboratorium">
                        <option value="Radiologi">
                    </datalist>

                    <textarea name="catatan_tindakan" rows="3" class="w-full border rounded p-3 mt-3"
                        placeholder="Catatan tambahan (opsional)...">{{ $antrian->tindakan->catatan ?? '' }}</textarea>
                </div>

            </div>

            <div class="flex justify-end gap-3 mt-8 pt-6 border-t">
                <button type="submit" class="px-8 py-2 bg-blue-600 text-white rounded-lg">
                    Simpan Hasil
                </button>
            </div>
        </form>





        <div class="mt-10">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Pemeriksaan Laboratorium</h2>

            <div class="overflow-x-auto bg-white rounded-xl shadow">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 border text-left text-gray-700 font-semibold">Pemeriksaan</th>
                            <th class="px-4 py-3 border text-left text-gray-700 font-semibold">Nilai Normal</th>
                            <th class="px-4 py-3 border text-left text-gray-700 font-semibold">Input Nilai</th>
                            <th class="px-4 py-3 border text-left text-gray-700 font-semibold">Catatan</th>
                            <th class="px-4 py-3 border text-center text-gray-700 font-semibold w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenisPemeriksaans as $jenis)
                            @php
                           
                                $hasil = $antrian->lab->firstWhere('jenis_pemeriksaan_id', $jenis->id);
                            @endphp

                            <tr class="border">

                                <td class="px-4 py-3 border">
                                    {{ $jenis->jenis_pemeriksaan }}
                                </td>

                                <td class="px-4 py-3 border font-medium text-gray-700">
                                    {{ $jenis->nilai_normal }}
                                </td>

                                <td class="px-4 py-3 border">
                                    <form action="{{ route('pemeriksaan-lab.store') }}" method="POST"
                                        class="flex gap-2 items-center">
                                        @csrf

                                        <input type="hidden" name="antrian_id" value="{{ $antrian->id }}">
                                        <input type="hidden" name="jenis_pemeriksaan_id"
                                            value="{{ $jenis->id }}">

                                        <input type="text" name="nilai" class="w-full border rounded px-3 py-2"
                                            placeholder="Isi nilai..." value="{{ $hasil->nilai ?? '' }}">

                                        <span>{{ $jenis->satuan }}</span>
                                </td>

                                <td class="px-4 py-3 border">
                                    <textarea name="catatan" class="w-full border rounded px-3 py-2" placeholder="Catatan...">{{ $hasil->catatan ?? '' }}</textarea>
                                </td>

                                <td class="px-4 py-3 border text-center">
                                    <button type="submit"
                                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                        Simpan
                                    </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>



                </table>
            </div>
        </div>

    </div>

</x-layouts.app>
