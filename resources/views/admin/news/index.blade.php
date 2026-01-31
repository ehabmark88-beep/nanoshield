@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0 my-auto">إدارة الأخبار</h4>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">قائمة الأخبار</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <a href="{{ route('admin.dashboard.media.create') }}">
                    <br>
                    <i class="typcn typcn-document-add">إضافة خبر جديد</i>
                    <br>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>العنوان</th>
                            <th>التفاصيل</th>
{{--                            <th>المزيد من التفاصيل</th>--}}
                            <th>الصورة</th>
                            <th>الرابط</th> <!-- العمود الجديد -->
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newsItems as $news)
                            <tr>
                                <td>{{ $news->id }}</td>
                                <td>{{ $news->title_ar }}</td>
                                <td>{{ Str::limit($news->details_ar, 50) }}</td>
{{--                                <td>{{ Str::limit($news->more_details_ar, 50) }}</td>--}}
                                <td>
                                    @if($news->image)
                                        <img src="{{ asset('img/news/' . $news->image) }}" alt="{{ $news->title }}" width="50">
                                    @else
                                        لا توجد صورة
                                    @endif
                                </td>
                                <td>
                                    @if($news->link)
                                        <a href="{{ $news->link }}" target="_blank" class="btn btn-sm btn-info">عرض الرابط</a>
                                    @else
                                        لا يوجد رابط
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.dashboard.media.edit', $news->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                                    <form action="{{ route('admin.dashboard.media.destroy', $news->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
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
