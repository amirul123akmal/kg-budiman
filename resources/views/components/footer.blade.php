<footer class="bg-linear-to-r from-primary to-tertiary text-white">
  <div class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

      <!-- Logo + Social -->
      <div class="flex flex-col items-start">
        <img src="/images/jpkk ori.png" alt="JPKK Kampung Budiman Logo" class="h-14 mb-4" />
      </div>

      <!-- Pautan Pantas -->
      <div>
        <h3 class="font-semibold mb-3">Pautan Pantas</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="{{ route('utama') }}" class="hover:text-gray-300">Utama</a></li>
          <li><a href="{{ route('ahli-jawatankuasa') }}" class="hover:text-gray-300">Ahli Jawatan Kuasa</a></li>
          <li><a href="{{ route('fasiliti') }}" class="hover:text-gray-300">Fasiliti</a></li>
          <li><a href="{{ route('hubungi-kami') }}" class="hover:text-gray-300">Hubungi Kami</a></li>
        </ul>
      </div>

      <!-- Perkhidmatan -->
      <div>
        <h3 class="font-semibold mb-3">Perkhidmatan</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-gray-300">Aduan</a></li>
          <li><a href="{{ route('aktiviti') }}" class="hover:text-gray-300">Aktiviti</a></li>
          <li><a href="{{ route('budiman-biz-hub') }}" class="hover:text-gray-300">Budiman Biz Hub</a></li>
        </ul>
      </div>

      <!-- Hubungi Kami -->
      <div>
        <h3 class="font-semibold mb-3">Hubungi Kami</h3>
        <ul class="space-y-2 text-sm">
          <li>01234567892</li>
          <li>kampungbudimanofficial@gmail.com.my</li>
          <li>
            Lot 4470 /2, Jalan Haji Jalal,<br />
            Jalan Paip, Kampung Budiman,<br />
            Meru, 41050 Klang, Selangor
          </li>
        </ul>
      </div>

    </div>

    <!-- Divider -->
    <div class="border-t border-white/30 mt-10 pt-6 flex flex-col md:flex-row justify-between items-center text-sm">
      <p>© 2025 Kampung Budiman JKKPP. Hak Cipta Terpelihara.</p>
      <div class="flex space-x-6 mt-3 md:mt-0">
        <p>Dasar Privasi</p>
        <p>Terma & Syarat</p>
      </div>
    </div>
  </div>
</footer>
