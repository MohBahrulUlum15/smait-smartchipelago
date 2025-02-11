<?php

namespace Database\Seeders;

use App\Models\Pengajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class PengajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua data sebelumnya
        Pengajar::truncate();

        // create 5 data pengajar
        for ($i = 1; $i <= 5; $i++) {
            \App\Models\Pengajar::create([
                'nama' => 'Pengajar ' . $i,
                'jabatan' => 'Jabatan Pengajar ' . $i,
                'foto' => 'https://placehold.co/300x300/png',
                'nomor_hp' => '08123456789',
                'facebook' => 'https://facebook.com/pengajar' . $i,
                'instagram' => 'https://instagram.com/pengajar' . $i,
                'quote' => Random::generate(15),
                'on_delete' => 0,
            ]);
        }
    }
}
