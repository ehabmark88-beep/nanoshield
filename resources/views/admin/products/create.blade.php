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

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div id="wizard1" role="application" class="wizard clearfix">
                    <div class="steps clearfix">
                        <ul role="tablist"></ul>
                    </div>
                    <div class="content clearfix">
                        <h3 id="wizard1-h-0" tabindex="-1" class="title current">إضافة منتج</h3>
                        <br>
                        <form action="{{ route('admin.dashboard.products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <section id="wizard1-p-0" role="tabpanel" aria-labelledby="wizard1-h-0" class="body current" aria-hidden="false">
                                <div class="control-group form-group">
                                    <label class="form-label">اسم المنتج</label>
                                    <input type="text" class="form-control required" name="name_ar" placeholder="اسم المنتج" value="{{ old('name_ar') }}" required>
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">اسم المنتج (انجليزي)</label>
                                    <input type="text" class="form-control required" name="name" placeholder="اسم المنتج" value="{{ old('name') }}" required>
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">وصف المنتج</label>
                                    <input type="text" class="form-control required" name="description_ar" placeholder="وصف المنتج" value="{{ old('description_ar') }}" required>
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">وصف المنتج (انجليزي)</label>
                                    <input type="text" class="form-control required" name="description" placeholder="وصف المنتج" value="{{ old('description') }}" required>
                                </div>

                                <div class="control-group form-group">
                                    <label class="form-label">السعر</label>
                                    <input type="number" step="0.01" class="form-control required" name="price" placeholder="سعر المنتج" value="{{ old('price') }}" required>
                                </div>
{{--                                <div class="control-group form-group">--}}
{{--                                    <label class="form-label">فئة المنتج</label>--}}
{{--                                    <select class="form-control" name="category_id">--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <option  value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div class="control-group form-group">
                                    <label class="form-label">نسبة الخصم</label>
                                    <input type="number" class="form-control" name="discount" placeholder="نسبة الخصم" value="{{ old('discount') }}" required>
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">الصورة</label>
                                    <input type="file" class="dropify" data-height="200" name="image" required>
                                </div>
                            </section>
                            <div class="actions clearfix">
                                <li class="disabled" aria-disabled="true">
                                    <input type="submit" value="إضافة المنتج" class="btn btn-success btn-block" name="contact-form-submit" id="contact-form-submit">
                                </li>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')

@endsection
