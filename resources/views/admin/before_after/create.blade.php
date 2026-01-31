<!-- resources/views/admin/before_after/create.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">إضافة صورة جديدة (قبل وبعد)</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.dashboard.before_after.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- اسم الصورة -->
                        <div class="form-group">
                            <label for="name"> عنوان الصورة</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="اسم الصورة" required>
                        </div>
                        <div class="form-group">
                            <label for="name">عنوان الصورة (بالانجليزي)</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="اسم الصورة" required>
                        </div>
                        <!-- تفاصيل الصورة -->
                        <div class="form-group">
                            <label for="details">تفاصيل الصورة</label>
                            <textarea required class="form-control" id="details_ar" name="details_ar" placeholder="تفاصيل الصورة"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="details">تفاصيل الصورة (بالانجليزي)</label>
                            <textarea required class="form-control" id="details" name="details" placeholder="تفاصيل الصورة"></textarea>
                        </div>
                        <!-- صورة قبل -->
                        <div class="form-group">
                            <label for="image_before">صورة قبل</label>
                            <input type="file" class="form-control" id="image_before" name="image_before" required>
                        </div>
                        <!-- صورة بعد -->
                        <div class="form-group">
                            <label for="image_after">صورة بعد</label>
                            <input type="file" class="form-control" id="image_after" name="image_after" required>
                        </div>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
