<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    protected $table = 'sambutans';
    protected $fillable =
    [
        'nama_kepala_sekolah',
        'foto_kepala_sekolah',
        'sambutan_kepala_sekolah'
    ];
}
