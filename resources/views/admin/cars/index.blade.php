<!-- resources/views/admin/cars/index.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">السيارات</h4>
        <a href="{{ route('admin.dashboard.cars.create') }}" class="btn btn-primary">إضافة سيارة جديدة</a>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">قائمة السيارات</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap dataTable no-footer" id="example1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>الحجم</th>
{{--                            <th>التفاصيل</th>--}}
                            <th>الصورة</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->size_ar }}</td>
{{--                                <td>{{ $car->details_ar }}</td>--}}
                                <td>
                                    @if($car->image)
                                        <img src="{{ asset('img/cars/' . $car->image) }}" alt="Image" width="80" height="70">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.dashboard.cars.edit', $car->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('admin.dashboard.cars.destroy', $car->id) }}" method="POST" style="display:inline;">
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
