<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'type',
        'author',
        'tags',
        'featured_image',
        'supporting_images',
        'on_delete',
    ];

    public function komentar()
    {
        return $this->hasMany(KomentarBerita::class, 'news_id');
    }
}
