<x-admin-layout :title="'Info Kampung'">

    <!-- Tambah padding menyeluruh (kiri, kanan, atas, bawah) -->
    <div class="p-4 sm:p-6 lg:p-8">

        {{-- Menggunakan style button/pill tabs dengan gradient. --}}
        <div class="mb-4">
            
            <!-- Navigation Links: Menggunakan route untuk navigasi dan memenuhkan lebar skrin -->
            <ul class="flex w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400" role="tablist">

                {{-- Tentukan route aktif di sini untuk kegunaan dalam kelas Tailwind --}}
                @php
                    $isWaktuBerurusanActive = request()->routeIs('admin.waktu-berurusan.*');
                    $isInfoKampungActive = request()->routeIs('admin.info-kampung.*');
                    $isAksesAdminActive = request()->routeIs('admin.akses-admin.*');
                @endphp

                <!-- Tab 1: Senarai Ahli Jawatankuasa (Route: admin.ajk.index) -->
                <li class="flex-1 me-2" role="presentation">
                    <a href="{{ route('admin.waktu-berurusan.index') }}"
                        class="inline-block w-full px-4 py-3 rounded-lg transition duration-300 transform hover:scale-[1.01]
                        {{-- Logik Kelas Aktif: Guna gradient primary-tertiary --}}
                        @if ($isWaktuBerurusanActive)
                            text-white bg-linear-to-r from-primary to-tertiary shadow-xl shadow-primary-500/50 active font-semibold
                        @else
                            hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white
                        @endif
                        "
                        aria-current="{{ $isWaktuBerurusanActive ? 'page' : 'false' }}">
                        Waktu Berurusan
                    </a>
                </li>

                <!-- Tab 2: Senarai Fasiliti (Route: admin.fasiliti.index) -->
                <li class="flex-1" role="presentation">
                    <a href="{{ route('admin.info-kampung.edit') }}"
                        class="inline-block w-full px-4 py-3 rounded-lg transition duration-300 transform hover:scale-[1.01]
                        {{-- Logik Kelas Aktif: Guna gradient primary-tertiary --}}
                        @if ($isInfoKampungActive)
                            text-white bg-linear-to-r from-primary to-tertiary shadow-xl shadow-primary-500/50 active font-semibold
                        @else
                            hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white
                        @endif
                        "
                        aria-current="{{ $isInfoKampungActive ? 'page' : 'false' }}">
                        Info Kampung
                    </a>
                </li>

                <!-- Tab 3: Senarai Fasiliti (Route: admin.fasiliti.index) -->
                <li class="flex-1" role="presentation">
                    <a href="{{ route('admin.akses-admin.index') }}"
                        class="inline-block w-full px-4 py-3 rounded-lg transition duration-300 transform hover:scale-[1.01]
                        {{-- Logik Kelas Aktif: Guna gradient primary-tertiary --}}
                        @if ($isAksesAdminActive)
                            text-white bg-linear-to-r from-primary to-tertiary shadow-xl shadow-primary-500/50 active font-semibold
                        @else
                            hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white
                        @endif
                        "
                        aria-current="{{ $isAksesAdminActive ? 'page' : 'false' }}">
                        Akses Admin
                    </a>
                </li>
            </ul>
        </div>

        <!-- Kandungan Halaman Edit Info Kampung -->
        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
            <form action="{{ route('admin.info-kampung.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Info Kampung Semasa</h2>
                    <button type="submit" class="inline-block px-4 py-2 text-sm bg-secondary text-white rounded-lg shadow hover:bg-primary-dark transition duration-300 transform hover:scale-[1.02]">
                        Simpan Kemaskini
                    </button>
                </div>  
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                    
                    {{-- Card 1: E-mel Rasmi (Menggunakan Tertiary Light Color) --}}
                    <div class="p-5 rounded-xl bg-gray-100 border border-gray-200">
                        <label for="email" class="block text-sm font-medium text-tertiary dark:text-tertiary mb-2 flex items-center">
                            <!-- Email Icon -->
                            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            E-mel Rasmi Kampung
                        </label>
                        <input type="email" id="email" name="email" value="info.kampungbudiman@gmail.com"
                                class="w-full text-lg font-medium bg-transparent border-b-2 border-tertiary-300 dark:border-tertiary-600 focus:border-primary-500 focus:ring-0 dark:text-white pb-1 transition" 
                                required>
                    </div>

                    {{-- Card 2: Nombor Telefon (Menggunakan Secondary Light Color) --}}
                    <div class="p-5 rounded-xl bg-gray-100 border border-gray-200">
                        <label for="phone" class="block text-sm font-medium text-secondary-800 dark:text-secondary-300 mb-2 flex items-center">
                            <!-- Phone Icon -->
                            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-7.01-7.01C2.5 7.42 2 4.47 2 2a2 2 0 0 1 2-2h3c1.07 0 2.13.75 2.5 1.78l1.45 4.14a2 2 0 0 1-.37 2.18L6 14.5l3.5 3.5 3.5-3.5 4.14 1.45c1.03.37 1.78 1.43 1.78 2.5z"></path></svg>
                            Nombor Telefon Rasmi
                        </label>
                        <input type="tel" id="phone" name="phone" value="011-2345 6789"
                                class="w-full text-lg font-medium bg-transparent border-b-2 border-secondary-300 dark:border-secondary-600 focus:border-primary-500 focus:ring-0 dark:text-white pb-1 transition" 
                                required>
                    </div>
                </div>

                {{-- Card 3: Alamat Kampung (Menggunakan Primary Light Color - Full Width) --}}
                <div class="p-5 rounded-xl bg-gray-100 border border-gray-200">
                    <label for="address" class="block text-sm font-medium text-primary-800 dark:text-primary-300 mb-2 flex items-center">
                        <!-- Location Icon -->
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"></path><circle cx="12" cy="9" r="3"></circle></svg>
                        Alamat Kampung Penuh
                    </label>
                    <textarea id="address" name="address" rows="4" 
                                class="w-full text-base bg-transparent border border-gray-200 dark:border-primary-600 focus:border-primary-500 focus:ring-0 dark:text-white rounded-lg p-3 mt-1" 
                                required>Balai Raya Kampung Budiman, Jalan Utama, 84000 Muar, Johor.</textarea>
                </div>
            </form>
        </div>

    </div>

</x-admin-layout>