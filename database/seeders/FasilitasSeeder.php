<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fasilitas::truncate();

        for ($i = 1; $i <= 5; $i++) {
            Fasilitas::create([
                'nama_fasilitas' => "Fasilitas " . $i + 1 . " Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.",
                'deskripsi' => "Deskripsi fasilitas" . $i + 1 . " Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptate.",
                'foto' => 'https://placehold.co/800x600/png',
                'on_delete' => false,
            ]);
        }
    }
}
