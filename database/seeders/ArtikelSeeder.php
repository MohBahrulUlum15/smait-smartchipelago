<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artikel::truncate();

        for ($i = 1; $i <= 5; $i++) {
            Artikel::create([
                'judul_artikel' => "Artikel " . $i + 1 . " Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.",
                'isi_artikel' => "Deskripsi Artikel" . $i + 1 . " Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.",
                'gambar_artikel' => 'https://placehold.co/800x600/png',
                'on_delete' => false,
            ]);
        }
    }
}
