<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kegiatan::truncate();
        for ($i = 1; $i <= 5; $i++) {
            Kegiatan::create([
                'nama_kegiatan' => "Kegiatan " . $i + 1 . " Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.",
                'deskripsi_kegiatan' => "Deskripsi Kegiatan" . $i + 1 . " Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.",
                'gambar_kegiatan' => 'https://placehold.co/800x600/png',
                'on_delete' => false,
            ]);
        }
    }
}
