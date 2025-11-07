<nav class="bg-linear-to-r from-white to-gray-50 shadow-lg border-b border-gray-200 px-6 py-4" x-data="{ open: false }">
  <div class="flex flex-wrap items-center justify-between mx-auto max-w-7xl">
    <!-- Logo -->
    <a href="{{ route('admin.utama') }}" class="flex items-center space-x-2 transition-transform hover:scale-105">
      <img src="/images/jpkk.png" class="h-10 drop-shadow-sm" alt="Kampung Budiman Logo" />
    </a>

    <!-- Navbar links -->
    <div class="hidden md:flex items-center space-x-8 font-medium">
      <a href="{{ route('admin.utama') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors @if(request()->routeIs('admin.utama')) font-bold after:w-full @endif">Utama</a>
      <a href="{{ route('admin.ajk.index') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors @if(request()->routeIs(['admin.ajk.*', 'admin.fasiliti.*'])) font-bold after:w-full @endif">Pengurusan Kampung</a>
      <a href="{{ route('admin.aktiviti.index') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors @if(request()->routeIs(['admin.aktiviti.*', 'admin.pengunguman.*'])) font-bold after:w-full @endif">Aktiviti Kampung</a>
      <a href="{{ route('admin.bizhub.index') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors @if(request()->routeIs('admin.bizhub.*')) font-bold after:w-full @endif">Budiman Biz Hub</a>
      <a href="{{ route('admin.waktu-berurusan.index') }}" class="text-black hover:text-primary hover:font-semibold relative after:content-[''] after:block after:w-0 after:h-1 after:bg-primary after:transition-all after:duration-300 hover:after:w-full font-poppins text-sm transition-colors @if(request()->routeIs(['admin.akses-admin.*', 'admin.waktu-berurusan.*', 'admin.info-kampung.*'])) font-bold after:w-full @endif">Tetapan Laman</a>
    </div>

    <!-- Profil Button -->
      <a href="{{ route('admin.profil.edit')}}" class="inline-flex items-center text-white bg-linear-to-r from-primary to-tertiary hover:from-tertiary hover:to-primary font-medium rounded-full text-sm px-5 py-2.5 shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        Admin
      </a>     
  </div>
</nav>
