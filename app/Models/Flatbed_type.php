<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flatbed_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',      // حقل الاسم
        'name_ar',   // حقل الاسم باللغة العربية
    ];

    public function flatbeds()
    {
        return $this->hasMany(Flatbed::class, 'flatbed_type_id');
    }}
