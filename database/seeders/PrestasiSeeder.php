<?php

namespace Database\Seeders;

use App\Models\Prestasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Prestasi::create([
                'judul_prestasi' => "Prestasi " . $i + 1 . " Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.",
                'deskripsi_prestasi' => "Deskripsi Prestasi" . $i + 1 . " Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.",
                'gambar_prestasi' => 'https://placehold.co/800x600/png',
                'on_delete' => false,
            ]);
        }
    }
}
