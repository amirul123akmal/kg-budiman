<x-app-layout :title="'Sejarah Kampung'">
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image Container -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/kampung.png') }}"
                 alt="Latar Kampung"
                 class="w-full h-full object-cover scale-105 transition-transform duration-[20s] ease-out">
            <!-- Enhanced gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/50"></div>
            <!-- Animated gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-primary/20 via-transparent to-tertiary/20 animate-pulse"></div>
        </div>

        <!-- Content Container (Centered and Responsive) -->
        <div class="relative z-10 text-center text-white p-6 max-w-6xl mx-auto">
            <div class="intersect:motion-preset-fade intersect:motion-ease-spring-bouncier">
                <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-black mb-6 leading-tight">
                    <span class="block">Sejarah</span>
                    <span class="block text-white">
                        Kampung Budiman
                    </span>
                </h1>

                <p class="text-lg md:text-xl lg:text-2xl font-light mb-12 max-w-3xl mx-auto px-4 leading-relaxed">
                    Berkhidmat untuk kemajuan dan kesejahteraan komuniti — merakam perjalanan, cerita dan usaha bersama.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="#timeline" 
                       class="group inline-flex items-center gap-3 bg-linear-to-r from-primary to-tertiary hover:from-tertiary hover:to-primary text-white px-8 py-4 rounded-full text-base font-semibold shadow-2xl shadow-primary/30 transition-all duration-300 transform hover:scale-105 hover:shadow-primary/50">
                        <span>Lihat Garis Masa</span>
                        <svg class="w-5 h-5 transform group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
    </section>

    <!-- Timeline Section -->
    <section id="timeline" class="relative py-20 bg-gradient-to-b from-gray-50 via-white to-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16 intersect:motion-preset-fade">
                <h2 class="text-4xl md:text-5xl font-black text-primary mb-4">
                    Garis Masa Sejarah
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Perjalanan panjang komuniti kami dari masa ke masa
                </p>
            </div>

            <!-- Timeline Container -->
            <div class="relative">
                <!-- Modern Timeline Line with gradient -->
                <div class="hidden md:block absolute inset-y-0 left-1/2 -translate-x-1/2 w-1 rounded-full bg-gradient-to-b from-primary via-tertiary to-primary shadow-2xl shadow-primary/20" aria-hidden="true">
                    <div class="absolute inset-0 bg-gradient-to-b from-primary/50 via-tertiary/50 to-primary/50 animate-pulse"></div>
                </div>
                <!-- Glow effect around timeline -->
                <div class="hidden md:block absolute inset-y-0 left-1/2 -translate-x-1/2 w-3 rounded-full bg-gradient-to-b from-primary/20 via-tertiary/20 to-primary/20 blur-sm" aria-hidden="true"></div>

            <ul role="list" class="space-y-12 md:space-y-16 relative">
                <!-- c. pre-1800 -->
                <li class="timeline-item md:grid md:grid-cols-2 md:items-center" data-year="1700" data-category="early">
                    <article class="group relative md:pr-12 md:pl-0 md:col-start-1 md:col-end-2 flex md:justify-end intersect:motion-preset-slide-right">
                        <div class="md:max-w-[540px] w-full">
                            <div class="relative">
                                <div class="relative p-6 md:p-8 rounded-3xl bg-white border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group-hover:border-primary/30 overflow-hidden">
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-400 via-emerald-500 to-emerald-600"></div>
                                    <div class="flex flex-col md:flex-row items-start gap-5">
                                        <div class="shrink-0">
                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex flex-col items-center justify-center text-white font-black shadow-lg shadow-emerald-500/30 transform group-hover:scale-110 transition-transform duration-300">
                                                <span class="text-xs leading-tight">c.</span>
                                                <span class="text-2xl leading-tight">1700</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl md:text-2xl font-bold leading-tight text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                                Permulaan penempatan tebing sungai & akar kampung Melayu
                                            </h3>
                                            <p class="text-base text-gray-600 leading-relaxed mb-4">
                                                Catatan masyarakat dan kajian wilayah menunjukkan penempatan di tebing sungai Klang sebelum rekod kolonial formal. Kampung kecil bergantung kepada sumber banjaran sungai, memancing dan pertanian musiman.
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold border border-emerald-200">sejarah lisan</span>
                                                <span class="px-3 py-1.5 rounded-full bg-sky-50 text-sky-700 text-xs font-semibold border border-sky-200">kehidupan sungai</span>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                <span class="text-xs text-gray-500 font-medium">Akaun komuniti • Dataran banjir</span>
                                                <button class="text-xs px-4 py-2 rounded-full bg-gradient-to-r from-primary to-tertiary text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="hidden md:block absolute right-[-24px] top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white border-4 border-primary shadow-xl shadow-primary/30 z-10">
                                    <span class="block w-3 h-3 bg-primary rounded-full m-auto mt-0.5"></span>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>

                <!-- 19th century -->
                <li class="timeline-item md:grid md:grid-cols-2 md:items-center" data-year="1850" data-category="colonial">
                    <article class="group relative md:pl-12 md:col-start-2 md:col-end-3 flex intersect:motion-preset-slide-left">
                        <div class="md:max-w-[540px] w-full">
                            <div class="relative">
                                <div class="relative p-6 md:p-8 rounded-3xl bg-white border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group-hover:border-primary/30 overflow-hidden">
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-400 via-indigo-500 to-indigo-600"></div>
                                    <div class="flex flex-col md:flex-row items-start gap-5">
                                        <div class="shrink-0">
                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-indigo-400 to-indigo-600 flex flex-col items-center justify-center text-white font-black shadow-lg shadow-indigo-500/30 transform group-hover:scale-110 transition-transform duration-300">
                                                <span class="text-xs leading-tight">c.</span>
                                                <span class="text-2xl leading-tight">1850</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl md:text-2xl font-bold leading-tight text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                                Perdagangan maritim & pengaruh kolonial
                                            </h3>
                                            <p class="text-base text-gray-600 leading-relaxed mb-4">
                                                Pembangunan pelabuhan dan trafik sungai membawa pengaruh: pedagang ke pasar kampung, perubahan guna tanah bagi ladang dan kegiatan perlombongan yang berkembang di rantau ini.
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1.5 rounded-full bg-indigo-50 text-indigo-700 text-xs font-semibold border border-indigo-200">perdagangan</span>
                                                <span class="px-3 py-1.5 rounded-full bg-amber-50 text-amber-700 text-xs font-semibold border border-amber-200">ladang</span>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                <span class="text-xs text-gray-500 font-medium">Rekod wilayah • Ingatan lisan</span>
                                                <button class="text-xs px-4 py-2 rounded-full bg-gradient-to-r from-primary to-tertiary text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="hidden md:block absolute left-[-24px] top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white border-4 border-primary shadow-xl shadow-primary/30 z-10">
                                    <span class="block w-3 h-3 bg-primary rounded-full m-auto mt-0.5"></span>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>

                <!-- early 20th century -->
                <li class="timeline-item md:grid md:grid-cols-2 md:items-center" data-year="1900" data-category="colonial">
                    <article class="group relative md:pr-12 md:pl-0 md:col-start-1 md:col-end-2 flex md:justify-end intersect:motion-preset-slide-right">
                        <div class="md:max-w-[540px] w-full">
                            <div class="relative">
                                <div class="relative p-6 md:p-8 rounded-3xl bg-white border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group-hover:border-primary/30 overflow-hidden">
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600"></div>
                                    <div class="flex flex-col md:flex-row items-start gap-5">
                                        <div class="shrink-0">
                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-600 flex flex-col items-center justify-center text-white font-black shadow-lg shadow-amber-500/30 transform group-hover:scale-110 transition-transform duration-300">
                                                <span class="text-2xl leading-tight">1900s</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl md:text-2xl font-bold leading-tight text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                                Pekerjaan ladang & industri kecil
                                            </h3>
                                            <p class="text-base text-gray-600 leading-relaxed mb-4">
                                                Pertumbuhan industri getah dan bijih timah menyebabkan penduduk kampung bekerja di ladang, dermaga tebing sungai atau berniaga kecil — membina jaringan keluarga dan corak penempatan.
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1.5 rounded-full bg-amber-50 text-amber-700 text-xs font-semibold border border-amber-200">getah</span>
                                                <span class="px-3 py-1.5 rounded-full bg-gray-50 text-gray-700 text-xs font-semibold border border-gray-200">timah</span>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                <span class="text-xs text-gray-500 font-medium">Rekod arkib • Rekod keluarga</span>
                                                <button class="text-xs px-4 py-2 rounded-full bg-gradient-to-r from-primary to-tertiary text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="hidden md:block absolute right-[-24px] top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white border-4 border-primary shadow-xl shadow-primary/30 z-10">
                                    <span class="block w-3 h-3 bg-primary rounded-full m-auto mt-0.5"></span>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>

                <!-- WWII -->
                <li class="timeline-item md:grid md:grid-cols-2 md:items-center" data-year="1942" data-category="war">
                    <article class="group relative md:pl-12 md:col-start-2 md:col-end-3 flex intersect:motion-preset-slide-left">
                        <div class="md:max-w-[540px] w-full">
                            <div class="relative">
                                <div class="relative p-6 md:p-8 rounded-3xl bg-white border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group-hover:border-primary/30 overflow-hidden">
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-rose-400 via-rose-500 to-rose-600"></div>
                                    <div class="flex flex-col md:flex-row items-start gap-5">
                                        <div class="shrink-0">
                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-rose-400 to-rose-600 flex flex-col items-center justify-center text-white font-black shadow-lg shadow-rose-500/30 transform group-hover:scale-110 transition-transform duration-300">
                                                <span class="text-2xl leading-tight">1942</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl md:text-2xl font-bold leading-tight text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                                Zaman perang & perpindahan komuniti
                                            </h3>
                                            <p class="text-base text-gray-600 leading-relaxed mb-4">
                                                Kesaksian penduduk mengingat gangguan semasa pendudukan Jepun: kekurangan, pemindahan sementara dan usaha bertahan di sepanjang sungai. Pemulihan selepas perang menguatkan ikatan sosial.
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1.5 rounded-full bg-rose-50 text-rose-700 text-xs font-semibold border border-rose-200">pendudukan</span>
                                                <span class="px-3 py-1.5 rounded-full bg-gray-50 text-gray-700 text-xs font-semibold border border-gray-200">pemulihan</span>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                <span class="text-xs text-gray-500 font-medium">Sejarah lisan • Konteks rantau</span>
                                                <button class="text-xs px-4 py-2 rounded-full bg-gradient-to-r from-primary to-tertiary text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="hidden md:block absolute left-[-24px] top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white border-4 border-primary shadow-xl shadow-primary/30 z-10">
                                    <span class="block w-3 h-3 bg-primary rounded-full m-auto mt-0.5"></span>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>

                <!-- 1950s-1970s growth -->
                <li class="timeline-item md:grid md:grid-cols-2 md:items-center" data-year="1960" data-category="growth">
                    <article class="group relative md:pr-12 md:pl-0 md:col-start-1 md:col-end-2 flex md:justify-end intersect:motion-preset-slide-right">
                        <div class="md:max-w-[540px] w-full">
                            <div class="relative">
                                <div class="relative p-6 md:p-8 rounded-3xl bg-white border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group-hover:border-primary/30 overflow-hidden">
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600"></div>
                                    <div class="flex flex-col md:flex-row items-start gap-5">
                                        <div class="shrink-0">
                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-sky-400 to-sky-600 flex flex-col items-center justify-center text-white font-black shadow-lg shadow-sky-500/30 transform group-hover:scale-110 transition-transform duration-300">
                                                <span class="text-2xl leading-tight">1960s</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl md:text-2xl font-bold leading-tight text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                                Pembinaan semula & migrasi
                                            </h3>
                                            <p class="text-base text-gray-600 leading-relaxed mb-4">
                                                Faktor ekonomi dan tarikan bandar membawa penduduk baru. Perumahan kecil bertambah, institusi komuniti seperti masjid, kedai dan sekolah tidak formal berkembang.
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1.5 rounded-full bg-sky-50 text-sky-700 text-xs font-semibold border border-sky-200">urbanisasi</span>
                                                <span class="px-3 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold border border-emerald-200">kehidupan komuniti</span>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                <span class="text-xs text-gray-500 font-medium">Rekod tempatan • Temu bual penduduk</span>
                                                <button class="text-xs px-4 py-2 rounded-full bg-gradient-to-r from-primary to-tertiary text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="hidden md:block absolute right-[-24px] top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white border-4 border-primary shadow-xl shadow-primary/30 z-10">
                                    <span class="block w-3 h-3 bg-primary rounded-full m-auto mt-0.5"></span>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>

                <!-- 1998 village formalised -->
                <li class="timeline-item md:grid md:grid-cols-2 md:items-center" data-year="1998" data-category="community">
                    <article class="group relative md:pl-12 md:col-start-2 md:col-end-3 flex intersect:motion-preset-slide-left">
                        <div class="md:max-w-[540px] w-full">
                            <div class="relative">
                                <div class="relative p-6 md:p-8 rounded-3xl bg-white border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group-hover:border-primary/30 overflow-hidden">
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-400 via-indigo-500 to-indigo-600"></div>
                                    <div class="flex flex-col md:flex-row items-start gap-5">
                                        <div class="shrink-0">
                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-indigo-400 to-indigo-600 flex flex-col items-center justify-center text-white font-black shadow-lg shadow-indigo-500/30 transform group-hover:scale-110 transition-transform duration-300">
                                                <span class="text-2xl leading-tight">1998</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl md:text-2xl font-bold leading-tight text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                                Pengiktirafan rasmi & naik taraf asas
                                            </h3>
                                            <p class="text-base text-gray-600 leading-relaxed mb-4">
                                                Perkampungan menerima pengiktirafan rasmi dan beberapa peningkatan infrastruktur — jalan akses, lampu jalan dan kutipan sampah yang lebih teratur, yang mengukuhkan kediaman jangka panjang.
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1.5 rounded-full bg-indigo-50 text-indigo-700 text-xs font-semibold border border-indigo-200">tadbir urus</span>
                                                <span class="px-3 py-1.5 rounded-full bg-amber-50 text-amber-700 text-xs font-semibold border border-amber-200">infrastruktur</span>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                <span class="text-xs text-gray-500 font-medium">Rekod jawatankuasa • Ingatan penduduk</span>
                                                <button class="text-xs px-4 py-2 rounded-full bg-gradient-to-r from-primary to-tertiary text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="hidden md:block absolute left-[-24px] top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white border-4 border-primary shadow-xl shadow-primary/30 z-10">
                                    <span class="block w-3 h-3 bg-primary rounded-full m-auto mt-0.5"></span>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>

                <!-- 2005 festival -->
                <li class="timeline-item md:grid md:grid-cols-2 md:items-center" data-year="2005" data-category="community">
                    <article class="group relative md:pr-12 md:pl-0 md:col-start-1 md:col-end-2 flex md:justify-end intersect:motion-preset-slide-right">
                        <div class="md:max-w-[540px] w-full">
                            <div class="relative">
                                <div class="relative p-6 md:p-8 rounded-3xl bg-white border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group-hover:border-primary/30 overflow-hidden">
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-400 via-emerald-500 to-emerald-600"></div>
                                    <div class="flex flex-col md:flex-row items-start gap-5">
                                        <div class="shrink-0">
                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex flex-col items-center justify-center text-white font-black shadow-lg shadow-emerald-500/30 transform group-hover:scale-110 transition-transform duration-300">
                                                <span class="text-2xl leading-tight">2005</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl md:text-2xl font-bold leading-tight text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                                Hari Budiman: festival komuniti bermula
                                            </h3>
                                            <p class="text-base text-gray-600 leading-relaxed mb-4">
                                                Dari sambutan kecil, Hari Budiman berkembang menjadi acara tahunan dengan makanan, persembahan dan gerai kraftangan — mengeratkan jaringan sosial dan ekonomi tempatan.
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold border border-emerald-200">budaya</span>
                                                <span class="px-3 py-1.5 rounded-full bg-gray-50 text-gray-700 text-xs font-semibold border border-gray-200">ekonomi komuniti</span>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                <span class="text-xs text-gray-500 font-medium">Nota penganjur • Akaun penduduk</span>
                                                <button class="text-xs px-4 py-2 rounded-full bg-gradient-to-r from-primary to-tertiary text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="hidden md:block absolute right-[-24px] top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white border-4 border-primary shadow-xl shadow-primary/30 z-10">
                                    <span class="block w-3 h-3 bg-primary rounded-full m-auto mt-0.5"></span>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>

                <!-- 2012 green corridor -->
                <li class="timeline-item md:grid md:grid-cols-2 md:items-center" data-year="2012" data-category="environment">
                    <article class="group relative md:pl-12 md:col-start-2 md:col-end-3 flex intersect:motion-preset-slide-left">
                        <div class="md:max-w-[540px] w-full">
                            <div class="relative">
                                <div class="relative p-6 md:p-8 rounded-3xl bg-white border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group-hover:border-primary/30 overflow-hidden">
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-400 via-emerald-500 to-emerald-600"></div>
                                    <div class="flex flex-col md:flex-row items-start gap-5">
                                        <div class="shrink-0">
                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex flex-col items-center justify-center text-white font-black shadow-lg shadow-emerald-500/30 transform group-hover:scale-110 transition-transform duration-300">
                                                <span class="text-2xl leading-tight">2012</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl md:text-2xl font-bold leading-tight text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                                Taman komuniti & koridor hijau
                                            </h3>
                                            <p class="text-base text-gray-600 leading-relaxed mb-4">
                                                Lot terbiar diubah menjadi kebun komuniti dan jalan selamat yang teduh. Inisiatif meningkat kualiti hidup, keselamatan makanan dan aktiviti antara generasi.
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold border border-emerald-200">penghijauan bandar</span>
                                                <span class="px-3 py-1.5 rounded-full bg-gray-50 text-gray-700 text-xs font-semibold border border-gray-200">sukarelawan</span>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                <span class="text-xs text-gray-500 font-medium">Nota projek • Laporan sukarelawan</span>
                                                <button class="text-xs px-4 py-2 rounded-full bg-gradient-to-r from-primary to-tertiary text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="hidden md:block absolute left-[-24px] top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white border-4 border-primary shadow-xl shadow-primary/30 z-10">
                                    <span class="block w-3 h-3 bg-primary rounded-full m-auto mt-0.5"></span>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>

                <!-- 2019 digital hub -->
                <li class="timeline-item md:grid md:grid-cols-2 md:items-center" data-year="2019" data-category="community">
                    <article class="group relative md:pr-12 md:pl-0 md:col-start-1 md:col-end-2 flex md:justify-end intersect:motion-preset-slide-right">
                        <div class="md:max-w-[540px] w-full">
                            <div class="relative">
                                <div class="relative p-6 md:p-8 rounded-3xl bg-white border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group-hover:border-primary/30 overflow-hidden">
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sky-400 via-sky-500 to-sky-600"></div>
                                    <div class="flex flex-col md:flex-row items-start gap-5">
                                        <div class="shrink-0">
                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-sky-400 to-sky-600 flex flex-col items-center justify-center text-white font-black shadow-lg shadow-sky-500/30 transform group-hover:scale-110 transition-transform duration-300">
                                                <span class="text-2xl leading-tight">2019</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl md:text-2xl font-bold leading-tight text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                                Pusat literasi digital & program belia
                                            </h3>
                                            <p class="text-base text-gray-600 leading-relaxed mb-4">
                                                Dewan komuniti diperbaharui menawarkan kelas kod, kemahiran digital asas dan bengkel reka bentuk — mengurangkan jurang digital bagi golongan muda dan usahawan mikro.
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1.5 rounded-full bg-sky-50 text-sky-700 text-xs font-semibold border border-sky-200">pendidikan</span>
                                                <span class="px-3 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold border border-emerald-200">belia</span>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                <span class="text-xs text-gray-500 font-medium">Log program • Kisah peserta</span>
                                                <button class="text-xs px-4 py-2 rounded-full bg-gradient-to-r from-primary to-tertiary text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="hidden md:block absolute right-[-24px] top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white border-4 border-primary shadow-xl shadow-primary/30 z-10">
                                    <span class="block w-3 h-3 bg-primary rounded-full m-auto mt-0.5"></span>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>

                <!-- 2022 river restoration -->
                <li class="timeline-item md:grid md:grid-cols-2 md:items-center" data-year="2022" data-category="environment">
                    <article class="group relative md:pl-12 md:col-start-2 md:col-end-3 flex intersect:motion-preset-slide-left">
                        <div class="md:max-w-[540px] w-full">
                            <div class="relative">
                                <div class="relative p-6 md:p-8 rounded-3xl bg-white border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group-hover:border-primary/30 overflow-hidden">
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-400 via-emerald-500 to-emerald-600"></div>
                                    <div class="flex flex-col md:flex-row items-start gap-5">
                                        <div class="shrink-0">
                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex flex-col items-center justify-center text-white font-black shadow-lg shadow-emerald-500/30 transform group-hover:scale-110 transition-transform duration-300">
                                                <span class="text-2xl leading-tight">2022</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl md:text-2xl font-bold leading-tight text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                                Pembersihan sungai & penanaman asli
                                            </h3>
                                            <p class="text-base text-gray-600 leading-relaxed mb-4">
                                                Kerjasama penduduk, NGO dan pihak berkuasa membersihkan sampah sungai, menstabilkan tebing dan menanam spesis tempatan bagi memulihara habitat ikan dan burung.
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold border border-emerald-200">pemulihan</span>
                                                <span class="px-3 py-1.5 rounded-full bg-gray-50 text-gray-700 text-xs font-semibold border border-gray-200">biodiversiti</span>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                <span class="text-xs text-gray-500 font-medium">Laporan projek • Log sukarelawan</span>
                                                <button class="text-xs px-4 py-2 rounded-full bg-gradient-to-r from-primary to-tertiary text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="hidden md:block absolute left-[-24px] top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white border-4 border-primary shadow-xl shadow-primary/30 z-10">
                                    <span class="block w-3 h-3 bg-primary rounded-full m-auto mt-0.5"></span>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>

                <!-- 2024 craft revival -->
                <li class="timeline-item md:grid md:grid-cols-2 md:items-center" data-year="2024" data-category="community">
                    <article class="group relative md:pr-12 md:pl-0 md:col-start-1 md:col-end-2 flex md:justify-end intersect:motion-preset-slide-right">
                        <div class="md:max-w-[540px] w-full">
                            <div class="relative">
                                <div class="relative p-6 md:p-8 rounded-3xl bg-white border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 group-hover:border-primary/30 overflow-hidden">
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-400 via-indigo-500 to-indigo-600"></div>
                                    <div class="flex flex-col md:flex-row items-start gap-5">
                                        <div class="shrink-0">
                                            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-indigo-400 to-indigo-600 flex flex-col items-center justify-center text-white font-black shadow-lg shadow-indigo-500/30 transform group-hover:scale-110 transition-transform duration-300">
                                                <span class="text-2xl leading-tight">2024</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl md:text-2xl font-bold leading-tight text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                                Inisiatif kebangkitan kraftangan warisan
                                            </h3>
                                            <p class="text-base text-gray-600 leading-relaxed mb-4">
                                                Geran mikro dan bengkel hujung minggu menggalakkan penjagaan ilmu tradisional — menggabungkan warisan, identiti dan peluang pasaran kecil serta pelancongan.
                                            </p>
                                            <div class="flex flex-wrap gap-2 mb-4">
                                                <span class="px-3 py-1.5 rounded-full bg-indigo-50 text-indigo-700 text-xs font-semibold border border-indigo-200">warisan</span>
                                                <span class="px-3 py-1.5 rounded-full bg-amber-50 text-amber-700 text-xs font-semibold border border-amber-200">mata pencarian</span>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                <span class="text-xs text-gray-500 font-medium">Nota projek • Kisah peserta</span>
                                                <button class="text-xs px-4 py-2 rounded-full bg-gradient-to-r from-primary to-tertiary text-white font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="hidden md:block absolute right-[-24px] top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-white border-4 border-primary shadow-xl shadow-primary/30 z-10">
                                    <span class="block w-3 h-3 bg-primary rounded-full m-auto mt-0.5"></span>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>
            </ul>
            </div>
        </div>
    </section>

    <script>
        (function () {
            const items = Array.from(document.querySelectorAll('.timeline-item'));
            const searchEl = document.getElementById('search');
            const filterEl = document.getElementById('filterCategory');
            const sortEl = document.getElementById('sort');
            const themeToggle = document.getElementById('themeToggle');

            // Tema — simpan pilihan pengguna
            function applyTheme(dark) {
                if (dark) document.documentElement.classList.add('dark');
                else document.documentElement.classList.remove('dark');
            }
            const saved = localStorage.getItem('kb_theme');
            if (saved) applyTheme(saved === 'dark');
            if (themeToggle) {
                themeToggle.addEventListener('click', () => {
                    const isDark = document.documentElement.classList.toggle('dark');
                    localStorage.setItem('kb_theme', isDark ? 'dark' : 'light');
                });
            }

            function normalize(str) {
                return (str || '').toString().toLowerCase();
            }

            function matchesSearch(item, query) {
                if (!query) return true;
                const text = [
                    item.querySelector('h3')?.textContent,
                    item.querySelector('p')?.textContent
                ].join(' ');
                return normalize(text).includes(normalize(query));
            }

            function matchesFilter(item, category) {
                if (!category || category === 'all') return true;
                return item.dataset.category === category;
            }

            function applyFilters() {
                if (!searchEl || !filterEl) return;
                const q = searchEl.value.trim();
                const cat = filterEl.value;
                items.forEach(it => {
                    const visible = matchesSearch(it, q) && matchesFilter(it, cat);
                    it.style.display = visible ? '' : 'none';
                });
                if (sortEl) applySorting();
            }

            if (searchEl) searchEl.addEventListener('input', applyFilters);
            if (filterEl) filterEl.addEventListener('change', applyFilters);

            function applySorting() {
                if (!sortEl) return;
                const order = sortEl.value; // asc | desc
                const list = document.querySelector('#timeline ul');
                if (!list) return;
                const visible = Array.from(items).filter(i => i.style.display !== 'none');
                visible.sort((a,b) => {
                    const ay = parseInt(a.dataset.year || '0', 10);
                    const by = parseInt(b.dataset.year || '0', 10);
                    return order === 'asc' ? ay - by : by - ay;
                });
                visible.forEach(v => list.appendChild(v));
            }
            if (sortEl) sortEl.addEventListener('change', applySorting);

            // Jalankan pertama kali
            applyFilters();
        })();
    </script>
</x-app-layout>
