<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flatbed extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'name',              // حقل الاسم
        'name_ar',           // حقل الاسم باللغة العربية
        'price',             // حقل السعر
        'flatbed_type_id',   // حقل المفتاح الأجنبي
    ];

    public function flatbed_type()
    {
        return $this->belongsTo(Flatbed_type::class, 'flatbed_type_id');
    }

}
