@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0 my-auto">إضافة كوبون جديد</h4>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.dashboard.coupons.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="code">الكود</label>
                        <input type="text" name="code" class="form-control" id="code" required>
                    </div>
                    <div class="form-group">
                        <label for="discount">الخصم</label>
                        <input type="number" name="discount" class="form-control" id="discount" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="type">النوع</label>
                        <select name="type" id="type" class="form-control">
                            <option value="fixed">مبلغ ثابت</option>
                            <option value="percent">نسبة مئوية</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">تاريخ الانتهاء</label>
                        <input type="datetime-local" name="expiry_date" class="form-control" id="expiry_date">
                    </div>
                    <div class="form-group">
                        <label for="usage_limit">عدد مرات الاستخدام</label>
                        <input type="number" name="usage_limit" class="form-control" id="usage_limit">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">حفظ الكوبون</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
