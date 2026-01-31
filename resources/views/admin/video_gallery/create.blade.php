@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0 my-auto">إضافة فيديو جديد</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.dashboard.video_gallery.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="video_link">رابط الفيديو</label>
                            <input type="url" class="form-control" name="video_link" required>
                            <small>أدخل رابط الفيديو (يجب أن يكون رابطاً صحيحاً).</small>
                        </div>

                        <div class="form-group">
                            <label for="details">التفاصيل</label>
                            <textarea name="details" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">إضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
