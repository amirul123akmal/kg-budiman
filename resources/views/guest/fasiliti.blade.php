<x-app-layout :title="'Fasiliti'">
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden font-sans">

        <!-- Background Image Container -->
        <div class="absolute inset-0">
            <!-- Placeholder for the actual image of the supermarket aisle -->
            <img src="{{ asset('images/fasiliti.jpg') }}"
                alt="Supermarket Aisle Background"
                class="w-full h-full object-cover">
                    
            <!-- Black/Dark Layer to ensure readability -->
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <!-- Content Container (Centered and Responsive) -->
        <div class="relative z-10 text-center text-white p-6 max-w-6xl mx-auto">
            <!-- Main Title -->
            <h1 class="text-6xl sm:text-7xl lg:text-8xl font-black mb-6 leading-tight drop-shadow-lg">
                Fasiliti
                <!-- Accent text color using the vibrant accent variable -->
                <span > Kampung</span>
            </h1>

            <!-- Subtitle/Description -->
            <p class="text-lg md:text-xl font-light mb-16 max-w-3xl mx-auto px-4 drop-shadow-md">
                Pelbagai kemudahan untuk keselesaan penduduk
            </p>

        </div>
    </section>
    <!-- listkan fasiliti -->
    @php
        // Define the custom gradient for the header badge
        $gradientClass = "bg-gradient-to-r from-primary to-tertiary";

        // Data for Fasiliti (6 items, 3 per row)
        // $fasiliti = [
        //     ['name' => 'Surau As-Syaqirin', 'description' => 'Tempat ibadah yang selesa dan bersih untuk penduduk kampung.', 'image_url' => 'https://placehold.co/600x400/D0D0D0/202020?text=Surau', 'badge' => 'Penting'],
        //     ['name' => 'Padang Bola Sepak', 'description' => 'Fasiliti sukan yang lengkap untuk aktiviti riadah komuniti.', 'image_url' => 'https://placehold.co/600x400/A0A0A0/101010?text=Padang+Bola', 'badge' => 'Penting'],
        //     ['name' => 'Gelanggang Badminton', 'description' => 'Gelanggang tertutup untuk aktiviti badminton dan acara lain.', 'image_url' => 'https://placehold.co/600x400/C0C0C0/303030?text=Badminton', 'badge' => 'Penting'],
        //     ['name' => 'Taman Permainan', 'description' => 'Kawasan selamat untuk kanak-kanak bermain dan bersosial.', 'image_url' => 'https://placehold.co/600x400/E0E0E0/404040?text=Taman+Permainan', 'badge' => 'Komuniti'],
        //     ['name' => 'Sekolah Rendah Kg Budiman', 'description' => 'Institusi pendidikan utama bagi anak-anak penduduk kampung.', 'image_url' => 'https://placehold.co/600x400/F0F0F0/505050?text=Sekolah', 'badge' => 'Pendidikan'],
        //     ['name' => 'Balai Raya Kg Budiman', 'description' => 'Pusat aktiviti masyarakat, mesyuarat, dan majlis kenduri.', 'image_url' => 'https://placehold.co/600x400/B0B0B0/606060?text=Balai+Raya', 'badge' => 'Serbaguna'],
        // ];
    @endphp

    <section class="py-16 md:py-20 bg-white font-sans">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2">
                    Kemudahan Utama Kampung Budiman
                </h2>
                <p class="text-gray-600 text-lg">
                    Fasiliti yang disediakan untuk kegunaan dan kesejahteraan komuniti.
                </p>
            </div>

            <!-- Fasiliti Grid (3 items per row) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($fasiliti as $item)
                    @php
                        $mapUrl = $item->location
                            ? 'https://www.google.com/maps/search/?api=1&query=' . urlencode($item->location)
                            : null;
                    @endphp
                    <!-- Facility Card -->
                    <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200 transform transition duration-500 ease-in-out hover:shadow-2xl hover:scale-[1.03]">
                        
                        <!-- Image Container -->
                        <div class="relative w-full h-56 overflow-hidden">
                            <img src="storage/{{ $item->image_path }}" 
                                alt="{{ $item->name }}" 
                                class="w-full h-full object-cover transition duration-500 hover:opacity-90">
                            
                            <!-- Top-Right Badge (Gradient) -->
                            <div class="absolute top-0 right-0 p-3">
                                @if ($mapUrl)
                                    <a href="{{ $mapUrl }}"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="w-10 h-10 rounded-full shadow-lg flex items-center justify-center text-white {{ $gradientClass }} transition hover:scale-105 focus-visible:ring-2 focus-visible:ring-white/80 focus-visible:outline-none"
                                       title="Buka lokasi {{ $item->name }} di Google Maps"
                                       aria-label="Buka lokasi {{ $item->name }} di Google Maps">
                                        <!-- Map Pin Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    </a>
                                @else
                                    <div class="w-10 h-10 rounded-full shadow-lg flex items-center justify-center text-white {{ $gradientClass }}"
                                        title="{{ $item->badge }}">
                                        <!-- Map Pin Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="p-6">
                            <!-- Facility Name -->
                            <h3 class="text-xl font-bold text-gray-900 mb-2">
                                {{ $item->name }}
                            </h3>

                            <!-- Facility Description -->
                            <p class="text-sm text-gray-600">
                                {{ $item->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

</x-app-layout>