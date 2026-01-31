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
                        <h3 id="wizard1-h-0" tabindex="-1" class="title current">اضافة صورة لمعرض الصور</h3>
                        <br>
                        <form action="{{ route('admin.dashboard.galleries.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <section id="wizard1-p-0" role="tabpanel" aria-labelledby="wizard1-h-0" class="body current" aria-hidden="false">

                                <!-- الحقل الخاص بالتفاصيل -->
                                <div class="control-group form-group">
                                    <label class="form-label">التفاصيل</label>
                                    <textarea class="form-control required" name="details" placeholder="التفاصيل">{{ old('details') }}</textarea>
                                </div>

                                <!-- الحقل الخاص بالصورة -->
                                <div class="control-group form-group">
                                    <label class="form-label">الصورة</label>
                                    <input type="file" class="dropify" data-height="200" name="image">
                                </div>

                            </section>
                            <div class="actions clearfix">
                                <li class="disabled" aria-disabled="true">
                                    <input type="submit" value="ارسال" class="btn btn-success btn-block" name="contact-form-submit" id="contact-form-submit">
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
