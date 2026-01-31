<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceAppointment;
use Illuminate\Http\Request;

class MaintenanceAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   // التحقق من البيانات المدخلة
        $validated = $request->validate([
            'customer_name'     => 'required|string|max:150',
            'phone'             => 'required|string|max:20',
            'email'             => 'nullable|email|max:150',
            'invoice_number'    => 'nullable|string|max:50',
            'branch_id'         => 'required|exists:branches,id',
            'appointment_date'  => 'required|date',
            'appointment_time'  => 'required',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'message'           => 'nullable|string',
        ]);

        // رفع الصورة لو موجودة
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('appointments', 'public');
        }

        // إنشاء الحجز
        MaintenanceAppointment::create($validated);

        // رجوع مع رسالة نجاح
        return redirect()->route('welcome')
                         ->with('success', 'تم حفظ الموعد بنجاح');    }

    /**
     * Display the specified resource.
     */
    public function show(MaintenanceAppointment $maintenanceAppointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaintenanceAppointment $maintenanceAppointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaintenanceAppointment $maintenanceAppointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaintenanceAppointment $maintenanceAppointment)
    {
        //
    }
}
