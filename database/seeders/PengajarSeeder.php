<?php

namespace Database\Seeders;

use App\Models\Pengajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        $pengajars = [
            [
                'id' => 1,
                'nama' => 'Otong Surotong, S.Pd',
                'jabatan' => 'Guru Matematika',
                'foto' => '/storage/uploads/general-images/otong-surotong-spd-1740487852-W0l.png',
                'nomor_hp' => '089516295079',
                'facebook' => 'https://www.facebook.com',
                'instagram' => 'https://www.instagram.com',
                'quote' => 'Saya adalah pengajar di SMAIT Al-Ghozali.',
                'on_delete' => 0,
                'created_at' => '2025-02-25 12:50:52',
                'updated_at' => '2025-02-25 12:50:52',
            ],
            [
                'id' => 2,
                'nama' => 'Budi Santoso, S.Pd',
                'jabatan' => 'Guru Fisika',
                'foto' => '/storage/uploads/general-images/budi-santoso-spd-1740487852-W0l.png',
                'nomor_hp' => '089516295080',
                'facebook' => 'https://www.facebook.com',
                'instagram' => 'https://www.instagram.com',
                'quote' => 'Mengajar adalah passion saya.',
                'on_delete' => 0,
                'created_at' => '2025-02-25 12:50:53',
                'updated_at' => '2025-02-25 12:50:53',
            ],
            [
                'id' => 3,
                'nama' => 'Ani Wijayanti, S.Pd',
                'jabatan' => 'Guru Bahasa Inggris',
                'foto' => '/storage/uploads/general-images/ani-wijayanti-spd-1740487852-W0l.png',
                'nomor_hp' => '089516295081',
                'facebook' => 'https://www.facebook.com',
                'instagram' => 'https://www.instagram.com',
                'quote' => 'Belajar bahasa Inggris itu menyenangkan.',
                'on_delete' => 0,
                'created_at' => '2025-02-25 12:50:54',
                'updated_at' => '2025-02-25 12:50:54',
            ],
            [
                'id' => 4,
                'nama' => 'Dewi Lestari, S.Pd',
                'jabatan' => 'Guru Kimia',
                'foto' => '/storage/uploads/general-images/dewi-lestari-spd-1740487852-W0l.png',
                'nomor_hp' => '089516295082',
                'facebook' => 'https://www.facebook.com',
                'instagram' => 'https://www.instagram.com',
                'quote' => 'Kimia adalah ilmu yang menakjubkan.',
                'on_delete' => 0,
                'created_at' => '2025-02-25 12:50:55',
                'updated_at' => '2025-02-25 12:50:55',
            ],
            [
                'id' => 5,
                'nama' => 'Eko Prasetyo, S.Pd',
                'jabatan' => 'Guru Biologi',
                'foto' => '/storage/uploads/general-images/eko-prasetyo-spd-1740487852-W0l.png',
                'nomor_hp' => '089516295083',
                'facebook' => 'https://www.facebook.com',
                'instagram' => 'https://www.instagram.com',
                'quote' => 'Biologi adalah kunci memahami kehidupan.',
                'on_delete' => 0,
                'created_at' => '2025-02-25 12:50:56',
                'updated_at' => '2025-02-25 12:50:56',
            ],
            [
                'id' => 6,
                'nama' => 'Fajar Nugroho, S.Pd',
                'jabatan' => 'Guru Sejarah',
                'foto' => '/storage/uploads/general-images/fajar-nugroho-spd-1740487852-W0l.png',
                'nomor_hp' => '089516295084',
                'facebook' => 'https://www.facebook.com',
                'instagram' => 'https://www.instagram.com',
                'quote' => 'Sejarah adalah cermin masa lalu.',
                'on_delete' => 0,
                'created_at' => '2025-02-25 12:50:57',
                'updated_at' => '2025-02-25 12:50:57',
            ],
            [
                'id' => 7,
                'nama' => 'Gita Permata, S.Pd',
                'jabatan' => 'Guru Seni Budaya',
                'foto' => '/storage/uploads/general-images/gita-permata-spd-1740487852-W0l.png',
                'nomor_hp' => '089516295085',
                'facebook' => 'https://www.facebook.com',
                'instagram' => 'https://www.instagram.com',
                'quote' => 'Seni adalah ekspresi jiwa.',
                'on_delete' => 0,
                'created_at' => '2025-02-25 12:50:58',
                'updated_at' => '2025-02-25 12:50:58',
            ],
            [
                'id' => 8,
                'nama' => 'Hadi Susanto, S.Pd',
                'jabatan' => 'Guru Olahraga',
                'foto' => '/storage/uploads/general-images/hadi-susanto-spd-1740487852-W0l.png',
                'nomor_hp' => '089516295086',
                'facebook' => 'https://www.facebook.com',
                'instagram' => 'https://www.instagram.com',
                'quote' => 'Olahraga adalah kunci kesehatan.',
                'on_delete' => 0,
                'created_at' => '2025-02-25 12:50:59',
                'updated_at' => '2025-02-25 12:50:59',
            ],
        ];

        // Insert data ke dalam tabel pengajars
        DB::table('pengajars')->insert($pengajars);
    }
}
