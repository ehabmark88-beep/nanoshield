<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait; // إذا كنت تستخدم Trait للتعامل مع الصور
use App\Models\Wash_booking;
use App\Models\Car;
use App\Models\Package;
use App\Models\Additional_service;
use App\Models\Branch;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WashBookingController extends Controller
{
    use ImageTrait; // استخدم هذا إذا كنت تحتاج إلى التعامل مع الصور

    public function index()
    {
        $washBookings = Wash_booking::with('car', 'packages', 'additionalServices', 'branch', 'coupon')->get();
        return view('admin.wash_booking.index', compact('washBookings'));
    }

    /**
     * عرض نموذج إنشاء حجز جديد.
     */
    public function create()
    {
        $cars = Car::all();
        $packages = Package::all();
        $additionalServices = Additional_service::all();
        $branches = Branch::all();
        $coupons = Coupon::all();
        return view('admin.wash_booking.create', compact('cars', 'packages', 'additionalServices', 'branches', 'coupons'));
    }

    /**
     * تخزين حجز مغسلة جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email',
            'packages' => 'required|array',
            'packages.*' => 'exists:packages,id',
            'additional_services' => 'nullable|array',
            'additional_services.*' => 'exists:additional_services,id',
            'branch_id' => 'required|exists:branches,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'execution_duration' => 'required|string',
            'discount_coupon' => 'nullable|exists:coupons,code',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        // تخزين حجز المغسلة
        $washBooking = Wash_booking::create([
            'car_id' => $request->car_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'branch_id' => $request->branch_id,
            'date' => $request->date,
            'time' => $request->time,
            'execution_duration' => $request->execution_duration,
            'discount_coupon' => $request->discount_coupon,
            'total_price' => $request->total_price,
            'payment_method' => $request->payment_method,
        ]);

        // ربط الحزم والخدمات الإضافية
        $washBooking->packages()->sync($request->packages);
        $washBooking->additionalServices()->sync($request->additional_services);

        return redirect()->route('admin.dashboard.wash_booking.index')->with('success', 'تم إضافة الحجز بنجاح!');
    }

    /**
     * عرض نموذج تعديل حجز موجود.
     */
    public function edit($id)
    {
        $washBooking = Wash_booking::findOrFail($id);
        $cars = Car::all();
        $packages = Package::all();
        $additionalServices = Additional_service::all();
        $branches = Branch::all();
        $coupons = Coupon::all();
        return view('admin.wash_booking.edit', compact('washBooking', 'cars', 'packages', 'additionalServices', 'branches', 'coupons'));
    }

    /**
     * تحديث حجز مغسلة في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email',
            'packages' => 'required|array',
            'packages.*' => 'exists:packages,id',
            'additional_services' => 'nullable|array',
            'additional_services.*' => 'exists:additional_services,id',
            'branch_id' => 'required|exists:branches,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'execution_duration' => 'required|string',
            'discount_coupon' => 'nullable|exists:coupons,code',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        // تحديث حجز المغسلة
        $washBooking = Wash_booking::findOrFail($id);
        $washBooking->update([
            'car_id' => $request->car_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'branch_id' => $request->branch_id,
            'date' => $request->date,
            'time' => $request->time,
            'execution_duration' => $request->execution_duration,
            'discount_coupon' => $request->discount_coupon,
            'total_price' => $request->total_price,
            'payment_method' => $request->payment_method,
        ]);

        // تحديث الحزم والخدمات الإضافية
        $washBooking->packages()->sync($request->packages);
        $washBooking->additionalServices()->sync($request->additional_services);

        return redirect()->route('admin.dashboard.wash_booking.index')->with('success', 'تم تعديل الحجز بنجاح!');
    }

    /**
     * حذف حجز مغسلة من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $washBooking = Wash_booking::findOrFail($id);
        $washBooking->packages()->detach();
        $washBooking->additionalServices()->detach();
        $washBooking->delete();

        return back()->with('success', 'تم حذف الحجز بنجاح!');
    }


    public function getBookedTimesByBranchAndDate($branchId, $date)
    {
        // Validate inputs
        if (!is_numeric($branchId) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            return response()->json(['error' => 'Invalid input'], 400);
        }

        try {
            // Fetch booked times
            $bookedTimes = Wash_booking::where('branch_id', $branchId)
                ->whereDate('date', $date)
                ->pluck('time')
                ->toArray();

            // Check if there are any booked times
//            if (empty($bookedTimes)) {
//                return response()->json([
//                    'message' => 'No booked times found for this date and branch.'
//                ], 404); // 404 Not Found
//            }

            // Add today date in the response for better context
            $today = date('Y-m-d');

            return response()->json([
                'today' => $today,
                'bookedTimes' => $bookedTimes
            ]);
        } catch (\Exception $e) {
            // Handle errors gracefully
            return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
        }
    }
}
