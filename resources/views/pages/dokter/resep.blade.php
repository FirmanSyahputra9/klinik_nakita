<x-layouts.app :title="__('Resep')">

    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-2xl shadow">

        <h1 class="text-2xl sm:text-3xl font-semibold text-gray-800 dark:text-white mb-6">Tulis Resep Baru</h1>

        <form method="POST" action="{{ route('resep.store') }}">
            @csrf

            <!-- PILIH ANTRIAN -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Pilih Antrian</label>

                <select name="antrian_id" id="antrianSelect"
                    class="w-full border dark:bg-gray-700 dark:text-white rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">
                    <option value="">-- Pilih Antrian --</option>
                    @foreach ($antrian ?? [] as $a)
                    <option value="{{ $a->id }}"
                        data-nama="{{ $a->pasien->name ?? '-' }}"
                        data-umur="{{ $a->pasien->umur ?? '-' }}"
                        data-jenis="{{ $a->pasien->gender_label ?? '-' }}"
                        data-diagnosa="{{ $a->data_pemeriksaan->diagnosa ?? '-' }}">
                        {{ $a->pasien->name ?? '-' }} - ({{ $a->kode_antrian ?? '-' }})
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- INFORMASI PASIEN (RESPONSIF) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <div>
                    <label class="block font-medium text-gray-700 dark:text-gray-100">Nama Pasien</label>
                    <input id="namaPasien" readonly
                        class="w-full border bg-gray-100 dark:bg-gray-400 dark:text-gray-900 px-4 py-2 rounded-lg">
                </div>

                <div>
                    <label class="block font-medium text-gray-700 dark:text-gray-100">Umur</label>
                    <input id="umurPasien" readonly
                        class="w-full border bg-gray-100 dark:bg-gray-400 dark:text-gray-900 px-4 py-2 rounded-lg">
                </div>

                <div>
                    <label class="block font-medium text-gray-700 dark:text-gray-100">Jenis Kelamin</label>
                    <input id="jenisPasien" readonly
                        class="w-full border bg-gray-100 dark:bg-gray-400 dark:text-gray-900 px-4 py-2 rounded-lg">
                </div>

                <div>
                    <label class="block font-medium text-gray-700 dark:text-gray-100">Diagnosa</label>
                    <input id="diagnosa" readonly
                        class="w-full border bg-gray-100 dark:bg-gray-400 dark:text-gray-900 px-4 py-2 rounded-lg">
                </div>

            </div>

            <!-- ============================ -->
            <!--      RESEP OBAT RESPONSIF    -->
            <!-- ============================ -->
            <div class="mt-6">

                <label class="block font-medium text-gray-700 dark:text-gray-100 mb-2">Resep Obat</label>

                <div id="obat-list" class="space-y-6">

                    <!-- ROW OBAT -->
                    <div class="border rounded-lg p-4 bg-gray-50 dark:bg-gray-700 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                        <!-- NAMA OBAT -->
                        <div>
                            <label class="text-xs font-semibold text-gray-600 dark:text-gray-200">Nama Obat</label>
                            <select name="obat[0][obat_id]" id="obatSelect"
                                class="w-full border rounded-lg px-3 py-2 dark:bg-gray-800 dark:text-white text-sm">
                                <option value="">Pilih Obat...</option>
                                @foreach ($obats ?? [] as $obat)
                                <option value="{{ $obat->id }}" obat-harga="{{ $obat->harga }}">
                                    {{ $obat->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- DOSIS -->
                        <div>
                            <label class="text-xs font-semibold text-gray-600 dark:text-gray-200">Dosis</label>
                            <input type="text" name="obat[0][dosis]"
                                class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-gray-800 dark:text-white"
                                placeholder="cth: 500mg">
                        </div>

                        <!-- FREKUENSI -->
                        <div>
                            <label class="text-xs font-semibold text-gray-600 dark:text-gray-200">Frekuensi</label>
                            <input type="text" name="obat[0][frekuensi]"
                                class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-gray-800 dark:text-white"
                                placeholder="cth: 3x sehari">
                        </div>

                        <!-- WAKTU KONSUMSI -->
                        <div class="md:col-span-2">
                            <label class="text-xs font-semibold text-gray-600 dark:text-gray-200">Waktu Konsumsi</label>
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-xs mt-1">
                                <label><input type="checkbox" name="obat[0][waktu_konsumsi][]" value="Pagi"> Pagi</label>
                                <label><input type="checkbox" name="obat[0][waktu_konsumsi][]" value="Siang"> Siang</label>
                                <label><input type="checkbox" name="obat[0][waktu_konsumsi][]" value="Sore"> Sore</label>
                                <label><input type="checkbox" name="obat[0][waktu_konsumsi][]" value="Malam"> Malam</label>
                            </div>
                        </div>

                        <!-- Kuantitas -->
                        <div>
                            <label class="text-xs font-semibold text-gray-600 dark:text-gray-200">Kuantitas</label>
                            <input type="number" name="obat[0][kuantitas]"
                                class="w-full border rounded-lg px-3 py-2 text-sm dark:bg-gray-800 dark:text-white">
                        </div>

                        <!-- Harga -->
                        <div>
                            <label class="text-xs font-semibold text-gray-600 dark:text-gray-200">Harga (Auto)</label>
                            <input id="obatHarga" type="text" name="obat[0][harga]"
                                class="w-full border rounded-lg px-3 py-2 bg-gray-100 dark:bg-gray-500 dark:text-black text-sm"
                                readonly>
                        </div>

                    </div>
                </div>

                <button type="button" id="tambah-obat"
                    class="mt-4 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm dark:bg-gray-600 dark:hover:bg-gray-900">
                    + Tambah Obat
                </button>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-end mt-8">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 dark:bg-gray-700 dark:hover:bg-gray-900 text-white px-6 py-2 rounded-lg shadow font-semibold">
                    Simpan Resep
                </button>
            </div>

        </form>
    </div>

    <script>
        /* ============================
            AUTO UPDATE INFO PASIEN
        ============================= */
        document.getElementById('antrianSelect').addEventListener('change', function() {
            const o = this.selectedOptions[0];
            document.getElementById('namaPasien').value = o.dataset.nama || '';
            document.getElementById('umurPasien').value = o.dataset.umur || '';
            document.getElementById('jenisPasien').value = o.dataset.jenis || '';
            document.getElementById('diagnosa').value = o.dataset.diagnosa || '';
        });

        /* ============================
            AUTO UPDATE HARGA OBAT
        ============================= */
        document.getElementById('obatSelect').addEventListener('change', function() {
            const o = this.selectedOptions[0];
            document.getElementById('obatHarga').value = o.getAttribute('obat-harga') || '';
        });

        /* ============================
            TAMBAH ROW OBAT
        ============================= */
        let obatIndex = 1;

        document.getElementById('tambah-obat').addEventListener('click', () => {
            const list = document.getElementById('obat-list');

            let html = `
                <div class="border rounded-lg p-4 bg-gray-50 dark:bg-gray-700 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                    <div>
                        <label class="text-xs font-semibold">Nama Obat</label>
                        <select name="obat[${obatIndex}][obat_id]"
                            class="border rounded-lg px-3 py-2 w-full dark:bg-gray-800 dark:text-white text-sm">
                            <option value="">Pilih Obat...</option>
                            @foreach ($obats ?? [] as $o)
                                <option value="{{ $o->id }}" obat-harga="{{ $o->harga }}">{{ $o->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="text-xs font-semibold">Dosis</label>
                        <input type="text" name="obat[${obatIndex}][dosis]"
                            class="border rounded-lg px-3 py-2 w-full dark:bg-gray-800 text-sm">
                    </div>

                    <div>
                        <label class="text-xs font-semibold">Frekuensi</label>
                        <input type="text" name="obat[${obatIndex}][frekuensi]"
                            class="border rounded-lg px-3 py-2 w-full dark:bg-gray-800 text-sm">
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-xs font-semibold">Waktu Konsumsi</label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mt-1 text-xs">
                            <label><input type="checkbox" name="obat[${obatIndex}][waktu_konsumsi][]" value="Pagi"> Pagi</label>
                            <label><input type="checkbox" name="obat[${obatIndex}][waktu_konsumsi][]" value="Siang"> Siang</label>
                            <label><input type="checkbox" name="obat[${obatIndex}][waktu_konsumsi][]" value="Sore"> Sore</label>
                            <label><input type="checkbox" name="obat[${obatIndex}][waktu_konsumsi][]" value="Malam"> Malam</label>
                        </div>
                    </div>

                    <div>
                        <label class="text-xs font-semibold">Kuantitas</label>
                        <input type="number" name="obat[${obatIndex}][kuantitas]"
                            class="border rounded-lg px-3 py-2 w-full dark:bg-gray-800 text-sm">
                    </div>

                    <div>
                        <label class="text-xs font-semibold">Harga (Auto)</label>
                        <input readonly type="text" name="obat[${obatIndex}][harga]"
                            class="border rounded-lg px-3 py-2 bg-gray-100 dark:bg-gray-500 text-sm w-full">
                    </div>

                </div>
            `;

            list.insertAdjacentHTML("beforeend", html);
            obatIndex++;
        });
    </script>

</x-layouts.app>