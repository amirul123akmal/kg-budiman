<x-admin-layout :title="'Akses Admin'">

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

        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Tambah Admin</h2>
                
                {{-- button kembali ke route admin.ajk.index --}}
            </div>
            {{-- form input ajk details [gambar, nama ajk, jawatan, no. telefon] --}}
            <form action="{{ route('admin.akses-admin.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Admin</label>
                    <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-dark dark:focus:border-primary-dark" required>
                </div>

                <div>
                    <label for="emel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Emel</label>
                    <input type="email" name="emel" id="emel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-dark dark:focus:border-primary-dark" required>
                </div>

                <div>
                    <label for="telefon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">No. Telefon</label>
                    <input type="text" name="telefon" id="telefon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-dark dark:focus:border-primary-dark" required>
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.akses-admin.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Kembali ke Senarai</a>
                    
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-primary-dark transition duration-300 transform hover:scale-[1.02]">Simpan Ahli Jawatankuasa</button>
                </div>
            </form>

        </div>

    </div>

</x-admin-layout>