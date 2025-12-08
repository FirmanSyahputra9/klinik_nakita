<x-layouts.app :title="__('Edit Pasien')">

    <div class="max-w-5xl mx-auto mt-6 sm:mt-10 bg-white dark:bg-gray-800 rounded-2xl shadow p-4 sm:p-8">

        <!-- Header -->
        <div class="flex items-center space-x-4 mb-6">
            <a href="{{ url()->previous() }}" class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>

            <h2 class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-gray-100">Edit Data Pasien</h2>
        </div>

        <!-- FORM -->
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-10">

                <!-- GRID FORM -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">

                    <!-- Data Pribadi -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                        <h3 class="font-semibold mb-3 text-gray-800 dark:text-gray-100">Data Pribadi</h3>

                        <div class="space-y-3 text-sm">

                            <div>
                                <label class="block font-medium text-gray-700 dark:text-gray-200">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ $user->pasien->name }}"
                                    class="w-full mt-1 px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200" required>
                            </div>

                            <div>
                                <label class="block font-medium text-gray-700 dark:text-gray-200">NIK</label>
                                <input type="text" name="nik" value="{{ $user->pasien->nik }}"
                                    class="w-full mt-1 px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                            </div>

                            <div>
                                <label class="block font-medium text-gray-700 dark:text-gray-200">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="{{ $user->pasien->tanggal_lahir }}"
                                    class="w-full mt-1 px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                            </div>

                            <div>
                                <label class="block font-medium text-gray-700 dark:text-gray-200">Jenis Kelamin</label>
                                <select name="gender"
                                    class="w-full mt-1 px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                                    <option value="L" {{ $user->pasien->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $user->pasien->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-medium text-gray-700 dark:text-gray-200">Gol. Darah</label>
                                <input type="text" name="gol_darah" value="{{ $user->pasien->gol_darah }}"
                                    class="w-full mt-1 px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                            </div>

                        </div>
                    </div>

                    <!-- Kontak & Alamat -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                        <h3 class="font-semibold mb-3 text-gray-800 dark:text-gray-100">Kontak & Alamat</h3>

                        <div class="space-y-3 text-sm">
                            <div>
                                <label class="block font-medium text-gray-700 dark:text-gray-200">No. Telepon</label>
                                <input type="text" name="phone" value="{{ $user->pasien->phone }}"
                                    class="w-full mt-1 px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                            </div>

                            <div>
                                <label class="block font-medium text-gray-700 dark:text-gray-200">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}"
                                    class="w-full mt-1 px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                            </div>

                            <div>
                                <label class="block font-medium text-gray-700 dark:text-gray-200">Alamat</label>
                                <textarea name="alamat" rows="3"
                                    class="w-full mt-1 px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">{{ $user->pasien->alamat }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Kontak Darurat -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                        <h3 class="font-semibold mb-3 text-gray-800 dark:text-gray-100">Kontak Darurat</h3>

                        <div class="space-y-3 text-sm">
                            <div>
                                <label class="block font-medium text-gray-700 dark:text-gray-200">Nama</label>
                                <input type="text" name="kontak_darurat_nama" value="{{ $user->kontak_darurat_nama }}"
                                    class="w-full mt-1 px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                            </div>

                            <div>
                                <label class="block font-medium text-gray-700 dark:text-gray-200">Hubungan</label>
                                <input type="text" name="kontak_darurat_hubungan" value="{{ $user->kontak_darurat_hubungan }}"
                                    class="w-full mt-1 px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                            </div>

                            <div>
                                <label class="block font-medium text-gray-700 dark:text-gray-200">No. Telepon</label>
                                <input type="text" name="kontak_darurat_no_telepon" value="{{ $user->kontak_darurat_no_telepon }}"
                                    class="w-full mt-1 px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Tambahan -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                        <h3 class="font-semibold mb-3 text-gray-800 dark:text-gray-100">Catatan Medis Tambahan</h3>

                        <textarea name="catatan_medis" rows="4"
                            class="w-full px-3 py-2 rounded-lg border dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">{{ $user->pasien->catatan_medis ?? '' }}</textarea>
                    </div>

                </div>
            </div>

            <!-- ACTION BUTTON -->
            <div class="mt-10 text-center sm:text-right">
                <button type="submit"
                    class="inline-flex items-center bg-indigo-600 text-white dark:bg-indigo-500 dark:hover:bg-indigo-600 px-5 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

</x-layouts.app>