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
                        <h3 id="wizard1-h-0" tabindex="-1" class="title current">تعديل صورة المعرض</h3>
                        <br>
                        <form action="{{ route('admin.dashboard.galleries.update', $gallery->id ) }}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <section id="wizard1-p-0" role="tabpanel" aria-labelledby="wizard1-h-0" class="body current" aria-hidden="false">

                                <!-- الحقل الخاص بالصورة -->
                                <div class="control-group form-group">
                                    <label class="form-label">الصورة</label>
                                    <input type="file" class="dropify" data-height="200" name="image">
                                    <input type="hidden" name="old_image" value="{{ $gallery->image }}">
                                    <!-- عرض الصورة القديمة -->
                                    @if($gallery->image)
                                        <img src="{{ asset('img/gallery/' . $gallery->image) }}" alt="Current Image" width="100">
                                    @endif
                                </div>
                            </section>
                            <div class="actions clearfix">
                                <li class="disabled" aria-disabled="true">
                                    <input type="submit" class="btn btn-success btn-block" value="ارسال" name="contact-form-submit" id="contact-form-submit">
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
