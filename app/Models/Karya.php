<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = 'karyas';
    protected $fillable = [
        'judul_karya',
        'deskripsi_karya',
        'gambar_karya',
        'on_delete'
    ];
}
