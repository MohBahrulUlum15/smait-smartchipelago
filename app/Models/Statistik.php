<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    protected $fillable = [
        'jumlah_siswa',
        'jumlah_lulusan',
    ];
}
