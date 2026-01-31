@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">العروض</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <a href="{{ route('admin.dashboard.offers.create') }}">
                    <br>
                    <i class="typcn typcn-document-add">إضافة عرض جديد</i>
                    <br>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div id="example1_filter" class="dataTables_filter">
                                    <label><input type="search" class="form-control form-control-sm" placeholder="بحث..." aria-controls="example1"></label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12">
                                <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="wd-5p border-bottom-0 sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                                        <th class="wd-15p border-bottom-0 sorting">الاسم</th>
                                        <th class="wd-15p border-bottom-0 sorting">السعر</th>
                                        <th class="wd-10p border-bottom-0 sorting">الصورة</th>
{{--                                        <th class="wd-10p border-bottom-0 sorting">ميزة 1</th>--}}
{{--                                        <th class="wd-10p border-bottom-0 sorting">ميزة 2</th>--}}
{{--                                        <th class="wd-10p border-bottom-0 sorting">ميزة 3</th>--}}
{{--                                        <th class="wd-10p border-bottom-0 sorting">ميزة 4</th>--}}
{{--                                        <th class="wd-10p border-bottom-0 sorting">ميزة 5</th>--}}
                                        <th class="wd-15p border-bottom-0 sorting">الإجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($offers as $offer)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $offer->id }}</td>
                                            <td>{{ $offer->name_ar }}</td>
                                            <td>{{ $offer->details_ar }} ر.س </td>
                                            <td><img class="img-fluid" src="{{ asset('img/offers/' . $offer->image) }}" alt="Offer image" width="80" height="70"/></td>
{{--                                            <td>{{ $offer->feature1 }}</td>--}}
{{--                                            <td>{{ $offer->feature2 }}</td>--}}
{{--                                            <td>{{ $offer->feature3 }}</td>--}}
{{--                                            <td>{{ $offer->feature4 }}</td>--}}
{{--                                            <td>{{ $offer->feature5 }}</td>--}}
                                            <td>
                                                <a style="color: grey;" class="dropdown-item" href="{{ route('admin.dashboard.offers.edit', $offer->id ) }}">
                                                    <i class="bx bx-edit-alt me-1"></i> تعديل
                                                </a>
                                                <form action="{{ route('admin.dashboard.offers.destroy', $offer->id) }}" method="post" style="display:inline;">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="dropdown-item" type="submit" style="color: red;">
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
                        <div class="row">
                            <div class="col-sm-12 col-md-5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
