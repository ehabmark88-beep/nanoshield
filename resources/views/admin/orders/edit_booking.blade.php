<!-- resources/views/admin/bookings/edit.blade.php -->
@extends('admin.layouts.master3')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">تعديل حجز</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.dashboard.update_booking', $booking->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <!-- الاسم -->
                        <div class="form-group">
                            <label for="name">اسم العميل</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="اسم العميل" value="{{ $booking->name }}" required>
                        </div>
                        <!-- رقم الهاتف -->
                        <div class="form-group">
                            <label for="phone_number">رقم الهاتف</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="رقم الهاتف" value="{{ $booking->phone_number }}" required>
                        </div>
                        <!-- البريد الإلكتروني -->
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="البريد الإلكتروني" value="{{ $booking->email }}" required>
                        </div>
                        <!-- الفرع -->
                        <div class="form-group">
                            <label for="branch_id">الفرع</label>
                            <select class="form-control" id="branch_id" name="branch_id" required>
                                @foreach($branches as $branch)
                                    <option hidden="" value="{{ $branch->id }}" {{ $booking->branch_id == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->branch_name_ar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- الحالة -->
                        <div class="form-group">
                            <label for="status">الحالة</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0" {{ $booking->status == '0' ? 'selected' : '' }}>لم يتم البدء</option>
                                <option value="1" {{ $booking->status == '1' ? 'selected' : '' }}>تم الانتهاء</option>
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>جاري العمل</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
