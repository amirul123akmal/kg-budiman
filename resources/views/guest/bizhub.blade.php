<x-app-layout :title="'Budiman Biz HUB'">
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden font-sans">

        <!-- Background Image Container -->
        <div class="absolute inset-0">
            <!-- Placeholder for the actual image of the supermarket aisle -->
            <img src="{{ asset('images/bizhub.jpg') }}"
                alt="Supermarket Aisle Background"
                class="w-full h-full object-cover">
                    
            <!-- Black/Dark Layer to ensure readability -->
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <!-- Content Container (Centered and Responsive) -->
        <div class="relative z-10 text-center text-white p-6 max-w-6xl mx-auto">
            <!-- Main Title -->
            <h1 class="text-6xl sm:text-7xl lg:text-8xl font-black mb-6 leading-tight drop-shadow-lg">
                Budiman Biz
                <!-- Accent text color using the vibrant accent variable -->
                <span> HUB</span>
            </h1>

            <!-- Subtitle/Description -->
            <p class="text-lg md:text-xl font-light mb-16 max-w-3xl mx-auto px-4 drop-shadow-md">
                Sokong perniagaan tempatan kami. Pelbagai produk dan perkhidmatan berkualiti dari usahawan Kampung Budiman.
            </p>

            <!-- Stats/Metrics Grid -->
            <div class="flex flex-col md:flex-row justify-center space-y-10 md:space-y-0 md:space-x-16 mt-16 px-4">
                
                <!-- Metric 1: Perniagaan -->
                <div class="flex-1 max-w-xs mx-auto">
                    <p class="text-5xl md:text-6xl font-extrabold mb-2 leading-none">
                        20%
                    </p>
                    <p class="text-sm sm:text-lg uppercase tracking-widest font-medium text-gray-200">
                        Perniagaan
                    </p>
                </div>

                <!-- Metric 2: Produk -->
                <div class="flex-1 max-w-xs mx-auto">
                    <p class="text-5xl md:text-6xl font-extrabold mb-2 leading-none">
                        72 +
                    </p>
                    <p class="text-sm sm:text-lg uppercase tracking-widest font-medium text-gray-200">
                        Produk
                    </p>
                </div>

                <!-- Metric 3: Tempatan -->
                <div class="flex-1 max-w-xs mx-auto">
                    <p class="text-5xl md:text-6xl font-extrabold mb-2 leading-none">
                        100%
                    </p>
                    <p class="text-sm sm:text-lg uppercase tracking-widest font-medium text-gray-200">
                        Tempatan
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- listkan perniagaan -->
    @php
        $gradientClass = "bg-gradient-to-r from-[var(--color-primary)] to-[var(--color-secondary)]";
    @endphp
    <section class="py-16 md:py-20 bg-gray-50 font-sans">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <!-- Header Section -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-2">
                    Cari Perniagaan Mengikut Kategori
                </h2>
                <p class="text-gray-600 text-lg">
                    Pilih kategori untuk melihat perniagaan yang berkaitan
                </p>
            </div>

            <!-- Category Tabs/Filters -->
            <div class="flex flex-wrap justify-center gap-3 mb-12">

                @php
                    // Array of categories and their icons (using Lucide icons as placeholders)
                    $categories = [
                        ['name' => 'Semua', 'icon' => 'grid', 'isActive' => true],
                        ['name' => 'Makanan', 'icon' => 'chef-hat', 'isActive' => false],
                        ['name' => 'Pertanian', 'icon' => 'plant', 'isActive' => false],
                        ['name' => 'Kuih-Muih', 'icon' => 'cake', 'isActive' => false],
                        ['name' => 'Perkhidmatan', 'icon' => 'briefcase', 'isActive' => false],
                    ];
                @endphp
                
                @foreach ($categories as $category)
                    @if ($category['isActive'])
                        <!-- Active Button with Gradient -->
                        <button class="flex items-center space-x-2 px-6 py-3 rounded-full text-white text-sm font-semibold shadow-lg transition duration-300 ease-in-out {{ $gradientClass }} hover:shadow-xl">
                            @if ($category['icon'] === 'grid')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                            @elseif ($category['icon'] === 'chef-hat')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.76 0 5 2.24 5 5v5H7V7c0-2.76 2.24-5 5-5zM17 12h2a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-2v2a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2v-2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2"/></svg>
                            @elseif ($category['icon'] === 'plant')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A14 14 0 0 0 12 20c.4 0 .9.1 1.3.1"/><path d="M10 16c2.4-1.5 5.2-2.5 8.2-2.5 1.5 0 3 .5 4 1.5 0-3.5-2.5-6.5-5.5-7.5-1.5-.5-3-1-4.5-1.5-1.5-.5-3-.5-4.5 0-1.5.5-3 1-4.5 1.5-3 1-5.5 4-5.5 7.5 1-1 2.5-1.5 4-1.5 3 0 5.8 1 8.2 2.5"/></svg>
                            @elseif ($category['icon'] === 'cake')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 5H4v14c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V5z"/><path d="M12 2v3m-4 1c.6 1 1.4 1 2 0m8 0c-.6 1-1.4 1-2 0m-8 3h12m-6 4v5"/></svg>
                            @elseif ($category['icon'] === 'briefcase')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                            @endif
                            <span class="whitespace-nowrap">{{ $category['name'] }}</span>
                        </button>
                    @else
                        <!-- Inactive Button -->
                        <button class="flex items-center space-x-2 px-6 py-3 rounded-full text-gray-700 bg-white border border-gray-200 text-sm font-medium hover:text-gray-900 hover:border-gray-300 transition duration-300 ease-in-out">
                            @if ($category['icon'] === 'chef-hat')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2.76 0 5 2.24 5 5v5H7V7c0-2.76 2.24-5 5-5zM17 12h2a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-2v2a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2v-2H5a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h2"/></svg>
                            @elseif ($category['icon'] === 'plant')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7.9 20A14 14 0 0 0 12 20c.4 0 .9.1 1.3.1"/><path d="M10 16c2.4-1.5 5.2-2.5 8.2-2.5 1.5 0 3 .5 4 1.5 0-3.5-2.5-6.5-5.5-7.5-1.5-.5-3-1-4.5-1.5-1.5-.5-3-.5-4.5 0-1.5.5-3 1-4.5 1.5-3 1-5.5 4-5.5 7.5 1-1 2.5-1.5 4-1.5 3 0 5.8 1 8.2 2.5"/></svg>
                            @elseif ($category['icon'] === 'cake')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 5H4v14c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V5z"/><path d="M12 2v3m-4 1c.6 1 1.4 1 2 0m8 0c-.6 1-1.4 1-2 0m-8 3h12m-6 4v5"/></svg>
                            @elseif ($category['icon'] === 'briefcase')
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                            @endif
                            <span class="whitespace-nowrap">{{ $category['name'] }}</span>
                        </button>
                    @endif
                @endforeach
            </div>

            <!-- Business Listings Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @foreach (range(1, 6) as $i)
                <!-- Card for a Single Business -->
                <div class="bg-white rounded-xl shadow-xl overflow-hidden transform hover:scale-[1.02] transition duration-300 ease-in-out border border-gray-100">
                    
                    <!-- Business Image (Placeholder) -->
                    <img src="https://placehold.co/600x400/D0D0D0/202020?text=Warung+{{ $i }}" 
                        alt="Warung Pak Lebai" 
                        class="w-full h-48 object-cover">
                    
                    <div class="p-6">
                        <!-- Business Name -->
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            Warung Pak Lebai
                        </h3>

                        <!-- Business Description -->
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            Menyediakan pelbagai jenis makanan dan minuman tempatan yang sedap dan berkualiti.
                        </p>

                        <!-- Details/Metadata -->
                        <div class="space-y-3 text-sm">
                            
                            <!-- Operating Hours -->
                            <div class="flex items-center text-gray-700">
                                <!-- Clock Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 shrink-0 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                <span>8:00 AM - 10:00 PM</span>
                            </div>

                            <!-- Location -->
                            <div class="flex items-center text-gray-700">
                                <!-- Map Pin Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 shrink-0 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                <span>Lot 123, Kampung Budiman</span>
                            </div>

                            <!-- Phone Number -->
                            <div class="flex items-center text-gray-700">
                                <!-- Phone Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 shrink-0 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-8.2-8.2A19.79 19.79 0 0 1 2 4.18V2a2 2 0 0 1 2-2h3.9a2 2 0 0 1 2 1.74l.98 5.07a2 2 0 0 1-.5 1.95L7.56 12a14.33 14.33 0 0 0 7.08 7.08l1.45-1.45a2 2 0 0 1 1.95-.5l5.07.98A2 2 0 0 1 22 16.92z"/></svg>
                                <span>01283765379</span>
                            </div>
                        </div>

                        <!-- Call to Action Button with Gradient -->
                        <button class="w-full mt-6 px-4 py-3 rounded-lg text-white font-semibold shadow-md transition duration-300 ease-in-out {{ $gradientClass }} focus:outline-none focus:ring-1 focus:ring-opacity-50 focus:ring-primary">
                            Klik untuk tempahan
                        </button>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

</x-app-layout>