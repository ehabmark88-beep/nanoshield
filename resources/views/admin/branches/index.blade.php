<!-- resources/views/admin/branches/index.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">الفروع</h4>
        <a href="{{ route('admin.dashboard.branches.create') }}" class="btn btn-primary">إضافة فرع</a>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">قائمة الفروع</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap dataTable no-footer" id="example1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>اسم الفرع</th>
                            <th>عنوان الفرع</th>
                            <th>المحافظة</th>
{{--                            <th>الصورة</th>--}}
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($branches as $branch)
                            <tr>
                                <td>{{ $branch->id }}</td>
                                <td>{{ $branch->branch_name_ar }}</td>
                                <td>{{ $branch->branch_address_ar }}</td>

                                <!-- تعديل عرض اسم المحافظة باستخدام العلاقة -->
                                <td>{{ $branch->governorate->name_ar }}</td>

                                <!-- عرض الصورة -->
{{--                                <td>--}}
{{--                                        <img src="{{ asset('img/branches/' . $branch->image) }}" alt="Image" width="80" height="70">--}}
{{--                                </td>--}}

                                <td>
                                    <a href="{{ route('admin.dashboard.branches.edit', $branch->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('admin.dashboard.branches.destroy', $branch->id) }}" method="POST" style="display:inline;">
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
    <div id="floatingAlert" class="floating-alert">
        <span id="floatingAlertMessage"></span>
        <span class="check-icon">&#10003;</span> <!-- علامة صح -->
    </div>

@endsection

@section('js')
@endsection
