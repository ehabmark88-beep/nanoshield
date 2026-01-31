<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceAppointment;
use App\Models\Offers;
use App\Models\Wash_booking;
use App\Models\Package; // موديل جدول packages
use App\Models\Order;        // جدول orders
use App\Models\Product;      // جدول products فيه name, name_en
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Branch;


class ProfileController extends Controller
{
    
    public function __construct()

    {
        $this->middleware('auth');  // تأكد من أن العميل مسجل الدخول
    }

  public function cancelBooking($id)
    {
        $user = Auth::user();

        // جلب الحجز والتأكد إنه تابع للمستخدم
        $booking = Wash_booking::where('id', $id)
            ->where('email', $user->email)
            ->firstOrFail();

        // السماح بالإلغاء فقط لو الحالة = 1
        if ($booking->status != 1 && $booking->status !== 'pending') {
            return redirect()->back()->with('error', 
                __('messages.cannot_cancel_booking') ?? 'لا يمكن إلغاء هذا الطلب'
            );
        }

        // تحديث الحالة إلى ملغي
        $booking->update([
            'status' => 2
        ]);

        return redirect()->back()->with('success',
            __('messages.booking_cancelled_successfully') ?? 'تم إلغاء الطلب بنجاح'
        );
    }
    

public function show()
{
    $user   = Auth::user();
    $offers = Offers::all();
    $isAr   = app()->getLocale() === 'ar';

    /* ================= الحجوزات ================= */
$bookings = Wash_booking::with([
        'branch',
        'flatbed.flatbed_type' // ⭐ الاسم الصح
    ])
    ->select(
        'id',
        'date',
        'time',
        'packages',
        'total_price',
        'status',
        'flatbed_id',
        'branch_id',
        'created_at'
    )
    ->where('email', $user->email)
    ->orderByDesc('date')
    ->orderBy('time')
    ->get();


    /* ===== استخراج أسماء الباقات ===== */
    $extractIds = function ($raw) {
        if (is_array($raw)) {
            $arr = $raw;
        } else {
            $arr = json_decode($raw, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $arr = preg_split('/[,\n،]+/u', (string)$raw, -1, PREG_SPLIT_NO_EMPTY);
            }
        }

        return collect((array)$arr)->map(function ($item) {
            if (is_array($item)) {
                return $item['id'] ?? $item['package_id'] ?? null;
            }
            return is_numeric($item) ? (int)$item : null;
        })->filter()->values();
    };

    $allPackageIds = $bookings
        ->flatMap(fn($b) => $extractIds($b->packages))
        ->unique()
        ->values();

    $packagesMap = $allPackageIds->isNotEmpty()
        ? Package::whereIn('id', $allPackageIds)
            ->get(['id', 'name', 'name_en'])
            ->keyBy('id')
        : collect();

    $bookings->transform(function ($b) use ($extractIds, $packagesMap, $isAr) {
        $ids = $extractIds($b->packages);
        $b->package_names = $ids->map(function ($id) use ($packagesMap, $isAr) {
            $pkg = $packagesMap->get($id);
            if (!$pkg) return "Package #{$id}";
            return $isAr
                ? ($pkg->name ?? "Package #{$id}")
                : ($pkg->name_en ?? $pkg->name ?? "Package #{$id}");
        })->all();
        return $b;
    });

    /* ----------------- الأوردرات ----------------- */
    $orders = Order::select(
            'id','created_at','product_ids','final_price',
            'payment_method','status'
        )
        ->where('email', $user->email)
        ->orderByDesc('created_at')
        ->get();

    $allProductIds = $orders->flatMap(function ($o) {
        $decoded = is_array($o->product_ids)
            ? $o->product_ids
            : json_decode($o->product_ids, true);

        if (!is_array($decoded)) return [];
        return collect($decoded)->pluck('product_id')->filter();
    })->unique()->values();

    $productsMap = $allProductIds->isNotEmpty()
        ? Product::whereIn('id', $allProductIds)
            ->get(['id','name_ar','name'])
            ->keyBy('id')
        : collect();

    $orders->transform(function ($o) use ($productsMap, $isAr) {

        $decoded = is_array($o->product_ids)
            ? $o->product_ids
            : json_decode($o->product_ids, true);

        $items = [];
        $hasFlatbed = false;

        if (is_array($decoded)) {
            foreach ($decoded as $row) {
                $pid  = isset($row['product_id']) ? (int)$row['product_id'] : null;
                $qty  = isset($row['quantity']) ? (int)$row['quantity'] : 1;
                $prod = $pid ? $productsMap->get($pid) : null;

                $name = $prod
                    ? ($isAr ? ($prod->name_ar ?? '') : ($prod->name ?? $prod->name_ar))
                    : "Product #{$pid}";

                // 👈 اكتشاف الساطحة
                if (
                    str_contains($name, 'ساطحة') ||
                    str_contains(strtolower($name), 'tow') ||
                    str_contains(strtolower($name), 'flatbed')
                ) {
                    $hasFlatbed = true;
                }

                $items[] = [
                    'name' => $name,
                    'qty'  => $qty
                ];
            }
        }

        $o->product_items = $items;
        $o->has_flatbed   = $hasFlatbed; // ⭐ مهم
        return $o;
    });

    /* ----------------- نقاط الولاء ----------------- */
    $orders->transform(function ($order) use ($user) {
        if ($order->status == 4) {
            $ledger = DB::table('loyalty_points_ledger')
                ->where('email', $user->email)
                ->where('note', 'like', '%أوردر #' . $order->id . '%')
                ->orderByDesc('created_at')
                ->first();

            $order->loyalty_points    = $ledger->points ?? null;
            $order->points_expires_at = $ledger->expires_at ?? null;
        } else {
            $order->loyalty_points    = null;
            $order->points_expires_at = null;
        }
        return $order;
    });

    /* ----------------- مواعيد الصيانة ----------------- */
    $maintenanceAppointments = MaintenanceAppointment::with('branch')
        ->where(function ($q) use ($user) {
            if ($user->phone) $q->where('phone', $user->phone);
            if ($user->email) $q->orWhere('email', $user->email);
        })
        ->orderByDesc('appointment_date')
        ->orderByDesc('appointment_time')
        ->get();

    /* ----------------- إجمالي النقاط ----------------- */
    $availablePoints = DB::table('loyalty_points_ledger')
        ->where('email', $user->email)
        ->where('status', 'active')
        ->where(function ($q) {
            $q->whereNull('expires_at')
              ->orWhere('expires_at', '>', now());
        })
        ->sum('points');

$branches = Branch::select('id', 'branch_name', 'branch_name_ar')
    ->where('governorate_id', '!=', 5)
    ->get();

    return view(
        'auth.profile.show',
        compact(
            'user',
            'offers',
            'bookings',
            'orders',
            'maintenanceAppointments',
            'availablePoints',
            'branches'
        )
    );
}



