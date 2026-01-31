<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

protected $fillable = [
    'name',
    'name_ar',
    'review',
    'review_ar',
    'arabic_review_images',
    'english_review_images',
];


}
