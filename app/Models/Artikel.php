<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikels';
    protected $fillable = [
        'judul_artikel',
        'isi_artikel',
        'gambar_artikel',
        'on_delete'
    ];
}