    public function edit()
    {
        $offers = Offers::all();
        $user = Auth::user();
        return view('auth.profile.edit', compact('user','offers'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // التحقق من البيانات
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // تحديث الاسم والبريد الإلكتروني
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // التحقق من كلمة المرور الحالية وتحديثها إذا كانت مطلوبة
        if (!empty($validatedData['current_password']) && !empty($validatedData['password'])) {
            if (!Hash::check($validatedData['current_password'], $user->password)) {
                return back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة']);
            }
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'تم تحديث الحساب بنجاح');
    }

public function availableTimes(Request $request)
{
    $branchId = $request->branch_id;
    $date     = $request->date;

    // =========================
    // Validation
    // =========================
    if (
        !is_numeric($branchId) ||
        !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)
    ) {
        return response()->json([], 400);
    }

    try {
        // =========================
        // ⏰ ساعات العمل (12 PM → 10 PM)
        // =========================
        $startHour = 12; // 12 PM
        $endHour   = 22; // 10 PM

        // كل المواعيد (24h)
        $allTimes = [];
        for ($h = $startHour; $h < $endHour; $h++) {
            $allTimes[] = sprintf('%02d:00', $h); // 13:00
        }

        // =========================
        // 📌 المواعيد المحجوزة (تحويلها لـ 24h)
        // =========================
        $bookedTimes = Wash_booking::where('branch_id', $branchId)
            ->whereDate('date', $date)
            ->whereIn('status', [1, 3, 4])
            ->pluck('time')
            ->map(function ($time) {
                // مثال: PM 5:00 → 17:00
                return \Carbon\Carbon::createFromFormat('A g:i', trim($time))
                    ->format('H:00');
            })
            ->toArray();

        // =========================
        // منع وقت عدى لو النهارده
        // =========================
        if ($date === now()->format('Y-m-d')) {
            $currentHour = now()->hour;

            $allTimes = array_filter($allTimes, function ($time) use ($currentHour) {
                return (int) substr($time, 0, 2) > $currentHour;
            });
        }

        // =========================
        // ⛔ استبعاد المحجوز
        // =========================
        $available24 = array_values(array_diff($allTimes, $bookedTimes));

        // =========================
        // 🎨 تحويل للعرض (AM / PM)
        // =========================
        $availableDisplay = array_map(function ($time24) {
            return \Carbon\Carbon::createFromFormat('H:i', $time24)
                ->format('A g:i'); // PM 4:00
        }, $available24);

        return response()->json($availableDisplay);

    } catch (\Throwable $e) {
        return response()->json([], 500);
    }
}



}
