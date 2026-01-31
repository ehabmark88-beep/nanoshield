<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_ar',
        'title',
        'details_ar',
        'details',

        'image',
    ];
    public $timestamps = false;

}
