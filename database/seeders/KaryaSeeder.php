<?php

namespace Database\Seeders;

use App\Models\Karya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Karya::truncate();

        for ($i = 1; $i <= 5; $i++) {
            Karya::create([
                'judul_karya' => "Karya " . $i + 1 . " Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.",
                'deskripsi_karya' => "Deskripsi Karya" . $i + 1 . " Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.",
                'gambar_karya' => 'https://placehold.co/800x600/png',
                'on_delete' => false,
            ]);
        }
    }
}
