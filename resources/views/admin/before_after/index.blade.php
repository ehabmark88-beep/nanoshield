<!-- resources/views/admin/before_after/index.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">صور قبل وبعد</h4>
        <a href="{{ route('admin.dashboard.before_after.create') }}" class="btn btn-primary">إضافة صورة جديدة</a>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">قائمة صور قبل وبعد</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap dataTable no-footer" id="example1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>اسم الصورة</th>
                            <th>التفاصيل</th>
                            <th>صورة قبل</th>
                            <th>صورة بعد</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name_ar }}</td>
                                <td>{{ $item->details_ar }}</td>

                                <!-- عرض الصور -->
                                <td>
                                    <img src="{{ asset('img/before_after/' . $item->image_before) }}" alt="Before Image" width="80" height="70">
                                </td>
                                <td>
                                    <img src="{{ asset('img/before_after/' . $item->image_after) }}" alt="After Image" width="80" height="70">
                                </td>

                                <td>
                                    <a href="{{ route('admin.dashboard.before_after.edit', $item->id) }}" class="btn btn-warning">تعديل</a>
                                    <form action="{{ route('admin.dashboard.before_after.destroy', $item->id) }}" method="POST" style="display:inline;">
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
