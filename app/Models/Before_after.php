<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Before_after extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_ar',
        'details',
        'details_ar',
        'image_before',
        'image_after',
    ];

    public $timestamps = true;
}
