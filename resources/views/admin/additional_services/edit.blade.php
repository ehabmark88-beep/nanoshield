<!-- resources/views/admin/additional_services/edit.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">تعديل خدمة إضافية</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.dashboard.addition_service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">اسم الخدمة</label>
                            <input type="text" class="form-control"  value="{{ $service->name_ar }}" id="name_ar" name="name_ar" placeholder="اسم الخدمة" required>
                        </div>
                        <div class="form-group">
                            <label for="name"> الاسم (باللغة الانجليزية)</label>
                            <input type="text" class="form-control"  value="{{ $service->name }}" id="name" name="name" placeholder="اسم الخدمة en" required>
                        </div>
                        <div class="form-group">
                            <label for="price">السعر</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="السعر" value="{{ $service->price }}" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="details">التفاصيل</label>
                            <textarea required class="form-control" id="details" name="details" placeholder="تفاصيل الخدمة">{{ $service->details }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="duration">المدة الزمنية </label>
                            <input type="number" class="form-control" id="duration" name="duration" placeholder="المدة الزمنية" value="{{ $service->duration }}" required>
                        </div>
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                            @if($service->image)
                                <img src="{{ asset('img/additional_services/' . $service->image) }}" alt="Image" width="80" height="70">
                                <input type="hidden" name="old_image" value="{{ $service->image }}">
                            @endif
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
