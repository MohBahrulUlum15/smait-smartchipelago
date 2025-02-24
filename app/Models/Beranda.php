<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    protected $table = 'berandas';
    protected $fillable = ['slider_img_1', 'slider_img_2', 'slider_img_3'];
}
