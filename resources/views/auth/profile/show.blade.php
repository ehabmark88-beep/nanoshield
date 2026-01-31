@extends('layouts.pages.master')

@section('css')
<style>
/* ================== GLOBAL ================== */
.container {
    width: 100%;
    max-width: 1300px;
    margin: auto;
    padding: 10px;
}

.table {
    width: 100%;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    border-collapse: separate;
    border-spacing: 0;
}

.table thead th {
    background: #f1f3f5;
    font-weight: 700;
    padding: 12px;
    white-space: nowrap;
}

.table tbody td {
    padding: 10px;
    border-top: 1px solid #eef1f4;
    vertical-align: middle;
}

.badge {
    font-size: .85rem;
    padding: 6px 10px;
    border-radius: 20px;
}

/* ================== PROFILE ================== */
.profile-card {
    margin: 20px auto;
    text-align: center;
}

.profile-card img {
    width: 160px;
    height: 130px;
    border-radius: 50%;
    margin-bottom: 15px;
}

.profile-card h1 {
    font-size: 1.8rem;
    color: #e47823;
}

/* ================== BUTTON ================== */
.btn-custom {
    display: inline-block;
    padding: 10px 22px;
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
    background: linear-gradient(to right, #f7971e, #ffd200);
    border-radius: 50px;
    text-decoration: none;
    transition: .3s;
}


/* ================== MOBILE ================== */
@media (max-width: 576px) {

    .profile-card img {
        width: 110px;
        height: 100px;
    }

    .profile-card h1 {
        font-size: 1.4rem;
    }

    .table thead {
        display: none;
    }

    .table,
    .table tbody,
    .table tr,
    .table td {
        display: block;
        width: 100%;
    }

    .table tr {
        margin-bottom: 15px;
        border: 1px solid #eee;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,.05);
    }

    .table td {
        padding: 10px 14px;
        border: none;
        border-top: 1px solid #f1f1f1;
        position: relative;
    }

    .table td:first-child {
        border-top: none;
    }

    .badge {
        font-size: .9rem;
    }

    .btn,
    button {
        width: 100%;
        margin-bottom: 6px;
    }
}

/* ===== Zebra Rows ===== */
.table tbody tr:nth-child(odd) {
    background-color: #fafafa;
}

.table tbody tr:nth-child(even) {
    background-color: #ffffff;
}

/* ================== TABLET ================== */
@media (min-width: 577px) and (max-width: 768px) {
    .container {
        max-width: 95%;
    }
}

/* ================== DESKTOP ================== */
@media (min-width: 1200px) {
    .container {
        max-width: 1200px;
    }
}

.rtl {
    direction: rtl;
}
body > div.template-header > h1 {
    display: none;
}
</style>

<style>
    /* ================== TABLE BASE ================== */
.table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: #ffffff;
    border-radius: 12px;
    overflow: hidden;
}

/* ================== HEADER SPECIAL EFFECT ================== */
.table thead tr {
    background: linear-gradient(90deg, #f7971e, #ffd200);
    animation: headerGlow 3s ease-in-out infinite alternate;
}

.table thead th {
    color: #222;
    font-weight: 800;
    text-align: center;
    padding: 14px 10px;
    border: none;
}

/* حركة خفيفة للهيدر */
@keyframes headerGlow {
    0%   { filter: brightness(1); }
    100% { filter: brightness(1.08); }
}

/* ================== ZEBRA ROWS ================== */
.table tbody tr:nth-child(odd) {
    background-color: #fafafa;
}

.table tbody tr:nth-child(even) {
    background-color: #ffffff;
}

/* ================== ROW HOVER EFFECT ================== */
.table tbody tr {
    transition: transform .15s ease, box-shadow .15s ease, background-color .15s;
}

/* ================== CELL ALIGNMENT ================== */
.table td {
    vertical-align: middle;
    text-align: center;
    padding: 12px 10px;
}

/* ================== BUTTON ALIGNMENT ================== */
.table td button,
.table td .btn,
.table td form {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* داخل الزر نفسه */
.table td .btn {
    text-align: center;
}

/* ================== BADGES ================== */
.badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 28px;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: .85rem;
    white-space: nowrap;
}

/* ================== MOBILE (CARD MODE) ================== */
@media (max-width: 576px) {

    .table thead {
        display: none;
    }

    .table,
    .table tbody,
    .table tr,
    .table td {
        display: block;
        width: 100%;
    }

    .table tr {
        margin-bottom: 14px;
        border-radius: 12px;
        border: 1px solid #eee;
    }

    .table td {
        text-align: center;
        border: none;
        border-top: 1px solid #f1f1f1;
        padding: 12px 14px;
    }

    .table td:first-child {
        border-top: none;
    }

    /* تمييز أول عنصر في الكرت */
    .table tr td:first-child {
        background:  var(--cc-primary);
        font-weight: bold;
        border-radius: 12px 12px 0 0;
        COLOR: WHITE;
    }
}

/* ================== CENTER "ORDER AGAIN" BUTTON ================== */

/* الخلية نفسها */
.table td {
    vertical-align: middle;
}

/* زر الطلب مرة أخرى */
.reorder-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto 8px auto; /* توسيط أفقي + مسافة تحت */
    text-align: center;
}

