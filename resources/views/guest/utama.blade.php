<x-app-layout :title="'Utama'">
<section id="bulletin" class="w-full bg-gradient-to-r from-primary/5 to-tertiary/5 py-8 relative overflow-hidden">
      @if($carouselAnnouncements->isNotEmpty())
        <!-- Flowbite Slider -->
        <div id="bulletin-carousel" class="relative w-full" data-carousel="slide">
          <div class="relative h-56 overflow-hidden rounded-none md:h-96">
            <div class="slides flex transition-transform duration-500 ease-in-out">
              @foreach($carouselAnnouncements as $announcement)
                <div class="hidden duration-700 ease-in-out slide block flex-none w-full relative h-56 md:h-96" data-carousel-item>
                  <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $announcement['image_url'] }}');"></div>
                  <div class="absolute inset-0 bg-black/50 flex items-center justify-center px-6">
                    <div class="max-w-4xl text-center text-white space-y-3">
                      <a href="{{ route('aktiviti') }}" class="inline-block text-xs uppercase tracking-[0.4em] text-white/70 hover:text-white transition">{{ $announcement['start_date'] ?? 'Tarikh TBA' }}</a>
                      <h3 class="text-2xl md:text-4xl font-extrabold">
                        <a href="{{ route('aktiviti') }}"
                           class="transition hover:text-tertiary focus-visible:text-tertiary [-webkit-text-stroke:0] [text-stroke:0] hover:[-webkit-text-stroke:1px_rgba(255,255,255,0.9)] hover:[text-stroke:1px_rgba(255,255,255,0.9)]"
                           style="text-shadow: 0 2px 8px rgba(0,0,0,0.35);">
                          {{ $announcement['title'] }}
                        </a>
                      </h3>
                      <p class="text-sm md:text-base text-gray-100/90">
                        <a href="{{ route('aktiviti') }}" class="hover:text-white/90 transition">{{ $announcement['summary'] }}</a>
                      </p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          <!-- Dots -->
          <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
            @foreach($carouselAnnouncements as $index => $announcement)
              <button type="button" class="bullet w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white/80' : 'bg-white/40' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
            @endforeach
          </div>

          <!-- Controls -->
          <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
              <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/></svg>
              <span class="sr-only">Previous</span>
            </span>
          </button>
          <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white">
              <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
              <span class="sr-only">Next</span>
            </span>
          </button>
        </div>

        <!-- Carousel script -->
        <script>
          (function () {
            const root = document.getElementById('bulletin');
            if (!root) return;
            const slidesEl = root.querySelectorAll('.slide');
            const slider = root.querySelector('.slides');
            const bullets = Array.from(root.querySelectorAll('.bullet'));
            const total = slidesEl.length;
            if (!total) return;
            let index = 0;
            let intervalId = null;

            // set widths so translate percent is calculated correctly
            slider.style.width = (total * 100) + '%';
            slidesEl.forEach(s => s.style.width = (100 / total) + '%');

            function goTo(i) {
              index = ((i % total) + total) % total;
              const step = 100 / total;
              slider.style.transform = 'translateX(-' + (index * step) + '%)';
              bullets.forEach((b, idx) => b.classList.toggle('bg-white/80', idx === index));
              bullets.forEach((b, idx) => b.classList.toggle('bg-white/40', idx !== index));
            }

            function start() {
              stop();
              intervalId = setInterval(() => goTo(index + 1), 4000);
            }
            function stop() {
              if (intervalId) { clearInterval(intervalId); intervalId = null; }
            }

            // bullets click
            bullets.forEach(b => b.addEventListener('click', () => {
              goTo(Number(b.dataset.index));
              start();
            }));

            // pause on hover/focus
            root.addEventListener('mouseenter', stop);
            root.addEventListener('mouseleave', start);
            root.addEventListener('focusin', stop);
            root.addEventListener('focusout', start);

            // init
            goTo(0);
            start();
          }());
        </script>
      @else
        <div class="max-w-5xl mx-auto text-center py-12">
          <p class="text-lg text-gray-600">Tiada buletin untuk dipaparkan buat masa ini. Sila kembali semula.</p>
        </div>
      @endif
    </section>

    <!-- Hero Section -->
    <section class="relative bg-cover h-screen bg-center bg-no-repeat flex item-center justify-center" style="background-image: url('/images/ilovekgbudiman.jpg');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/60"></div>

        <div class="relative max-w-7xl mx-auto px-6 py-24 flex flex-col lg:flex-row items-center justify-between gap-10 text-white">
            
            <!-- Text Section -->
            <div class="max-w-2xl intersect:motion-preset-slide-right intersect:motion-ease-spring-bouncier">
            <h2 class="text-4xl md:text-5xl font-bold leading-tight">
                <span class="text-white">Selamat Datang</span> ke<br />
                <span class="text-white">Kampung Budiman</span>
            </h2>

            <p class="mt-6 text-gray-200 leading-relaxed">
                Sebuah komuniti harmoni yang berteraskan nilai kemanusian, gotong-royong, dan semangat kejiranan.
            </p>

            <p class="mt-3 text-gray-200 leading-relaxed">
                Di sini, kami meraikan kehidupan desa yang penuh ketenangan, sambil melangkah ke arah kemajuan bersama.
            </p>

            <!-- CTA Button -->
            <div class="mt-8">
                <a href="#video-360"
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
            <div class="bg-white rounded-2xl shadow-lg p-6 lg:p-8 w-full max-w-sm intersect:motion-preset-slide-left intersect:motion-ease-spring-bouncier">
            <img src="/images/jpkk ori.png" alt="JPKK Kampung Budiman" class="w-full h-auto" />
            </div>

        </div>
    </section>
    

        </div>
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

            <div class="max-w-5xl mx-auto intersect:motion-preset-fade intersect:motion-ease-spring-bouncier">
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