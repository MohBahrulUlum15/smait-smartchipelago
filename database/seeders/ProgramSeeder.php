<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::truncate();

        for ($i = 0; $i <= 5; $i++) {
            Program::create([
                'nama_program' => 'Program ' . $i + 1 . ' Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'deskripsi' => 'Deskripsi Program ' . $i + 1 . ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium earum eaque corrupti tempora soluta, minima excepturi corporis labore dicta obcaecati sequi dignissimos molestiae non quia placeat ullam error architecto inventore consectetur temporibus commodi tempore? Iste harum sunt fugiat voluptas perferendis.',
                'foto' => 'https://placehold.co/800x600/png',
                'on_delete' => false,
            ]);
        }
    }
}
