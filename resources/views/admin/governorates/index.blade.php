<!-- resources/views/admin/governorates/index.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">المناطق</h4>
        <a href="{{ route('admin.dashboard.governorates.create') }}" class="btn btn-primary">إضافة منطقة</a>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">قائمة المناطق</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap dataTable no-footer" id="example1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>اسم المنطقة</th>
                            <th>اسم المنطقة  (بالانجليزي)</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($governorates as $governorate)
                            <tr>
                                <td>{{ $governorate->id }}</td>
                                <td>{{ $governorate->name_ar }}</td>
                                <td>{{ $governorate->name }}</td>
                                <td>
                                    <a href="{{ route('admin.dashboard.governorates.edit', $governorate->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('admin.dashboard.governorates.destroy', $governorate->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
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
