    <div>
        <div class="flex-1 space-y-6 p-6">

            <!-- Header -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    Registrasi Pasien Baru
                </h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm mt-1">
                    Isi data di bawah ini untuk mendaftarkan pasien non-terdaftar.
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">

                <form>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Nama Lengkap -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Nama Lengkap
                            </label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 
                                        rounded-lg dark:bg-gray-800 dark:text-gray-100
                                        focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-700"
                                placeholder="Masukkan nama pasien">
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Nomor Telepon
                            </label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600
                                        rounded-lg dark:bg-gray-800 dark:text-gray-100 
                                        focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-700"
                                placeholder="08xxxxxxxxxx">
                        </div>

                        <!-- Tanggal Lahir -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Tanggal Lahir
                            </label>
                            <input type="date"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600
                                        rounded-lg dark:bg-gray-800 dark:text-gray-100
                                        focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-700">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Jenis Kelamin
                            </label>
                            <select
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600
                                        rounded-lg dark:bg-gray-800 dark:text-gray-100
                                        focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-700">
                                <option value="">Pilih</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>

                        <!-- Alamat -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Alamat
                            </label>
                            <textarea rows="3"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600
                                        rounded-lg dark:bg-gray-800 dark:text-gray-100
                                        focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-700"
                                placeholder="Masukkan alamat lengkap"></textarea>
                        </div>

                        <!-- Pilih Dokter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Pilih Dokter
                            </label>
                            <select
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600
                                        rounded-lg dark:bg-gray-800 dark:text-gray-100
                                        focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-700">
                                <option value="">Pilih Dokter</option>
                                <option>Dr. Budi</option>
                                <option>Dr. Sinta</option>
                                <option>Dr. Bagas</option>
                            </select>
                        </div>

                        <!-- Tanggal Kunjungan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Tanggal Kunjungan
                            </label>
                            <input type="date" min="{{ now()->format('Y-m-d') }}"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600
                                        rounded-lg dark:bg-gray-800 dark:text-gray-100
                                        focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-700">
                        </div>

                    </div>

                    <!-- Keluhan -->
                    <div class="mt-6" x-data="{ keluhan: '', max: 255 }">
                        <div class="flex justify-between items-center">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-100 mb-2">
                                Keluhan
                            </label>
                            <span class="text-xs text-gray-600 dark:text-gray-300">
                                <span x-text="keluhan.length"></span>/<span x-text="max"></span>
                            </span>
                        </div>

                        <textarea rows="4" x-model="keluhan" maxlength="255"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600
                                    rounded-lg dark:bg-gray-800 dark:text-gray-100
                                    focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-gray-700"
                            placeholder="Tuliskan keluhan pasien..."></textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-center gap-4 mt-8">
                        <button type="button"
                            class="px-6 py-2 border border-gray-300 dark:border-gray-600 
                                    text-gray-700 dark:text-gray-100 rounded-lg 
                                    hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            Batal
                        </button>

                        <button type="button"
                            onclick='window.location.href="{{ route("admin.registrasi-pasien-non") }}"'
                            class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-800 transition">
                            Daftarkan Pasien yang Non-Terdaftar
                        </button>


                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 dark:bg-gray-700 text-white rounded-lg 
                                    hover:bg-blue-700 dark:hover:bg-gray-900 transition">
                            Daftar
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>