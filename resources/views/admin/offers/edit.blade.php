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
                <h4 class="card-title mg-b-0">تعديل العرض</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dashboard.offers.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">اسم العرض</label>
                        <input type="text" name="name_ar" value="{{ $offer->name }}" class="form-control" required>
                    </div>
                    <!-- اسم العرض -->
                    <div class="form-group">
                        <label for="name">اسم العرض (بالانجليزي)</label>
                        <input type="text" name="name" class="form-control" value="{{ $offer->name }}" required>
                    </div>

                    <!-- التفاصيل -->
                    <div class="form-group">
                        <label for="details">السعر</label>
                        <textarea name="details_ar" class="form-control" rows="3" required>{{ $offer->details_ar }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="details">السعر (بالانجليزي)</label>
                        <textarea name="details" class="form-control" rows="3" required>{{ $offer->details }}</textarea>
                    </div>

                    <!-- الصورة -->
                    <div class="form-group">
                        <label for="image">الصورة</label>
                        <input type="file" name="image" class="form-control">
                        <input type="hidden" name="old_image" value="{{ $offer->image }}">
                        <br>
                        <img src="{{ asset('img/offers/' . $offer->image) }}" width="100" height="100">
                    </div>


                    <!-- المزايا -->
                    <div class="form-group">
                        <label for="feature1">ميزة 1</label>
                        <input type="text" name="feature1_ar" class="form-control"value="{{ $offer->feature1_ar }}">
                    </div>
                    <div class="form-group">
                        <label for="feature1"> ميزة1 (en) </label>
                        <input type="text" name="feature1" class="form-control" value="{{ $offer->feature1 }}">
                    </div>

                    <div class="form-group">
                        <label for="feature2"> ميزة 2</label>
                        <input type="text" name="feature2_ar" class="form-control" value="{{ $offer->feature2_ar }}">
                    </div>
                    <div class="form-group">
                        <label for="feature2">ميزة2 (en)</label>
                        <input type="text" name="feature2" class="form-control" value="{{ $offer->feature2 }}">
                    </div>

                    <div class="form-group">
                        <label for="feature3">ميزة 3</label>
                        <input type="text" name="feature3_ar" class="form-control" value="{{ $offer->feature3_ar }}">
                    </div>
                    <div class="form-group">
                        <label for="feature3">ميزة 3 (en)</label>
                        <input type="text" name="feature3" class="form-control" value="{{ $offer->feature3 }}">
                    </div>

                    <div class="form-group">
                        <label for="feature4">ميزة 4</label>
                        <input type="text" name="feature4_ar" class="form-control" value="{{ $offer->feature4_ar }}">
                    </div>
                    <div class="form-group">
                        <label for="feature4">ميزة4 (en)</label>
                        <input type="text" name="feature4" class="form-control" value="{{ $offer->feature4 }}">
                    </div>

                    <div class="form-group">
                        <label for="feature5">ميزة 5</label>
                        <input type="text" name="feature5_ar" class="form-control" value="{{ $offer->feature5_ar }}">
                    </div>
                    <div class="form-group">
                        <label for="feature5">ميزة5 (en)</label>
                        <input type="text" name="feature5" class="form-control" value="{{ $offer->feature5 }}">
                    </div>

                    <button type="submit" class="btn btn-primary">تحديث</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
