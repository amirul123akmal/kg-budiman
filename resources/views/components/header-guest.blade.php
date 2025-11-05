<nav class="bg-linear-to-r from-white to-gray-50 shadow-lg border-b border-gray-200 px-6 py-4" x-data="{ open: false }">
  <div class="flex flex-wrap items-center justify-between mx-auto max-w-7xl">
    <!-- Logo -->
    <a href="#" class="flex items-center space-x-2 transition-transform hover:scale-105">
      <img src="/images/jpkk.png" class="h-10 drop-shadow-sm" alt="Kampung Budiman Logo" />
    </a>

    <!-- Navbar links -->
    <div class="hidden md:flex items-center space-x-8 font-medium">
      <a href="{{ route('utama') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors">
        Utama
      </a>

      <!-- Dropdown -->
      <div class="relative" x-data="{ open: false }">
        <button
          @click="open = !open"class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors">Profil Kampung
          <svg class="w-4 h-4 ml-1 mt-px transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>

        <!-- Dropdown menu -->
        <div
          x-show="open"
          @click.away="open = false"
          x-transition:enter="transition ease-out duration-100"
          x-transition:enter-start="transform opacity-0 scale-95"
          x-transition:enter-end="transform opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-75"
          x-transition:leave-start="transform opacity-100 scale-100"
          x-transition:leave-end="transform opacity-0 scale-95"
          class="absolute bg-white shadow-xl rounded-lg mt-2 w-48 border border-gray-200 z-50"
        >
          <ul class="py-2 text-sm text-gray-700">
            <li>
              <a href="{{ route('ahli-jawatankuasa') }}" class="block px-4 py-3 hover:bg-linear-to-r hover:from-secondary hover:to-primary hover:text-white font-poppins text-sm transition-all rounded-md mx-1">
                Ahli Jawatankuasa
              </a>
            </li>
            <li>
              <a href="{{ route('fasiliti') }}" class="block px-4 py-3 hover:bg-linear-to-r hover:from-secondary hover:to-primary hover:text-white font-poppins text-sm transition-all rounded-md mx-1">
                Fasiliti
              </a>
            </li>
          </ul>
        </div>
      </div>

      <a href="{{ route('aktiviti') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors">
        Aktiviti
      </a>
      <a href="{{ route('budiman-biz-hub') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors">
        Budiman Biz Hub
      </a>
      <a href="{{ route('hubungi-kami') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors">
        Hubungi Kami
      </a>
    </div>

    <!-- Search Button -->
    <div>
      <button
        class="flex items-center text-white bg-linear-to-r from-primary to-tertiary hover:from-tertiary hover:to-primary font-medium rounded-full text-sm px-5 py-2.5 shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105"
      >
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"></path>
        </svg>
        Carian
      </button>
    </div>
  </div>
</nav>
