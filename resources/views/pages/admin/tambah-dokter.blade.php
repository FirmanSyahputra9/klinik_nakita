<x-layouts.app :title="__('Tambah Dokter')">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Tambah Dokter</h1>

        <a href="{{ route('dokter.index') }}"
            class="flex items-center gap-2 bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-100 px-4 py-2 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-900 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 max-w-3xl mx-auto">
        <form action="{{ route('dokter.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-gray-700 dark:text-gray-100 mb-2 font-medium">NIK</label>
                <input type="text" name="nik" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 focus:outline-none"
                    placeholder="Contoh: 1234567890">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-100 mb-2 font-medium">Nama Lengkap</label>
                <input type="text" name="name" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 focus:outline-none"
                    placeholder="Contoh: dr. Ahmad Siregar">
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-100 mb-2 font-medium">Alamat</label>
                <input type="text" name="alamat" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 focus:outline-none"
                    placeholder="Contoh: Jl. Gajah Mada No.12, Medan">
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-100 mb-2 font-medium">Spesialisasi</label>
                <input type="text" name="spesialisasi" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 focus:outline-none"
                    placeholder="Contoh: Spesialis Anak">
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-700 dark:text-gray-100 mb-2 font-medium">No. Telepon</label>
                    <input type="text" name="phone" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 focus:outline-none"
                        placeholder="0812-3456-7890">
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-100 mb-2 font-medium">Email Login</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 focus:outline-none"
                        placeholder="dokter@example.com">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 mb-2 font-medium">Password Login</label>
                <input type="password" name="password" min="6" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-900 focus:outline-none"
                    placeholder="Minimal 6 karakter">
            </div>

            <!-- Jadwal Dokter -->
            {{-- <div class="grid sm:grid-cols-2 gap-5">

                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Jam (Dari)</label>
                    <input type="time" name="jam_dari" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700">
                </div>


                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Jam (Ke)</label>
                    <input type="time" name="jam_ke" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700">
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-5 mt-5">
                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Hari (Dari)</label>
                    <select name="hari_dari" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700">
                        <option value="">-- Pilih Hari --</option>
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                        <option>Minggu</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Hari (Ke)</label>
                    <select name="hari_ke" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700">
                        <option value="">-- Pilih Hari --</option>
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                        <option>Minggu</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 mb-2 font-medium">Status</label>
                <select name="status" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700">
                    <option value="">-- Pilih Status --</option>
                    <option value="aktif">Online</option>
                    <option value="tidak aktif">Online</option>
                </select>
            </div> --}}

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('dokter.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 dark:bg-gray-800 text-white dark:text-gray-100 dark:border rounded-lg hover:bg-blue-700 dark:hover:bg-gray-900 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
