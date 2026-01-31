<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'name',
        'name_ar',

        'description',
        'description_ar',

        'price',
        'category_id',
        'image',
        'discount'
    ];

    public function category()
    {
        return $this->belongsTo(Product_category::class, 'category_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
