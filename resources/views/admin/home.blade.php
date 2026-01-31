@extends('admin.layouts.master')

@section('css')
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <style>
        /* تحسين بسيط لشكل الكروت والجداول */
        .custom-card {
            border-radius: 12px;
            border: 1px solid #e9ecef;
        }
        .sales-card {
            border-radius: 14px;
        }
        .card-header {
            border-bottom: 1px solid #f1f1f1;
        }
        .section-title {
            border-right: 3px solid #007bff;
            padding-right: 8px;
        }
        .circle-icon {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .bg-secondary-transparent {
            background: rgba(108, 117, 125, 0.1);
        }
        .bg-dark-transparent {
            background: rgba(52, 58, 64, 0.1);
        }
        .tx-11 { font-size: 11px; }
        .tx-12 { font-size: 12px; }
        .tx-13 { font-size: 13px; }

        /* تقليل المسافات بين الأقسام */
        .section-block {
            margin-bottom: 18px;
        }

        /* جدول heatmap – تصغير البادينج شوية */
        .table-sm td, .table-sm th {
            padding: .3rem .5rem;
        }
    </style>
@endsection

@section('page-header')
    <div class="breadcrumb-header d-flex justify-content-between align-items-center">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">لوحة إحصائيات المبيعات</h2>
                <p class="mg-b-0 tx-13 text-muted">نظرة شاملة على أداء المبيعات، التشغيل، الفروع، الباكدجات والعملاء.</p>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <span class="badge badge-primary mr-2 d-flex align-items-center">
                <i class="mdi mdi-view-dashboard-outline mr-1"></i> تقرير إداري
            </span>
            <span class="tx-12 text-muted d-flex align-items-center">
                <i class="mdi mdi-clock-outline mr-1"></i>
                آخر تحديث: {{ now()->format('Y-m-d H:i') }}
            </span>
        </div>
    </div>
@endsection

@section('content')

@section('content')

@php
    // ===============================
    // GLOBAL DEFAULTS (DO NOT REMOVE)
    // ===============================

    $customFrom = $customFrom ?? now()->subDays(29)->toDateString();
    $customTo   = $customTo   ?? now()->toDateString();

    $from     = $from     ?? request('from');
    $to       = $to       ?? request('to');
    $branchId = $branchId ?? request('branch_id');

    $branches = $branches ?? collect();

    // ===== Sales Stats Defaults =====
    $emptyStat = (object)[
        'orders_count' => 0,
        'total_amount' => 0,
    ];

    $todayStats      = $todayStats      ?? $emptyStat;
    $yesterdayStats  = $yesterdayStats  ?? $emptyStat;
    $last7DaysStats  = $last7DaysStats  ?? $emptyStat;
    $thisWeekStats   = $thisWeekStats   ?? $emptyStat;
    $thisMonthStats  = $thisMonthStats  ?? $emptyStat;
    $lastMonthStats  = $lastMonthStats  ?? $emptyStat;
    $customStats     = $customStats     ?? $emptyStat;
    $totalStats      = $totalStats      ?? $emptyStat;

    // ===== Payments =====
    $paymentsBreakdown = $paymentsBreakdown ?? [
        'total_orders'          => 0,
        'branch_orders'         => 0,
        'online_orders'         => 0,
        'branch_orders_ratio'   => 0,
        'online_orders_ratio'   => 0,
        'branch_amount'         => 0,
        'online_amount'         => 0,
        'branch_amount_ratio'   => 0,
        'online_amount_ratio'   => 0,
    ];

    // ===== Analytics =====
    $avgOrderValues = $avgOrderValues ?? ['custom' => 0];
    $customerMix    = $customerMix    ?? [
        'unique_customers'    => 0,
        'new_customers'       => 0,
        'returning_customers' => 0,
        'new_ratio'           => 0,
        'returning_ratio'     => 0,
    ];

    $salesGrowth = $salesGrowth ?? [
        'today_vs_yesterday'     => null,
        'thisMonth_vs_lastMonth' => null,
    ];

    // ===== Collections =====
    $branchStats            = $branchStats            ?? collect();
    $topBranches            = $topBranches            ?? collect();
    $topPackagesByRevenue   = $topPackagesByRevenue   ?? collect();
    $topPackagesByQty       = $topPackagesByQty       ?? collect();
    $weakPackagesLastMonth  = $weakPackagesLastMonth  ?? collect();
    $topCustomers           = $topCustomers           ?? collect();
    $throughputByHour       = $throughputByHour       ?? collect();
    $heatmapData            = $heatmapData            ?? collect();

    // ===== Best Branches =====
    $bestBranchByRevenue = $bestBranchByRevenue ?? null;
    $bestBranchByOrders  = $bestBranchByOrders  ?? null;

    // ===== Repeat Rates =====
    $repeatRates = $repeatRates ?? [
        'last30' => ['unique' => 0, 'repeat' => 0, 'repeat_rate' => 0],
        'last90' => ['unique' => 0, 'repeat' => 0, 'repeat_rate' => 0],
    ];
@endphp




    {{-- فلتر البحث بالمدة والفرع --}}
    <div class="row row-sm section-block">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-1 d-flex align-items-center">
                            <span class="circle-icon bg-secondary-transparent mr-2">
                                <i class="mdi mdi-tune tx-16 text-secondary"></i>
                            </span>
                            <span class="section-title">تصفية التقارير</span>
                        </h6>
                        <span class="tx-12 text-muted">
                            اختر المدة والفرع لعرض الإحصائيات التفصيلية.
                        </span>
                    </div>
                </div>
                <div class="card-body pb-2">
<form method="GET" action="{{ route('admin.sales.dashboard') }}">
    <div class="row">
        <div class="col-md-3">
            <label class="tx-13 font-weight-semibold">من تاريخ</label>
            <input type="date" name="from" value="{{ $from ?? $customFrom }}" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="tx-13 font-weight-semibold">إلى تاريخ</label>
            <input type="date" name="to" value="{{ $to ?? $customTo }}" class="form-control">
        </div>

        <div class="col-md-3">
            <label class="tx-13 font-weight-semibold">الفرع</label>
            <select name="branch_id" class="form-control">
                <option value="">كل الفروع</option>
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}" {{ $branchId == $branch->id ? 'selected' : '' }}>
                        {{ $branch->branch_name_ar }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- ✅ فلتر حالة الحجز (مكانه الصحيح) --}}
        <div class="col-md-3">
            <label class="tx-13 font-weight-semibold">حالة الحجز</label>
            <select name="status" class="form-control">
                <option value="">كل الحالات</option>
                <option value="1" {{ request('status') == 1 ? 'selected' : '' }}>قيد الانتظار</option>
                <option value="2" {{ request('status') == 2 ? 'selected' : '' }}>ملغي</option>
                <option value="3" {{ request('status') == 3 ? 'selected' : '' }}>تحت الإجراء</option>
                <option value="4" {{ request('status') == 4 ? 'selected' : '' }}>تم التسليم</option>
                <option value="5" {{ request('status') == 5 ? 'selected' : '' }}>تم إرسال السطحة</option>
            </select>
        </div>

        {{-- زر البحث --}}
        <div class="col-md-12 mt-3">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="mdi mdi-chart-line mr-1"></i> عرض الإحصائيات
            </button>
        </div>
    </div>

    {{-- سطر عرض الاختيارات --}}
    <div class="row mt-2">
        <div class="col-12 tx-13">
            <span class="text-muted">المدة المختارة:</span>
            <span class="font-weight-semibold">من {{ $customFrom }} إلى {{ $customTo }}</span>
            <span class="text-muted mx-1">|</span>
            <span class="text-muted">الفرع:</span>
            <span class="font-weight-semibold">
                {{ $branchId ? optional($branches->firstWhere('id', $branchId))->branch_name_ar : 'كل الفروع' }}
            </span>
        </div>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>

    {{-- ١) نظرة عامة على المبيعات --}}
    <div class="row row-sm section-block">
        <div class="col-12 mb-1">
            <h6 class="tx-14 font-weight-bold section-title d-inline-flex align-items-center">
                <i class="mdi mdi-finance mr-2 tx-18 text-primary"></i> نظرة عامة على المبيعات
            </h6>
        </div>

        {{-- كروت رئيسية --}}
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 mb-2">
            <div class="card custom-card sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 tx-12 text-white">مبيعات اليوم</h6>
                        <i class="mdi mdi-calendar-today tx-18 text-white-7"></i>
                    </div>
                    <div class="pb-0 mt-3">
                       <span class="font-weight-semibold">
    @if($branchId)
        {{ optional($branches->firstWhere('id', $branchId))->branch_name_ar }}
    @else
        كل الفروع
    @endif
