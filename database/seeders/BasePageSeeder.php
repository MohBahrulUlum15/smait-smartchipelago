<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $basePage = new \App\Models\BasePage();
        $basePage->welcome_text = 'Selamat Datang!';
        $basePage->title = 'SMA Islam Al Ghozali Jember';
        $basePage->description = 'Selamat Datang Di Website Resmi SMA Islam Al Ghozali Jember, Jawa Timur \n
        lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec,
        mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tort';
        $basePage->image = 'https://picsum.photos/seed/picsum/300/200';
        $basePage->save();
    }
}
