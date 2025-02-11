<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasis';
    protected $fillable = [
        'judul_prestasi',
        'deskripsi_prestasi',
        'gambar_prestasi'
    ];
}
