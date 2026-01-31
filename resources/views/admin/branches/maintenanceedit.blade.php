@extends('admin.layouts.master3')

@section('css')
<style>
    .info-row {
        margin-bottom: 12px;
        font-size: 15px;
    }
    .info-label {
        font-weight: 600;
        color: #555;
    }
</style>
@endsection

@section('page-header')
<div class="breadcrumb-header justify-content-between align-items-center">
    <div>
        <h4 class="card-title mg-b-5">تعديل حالة الصيانة</h4>
        <small class="text-muted">تحديث حالة حجز الصيانة</small>
    </div>
</div>
@endsection

@section('content')
<div class="col-xl-8 mx-auto">

    {{-- حماية: لو المتغير مش موجود --}}
    @if(!isset($appointment) || !$appointment)
        <div class="alert alert-danger">
            حدث خطأ في تحميل بيانات الحجز
        </div>
    @else

    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">
                <i class="mdi mdi-tools text-primary"></i>
                بيانات الحجز
            </h5>
        </div>

        <div class="card-body">

            {{-- رسائل النجاح --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- بيانات الحجز --}}
            <div class="info-row">
                <span class="info-label">اسم العميل:</span>
                {{ $appointment->customer_name }}
            </div>

            <div class="info-row">
                <span class="info-label">رقم الجوال:</span>
                {{ $appointment->phone }}
            </div>

            <div class="info-row">
                <span class="info-label">البريد الإلكتروني:</span>
                {{ $appointment->email ?: '—' }}
            </div>

            <div class="info-row">
                <span class="info-label">رقم الفاتورة:</span>
                {{ $appointment->invoice_number ?: '—' }}
            </div>

            <div class="info-row">
                <span class="info-label">التاريخ:</span>
                {{ $appointment->appointment_date }}
            </div>

            <div class="info-row">
                <span class="info-label">الوقت:</span>
                {{ $appointment->appointment_time }}
            </div>

            <div class="info-row">
                <span class="info-label">الرسالة:</span>
                {{ $appointment->message ?: '—' }}
            </div>

            <hr>

            {{-- فورم تعديل الحالة --}}
<form action="{{ route('admin.maintenance.updateStatus', [
        'branch_id' => $branch_id,
        'id'        => $appointment->id
    ]) }}"
      method="POST">
    @csrf
    @method('PATCH')


                <div class="form-group">
                    <label class="info-label">حالة الصيانة</label>
                    <select name="status" class="form-control">
                        <option value="pending"     {{ $appointment->status==='pending' ? 'selected' : '' }}>قيد الانتظار</option>
                        <option value="in_progress" {{ $appointment->status==='in_progress' ? 'selected' : '' }}>جاري العمل</option>
                        <option value="completed"   {{ $appointment->status==='completed' ? 'selected' : '' }}>مكتمل</option>
                        <option value="cancelled"   {{ $appointment->status==='cancelled' ? 'selected' : '' }}>ملغي</option>
                    </select>
                </div>


                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i>
                        حفظ التعديل
                    </button>
                </div>
            </form>

        </div>
    </div>

    @endif
</div>
@endsection

@section('js')
@endsection
