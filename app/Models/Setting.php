<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'key',
        'value',
        'site_name',
        'meta_title',
        'meta_description',
        'phone_number',
        'terms_conditions',
        'privacy_policy',
        'logo_path',
        'favicon_path',
        'whatsapp_number',
        'instagram_url',
        'snapchat_url',
        'tiktok_url',
    ];
}
