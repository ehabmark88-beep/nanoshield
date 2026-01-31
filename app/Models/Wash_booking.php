<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Branch;

class Wash_booking extends Model
{
    use HasFactory;

    // تعيين اسم الجدول إذا لم يكن الاسم الافتراضي "wash_bookings"
    protected $table = 'wash_bookings';


    protected $fillable = [
        'car_id', 'name', 'phone_number', 'email', 'packages',
        'additional_services', 'branch_id', 'date', 'time',
        'duration', 'coupon_id', 'total_price', 'payment_method',
        'status','flatbed_id'
    ];


    // تحديد الحقول التي يجب تحويلها من JSON إلى مصفوفات
    protected $casts = [
        'packages' => 'array',
        'additional_services' => 'array',
    ];

    // تعريف العلاقة مع جدول السيارات
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    // تعريف العلاقة مع جدول الفروع
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    // تعريف العلاقة مع جدول الكوبونات (يمكن أن يكون فارغاً)
    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id')->withDefault();
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
     public function flatbed()
    {
        return $this->belongsTo(Flatbed::class, 'flatbed_id');
    }
    
}

