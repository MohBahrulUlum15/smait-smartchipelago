<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasePage extends Model
{
    protected $fillable = ['welcome_text', 'title', 'description', 'image'];
}
