@extends('admin.layouts.master')

@section('css')
    <!-- إضافة أي CSS مخصص إذا لزم الأمر -->
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">إضافة إعدادات السيو</h4>
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
                        <h3 id="wizard1-h-0" tabindex="-1" class="title current">إضافة إعدادات السيو</h3>
                        <br>
                        <form action="{{ route('admin.dashboard.seo-settings.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <section id="wizard1-p-0" role="tabpanel" aria-labelledby="wizard1-h-0" class="body current" aria-hidden="false">
                                <!-- حقل اسم الصفحة -->
                                <div class="control-group form-group">
                                    <label class="form-label">اسم الصفحة (Page Name)</label>
                                    <input type="text" class="form-control required" name="page_name" placeholder="أدخل اسم الصفحة" value="{{ old('page_name') }}">
                                </div>

                                <!-- حقل عنوان السيو -->
                                <div class="control-group form-group">
                                    <label class="form-label">عنوان السيو (Title) عربي</label>
                                    <input type="text" class="form-control required" name="title" placeholder="أدخل عنوان السيو" value="{{ old('title') }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">عنوان السيو (Title) انجليزي</label>
                                    <input type="text" class="form-control required" name="title_en" placeholder="أدخل عنوان السيو" value="{{ old('title_en') }}">
                                </div>
                                <!-- حقل الوصف -->
                                <div class="control-group form-group">
                                    <label class="form-label">الوصف (Meta Description) عربي</label>
                                    <input type="text" class="form-control required" name="meta_description" placeholder="أدخل وصف السيو" value="{{ old('meta_description') }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label"> الوصف (Meta Description) انجليزي</label>
                                    <input type="text" class="form-control required" name="meta_description_en" placeholder="أدخل وصف السيو" value="{{ old('meta_description_en') }}">
                                </div>
                                <!-- حقل الكلمات المفتاحية -->
                                <div class="control-group form-group">
                                    <label class="form-label">الكلمات المفتاحية (Meta Keywords) عربي</label>
                                    <input type="text" class="form-control required" name="meta_keywords" placeholder="أدخل الكلمات المفتاحية" value="{{ old('meta_keywords') }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">الكلمات المفتاحية (Meta Keywords) انجليزي</label>
                                    <input type="text" class="form-control required" name="meta_keywords_en" placeholder="أدخل الكلمات المفتاحية" value="{{ old('meta_keywords_en') }}">
                                </div>
                            </section>
                            <div class="actions clearfix">
                                <li class="disabled" aria-disabled="true">
                                    <input type="submit" value="التقديم" class="btn btn-success btn-block" name="contact-form-submit" id="contact-form-submit">
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
    <!-- إضافة أي سكربتات إذا لزم الأمر -->
@endsection
