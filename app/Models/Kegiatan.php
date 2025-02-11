<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatans';
    protected $fillable = [
        'nama_kegiatan',
        'deskripsi_kegiatan',
        'gambar_kegiatan',
        'on_delete'
    ];
}
