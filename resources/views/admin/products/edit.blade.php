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
                <div id="wizard1" role="application" class="wizard clearfix"><div class="steps clearfix"><ul role="tablist"></ul></div>
                    <div class="content clearfix">
                        <h3 id="wizard1-h-0" tabindex="-1" class="title current">تعديل المنتج</h3>
                        <br>
                        <form action="{{ route('admin.dashboard.products.update', $product->id ) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <section id="wizard1-p-0" role="tabpanel" aria-labelledby="wizard1-h-0" class="body current" aria-hidden="false">
                                <div class="control-group form-group">
                                    <label class="form-label">اسم المنتج</label>
                                    <input type="text" class="form-control required" name="name_ar" placeholder="اسم المنتج" value="{{ $product->name_ar }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">اسم المنتج (انجليزي)</label>
                                    <input type="text" class="form-control required" name="name" placeholder="اسم المنتج" value="{{ $product->name }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">وصف المنتج</label>
                                    <input type="text" class="form-control required" name="description_ar" placeholder="وصف المنتج" value="{{ $product->description_ar }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">وصف المنتج (انجليزي)</label>
                                    <input type="text" class="form-control required" name="description" placeholder="وصف المنتج" value="{{ $product->description }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">سعر المنتج</label>
                                    <input type="number" step="0.01" class="form-control required" name="price" placeholder="سعر المنتج" value="{{ $product->price }}">
                                </div>
{{--                                <div class="control-group form-group">--}}
{{--                                    <label class="form-label">فئة المنتج</label>--}}
{{--                                    <select class="form-control" name="category_id">--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div class="control-group form-group">
                                    <label class="form-label">الخصم</label>
                                    <input type="number" class="form-control" name="discount" placeholder="نسبة الخصم" value="{{ $product->discount }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">الصورة</label>
                                    <input type="file" class="dropify" data-height="200" name="image">
                                    <input type="hidden" name="old_image" value="{{ $product->image }}">
                                </div>
                            </section>
                            <div class="actions clearfix">
                                <li class="disabled" aria-disabled="true">
                                    <input type="submit" class="btn btn-success btn-block" value="تعديل المنتج" name="contact-form-submit" id="contact-form-submit">
                                </li>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
