<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional_service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_ar',
        'details',
        'image',
        'duration',
        'price'
    ];

}
