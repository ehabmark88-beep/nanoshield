<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'image',
        'package_id',
        'category_id',
        'details',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function category()
    {
        return $this->belongsTo(Package_category::class, 'category_id');
    }
}
