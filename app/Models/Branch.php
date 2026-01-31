<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public $timestamps = false; // تعطيل التوقيتات

    protected $fillable = [
        'branch_name',
        'branch_name_ar',
        'branch_address',
        'branch_address_ar',
        'branch_details',
        'contact_us',
        'governorate_id',
        'branch_link',
        'image'
    ];

    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'branch_id');
    }

    public function washBookings()
    {
        return $this->hasMany(Wash_booking::class, 'branch_id');
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

}
