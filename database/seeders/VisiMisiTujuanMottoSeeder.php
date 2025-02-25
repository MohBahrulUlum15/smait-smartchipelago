<?php

namespace Database\Seeders;

use App\Models\VisiMisiTujuanMotto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiMisiTujuanMottoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisiTujuanMotto::truncate();

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
                'deskripsi' => 'Mewujudkan pelajar muslim yang berkarakter holistik melalui pembinaan dan pendidikan yang terstruktur dan berkelanjutan.',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Mengembangkan nilai-nilai kepemimpinan pada peserta didik melalui program pendidikan yang terintegrasi.',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Mendorong tumbuhnya jiwa enterpreneurship pada peserta didik melalui kegiatan pembelajaran dan pelatihan yang aplikatif.',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Mencetak peserta didik yang unggul dalam prestasi akademik dan non-akademik hingga tingkat regional, nasional, dan internasional.',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Mempersiapkan peserta didik dengan pengetahuan, sikap, dan keterampilan yang dibutuhkan untuk melanjutkan pendidikan ke jenjang yang lebih tinggi serta berkontribusi positif bagi masyarakat.',
                'tipe' => 'tujuan'
            ],
            [
                'deskripsi' => 'Membangun lingkungan pendidikan yang islami, dinamis, dan mendukung pengembangan potensi peserta didik secara optimal.',
                'tipe' => 'tujuan'
            ],
        ])->each(fn($data) => \App\Models\VisiMisiTujuanMotto::create($data));
    }
}
