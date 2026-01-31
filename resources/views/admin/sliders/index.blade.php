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
                    <h4 class="card-title mg-b-0">البنارات الرئيسية</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <a href="{{ route('admin.dashboard.sliders.create') }}">
                    <br>
                    <i class="typcn typcn-document-add">اضافة</i>
                    <br>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div id="example1_filter" class="dataTables_filter"><label><input type="search" class="form-control form-control-sm" placeholder="Search..." aria-controls="example1"></label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                            </div>
                            <div class="col-sm-12">
                                <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row"><th class="wd-15p border-bottom-0 sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First name: activate to sort column descending" style="width: 142.24px;">Id</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending" style="width: 142.24px;">الأسم</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending" style="width: 142.24px;">الاسم انجليزي</th>
                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending" style="width: 142.24px;">الصورة</th>
{{--                                        <th class="wd-15p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Last name: activate to sort column ascending" style="width: 142.24px;">الصورة</th>--}}
                                        <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="E-mail: activate to sort column ascending" style="width: 263.789px;">Action</th></tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $slider)
                                        <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $slider->id }}</td>
                                            <td>{{ $slider->name_ar }}</td>
                                            <td>{{ $slider->name }}</td>
{{--                                            <td>{{ $slider->details }}</td>--}}
                                            <td><img class="img-fluid" src="{{ asset('img/sliders/' . $slider->image) }}" alt="Card image cap" width="80" height="70"/></td>
                                        <td>
                                            <a style="color: grey;" class="dropdown-item" href="{{ route('admin.dashboard.sliders.edit', $slider->id ) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ route('admin.dashboard.sliders.destroy', $slider->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item" type="submit" ><i class="bx bx-trash me-1" ></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"></div>
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
