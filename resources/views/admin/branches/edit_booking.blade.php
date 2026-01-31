<!-- resources/views/admin/bookings/edit.blade.php -->
@extends('admin.layouts.master3')

@section('css')
<style>
    .card {
        border: 0;
        border-radius: 14px;
        box-shadow: 0 6px 20px rgba(0,0,0,.06);
        animation: fadeIn .4s ease-in-out;
    }

    .card-header {
        background: #fff;
        border-bottom: 1px solid #eee;
    }

    .form-control {
        border-radius: 10px;
        height: 45px;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
    }

    .btn-primary {
        padding: 10px 30px;
        border-radius: 10px;
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
        <h4 class="card-title mg-b-5">تعديل حجز</h4>
        <small class="text-muted">تحديث بيانات وحالة الحجز</small>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="mdi mdi-pencil text-warning"></i>
                    بيانات الحجز
                </h5>
            </div>

            <form action="{{ route('admin.dashboard.update_booking', $booking->id) }}" method="POST">
                @method('PATCH')
                @csrf

                <div class="card-body">

                    <!-- اسم العميل -->
                    <div class="form-group">
                        <label for="name">اسم العميل</label>
                        <input type="text"
                               class="form-control"
                               id="name"
                               name="name"
                               value="{{ $booking->name }}"
                               required>
                    </div>

                    <!-- رقم الهاتف -->
                    <div class="form-group">
                        <label for="phone_number">رقم الهاتف</label>
                        <input type="text"
                               class="form-control"
                               id="phone_number"
                               name="phone_number"
                               value="{{ $booking->phone_number }}"
                               required>
                    </div>

                    <!-- البريد الإلكتروني -->
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email"
                               class="form-control"
                               id="email"
                               name="email"
                               value="{{ $booking->email }}"
                               required>
                    </div>

                    <!-- الفرع (غير قابل للتعديل) -->
<div class="form-group">
    <label>الفرع</label>

    <!-- عرض الفرع فقط -->
    <input type="text"
           class="form-control"
           value="{{ $branches->where('id', $booking->branch_id)->first()->branch_name_ar ?? '' }}"
           disabled>

    <!-- إرسال قيمة الفرع مخفية -->
    <input type="hidden" name="branch_id" value="{{ $booking->branch_id }}">
</div>


                    <!-- حالة الحجز (محدثة) -->
                    <div class="form-group">
                        <label for="status">حالة الحجز</label>
                        <select class="form-control" id="status" name="status" required>

                            <option value="1" {{ $booking->status == 1 ? 'selected' : '' }}>
                                ⏳ قيد الانتظار
                            </option>

                            <option value="2" {{ $booking->status == 2 ? 'selected' : '' }}>
                                ❌ تم إلغاء الحجز (العميل لم يسلم السيارة)
                            </option>

                            <option value="3" {{ $booking->status == 3 ? 'selected' : '' }}>
                                🚗 تم استلام السيارة – تحت الإجراء
                            </option>

                            <option value="4" {{ $booking->status == 4 ? 'selected' : '' }}>
                                ✅ تم التسليم
                            </option>

                            <option value="5" {{ $booking->status == 5 ? 'selected' : '' }}>
                                🚛 تم إرسال الساطحة
                            </option>

                        </select>
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i>
                        تحديث الحجز
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

