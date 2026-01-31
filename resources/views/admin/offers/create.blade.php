@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <h4 class="card-title mg-b-0">إضافة عرض جديد</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard.offers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- اسم العرض -->
                    <div class="form-group">
                        <label for="name">اسم العرض</label>
                        <input type="text" name="name_ar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name"> اسم العرض (بالانجليزي)</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <!-- التفاصيل -->
                    <div class="form-group">
                        <label for="details">السعر</label>
                        <textarea name="details_ar" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="details">السعر (بالانجليزي)</label>
                        <textarea name="details" class="form-control" rows="3" required></textarea>
                    </div>

                    <!-- الصورة -->
                    <div class="form-group">
                        <label for="image">الصورة</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>


                    <!-- المزايا -->
                    <div class="form-group">
                        <label for="feature1">ميزة 1</label>
                        <input type="text" name="feature1_ar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="feature1">  (en) ميزة1</label>
                        <input type="text" name="feature1" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="feature2"> ميزة 2</label>
                        <input type="text" name="feature2_ar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="feature2"> ميزة2 (en)</label>
                        <input type="text" name="feature2" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="feature3">ميزة 3</label>
                        <input type="text" name="feature3_ar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="feature3">ميزة 3 (en)</label>
                        <input type="text" name="feature3" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="feature4">ميزة 4</label>
                        <input type="text" name="feature4_ar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="feature4">ميزة4 (en)</label>
                        <input type="text" name="feature4" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="feature5">ميزة 5</label>
                        <input type="text" name="feature5_ar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="feature5">ميزة5 (en)</label>
                        <input type="text" name="feature5" class="form-control">
                    </div>

                    <!-- زر الحفظ -->
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
