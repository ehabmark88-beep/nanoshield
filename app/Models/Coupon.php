<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'discount', 'type', 'expiry_date', 'usage_limit', 'used',
    ];

    public static function checkCoupon($code)
    {
        $coupon = self::where('code', $code)->first();

        if (!$coupon) {
            return ['status' => false, 'message' => __('messages.invalid_coupon')];
        }

        if ($coupon->expiry_date && now()->greaterThan($coupon->expiry_date)) {
            return ['status' => false, 'message' => __('messages.expired_coupon')];
        }

        if ($coupon->usage_limit && $coupon->used >= $coupon->usage_limit) {
            return ['status' => false, 'message' => __('messages.usage_limit_exceeded')];
        }

//        $coupon->increment('used');

        return [
            'status' => true,
            'discount' => $coupon->discount,
            'type' => $coupon->type,
            'coupon_id' => $coupon->id, // إضافة معرّف الكوبون
        ];
    }

    public function washBookings()
    {
        return $this->hasMany(Wash_booking::class, 'coupon_id');
    }

}
