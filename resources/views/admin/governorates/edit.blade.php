@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">تعديل المنطقة</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.dashboard.governorates.update', $governorate->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <!-- اسم المحافظة -->
                        <div class="form-group">
                            <label for="name">اسم المنطقة</label>
                            <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="اسم المحافظة" value="{{ $governorate->name_ar }}" required>
                        </div>
                        <div class="form-group">
                            <label for="name">اسم المنطقة  (بالانجليزي)</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="اسم المحافظة" value="{{ $governorate->name }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">تحديث</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
