@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0 my-auto">تعديل كوبون</h4>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.dashboard.coupons.update', $coupon->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="code">الكود</label>
                        <input type="text" name="code" class="form-control" id="code" value="{{ $coupon->code }}" required>
                    </div>
                    <div class="form-group">
                        <label for="discount">الخصم</label>
                        <input type="number" name="discount" class="form-control" id="discount" value="{{ $coupon->discount }}" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="type">النوع</label>
                        <select name="type" id="type" class="form-control">
                            <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>مبلغ ثابت</option>
                            <option value="percent" {{ $coupon->type == 'percent' ? 'selected' : '' }}>نسبة مئوية</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">تاريخ الانتهاء</label>
                        <input type="datetime-local" name="expiry_date" class="form-control" id="expiry_date"
                               value="{{ $coupon->expiry_date ? \Carbon\Carbon::parse($coupon->expiry_date)->format('Y-m-d\TH:i') : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="usage_limit">عدد مرات الاستخدام</label>
                        <input type="number" name="usage_limit" class="form-control" id="usage_limit" value="{{ $coupon->usage_limit }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">تحديث الكوبون</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
