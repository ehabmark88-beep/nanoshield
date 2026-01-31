@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0 my-auto">إضافة خبر جديد</h4>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.dashboard.media.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text" name="title_ar" class="form-control" id="title_ar" required>
                    </div>
                    <div class="form-group">
                        <label for="title"> العنوان  (بالانجليزي)</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>


                    <div class="form-group">
                        <label for="details"> التفاصيل </label>
                        <textarea name="details_ar" class="form-control" id="details_ar" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="details"> التفاصيل (بالانجليزي)</label>
                        <textarea name="details" class="form-control" id="details" required></textarea>
                    </div>


                    <div class="form-group">
                        <label for="more_details"> المزيد من التفاصيل</label>
                        <textarea name="more_details_ar" class="form-control" id="more_details_ar" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="more_details"> المزيد من التفاصيل  (بالانجليزي)</label>
                        <textarea name="more_details" class="form-control" id="more_details" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="link">الرابط</label>
                        <input type="text" name="link" class="form-control" id="link" required>
                    </div>
                    <div class="form-group">
                        <label for="image">الصورة</label>
                        <input type="file" name="image" class="form-control" id="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">حفظ الخبر</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
