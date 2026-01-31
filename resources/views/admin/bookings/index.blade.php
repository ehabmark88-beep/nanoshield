{{-- resources/views/admin/bookings/index.blade.php --}}
@extends('admin.layouts.master')

@section('css')
<style>
    /* ===== Layout & Cards ===== */
    .branch-card-header {
        cursor: pointer;
        transition: background .2s ease;
    }
    .branch-card-header:hover {
        background: #f8f9fa;
    }

    .branch-meta {
        font-size: 12px;
        color: #6c757d;
    }

    .card-header h5, .card-header h4 {
        margin-bottom: 2px;
    }

    /* ===== Badges ===== */
    .badge-pill {
        border-radius: 50px;
        font-size: 12px;
        padding: 5px 10px;
    }

    .booking-status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
        display: inline-block;
    }

    .booking-status-badge.pending {
        background: #fff3cd;
        color: #856404;
    }

    .booking-status-badge.completed {
        background: #d4edda;
        color: #155724;
    }

    .booking-status-badge.canceled {
        background: #f8d7da;
        color: #721c24;
    }

    /* ===== Tables ===== */
    .table thead th {
        white-space: nowrap;
        font-size: 12px;
        background: #f1f3f5;
    }

    .table td {
        vertical-align: middle;
        font-size: 13px;
    }

    /* ===== Filters ===== */
    .filter-label {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 4px;
    }

    /* ===== Empty States ===== */
    .no-bookings-box {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 14px;
        font-size: 13px;
        color: #6c757d;
        text-align: center;
    }

    /* ===== Packages Cell ===== */
    .packages-cell {
        max-width: 240px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        cursor: help;
    }
</style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="card-title mg-b-0">الحجوزات</h4>
        <span class="tx-12 text-muted">
            عرض جميع الحجوزات مع تقسيمها حسب الفروع وإمكانية التصفية.
        </span>
    </div>
</div>
@endsection

@section('content')
@php
    $sort   = $sort   ?? request('sort', 'desc');
    $status = $status ?? request('status');
@endphp

