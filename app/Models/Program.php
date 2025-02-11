<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    protected $fillable = [
        'nama_program',
        'deskripsi',
        'foto',
        'on_delete'
    ];
}
