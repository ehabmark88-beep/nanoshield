<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'product_ids',
        'quantities',
        'coupon_id',
        'name',
        'email',
        'phone_number',
        'address',
        'final_price',
        'payment_method',
        'status'
    ];

    // لتحديد الخصائص التي سيتم تحويلها إلى JSON (في حال استخدام arrays أو JSON columns)
    protected $casts = [
        'product_ids' => 'array',
        'quantities' => 'array',
    ];

}
