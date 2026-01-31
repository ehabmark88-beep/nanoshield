@extends('admin.layouts.master')

@section('css')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <h4 class="card-title mg-b-0">تعديل إعدادات الموقع</h4>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">

                <form action="{{ route('admin.dashboard.website-settings.update', 1) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="card-body">

                        {{-- الألوان --}}
                        <h5 class="mb-3">ألوان الموقع</h5>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>اللون الأساسي</label>
                                <input type="color" class="form-control"
                                       name="primary_color"
                                       value="{{ $setting->primary_color ?? '#000000' }}">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>اللون الثانوي</label>
                                <input type="color" class="form-control"
                                       name="secondary_color"
                                       value="{{ $setting->secondary_color ?? '#000000' }}">
                            </div>

                            <div class="col-md-4 form-group">
                                <label>اللون الثالث</label>
                                <input type="color" class="form-control"
                                       name="third_color"
                                       value="{{ $setting->third_color ?? '#000000' }}">
                            </div>
                        </div>

                        <hr>

                        {{-- روابط السوشيال ميديا --}}
                        <h5 class="mb-3">روابط التواصل الاجتماعي</h5>

                        <div class="form-group">
                            <label>فيسبوك</label>
                            <input type="url" class="form-control"
                                   name="facebook_url"
                                   value="{{ $setting->facebook_url }}">
                        </div>

                        <div class="form-group">
                            <label>إنستجرام</label>
                            <input type="url" class="form-control"
                                   name="instagram_url"
                                   value="{{ $setting->instagram_url }}">
                        </div>

                        <div class="form-group">
                            <label>سناب شات</label>
                            <input type="url" class="form-control"
                                   name="snapchat_url"
                                   value="{{ $setting->snapchat_url }}">
                        </div>

                        <div class="form-group">
                            <label>تيك توك</label>
                            <input type="url" class="form-control"
                                   name="tiktok_url"
                                   value="{{ $setting->tiktok_url }}">
                        </div>

                        <div class="form-group">
                            <label>يوتيوب</label>
                            <input type="url" class="form-control"
                                   name="youtube_url"
                                   value="{{ $setting->youtube_url }}">
                        </div>

                        <div class="form-group">
                            <label>منصة X</label>
                            <input type="url" class="form-control"
                                   name="x_platform_url"
                                   value="{{ $setting->x_platform_url }}">
                        </div>

                        <hr>

                        {{-- نقاط الولاء --}}
                        <h5 class="mb-3">نقاط الولاء</h5>

                        <div class="form-group">
                            <label>عدد أيام صلاحية نقاط الولاء</label>
                            <input type="number" class="form-control"
                                   name="loyalty_points_days"
                                   value="{{ $setting->loyalty_points_days }}"
                                   min="0">
                        </div>
<div class="form-group">
    <label>قيمة نقاط الولاء (نقاط لكل 1000 ريال)</label>
    <input type="number"
           class="form-control"
           name="loyalty_points_conversion"
           value="{{ $setting->loyalty_points_conversion ?? 0 }}"
           min="0"
           step="1">
    <small class="text-muted">
        مثال: 100 = يحصل العميل على 100 نقطة مقابل كل 1000 ريال
    </small>
</div>



                        <hr>

                        {{-- 🔥 إعدادات العرض --}}
                        <h5 class="mb-3">إعدادات العرض</h5>

                        <div class="form-group">
                            <label>عنوان العرض (عربي)</label>
                            <input type="text" class="form-control"
                                   name="offer_title"
                                   value="{{ $setting->offer_title }}">
                        </div>

                        <div class="form-group">
                            <label>اسم العرض (إنجليزي)</label>
                            <input type="text" class="form-control"
                                   name="offer_title_en"
                                   value="{{ $setting->offer_title_en }}">
                        </div>

                        <div class="form-group">
                            <label>كود العرض</label>
                            <input type="text" class="form-control"
                                   name="offer_code"
                                   value="{{ $setting->offer_code }}">
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-primary">
                            حفظ التعديلات
                        </button>

                        <a href="{{ route('admin.website.settings') }}"
                           class="btn btn-secondary">
                            رجوع
                        </a>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
