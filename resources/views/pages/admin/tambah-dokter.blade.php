<x-layouts.app :title="__('Tambah Dokter')">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Tambah Dokter</h1>

        <a href="{{ route('dokter.index') }}"
           class="flex items-center gap-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-6 max-w-3xl mx-auto">
        <form action="{{ route('dokter.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 mb-2 font-medium">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Contoh: dr. Ahmad Siregar">
            </div>

            <div>
                <label class="block text-gray-700 mb-2 font-medium">Alamat</label>
                <input type="text" name="alamat" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Contoh: Jl. Gajah Mada No.12, Medan">
            </div>

            <div>
                <label class="block text-gray-700 mb-2 font-medium">Spesialisasi</label>
                <input type="text" name="spesialisasi" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Contoh: Spesialis Anak">
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-700 mb-2 font-medium">No. Telepon</label>
                    <input type="text" name="phone" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="0812-3456-7890">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2 font-medium">Email Login</label>
                    <input type="email" name="email" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           placeholder="dokter@example.com">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 mb-2 font-medium">Password Login</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Minimal 6 karakter">
            </div>

            <div>
                <label class="block text-gray-700 mb-2 font-medium">Status</label>
                <select name="status" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Pilih Status --</option>
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('dokter.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
