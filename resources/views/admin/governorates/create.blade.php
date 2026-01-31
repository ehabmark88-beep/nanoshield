@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">إضافة منطقة جديدة</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.dashboard.governorates.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <!-- اسم المحافظة -->
                        <div class="form-group">
                            <label for="name">اسم المنطقة</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="اسم المنطقة" required>
                        </div>
                        <div class="form-group">
                            <label for="name"> اسم المنطقة  (بالانجليزي)</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="اسم المنطقة" required>
                        </div>

                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
