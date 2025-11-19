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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @foreach ($contactInfo as $contact)
                @php
                    // Define specific styling for each contact type
                    $iconBg = '';
                    $iconColor = '';
                    $cardBg = 'bg-white';
                    $hoverEffect = 'hover:shadow-2xl hover:-translate-y-1';
                    
                    if ($contact['icon'] === 'message-square') {
                        $iconBg = 'bg-[#25D366]'; // WhatsApp green
                        $iconColor = 'text-white';
                    } elseif ($contact['icon'] === 'mail') {
                        $iconBg = 'bg-[#EA4335]'; // Gmail red
                        $iconColor = 'text-white';
                    } elseif ($contact['icon'] === 'map-pin') {
                        $iconBg = 'bg-[#4285F4]'; // Google Maps blue
                        $iconColor = 'text-white';
                    }
                @endphp
                
                <!-- Contact Card -->
                <div class="group relative {{ $cardBg }} p-8 rounded-2xl shadow-xl border border-gray-100 text-left transform transition-all duration-300 ease-in-out {{ $hoverEffect }} overflow-hidden">
                    <!-- Decorative gradient overlay on hover -->
                    <div class="absolute inset-0 bg-linear-to-br from-primary/5 via-transparent to-tertiary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="relative flex items-start gap-5">
                        <!-- Icon Container -->
                        <div class="relative shrink-0">
                            <div class="{{ $iconBg }} w-14 h-14 rounded-xl flex items-center justify-center {{ $iconColor }} shadow-lg transform group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                                @if ($contact['icon'] === 'message-square')
                                    <!-- WhatsApp Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                    </svg>
                                @elseif ($contact['icon'] === 'mail')
                                    <!-- Email Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                    </svg>
                                @elseif ($contact['icon'] === 'map-pin')
                                    <!-- Address/Map Pin Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                @endif
                            </div>
                            <!-- Decorative ring on hover -->
                            <div class="absolute inset-0 {{ $iconBg }} rounded-xl opacity-20 blur-xl scale-150 group-hover:scale-175 transition-transform duration-300"></div>
                        </div>
                        
                        <!-- Text Content -->
                        <div class="flex-1 min-w-0">
                            <h4 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors duration-300">
                                {{ $contact['type'] }}
                            </h4>
                            <p class="text-sm text-gray-600 font-medium wrap-break-word leading-relaxed group-hover:text-gray-700 transition-colors duration-300">
                                {{ $contact['details'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-center items-center gap-3 mb-12" role="group" aria-label="Social links">
            <!-- Instagram with official gradient colors -->
            <a href="https://www.instagram.com/kgbudimanofficial/" target="_blank" rel="noopener" aria-label="Instagram" class="w-9 h-9 flex items-center justify-center rounded-md text-white bg-gradient-to-br from-[#833AB4] via-[#E1306C] to-[#FCAF45] hover:opacity-90 transition-opacity">
                <!-- Instagram logo -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
            </a>

            <!-- TikTok with official black color -->
            <a href="https://www.tiktok.com/@kampungbudiman" target="_blank" rel="noopener" aria-label="TikTok" class="w-9 h-9 flex items-center justify-center rounded-md bg-[#000000] text-white hover:opacity-90 transition-opacity">
                <!-- TikTok logo -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                </svg>
            </a>

            <!-- Facebook with official blue color -->
            <a href="https://www.facebook.com/profile.php?id=100078154886670" target="_blank" rel="noopener" aria-label="Facebook" class="w-9 h-9 flex items-center justify-center rounded-md bg-[#1877F2] text-white hover:opacity-90 transition-opacity">
                <!-- Facebook logo -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
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