/* في حالة وجود أكثر من عنصر داخل نفس td */
.table td > * {
    margin-left: auto;
    margin-right: auto;
}

/* موبايل */
@media (max-width: 576px) {
    .reorder-btn {
        width: 100%;
    }
}

</style>
@endsection

@section('content')
<br><br>

<div class="container">

{{-- ================= PROFILE ================= --}}
<div class="profile-card">
    <div style="display:flex;justify-content:center">
        <img src="{{ asset('assets/img/media/user-icon-flat-style-person-260nw-1225151629.png') }}"
             alt="User Avatar" class="profile-image">
    </div>

    <h1>{{ $user->name }}</h1>

    <p>
        @if(App::getLocale()==='ar')
            {{ $user->email }} <strong>{{ __('messages.email') }}</strong>
        @else
            <strong>{{ __('messages.email') }}</strong> {{ $user->email }}
        @endif
    </p>

    <h4 dir="{{ App::getLocale()==='ar' ? 'rtl' : 'ltr' }}">
        {{ App::getLocale()==='ar' ? 'نقاط الولاء :' : 'Loyalty points :' }}
        {{ $availablePoints }}
    </h4>

    <p>
        @if(App::getLocale()==='ar')
            {{ $user->created_at->translatedFormat('d M Y') }}
            <strong>{{ __('messages.join_date') }}</strong>
        @else
            <strong>{{ __('messages.join_date') }}</strong>
            {{ $user->created_at->format('d M Y') }}
        @endif
    </p>

    <a href="{{ route('profile.edit') }}" class="btn-custom">
        {{ __('messages.edit_profile') }}
    </a>
</div>

{{-- ================= FLASH ================= --}}
@if(session('success')) <div style="color:green">{{ session('success') }}</div> @endif
@if(session('error'))   <div style="color:red">{{ session('error') }}</div>   @endif


{{-- ================= BOOKINGS ================= --}}
<div class="container rtl" style="margin-top:20px;">
<h3 style="color:#e47823">{{ App::getLocale()==='ar'?'حجوزاتك':'Your Bookings' }}</h3>

@if($bookings->count())
<div class="table-responsive">
<table class="table table-bordered align-middle">
<thead>
<tr>
<th>#</th>
<th>{{ App::getLocale()==='ar'?'الموعد':'Appointment' }}</th>
<th>{{ App::getLocale()==='ar'?'الباقة/الباقات':'Packages' }}</th>
<th>{{ App::getLocale()==='ar'?'السعر النهائي':'Final Price' }}</th>
<th>{{ App::getLocale()==='ar'?'الفرع':'Branch' }}</th>
<th>{{ App::getLocale()==='ar'?'ساطحة':'Flatbed' }}</th>
<th>{{ App::getLocale()==='ar'?'الحالة':'Status' }}</th>
<th>{{ App::getLocale()==='ar'?'الإجراء':'Action' }}</th>
</tr>
</thead>

<tbody>
@foreach($bookings as $i => $booking)
@php
    $bd = \Carbon\Carbon::parse($booking->date);
@endphp
<tr>

<td>{{ $i+1 }}</td>

<td>
<strong>{{ $bd->translatedFormat('l') }}</strong><br>
{{ $bd->translatedFormat('d M Y') }}<br>
<small>{{ $booking->time }}</small>
</td>

<td>
@if(!empty($booking->package_names))
<ul class="mb-0">
@foreach($booking->package_names as $pkg)
<li>{{ $pkg }}</li>
@endforeach
</ul>
@else
—
@endif
</td>

<td>
{{ number_format($booking->total_price,2) }}
{{ App::getLocale()==='ar'?'ريال':'SAR' }}
</td>

<td>
{{ $booking->branch
    ? (App::getLocale()==='ar'
        ? $booking->branch->branch_name_ar
        : $booking->branch->branch_name)
    : '—' }}
</td>

