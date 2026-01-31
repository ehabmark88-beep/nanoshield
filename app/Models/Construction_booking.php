<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction_booking extends Model
{
    use HasFactory;
    public $timestamps = false;

    // تحديد الحقول القابلة للتعبئة
    protected $fillable = [
        'type',
        'name',
        'phone_number',
        'email',
        'city',
        'service_id',
        'approximate_area',
        'image',
        'commercial_registry_files',
        'status',
    ];


    protected $casts = [
        'site_images' => 'array',
    ];

    public function service()
    {
        return $this->belongsTo(Construction_service::class, 'service_id');
    }
}