</span>

                        <p class="mb-0 tx-12 text-white op-7">
                            عدد الطلبات: {{ $todayStats->orders_count }}
                        </p>
                    </div>
                </div>
                <span id="spark-today" class="pt-1"></span>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 mb-2">
            <div class="card custom-card sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 tx-12 text-white">آخر 7 أيام</h6>
                        <i class="mdi mdi-calendar-week tx-18 text-white-7"></i>
                    </div>
                    <div class="pb-0 mt-3">
                        <h4 class="tx-22 font-weight-bold mb-1 text-white">
                            {{ number_format($last7DaysStats->total_amount, 2) }} ريال
                        </h4>
                        <p class="mb-0 tx-12 text-white op-7">
                            عدد الطلبات: {{ $last7DaysStats->orders_count }}
                        </p>
                    </div>
                </div>
                <span id="spark-7days" class="pt-1"></span>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 mb-2">
            <div class="card custom-card sales-card bg-info-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 tx-12 text-white">هذا الشهر</h6>
                        <i class="mdi mdi-calendar-month tx-18 text-white-7"></i>
                    </div>
                    <div class="pb-0 mt-3">
                        <h4 class="tx-22 font-weight-bold mb-1 text-white">
                            {{ number_format($thisMonthStats->total_amount, 2) }} ريال
                        </h4>
                        <p class="mb-0 tx-12 text-white op-7">
                            عدد الطلبات: {{ $thisMonthStats->orders_count }}
                        </p>
                    </div>
                </div>
                <span id="spark-month" class="pt-1"></span>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12 mb-2">
            <div class="card custom-card sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 tx-12 text-white">إجمالي المبيعات الكلي</h6>
                        <i class="mdi mdi-cash-multiple tx-18 text-white-7"></i>
                    </div>
                    <div class="pb-0 mt-3">
                        <h4 class="tx-22 font-weight-bold mb-1 text-white">
                            {{ number_format($totalStats->total_amount, 2) }} ريال
                        </h4>
                        <p class="mb-0 tx-12 text-white op-7">
                            إجمالي الطلبات: {{ $totalStats->orders_count }}
                        </p>
                    </div>
                </div>
                <span id="spark-total" class="pt-1"></span>
            </div>
        </div>
    </div>

    {{-- نسبة الدفع + كروت تحليلية جانبية في نفس السطر --}}
    <div class="row row-sm section-block">
        {{-- كارت نمط الدفع --}}
        <div class="col-xl-6 col-lg-12 mb-2">
            <div class="card custom-card shadow-sm border-0 h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-1 d-flex align-items-center">
                            <span class="circle-icon mr-2" style="background:rgba(76,175,80,0.1);">
                                <i class="mdi mdi-credit-card-outline tx-17" style="color:#4CAF50;"></i>
                            </span>
                            <span>نمط الدفع: أونلاين vs الفرع</span>
                        </h6>
                        <span class="tx-12 text-muted">
                            الفترة:
                            <span class="font-weight-semibold">{{ $customFrom }} → {{ $customTo }}</span>
                        </span>
                    </div>
                    <span class="badge badge-light tx-11 d-flex align-items-center">
                        <i class="mdi mdi-swap-horizontal mr-1"></i> طرق الدفع
                    </span>
                </div>

                <div class="card-body pt-3 pb-3">
                    <div class="row">
                        {{-- مؤشرات أداء / أرقام --}}
                        <div class="col-md-6 d-flex flex-column justify-content-center border-left">
                            @php
                                $onlineRatio  = $paymentsBreakdown['online_amount_ratio'] ?? 0;
                                $branchRatio  = $paymentsBreakdown['branch_amount_ratio'] ?? 0;
                                $onlineStatus = $onlineRatio >= 50 ? 'مرتفع' : ($onlineRatio >= 25 ? 'مقبول' : 'منخفض');
                            @endphp

                            <div class="mb-2 tx-13">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">إجمالي الحجوزات</span>
                                    <span class="font-weight-semibold">
                                        {{ $paymentsBreakdown['total_orders'] }}
                                    </span>
                                </div>

                                <div class="d-flex justify-content-between mb-1 align-items-center">
                                    <span class="text-muted d-flex align-items-center">
                                        <span class="rounded-circle d-inline-block ml-1"
                                              style="width:10px;height:10px;background:#4CAF50;"></span>
                                        دفع في الفرع
                                    </span>
                                    <span>
                                        <span class="font-weight-semibold">
                                            {{ $paymentsBreakdown['branch_orders'] }}
                                        </span>
                                        <span class="tx-11 text-muted">
                                            ({{ number_format($paymentsBreakdown['branch_orders_ratio'], 1) }}%)
                                        </span>
                                    </span>
                                </div>
                                <div class="progress progress-sm mb-2">
                                    <div class="progress-bar"
                                         style="width: {{ $branchRatio }}%; background:#4CAF50;"
                                         role="progressbar"
                                         aria-valuenow="{{ $branchRatio }}" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mb-1 align-items-center">
                                    <span class="text-muted d-flex align-items-center">
                                        <span class="rounded-circle d-inline-block ml-1"
                                              style="width:10px;height:10px;background:#2196F3;"></span>
                                        دفع أونلاين
                                    </span>
                                    <span>
                                        <span class="font-weight-semibold">
                                            {{ $paymentsBreakdown['online_orders'] }}
                                        </span>
                                        <span class="tx-11 text-muted">
                                            ({{ number_format($paymentsBreakdown['online_orders_ratio'], 1) }}%)
                                        </span>
                                    </span>
                                </div>
                                <div class="progress progress-sm mb-2">
                                    <div class="progress-bar"
                                         style="width: {{ $onlineRatio }}%; background:#2196F3;"
                                         role="progressbar"
                                         aria-valuenow="{{ $onlineRatio }}" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>

                            <hr class="my-2">

                            <div class="tx-13">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">إيراد الدفع في الفرع</span>
                                    <span>
                                        <span class="font-weight-semibold">
                                            {{ number_format($paymentsBreakdown['branch_amount'], 2) }} ريال
                                        </span>
                                        <span class="tx-11 text-muted">
                                            ({{ number_format($paymentsBreakdown['branch_amount_ratio'], 1) }}%)
                                        </span>
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">إيراد الدفع أونلاين</span>
                                    <span>
                                        <span class="font-weight-semibold">
                                            {{ number_format($paymentsBreakdown['online_amount'], 2) }} ريال
                                        </span>
                                        <span class="tx-11 text-muted">
                                            ({{ number_format($paymentsBreakdown['online_amount_ratio'], 1) }}%)
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="mt-3">
                                <span class="tx-11 text-muted d-block mb-1">مؤشر أداء الدفع الأونلاين</span>
                                <span class="badge badge-pill
                                    @if($onlineRatio >= 50) badge-success
                                    @elseif($onlineRatio >= 25) badge-warning
                                    @else badge-danger @endif
                                ">
                                    أونلاين: {{ number_format($onlineRatio, 1) }}% — {{ $onlineStatus }}
                                </span>
                            </div>
                        </div>

                        {{-- الرسم البياني --}}
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center align-items-center" style="height:230px;">
                                <canvas id="paymentsPie"></canvas>
                            </div>
                            <div class="d-flex justify-content-center tx-11 text-muted mt-1">
                                <span>توزيع الإيراد بين الدفع في الفرع والأونلاين</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- كروت تحليلية صغيرة في النصف الثاني --}}
        <div class="col-xl-6 col-lg-12 mb-2">
            <div class="row row-sm">
                <div class="col-md-6 mb-2">
                    <div class="card custom-card h-100">
                        <div class="card-body py-3">
                            <div class="d-flex align-items-center mb-2">
                                <div class="circle-icon bg-secondary-transparent mr-2">
                                    <i class="mdi mdi-cart-outline tx-18 text-secondary"></i>
                                </div>
                                <div>
                                    <h6 class="tx-13 mb-0">متوسط قيمة الطلب (المدة المختارة)</h6>
                                    <span class="tx-11 text-muted">إجمالي المبيعات ÷ عدد الحجوزات</span>
                                </div>
                            </div>
                            <h3 class="mb-1">
                                {{ number_format($avgOrderValues['custom'], 2) }} <span class="tx-14">ريال</span>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="card custom-card h-100">
                        <div class="card-body py-3">
                            <div class="d-flex align-items-center mb-2">
                                <div class="circle-icon bg-dark-transparent mr-2">
                                    <i class="mdi mdi-account-group-outline tx-18 text-dark"></i>
                                </div>
                                <div>
                                    <h6 class="tx-13 mb-0">عملاء جدد vs عائدين</h6>
                                    <span class="tx-11 text-muted">في المدة المختارة</span>
                                </div>
                            </div>
                            <p class="mb-1 tx-13">
                                <span class="text-muted">عملاء فريدين:</span>
                                <span class="font-weight-semibold">{{ $customerMix['unique_customers'] }}</span>
                            </p>
                            <p class="mb-0 tx-12">
                                جدد:
                                <span class="font-weight-semibold">{{ $customerMix['new_customers'] }}</span>
                                <span class="text-muted">({{ number_format($customerMix['new_ratio'], 1) }}%)</span>
                                <br>
                                عائدين:
                                <span class="font-weight-semibold">{{ $customerMix['returning_customers'] }}</span>
                                <span class="text-muted">({{ number_format($customerMix['returning_ratio'], 1) }}%)</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="card custom-card h-100">
                        <div class="card-body py-3">
                            <h6 class="tx-13 mb-2 d-flex align-items-center">
                                <i class="mdi mdi-trending-up text-success mr-2"></i>
                                نمو المبيعات (اليوم مقابل أمس)
                            </h6>
                            @if(!is_null($salesGrowth['today_vs_yesterday']))
                                @php $g1 = $salesGrowth['today_vs_yesterday']; @endphp
                                <h3 class="mb-1 {{ $g1 >= 0 ? 'text-success' : 'text-danger' }}">
                                    {{ $g1 > 0 ? '+' : '' }}{{ number_format($g1, 1) }}%
                                </h3>
                                <p class="mb-0 tx-12 text-muted">
                                    {{ $g1 > 0 ? 'زيادة في المبيعات عن أمس' : 'انخفاض في المبيعات عن أمس' }}
                                </p>
                            @else
                                <h3 class="mb-1">-</h3>
                                <p class="mb-0 tx-12 text-muted">لا توجد بيانات كافية للمقارنة</p>
                            @endif>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <div class="card custom-card h-100">
                        <div class="card-body py-3">
                            <h6 class="tx-13 mb-2 d-flex align-items-center">
                                <i class="mdi mdi-chart-line-variant text-info mr-2"></i>
                                نمو المبيعات (هذا الشهر مقابل الشهر الماضي)
                            </h6>
                            @if(!is_null($salesGrowth['thisMonth_vs_lastMonth']))
                                @php $g2 = $salesGrowth['thisMonth_vs_lastMonth']; @endphp
                                <h3 class="mb-1 {{ $g2 >= 0 ? 'text-success' : 'text-danger' }}">
                                    {{ $g2 > 0 ? '+' : '' }}{{ number_format($g2, 1) }}%
                                </h3>
                                <p class="mb-0 tx-12 text-muted">
                                    {{ $g2 > 0 ? 'زيادة في المبيعات عن الشهر الماضي' : 'انخفاض في المبيعات عن الشهر الماضي' }}
                                </p>
                            @else
                                <h3 class="mb-1">-</h3>
                                <p class="mb-0 tx-12 text-muted">لا توجد بيانات كافية للمقارنة</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ٢) أداء المبيعات والباكدجات --}}
    <div class="row row-sm section-block">
        <div class="col-12 mb-1">
            <h6 class="tx-14 font-weight-bold section-title d-inline-flex align-items-center">
                <i class="mdi mdi-package-variant mr-2 tx-18 text-primary"></i> أداء المبيعات والباكدجات
            </h6>
        </div>

