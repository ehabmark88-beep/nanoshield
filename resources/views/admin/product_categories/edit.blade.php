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
                    <div class="steps clearfix"><ul role="tablist"></ul></div>
                    <div class="content clearfix">
                        <h3 id="wizard1-h-0" tabindex="-1" class="title current">تعديل الفئة</h3>
                        <br>
                        <form action="{{ route('admin.dashboard.product_category.update', $category->id ) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <section id="wizard1-p-0" role="tabpanel" aria-labelledby="wizard1-h-0" class="body current" aria-hidden="false">
                                <div class="control-group form-group">
                                    <label class="form-label">الاسم</label>
                                    <input type="text" class="form-control required" name="name" placeholder="الاسم"  value="{{ $category->name }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">الوصف</label>
                                    <textarea class="form-control required" name="description" placeholder="الوصف">{{ $category->description }}</textarea>
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">الصورة</label>
                                    <input type="file" class="dropify" data-height="200" name="image">
                                    <input type="hidden" name="old_image" value="{{ $category->image }}">
                                </div>
                            </section>
                            <div class="actions clearfix">
                                <li class="disabled" aria-disabled="true">
                                    <input type="submit" class="btn btn-success btn-block" value="تحديث" name="contact-form-submit" id="contact-form-submit">
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