{{-- ===== الساطحة ===== --}}
<td>
@if($booking->flatbed)
<span class="badge d-block mb-1" style="background:#e17055;color:#fff;">
 {{ App::getLocale()==='ar' ? $booking->flatbed->name_ar : $booking->flatbed->name }}
</span>

@if($booking->flatbed->flatbed_type)
<br>
<small class="text-muted" style="font-family: 'Cairo', sans-serif !important;">
{{ App::getLocale()==='ar'
? $booking->flatbed->flatbed_type->name_ar
: $booking->flatbed->flatbed_type->name }}
</small>
@endif
@else
<br>
<span class="badge bg-light text-dark" >
{{ App::getLocale()==='ar'?'بدون ساطحة':'Without a flatbed' }}
</span>
@endif
</td>

{{-- ===== الحالة + نقاط الولاء ===== --}}
<td>
@if($booking->status==1 || $booking->status=='pending')
<span class="badge bg-secondary">⏳ {{ __('messages.booking_status_pending') }}</span>

@elseif($booking->status==2)
<span class="badge bg-danger">❌ {{ __('messages.booking_status_cancelled') }}</span>

@elseif($booking->status==3)
<span class="badge bg-warning text-dark">{{ __('messages.booking_status_progress') }}</span>

@elseif($booking->status==4)
<span class="badge bg-success">✅ {{ __('messages.booking_status_delivered') }}</span>

@php
$pointsRow = DB::table('loyalty_points_ledger')
    ->where('email', auth()->user()->email)
    ->where('note', 'like', '%أوردر #' . $booking->id . '%')
    ->orderByDesc('created_at')
    ->first();
@endphp

@if($pointsRow)
<div class="mt-1 text-success small">
⭐ {{ $pointsRow->points }} {{ App::getLocale() === 'ar' ? 'نقطة' : 'Points' }}
</div>

@php
$status = strtolower(trim($pointsRow->status));
@endphp

@if($pointsRow->consumed_at)
<div class="small text-primary">🔄 {{ App::getLocale()==='ar'?'تم استخدام النقاط':'Points used' }}</div>

@elseif($status === 'expired')
<div class="small text-danger">⛔ {{ App::getLocale()==='ar'?'انتهت صلاحية النقاط':'Points expired' }}</div>

@elseif($status === 'active' && $pointsRow->expires_at)
@php
$expiresAt = \Carbon\Carbon::parse($pointsRow->expires_at);
@endphp
<div class="small text-muted">
⏰ {{ App::getLocale()==='ar'?'تنتهي في':'Expires at' }} {{ $expiresAt->format('Y-m-d') }}
</div>
@endif
@endif

@elseif($booking->status==5)
<span class="badge bg-info">🚛 {{ __('messages.booking_status_tow') }}</span>
@endif
</td>

{{-- ===== الإجراء ===== --}}
<td style="min-width:220px;">

@if($booking->status == 4)
<button
    type="button"
    class="btn btn-outline-primary btn-sm reorder-btn mb-2"
    data-booking='{{ json_encode([
        "booking_id" => $booking->id,
        "branch_id"  => $booking->branch_id
    ]) }}'>
 {{ App::getLocale()==='ar'?'الطلب مرة أخرى':'Order Again' }}
</button>

<form method="POST"
      action="{{ route('reorder.confirm') }}"
      class="reorder-form border rounded p-3 bg-light"
      style="display:none;">

@csrf

<input type="hidden" name="reorder" value="1">
<input type="hidden" name="booking_id" class="booking-id">

{{-- عنوان --}}
<div class="text-center mb-3 fw-bold" style="color:#e47823;font-size:14px;">
{{ App::getLocale()==='ar' ? 'إعادة الحجز' : 'Re-booking' }}
</div>

{{-- الفرع --}}
<div class="mb-2">
<label class="form-label small mb-1">
{{ App::getLocale()==='ar' ? 'الفرع' : 'Branch' }}
</label>
<select name="branch_id"
        class="form-control form-control-sm reorder-branch">
@foreach($branches as $branch)
<option value="{{ $branch->id }}">
{{ App::getLocale()==='ar'
    ? $branch->branch_name_ar
    : $branch->branch_name }}
</option>
@endforeach
</select>
</div>

{{-- التاريخ --}}
<div class="mb-2">
<label class="form-label small mb-1">
{{ App::getLocale()==='ar' ? 'التاريخ' : 'Date' }}
</label>
<input type="date"
       name="date"
       class="form-control form-control-sm reorder-date">
</div>

{{-- الوقت --}}
<div class="mb-3">
<label class="form-label small mb-1">
{{ App::getLocale()==='ar' ? 'الوقت' : 'Time' }}
</label>
<select name="time"
        class="form-control form-control-sm reorder-time">
