<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_ar',

        'details',
        'details_ar',

        'more_details',
        'more_details_ar',

        'image',

        // حقول الميتا
        'article_title_ar',
        'article_title_en',
        'article_meta_ar',
        'article_meta_en',
        'article_meta_keyword_ar',
        'article_meta_keyword_en',
        'article_url_ar',
        'article_url_en',
    ];
}
