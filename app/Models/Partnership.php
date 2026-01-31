<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;

    // تحديد الحقول القابلة للملء
    protected $fillable = [
        'organization_name',
        'organization_type',
        'contact_person',
        'phone_number',
        'commercial_registry_files',
        'email',
        'request_details',
    ];
}