<div class="col-md-12 col-lg-7 mb-2">
    <div class="card custom-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="card-title mb-0">ملخص المبيعات حسب المدة</h6>

            <div class="d-flex align-items-center">
                <button class="btn btn-sm btn-success mr-2"
                        onclick="exportTableToExcel(
                            'salesSummaryTable',
                            'sales_summary.xls'
                        )">
                    <i class="mdi mdi-file-excel-outline"></i>
                    تصدير Excel
                </button>
                <i class="mdi mdi-timetable tx-18 text-muted"></i>
            </div>
        </div>

        <div class="card-body pb-2">
            <div class="table-responsive">
                <table id="salesSummaryTable"
                       class="table table-bordered table-sm text-center mb-0 tx-13">
                    <thead class="bg-gray-100">
                    <tr>
                        <th>المدة</th>
                        <th>عدد الطلبات</th>
                        <th>قيمة المبيعات (ريال)</th>
                        <th>متوسط قيمة الطلب</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>أمس</td>
                        <td>{{ $yesterdayStats->orders_count }}</td>
                        <td>{{ number_format($yesterdayStats->total_amount, 2) }}</td>
                        <td>
                            {{ $yesterdayStats->orders_count
                                ? number_format($yesterdayStats->total_amount / $yesterdayStats->orders_count, 2)
                                : 0 }}
                        </td>
                    </tr>
                    <tr>
                        <td>هذا الأسبوع</td>
                        <td>{{ $thisWeekStats->orders_count }}</td>
                        <td>{{ number_format($thisWeekStats->total_amount, 2) }}</td>
                        <td>
                            {{ $thisWeekStats->orders_count
                                ? number_format($thisWeekStats->total_amount / $thisWeekStats->orders_count, 2)
                                : 0 }}
                        </td>
                    </tr>
                    <tr>
                        <td>هذا الشهر</td>
                        <td>{{ $thisMonthStats->orders_count }}</td>
                        <td>{{ number_format($thisMonthStats->total_amount, 2) }}</td>
                        <td>
                            {{ $thisMonthStats->orders_count
                                ? number_format($thisMonthStats->total_amount / $thisMonthStats->orders_count, 2)
                                : 0 }}
                        </td>
                    </tr>
                    <tr>
                        <td>الشهر الماضي</td>
                        <td>{{ $lastMonthStats->orders_count }}</td>
                        <td>{{ number_format($lastMonthStats->total_amount, 2) }}</td>
                        <td>
                            {{ $lastMonthStats->orders_count
                                ? number_format($lastMonthStats->total_amount / $lastMonthStats->orders_count, 2)
                                : 0 }}
                        </td>
                    </tr>
                    <tr class="table-primary">
                        <td class="font-weight-bold">المدة المختارة</td>
                        <td class="font-weight-bold">{{ $customStats->orders_count }}</td>
                        <td class="font-weight-bold">{{ number_format($customStats->total_amount, 2) }}</td>
                        <td class="font-weight-bold">
                            {{ $customStats->orders_count
                                ? number_format($customStats->total_amount / $customStats->orders_count, 2)
                                : 0 }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


        {{-- أفضل الباكدجات (إيراد) --}}
<div class="col-lg-5 mb-2">
    <div class="card custom-card h-100">

        {{-- Header --}}
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h6 class="card-title mb-1">أفضل الباكدجات حسب الإيراد</h6>
                <span class="tx-12 text-muted">أعلى 10 باكدجات في المدة المختارة.</span>
            </div>

            <div class="d-flex align-items-center mt-2 mt-lg-0">
                <button type="button"
                        class="btn btn-sm btn-success ml-2"
                        onclick="exportTableToExcel(
                            'topPackagesRevenueTable',
                            'top_packages_by_revenue.xls'
                        )">
                    <i class="mdi mdi-file-excel-outline"></i>
                    تصدير Excel
                </button>

                <i class="mdi mdi-star-outline tx-18 text-muted"></i>
            </div>
        </div>

        {{-- Body --}}
        <div class="card-body pt-2 pb-2">
            @if(isset($topPackagesByRevenue[0]))
                <div class="alert alert-primary mb-2 py-2 tx-13">
                    <i class="mdi mdi-star mr-1"></i>
                    أكثر باكدج جاب إيراد:
                    <strong>{{ $topPackagesByRevenue[0]['name'] }}</strong>
                    — {{ number_format($topPackagesByRevenue[0]['revenue'], 2) }} ريال
                </div>
            @endif

            <div class="table-responsive">
                <table id="topPackagesRevenueTable"
                       class="table table-striped table-sm mb-0 text-sm-nowrap text-center tx-13">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الباكدج</th>
                        <th>المرات</th>
                        <th>متوسط السعر</th>
                        <th>قيمة المبيعات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($topPackagesByRevenue as $index => $pkg)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pkg['name'] }}</td>
                            <td>{{ $pkg['qty'] }}</td>
                            <td>{{ number_format($pkg['unit_price'], 2) }}</td>
                            <td>{{ number_format($pkg['revenue'], 2) }} ريال</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">لا توجد بيانات في المدة المختارة.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
        
    </div>

    {{-- باكدجات حسب العدد + الضعيفة --}}
