<x-app-layout :title="'Aktiviti'">
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden font-sans">
        <!-- Background Image Container -->
        <div class="absolute inset-0">
            <!-- Placeholder for the actual image of the supermarket aisle -->
            <img src="{{ asset('images/aktiviti.png') }}"
                alt="Supermarket Aisle Background"
                class="w-full h-full object-cover">
                    
            <!-- Black/Dark Layer to ensure readability -->
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <!-- Content Container (Centered and Responsive) -->
        <div class="relative z-10 text-center text-white p-6 max-w-6xl mx-auto">
            <!-- Main Title -->
            <h1 class="text-6xl sm:text-7xl lg:text-8xl font-black mb-6 leading-tight drop-shadow-lg">
                Aktiviti
                <!-- Accent text color using the vibrant accent variable -->
                <span > Kampung</span>
            </h1>

            <!-- Subtitle/Description -->
            <p class="text-lg md:text-xl font-light mb-16 max-w-3xl mx-auto px-4 drop-shadow-md">
                Pelbagai program dan aktiviti untuk pembangunan komuniti
            </p>

        </div>
    </section>
   
    @php
        // Define the custom gradient for headings and primary elements
        $gradientClass = "bg-gradient-to-r from-primary to-tertiary";
        
        // Data is now passed from controller: $aktivitiList and $pengumumanList
        // Ensure variables exist with default empty arrays
        $aktivitiList = $aktivitiList ?? [];
        $pengumumanList = $pengumumanList ?? [];
    @endphp

    <section class="py-16 md:py-20 bg-gray-50 font-sans">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                <!-- Kiri: Senarai Aktiviti (FULL SECTION) -->
                <div class="lg:col-span-2">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 border-b-2 border-gray-200 pb-2">
                        Senarai Aktiviti Terbaru
                    </h3>

                    <div class="space-y-6">
                        @forelse ($aktivitiList as $index => $aktiviti)
                        
                        <!-- Card Aktiviti dengan Carousel Gambar -->
                        <div class="activity-card bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transform transition duration-500 ease-in-out hover:shadow-xl hover:scale-[1.01] grid grid-cols-1 md:grid-cols-3" data-card-index="{{ $index }}">
                            
                            <!-- Carousel Gambar (Kiri) -->
                            <div class="md:col-span-1 relative h-56 md:h-full overflow-hidden" id="carousel-{{ $index }}">
                                
                                @if(!empty($aktiviti['image_urls']) && count($aktiviti['image_urls']) > 0)
                                    @foreach ($aktiviti['image_urls'] as $imgIndex => $imageUrl)
                                    <!-- Gambar Carousel -->
                                    <img src="{{ $imageUrl }}" 
                                        alt="Gambar Aktiviti {{ $index + 1 }} - {{ $imgIndex + 1 }}" 
                                        class="carousel-img absolute top-0 left-0 w-full h-full object-cover transition duration-700 ease-in-out"
                                        data-img-index="{{ $imgIndex }}"
                                        style="opacity: {{ $imgIndex === 0 ? 1 : 0 }};"
                                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/CCCCCC/303030?text=Gambar+Aktiviti'">
                                    @endforeach
                                    
                                    <!-- Carousel Controls (Simple Dots) -->
                                    @if(count($aktiviti['image_urls']) > 1)
                                    <div class="absolute bottom-2 left-0 right-0 flex justify-center space-x-2 p-1">
                                        @foreach ($aktiviti['image_urls'] as $imgIndex => $imageUrl)
                                            <button class="carousel-dot-{{ $index }} w-2 h-2 rounded-full transition duration-300 bg-gray-400 hover:bg-primary" 
                                                    data-img-index="{{ $imgIndex }}"
                                                    aria-label="Go to slide {{ $imgIndex + 1 }}"></button>
                                        @endforeach
                                    </div>
                                    @endif
                                @else
                                    <!-- Default placeholder image if no images -->
                                    <img src="{{ asset('images/aktiviti.jpg') }}" 
                                        alt="Gambar Aktiviti" 
                                        class="w-full h-full object-cover">
                                @endif
                            </div>

                            <!-- Kandungan (Kanan) -->
                            <div class="md:col-span-2 p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-start mb-2">
                                        <!-- Date Badge (Mockup original image style) -->
                                        <span class="px-3 py-1 text-xs font-medium rounded-full text-white {{ $gradientClass }}">
                                            {{ $aktiviti['date'] }}
                                        </span>
                                    </div>
                                    
                                    <h4 class="text-xl font-bold text-gray-900 mb-3">{{ $aktiviti['title'] }}</h4>
                                    <p class="text-gray-600 mb-4 text-sm line-clamp-3">{{ $aktiviti['description'] }}</p>
                                </div>
                                
                                @if(!empty($aktiviti['tags']) && count($aktiviti['tags']) > 0)
                                <div class="flex flex-wrap gap-2 mt-auto pt-3 border-t border-gray-100">
                                    @foreach ($aktiviti['tags'] as $tag)
                                        <!-- Menggunakan warna secondary untuk tag -->
                                        <span class="px-3 py-1 text-xs font-medium rounded-full text-white bg-secondary shadow-sm">
                                            # {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        @empty
                        <!-- Empty State -->
                        <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-8 text-center">
                            <p class="text-gray-500 text-lg">Tiada aktiviti untuk dipaparkan pada masa ini.</p>
                        </div>
                        @endforelse
                    </div>
                </div>

                <!-- Kanan: Pengumuman (FULL SECTION) -->
                <div class="lg:col-span-1 bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200 h-fit sticky top-6">
                    
                    <!-- Header Pengumuman dengan Gradien -->
                    <div class="p-4 text-center text-white font-bold text-lg uppercase {{ $gradientClass }}">
                        Pengumuman Terkini
                    </div>

                    <!-- Senarai Pengumuman -->
                    <div data-pengumuman-container>
                        <div class="p-5 divide-y divide-gray-100">
                        @forelse ($pengumumanList as $pengumuman)
                            <div class="py-3">
                                <p class="text-xs text-gray-500 mb-1">
                                    {{ \Carbon\Carbon::parse($pengumuman['start_date'])->format('d M Y') }}
                                </p>
                                <p class="text-sm text-gray-800 leading-relaxed">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 inline text-primary"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/>
                                        <path d="M10.36 21a2 2 0 0 0 3.28 0"/>
                                    </svg>
                                    <strong>{{ $pengumuman['title'] }}</strong><br>
                                    {{ $pengumuman['content'] }}
                                </p>
                            </div>
                        @empty
                            <div class="py-3 text-center">
                                <p class="text-sm text-gray-500">Tiada pengumuman pada masa ini.</p>
                            </div>
                        @endforelse
                        </div>
                        @if ($pengumumanList->hasPages())
                            <div class="px-5 pb-4" data-pengumuman-pagination>
                                {{ $pengumumanList->links() }}
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- JavaScript untuk Pagination Pengumuman tanpa refresh -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.querySelector('[data-pengumuman-container]');
            if (!container) return;

            document.addEventListener('click', (event) => {
                const paginationWrapper = event.target.closest('[data-pengumuman-pagination]');
                if (!paginationWrapper) return;
                const link = event.target.closest('a');
                if (!link) return;
                event.preventDefault();

                fetch(link.href, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newContainer = doc.querySelector('[data-pengumuman-container]');
                        if (newContainer) {
                            container.innerHTML = newContainer.innerHTML;
                            window.history.replaceState({}, '', link.href);
                        }
                    })
                    .catch(error => console.error('Tidak dapat memuat pengumuman:', error));
            });
        });
    </script>

    <!-- JavaScript untuk Carousel Imej dalam Setiap Kad Aktiviti -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const activityCards = document.querySelectorAll('.activity-card');
            const intervalTime = 4000; // 4 seconds per slide change

            activityCards.forEach(card => {
                const cardIndex = card.dataset.cardIndex;
                const carouselContainer = card.querySelector(`#carousel-${cardIndex}`);
                if (!carouselContainer) return;
                
                const images = carouselContainer.querySelectorAll('.carousel-img');
                const dots = card.querySelectorAll(`.carousel-dot-${cardIndex}`);
                let currentImgIndex = 0;

                if (images.length === 0 || images.length === 1) return; // Skip carousel if 0 or 1 image

                // Fungsi untuk menukar gambar
                function showImage(index) {
                    images.forEach((img, i) => {
                        img.style.opacity = (i === index) ? 1 : 0;
                        img.style.zIndex = (i === index) ? 10 : 1;
                    });
                    dots.forEach((dot, i) => {
                        // Warna dot aktif menggunakan primary color (using Tailwind classes)
                        if (i === index) {
                            dot.classList.remove('bg-gray-400');
                            dot.classList.add('bg-primary');
                            dot.style.transform = 'scale(1.2)';
                        } else {
                            dot.classList.remove('bg-primary');
                            dot.classList.add('bg-gray-400');
                            dot.style.transform = 'scale(1)';
                        }
                    });
                    currentImgIndex = index;
                }

                // Fungsi untuk menukar kepada gambar seterusnya
                function nextImage() {
                    let newIndex = (currentImgIndex + 1) % images.length;
                    showImage(newIndex);
                }
                
                // Auto-play interval untuk setiap kad
                const intervalId = setInterval(nextImage, intervalTime);

                // Event listener untuk dots (jika user klik secara manual)
                dots.forEach(dot => {
                    dot.addEventListener('click', (e) => {
                        const index = parseInt(e.target.dataset.imgIndex);
                        clearInterval(intervalId); // Stop auto-play when manually clicked
                        showImage(index);
                        // Restart auto-play after manual interaction
                        setTimeout(() => {
                            setInterval(nextImage, intervalTime);
                        }, 5000);
                    });
                });

                // Initial setup
                showImage(0);
            });
        });
    </script>

</x-app-layout>