<option value="">
{{ App::getLocale()==='ar'?'اختر الوقت':'Select time' }}
</option>
</select>
</div>

<button type="submit"
        class="btn btn-success btn-sm w-100">
{{ App::getLocale()==='ar'?'تأكيد الحجز':'Confirm Booking' }}
</button>

</form>


@endif
 <style>
     
     .reorder-form {
    background: #fafafa;
    box-shadow: 0 2px 6px rgba(0,0,0,.08);
}

.reorder-form label {
    font-weight: 600;
    color: #555;
}

.reorder-form select,
.reorder-form input {
    border-radius: 6px;
}

/* ================== CENTER CONFIRM BOOKING BUTTON ================== */

/* زر تأكيد الحجز */
.reorder-form button[type="submit"] {
    display: block;
    margin: 10px auto 0 auto; /* توسيط أفقي */
    text-align: center;
}

/* تأكيد التوسيط داخل الفورم */
.reorder-form {
    text-align: center;
}

/* موبايل */
@media (max-width: 576px) {
    .reorder-form button[type="submit"] {
        width: 100%;
    }
}

 </style>


@if($booking->status == 1 || $booking->status === 'pending')
<form action="{{ route('profile.cancel_booking', $booking->id) }}"
      method="POST"
      onsubmit="return confirm('{{ App::getLocale() === 'ar' ? 'هل أنت متأكد من الإلغاء؟' : 'Are you sure?' }}')">
@csrf
@method('PATCH')
<button class="btn btn-danger btn-sm w-100">
{{ App::getLocale()==='ar'?'إلغاء':'Cancel' }}
</button>
</form>
@endif

</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@else
<div class="alert alert-light text-center">
{{ App::getLocale()==='ar'?'لا توجد حجوزات':'No bookings yet' }}
</div>
@endif
</div>


{{-- ================= JS ================= --}}
<script>
document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.reorder-btn').forEach(btn => {
        btn.addEventListener('click', function () {

            const data = JSON.parse(this.dataset.booking);
            const td   = this.closest('td');
            const form = td.querySelector('.reorder-form');

            document.querySelectorAll('.reorder-form').forEach(f => {
                if (f !== form) f.style.display = 'none';
            });

            form.style.display = form.style.display === 'none' ? 'block' : 'none';

            form.querySelector('.booking-id').value = data.booking_id;
            form.querySelector('.reorder-branch').value = data.branch_id;

            // 📅 ممنوع اليوم الحالي → البداية من بكرة
            const dateInput = form.querySelector('.reorder-date');
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);

            const minDate = tomorrow.toISOString().split('T')[0];

            dateInput.min = minDate;
            dateInput.value = minDate;

            loadTimes(form);
        });
    });

    document.querySelectorAll('.reorder-branch, .reorder-date').forEach(el => {
        el.addEventListener('change', function () {
            loadTimes(this.closest('.reorder-form'));
        });
    });
});

function loadTimes(form) {
    const branch = form.querySelector('.reorder-branch').value;
    const date   = form.querySelector('.reorder-date').value;
    const timeEl = form.querySelector('.reorder-time');

    if (!branch || !date) return;

    fetch(`/available-times?branch_id=${branch}&date=${date}`)
        .then(r => r.json())
        .then(times => {
            timeEl.innerHTML = '';

            if (!times.length) {
                timeEl.innerHTML = `<option value="">لا توجد مواعيد</option>`;
                return;
            }

            times.forEach(t => {
                timeEl.innerHTML += `<option value="${t}">${t}</option>`;
            });
        });
}
</script>


