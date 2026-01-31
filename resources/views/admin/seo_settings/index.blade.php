@extends('admin.layouts.master')

@section('css')
    <!-- يمكنك إضافة أي CSS مخصص هنا إذا كان هناك حاجة -->
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">إعدادات السيو</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">إعدادات السيو</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <a href="{{ route('admin.dashboard.seo-settings.create') }}" class="btn btn-success mt-2">
                    <i class="typcn typcn-document-add"></i> إضافة إعداد جديد
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label>
                                        <input type="search" class="form-control form-control-sm" placeholder="بحث..." aria-controls="example1">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                            </div>
                            <div class="col-sm-12">
                                <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="wd-15p border-bottom-0 sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 142.24px;">ID</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Page Name: activate to sort column ascending" style="width: 142.24px;">اسم الصفحة</th>
                                        <th class="wd-25p border-bottom-0 sorting" style="width: 263.789px;">العنوان</th>
                                        <th class="wd-25p border-bottom-0 sorting" style="width: 263.789px;">الوصف</th>
                                        <th class="wd-25p border-bottom-0 sorting" style="width: 263.789px;">الكلمات المفتاحية</th>
                                        <th class="wd-25p border-bottom-0 sorting" style="width: 263.789px;">الإجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($seoSettings as $setting)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $setting->id }}</td>
                                            <td>{{ $setting->page_name }}</td>
                                            <td>{{ $setting->title }}</td>
                                            <td>{{ $setting->meta_description }}</td>
                                            <td>{{ $setting->meta_keywords }}</td>
                                            <td>
                                                <a class="btn btn-warning btn-sm" href="{{ route('admin.dashboard.seo-settings.edit', $setting->id ) }}">
                                                    <i class="bx bx-edit-alt me-1"></i> تعديل
                                                </a>
                                                <form action="{{ route('admin.dashboard.seo-settings.destroy', $setting->id) }}" method="post" style="display:inline-block;">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm" type="submit">
                                                        <i class="bx bx-trash me-1"></i> حذف
                                                    </button>
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
        </div>
    </div>

    <!-- Floating Alert (رسالة نجاح) -->
    <div id="floatingAlert" class="floating-alert">
        <span id="floatingAlertMessage"></span>
        <span class="check-icon">&#10003;</span> <!-- علامة صح -->
    </div>

@endsection

@section('js')
    <!-- يمكنك إضافة أي JS مخصص هنا -->
@endsection
