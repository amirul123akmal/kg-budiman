<x-admin-layout :title="'Ahli Jawatankuasa'">

    <!-- Tambah padding menyeluruh (kiri, kanan, atas, bawah) -->
    <div class="p-4 sm:p-6 lg:p-8">

        {{-- Menggunakan style button/pill tabs dengan gradient. --}}
        <div class="mb-4">
            
            <!-- Navigation Links: Menggunakan route untuk navigasi dan memenuhkan lebar skrin -->
            <ul class="flex w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400" role="tablist">

                {{-- Tentukan route aktif di sini untuk kegunaan dalam kelas Tailwind --}}
                @php
                    $isAjkActive = request()->routeIs('admin.ajk.*');
                    $isFasilitiActive = request()->routeIs('admin.fasiliti.*');
                @endphp

                <!-- Tab 1: Senarai Ahli Jawatankuasa (Route: admin.ajk.index) -->
                <li class="flex-1 me-2" role="presentation">
                    <a href="{{ route('admin.ajk.index') }}"
                        class="inline-block w-full px-4 py-3 rounded-lg transition duration-300 transform hover:scale-[1.01]
                        {{-- Logik Kelas Aktif: Guna gradient primary-tertiary --}}
                        @if ($isAjkActive)
                            text-white bg-linear-to-r from-primary to-tertiary shadow-xl shadow-primary-500/50 active font-semibold
                        @else
                            hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white
                        @endif
                        "
                        aria-current="{{ $isAjkActive ? 'page' : 'false' }}">
                        Senarai Ahli Jawatankuasa
                    </a>
                </li>

                <!-- Tab 2: Senarai Fasiliti (Route: admin.fasiliti.index) -->
                <li class="flex-1" role="presentation">
                    <a href="{{ route('admin.fasiliti.index') }}"
                        class="inline-block w-full px-4 py-3 rounded-lg transition duration-300 transform hover:scale-[1.01]
                        {{-- Logik Kelas Aktif: Guna gradient primary-tertiary --}}
                        @if ($isFasilitiActive)
                            text-white bg-gradient-to-r from-primary-600 to-tertiary-600 shadow-xl shadow-primary-500/50 active font-semibold
                        @else
                            hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white
                        @endif
                        "
                        aria-current="{{ $isFasilitiActive ? 'page' : 'false' }}">
                        Senarai Fasiliti
                    </a>
                </li>
            </ul>
        </div>

        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Senarai Ahli Jawatankuasa</h2>
                <a href="{{ route('admin.ajk.create') }}" class="inline-block px-4 py-2 text-sm bg-secondary text-white rounded-lg shadow hover:bg-primary-dark transition duration-300 transform hover:scale-[1.02]">
                    Tambah Ahli Jawatankuasa
                </a>
            </div>
            {{-- table senarai ajk [no., gambar, nama ajk, jawatan, no. telefon ,action(edit, delete)] --}}
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-md">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Gambar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Nama Ahli Jawatankuasa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Jawatan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">No. Telefon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">1</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img class="h-12 w-12 rounded-full bg-primary/20">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">Encik Muhammad Taufik Bin Ahmad</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">Ketua Kampung</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">0123456726</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Adakah anda pasti mahu memadam ahli jawatankuasa ini?')">Padam</button>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

</x-admin-layout>