{{-- ================= MAINTENANCE ================= --}}
<div class="container rtl" style="margin-top:30px;">
    <h3 style="color:#e47823">
        {{ App::getLocale()==='ar'?'مواعيد الصيانة':'Maintenance Appointments' }}
    </h3>

    @if($maintenanceAppointments->count())
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ App::getLocale()==='ar'?'الموعد':'Appointment' }}</th>
                    <th>{{ App::getLocale()==='ar'?'الفرع':'Branch' }}</th>
                    <th>{{ App::getLocale()==='ar'?'رقم الفاتورة':'Invoice' }}</th>
                    <th>{{ App::getLocale()==='ar'?'الحالة':'Status' }}</th>
                    <th>{{ App::getLocale()==='ar'?'إجراء':'Action' }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($maintenanceAppointments as $i=>$app)
                    @php
                        $d = \Carbon\Carbon::parse($app->appointment_date);
                        $t = \Carbon\Carbon::parse($app->appointment_time);
                    @endphp
                    <tr>
                        <td>{{ $i+1 }}</td>

                        <td>
                            <strong>{{ $d->translatedFormat('l') }}</strong><br>
                            {{ $d->translatedFormat('d M Y') }}<br>
                            <small>{{ $t->format('h:i A') }}</small>
                        </td>

                        <td>
                            {{ $app->branch
                                ? (App::getLocale()==='ar'
                                    ? $app->branch->branch_name_ar
                                    : $app->branch->branch_name)
                                : '—' }}
                        </td>

                        <td>{{ $app->invoice_number ?? '—' }}</td>

                        <td>
                            <span class="badge
                                {{ $app->status=='pending'?'bg-warning':
                                   ($app->status=='in_progress'?'bg-info':
                                   ($app->status=='completed'?'bg-success':'bg-danger')) }}">
                                {{ App::getLocale()==='ar'
                                    ? ($app->status=='pending'?'قيد الانتظار':
                                      ($app->status=='in_progress'?'جاري العمل':
                                      ($app->status=='completed'?'مكتمل':'ملغي')))
                                    : ucfirst(str_replace('_',' ',$app->status)) }}
                            </span>
                        </td>

                        <td>
                            @if($app->status === 'pending')
                                <form method="POST"
                                      action="{{ route('maintenance.cancel', $app->id) }}"
                                      onsubmit="return confirm('{{ App::getLocale()==='ar'?'هل أنت متأكد من إلغاء الموعد؟':'Are you sure you want to cancel this appointment?' }}')">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">
                                        {{ App::getLocale()==='ar'?'إلغاء':'Cancel' }}
                                    </button>
                                </form>
                            @else
                                —
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-light">
            {{ App::getLocale()==='ar'?'لا توجد مواعيد صيانة':'No maintenance appointments' }}
        </div>
    @endif
</div>


{{-- ================= ORDERS ================= --}}
<div class="container rtl" style="margin-top:30px;">
    <h3 style="color:#e47823">
        {{ App::getLocale()==='ar'?'طلباتك':'Your Orders' }}
    </h3>

    @if($orders->count())
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ App::getLocale()==='ar'?'التاريخ':'Date' }}</th>
                    <th>{{ App::getLocale()==='ar'?'المنتجات':'Products' }}</th>
                    <th>{{ App::getLocale()==='ar'?'السعر النهائي':'Final Price' }}</th>
                    <th>{{ App::getLocale()==='ar'?'الحالة':'Status' }}</th>
                    <th>{{ App::getLocale()==='ar'?'إجراء':'Action' }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($orders as $i=>$order)
                    @php
                        $od = \Carbon\Carbon::parse($order->created_at);
                    @endphp
                    <tr>
                        <td>{{ $i+1 }}</td>

                        <td>{{ $od->translatedFormat('d M Y') }}</td>

                        <td>
                            @if(!empty($order->product_items))
                                <ul class="mb-0">
                                    @foreach($order->product_items as $it)
                                        <li>
                                            {{ $it['name'] }}
                                            <small>× {{ $it['qty'] }}</small>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                —
                            @endif
                        </td>

                        <td>
                            {{ number_format($order->final_price ?? $order->total_price, 2) }}
                            {{ App::getLocale()==='ar'?'ريال':'SAR' }}
                        </td>

                        <td>
                            <span class="badge
                                {{ $order->status=='pending' ? 'badge-secondary' :
                                   ($order->status=='processing' ? 'badge-warning' :
                                   ($order->status=='completed' ? 'badge-success' :
                                   ($order->status=='cancelled' ? 'badge-danger' : 'badge-light'))) }}">
                                {{ App::getLocale()==='ar'
                                    ? ($order->status=='pending' ? 'قيد الانتظار' :
                                      ($order->status=='processing' ? 'جاري التجهيز' :
                                      ($order->status=='completed' ? 'مكتمل' :
                                      ($order->status=='cancelled' ? 'ملغي' : '—'))))
                                    : ucfirst($order->status) }}
                            </span>
                        </td>

                        <td>
                            @if($order->status === 'pending')
                                <form method="POST"
                                      action="{{ route('order.cancel', $order->id) }}"
                                      onsubmit="return confirm('{{ App::getLocale()==='ar'?'هل أنت متأكد من إلغاء الطلب؟':'Are you sure you want to cancel this order?' }}')">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">
                                        {{ App::getLocale()==='ar'?'إلغاء':'Cancel' }}
                                    </button>
                                </form>
                            @else
                                —
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-light">
            {{ App::getLocale()==='ar'?'لا توجد طلبات':'No orders yet' }}
        </div>
    @endif
</div>

</div>

<br><br>
@endsection
