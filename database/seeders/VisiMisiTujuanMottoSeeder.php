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
                'deskripsi' => 'Membentuk pelajar muslim yang berkarakter mulia, berjiwa kepemimpinan dan berwawasan global.',
                'tipe' => 'visi'
            ],
            [
                'deskripsi' => 'Membina dan mendidik pelajar muslim yang berkarakter holistik.',
                'tipe' => 'misi'
            ],
            [
                'deskripsi' => 'Menumbuhkan nilai-nilai kepemimpinan dalam proses pendidikan.',
                'tipe' => 'misi'
            ],
            [
                'deskripsi' => 'Mengembangkan nilai enterpreneurship dalam proses pendidikan.',
                'tipe' => 'misi'
            ],
            [
                'deskripsi' => 'Membina peserta didik unggul dalam prestasi akademik dan non-akademik bertaraf regional, nasional dan internasional.',
                'tipe' => 'misi'
            ],
            [
                'deskripsi' => 'Menyiapkan peserta didik untuk memiliki pengetahuan, sikap dan keterampilan agar siap memasuki jenjang pendidikan selanjutnya serta mampu berkontribusi bagi masyarakat.',
                'tipe' => 'misi',
            ],
            [
                'deskripsi' => 'Menciptakan lingkungan pendidikan yang islami dan dinamis.',
                'tipe' => 'misi'
            ],

            // Motto & Tujuan
            [
                'deskripsi' => '“Sekolah Impian Calon Pemimpin Masa Depan Berkarakter dan Berbudaya”',
                'tipe' => 'motto'
            ],
            [
                'deskripsi' => 'Tujuan 1',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Tujuan 2',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Tujuan 3',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Tujuan 4',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Tujuan 5',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Tujuan 6',
                'tipe' => 'tujuan'
            ],
        ])->each(fn($data) => \App\Models\VisiMisiTujuanMotto::create($data));
    }
}
