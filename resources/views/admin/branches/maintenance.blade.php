<!-- resources/views/admin/branches/index.blade.php -->
@extends('admin.layouts.master3')

@section('css')
<style>
    .table td, .table th {
        vertical-align: middle;
        font-size: 14px;
        white-space: nowrap;
    }

    .card {
        border: 0;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,.05);
        animation: fadeIn .4s ease-in-out;
    }

    .card-header {
        background: #fff;
        border-bottom: 0;
    }

    .message-cell {
        max-width: 250px;
        white-space: normal;
        line-height: 1.6;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(10px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between align-items-center">
    <div>
        <h4 class="card-title mg-b-5">حجوزات الصيانة</h4>
        <small class="text-muted">إدارة طلبات الصيانة</small>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="mdi mdi-tools text-primary"></i>
                    قائمة حجوزات الصيانة
                </h5>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center align-middle" id="example1">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>اسم العميل</th>
                        <th>رقم الجوال</th>
                        <th>البريد الإلكتروني</th>
                        <th>رقم الفاتورة</th>
                        <th>التاريخ</th>
                        <th>الوقت</th>
                        <th>الرسالة</th>
                        <th>الحالة</th>
                        <th>تعديل الحالة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($maintenanceAppointments as $appointment)
                        <tr>
                            <td>#{{ $appointment->id }}</td>
                            <td>{{ $appointment->customer_name }}</td>
                            <td>{{ $appointment->phone }}</td>
                            <td>{{ $appointment->email }}</td>
                            <td>
                                @if($appointment->invoice_number)
                                    <span class="badge badge-info">
                                        {{ $appointment->invoice_number }}
                                    </span>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->appointment_time }}</td>
                            <td class="message-cell text-left">
                                {{ $appointment->message ?? '-' }}
                            </td>
                            <td>
                                <span class="badge
                                    {{ $appointment->status=='pending' ? 'badge-warning' :
                                       ($appointment->status=='in_progress' ? 'badge-info' :
                                       ($appointment->status=='completed' ? 'badge-success' :
                                       ($appointment->status=='cancelled' ? 'badge-danger' : 'badge-secondary'))) }}">
                                    {{ App::getLocale()==='ar'
                                        ? ($appointment->status=='pending' ? 'قيد الانتظار' :
                                          ($appointment->status=='in_progress' ? 'جاري العمل' :
                                          ($appointment->status=='completed' ? 'مكتمل' :
                                          ($appointment->status=='cancelled' ? 'ملغي' : '—'))))
                                        : ucfirst(str_replace('_',' ',$appointment->status))
                                    }}
                                </span>
                            </td>
                            <td>
<a href="{{ route('admin.maintenance.edit', [
        'branch_id' => $appointment->branch_id,
        'id' => $appointment->id
    ]) }}"
   class="btn btn-sm btn-outline-primary">
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
@endsection

@section('js')
@endsection
