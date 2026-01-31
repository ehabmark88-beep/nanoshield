@extends('admin.layouts.master')

@section('css')
    <!-- إضافة أي CSS مخصص إذا لزم الأمر -->
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">إضافة/تعديل إعدادات السيو</h4>
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
                        <h3 id="wizard1-h-0" tabindex="-1" class="title current">
                            @isset($seoSetting) تعديل إعدادات السيو @else إضافة إعدادات السيو @endisset
                        </h3>
                        <br>
                        <!-- نموذج إضافة وتعديل السيو -->
                        <form action="{{ isset($seoSetting) ? route('admin.dashboard.seo-settings.update', $seoSetting->id) : route('admin.dashboard.seo-settings.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($seoSetting)
                                @method('PATCH')
                            @endisset

                            <section id="wizard1-p-0" role="tabpanel" aria-labelledby="wizard1-h-0" class="body current" aria-hidden="false">

                                <!-- حقل اسم الصفحة -->
                                <div class="control-group form-group">
                                    <label class="form-label">اسم الصفحة (Page Name)</label>
                                    <input type="text" class="form-control required" name="page_name" placeholder="أدخل اسم الصفحة" value="{{ old('page_name', $seoSetting->page_name ?? '') }}">
                                </div>

                                <div class="control-group form-group">
                                    <label class="form-label">عنوان السيو (Title)</label>
                                    <input type="text" class="form-control required" name="title" placeholder="أدخل عنوان السيو" value="{{ old('title', $seoSetting->title ?? '') }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label"> عنوان السيو (Title) انجليزي</label>
                                    <input type="text" class="form-control required" name="title_en" placeholder="أدخل عنوان السيو" value="{{ old('title', $seoSetting->title_en ?? '') }}">
                                </div>

                                <div class="control-group form-group">
                                    <label class="form-label">الوصف (Meta Description)</label>
                                    <input type="text" class="form-control required" name="meta_description" placeholder="أدخل وصف السيو" value="{{ old('meta_description', $seoSetting->meta_description ?? '') }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">الوصف (Meta Description) انجليزي</label>
                                    <input type="text" class="form-control required" name="meta_description_en" placeholder="أدخل وصف السيو" value="{{ old('meta_description_en', $seoSetting->meta_description ?? '') }}">
                                </div>

                                <div class="control-group form-group">
                                    <label class="form-label">الكلمات المفتاحية (Meta Keywords)</label>
                                    <input type="text" class="form-control required" name="meta_keywords" placeholder="أدخل الكلمات المفتاحية" value="{{ old('meta_keywords', $seoSetting->meta_keywords ?? '') }}">
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label">الكلمات المفتاحية (Meta Keywords)</label>
                                    <input type="text" class="form-control required" name="meta_keywords_en" placeholder="أدخل الكلمات المفتاحية" value="{{ old('meta_keywords', $seoSetting->meta_keywords_en ?? '') }}">
                                </div>

                            </section>

                            <div class="actions clearfix">
                                <li class="disabled" aria-disabled="true">
                                    <input type="submit" class="btn btn-success btn-block" value="التقديم" name="contact-form-submit" id="contact-form-submit">
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
