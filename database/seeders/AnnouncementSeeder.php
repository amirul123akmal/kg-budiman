<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $today = Carbon::today();

        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Kampung',
                'password' => Hash::make('password123'),
            ]
        );

        $announcements = [
            [
                'title' => 'Gotong-Royong Mega Zon Timur',
                'content' => 'Semua penduduk dijemput menyertai aktiviti pembersihan besar-besaran di lorong utama dan kawasan surau.',
                'image_path' => 'pengumuman/buletin-1.jpeg',
                'start_date' => $today->copy()->subDays(2),
                'end_date' => $today->copy()->addDays(5),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Program Kesihatan & Suai Mesra',
                'content' => 'Saringan kesihatan percuma bersama sesi suai mesra bersama pegawai perubatan klinik desa Kampung Budiman.',
                'image_path' => 'pengumuman/buletin-2.jpeg',
                'start_date' => $today->copy()->subDay(),
                'end_date' => $today->copy()->addDays(10),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Pameran Warisan Kampung',
                'content' => 'Pameran foto dan cerita lisan berkaitan sejarah Kampung Budiman sejak 1930-an. Jemput semua hadir.',
                'image_path' => 'pengumuman/buletin-3.jpeg',
                'start_date' => $today->copy()->addDays(3),
                'end_date' => $today->copy()->addDays(15),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Kempen Kebersihan Lorong Belakang',
                'content' => 'Kerja-kerja pembersihan longkang dan lorong belakang rumah akan dijalankan bersama pihak berkuasa tempatan.',
                'image_path' => 'pengumuman/buletin-1.jpeg',
                'start_date' => $today->copy()->addDays(1),
                'end_date' => $today->copy()->addDays(4),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Kelas Mengaji Kanak-Kanak',
                'content' => 'Pendaftaran kelas mengaji untuk kanak-kanak sekolah rendah di Surau Al-Hidayah kini dibuka.',
                'image_path' => 'pengumuman/buletin-2.jpeg',
                'start_date' => $today->copy()->addDays(2),
                'end_date' => $today->copy()->addDays(20),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Latihan Kebakaran Bersama Bomba',
                'content' => 'Demontrasi dan latihan asas keselamatan kebakaran akan diadakan di padang kampung.',
                'image_path' => 'pengumuman/buletin-3.jpeg',
                'start_date' => $today->copy()->addDays(4),
                'end_date' => $today->copy()->addDays(7),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Mesyuarat Agung Tahunan JPKK',
                'content' => 'Semua penduduk dijemput hadir bagi membincangkan hala tuju dan perancangan tahunan kampung.',
                'image_path' => 'pengumuman/buletin-1.jpeg',
                'start_date' => $today->copy()->addDays(6),
                'end_date' => $today->copy()->addDays(6),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Program Derma Darah Bersama Hospital Klang',
                'content' => 'Program derma darah akan diadakan di Dewan JPKK. Sijil penyertaan dan makanan ringan disediakan.',
                'image_path' => 'pengumuman/buletin-2.jpeg',
                'start_date' => $today->copy()->addDays(8),
                'end_date' => $today->copy()->addDays(8),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Pertandingan Mewarna Hari Kemerdekaan',
                'content' => 'Pertandingan mewarna untuk kanak-kanak sempena sambutan kemerdekaan. Hadiah menarik menanti pemenang.',
                'image_path' => 'pengumuman/buletin-3.jpeg',
                'start_date' => $today->copy()->addDays(9),
                'end_date' => $today->copy()->addDays(9),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Kursus Usahawan Mikro Kampung',
                'content' => 'Bengkel sehari bersama agensi kerajaan untuk membantu usahawan kecil memulakan perniagaan.',
                'image_path' => 'pengumuman/buletin-1.jpeg',
                'start_date' => $today->copy()->addDays(11),
                'end_date' => $today->copy()->addDays(11),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Program Saringan Kesihatan Warga Emas',
                'content' => 'Pemeriksaan tekanan darah, gula dan kolesterol percuma khas untuk warga emas kampung.',
                'image_path' => 'pengumuman/buletin-2.jpeg',
                'start_date' => $today->copy()->addDays(12),
                'end_date' => $today->copy()->addDays(12),
                'created_by' => $user->id,
            ],
        ];

        foreach ($announcements as $data) {
            Announcement::updateOrCreate(
                ['title' => $data['title']],
                $data
            );
        }
    }
}
