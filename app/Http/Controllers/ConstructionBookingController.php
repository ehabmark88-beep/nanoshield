<?php

namespace App\Http\Controllers;

use App\Models\Construction_service;
use App\Models\Construction_booking;
use Illuminate\Http\Request;

class ConstructionBookingController extends Controller
{

    /**
     * عرض قائمة حجوزات المقاولات.
     */
    public function index()
    {
        $bookings = Construction_booking::with('service')->get();
        return view('admin.construction_bookings.index', compact('bookings'));
    }

    /**
     * عرض نموذج إنشاء حجز جديد.
     */
    public function create()
    {
        $services = Construction_booking::all();
        return view('admin.construction_bookings.create', compact('services'));
    }

    /**
     * تخزين حجز جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'city' => 'required|string|max:255',
            'service_id' => 'required|exists:construction_services,id',
            'approximate_area' => 'required|numeric',
        ], [
            'type.required' => 'نوع الحجز مطلوب.',
            'name.required' => 'اسم العميل مطلوب.',
            'phone_number.required' => 'رقم الجوال مطلوب.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'city.required' => 'المدينة مطلوبة.',
            'service_id.required' => 'الخدمة مطلوبة.',
        ]);

        // حفظ الصور المرفوعة إن وجدت
        $site_images = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $site_images[] = $this->saveFile($image, 'construction_bookings/img');
            }
        }

        // حفظ ملفات السجل التجاري إن وجدت
        $commercial_registry_files = [];
        if ($request->hasFile('commercial_registry_files')) {
            foreach ($request->file('commercial_registry_files') as $file) {
                $commercial_registry_files[] = $this->saveFile($file, 'commercial_registries/img');
            }
        }

        // حفظ بيانات الحجز
        Construction_booking::create([
            'type' => $request->type,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'city' => $request->city,
            'service_id' => $request->service_id,
            'approximate_area' => $request->approximate_area,
            'image' => json_encode($site_images), // تخزين الصور كـ JSON array
            'commercial_registry_files' => json_encode($commercial_registry_files), // تخزين ملفات السجل التجاري
            'status' => '0',
        ]);

        return redirect()->route('construction_bookingss')->with('success', 'تم إنشاء الحجز بنجاح!');
    }

    function saveFile($file, $folder)
    {
        $file_extension = $file->getClientOriginalExtension();
        $file_name = uniqid() . '.' . $file_extension;  // استخدام uniqid لضمان أن الاسم فريد
        $path = public_path($folder);

        // التأكد من أن المجلد موجود، وإن لم يكن، نقوم بإنشائه
        if (!file_exists($path)) {
            mkdir($path, 0777, true);  // إنشاء المجلد إذا لم يكن موجودًا
        }

        // حفظ الملف في المجلد المحدد
        $file->move($path, $file_name);
        return $file_name;
    }

    /**
     * عرض نموذج تعديل حجز موجود.
     */
    public function edit($id)
    {
        $booking = Construction_booking::with('constructionService')->findOrFail($id);
        $services = Construction_service::all();
        return view('admin.construction_bookings.edit', compact('booking', 'services'));
    }

    /**
     * تحديث حجز في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $booking = Construction_booking::findOrFail($id);

        // حفظ الصور المرفوعة إن وجدت
        $site_images = json_decode($booking->site_images, true);
        if ($request->hasFile('site_images')) {
            foreach ($request->file('site_images') as $image) {
                $site_images[] = $this->saveImage($image, 'img/construction_bookings');
            }
        }

        $booking->update([
            'type' => $request->type,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'city' => $request->city,
            'service_id' => $request->service_id,
            'approximate_area' => $request->approximate_area,
            'site_images' => json_encode($site_images),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.dashboard.construction_booking.index')->with('success', 'تم تعديل الحجز بنجاح!');
    }

    /**
     * حذف حجز من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $booking = Construction_booking::findOrFail($id);
        $booking->delete();

        return back()->with('success', 'تم حذف الحجز بنجاح!');
    }
}
