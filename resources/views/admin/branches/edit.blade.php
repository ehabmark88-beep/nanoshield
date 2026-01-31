<!-- resources/views/admin/branches/edit.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">تعديل فرع</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.dashboard.branches.update', $branch->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <!-- اسم الفرع -->
                        <div class="form-group">
                            <label for="branch_name">اسم الفرع</label>
                            <input type="text" class="form-control" id="branch_name_ar" name="branch_name_ar" placeholder="اسم الفرع" value="{{ $branch->branch_name_ar }}" required>
                        </div>
                        <div class="form-group">
                            <label for="branch_name">اسم الفرع (بالانجليزي)</label>
                            <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="اسم الفرع" value="{{ $branch->branch_name }}" required>
                        </div>
                        <!-- عنوان الفرع -->
                        <div class="form-group">
                            <label for="branch_address"> عنوان الفرع </label>
                            <input type="text" class="form-control" id="branch_address_ar" name="branch_address_ar" placeholder="عنوان الفرع" value="{{ $branch->branch_address_ar }}" required>
                        </div>
                        <div class="form-group">
                            <label for="branch_address">عنوان الفرع (بالانجليزي)</label>
                            <input type="text" class="form-control" id="branch_address" name="branch_address" placeholder="عنوان الفرع" value="{{ $branch->branch_address }}" required>
                        </div>
                        <!-- لينك الفرع -->
                        <div class="form-group">
                            <label for="branch_link">تفاصيل الخريطة (iframe)</label>
                            <input type="text" class="form-control" id="branch_link" name="branch_link" placeholder="لينك الفرع" value="{{ $branch->branch_link }}"required>
                        </div>
                        <!-- تفاصيل الفرع -->
                        <div class="form-group">
                            <label for="branch_details">لينك الخريطة </label>
                            <textarea required class="form-control" id="branch_details" name="branch_details" placeholder="تفاصيل الفرع">{{ $branch->branch_details }}</textarea>
                        </div>
                        <!-- المحافظة -->
                        <div class="form-group">
                            <label for="governorate_id">المحافظة</label>
                            <select class="form-control" id="governorate_id" name="governorate_id" required>
                                <option value="">اختر المحافظة</option>
                                @foreach($governorates as $governorate)
                                    <option value="{{ $governorate->id }}" {{ $branch->governorate_id == $governorate->id ? 'selected' : '' }}>
                                        {{ $governorate->name_ar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Contact Us (تواصل معنا) -->
                        <div class="form-group">
                            <label for="contact_us">تواصل معنا</label>
                            <input type="text" class="form-control" id="contact_us" name="contact_us" placeholder="رابط تواصل معنا" value="{{ $branch->contact_us }}">
                        </div>
                        <!-- الصورة -->
{{--                        <div class="form-group">--}}
{{--                            <label for="image">الصورة</label>--}}
{{--                            <input type="file" class="form-control" id="image" name="image">--}}
{{--                            @if($branch->image)--}}
{{--                                <img src="{{ asset('img/branches/' . $branch->image) }}" alt="Image" width="80" height="70">--}}
{{--                                <input type="hidden" name="old_image" value="{{ $branch->image }}">--}}
{{--                            @endif--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-primary">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
