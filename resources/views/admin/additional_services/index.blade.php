<!-- resources/views/admin/additional_services/index.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">الخدمات الإضافية</h4>
        <a href="{{ route('admin.dashboard.addition_service.create') }}" class="btn btn-primary">إضافة خدمة إضافية</a>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">قائمة الخدمات الإضافية</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap dataTable no-footer" id="example1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>اسم الخدمة</th>
                            <th>السعر</th>
                            <th>المدة الزمنية</th>
                            <th>الصورة</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->name_ar }}</td>
                                <td>{{ $service->price }}</td>
                                <td>{{ $service->duration }} دقيقة</td>
                                <td>
                                    @if($service->image)
                                        <img src="{{ asset('img/additional_services/' . $service->image) }}" alt="Image" width="80" height="70">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.dashboard.addition_service.edit', $service->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('admin.dashboard.addition_service.destroy', $service->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
