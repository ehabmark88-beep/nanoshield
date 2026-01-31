@extends('admin.layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0 my-auto">إدارة الكوبونات</h4>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">قائمة الكوبونات</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
                <a href="{{ route('admin.dashboard.coupons.create') }}">
                    <br>
                    <i class="typcn typcn-document-add">إضافة كوبون جديد</i>
                    <br>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>الكود</th>
                            <th>الخصم</th>
                            <th>النوع</th>
                            <th>تاريخ الانتهاء</th>
                            <th>عدد مرات الاستخدام</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->discount }} @if($coupon->type == 'percent')% @endif</td>
                                <td>{{ $coupon->type == 'fixed' ? 'مبلغ ثابت' : 'نسبة مئوية' }}</td>
                                <td>{{ $coupon->expiry_date ? \Carbon\Carbon::parse($coupon->expiry_date)->format('Y-m-d') : 'غير محدد' }}</td>
                                <td>{{ $coupon->used }} / {{ $coupon->usage_limit ?? 'غير محدد' }}</td>
                                <td>
                                    <a href="{{ route('admin.dashboard.coupons.edit', $coupon->id) }}" class="btn btn-sm btn-primary">تعديل</a>
                                    <form action="{{ route('admin.dashboard.coupons.destroy', $coupon->id) }}" method="POST" style="display:inline-block;">
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
