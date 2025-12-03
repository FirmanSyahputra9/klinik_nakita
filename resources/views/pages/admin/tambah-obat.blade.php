<x-layouts.app :title="__('Tambah Obat')">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Tambah Obat Baru</h1>

        <a href="{{ route('stok-obat.index') }}"
            class="flex items-center gap-2 bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">

        <!-- Alert Error -->
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                <p class="font-semibold mb-2">Terdapat kesalahan:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('stok-obat.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Kode Obat -->
                <div>
                    <label for="kode" class="block text-sm font-medium text-gray-700 mb-2">
                        Kode Obat <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="kode" id="kode" value="{{ old('kode') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('kode') border-red-500 @enderror"
                        placeholder="Contoh: OBT001" required>
                    @error('kode')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Obat -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                        Nama Obat <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('nama') border-red-500 @enderror"
                        placeholder="Contoh: Paracetamol" required>
                    @error('nama')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stok -->
                <div>
                    <label for="stok" class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                        Stok <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="stok" id="stok" value="{{ old('stok') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('stok') border-red-500 @enderror"
                        placeholder="0" min="0" required>
                    @error('stok')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Satuan -->
                <div>
                    <label for="satuan" class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                        Satuan <span class="text-red-500">*</span>
                    </label>
                    <select name="satuan" id="satuan"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:bg-gray-700 dark:text-white dark:focus:ring-gray-200 @error('satuan')@enderror"
                        required>
                        <option value="">Pilih Satuan</option>
                        <option value="Strip" {{ old('satuan') == 'Strip' ? 'selected' : '' }}>Strip</option>
                        <option value="Box" {{ old('satuan') == 'Box' ? 'selected' : '' }}>Box</option>
                        <option value="Botol" {{ old('satuan') == 'Botol' ? 'selected' : '' }}>Botol</option>
                        <option value="Tube" {{ old('satuan') == 'Tube' ? 'selected' : '' }}>Tube</option>
                        <option value="Tablet" {{ old('satuan') == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                        <option value="Kapsul" {{ old('satuan') == 'Kapsul' ? 'selected' : '' }}>Kapsul</option>
                        <option value="Pcs" {{ old('satuan') == 'Pcs' ? 'selected' : '' }}>Pcs</option>
                    </select>
                    @error('satuan')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Harga Beli -->
                <div>
                    <label for="harga_beli" class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                        Harga Beli <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-2.5 text-gray-500">Rp</span>
                        <input type="number" name="harga_beli" id="harga_beli" value="{{ old('harga_beli') }}"
                            class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('harga_beli') border-red-500 @enderror"
                            placeholder="0" min="0" required>
                    </div>
                    @error('harga_beli')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Harga Jual -->
                <div>
                    <label for="harga_jual" class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                        Harga Jual <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-2.5 text-gray-500">Rp</span>
                        <input type="number" name="harga_jual" id="harga_jual" value="{{ old('harga_jual') }}"
                            class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('harga_jual') border-red-500 @enderror"
                            placeholder="0" min="0" required>
                    </div>
                    @error('harga_jual')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Kadaluwarsa -->
                <div>
                    <label for="tanggal_kadaluwarsa" class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                        Tanggal Kadaluwarsa <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal_kadaluwarsa" id="tanggal_kadaluwarsa"
                        value="{{ old('tanggal_kadaluwarsa') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tanggal_kadaluwarsa') border-red-500 @enderror"
                        required>
                    @error('tanggal_kadaluwarsa')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Deskripsi (Optional) -->
            <div class="mt-6">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                    Deskripsi (Opsional)
                </label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('deskripsi') border-red-500 @enderror"
                    placeholder="Tambahkan deskripsi obat...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="mt-8 flex justify-end gap-3">
                <a href="{{ route('stok-obat.index') }}"
                    class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 dark:bg-gray-600 text-white rounded-lg hover:bg-blue-700 dark:hover:bg-gray-900 transition">
                    Simpan Obat
                </button>
            </div>

        </form>
    </div>

</x-layouts.app>
