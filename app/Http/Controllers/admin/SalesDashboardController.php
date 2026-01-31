<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wash_booking;
use App\Models\Branch;
use App\Models\Package;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SalesDashboardController extends Controller
{
    public function index(Request $request)
    {
        // الفروع
        $branches = Branch::orderBy('branch_name_ar')->get();

        // فلتر الفرع والمدّة المخصّصة
        $branchId = $request->get('branch_id');
        $from     = $request->get('from');
        $to       = $request->get('to');
        $status = $request->get('status');


        // تواريخ أساسية
        $today          = Carbon::today();
        $yesterday      = Carbon::yesterday();
        $weekStart      = Carbon::now()->startOfWeek();
        $weekEnd        = Carbon::now()->endOfWeek();
        $monthStart     = Carbon::now()->startOfMonth();
        $monthEnd       = Carbon::now()->endOfMonth();
        $lastMonthStart = Carbon::now()->subMonthNoOverflow()->startOfMonth();
        $lastMonthEnd   = Carbon::now()->subMonthNoOverflow()->endOfMonth();

        // كويري أساسي مع فلتر الفرع فقط (كل الحالات من غير فلتر status)
// كويري أساسي مع فلتر الفرع + حالة الحجز
$baseQuery = Wash_booking::query();

if ($branchId) {
    $baseQuery->where('branch_id', $branchId);
}

if ($status !== null && $status !== '') {
    $baseQuery->where('status', $status);
}


        // دالة مساعدة لحساب إجمالي طلبات + إجمالي مبلغ
        $calc = function ($query) {
            return $query
                ->selectRaw('COUNT(*) as orders_count, COALESCE(SUM(total_price),0) as total_amount')
                ->first();
        };

        // إجمالي كلي (من أول النظام)
        $totalStats = $calc(clone $baseQuery);

        // اليوم
        $todayStats = $calc(
            (clone $baseQuery)->whereDate('date', $today)
        );

        // أمس
        $yesterdayStats = $calc(
            (clone $baseQuery)->whereDate('date', $yesterday)
        );

        // آخر 7 أيام
        $last7DaysStats = $calc(
            (clone $baseQuery)->whereBetween('date', [
                Carbon::now()->subDays(6)->toDateString(),
                $today->toDateString()
            ])
        );

        // هذا الأسبوع
        $thisWeekStats = $calc(
            (clone $baseQuery)->whereBetween('date', [
                $weekStart->toDateString(),
                $weekEnd->toDateString()
            ])
        );

        // هذا الشهر
        $thisMonthStats = $calc(
            (clone $baseQuery)->whereBetween('date', [
                $monthStart->toDateString(),
                $monthEnd->toDateString()
            ])
        );

        // الشهر الماضي
        $lastMonthStats = $calc(
            (clone $baseQuery)->whereBetween('date', [
                $lastMonthStart->toDateString(),
                $lastMonthEnd->toDateString()
            ])
        );

        // مدة مخصّصة من الفورم
        if ($from && $to) {
            $customFromCarbon = Carbon::parse($from)->startOfDay();
            $customToCarbon   = Carbon::parse($to)->endOfDay();
        } else {
            // افتراضي: آخر 30 يوم
            $customFromCarbon = Carbon::now()->subDays(29)->startOfDay();
            $customToCarbon   = $today->endOfDay();
        }

        $customFrom = $customFromCarbon->toDateString();
        $customTo   = $customToCarbon->toDateString();

        $customStats = $calc(
            (clone $baseQuery)->whereBetween('date', [$customFrom, $customTo])
        );

        $daysInRange = max(1, $customFromCarbon->diffInDays($customToCarbon) + 1);

        /**
         * ================================
         *   نسبة الدفع أونلاين vs في الفرع
         * ================================
         */
        $paymentsQuery = (clone $baseQuery)
            ->whereBetween('date', [$customFrom, $customTo]);

        $totalOrdersPayments = (clone $paymentsQuery)->count();

        // عدد الطلبات دفع في الفرع
        $branchOrders = (clone $paymentsQuery)
            ->where('payment_method', 'payBranch')
            ->count();

        // الباقي يُعتبر أونلاين
        $onlineOrders = max(0, $totalOrdersPayments - $branchOrders);

        // مبلغ الدفع في الفرع
        $branchAmount = (clone $paymentsQuery)
            ->where('payment_method', 'payBranch')
            ->sum('total_price');

        // إجمالي المبلغ في المدى
        $totalAmountRange = (float) ($customStats->total_amount ?? 0);
        // الباقي أونلاين (لو طلع بالسالب نصفره)
        $onlineAmount = max(0, $totalAmountRange - $branchAmount);

        // تجهيز نسب آمنة (بدون أي قسمة على صفر)
        $branchOrdersRatio = $totalOrdersPayments > 0
            ? round(($branchOrders / $totalOrdersPayments) * 100, 1)
            : 0;

        $onlineOrdersRatio = $totalOrdersPayments > 0
            ? round(($onlineOrders / $totalOrdersPayments) * 100, 1)
            : 0;

        $branchAmountRatio = $totalAmountRange > 0
            ? round(($branchAmount / $totalAmountRange) * 100, 1)
            : 0;

        $onlineAmountRatio = $totalAmountRange > 0
            ? round(($onlineAmount / $totalAmountRange) * 100, 1)
            : 0;

        $paymentsBreakdown = [
            'total_orders'          => $totalOrdersPayments,

            'branch_orders'         => $branchOrders,
            'online_orders'         => $onlineOrders,
            'branch_orders_ratio'   => $branchOrdersRatio,
            'online_orders_ratio'   => $onlineOrdersRatio,

            'branch_amount'         => $branchAmount,
            'online_amount'         => $onlineAmount,
            'branch_amount_ratio'   => $branchAmountRatio,
            'online_amount_ratio'   => $onlineAmountRatio,
        ];

        /**
         * 1) متوسط قيمة الطلب الواحد
         */
        $avgOrderValues = [
            'today'      => $todayStats->orders_count     ? $todayStats->total_amount     / $todayStats->orders_count     : 0,
            'thisWeek'   => $thisWeekStats->orders_count  ? $thisWeekStats->total_amount  / $thisWeekStats->orders_count  : 0,
            'thisMonth'  => $thisMonthStats->orders_count ? $thisMonthStats->total_amount / $thisMonthStats->orders_count : 0,
            'custom'     => $customStats->orders_count    ? $customStats->total_amount    / $customStats->orders_count    : 0,
        ];

        /**
         * 2) عملاء فريدين + جدد / عائدين في المدة
         */
        $customersInRangeQuery = (clone $baseQuery)
            ->whereBetween('date', [$customFrom, $customTo])
            ->whereNotNull('phone_number');

        $customersInRange = $customersInRangeQuery
            ->select('phone_number')
            ->distinct()
            ->pluck('phone_number')
            ->toArray();

        $uniqueCustomersCount = count($customersInRange);

        $customersBeforeRange = (clone $baseQuery)
            ->where('date', '<', $customFrom)
            ->whereNotNull('phone_number')
            ->whereIn('phone_number', $customersInRange)
            ->select('phone_number')
            ->distinct()
            ->pluck('phone_number')
            ->toArray();

        $returningCustomersCount = count($customersBeforeRange);
        $newCustomersCount       = max(0, $uniqueCustomersCount - $returningCustomersCount);

        $customerMix = [
            'unique_customers'    => $uniqueCustomersCount,
            'new_customers'       => $newCustomersCount,
            'returning_customers' => $returningCustomersCount,
            'new_ratio'           => $uniqueCustomersCount
                ? ($newCustomersCount / $uniqueCustomersCount) * 100
                : 0,
            'returning_ratio'     => $uniqueCustomersCount
                ? ($returningCustomersCount / $uniqueCustomersCount) * 100
                : 0,
        ];

        /**
         * 3) معدل نمو المبيعات
         */
        $growthTodayVsYesterday = null;
        if ($yesterdayStats->total_amount > 0) {
            $growthTodayVsYesterday = (
                ($todayStats->total_amount - $yesterdayStats->total_amount)
                / $yesterdayStats->total_amount
            ) * 100;
        }

        $growthThisMonthVsLastMonth = null;
        if ($lastMonthStats->total_amount > 0) {
            $growthThisMonthVsLastMonth = (
                ($thisMonthStats->total_amount - $lastMonthStats->total_amount)
                / $lastMonthStats->total_amount
            ) * 100;
        }

        $salesGrowth = [
            'today_vs_yesterday'     => $growthTodayVsYesterday,
            'thisMonth_vs_lastMonth' => $growthThisMonthVsLastMonth,
        ];

        /**
         * 4) إحصائيات التشغيل - Throughput (من date + time)
         *   time في الداتابيز بالشكل: "PM 5:00"
         */

        // عدد الغسلات في اليوم (من عمود date)
        $throughputByDay = (clone $baseQuery)
            ->whereBetween('date', [$customFrom, $customTo])
            ->selectRaw('date, COUNT(*) as washes_count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // نجيب كل الحجوزات اللي فيها time في المدى
        $timeBookings = (clone $baseQuery)
            ->whereBetween('date', [$customFrom, $customTo])
            ->whereNotNull('time')
            ->get(['date', 'time']);

        $hourCounts     = []; // [hour => count]
        $heatmapCounts  = []; // [weekday][hour] => count

        foreach ($timeBookings as $booking) {
            $timeStr = trim($booking->time);
            if ($timeStr === '') {
                continue;
            }

            // لو الوقت مكتوب Range زي "PM 5:00 - PM 6:00" ناخد أول جزء بس
            if (strpos($timeStr, '-') !== false) {
                $parts   = explode('-', $timeStr);
                $timeStr = trim($parts[0]);
            }

            $parsed = null;

            // فورمات محتملة للوقت
            $formats = [
                'A g:i',    // "PM 5:00" أو "AM 9:30"
                'A g:i:s',
                'g:i A',    // "5:00 PM"
                'g:i a',    // "5:00 pm"
                'g:iA',
                'g:ia',
                'H:i',      // "17:00"
                'H:i:s',    // "17:00:00"
            ];

            foreach ($formats as $format) {
                try {
                    $parsed = Carbon::createFromFormat($format, $timeStr);
                    break;
                } catch (\Exception $e) {
                    // نجرب فورمات تاني
                }
            }

            // لو ماعرفناش نفك الوقت، نطنشه
            if (!$parsed) {
                continue;
            }

            // ساعة 0–23
            $hour = (int) $parsed->format('H');

            // نحسب اليوم من عمود date
            $weekday = Carbon::parse($booking->date)->weekday(); // 0 الاثنين ... 6 الأحد

            // تجميع حسب الساعة
            if (!isset($hourCounts[$hour])) {
                $hourCounts[$hour] = 0;
            }
            $hourCounts[$hour]++;

            // تجميع للـ Heatmap: يوم × ساعة
            if (!isset($heatmapCounts[$weekday])) {
                $heatmapCounts[$weekday] = [];
            }
            if (!isset($heatmapCounts[$weekday][$hour])) {
                $heatmapCounts[$weekday][$hour] = 0;
            }
            $heatmapCounts[$weekday][$hour]++;
        }

        // تحويل عدد الغسلات في الساعة إلى Collection
        $throughputByHour = collect($hourCounts)
            ->map(function ($count, $hour) {
                return (object)[
                    'hour'         => (int) $hour,
                    'washes_count' => $count,
                ];
            })
            ->sortBy('hour')
            ->values();

        // تحويل Heatmap إلى Collection من Objects
        $heatmapDataArray = [];
        foreach ($heatmapCounts as $weekday => $hours) {
            foreach ($hours as $hour => $count) {
                $heatmapDataArray[] = (object)[
                    'weekday'      => (int) $weekday,  // 0–6
                    'hour'         => (int) $hour,     // 0–23
                    'washes_count' => $count,
                ];
            }
        }

        $heatmapData = collect($heatmapDataArray);

        // متوسط زمن الخدمة (duration بالدقيقة)
        $avgServiceDuration = (clone $baseQuery)
            ->whereBetween('date', [$customFrom, $customTo])
            ->whereNotNull('duration')
            ->avg('duration');

        /**
         * 5) إحصائيات الفروع
         */
        $branchStats = (clone $baseQuery)
            ->whereBetween('date', [$customFrom, $customTo])
            ->with('branch')
            ->get()
            ->groupBy('branch_id')
            ->map(function ($items) use ($daysInRange, $customStats) {
                $first       = $items->first();
                $totalAmount = $items->sum('total_price');
                $ordersCount = $items->count();

                return [
                    'branch_id'          => $first->branch_id,
                    'branch_name'        => optional($first->branch)->branch_name_ar ?? 'فرع غير محدد',
                    'orders_count'       => $ordersCount,
                    'total_amount'       => $totalAmount,
                    'avg_per_day'        => $daysInRange ? $totalAmount / $daysInRange : 0,
                    'avg_orders_per_day' => $daysInRange ? $ordersCount / $daysInRange : 0,
                    'contribution'       => ($customStats->total_amount > 0)
                        ? ($totalAmount / $customStats->total_amount) * 100
                        : 0,
                ];
            })
            ->sortByDesc('total_amount');

        $bestBranchByRevenue = $branchStats->sortByDesc('total_amount')->first();
        $bestBranchByOrders  = $branchStats->sortByDesc('orders_count')->first();
        $topBranches         = $branchStats->take(5);

        /**
         * 6) إحصائيات الباكدجات
         */
        $buildPackageStats = function ($fromDate, $toDate) use ($baseQuery) {
            $rangeBookings = (clone $baseQuery)
                ->whereBetween('date', [$fromDate, $toDate])
                ->get(['packages']);

            $packagesStats = [];

            foreach ($rangeBookings as $booking) {
                $raw = $booking->packages;

                if (!$raw) {
                    continue;
                }

                $decoded = json_decode($raw, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    if (is_int($decoded) || is_string($decoded)) {
                        $decoded = [(int) $decoded];
                    }

                    if (!is_array($decoded)) {
                        $decoded = [$decoded];
                    }
                } else {
                    if (is_numeric($raw)) {
                        $decoded = [(int) $raw];
                    } else {
                        continue;
                    }
                }

                foreach ($decoded as $pkg) {
                    if (is_int($pkg) || is_numeric($pkg)) {
                        $packageId = (int) $pkg;
                    } elseif (is_array($pkg)) {
                        $packageId = $pkg['id']
                            ?? $pkg['package_id']
                            ?? null;
                    } else {
                        continue;
                    }

                    if (!$packageId) {
                        continue;
                    }

                    if (!isset($packagesStats[$packageId])) {
                        $packagesStats[$packageId] = [
                            'id'  => $packageId,
                            'qty' => 0,
                        ];
                    }

                    $packagesStats[$packageId]['qty'] += 1;
                }
            }

            $packageIds = array_keys($packagesStats);
            if (count($packageIds) === 0) {
                return $packagesStats;
            }

            $packageModels = Package::whereIn('id', $packageIds)
                ->get()
                ->keyBy('id');

            foreach ($packagesStats as $id => &$row) {
                $model = $packageModels->get($id);

                if ($model) {
                    $unitPrice = $model->discounted_price > 0 ? $model->discounted_price : $model->price;

                    $row['name']                 = $model->name;
                    $row['unit_price']           = $unitPrice;
                    $row['revenue']              = $row['qty'] * $unitPrice;
                    $row['avg_revenue_per_sale'] = $row['qty'] ? $row['revenue'] / $row['qty'] : 0;
                } else {
                    $row['name']                 = 'باكدج #' . $id;
                    $row['unit_price']           = 0;
                    $row['revenue']              = 0;
                    $row['avg_revenue_per_sale'] = 0;
                }
            }

            return $packagesStats;
        };

        // باكدجات في المدة المختارة
        $packagesStatsCustom = $buildPackageStats($customFrom, $customTo);

        $topPackagesByRevenue = collect($packagesStatsCustom)
            ->sortByDesc('revenue')
            ->values()
            ->take(10);

        $topPackagesByQty = collect($packagesStatsCustom)
            ->sortByDesc('qty')
            ->values()
            ->take(10);

        // باكدجات ضعيفة الأداء في الشهر الماضي
        $packagesStatsLastMonth = $buildPackageStats(
            $lastMonthStart->toDateString(),
            $lastMonthEnd->toDateString()
        );

        $weakPackagesLastMonth = collect($packagesStatsLastMonth)
            ->sortBy('qty')
            ->values()
            ->take(5);

        /**
         * 7) إحصائيات العملاء والولاء
         */
        // آخر 30 يوم
        $last30From = Carbon::now()->subDays(29)->toDateString();
        $last30To   = $today->toDateString();

        $last30Stats = (clone $baseQuery)
            ->whereBetween('date', [$last30From, $last30To])
            ->whereNotNull('phone_number')
            ->selectRaw('phone_number, COUNT(*) as cnt')
            ->groupBy('phone_number')
            ->get();

        $unique30 = $last30Stats->count();
        $repeat30 = $last30Stats->where('cnt', '>', 1)->count();
        $rate30   = $unique30 ? ($repeat30 / $unique30) * 100 : 0;

        // آخر 90 يوم
        $last90From = Carbon::now()->subDays(89)->toDateString();
        $last90To   = $today->toDateString();

        $last90Stats = (clone $baseQuery)
            ->whereBetween('date', [$last90From, $last90To])
            ->whereNotNull('phone_number')
            ->selectRaw('phone_number, COUNT(*) as cnt')
            ->groupBy('phone_number')
            ->get();

        $unique90 = $last90Stats->count();
        $repeat90 = $last90Stats->where('cnt', '>', 1)->count();
        $rate90   = $unique90 ? ($repeat90 / $unique90) * 100 : 0;

        $repeatRates = [
            'last30' => [
                'from'        => $last30From,
                'to'          => $last30To,
                'unique'      => $unique30,
                'repeat'      => $repeat30,
                'repeat_rate' => $rate30,
            ],
            'last90' => [
                'from'        => $last90From,
                'to'          => $last90To,
                'unique'      => $unique90,
                'repeat'      => $repeat90,
                'repeat_rate' => $rate90,
            ],
        ];

        // أعلى 10 عملاء من حيث الصرف في المدة المختارة
        $topCustomers = (clone $baseQuery)
            ->whereBetween('date', [$customFrom, $customTo])
            ->whereNotNull('phone_number')
            ->selectRaw('phone_number, name, COUNT(*) as orders_count, SUM(total_price) as total_amount')
            ->groupBy('phone_number', 'name')
            ->orderByDesc('total_amount')
            ->limit(10)
            ->get();

        return view('admin.sales-dashboard', [
            'branches'               => $branches,
            'branchId'               => $branchId,
            'from'                   => $from,
            'to'                     => $to,
            'status'   => $status,

            'todayStats'             => $todayStats,
            'yesterdayStats'         => $yesterdayStats,
            'last7DaysStats'         => $last7DaysStats,
            'thisWeekStats'          => $thisWeekStats,
            'thisMonthStats'         => $thisMonthStats,
            'lastMonthStats'         => $lastMonthStats,
            'customStats'            => $customStats,
            'totalStats'             => $totalStats,
            'customFrom'             => $customFrom,
            'customTo'               => $customTo,

            'avgOrderValues'         => $avgOrderValues,
            'customerMix'            => $customerMix,
            'salesGrowth'            => $salesGrowth,

            'throughputByDay'        => $throughputByDay,
            'throughputByHour'       => $throughputByHour,
            'heatmapData'            => $heatmapData,
            'avgServiceDuration'     => $avgServiceDuration,

            'branchStats'            => $branchStats,
            'bestBranchByRevenue'    => $bestBranchByRevenue,
            'bestBranchByOrders'     => $bestBranchByOrders,
            'topBranches'            => $topBranches,

            'topPackagesByRevenue'   => $topPackagesByRevenue,
            'topPackagesByQty'       => $topPackagesByQty,
            'weakPackagesLastMonth'  => $weakPackagesLastMonth,

            'repeatRates'            => $repeatRates,
            'topCustomers'           => $topCustomers,

            'paymentsBreakdown'      => $paymentsBreakdown,
        ]);
    }
}
