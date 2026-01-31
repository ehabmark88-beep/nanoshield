<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'website_settings';

    protected $fillable = [
        'primary_color',
        'secondary_color',
        'third_color',
        'facebook_url',
        'instagram_url',
        'snapchat_url',
        'tiktok_url',
        'youtube_url',
        'x_platform_url',
        'loyalty_points_days',
        'loyalty_points_conversion', // 🔥 جديد
        'offer_title',
        'offer_code',
        'offer_title_en',

    ];
}
