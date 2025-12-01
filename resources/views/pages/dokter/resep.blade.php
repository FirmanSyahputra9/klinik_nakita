<x-layouts.app :title="__('Resep')">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Tulis Resep Baru</h1>

        <form method="POST" action="{{ route('resep.store') }}">
            @csrf

            <!-- PILIH ANTRIAN -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Pilih Antrian</label>
                <select name="antrian_id" id="antrianSelect" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    <option value="">-- Pilih Antrian --</option>
                    @foreach ($antrian??[] as $a)
                        <option value="{{ $a->id }}" data-nama="{{ $a->pasien->name??'-' }}"
                            data-umur="{{ $a->pasien->umur??'-' }}" data-jenis="{{ $a->pasien->gender_label??'-' }}"
                            data-diagnosa="{{ $a->data_pemeriksaan->diagnosa??'-' }}">
                            {{ $a->pasien->name??'-' }} - ({{ $a->kode_antrian??'-' }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nama Pasien -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Nama Pasien</label>
                <input id="namaPasien" type="text"
                    class="w-full border bg-gray-100 border-gray-300 rounded-lg px-4 py-2" readonly>
            </div>

            <!-- Umur -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Umur</label>
                <input id="umurPasien" type="text"
                    class="w-full border bg-gray-100 border-gray-300 rounded-lg px-4 py-2" readonly>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                <input id="jenisPasien" type="text"
                    class="w-full border bg-gray-100 border-gray-300 rounded-lg px-4 py-2" readonly>
            </div>

            <!-- Diagnosa -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Diagnosa</label>
                <input id="diagnosa" type="text"
                    class="w-full border bg-gray-100 border-gray-300 rounded-lg px-4 py-2" readonly>
            </div>

            <!-- RESEP OBAT -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Resep Obat</label>

                <div id="obat-list" class="space-y-4">
                    <div class="grid grid-cols-6 gap-3 text-xs">

                        <select name="obat[0][obat_id]" id="obatSelect"
                            class="border border-gray-300 rounded-lg px-3 py-2">
                            <option value="">Pilih Obat...</option>
                            @foreach ($obats as $obat)
                                <option value="{{ $obat->id }}" obat-harga="{{ $obat->harga }}">
                                    {{ $obat->nama }}
                                </option>
                            @endforeach
                        </select>

                        <input type="text" name="obat[0][dosis]" placeholder="Dosis"
                            class="border border-gray-300 rounded-lg px-3 py-2">
                        <input type="text" name="obat[0][frekuensi]" placeholder="Frekuensi"
                            class="border border-gray-300 rounded-lg px-3 py-2">

                        <div class="flex gap-2">
                            <label><input type="checkbox" name="obat[0][waktu_konsumsi][]" value="Pagi"> Pagi</label>
                            <label><input type="checkbox" name="obat[0][waktu_konsumsi][]" value="Siang"> Siang</label>
                            <label><input type="checkbox" name="obat[0][waktu_konsumsi][]" value="Sore"> Sore</label>
                            <label><input type="checkbox" name="obat[0][waktu_konsumsi][]" value="Malam"> Malam</label>
                        </div>

                        <input type="number" name="obat[0][kuantitas]" placeholder="Kuantitas"
                            class="border border-gray-300 rounded-lg px-3 py-2">
                        <input type="text" id="obatHarga" name="obat[0][harga]" placeholder="Harga (Auto)"
                            class="border border-gray-300 rounded-lg px-3 py-2 bg-gray-100" readonly>
                    </div>
                </div>

                <button type="button" id="tambah-obat"
                    class="mt-3 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium">
                    + Tambah Obat
                </button>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                    Simpan Resep
                </button>
            </div>

        </form>
    </div>

    <script>
        // AUTO UPDATE PASIEN
        document.getElementById('antrianSelect').addEventListener('change', function() {
            const selected = this.selectedOptions[0];
            document.getElementById('namaPasien').value = selected.dataset.nama || '';
            document.getElementById('umurPasien').value = selected.dataset.umur || '';
            document.getElementById('jenisPasien').value = selected.dataset.jenis || '';
            document.getElementById('diagnosa').value = selected.dataset.diagnosa || '';
        });

        // AUTO UPDATE OBAT
        document.getElementById('obatSelect').addEventListener('change', function() {
            const selected = this.selectedOptions[0];
            document.getElementById('obatHarga').value = selected.getAttribute('obat-harga') || '';
        });

        // TAMBAH ROW OBAT
        let obatIndex = 1;

        document.getElementById('tambah-obat').addEventListener('click', () => {
            const container = document.getElementById('obat-list');
            const row = document.createElement('div');
            row.classList = "grid grid-cols-6 gap-3 text-xs";

            // buat option obat
            let obatOptions = '<option value="">Pilih Obat...</option>';
            const obats = @json($obats);
            obats.forEach(o => {
                obatOptions += `<option value="${o.id}" obat-harga="${o.harga_jual}">${o.nama}</option>`;
            });

            // checkbox waktu konsumsi
            let waktuHTML = `
                <div class="flex gap-2">
                    <label><input type="checkbox" name="obat[${obatIndex}][waktu_konsumsi][]" value="Pagi"> Pagi</label>
                    <label><input type="checkbox" name="obat[${obatIndex}][waktu_konsumsi][]" value="Siang"> Siang</label>
                    <label><input type="checkbox" name="obat[${obatIndex}][waktu_konsumsi][]" value="Sore"> Sore</label>
                    <label><input type="checkbox" name="obat[${obatIndex}][waktu_konsumsi][]" value="Malam"> Malam</label>
                </div>
            `;

            row.innerHTML = `
                <select name="obat[${obatIndex}][obat_id]" class="border border-gray-300 rounded-lg px-3 py-2">
                    ${obatOptions}
                </select>
                <input type="text" name="obat[${obatIndex}][dosis]" placeholder="Dosis" class="border border-gray-300 rounded-lg px-3 py-2">
                <input type="text" name="obat[${obatIndex}][frekuensi]" placeholder="Frekuensi" class="border border-gray-300 rounded-lg px-3 py-2">
                ${waktuHTML}
                <input type="number" name="obat[${obatIndex}][kuantitas]" placeholder="Kuantitas" class="border border-gray-300 rounded-lg px-3 py-2">
                <input type="text" name="obat[${obatIndex}][harga]" placeholder="Harga (Auto)" class="border border-gray-300 rounded-lg px-3 py-2 bg-gray-100" readonly>
            `;

            container.appendChild(row);
            obatIndex++;
        });
    </script>

</x-layouts.app>
