<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    protected $table = 'pengajars';
    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'nomor_hp',
        'facebook',
        'instagram',
        'quote',
        'on_delete',
    ];
}
