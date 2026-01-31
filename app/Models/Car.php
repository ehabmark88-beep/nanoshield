<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'size',
        'size_ar',
        'details',
        'details_ar',
        'image'
    ];

    public function washBookings()
    {
        return $this->hasMany(Wash_booking::class, 'car_id');
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
