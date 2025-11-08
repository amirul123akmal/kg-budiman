<x-admin-layout :title="'Aktiviti'">

    <!-- Tambah padding menyeluruh (kiri, kanan, atas, bawah) -->
    <div class="p-4 sm:p-6 lg:p-8">

        {{-- Menggunakan style button/pill tabs dengan gradient. --}}
        <div class="mb-4">
            
            <!-- Navigation Links: Menggunakan route untuk navigasi dan memenuhkan lebar skrin -->
            <ul class="flex w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400" role="tablist">

                {{-- Tentukan route aktif di sini untuk kegunaan dalam kelas Tailwind --}}
                @php
                    $isAktivitiActive = request()->routeIs('admin.aktiviti.*');
                    $isPengungumanActive = request()->routeIs('admin.pengunguman.*');
                @endphp

                <!-- Tab 1: Senarai Ahli Jawatankuasa (Route: admin.ajk.index) -->
                <li class="flex-1 me-2" role="presentation">
                    <a href="{{ route('admin.aktiviti.index') }}"
                        class="inline-block w-full px-4 py-3 rounded-lg transition duration-300 transform hover:scale-[1.01]
                        {{-- Logik Kelas Aktif: Guna gradient primary-tertiary --}}
                        @if ($isAktivitiActive)
                            text-white bg-linear-to-r from-primary to-tertiary shadow-xl shadow-primary-500/50 active font-semibold
                        @else
                            hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white
                        @endif
                        "
                        aria-current="{{ $isAktivitiActive ? 'page' : 'false' }}">
                        Senarai Aktiviti
                    </a>
                </li>

                <!-- Tab 2: Senarai Fasiliti (Route: admin.fasiliti.index) -->
                <li class="flex-1" role="presentation">
                    <a href="{{ route('admin.pengunguman.index') }}"
                        class="inline-block w-full px-4 py-3 rounded-lg transition duration-300 transform hover:scale-[1.01]
                        {{-- Logik Kelas Aktif: Guna gradient primary-tertiary --}}
                        @if ($isPengungumanActive)
                            text-white bg-linear-to-r from-primary to-tertiary shadow-xl shadow-primary-500/50 active font-semibold
                        @else
                            hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white
                        @endif
                        "
                        aria-current="{{ $isPengungumanActive ? 'page' : 'false' }}">
                        Senarai Pengunguman
                    </a>
                </li>
            </ul>
        </div>

       <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Tambah Aktiviti</h2>
            </div>
            <form action="{{ route('admin.aktiviti.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                {{-- Nama Aktiviti --}}
                <div>
                    <label for="nama_aktiviti" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Aktiviti</label>
                    <input type="text" id="nama_aktiviti" name="nama_aktiviti" 
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-dark dark:focus:border-primary-dark" 
                           placeholder="Cth: Gotong Royong Perdana" required>
                </div>

                {{-- Keterangan --}}
                <div>
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Keterangan Aktiviti</label>
                    <textarea id="keterangan" name="keterangan" rows="4" 
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-dark dark:focus:border-primary-dark" 
                              placeholder="Terangkan secara ringkas tentang aktiviti..."></textarea>
                </div>

                {{-- Tarikh --}}
                <div>
                    <label for="tarikh" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tarikh Aktiviti</label>
                    <input type="date" id="tarikh" name="tarikh" 
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-dark dark:focus:border-primary-dark" 
                           required>
                </div>

                {{-- Gambar (Muat Naik Pelbagai) --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Muat Naik Gambar</label>
                    <div id="dropzone" 
                         class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg transition hover:border-primary-500 dark:hover:border-primary-400">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                <label for="gambar" 
                                       class="relative cursor-pointer rounded-md font-medium text-primary-600 dark:text-primary-400 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                    <span>Muat naik fail</span>
                                    <input id="gambar" name="gambar[]" type="file" class="sr-only" multiple>
                                </label>
                                <p class="pl-1">atau seret dan lepas (drag and drop)</p>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-500">PNG, JPG, GIF sehingga 10MB</p>
                        </div>
                    </div>
                    <!-- Ruangan Preview Imej -->
                    <div id="image-previews" class="mt-4 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-4"></div>
                </div>

                {{-- Tagging --}}
                <div>
                    <label for="tag-input-field" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Penandaan (Tags)</label>
                    <div id="tag-container" class="flex flex-wrap items-center w-full rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 p-2 shadow-sm">
                        <!-- Tags akan ditambah oleh JS di sini -->
                        <input type="text" id="tag-input-field" 
                               placeholder="Tambah tag..." 
                               class="border-none bg-transparent p-1 ring-0 focus:ring-0 focus:outline-none flex-1 dark:text-white placeholder-gray-500">
                    </div>
                    <input type="hidden" name="tags" id="hidden-tags">
                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">Tekan 'Enter' atau 'Koma' untuk menambah tag.</p>
                </div>


                {{-- Butang Hantar & Kembali --}}
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.aktiviti.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">Kembali ke Senarai</a>
                    
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg shadow hover:bg-primary-dark transition duration-300 transform hover:scale-[1.02]">Simpan Aktiviti</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // --- SKRIP UNTUK PREVIEW IMEJ ---
            const dropzone = document.getElementById('dropzone');
            const imageInput = document.getElementById('gambar');
            const previewsContainer = document.getElementById('image-previews');
            
            // Fungsi untuk handle fail
            function handleFiles(files) {
                previewsContainer.innerHTML = ''; // Kosongkan preview lama
                if (files.length === 0) {
                     // Kembalikan dropzone ke state asal jika tiada fail
                     dropzone.querySelector('.space-y-1').style.display = 'block';
                     return;
                }
                
                // Sembunyikan teks "drag and drop"
                dropzone.querySelector('.space-y-1').style.display = 'none';

                Array.from(files).forEach(file => {
                    if (!file.type.startsWith('image/')){ return; }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'relative group';
                        div.innerHTML = `
                            <img src="${e.target.result}" alt="${file.name}" class="w-full h-24 object-cover rounded-lg shadow-md">
                            <div class="absolute top-0 right-0 p-1 bg-red-600 text-white rounded-bl-lg opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer" 
                                 data-filename="${file.name}">
                                &times;
                            </div>
                        `;
                        previewsContainer.appendChild(div);
                    };
                    reader.readAsDataURL(file);
                });
            }

            // Handle klik pada dropzone
            dropzone.addEventListener('click', (e) => {
                if (e.target.id === 'gambar') return;
                imageInput.click();
            });

            // Handle fail dipilih
            imageInput.addEventListener('change', () => {
                handleFiles(imageInput.files);
            });

            // Handle Drag & Drop
            dropzone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropzone.classList.add('border-primary-500', 'bg-primary-50', 'dark:bg-primary-900/10');
            });
            dropzone.addEventListener('dragleave', (e) => {
                e.preventDefault();
                dropzone.classList.remove('border-primary-500', 'bg-primary-50', 'dark:bg-primary-900/10');
            });
            dropzone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropzone.classList.remove('border-primary-500', 'bg-primary-50', 'dark:bg-primary-900/10');
                const droppedFiles = e.dataTransfer.files;
                imageInput.files = droppedFiles; // Masukkan fail ke input
                handleFiles(droppedFiles);
            });

            // Handle pemadaman preview (Nota: Ini hanya memadam preview, logik backend diperlukan untuk memadam fail)
            // Disebabkan FileList adalah read-only, cara terbaik ialah menguruskan fail dalam 'FileStore'
            // Tetapi untuk kesederhanaan, kita hanya akan memadam preview. Pengguna perlu pilih semula jika tersilap.
            // (Logik DataTransfer untuk memanipulasi FileList adalah rumit)
            previewsContainer.addEventListener('click', function(e) {
                if (e.target.tagName === 'DIV' && e.target.dataset.filename) {
                     // Ini hanya simulasi pemadaman visual
                     e.target.parentElement.remove();
                     
                     // Amaran: Ini tidak memadam fail dari 'imageInput.files'.
                     // Anda perlu memberitahu pengguna untuk memilih semula, atau guna logik 'DataTransfer' yang lebih kompleks.
                     // Untuk borang 'create', selalunya lebih mudah untuk membiarkan pengguna memuat naik dan memadamnya di 'edit'.
                }
            });


            // --- SKRIP UNTUK INPUT TAGGING ---
            const tagContainer = document.getElementById('tag-container');
            const tagInput = document.getElementById('tag-input-field');
            const hiddenInput = document.getElementById('hidden-tags');
            let tags = [];

            function renderTags() {
                // Buang semua tag sedia ada kecuali input
                tagContainer.querySelectorAll('.tag-pill').forEach(tag => tag.remove());
                
                // Lukis semula tag
                tags.slice().reverse().forEach(tag => {
                    const tagElement = document.createElement('div');
                    tagElement.className = 'tag-pill flex items-center bg-primary text-white rounded-full px-3 py-1 text-sm font-medium mr-2 mb-1';
                    tagElement.innerHTML = `
                        <span>${tag}</span>
                        <button type="button" class="ml-1.5 text-white hover:text-red-500" data-tagname="${tag}">&times;</button>
                    `;
                    tagContainer.prepend(tagElement);
                });
                
                // Kemas kini input tersembunyi
                hiddenInput.value = tags.join(',');
            }

            // Handle input
            tagInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    const tagName = tagInput.value.trim();
                    
                    if (tagName.length > 0 && !tags.includes(tagName)) {
                        tags.push(tagName);
                        renderTags();
                    }
                    tagInput.value = '';
                } else if (e.key === 'Backspace' && tagInput.value.length === 0) {
                    // Padam tag terakhir jika backspace ditekan pada input kosong
                    if (tags.length > 0) {
                        tags.pop();
                        renderTags();
                    }
                }
            });
            
            // Handle pemadaman tag
            tagContainer.addEventListener('click', function(e) {
                if (e.target.tagName === 'BUTTON' && e.target.dataset.tagname) {
                    const tagName = e.target.dataset.tagname;
                    tags = tags.filter(tag => tag !== tagName);
                    renderTags();
                }
            });

        });
    </script>
</x-admin-layout>