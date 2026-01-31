<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction_service extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'name_ar',
        'details',
        'image',
    ];

    public function booking()
    {
        return $this->hasOne(Construction_booking::class, 'construction_booking_id');
    }

}
