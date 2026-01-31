@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <h4 class="page-title">Add New Package</h4>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.dashboard.packages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="price" class="form-label">الاسم</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">الاسم (en)</label>
                        <input type="text" class="form-control" id="name_en" name="name_en" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">السعر</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label for="discounted_price" class="form-label">Discounted Price</label>--}}
{{--                        <input type="text" class="form-control" id="discounted_price" name="discounted_price">--}}
{{--                    </div>--}}
                    <div class="mb-3">
                        <label for="hours" class="form-label">المدة الزمنية</label>
                        <input type="number" class="form-control" id="hours" name="hours" required>
                    </div>

                    <div class="form-group">
                        <label for="feature1">ميزة 1</label>
                        <input type="text" name="feature_1" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="feature1"> ميزة1 (en) </label>
                        <input type="text" name="feature_1_en" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="feature2"> ميزة 2</label>
                        <input type="text" name="feature_2" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="feature2">ميزة2 (en)</label>
                        <input type="text" name="feature_2_en" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="feature3">ميزة 3</label>
                        <input type="text" name="feature_3" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="feature3">ميزة 3 (en)</label>
                        <input type="text" name="feature_3_en" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="feature4">ميزة 4</label>
                        <input type="text" name="feature_4" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="feature4">ميزة4 (en)</label>
                        <input type="text" name="feature_4_en" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="feature5">ميزة 5</label>
                        <input type="text" name="feature_5" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="feature5">ميزة5 (en)</label>
                        <input type="text" name="feature_5_en" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="feature1">ميزة 6</label>
                        <input type="text" name="feature_6" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="feature1"> ميزة6 (en) </label>
                        <input type="text" name="feature_6_en" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="feature2"> ميزة 7</label>
                        <input type="text" name="feature_7" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="feature2">ميزة7 (en)</label>
                        <input type="text" name="feature_7_en" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="feature3">ميزة 8</label>
                        <input type="text" name="feature_8" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="feature3">ميزة 8 (en)</label>
                        <input type="text" name="feature_8_en" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="feature4">ميزة 9</label>
                        <input type="text" name="feature_9" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="feature4">ميزة4 (en)</label>
                        <input type="text" name="feature_9_en" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">القسم</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="car_id" class="form-label">حجم السيارة</label>
                        <select class="form-select" id="car_id" name="car_id" required>
                            @foreach($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->size_ar }}</option>
                            @endforeach
                        </select>
                    </div>
{{--                    <div class="mb-3">--}}
{{--                        <label for="image" class="form-label">Image</label>--}}
{{--                        <input type="file" class="form-control" id="image" name="image">--}}
{{--                    </div>--}}
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