<div class="row row-sm section-block">

    {{-- أكثر الباكدجات بيعاً (عددياً) --}}
    <div class="col-md-12 col-lg-7 mb-2">
        <div class="card custom-card h-100">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h6 class="card-title mb-1">أكثر الباكدجات بيعاً (عددياً)</h6>
                    <span class="tx-12 text-muted">أعلى 10 باكدجات من حيث عدد مرات الشراء.</span>
                </div>

                <div class="d-flex align-items-center mt-2 mt-lg-0">
                    <button class="btn btn-sm btn-success ml-2"
                            onclick="exportTableToExcel(
                                'topPackagesQtyTable',
                                'top_packages_by_quantity.xls'
                            )">
                        <i class="mdi mdi-file-excel-outline"></i>
                        تصدير Excel
                    </button>
                    <i class="mdi mdi-format-list-numbered tx-18 text-muted"></i>
                </div>
            </div>

            <div class="card-body pt-2 pb-2">
                @if(isset($topPackagesByQty[0]))
                    <div class="alert alert-success mb-2 py-2 tx-13">
                        <i class="mdi mdi-arrow-up-bold mr-1"></i>
                        أكثر باكدج اتباع عددياً:
                        <strong>{{ $topPackagesByQty[0]['name'] }}</strong>
                        — {{ $topPackagesByQty[0]['qty'] }} مرة
                    </div>
                @endif

                <div class="table-responsive">
                    <table id="topPackagesQtyTable"
                           class="table table-striped table-sm mb-0 text-sm-nowrap text-center tx-13">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الباكدج</th>
                            <th>عدد المرات</th>
                            <th>إجمالي الإيراد</th>
                            <th>متوسط الإيراد / عملية</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($topPackagesByQty as $index => $pkg)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pkg['name'] }}</td>
                                <td>{{ $pkg['qty'] }}</td>
                                <td>{{ number_format($pkg['revenue'], 2) }} ريال</td>
                                <td>{{ number_format($pkg['avg_revenue_per_sale'], 2) }} ريال</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">لا توجد بيانات في هذه المدة.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- الباكدجات ضعيفة الأداء --}}
    <div class="col-md-12 col-lg-5 mb-2">
        <div class="card custom-card h-100">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h6 class="card-title mb-1">الباكدجات ضعيفة الأداء (آخر شهر)</h6>
                    <span class="tx-12 text-muted">أقل 5 باكدجات مبيعاً خلال الشهر الماضي.</span>
                </div>

                <div class="d-flex align-items-center mt-2 mt-lg-0">
                    <button class="btn btn-sm btn-success ml-2"
                            onclick="exportTableToExcel(
                                'weakPackagesTable',
                                'weak_packages_last_month.xls'
                            )">
                        <i class="mdi mdi-file-excel-outline"></i>
                        تصدير Excel
                    </button>
                    <i class="mdi mdi-alert-circle-outline tx-18 text-muted"></i>
                </div>
            </div>

            <div class="card-body pt-2 pb-2">
                <div class="table-responsive">
                    <table id="weakPackagesTable"
                           class="table table-striped table-sm mb-0 text-sm-nowrap text-center tx-13">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>الباكدج</th>
                            <th>عدد المرات</th>
                            <th>إجمالي الإيراد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($weakPackagesLastMonth as $index => $pkg)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pkg['name'] }}</td>
                                <td>{{ $pkg['qty'] }}</td>
                                <td>{{ number_format($pkg['revenue'], 2) }} ريال</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">لا توجد بيانات كافية في الشهر الماضي.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <small class="text-muted tx-11 d-block mt-2">
                    استخدم هذه البيانات لتحسين التسعير، أو إضافة عروض ترويجية، أو إلغاء الباكدجات غير الفعّالة.
                </small>
            </div>
        </div>
    </div>

