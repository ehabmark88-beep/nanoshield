@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0 my-auto">قائمة الفيديوهات</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الفيديوهات</h4>
                    <a href="{{ route('admin.dashboard.video_gallery.create') }}" class="btn btn-primary">إضافة فيديو جديد</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mg-b-0 text-md-nowrap">
                            <thead>
                            <tr>
                                <th>الفيديو</th>
                                <!--<th>الباقة</th>-->
                                <!--<th>التصنيف</th>-->
                                <th>التفاصيل</th>
                                <th>الإجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videos as $video)
                                <tr>
                                    <td>
                                        @if($video->video_link)
                                            <iframe width="500" height="215" src="{{ $video->video_link }}" frameborder="0" allowfullscreen></iframe>
                                        @else
                                            <p>لا يوجد فيديو</p>
                                        @endif
                                    </td>
                                    <td>{{ $video->details }}</td>
                                    <td>
                                        <a href="{{ route('admin.dashboard.video_gallery.edit', $video->id) }}" class="btn btn-info btn-sm">تعديل</a>
                                        <form action="{{ route('admin.dashboard.video_gallery.destroy', $video->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
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
    </div>
@endsection

@section('js')
@endsection
