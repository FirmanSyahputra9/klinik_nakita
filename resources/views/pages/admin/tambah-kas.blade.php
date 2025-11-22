<x-layouts.app :title="__('Tambah Transaksi')">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-2xl shadow">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Transaksi</h1>

        <form method="POST" action="#">
            @csrf

            <!-- Pilih Pasien -->
            <div class="mb-5">
                <label for="pasien" class="block text-gray-700 font-medium mb-2">Pilih Pasien</label>
                <input type="text" id="pasien" name="pasien" placeholder="Cari nama pasien..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Tanggal Transaksi -->
            <div class="mb-5">
                <label for="tanggal" class="block text-gray-700 font-medium mb-2">Tanggal Transaksi</label>
                <input type="date" id="tanggal" name="tanggal"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Jumlah -->
            <div class="mb-5">
                <label for="jumlah" class="block text-gray-700 font-medium mb-2">Jumlah Pembayaran</label>
                <input type="number" id="jumlah" name="jumlah" placeholder="Masukkan jumlah (Rp)"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Obat -->
            <div class="mb-5">
                <label for="obat" class="block text-gray-700 font-medium mb-2">Obat</label>
                <input type="text" id="obat" name="obat" placeholder="Masukkan obat"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>


            <!-- Kuantitas -->
            <div class="mb-5">
                <label for="kuantitas" class="block text-gray-700 font-medium mb-2">Kuantitas</label>
                <input type="text" id="kuantitas" name="kuantitas" placeholder="Masukkan kuantitas"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <!-- Status Pembayaran -->
            <div class="mb-5">
                <label for="status" class="block text-gray-700 font-medium mb-2">Status Pembayaran</label>
                <select id="status" name="status"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">Pilih status</option>
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                </select>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-3 mt-6">
                <a href="/kasir"
                    class="bg-gray-100 text-gray-700 px-5 py-2 rounded-lg font-medium hover:bg-gray-200 transition">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
