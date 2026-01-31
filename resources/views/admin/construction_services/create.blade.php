<!-- resources/views/admin/construction_services/create.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">إضافة خدمة جديدة</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.dashboard.construction_service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="الاسم" required>
                        </div>

                        <div class="form-group">
                            <label for="name"> الاسم (بالانجليزية)</label>
                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="الاسم" required>
                        </div>

                        <div class="form-group">
                            <label for="details">التفاصيل</label>
                            <textarea class="form-control" id="details" name="details" placeholder="تفاصيل الخدمة"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" class="form-control" id="image" name="image">
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
