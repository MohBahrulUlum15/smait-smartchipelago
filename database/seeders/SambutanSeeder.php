<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SambutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sambutan = new \App\Models\Sambutan();
        $sambutan->nama_kepala_sekolah = 'Drs. H. Asep Saepudin, M.Pd.';
        $sambutan->foto_kepala_sekolah = 'kepala-sekolah.jpg';
        $sambutan->sambutan_kepala_sekolah = 'Selamat datang di website resmi SMP Negeri 1 Cianjur. Kami senang bisa berbagi informasi dengan Anda. Semoga website ini dapat memberikan informasi yang bermanfaat bagi Anda.';

        $sambutan->save();
    }
}
