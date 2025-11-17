<x-app-layout :title="'Hubungi Kami'">
    <!-- Hero Section -->
   {{-- <section class="relative h-screen flex items-center justify-center overflow-hidden font-sans">

        <!-- Background Image Container -->
        <div class="absolute inset-0">
            <!-- Placeholder for the actual image of the supermarket aisle -->
            <img src="{{ asset('images/hubungi-kami.jpg') }}"
                alt="Supermarket Aisle Background"
                class="w-full h-full object-cover">
                    
            <!-- Black/Dark Layer to ensure readability -->
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <!-- Content Container (Centered and Responsive) -->
        <div class="relative z-10 text-center text-white p-6 max-w-6xl mx-auto">
            <!-- Main Title -->
            <h1 class="text-6xl sm:text-7xl lg:text-8xl font-black mb-6 leading-tight drop-shadow-lg">
                Hubungi
                <!-- Accent text color using the vibrant accent variable -->
                <span > Kami</span>
            </h1>

            <!-- Subtitle/Description -->
            <p class="text-lg md:text-xl font-light mb-16 max-w-3xl mx-auto px-4 drop-shadow-md">
                Kami sedia membantu anda. Jangan ragu untuk menghubungi kami untuk sebarang pertanyaan atau maklum balas.
            </p>

        </div>
    </section> --}}
    <!-- listkan hubungi kami -->
    @php
    // Define the custom gradient for buttons and icons
    $gradientClass = "bg-gradient-to-r from-primary to-tertiary";
    
    // Accent Color for the title 'Berhubung' - Change to a dark color if preferred
    $colorAccent = '#FF2D55'; 

    // Placeholder image URL for background
    $imageUrl = 'https://placehold.co/1920x1080/282828/ffffff?text=Office+Desk+Background';

    // Data Mockup Perhubungan
    $contactInfo = [
        ['type' => 'Whatsapp', 'details' => '+60 12-987684763', 'icon' => 'message-square', 'link' => '#'],
        ['type' => 'Email', 'details' => 'kampungbudimanofficial@gmail.com', 'icon' => 'mail', 'link' => '#'],
        ['type' => 'Alamat', 'details' => 'Lot 4470 / 2, Jalan Haji, Jalan Paip, Kampung Budiman Menara, 41050 Klang, Selangor', 'icon' => 'map-pin', 'link' => '#'],
    ];
@endphp

<section class="relative h-screen flex items-center justify-center overflow-hidden font-sans">

    <!-- Background Image Container -->
    <div class="absolute inset-0">
        <!-- Placeholder for the actual background image -->
        <img src="/images/hubungi-kami.jpg"
             alt="Latar Belakang Meja Pejabat"
             class="w-full h-full object-cover opacity-75">
        
        <!-- Dark Overlay with subtle tint -->
        <div class="absolute inset-0 bg-black/50"></div>
    </div>

    <!-- Content Container (Centered and Responsive) -->
    <div class="relative z-10 text-center text-white p-4 max-w-5xl mx-auto">
        
        <!-- Main Title -->
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold mb-4 leading-tight drop-shadow-lg">
            Mari 
            <!-- Accent text color using the vibrant accent variable -->
            <span style="color: {{ $colorAccent }};">Berhubung</span>
        </h1>

        <!-- Subtitle/Description -->
        <p class="text-base md:text-lg font-light mb-12 max-w-3xl mx-auto px-4 opacity-90 drop-shadow-md">
            Kami sedia membantu anda. Jangan ragu untuk menghubungi kami untuk sebarang pertanyaan atau maklum balas.
        </p>

        <!-- Contact Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-12">
            @foreach ($contactInfo as $contact)
                <!-- Contact Card -->
                <div class="bg-gray-100 p-6 rounded-xl shadow-2xl text-left transform transition duration-300 ease-in-out hover:scale-[1.05] flex items-start space-x-4">
                    
                    <!-- Icon (Gradient) -->
                    <div class="shrink-0 w-10 h-10 rounded-full flex items-center justify-center text-white {{ $gradientClass }}">
                         @if ($contact['icon'] === 'message-square')
                            <!-- Whatsapp/Message Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        @elseif ($contact['icon'] === 'mail')
                            <!-- Email Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        @elseif ($contact['icon'] === 'map-pin')
                            <!-- Address Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        @endif
                    </div>
                    
                    <!-- Text Content -->
                    <div class="flex-1">
                        <h4 class="text-base font-bold text-gray-900 mb-1">{{ $contact['type'] }}</h4>
                        <p class="text-sm text-gray-600 font-medium">{{ $contact['details'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center items-center gap-3 mb-12" role="group" aria-label="Social links">
            <a href="https://www.instagram.com/kgbudimanofficial/" target="_blank" rel="noopener" aria-label="Instagram" class="w-9 h-9 flex items-center justify-center rounded-md text-white {{ $gradientClass }}">
                <!-- Instagram -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="3" width="20" height="18" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
            </a>

            <a href="https://www.tiktok.com/@kampungbudiman" target="_blank" rel="noopener" aria-label="TikTok" class="w-9 h-9 flex items-center justify-center rounded-md bg-black text-white">
                <!-- TikTok (musical note) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 18a4 4 0 1 0 4-4h1V6h3"></path>
                </svg>
            </a>

            <a href="https://www.facebook.com/profile.php?id=100078154886670" target="_blank" rel="noopener" aria-label="Facebook" class="w-9 h-9 flex items-center justify-center rounded-md bg-blue-600 text-white">
                <!-- Facebook -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 2h-3a4 4 0 0 0-4 4v3H8v4h3v8h4v-8h3l1-4h-4V6a1 1 0 0 1 1-1h3z"></path>
                </svg>
            </a>
        </div>
        

        <!-- Call to Action Button (Full Width on Mobile) -->
        <a href="{{ config('app.eaduan_url')  }}" class="inline-flex items-center justify-center px-12 py-4 text-lg font-bold text-white rounded-lg shadow-2xl transition duration-500 ease-in-out {{ $gradientClass }}">
            Terus ke Sistem E-Aduan
            <!-- Arrow Right Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 ml-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
    </div>
</section>

</x-app-layout>