<!-- resources/views/admin/construction_services/edit.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">تعديل خدمة</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.dashboard.construction_service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="الاسم" value="{{ $service->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name"> الاسم (بالانجليزية)</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $service->name_en }}" required>
                        </div>
                        <div class="form-group">
                            <label for="details">التفاصيل</label>
                            <textarea class="form-control" id="details" name="details" placeholder="تفاصيل الخدمة">{{ $service->details }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($service->image)
                                <img src="{{ asset('img/construction_services/' . $service->image) }}" alt="Image" width="80" height="70">
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
