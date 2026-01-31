<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceAppointment extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'customer_name',
        'phone',
        'email',
        'invoice_number',
        'branch_id',
        'appointment_date',
        'appointment_time',
        'image_path',
        'message',
        'status',
    ];
    
     public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    
}

