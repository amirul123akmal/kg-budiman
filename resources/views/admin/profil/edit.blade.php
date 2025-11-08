<x-admin-layout :title="'Profil Admin'">

    <!-- Tambah padding menyeluruh (kiri, kanan, atas, bawah) -->
    <div class="p-4 sm:p-6 lg:p-8">

        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Kemaskini Profil</h2>
                
                {{-- button kembali ke route admin.ajk.index --}}
            </div>
            {{-- form input ajk details [gambar, nama ajk, jawatan, no. telefon] --}}
            <form action="{{ route('admin.profil.update', 1) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Penuh</label>
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
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-primary-dark transition duration-300 transform hover:scale-[1.02]">Simpan Profil</button>
                </div>
            </form>

        </div>

    </div>

</x-admin-layout>