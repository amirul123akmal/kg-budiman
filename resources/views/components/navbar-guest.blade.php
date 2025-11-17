<nav class="bg-linear-to-r from-white to-gray-50 shadow-lg border-b border-gray-200 px-6 py-4" x-data="{ open: false, dropdownOpen: false }">
  <div class="flex flex-wrap items-center justify-between mx-auto max-w-7xl">
    <!-- Logo -->
    <a href="/" class="flex items-center space-x-2 transition-transform hover:scale-105">
      <img src="/images/jpkk ori.png" class="h-10 drop-shadow-sm" alt="Kampung Budiman Logo" />
    </a>

    <!-- Mobile menu button -->
    <button @click="open = !open" class="md:hidden inline-flex items-center p-2 rounded-lg text-gray-500 hover:bg-gray-100">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>

    <!-- Navbar links - Desktop -->
    <div class="hidden md:flex items-center space-x-8 font-medium">
      <a href="{{ route('utama') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors @if(request()->routeIs('utama')) font-bold after:w-full @endif">Utama</a>

      <!-- Dropdown - Desktop -->
      <div class="relative" x-data="{ 
          open: false,
          isProfileActive: {{ request()->routeIs('ahli-jawatankuasa') || request()->routeIs('fasiliti') ? 'true' : 'false' }}
        }">
        <button @click="open = !open" class="flex items-center text-black hover:text-primary hover:font-semibold font-poppins text-sm transition-colors">
          <span class="relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full 
                @if(request()->routeIs('ahli-jawatankuasa') || request()->routeIs('fasiliti')) font-bold @endif"
                :class="{'after:w-full': open || isProfileActive}">
            Profil Kampung
          </span>
          <svg class="w-4 h-4 ml-1 mt-0.5 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
          </svg>
        </button>

        <!-- Dropdown menu -->
        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute bg-white shadow-xl rounded-lg mt-2 w-48 border border-gray-200 z-50">
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
            <li>
              <a href="{{ route('sejarah') }}" class="block px-4 py-3 hover:bg-linear-to-r hover:from-secondary hover:to-primary hover:text-white font-poppins text-sm transition-all rounded-md mx-1">
                Sejarah
              </a>
            </li>
          </ul>
        </div>
      </div>

      <a href="{{ route('aktiviti') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors @if(request()->routeIs('aktiviti')) font-bold after:w-full @endif">
        Aktiviti
      </a>
      <a href="{{ route('budiman-biz-hub') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors @if(request()->routeIs('budiman-biz-hub')) font-bold after:w-full @endif">
        Budiman Biz Hub
      </a>
      <a href="{{ route('hubungi-kami') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors @if(request()->routeIs('hubungi-kami')) font-bold after:w-full @endif">
        Hubungi Kami
      </a>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" @click.away="open = false" class="w-full md:hidden bg-white border-t border-gray-200 mt-2">
      <div class="flex flex-col space-y-2 p-4">
        <a href="{{ route('utama') }}" class="block px-4 py-2 text-black hover:bg-gray-100 rounded-md font-poppins text-sm">
          Utama
        </a>

        <!-- Mobile Dropdown -->
        <div class="relative">
          <button @click="dropdownOpen = !dropdownOpen" class="w-full flex items-center justify-between px-4 py-2 text-black hover:bg-gray-100 rounded-md font-poppins text-sm">
            <span>Profil Kampung</span>
            <svg class="w-4 h-4 transition-transform" :class="{'rotate-180': dropdownOpen}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          
          <div x-show="dropdownOpen" class="bg-gray-50 border-l-4 border-primary">
            <a href="{{ route('ahli-jawatankuasa') }}" class="block px-8 py-2 text-gray-700 hover:bg-gray-100 font-poppins text-sm">
              Ahli Jawatankuasa
            </a>
            <a href="{{ route('fasiliti') }}" class="block px-8 py-2 text-gray-700 hover:bg-gray-100 font-poppins text-sm">
              Fasiliti
            </a>
            <a href="{{ route('sejarah') }}" class="block px-8 py-2 text-gray-700 hover:bg-gray-100 font-poppins text-sm">
              Sejarah
            </a>
          </div>
        </div>

        <a href="{{ route('aktiviti') }}" class="block px-4 py-2 text-black hover:bg-gray-100 rounded-md font-poppins text-sm">
          Aktiviti
        </a>
        <a href="{{ route('budiman-biz-hub') }}" class="block px-4 py-2 text-black hover:bg-gray-100 rounded-md font-poppins text-sm">
          Budiman Biz Hub
        </a>
        <a href="{{ route('hubungi-kami') }}" class="block px-4 py-2 text-black hover:bg-gray-100 rounded-md font-poppins text-sm">
          Hubungi Kami
        </a>
        <a href="{{ config('app.eaduan_url') }}" class="block px-4 py-2 text-black hover:bg-gray-100 rounded-md font-poppins text-sm">
          E-aduan
        </a>
      </div>
    </div>

    <!-- E-aduan Button -->
    <div class="hidden md:block">
      <button onclick="window.location.href='{{ config('app.eaduan_url') }}'"
        class="flex items-center text-white bg-linear-to-r from-primary to-tertiary hover:from-tertiary hover:to-primary font-medium rounded-full text-sm px-5 py-2.5 shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        E-aduan
      </button>
    </div>
  </div>
</nav>