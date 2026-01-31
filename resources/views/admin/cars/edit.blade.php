<!-- resources/views/admin/cars/edit.blade.php -->
@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">تعديل سيارة</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <form action="{{ route('admin.dashboard.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="size">الحجم</label>
                            <input type="text" class="form-control" id="size_ar" name="size_ar" placeholder="الحجم" value="{{ $car->size_ar }}" required>
                        </div>
                        <div class="form-group">
                            <label for="size">الحجم (بالانجليزي)</label>
                            <input type="text" class="form-control" id="size" name="size" placeholder="الحجم" value="{{ $car->size }}" required>
                        </div>
                        <div class="form-group">
                            <label for="details">التفاصيل</label>
                            <textarea  class="form-control" id="details_ar" name="details_ar" placeholder="تفاصيل السيارة" required>{{ $car->details_ar }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="details"> التفاصيل (بالاجليزي)</label>
                            <textarea class="form-control" id="details" name="details" placeholder="تفاصيل السيارة" required>{{ $car->details }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($car->image)
                                <img src="{{ asset('img/cars/' . $car->image) }}" alt="Image" width="80" height="70">
                                <input type="hidden" name="old_image" value="{{ $car->image }}" required>
                            @endif
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
