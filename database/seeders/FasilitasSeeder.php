<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fasilitas::truncate();

        $fasilitas = [
            [
                'id' => 1,
                'nama_fasilitas' => 'Ruang Kelas',
                'deskripsi' => '<p>ruang kelas</p>',
                'foto' => '/storage/uploads/fasilitas/ruang-kelas-1740468194-bru.png',
                'on_delete' => 0,
                'created_at' => '2025-02-25 07:23:14',
                'updated_at' => '2025-02-25 07:23:14',
            ],
            [
                'id' => 2,
                'nama_fasilitas' => 'Lab. Komputer',
                'deskripsi' => '<p>lab. komputer</p>',
                'foto' => '/storage/uploads/fasilitas/lab-komputer-1740468213-IMt.png',
                'on_delete' => 0,
                'created_at' => '2025-02-25 07:23:33',
                'updated_at' => '2025-02-25 07:23:33',
            ],
            [
                'id' => 3,
                'nama_fasilitas' => 'Asrama',
                'deskripsi' => '<p>asrama</p>',
                'foto' => '/storage/uploads/fasilitas/asrama-1740468225-5I9.png',
                'on_delete' => 0,
                'created_at' => '2025-02-25 07:23:45',
                'updated_at' => '2025-02-25 07:23:45',
            ],
            [
                'id' => 4,
                'nama_fasilitas' => 'Toilet',
                'deskripsi' => '<p>toilet</p>',
                'foto' => '/storage/uploads/fasilitas/toilet-1740468238-bWW.png',
                'on_delete' => 0,
                'created_at' => '2025-02-25 07:23:58',
                'updated_at' => '2025-02-25 07:23:58',
            ],
        ];

        // Insert data ke dalam tabel fasilitas
        DB::table('fasilitas')->insert($fasilitas);
    }
}
