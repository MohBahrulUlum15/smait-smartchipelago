<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailInformation extends Model
{
    protected $table = 'detail_information';

    protected $fillable = [
        'email_info',
        'phone_info',
        'address_info',
        'website_name_info',
        'website_link_info',
        'facebook_link_info',
        'instagram_link_info',
        'youtube_link_info',
    ];
}