</div>

    {{-- ٣) أداء الفروع --}}
<div class="row row-sm section-block">
    <div class="col-12 mb-1">
        <h6 class="tx-14 font-weight-bold section-title d-inline-flex align-items-center">
            <i class="mdi mdi-storefront-outline mr-2 tx-18 text-primary"></i> أداء الفروع
        </h6>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="card custom-card card-table-two">

            {{-- Header --}}
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h6 class="card-title mb-1">إحصائيات الفروع في المدة المختارة</h6>
                    <span class="tx-12 text-muted">
                        توزيع المبيعات على الفروع في الفترة من {{ $customFrom }} إلى {{ $customTo }}.
                    </span>
                </div>

                <div class="d-flex align-items-center mt-2 mt-lg-0">
                    <button class="btn btn-sm btn-success ml-2"
                            onclick="exportTableToExcel(
                                'branchStatsTable',
                                'branches_performance.xls'
                            )">
                        <i class="mdi mdi-file-excel-outline"></i>
                        تصدير Excel
                    </button>
                    <i class="mdi mdi-map-marker-multiple-outline tx-18 text-muted"></i>
                </div>
            </div>

            {{-- Top stats --}}
            <div class="row px-3 mt-2 mb-1">
                <div class="col-md-6 mb-1">
                    <div class="alert alert-primary mb-2 tx-13 py-2">
                        <strong>أفضل فرع من حيث قيمة المبيعات:</strong><br>
                        @if($bestBranchByRevenue)
                            {{ $bestBranchByRevenue['branch_name'] }}
                            — {{ number_format($bestBranchByRevenue['total_amount'], 2) }} ريال
                        @else
                            لا توجد بيانات
                        @endif
                    </div>
                </div>
                <div class="col-md-6 mb-1">
                    <div class="alert alert-success mb-2 tx-13 py-2">
                        <strong>أفضل فرع من حيث عدد الحجوزات:</strong><br>
                        @if($bestBranchByOrders)
                            {{ $bestBranchByOrders['branch_name'] }}
                            — {{ $bestBranchByOrders['orders_count'] }} حجز
                        @else
                            لا توجد بيانات
                        @endif
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div class="card-body pt-0 pb-2">
                <div class="table-responsive">
                    <table id="branchStatsTable"
                           class="table table-striped table-bordered table-sm mb-0 text-sm-nowrap text-center tx-13">
                        <thead class="bg-gray-100">
                        <tr>
                            <th>الفرع</th>
                            <th>عدد الطلبات</th>
                            <th>إجمالي المبيعات</th>
                            <th>متوسط المبيعات/اليوم</th>
                            <th>متوسط الطلبات/اليوم</th>
                            <th>نسبة المساهمة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($branchStats as $row)
                            <tr>
                                <td>{{ $row['branch_name'] }}</td>
                                <td>{{ $row['orders_count'] }}</td>
                                <td>{{ number_format($row['total_amount'], 2) }} ريال</td>
                                <td>{{ number_format($row['avg_per_day'], 2) }} ريال</td>
                                <td>{{ number_format($row['avg_orders_per_day'], 2) }}</td>
                                <td>{{ number_format($row['contribution'], 1) }}%</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">لا توجد مبيعات في هذه المدة.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-3 pt-2">
                    <h6 class="tx-13 mb-2">أفضل 5 فروع من حيث المبيعات:</h6>
                    @forelse($topBranches as $row)
                        <span class="badge badge-primary mb-1 mr-1">
                            {{ $row['branch_name'] }} — {{ number_format($row['total_amount'], 0) }} ريال
                        </span>
                    @empty
                        <span class="tx-12 text-muted">لا توجد بيانات.</span>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>

    {{-- ٤) التشغيل وأوقات الذروة --}}
    <div class="row row-sm section-block">
        <div class="col-12 mb-1">
            <h6 class="tx-14 font-weight-bold section-title d-inline-flex align-items-center">
                <i class="mdi mdi-clock-time-eight-outline mr-2 tx-18 text-primary"></i> أداء التشغيل وأوقات الذروة
            </h6>
        </div>

