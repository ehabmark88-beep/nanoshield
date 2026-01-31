<?php

namespace App\Models;

use
    Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'name_ar',
        'details',
        'image',
    ];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }

}
