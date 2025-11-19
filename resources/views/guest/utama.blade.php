<x-app-layout :title="'Utama'">
  


    <!-- Hero Section -->
    <section class="relative bg-cover h-[85vh] bg-center bg-no-repeat flex item-center justify-center" style="background-image: url('/images/ilovekgbudiman.jpg');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-12 md:py-16 lg:py-20 flex flex-col lg:flex-row items-center justify-center lg:justify-between gap-8 lg:gap-10 text-white">
            
            <!-- Text Section -->
            <div class="w-full lg:max-w-2xl text-center lg:text-left intersect:motion-preset-slide-right intersect:motion-ease-spring-bouncier">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold leading-tight">
                <span class="text-white">Selamat Datang</span> ke<br />
                <span class="text-white">Kampung Budiman</span>
            </h2>

            <p class="mt-4 sm:mt-6 text-gray-200 leading-relaxed text-sm sm:text-base">
                Sebuah komuniti harmoni yang berteraskan nilai kemanusiaan, gotong-royong, dan semangat kejiranan.
            </p>

            <p class="mt-2 sm:mt-3 text-gray-200 leading-relaxed text-sm sm:text-base">
                Di sini, kami meraikan kehidupan desa yang penuh ketenangan, sambil melangkah ke arah kemajuan bersama.
            </p>

            <!-- CTA Button -->
            <div class="mt-6 sm:mt-8 flex justify-center lg:justify-start">
                <a href="#bulletin"
                class="inline-flex items-center px-5 py-3 text-sm font-medium rounded-lg text-white
                        bg-linear-to-r from-primary to-tertiary
                        hover:opacity-90 transition">
                Ketahui Lebih Lanjut
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 9l-7 7-7-7"></path>
                </svg>
                </a>
            </div>
            </div>

            <!-- Logo Card -->
            <div class="w-full lg:w-auto lg:max-w-sm flex justify-center lg:justify-end intersect:motion-preset-slide-left intersect:motion-ease-spring-bouncier">
                <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 w-full max-w-[280px] sm:max-w-sm">
                    <img src="/images/jpkk ori.png" alt="JPKK Kampung Budiman" class="w-full h-auto" />
                </div>
            </div>

        </div>
    </section>
    

          
    <section id="bulletin" class="py-12 sm:py-16 md:py-20 bg-white intersect:motion-preset-fade intersect:motion-ease-spring-bouncier">
          @if($carouselAnnouncements->isNotEmpty())
            @php $slideCount = $carouselAnnouncements->count(); @endphp
            <div id="bulletin-carousel"
                class="relative max-w-7xl mx-auto px-3 sm:px-4 md:px-6 intersect:motion-preset-slide-up intersect:motion-duration-1200"
                x-data="{
                    active: 0,
                    total: {{ $slideCount }},
                    timer: null,
                    start() { if (this.total <= 1) return; this.stop(); this.timer = setInterval(() => { this.active = (this.active + 1) % this.total; }, 6000); },
                    stop() { if (this.timer) { clearInterval(this.timer); this.timer = null; } },
                    go(index) { this.active = index; this.start(); }
                }"
                x-init="start()"
                @mouseenter="stop()"
                @mouseleave="start()">
              <div class="relative h-auto min-h-[500px] md:h-[600px] overflow-hidden">
                @foreach($carouselAnnouncements as $announcement)
                  <article class="absolute inset-0"
                          x-show="active === {{ $loop->index }}"
                          x-transition:enter="transition ease-out duration-700"
                          x-transition:enter-start="opacity-0 translate-x-[-100%]"
                          x-transition:enter-end="opacity-100 translate-x-0"
                          x-transition:leave="transition ease-in duration-500"
                          x-transition:leave-start="opacity-100 translate-x-0"
                          x-transition:leave-end="opacity-0 translate-x-[100%]"
                          style="display: {{ $loop->first ? 'block' : 'none' }};"
                          role="group"
                          aria-roledescription="slide"
                          aria-label="Buletin {{ $loop->iteration }} daripada {{ $slideCount }}">
                    <div class="flex h-full items-center justify-center px-3 sm:px-4 md:px-8 lg:px-12 py-4 md:py-6">
                      <div class="w-full max-w-7xl mx-auto bg-white rounded-2xl md:rounded-3xl shadow-xl md:shadow-2xl overflow-hidden border border-gray-200/70">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                          <!-- Image Section -->
                          <div class="relative h-48 sm:h-56 md:h-64 lg:h-full lg:min-h-[420px] overflow-hidden">
                            <img src="{{ $announcement['image_url'] }}"
                                alt="{{ $announcement['title'] }}"
                                class="h-full w-full object-cover" />
                          </div>
                          <!-- Content Section -->
                          <div class="p-5 sm:p-6 md:p-8 lg:p-12 space-y-4 sm:space-y-6 md:space-y-8 flex flex-col justify-center">
                            <div class="flex flex-wrap items-center gap-2 sm:gap-3 text-[10px] sm:text-xs uppercase tracking-[0.2em] sm:tracking-[0.35em] text-gray-500">
                              <span class="inline-flex items-center gap-1.5 sm:gap-2">
                                <span class="h-1.5 w-1.5 sm:h-2 sm:w-2 rounded-full bg-primary"></span>
                                Pengumuman
                              </span>
                              <span class="h-px w-6 sm:w-8 bg-gray-300"></span>
                              <span>{{ $announcement['start_date'] ?? 'Tarikh TBA' }}</span>
                            </div>
                            <h3 class="text-xl sm:text-2xl md:text-3xl lg:text-5xl font-black leading-tight text-gray-900">
                              {{ $announcement['title'] }}
                            </h3>
                            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-700 leading-relaxed">
                              {{ $announcement['summary'] }}
                            </p>
                            <div class="flex flex-col sm:flex-row sm:flex-wrap items-stretch sm:items-center gap-3 sm:gap-4 pt-2">
                              <a href="{{ route('aktiviti') }}"
                                class="inline-flex items-center justify-center gap-2 rounded-full bg-linear-to-r from-primary to-tertiary px-5 sm:px-6 py-2.5 sm:py-3 text-sm sm:text-base font-semibold text-white shadow-lg shadow-primary/20 transition hover:opacity-90">
                                Lihat Aktiviti
                                <svg class="h-4 w-4 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5-5 5M6 12h12"/>
                                </svg>
                              </a>
                              <div class="flex items-center gap-2 sm:gap-3 text-xs sm:text-sm md:text-base text-gray-600">
                                <span class="flex items-center gap-1.5 sm:gap-2">
                                  <svg class="h-4 w-4 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6 1A9 9 0 1 1 3 12a9 9 0 0 1 18 0z"/>
                                  </svg>
                                  <span class="hidden sm:inline">Kemaskini Terkini</span>
                                  <span class="sm:hidden">Terkini</span>
                                </span>
                                <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                                <span class="text-xs sm:text-sm md:text-base">Kampung Budiman</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </article>
                @endforeach
              </div>
              
              <!-- Dots -->
              <div class="mt-4 flex items-center justify-center gap-x-1 gap-y-0.5">
                @foreach($carouselAnnouncements as $index => $announcement)
                  <button type="button"
                          class="flex h-5 w-7 items-center justify-center cursor-pointer hover:opacity-80 transition-opacity"
                          :class="{ 'pointer-events-none opacity-50': total <= 1 }"
                          aria-label="Ke slide {{ $index + 1 }}"
                          @click="go({{ $index }})">
                    <span class="sr-only">Slide {{ $index + 1 }}</span>
                    <span class="h-1.5 rounded-full transition-all duration-300"
                          :class="active === {{ $index }}
                            ? 'w-7 bg-primary shadow-md'
                            : 'w-2.5 bg-gray-300'"></span>
                  </button>
                @endforeach
              </div>
            </div>
          @else
            <div class="mx-auto max-w-4xl px-6 py-16 text-center">
              <p class="text-lg text-gray-600">Tiada buletin untuk dipaparkan buat masa ini. Sila kembali semula.</p>
            </div>
          @endif
    </section>
        
    <!-- 360 Video Section -->
    <section id="video-360" class="py-20 bg-gray-50 scroll-mt-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12 intersect:motion-preset-fade intersect:motion-ease-spring-bouncier">
                <h2 class="text-4xl md:text-5xl font-extrabold text-primary mb-4">
                    Pandangan 360° Kampung Budiman
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Terokai keindahan dan keunikan Kampung Budiman melalui pengalaman video 360 darjah yang membawa anda merasai suasana sebenar kampung kami.
                </p>
            </div>

            <div class="max-w-5xl mx-auto intersect:motion-preset-slide-right intersect:motion-ease-spring-bouncier">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-black" style="padding-bottom: 56.25%;">
                    <iframe 
                        class="absolute top-0 left-0 w-full h-full"
                        src="https://www.youtube.com/embed/tgBeeSlEj60" 
                        title="Video 360 Kampung Budiman" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        referrerpolicy="strict-origin-when-cross-origin" 
                        allowfullscreen>
                    </iframe>
                </div>
                <p class="text-center text-sm text-gray-500 mt-4">
                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                    Tarik layar video untuk melihat pandangan 360° atau gunakan kawalan untuk navigasi
                </p>
            </div>
        </div>
    </section>

    <!-- Pengenalan -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <!-- Left Content -->
            <div class="intersect:motion-preset-slide-right intersect:motion-ease-spring-bouncier">
            <h2 class="text-5xl font-extrabold text-primary mb-6">PENGENALAN</h2>

            <p class="text-gray-700 leading-relaxed mb-4">
                Kampung Budiman telah dibuka pada awal tahun <span class="font-semibold text-primary">1930–an</span> 
                oleh Ketua Kampung Meru iaitu <span class="font-semibold text-primary">Tuan Haji Mohd. Sharif.</span>
            </p>

            <p class="text-gray-700 leading-relaxed mb-4">
                Kampung ini asalnya berada di bawah pentadbiran Kampung Meru, Klang. 
                Diperingkat awal iaitu sekitar tahun <span class="font-semibold text-primary">1950–an</span>, 
                kampung ini dikenali sebagai <span class="font-semibold text-primary">Kampung Jalan Paip.</span>
            </p>

            <p class="text-gray-700 leading-relaxed mb-8">
                Ini kerana kampung ini dibuka bagi pembinaan laluan paip dari kolam air Tasik Subang ke Sungai Kuning.
            </p>

            <!-- Highlight Cards -->
            <div class="flex flex-wrap gap-4">
                <div class="flex items-center bg-primary/10 rounded-lg px-5 py-4 w-full sm:w-auto">
                <div class="flex items-center justify-center w-10 h-10 bg-primary text-white rounded-full mr-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6 1A9 9 0 1 1 3 12a9 9 0 0 1 18 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-primary">Sejarah Panjang</p>
                    <p class="text-sm text-gray-600">Lebih 90 tahun warisan</p>
                </div>
                </div>

                <div class="flex items-center bg-tertiary/10 rounded-lg px-5 py-4 w-full sm:w-auto">
                <div class="flex items-center justify-center w-10 h-10 bg-tertiary text-white rounded-full mr-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5V4H2v16h5m10-4H7m0 0v4m10-4v4"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-tertiary">Komuniti Erat</p>
                    <p class="text-sm text-gray-600">Penduduk yang mesra</p>
                </div>
                </div>
            </div>
            </div>

            <!-- Right Image Grid -->
            <div class="grid grid-cols-2 gap-4 intersect:motion-preset-slide-left intersect:motion-ease-spring-bouncier">
            <img src="/images/pengenalan-1.jpeg" alt="Kampung image 1" class="rounded-xl shadow-md object-cover w-full h-48 md:h-56" />
            <img src="/images/pengenalan-2.jpeg" alt="Kampung image 2" class="rounded-xl shadow-md object-cover w-full h-48 md:h-56" />
            <img src="/images/pengenalan-3.jpeg" alt="Kampung image 3" class="rounded-xl shadow-md object-cover w-full h-48 md:h-56" />
            <img src="/images/pengenalan-4.jpeg" alt="Kampung image 4" class="rounded-xl shadow-md object-cover w-full h-48 md:h-56" />
            </div>

        </div>
    </section>

    <!-- Lokasi & waktu berurusan -->
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12">

    <!-- Lokasi Kami -->
    <div class="intersect:motion-preset-slide-right intersect:motion-ease-spring-bouncier"
    >
      <h2 class="text-3xl font-extrabold text-primary mb-6 flex justify-center lg:text-left">
        LOKASI KAMI
      </h2>

      <!-- Google Map Embed -->
      <div class="rounded-xl overflow-hidden shadow-md mb-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10698.680270931465!2d101.43591849797903!3d3.13258967553216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc5149376026ef%3A0x369c8154c815153!2sMeru%2C%2041050%20Klang%2C%20Selangor!5e0!3m2!1sen!2smy!4v1762413636633!5m2!1sen!2smy" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <!-- Address Box -->
      <div class="bg-white shadow-sm rounded-xl p-5 flex items-start">
        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#6B3A25] text-white mr-4">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3zm0 0c-4.418 0-8 3.582-8 8v1h16v-1c0-4.418-3.582-8-8-8z" />
          </svg>
        </div>
        <div>
          <p class="font-semibold text-primary">Alamat</p>
          <p class="text-gray-600 text-sm">
            Lot 4470 /2, Jalan Haji Jalal, Jalan Paip, Kampung Budiman,<br />
            Meru, 41050 Klang, Selangor
          </p>
        </div>
      </div>
    </div>

    <!-- Waktu Berurusan -->
    <div class="intersect:motion-preset-slide-left intersect:motion-ease-spring-bouncier">
      <h2 class="text-3xl font-extrabold text-primary mb-6 flex justify-center lg:text-left">
        WAKTU BERURUSAN
      </h2>

      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Table Header -->
        <div class="bg-linear-to-r from-[#6B3A25] to-[#6B3A29] text-white text-sm font-semibold uppercase grid grid-cols-2 px-6 py-3">
          <div>Hari</div>
          <div>Masa</div>
        </div>

        <!-- Table Body -->
        <div class="divide-y divide-gray-200 text-sm">
          <div class="grid grid-cols-2 px-6 py-3 items-center">
            <div class="flex items-center gap-2">
              <span>Isnin</span>
            </div>
            <div class="text-gray-700">8:00am hingga 9:00pm</div>
          </div>
          <div class="grid grid-cols-2 px-6 py-3 items-center">
            <div class="flex items-center gap-2">
              <span>Selasa</span>
            </div>
            <div class="text-gray-700">8:00am hingga 9:00pm</div>
          </div>
          <div class="grid grid-cols-2 px-6 py-3 items-center">
            <div class="flex items-center gap-2">
              <span>Rabu</span>
            </div>
            <div class="text-gray-700">8:00am hingga 9:00pm</div>
          </div>
          <div class="grid grid-cols-2 px-6 py-3 items-center">
            <div class="flex items-center gap-2">
              <span>Khamis</span>
            </div>
            <div class="text-gray-700">8:00am hingga 9:00pm</div>
          </div>
          <div class="grid grid-cols-2 px-6 py-3 items-center">
            <div class="flex items-center gap-2">
              <span>Jumaat</span>
            </div>
            <div class="text-gray-700">8:00am hingga 9:00pm</div>
          </div>
          <div class="grid grid-cols-2 px-6 py-3 items-center">
            <div class="flex items-center gap-2">
              <span>Sabtu</span>
            </div>
            <div class="text-gray-500 italic">Cuti</div>
          </div>
          <div class="grid grid-cols-2 px-6 py-3 items-center">
            <div class="flex items-center gap-2">
              <span>Ahad</span>
            </div>
            <div class="text-gray-500 italic">Cuti</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</x-app-layout>