<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'date_of_birth',
        'phone',
        'email',
        'gender',
        'job_position',
        'city',
        'training_courses',
        'cv'

    ];
}

