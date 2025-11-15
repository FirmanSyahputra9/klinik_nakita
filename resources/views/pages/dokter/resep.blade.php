<x-layouts.app :title="__('Resep')">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Tulis Resep Baru</h1>

        <!-- Formulir Resep -->
        <form method="POST"> 
            @csrf

            <!-- Cari Pasien -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Cari Pasien</label>
                <input type="text" name="pasien" placeholder="Masukkan nama pasien..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Tanggal Kunjungan -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Diagnosa -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Diagnosa</label>
                <textarea name="diagnosa" rows="3" placeholder="Tuliskan diagnosa pasien..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>

            <!-- Daftar Obat -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Resep Obat</label>
                <div class="space-y-3" id="obat-list">
                    <div class="grid grid-cols-4 gap-3 text-xs">
                        <input type="text" name="obat[0][nama_obat]" placeholder="Nama Obat (Dicari kek search engine berdasarkan stok obat)"
                            class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <input type="text" name="obat[0][dosis]" placeholder="Dosis"
                            class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <input type="text" name="obat[0][frekuensi]" placeholder="Frekuensi"
                            class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <input type="text" name="obat[0][waktu_konsumsi]" placeholder="Waktu Konsumsi"
                            class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <input type="text" name="obat[0][harga]" placeholder="Harga (Autofill sesuai harga beli dari stok obat)"
                            class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                </div>

                <!-- Tombol Tambah Obat -->
                <button type="button" id="tambah-obat"
                    class="mt-3 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium">
                    + Tambah Obat
                </button>
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
                    Simpan Resep
                </button>
            </div>
        </form>
    </div>

    <script>
        let obatIndex = 1;
        document.getElementById('tambah-obat').addEventListener('click', () => {
            const container = document.getElementById('obat-list');
            const newRow = document.createElement('div');
            newRow.classList.add('grid', 'grid-cols-4', 'gap-4');
            newRow.innerHTML = `
                <input type="text" name="obat[${obatIndex}][nama_obat]" placeholder="Nama Obat (Dicari kek search engine berdasarkan stok obat)"
                    class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-xs">
                <input type="text" name="obat[${obatIndex}][dosis]" placeholder="Dosis"
                    class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-xs">
                <input type="text" name="obat[${obatIndex}][frekuensi]" placeholder="Frekuensi"
                    class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-xs">
                <input type="text" name="obat[${obatIndex}][waktu_konsumsi]" placeholder="Waktu Konsumsi"
                    class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-xs">
                <input type="text" name="obat[${obatIndex}][harga]" placeholder="Harga (Autofill sesuai harga jual dari stok obat)"
                    class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-xs">
            `;
            container.appendChild(newRow);
            obatIndex++;
        });
    </script>
</x-layouts.app>
