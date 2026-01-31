<!-- resources/views/admin/branches/create.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">إضافة فرع جديد</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.dashboard.branches.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- اسم الفرع -->
                        <div class="form-group">
                            <label for="branch_name">اسم الفرع</label>
                            <input type="text" class="form-control" id="branch_name_ar" name="branch_name_ar" placeholder="اسم الفرع"  required>
                        </div>
                        <div class="form-group">
                            <label for="branch_name">اسم الفرع (بالانجليزي)</label>
                            <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="اسم الفرع"  required>
                        </div>
                        <!-- عنوان الفرع -->
                        <div class="form-group">
                            <label for="branch_address"> عنوان الفرع </label>
                            <input type="text" class="form-control" id="branch_address_ar" name="branch_address_ar" placeholder="عنوان الفرع"  required>
                        </div>
                        <div class="form-group">
                            <label for="branch_address">عنوان الفرع (بالانجليزي)</label>
                            <input type="text" class="form-control" id="branch_address" name="branch_address" placeholder="عنوان الفرع"  required>
                        </div>
                        <!-- لينك الفرع -->
                        <div class="form-group">
                            <label for="branch_link">تفاصيل الخريطة (iframe)</label>
                            <input type="text" class="form-control" id="branch_link" name="branch_link" placeholder="لينك الفرع" required>
                        </div>
                        <!-- تفاصيل الفرع -->
                        <div class="form-group">
                            <label for="branch_details">لينك الخريطة</label>
                            <textarea required class="form-control" id="branch_details" name="branch_details" placeholder="تفاصيل الفرع"></textarea>
                        </div>
                        <!-- المحافظة -->
                        <div class="form-group">
                            <label for="governorate_id">المحافظة</label>
                            <select class="form-control" id="governorate_id" name="governorate_id" required>
                                <option value="">اختر المحافظة</option>
                                @foreach($governorates as $governorate)
                                    <option value="{{ $governorate->id }}">{{ $governorate->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Contact Us (تواصل معنا) -->
                        <div class="form-group">
                            <label for="contact_us">تواصل معنا</label>
                            <input type="text" class="form-control" id="contact_us" name="contact_us" placeholder="رابط تواصل معنا">
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="image">الصورة</label>--}}
{{--                            <input type="file" class="form-control" id="image" name="image">--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
