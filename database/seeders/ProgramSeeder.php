<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::truncate();

        // for ($i = 0; $i <= 5; $i++) {
        //     Program::create([
        //         'nama_program' => 'Program ' . $i + 1 . ' Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        //         'deskripsi' => 'Deskripsi Program ' . $i + 1 . ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium earum eaque corrupti tempora soluta, minima excepturi corporis labore dicta obcaecati sequi dignissimos molestiae non quia placeat ullam error architecto inventore consectetur temporibus commodi tempore? Iste harum sunt fugiat voluptas perferendis.',
        //         'foto' => 'https://placehold.co/800x600/png',
        //         'on_delete' => false,
        //     ]);
        // }

        $programs = [
            [
                'id' => 1,
                'nama_program' => "Qur'anika",
                'deskripsi' => "<p>qur'anika description ddf</p>",
                'foto' => "/storage/uploads/program/quranika-1740070034-b0M.png",
                'on_delete' => 0,
                'created_at' => '2025-02-20 16:47:16',
                'updated_at' => '2025-02-24 07:13:53',
            ],
            [
                'id' => 2,
                'nama_program' => 'Bina Pribadi Islam',
                'deskripsi' => '<p>bina pribadi islam description</p>',
                'foto' => '/storage/uploads/program/bina-pribadi-islam-1740070679-7Og.png',
                'on_delete' => 0,
                'created_at' => '2025-02-20 16:57:59',
                'updated_at' => '2025-02-20 16:57:59',
            ],
            [
                'id' => 3,
                'nama_program' => 'Double Track',
                'deskripsi' => '<p>double track description</p>',
                'foto' => '/storage/uploads/program/double-track-1740070704-vvI.png',
                'on_delete' => 0,
                'created_at' => '2025-02-20 16:58:24',
                'updated_at' => '2025-02-20 16:58:24',
            ],
            [
                'id' => 4,
                'nama_program' => 'Deteksi Minat Bakat',
                'deskripsi' => '<p>deteksi minat bakat description</p>',
                'foto' => '/storage/uploads/program/deteksi-minat-bakat-1740070728-Qfp.png',
                'on_delete' => 0,
                'created_at' => '2025-02-20 16:58:48',
                'updated_at' => '2025-02-20 16:58:48',
            ],
        ];

        DB::table('programs')->insert($programs);
    }
}
