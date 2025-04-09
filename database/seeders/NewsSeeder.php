<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Hapus semua data sebelumnya
        // News::truncate();

        // Buat data dummy
        for ($i = 0; $i <= 5; $i++) {
            $title = "Berita Contoh {$i}";
            $slug = Str::slug($title);
            $content = "<p>Ini adalah konten lengkap untuk berita contoh {$i}. Konten ini bisa berisi HTML, gambar, dan lainnya.</p>";
            $type = ['event', 'kunjungan', 'lomba', 'pembelajaran', 'pelatihan', 'seminar', 'workshop', 'lainnya'][rand(0, 7)];
            $author = "Author {$i}";
            $tags = json_encode(['berita', 'contoh', 'laravel']);

            // Simpan gambar utama
            $featuredImage = 'https://placehold.co/800x600/png';

            // Simpan gambar pendukung (opsional)
            $supportingImages = [];
            for ($j = 1; $j <= 3; $j++) {
                // $supportingImage = $this->createDummyImage("{$slug}-supporting-{$j}.jpg", 400, 300);
                $supportingImages[] = 'https://placehold.co/400x300/png';
            }
        }

        $berita = [
            [
                'title' => 'Peluncuran Program Baru',
                'content' => '<p>Kami dengan bangga mengumumkan peluncuran program baru untuk tahun 2025.</p>',
                'type' => 'lainnya',
                'author' => 'Admin',
                'tags' => json_encode(['program', 'baru', '2025']),
                'featured_image' => '/storage/uploads/berita/program-baru-1740468194-bru.png',
                'on_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Workshop Kewirausahaan',
                'content' => '<p>Workshop kewirausahaan akan diadakan pada tanggal 15 Maret 2025.</p>',
                'type' => 'event',
                'author' => 'Tim Event',
                'tags' => json_encode(['workshop, kewirausahaan, 2025']),
                'featured_image' => '/storage/uploads/berita/workshop-1740468213-IMt.png',
                'on_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Prestasi Siswa di Olimpiade Nasional',
                'content' => '<p>Siswa kami berhasil meraih medali emas di Olimpiade Nasional 2025.</p>',
                'type' => 'lainnya',
                'author' => 'Tim Akademik',
                'tags' => json_encode(['prestasi, olimpiade, siswa']),
                'featured_image' => '/storage/uploads/berita/olimpiade-1740468225-5I9.png',
                'on_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Renovasi Gedung Sekolah',
                'content' => '<p>Gedung sekolah akan direnovasi mulai bulan April 2025.</p>',
                'type' => 'lainnya',
                'author' => 'Admin',
                'tags' => json_encode(['renovasi, gedung, sekolah']),
                'featured_image' => '/storage/uploads/berita/renovasi-1740468238-bWW.png',
                'on_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data ke dalam tabel berita
        DB::table('news')->insert($berita);
    }
}
