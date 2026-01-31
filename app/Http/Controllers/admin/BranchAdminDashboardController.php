<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Additional_service;
use App\Models\Branch;
use App\Models\Package;
use App\Models\Wash_booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MaintenanceAppointment;


class BranchAdminDashboardController extends Controller
{
   public function index($branch_id)
{
    $admin = Auth::guard('admin')->user();

    if (!$admin) {
        return redirect()->route('admin.dashboard.login');
    }

    if ($admin->role === 'super_admin') {
        return view('admin.home');
    }

    if ($admin->role === 'branch_admin' && $admin->branch_id != $branch_id) {
        return redirect()->route('admin.dashboard.branch', ['branch_id' => $admin->branch_id])
            ->withErrors(['error' => 'You do not have permission to access this branch.']);
    }

    // 👇 التعديل هنا فقط
    $bookings = Wash_booking::with(['flatbed.flatbed_type'])
        ->where('branch_id', $branch_id)
        ->whereDate('date', '>=', now()->toDateString())
        ->where('status', '!=', 'close')
        ->get();

    $locale = app()->getLocale();

    $bookings->map(function ($booking) use ($locale) {

        $toIdArray = function ($value) {
            if (empty($value)) return [];
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return array_values(array_filter((array) $decoded));
            }
            if (is_numeric($value)) return [(int)$value];
            return [];
        };

        $packageIds = $toIdArray($booking->packages);
        $booking->package_names = !empty($packageIds)
            ? Package::whereIn('id', $packageIds)
                ->pluck($locale === 'ar' ? 'name' : 'name_en')
                ->toArray()
            : [];

        $serviceIds = $toIdArray($booking->additional_services);
        $booking->service_names = !empty($serviceIds)
            ? Additional_service::whereIn('id', $serviceIds)
                ->pluck($locale === 'ar' ? 'name' : 'name_en')
                ->toArray()
            : [];

        return $booking;
    });

    $branch = Branch::find($branch_id);
    $branchName = $branch
        ? ($locale === 'ar' ? $branch->branch_name_ar : $branch->branch_name)
        : __('messages.unknown_branch');

    return view('admin.branches.view', compact('bookings', 'branchName', 'branch_id'));
}


public function old_view($branch_id)
{
    $admin = Auth::guard('admin')->user();

    if (!$admin) {
        return redirect()->route('admin.dashboard.login');
    }

    if ($admin->role === 'super_admin') {
        return view('admin.home');
    }

    if ($admin->role === 'branch_admin' && $admin->branch_id != $branch_id) {
        return redirect()->route('admin.dashboard.branch', ['branch_id' => $admin->branch_id])
            ->withErrors(['error' => 'You do not have permission to access this branch.']);
    }

    // 👇 نفس التعديل
    $bookings = Wash_booking::with(['flatbed.flatbed_type'])
        ->where('branch_id', $branch_id)
        ->whereDate('date', '<', now()->toDateString())
        ->where('status', '!=', 'close')
        ->get();

    $bookings->map(function ($booking) {

        $packageIds = json_decode($booking->packages, true) ?? [];
        $booking->package_names = !empty($packageIds)
            ? Package::whereIn('id', $packageIds)->pluck('name')->toArray()
            : [];

        $serviceIds = json_decode($booking->additional_services, true) ?? [];
        $booking->service_names = !empty($serviceIds)
            ? Additional_service::whereIn('id', $serviceIds)->pluck('name_ar')->toArray()
            : [];

        return $booking;
    });

    $branchName = Branch::find($branch_id)->branch_name_ar;

    return view('admin.branches.view', compact('bookings', 'branchName', 'branch_id'));
}


public function open_time($id)
{
    $booking = Wash_booking::where('id', $id)
        ->where('status', 'close')
        ->firstOrFail();

    $branch_id = $booking->branch_id;

    // فتح الموعد = حذف السجل المقفول
    $booking->delete();

    return redirect()
        ->route('admin.dashboard.branch', $branch_id)
        ->with('success', 'تم فتح الموعد بنجاح');
}



    // صفحة غلق المواعيد
    public function close($branch_id)
    {
        $closedTimes = Wash_booking::where('branch_id', $branch_id)
            ->where('status', 'close')
            ->orderBy('date')
            ->orderBy('time')
            ->get();

        return view('admin.branches.close', compact('branch_id', 'closedTimes'));
    }

    // حفظ معاد مغلق
    public function close_time(Request $request)
    {
        $request->validate([
            'branch_id' => 'required',
            'date'      => 'required|date',
            'time'      => 'required',
        ]);

        Wash_booking::create([
            'car_id'              => 1,
            'name'                => 'branch',
            'phone_number'        => 0,
            'email'               => 'branch@gmail.com',
            'packages'            => 0,
            'additional_services' => 0,
            'branch_id'           => $request->branch_id,
            'date'                => $request->date,
            'time'                => $request->time,
            'total_price'         => 0,
            'duration'            => 0,
            'payment_method'      => 'branch',
            'coupon_id'           => null,
            'flatbed_id'           => null,
            'status'              => 'close',
        ]);

        return redirect()
            ->route('admin.dashboard.branch', $request->branch_id)
            ->with('success', 'تم غلق المعاد بنجاح!');
    }


    public function edit_booking($id, $branch_id)
    {
        $branches = Branch::all();
        $booking =  Wash_booking::findOrFail($id);
        return view('admin.branches.edit_booking', compact('branch_id','booking', 'branches'));
    }

