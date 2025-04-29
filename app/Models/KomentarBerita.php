<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomentarBerita extends Model
{
    protected $table = 'komentar_beritas';
    protected $fillable = [
        'nama',
        'komentar',
        'news_id',
        'on_delete'
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function berita()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
}
