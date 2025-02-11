<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisiTujuanMotto extends Model
{
    protected $table = 'visi_misi_tujuan_mottoes';
    protected $fillable =
    [
        'deskripsi',
        'tipe',
        'on_delete'
    ];
}