<div class="col-lg-6 mb-2">
    <div class="card custom-card h-100">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h6 class="card-title mb-1">عدد الخدمة في الساعة</h6>
                <span class="tx-12 text-muted">توزيع الحمل على مدار اليوم في المدة المختارة.</span>
            </div>

            <div class="d-flex align-items-center mt-2 mt-lg-0">
                <button class="btn btn-sm btn-success ml-2"
                        onclick="exportTableToExcel(
                            'throughputByHourTable',
                            'throughput_by_hour.xls'
                        )">
                    <i class="mdi mdi-file-excel-outline"></i>
                    تصدير Excel
                </button>
                <i class="mdi mdi-timeline-clock-outline tx-18 text-muted"></i>
            </div>
        </div>

        <div class="card-body pt-2 pb-2">
            <div class="table-responsive">
                <table id="throughputByHourTable"
                       class="table table-striped table-sm mb-0 text-sm-nowrap text-center tx-13">
                    <thead>
                    <tr>
                        <th>الساعة</th>
                        <th>عدد الخدمة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($throughputByHour as $row)
                        <tr>
                            <td>{{ str_pad($row->hour, 2, '0', STR_PAD_LEFT) }}:00</td>
                            <td>{{ $row->washes_count }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">لا توجد بيانات.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

        {{-- Heatmap الأيام × الساعات --}}
<div class="col-lg-6 mb-2">
    <div class="card custom-card h-100">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h6 class="card-title mb-1">أيام وساعات الذروة</h6>
                <span class="tx-12 text-muted">أكثر الأيام والساعات التي تتركز فيها الحجوزات.</span>
            </div>

            <div class="d-flex align-items-center mt-2 mt-lg-0">
                <button class="btn btn-sm btn-success ml-2"
                        onclick="exportTableToExcel(
                            'heatmapTable',
                            'peak_days_hours.xls'
                        )">
                    <i class="mdi mdi-file-excel-outline"></i>
                    تصدير Excel
                </button>
                <i class="mdi mdi-fire tx-18 text-muted"></i>
            </div>
        </div>

        <div class="card-body pt-2 pb-2">
            @php
                $daysMap = [
                    0 => 'الاثنين',
                    1 => 'الثلاثاء',
                    2 => 'الأربعاء',
                    3 => 'الخميس',
                    4 => 'الجمعة',
                    5 => 'السبت',
                    6 => 'الأحد',
                ];
                $heatGrouped = $heatmapData->groupBy('weekday');
            @endphp

            <div class="table-responsive">
                <table id="heatmapTable"
                       class="table table-bordered table-sm text-center mb-0 tx-13">
                    <thead class="bg-gray-100">
                    <tr>
                        <th>اليوم</th>
                        <th>الساعة</th>
                        <th>عدد الخدمة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($heatGrouped as $weekday => $rows)
                        @foreach($rows as $i => $row)
                            <tr>
                                @if($i === 0)
                                    <td rowspan="{{ $rows->count() }}">
                                        {{ $daysMap[$weekday] ?? $weekday }}
                                    </td>
                                @endif
                                <td>{{ str_pad($row->hour, 2, '0', STR_PAD_LEFT) }}:00</td>
                                <td>{{ $row->washes_count }}</td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="3">لا توجد بيانات كافية لعرض خريطة الحراراة.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
    </div>

    {{-- ٥) العملاء والولاء --}}
    <div class="row row-sm section-block">
        <div class="col-12 mb-1">
            <h6 class="tx-14 font-weight-bold section-title d-inline-flex align-items-center">
                <i class="mdi mdi-account-heart-outline mr-2 tx-18 text-primary"></i> العملاء والولاء
            </h6>
        </div>

        {{-- معدل تكرار العميل --}}
