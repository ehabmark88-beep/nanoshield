<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_ar',

        'details',
        'details_ar',

        'image',
        'feature1',
        'feature1_ar',

        'feature2',
        'feature2_ar',

        'feature3',
        'feature3_ar',

        'feature4',
        'feature4_ar',

        'feature5',
        'feature5_ar',

    ];

    public $timestamps = false;
}
