@extends('admin.layouts.master3')

@section('css')
<style>
    /* تحسين شكل الجدول */
    table thead th {
        background: #f8f9fa;
        font-weight: bold;
        text-align: center;
    }

    table tbody td {
        vertical-align: middle;
        text-align: center;
    }

    /* ألوان الصفوف حسب الحالة */
    .row-pending   { background-color: #f8f9fa; }
    .row-cancelled { background-color: #f8d7da; }
    .row-progress  { background-color: #fff3cd; }
    .row-delivered { background-color: #d1e7dd; }
    .row-flatbed   { background-color: #e7f1ff; }

    .filter-btn {
        margin: 2px;
    }
</style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between">
    <h4 class="card-title mg-b-0"> فرع {{ $branchName }} </h4>
    <a href="{{ route('admin.dashboard.close', $branch_id) }}" class="btn btn-primary">
        اغلاق مواعيد
    </a>
</div>
@endsection

@section('content')
<div class="col-xl-12">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h4 class="card-title mb-3">
                <i class="mdi mdi-calendar-check text-primary"></i>
                قائمة الحجوزات
            </h4>

            {{-- أزرار الفلترة والترتيب --}}
            <div class="mb-3 text-center">
                <button class="btn btn-sm btn-secondary filter-btn" data-status="all">الكل</button>
                <button class="btn btn-sm btn-light filter-btn" data-status="1">قيد الانتظار</button>
                <button class="btn btn-sm btn-warning filter-btn" data-status="3">تحت الإجراء</button>
                <button class="btn btn-sm btn-success filter-btn" data-status="4">تم التسليم</button>
                <button class="btn btn-sm btn-info filter-btn" data-status="5">الساطحة</button>
                <button class="btn btn-sm btn-danger filter-btn" data-status="2">ملغي</button>

                <hr>

                <button class="btn btn-outline-dark btn-sm sort-btn" data-sort="date_desc">
                    ⬇ الأحدث
                </button>
                <button class="btn btn-outline-dark btn-sm sort-btn" data-sort="date_asc">
                    ⬆ الأقدم
                </button>
                <button class="btn btn-outline-dark btn-sm sort-btn" data-sort="status">
                    🔀 ترتيب حسب الحالة
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="example1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>العميل</th>
                        <th>الهاتف</th>
                        <th>الخدمات</th>
                        <th>الساطحة</th>
                        <th>التاريخ</th>
                        <th>الوقت</th>
                        <th>الدفع</th>
                        <th>الحالة</th>
                        <th>الإجراء</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($bookings as $booking)
                        <tr
                            data-status="{{ $booking->status }}"
                            data-date="{{ $booking->date }}"
                            class="
                                @if($booking->status == 1 || $booking->status == 'pending') row-pending
                                @elseif($booking->status == 2) row-cancelled
                                @elseif($booking->status == 3) row-progress
                                @elseif($booking->status == 4) row-delivered
                                @elseif($booking->status == 5) row-flatbed
                                @endif
                            "
                        >
                            <td>#{{ $booking->id }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->phone_number }}</td>

                            <td>
                                @foreach($booking->package_names as $pkg)
                                    <span class="badge badge-primary d-block mb-1">{{ $pkg }}</span>
                                @endforeach
                            </td>

                            <td>
                                @if($booking->flatbed)
                                    <span class="badge badge-danger d-block mb-1">
                                        🚛 {{ $booking->flatbed->name_ar ?? $booking->flatbed->name }}
                                    </span>
                                    @if($booking->flatbed->flatbed_type)
                                        <small class="text-muted">
                                            {{ $booking->flatbed->flatbed_type->name_ar }}
                                        </small>
                                    @endif
                                @else
                                    <span class="badge badge-light">🚗 بدون ساطحة</span>
                                @endif
                            </td>

                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->time }}</td>

                            <td>
                                @if($booking->payment_method == 'payBranch')
                                    <span class="badge badge-info">دفع بالفرع</span>
                                    <span class="badge badge-warning">{{ $booking->total_price }}</span>
                                @else
                                    <span class="badge badge-success">دفع أونلاين</span>
                                @endif
                            </td>

                            <td>
                                @if($booking->status == 1)
                                    <span class="badge badge-secondary">⏳ قيد الانتظار</span>
                                @elseif($booking->status == 2)
                                    <span class="badge badge-danger">❌ ملغي</span>
                                @elseif($booking->status == 3)
                                    <span class="badge badge-warning">🚗 تحت الإجراء</span>
                                @elseif($booking->status == 4)
                                    <span class="badge badge-success">✅ تم التسليم</span>
                                @elseif($booking->status == 5)
                                    <span class="badge badge-info">🚛 ساطحة</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.dashboard.edit_booking', ['id' => $booking->id, 'branch_id' => $branch_id]) }}"
                                   class="btn btn-sm btn-outline-warning">
                                    تعديل
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<script>
/* ===== فلترة حسب الحالة ===== */
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const status = this.dataset.status;
        document.querySelectorAll('#example1 tbody tr').forEach(row => {
            row.style.display = (status === 'all' || row.dataset.status == status) ? '' : 'none';
        });
    });
});

/* ===== ترتيب ===== */
document.querySelectorAll('.sort-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const rows = Array.from(document.querySelectorAll('#example1 tbody tr'));
        const type = this.dataset.sort;

        rows.sort((a, b) => {
            if (type === 'date_desc') return b.dataset.date.localeCompare(a.dataset.date);
            if (type === 'date_asc') return a.dataset.date.localeCompare(b.dataset.date);
            if (type === 'status') return a.dataset.status - b.dataset.status;
        });

        rows.forEach(row => document.querySelector('#example1 tbody').appendChild(row));
    });
});

/* تحديث تلقائي */
setInterval(() => location.reload(), 60000);
</script>
@endsection