<div class="col-lg-5 mb-2">
    <div class="card custom-card h-100">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h6 class="card-title mb-1">معدل تكرار العملاء</h6>
                <span class="tx-12 text-muted">نسبة العملاء الذين حجزوا أكثر من مرة.</span>
            </div>

            <div class="d-flex align-items-center mt-2 mt-lg-0">
                <button class="btn btn-sm btn-success ml-2"
                        onclick="exportTableToExcel(
                            'repeatCustomersTable',
                            'repeat_customers_rate.xls'
                        )">
                    <i class="mdi mdi-file-excel-outline"></i>
                    تصدير Excel
                </button>
                <i class="mdi mdi-repeat tx-18 text-muted"></i>
            </div>
        </div>

        <div class="card-body pt-2 pb-2">
            <div class="table-responsive">
                <table id="repeatCustomersTable"
                       class="table table-striped table-sm mb-0 text-sm-nowrap text-center tx-13">
                    <thead>
                    <tr>
                        <th>المدة</th>
                        <th>عملاء فريدين</th>
                        <th>عملاء مكررين</th>
                        <th>نسبة التكرار</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>آخر 30 يوم</td>
                        <td>{{ $repeatRates['last30']['unique'] }}</td>
                        <td>{{ $repeatRates['last30']['repeat'] }}</td>
                        <td>{{ number_format($repeatRates['last30']['repeat_rate'], 1) }}%</td>
                    </tr>
                    <tr>
                        <td>آخر 90 يوم</td>
                        <td>{{ $repeatRates['last90']['unique'] }}</td>
                        <td>{{ $repeatRates['last90']['repeat'] }}</td>
                        <td>{{ number_format($repeatRates['last90']['repeat_rate'], 1) }}%</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <small class="tx-11 text-muted d-block mt-2">
                ارتفاع نسبة التكرار يعني ولاء أعلى وتكرار زيارات أكثر.
            </small>
        </div>
    </div>
