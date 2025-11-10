<x-app-layout :title="'Ahli Jawatankuasa'">
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden font-sans">
        <!-- Background Image Container -->
        <div class="absolute inset-0">
            <!-- Placeholder for the actual image of the supermarket aisle -->
            <img src="{{ asset('images/ajk.jpg') }}"
                alt="Supermarket Aisle Background"
                class="w-full h-full object-cover">
                    
            <!-- Black/Dark Layer to ensure readability -->
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <!-- Content Container (Centered and Responsive) -->
        <div class="relative z-10 text-center text-white p-6 max-w-6xl mx-auto">
            <!-- Main Title -->
            <h1 class="text-6xl sm:text-7xl lg:text-8xl font-black mb-6 leading-tight drop-shadow-lg">
                Ahli Jawatankuasa
                <!-- Accent text color using the vibrant accent variable -->
                <span > Kampung</span>
            </h1>

            <!-- Subtitle/Description -->
            <p class="text-lg md:text-xl font-light mb-16 max-w-3xl mx-auto px-4 drop-shadow-md">
                Berkhidmat untuk kemajuan dan kesejahteraan Kampung Budiman
            </p>

        </div>
    </section>
    <!-- Majlis Tertinggi -->
	@php
		// Define the custom gradient for headings and card borders
		$gradientClass = "bg-gradient-to-r from-[var(--color-primary)] to-[var(--color-secondary)]";
	@endphp

    <section class="py-16 md:py-20 bg-gray-100 font-sans">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">

            <!-- Majlis Tertinggi Section Header -->
            <div class="text-center mb-12">
                <h3 class="inline-block px-12 py-3 text-xl font-bold text-white rounded-full shadow-lg {{ $gradientClass }} transform transition duration-300 hover:shadow-2xl">
                    Majlis Tertinggi
                </h3>
            </div>

            <!-- Majlis Tertinggi Grid (3 items per row on large screens) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
                @foreach ($majlisTertinggi as $member)
                    <!-- Member Card -->
                    <div class="ajk-card bg-white p-4 rounded-xl shadow-lg border border-gray-200 text-center transform transition duration-500 ease-in-out hover:shadow-xl hover:scale-[1.03] overflow-hidden group">
                        
                        <!-- Image with Gradient Border -->
                        <div class="relative w-full h-72 mx-auto mb-4 rounded-lg overflow-hidden border-4 border-transparent group-hover:border-primary transition duration-500">
                            <img src="{{ $member['image_url'] }}" 
                                alt="{{ $member['name'] }}" 
                                class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition duration-500"
                                onerror="this.onerror=null;this.src='https://placehold.co/300x400/D0D0D0/202020?text=Image+Not+Found'">
                            
                            <!-- Title Overlay -->
							<div class="absolute bottom-0 left-0 right-0 py-2 {{ $gradientClass }} text-white font-bold bg-opacity-90">
								{{ $member['position'] }}
                            </div>
                        </div>

                        <!-- Name and Contact -->
                        <h4 class="text-lg font-semibold text-gray-800 mt-2">
                            {{ $member['name'] }}
                        </h4>
                        <p class="text-sm text-gray-500">
                            {{ $member['phone'] }}
                        </p>
                    </div>
                @endforeach
            </div>


            <!-- Ahli Jawatankuasa Lain Section Header -->
            <div class="text-center mb-12">
                <h3 class="inline-block px-12 py-3 text-xl font-bold text-white rounded-full shadow-lg {{ $gradientClass }} transform transition duration-300 hover:shadow-2xl">
                    Ahli Jawatankuasa Lain
                </h3>
            </div>

            <!-- Ahli Jawatankuasa Lain Grid (4 items per row on large screens) -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($ahliJawatankuasaLain as $member)
                    <!-- Member Card -->
                    <div class="ajk-card bg-white p-4 rounded-xl shadow-lg border border-gray-200 text-center transform transition duration-500 ease-in-out hover:shadow-xl hover:scale-[1.05] overflow-hidden group">
                        
                        <!-- Image with Gradient Border -->
                        <div class="relative w-full h-48 mx-auto mb-4 rounded-lg overflow-hidden border-4 border-transparent group-hover:border-tertiary transition duration-500">
                            <img src="{{ $member['image_url'] }}" 
                                alt="{{ $member['name'] }}" 
                                class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition duration-500"
                                onerror="this.onerror=null;this.src='https://placehold.co/300x400/D0D0D0/202020?text=Image+Not+Found'">
                            
                            <!-- Title Overlay -->
							<div class="absolute bottom-0 left-0 right-0 py-1 text-sm {{ $gradientClass }} text-white font-medium bg-opacity-90">
								{{ $member['position'] }}
                            </div>
                        </div>

                        <!-- Name and Contact -->
                        <h4 class="text-base font-semibold text-gray-800 mt-2">
                            {{ $member['name'] }}
                        </h4>
                        <p class="text-xs text-gray-500">
                            {{ $member['phone'] }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

</x-app-layout>