public function update_booking(Request $request, $id)
{
    $booking = Wash_booking::findOrFail($id);

    // تحديث بيانات الحجز
    $booking->update([
        'name'         => $request->name,
        'phone_number' => $request->phone_number,
        'email'        => $request->email,
        'branch_id'    => $request->branch_id,
        'status'       => $request->status,
    ]);

    $totalPrice = (float) $booking->total_price;

    // ✅ جلب إعدادات نقاط الولاء
    $settings = DB::table('website_settings')
        ->select('loyalty_points_days', 'loyalty_points_conversion')
        ->first();

    $loyaltyDays = $settings->loyalty_points_days ?? 30;
    $conversion  = $settings->loyalty_points_conversion ?? 0;

    // ✅ حساب النقاط: كل 1000 ريال = X نقطة
    $pointsToAdd = 0;
    if ($conversion > 0 && $totalPrice > 0) {
        $pointsToAdd = (int) floor(($totalPrice / 1000) * $conversion);
    }

    // ✅ تم التسليم → إضافة نقاط
    if ($request->status == 4 && $pointsToAdd > 0) {

        $alreadyAdded = DB::table('loyalty_points_ledger')
            ->where('note', 'like', '%#' . $booking->id . '%')
            ->exists();

        if (!$alreadyAdded) {
            DB::table('loyalty_points_ledger')->insert([
                'email'       => $booking->email,
                'points'      => $pointsToAdd,
                'status'      => 'active',
                'created_at'  => now(),
                'expires_at'  => now()->addDays($loyaltyDays),
                'consumed_at' => null,
                'note'        => 'نقاط مكتسبة من أوردر #' . $booking->id .
                                 ' بقيمة ' . number_format($totalPrice, 2),
            ]);
        }

    } else {
        // ❌ أي حالة غير تم التسليم → حذف نقاط الأوردر
        DB::table('loyalty_points_ledger')
            ->where('note', 'like', '%#' . $booking->id . '%')
            ->delete();
    }

    return redirect()
        ->route('admin.dashboard.branch', ['branch_id' => $booking->branch_id])
        ->with('success', 'تم التحديث بنجاح');
}

    public function show($branch_id)
    {

    }

    public function maintenanceAppointments($branch_id)
{
    $admin = Auth::guard('admin')->user();

    if (!$admin) {
        return redirect()->route('admin.dashboard.login');
    }

    if ($admin->role === 'super_admin') {
        return view('admin.home');
    }

    if ($admin->role === 'branch_admin' && $admin->branch_id != $branch_id) {
        return redirect()->route('admin.dashboard.branch', ['branch_id' => $admin->branch_id])
            ->withErrors(['error' => 'You do not have permission to access this branch.']);
    }

    $locale = app()->getLocale();

    // الحجوزات الخاصة بالصيانة فقط
    $maintenanceAppointments = \App\Models\MaintenanceAppointment::where('branch_id', $branch_id)
        ->orderBy('appointment_date', 'desc')
        ->orderBy('appointment_time', 'desc')
        ->get();

    // اسم الفرع
    $branch = \App\Models\Branch::find($branch_id);
    $branchName = $branch ? ($locale === 'ar' ? $branch->branch_name_ar : $branch->branch_name) : __('messages.unknown_branch');

    return view('admin.branches.maintenance', compact('maintenanceAppointments', 'branchName', 'branch_id'));
}

public function editMaintenance($branch_id, $id)
{
    $appointment = MaintenanceAppointment::findOrFail($id);

    $admin = Auth::guard('admin')->user();
    if (!$admin) {
        return redirect()->route('admin.dashboard.login');
    }

    if ($admin->role === 'branch_admin' && $admin->branch_id != $branch_id) {
        return redirect()
            ->route('admin.dashboard.branch', ['branch_id' => $admin->branch_id])
            ->withErrors(['error' => 'You do not have permission to access this branch.']);
    }

    return view('admin.branches.maintenanceedit', compact('appointment', 'branch_id'));
}


public function updateMaintenanceStatus(Request $request, $branch_id, $id)
{
    $request->validate([
        'status' => 'required|in:pending,in_progress,completed,cancelled',
    ]);

    $appointment = MaintenanceAppointment::findOrFail($id);
    $appointment->status = $request->status;
    $appointment->save();

    return redirect()
        ->route('admin.dashboard.branch.maintenance', ['branch_id' => $branch_id])
        ->with('success', 'تم تحديث حالة الصيانة بنجاح');
}





}