</div>

        {{-- أعلى 10 عملاء --}}
<div class="col-lg-7 mb-2">
    <div class="card custom-card h-100">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <h6 class="card-title mb-1">أعلى 10 عملاء من حيث إجمالي الصرف</h6>
                <span class="tx-12 text-muted">خلال المدة المختارة.</span>
            </div>

            <div class="d-flex align-items-center mt-2 mt-lg-0">
                <button class="btn btn-sm btn-success ml-2"
                        onclick="exportTableToExcel(
                            'topCustomersTable',
                            'top_customers.xls'
                        )">
                    <i class="mdi mdi-file-excel-outline"></i>
                    تصدير Excel
                </button>
                <i class="mdi mdi-crown-outline tx-18 text-muted"></i>
            </div>
        </div>

        <div class="card-body pt-2 pb-2">
            <div class="table-responsive">
                <table id="topCustomersTable"
                       class="table table-striped table-sm mb-0 text-sm-nowrap text-center tx-13">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>العميل</th>
                        <th>رقم الهاتف</th>
                        <th>عدد الزيارات</th>
                        <th>إجمالي الصرف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($topCustomers as $index => $cust)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $cust->name ?? 'عميل بدون اسم' }}</td>
                            <td>{{ $cust->phone_number }}</td>
                            <td>{{ $cust->orders_count }}</td>
                            <td>{{ number_format($cust->total_amount, 2) }} ريال</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">لا توجد بيانات عملاء في هذه المدة.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <small class="tx-11 text-muted d-block mt-2">
                هؤلاء العملاء يعتبرون High-Value Customers ويمكن استهدافهم بعروض خاصة أو برامج ولاء.
            </small>
        </div>
    </div>
</div>
    </div>

@endsection

@section('js')
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>

    {{-- Pie chart لنسبة الدفع أونلاين vs في الفرع --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('paymentsPie');
            if (ctx && window.Chart) {
                var branchAmount = {{ $paymentsBreakdown['branch_amount'] }};
                var onlineAmount = {{ $paymentsBreakdown['online_amount'] }};

                var dataValues = [branchAmount, onlineAmount];

                if (branchAmount === 0 && onlineAmount === 0) {
                    dataValues = [1, 1];
                }

                new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['دفع في الفرع', 'دفع أونلاين'],
                        datasets: [{
                            data: dataValues,
                            backgroundColor: [
                                '#4CAF50',
                                '#2196F3'
                            ],
                            hoverBackgroundColor: [
                                '#43A047',
                                '#1E88E5'
                            ],
                            borderColor: '#ffffff',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '65%',
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom',
                                labels: {
                                    usePointStyle: true,
                                    padding: 16,
                                    font: { size: 12 }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function (context) {
                                        var label = context.label || '';
                                        var value = context.raw || 0;
                                        var total = branchAmount + onlineAmount;
                                        var percent = total ? (value / total) * 100 : 0;
                                        return label + ': ' +
                                            value.toLocaleString('ar-EG') +
                                            ' ريال (' + percent.toFixed(1) + '%)';
                                    }
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
    
  <script>
function exportTableToExcel(tableId, fileName = 'data.xls') {
    var table = document.getElementById(tableId);
    if (!table) {
        alert('الجدول غير موجود');
        return;
    }

    var html = `
        <html>
        <head><meta charset="utf-8"></head>
        <body>${table.outerHTML}</body>
        </html>
    `;

    var blob = new Blob([html], { type: 'application/vnd.ms-excel' });
    var url = URL.createObjectURL(blob);

    var a = document.createElement('a');
    a.href = url;
    a.download = fileName;
    document.body.appendChild(a);
    a.click();

    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}
</script>


@endsection
