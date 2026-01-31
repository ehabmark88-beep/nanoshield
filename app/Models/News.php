<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
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
        'link'
    ];

}
