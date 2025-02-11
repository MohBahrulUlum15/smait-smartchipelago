<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
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
        News::truncate();

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

            // Simpan data ke database
            News::create([
                'title' => $title,
                'content' => $content,
                'type' => $type,
                'author' => $author,
                'tags' => $tags,
                'featured_image' => $featuredImage,
                'supporting_images' => json_encode($supportingImages),
            ]);
        }
    }
}
