<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = [
        'name',
        'name_en',

        'price',
        'discounted_price',
        'hours',

        'feature_1',
        'feature_1_en',

        'feature_2',
        'feature_2_en',

        'feature_3',
        'feature_3_en',

        'feature_4',
        'feature_4_en',

        'feature_5',
        'feature_5_en',

        'feature_6',
        'feature_6_en',

        'feature_7',
        'feature_7_en',

        'feature_8',
        'feature_8_en',

        'feature_9',
        'feature_9_en',

        'category_id',
        'car_id',
    ];

    public function category()
    {
        return $this->belongsTo(Package_category::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'package_id');
    }



}
