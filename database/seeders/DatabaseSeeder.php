<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            VisiMisiTujuanMottoSeeder::class,
            SambutanSeeder::class,
            PengajarSeeder::class,
            ProgramSeeder::class,
            FasilitasSeeder::class,
            PrestasiSeeder::class,
            KaryaSeeder::class,
            KegiatanSeeder::class,
            ArtikelSeeder::class,
            NewsSeeder::class,
        ]);
    }
}
