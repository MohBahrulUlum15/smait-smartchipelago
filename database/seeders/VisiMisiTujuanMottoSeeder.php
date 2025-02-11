<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiMisiTujuanMottoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            // Visi & Misi
            [
                'deskripsi' => 'Menjadi perguruan tinggi yang unggul dalam bidang teknologi informasi dan komunikasi yang berbasis kearifan lokal dan berwawasan global.',
                'tipe' => 'visi'
            ],
            [
                'deskripsi' => 'Menyelenggarakan pendidikan tinggi dalam bidang teknologi informasi dan komunikasi yang berbasis kearifan lokal dan berwawasan global.',
                'tipe' => 'misi'
            ],
            [
                'deskripsi' => 'Menyelenggarakan penelitian dan pengabdian kepada masyarakat dalam bidang teknologi informasi dan komunikasi yang berbasis kearifan lokal dan berwawasan global.',
                'tipe' => 'misi'
            ],
            [
                'deskripsi' => 'Menyelenggarakan kerjasama dengan berbagai pihak dalam bidang teknologi informasi dan komunikasi yang berbasis kearifan lokal dan berwawasan global.',
                'tipe' => 'misi'
            ],

            // Motto & Tujuan
            [
                'deskripsi' => '“Membangun Karakter, Menciptakan Karya”',
                'tipe' => 'motto'
            ],
            [
                'deskripsi' => 'Menghasilkan lulusan yang memiliki kompetensi dan keterampilan di bidang teknologi informasi dan komunikasi yang berbasis kearifan lokal dan berwawasan global.',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Menghasilkan penelitian yang bermutu di bidang teknologi informasi dan komunikasi yang berbasis kearifan lokal dan berwawasan global.',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Menghasilkan pengabdian kepada masyarakat yang bermanfaat di bidang teknologi informasi dan komunikasi yang berbasis kearifan lokal dan berwawasan global.',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Menghasilkan kerjasama yang bermanfaat dengan berbagai pihak di bidang teknologi informasi dan komunikasi yang berbasis kearifan lokal dan berwawasan global.',
                'tipe' => 'tujuan'
            ],
        ])->each(fn($data) => \App\Models\VisiMisiTujuanMotto::create($data));
    }
}
