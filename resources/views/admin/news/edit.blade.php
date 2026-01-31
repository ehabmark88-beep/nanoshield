@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0 my-auto">تعديل الخبر</h4>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.dashboard.media.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">العنوان</label>
                        <input type="text" name="title_ar" class="form-control" id="title_ar" value="{{ $news->title_ar }}" required>
                    </div>
                    <div class="form-group">
                        <label for="title"> العنوان  (بالانجليزي)</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $news->title }}" required>
                    </div>


                    <div class="form-group">
                        <label for="details"> التفاصيل </label>
                        <textarea name="details_ar" class="form-control" id="details_ar" required>{{ $news->details_ar }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="details"> التفاصيل (بالانجليزي)</label>
                        <textarea name="details" class="form-control" id="details" required>{{ $news->details }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="more_details"> المزيد من التفاصيل</label>
                        <textarea name="more_details_ar" class="form-control" id="more_details_ar" required>{{ $news->more_details_ar }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="more_details"> المزيد من التفاصيل  (بالانجليزي)</label>
                        <textarea name="more_details" class="form-control" id="more_details" required>{{ $news->more_details }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="link">الرابط</label>
                        <input type="text" name="link" class="form-control" id="link" value="{{ $news->link }}">
                    </div>
                    <div class="form-group">
                        <label for="image">الصورة</label>
                        <input type="file" name="image" class="form-control" id="image">
                        @if($news->image)
                            <img src="{{ asset('img/news/' . $news->image) }}" alt="{{ $news->title }}" width="100" class="mt-3">
                            <input type="hidden" name="old_image" value="{{ $news->image }}">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">تحديث الخبر</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
