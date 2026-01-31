<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;

    protected $fillable = ['name','name_ar',]; // العمود الذي يمكن ملؤه

    // علاقة بين المحافظة والفروع
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