{{-- ===== Filters ===== --}}
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-1">تصفية الحجوزات</h5>
                    <span class="tx-12 text-muted">
                        اختر الفرع، التاريخ، حالة الحجز، وطريقة الترتيب.
                    </span>
                </div>
                <i class="mdi mdi-filter-variant tx-20 text-muted"></i>
            </div>

            <div class="card-body">
                <form method="GET" action="{{ route('dashbook') }}">
                    <div class="row">
                        <div class="col-md-3">
                            <label class="filter-label">الفرع</label>
                            <select name="branch_id" class="form-control">
                                <option value="">كل الفروع</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}"
                                        {{ ($branchId ?? null) == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->branch_name_ar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="filter-label">من تاريخ</label>
                            <input type="date" name="from" class="form-control" value="{{ $from ?? '' }}">
                        </div>

                        <div class="col-md-3">
                            <label class="filter-label">إلى تاريخ</label>
                            <input type="date" name="to" class="form-control" value="{{ $to ?? '' }}">
                        </div>

                        <div class="col-md-3">
                            <label class="filter-label">الترتيب</label>
                            <select name="sort" class="form-control">
                                <option value="desc" {{ $sort === 'desc' ? 'selected' : '' }}>الأحدث أولاً</option>
                                <option value="asc"  {{ $sort === 'asc'  ? 'selected' : '' }}>الأقدم أولاً</option>
                            </select>
                        </div>

                        <div class="col-md-3 mt-3">
                            <label class="filter-label">حالة الحجز</label>
                            <select name="status" class="form-control">
                                <option value="">كل الحالات</option>
                                <option value="1" {{ $status == 1 ? 'selected' : '' }}>قيد الانتظار</option>
                                <option value="2" {{ $status == 2 ? 'selected' : '' }}>ملغي</option>
                                <option value="3" {{ $status == 3 ? 'selected' : '' }}>تحت الإجراء</option>
                                <option value="4" {{ $status == 4 ? 'selected' : '' }}>تم التسليم</option>
                                <option value="5" {{ $status == 5 ? 'selected' : '' }}>تم إرسال السطحة</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-4 align-items-center">
                        <div class="col-md-8 tx-13 text-muted">
                            @php
                                $fromLabel = $from ?: ($customFrom ?? '—');
                                $toLabel   = $to   ?: ($customTo   ?? '—');
                            @endphp
                            المدة:
                            <strong>{{ $fromLabel }}</strong> → <strong>{{ $toLabel }}</strong>
                            |
                            الفرع:
                            <strong>
                                {{ $branchId ? optional($branches->firstWhere('id', $branchId))->branch_name_ar : 'كل الفروع' }}
                            </strong>
                        </div>
                        <div class="col-md-4 text-left">
                            <button type="submit" class="btn btn-primary">
                                <i class="mdi mdi-magnify mr-1"></i> عرض النتائج
                            </button>
                            <a href="{{ route('dashbook') }}" class="btn btn-outline-secondary">
                                إعادة تعيين
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ===== Bookings by Branch ===== --}}
<div class="row row-sm mt-3">
    <div class="col-xl-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mg-b-0">الحجوزات حسب الفروع</h4>
                <span class="tx-12 text-muted">
                    العدد الكلي: <strong>{{ $bookings->count() }}</strong>
                </span>
            </div>

            <div class="card-body" id="branchesAccordion">
                @forelse($branches as $index => $branch)
                    @php
                        $branchBookings = $bookingsByBranch->get($branch->id) ?? collect();
                        $branchBookings = $sort === 'asc'
                            ? $branchBookings->sortBy('date')
                            : $branchBookings->sortByDesc('date');
                        $branchBookings = $branchBookings->values();
                        $latestBooking  = optional($branchBookings->first())->date;
                    @endphp

                    <div class="card mg-b-10">
                        <div class="card-header branch-card-header d-flex justify-content-between align-items-center"
                             data-toggle="collapse"
                             data-target="#branchBookings{{ $branch->id }}"
                             aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                            <div>
                                <strong>
                                    <i class="mdi mdi-store mr-1 text-primary"></i>
                                    {{ $branch->branch_name_ar }}
                                </strong>
                                @if($latestBooking)
                                    <div class="branch-meta">
                                        آخر حجز: {{ \Carbon\Carbon::parse($latestBooking)->format('Y-m-d') }}
                                    </div>
                                @endif
                            </div>
                            <div>
                                <span class="badge badge-primary badge-pill">
                                    {{ $branchBookings->count() }} حجز
                                </span>
                                <span class="badge badge-success badge-pill">
                                    {{ number_format($branchBookings->sum('total_price'), 2) }} ريال
                                </span>
                            </div>
                        </div>

                        {{-- Table --}}
                        <div id="branchBookings{{ $branch->id }}"
                             class="collapse {{ $index === 0 ? 'show' : '' }}"
                             data-parent="#branchesAccordion">
                            <div class="card-body">
                                @if($branchBookings->isEmpty())
                                    <div class="no-bookings-box">
                                        لا توجد حجوزات لهذا الفرع ضمن معايير البحث الحالية.
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table table-hover text-md-nowrap">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>التاريخ</th>
                                                <th>الوقت</th>
                                                <th>العميل</th>
                                                <th>الهاتف</th>
                                                <th>الباكدجات</th>
                                                <th>الإجمالي</th>
                                                <th>الدفع</th>
                                                <th>الحالة</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($branchBookings as $i => $booking)
                                                @php
                                                    $statusMap = [
                                                        1 => ['text' => 'قيد الانتظار',   'class' => 'pending'],
                                                        2 => ['text' => 'ملغي',            'class' => 'canceled'],
                                                        3 => ['text' => 'تحت الإجراء',     'class' => 'pending'],
                                                        4 => ['text' => 'تم التسليم',      'class' => 'completed'],
                                                        5 => ['text' => 'تم إرسال السطحة', 'class' => 'completed'],
                                                    ];
                                                    $st = $statusMap[$booking->status] ?? ['text' => 'غير معروف', 'class' => 'pending'];
                                                @endphp
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($booking->date)->format('Y-m-d') }}</td>
                                                    <td>{{ $booking->time }}</td>
                                                    <td>{{ $booking->name }}</td>
                                                    <td>{{ $booking->phone_number }}</td>
                                                    <td class="packages-cell">
                                                        @php
                                                            $packagesText = '—';
                                                            if ($booking->packages) {
                                                                $decoded = json_decode($booking->packages, true);
                                                                $ids = [];
                                                                if (json_last_error() === JSON_ERROR_NONE) {
                                                                    if (is_numeric($decoded)) $ids[] = (int)$decoded;
                                                                    elseif (is_array($decoded)) {
                                                                        foreach ($decoded as $p) {
                                                                            if (is_numeric($p)) $ids[] = (int)$p;
                                                                            elseif (is_array($p) && isset($p['id'])) $ids[] = (int)$p['id'];
                                                                        }
                                                                    }
                                                                } elseif (is_numeric($booking->packages)) {
                                                                    $ids[] = (int)$booking->packages;
                                                                }
                                                                if ($ids) {
                                                                    $packagesText = implode('، ',
                                                                        \App\Models\Package::whereIn('id', $ids)->pluck('name')->toArray()
                                                                    );
                                                                }
                                                            }
                                                        @endphp
                                                        <span title="{{ $packagesText }}">
                                                            {{ \Illuminate\Support\Str::limit($packagesText, 45) }}
                                                        </span>
                                                    </td>
                                                    <td>{{ number_format($booking->total_price, 2) }} ريال</td>
                                                    <td>{{ $booking->payment_method === 'payBranch' ? 'في الفرع' : 'أونلاين' }}</td>
                                                    <td>
                                                        <span class="booking-status-badge {{ $st['class'] }}">
                                                            {{ $st['text'] }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="no-bookings-box">لا توجد فروع مسجلة.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
