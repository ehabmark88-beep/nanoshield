<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    use HasFactory;
    // تحديد الأعمدة القابلة للتعبئة
    protected $fillable = [
        'page_name', 'title', 'meta_description', 'meta_keywords','meta_description_en','meta_keywords_en','title_en'
    ];
}
