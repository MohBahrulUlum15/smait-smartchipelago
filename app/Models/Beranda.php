<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    protected $table = 'berandas';
    protected $fillable = [
        'slider_img_1',
        'slider_img_2',
        'slider_img_3',
        'deskripsi_slider_1',
        'deskripsi_slider_2',
        'deskripsi_slider_3',
        'link_slider_1',
        'link_slider_2',
        'link_slider_3',
    ];
}
