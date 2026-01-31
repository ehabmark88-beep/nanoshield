@php use Illuminate\Support\Facades\App; @endphp
@extends('layouts.pages.master')

@section('title')
    @if (app()->getLocale() === 'en')
        {{ $seoSettings->first()->title_en ?? 'Nano Shield' }}
    @else
        {{ $seoSettings->first()->title ?? 'نانو شيلد' }}
    @endif
@endsection

@section('description')
    @if (app()->getLocale() === 'en')
        {{ $seoSettings->first()->meta_description_en ?? 'Nano Shield' }}
    @else
        {{ $seoSettings->first()->meta_description ?? 'نانو شيلد' }}
    @endif
@endsection

@section('keywords')
    @if (app()->getLocale() === 'en')
        {{ $seoSettings->first()->meta_keywords_en ?? 'Nano Shield' }}
    @else
        {{ $seoSettings->first()->meta_keywords ?? 'نانو شيلد' }}
    @endif
@endsection

@section('css')
<style>

    .sidebar ul li a.active-link {
        background-color: #f0f0f0; /* لون الخلفية النشط */
        font-weight: bold; /* لجعل النص بارزًا */
        color: #000; /* لون النص */
        border-radius: 5px; /* لجعل التصميم أجمل */
    }

    /* حاوية الصفحة */
    .container {
        display: flex;
        flex-wrap: wrap;
        min-height: 100vh;
        width: 100% !important;

    }


    /* تصميم الـ Sidebar */
    .sidebar {
        width: 250px;
        background-color: #e47823;
        padding: 30px;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1); /* إضافة ظل على اليسار */
        position: relative; /* لحفظ مكان الـ sidebar */
        direction: rtl;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar ul li {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: white;
        font-size: 18px;
        display: block;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        transition: background 0.3s ease;
        display: flex;
        align-items: center;
    }

    .sidebar ul li a:hover {
        background-color: #d1691a;
    }

    .sidebar ul li a i {
        margin-left: 10px; /* مسافة بين النص والأيقونة */
    }

    /* تصميم المحتوى */
    .content {
        flex-grow: 1;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        margin: 10px;
        width: calc(100% - 270px); /* تعديل عرض المحتوى */
        order: 1; /* جعل المحتوى يظهر قبل الـ sidebar */
    }

    .content h1 {
        color: #e47823;
    }

    .content p {
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }
    p {
        font-size: 20px !important;
        color: black !important;
        direction: rtl;
    }
    h1 {
        font-size: 35px;
        color: #e47823 !important;
        text-align: right;
    }

    /* إخفاء الأقسام في البداية */
    .category-details {
        display: none;
    }

    /* إظهار القسم المختار */
    .category-details.active {
        display: block;
    }
        body > div.container > div.sidebar > ul > li:nth-child(1) > a{
            margin-right: 50px;
        }


    a{
        font-weight: bolder;
    }

    .template-header.template-header-background.template-header {
        max-height: 500px !important;
    }
    .background-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        max-height: 500px !important;
    }


    @media screen and (max-width: 768px) {
        .features {
    display: block !important;

}

        .container {
            display: flex;
        }

        .sidebar {
            width: 30% !important; /* يشغل الشريط الجانبي 30% من العرض */
            padding: 10px;
            text-align: center;
            box-shadow: none; /* إزالة الظل لتبسيط التصميم */
        }

        .content {
            width: 60% !important; /* يشغل المحتوى 70% من العرض */
            padding: 10px;
        }

        /* إعدادات إضافية لتحسين المحاذاة */
        .sidebar ul li a {
            font-size: 14px;
        }

        .content h1 {
            font-size: 18px;
        }

        p {
            font-size: 14px !important;
            text-align: justify;
        }
    }

</style>
<style>
    .header {
        background-color: #000;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }
    .header img {
        max-width: 150px;
    }
    .nav {
        background-color: #000;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }
    .nav a {
        color: #fff;
        margin: 0 15px;
        text-decoration: none;
    }
    .sub-nav {
        background-color: #f5f5f5;
        color: #000;
        padding: 10px 0;
        text-align: center;
    }
    .sub-nav a {
        color: #000;
        margin: 0 15px;
        text-decoration: none;
    }
    .content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    con{
        width: 100%;
    }
    .content h1 {
        text-align: center;
        color: #333;
    }
    .content p {
        text-align: center;
        color: #666;
        line-height: 1.6;
    }
    .features {
        /*display: flex;*/
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 20px;
    }
    .feature {
        flex: 1 1 30%;
        text-align: center;
        padding: 20px;
        margin: 10px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
    }
    .feature i {
        font-size: 40px;
        color: #f90;
        margin-bottom: 10px;
    }
    .feature h3 {
        color: #333;
        margin-bottom: 10px;
    }
    .feature p {
        color: #666;
    }
    .footer {
        background-color: #000;
        color: #fff;
        padding: 20px 0;
        text-align: center;
    }
    .footer a {
        color: #f90;
        text-decoration: none;
    }
    .footer .contact-info {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        margin-top: 20px;
    }
    .footer .contact-info div {
        flex: 1 1 30%;
        text-align: center;
        margin: 10px;
    }
    .footer .contact-info i {
        font-size: 20px;
        margin-bottom: 10px;
    }
    .footer .contact-info p {
        margin: 0;
    }
    .footer .social-icons {
        margin-top: 20px;
    }
    .footer .social-icons a {
        color: #fff;
        margin: 0 10px;
        text-decoration: none;
        font-size: 20px;
    }

    .category {
        margin-bottom: 20px;
        padding: 10px 15px;
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .category div {
        font-size: 20px;
        margin-bottom: 10px;
        color: #555;
        border-bottom: 2px solid #ccc;
        padding-bottom: 5px;
    }

    .category ul {
        list-style-type: none;
        padding: 0;
    }

    .category ul li {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
        color: #666;
    }

    .category ul li:last-child {
        border-bottom: none;
    }

    body > div.template-header > div.template-header-top > div.template-header-top-menu.template-main > nav:nth-child(1) > div > ul > li:nth-child(8) > ul > li:nth-child(3) > a {
        font-size: 14px !important;
    }
</style>
@endsection

@section('content')
    @php
        $direction = (App::getLocale() == 'en') ? 'ltr' : 'rtl';
    @endphp
    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/products.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white !important;font-size: 40px !important;">{{ __('messages.car_services1') }}</h1>
            </div>
            <div>
            </div>
        </div>
    </div><br>
    <div class="container"
         @if(App::getLocale() == 'en')
             style="direction: ltr;"
         @else
             style="direction: rtl;"
        @endif>
        <div class="sidebar">
            <div style="display: flex; justify-content: center; background-color: white !important; border-radius: 5px;">
                <h2 style="color: black !important;">{{ __('messages.services2') }}</h2>
            </div>
            <ul>
                <hr style="width: 70%;">
                <br>
                <li style="text-align: center;">
                    <a href="#tech" onclick="showCategory(event, 'tech')" style="display: inline-block; width: 100%;">{{ __('messages.thermal_insulation1') }}</a>
                </li>
                <hr style="width: 100%;">
                <li><a href="#health" onclick="showCategory(event, 'health')">{{ __('messages.paint_protection_films1') }}</a></li>
                <hr style="width: 100%;">
                <li><a href="#sports" onclick="showCategory(event, 'sports')">{{ __('messages.exterior_nano_ceramic1') }}</a></li>
                <hr style="width: 100%;">
                <li><a href="#education" onclick="showCategory(event, 'education')">{{ __('messages.interior_nano_ceramic1') }}</a></li>
                <hr style="width: 100%;">
                <li><a href="#business" onclick="showCategory(event, 'business')">{{ __('messages.polishing_and_paint_treatment1') }}</a></li>
                <hr style="width: 100%;">
                <li><a href="#lifestyle" onclick="showCategory(event, 'lifestyle')">{{ __('messages.roof_glass_protection1') }}</a></li>
                <hr style="width: 100%;">
                <li><a href="#entertainment" onclick="showCategory(event, 'entertainment')">{{ __('messages.windshield_protection1') }}</a></li>
                <hr style="width: 100%;">
                <li><a href="#travel" onclick="showCategory(event, 'travel')">{{ __('messages.floor_protection1') }}</a></li>
                <hr style="width: 100%;">
                <li><a href="#science" onclick="showCategory(event, 'science')">{{ __('messages.upholstery_service1') }}</a></li>
                <hr style="width: 100%;">
                <li style="text-align: center;">
                    <a href="#food" onclick="showCategory(event, 'food')" style="display: inline-block; width: 100%;"> {{ __('messages.anti_rust_bottom_insulation1') }}</a>
                </li>
                <hr style="width: 100%;">
            </ul>
        </div>
        <!-- Content -->
        <div class="content">
            <div id="tech" class="category-details">
                <div class="con">
                    <h1>
                        {{ __('messages.title') }}
                    </h1>
                    <p>
                        {{ __('messages.subtitle') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.description1') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.description2') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.description3') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.description4') }}
                    </p>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <h3>{{ __('messages.nano_technology') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.nano_technology_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <h3>{{ __('messages.privacy') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.privacy_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-thermometer-half"></i>
                            <h3>{{ __('messages.heat_reduction') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.heat_reduction_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-sun"></i>
                            <h3>{{ __('messages.uv_protection') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.uv_protection_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-eye"></i>
                            <h3>{{ __('messages.glare_reduction') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.glare_reduction_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shield-virus"></i>
                            <h3>{{ __('messages.safety1') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.safety_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-paint-brush"></i>
                            <h3>{{ __('messages.appearance') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.appearance_desc') }}</p>
                        </div>
                    </div>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.additional_features1') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.additional_features2') }}
                    </p>
                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('booking') }}" title="{{ __('messages.book_now') }}">
                        {{ __('messages.book_now') }}
                    </a>
                </div>
            </div>
            <div id="health" class="category-details">
                <div class="con">
                    <h1>
                        {{ __('messages.paint_protection_title') }}
                    </h1>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.paint_protection_subtitle') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.paint_protection_description1') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.paint_protection_description2') }}
                    </p>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <h3>{{ __('messages.paint_protection_scratch_resistance') }}</h3>
                            <p  style="direction: {{ $direction }};">{{ __('messages.paint_protection_scratch_resistance_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-leaf"></i>
                            <h3>{{ __('messages.paint_protection_environment_resistance') }}</h3>
                            <p  style="direction: {{ $direction }};">{{ __('messages.paint_protection_environment_resistance_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-sun"></i>
                            <h3>{{ __('messages.paint_protection_color_fade_resistance') }}</h3>
                            <p  style="direction: {{ $direction }};">{{ __('messages.paint_protection_color_fade_resistance_desc') }}</p>
                        </div>
                    </div>
                    <br>
                    <h1>{{ __('messages.paint_protection_protected_parts_title') }}</h1><br>
                    <div class="category">
                        <h2>{{ __('messages.paint_protection_front_quarter') }}</h2>
                        <div style="display: flex; justify-content: center">
                            <img src="{{ URL::asset('assets/img/حماية-ربع-السيارة.png') }}" width="200">
                        </div>

                        <h2>{{ __('messages.paint_protection_half_car') }}</h2>
                        <div style="display: flex; justify-content: center">
                            <img src="{{ URL::asset('assets/img/حماية-نصف-السيارة.png') }}" width="200">
                        </div>

                        <h2>{{ __('messages.paint_protection_full_car') }}</h2>
                        <div style="display: flex; justify-content: center">
                            <img src="{{ URL::asset('assets/img/حماية-كامل-السيارة.png') }}" width="200">
                        </div>

                        <h2>{{ __('messages.paint_protection_full_car_matte') }}</h2>
                        <div style="display: flex; justify-content: center">
                            <img src="{{ URL::asset('assets/img/تغليف-كامل-مطفي.png') }}" width="200">
                        </div>

                        <h2>{{ __('messages.paint_protection_full_car_black') }}</h2>
                        <div style="display: flex; justify-content: center">
                            <img src="{{ URL::asset('assets/img/تغليف-كامل-اسود.png') }}" width="200">
                        </div>

                        <h2>{{ __('messages.paint_protection_black_edition') }}</h2>
                        <div style="display: flex; justify-content: center">
                            <img src="{{ URL::asset('assets/img/حماية-اجزاء-من-السيارة.png') }}" width="200">
                        </div>
                    </div>
                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('booking') }}" title="{{ __('messages.paint_protection_book_now') }}">
                        {{ __('messages.book_now') }}
                    </a>
                </div>
            </div>
            <div id="sports" class="category-details">
                <div class="con">
                    <h1>
                        {{ __('messages.nano_ceramic_title') }}
                    </h1>
                    <p  style="direction: {{ $direction }};">
                        {{ __('messages.nano_ceramic_subtitle') }}
                    </p>
                    <p  style="direction: {{ $direction }};">
                        {{ __('messages.nano_ceramic_description') }}
                    </p>

                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <h3>{{ __('messages.nano_ceramic_feature1_title') }}</h3>
                            <p  style="direction: {{ $direction }};">{{ __('messages.nano_ceramic_feature1_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <h3>{{ __('messages.nano_ceramic_feature2_title') }}</h3>
                            <p  style="direction: {{ $direction }};">{{ __('messages.nano_ceramic_feature2_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-thermometer-half"></i>
                            <h3>{{ __('messages.nano_ceramic_feature3_title') }}</h3>
                            <p  style="direction: {{ $direction }};">{{ __('messages.nano_ceramic_feature3_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-sun"></i>
                            <h3>{{ __('messages.nano_ceramic_feature4_title') }}</h3>
                            <p  style="direction: {{ $direction }};">{{ __('messages.nano_ceramic_feature4_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-eye"></i>
                            <h3>{{ __('messages.nano_ceramic_feature5_title') }}</h3>
                            <p  style="direction: {{ $direction }};">{{ __('messages.nano_ceramic_feature5_desc') }}</p>
                        </div>
                    </div>

                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('booking') }}" title="{{ __('messages.nano_ceramic_book_now') }}">
                        {{ __('messages.nano_ceramic_book_now') }}
                    </a>
                </div>
            </div>
            <div id="education" class="category-details">
                <div class="con">
                    <h1>
                        {{ __('messages.nano_ceramic_interior_title') }}
                    </h1>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.nano_ceramic_interior_subtitle') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.nano_ceramic_interior_description') }}
                    </p>

                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <h3>{{ __('messages.nano_ceramic_interior_feature1_title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.nano_ceramic_interior_feature1_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <h3>{{ __('messages.nano_ceramic_interior_feature2_title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.nano_ceramic_interior_feature2_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-thermometer-half"></i>
                            <h3>{{ __('messages.nano_ceramic_interior_feature3_title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.nano_ceramic_interior_feature3_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-sun"></i>
                            <h3>{{ __('messages.nano_ceramic_interior_feature4_title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.nano_ceramic_interior_feature4_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-eye"></i>
                            <h3>{{ __('messages.nano_ceramic_interior_feature5_title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.nano_ceramic_interior_feature5_desc') }}</p>
                        </div>
                    </div>

                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('booking') }}" title="{{ __('messages.nano_ceramic_interior_book_now') }}">
                        {{ __('messages.nano_ceramic_interior_book_now') }}
                    </a>
                </div>
            </div>
            <div id="business" class="category-details">
                <div class="con">
                    <h1>
                        {{ __('messages.polish_and_treatment_title') }}
                    </h1>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.polish_and_treatment_subtitle') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.polish_and_treatment_description') }}
                    </p>

                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <p style="direction: {{ $direction }};">{{ __('messages.polish_and_treatment_feature1') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <p style="direction: {{ $direction }};">{{ __('messages.polish_and_treatment_feature2') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-thermometer-half"></i>
                            <p style="direction: {{ $direction }};">{{ __('messages.polish_and_treatment_feature3') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-sun"></i>
                            <p style="direction: {{ $direction }};">{{ __('messages.polish_and_treatment_feature4') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-eye"></i>
                            <p style="direction: {{ $direction }};">{{ __('messages.polish_and_treatment_feature5') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-eye"></i>
                            <p style="direction: {{ $direction }};">{{ __('messages.polish_and_treatment_feature6') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-eye"></i>
                            <p style="direction: {{ $direction }};">{{ __('messages.polish_and_treatment_feature7') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-eye"></i>
                            <p style="direction: {{ $direction }};">{{ __('messages.polish_and_treatment_feature8') }}</p>
                        </div>
                    </div>

                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('booking') }}" title="{{ __('messages.polish_and_treatment_book_now') }}">
                        {{ __('messages.polish_and_treatment_book_now') }}
                    </a>
                </div>
            </div>
            <div id="lifestyle" class="category-details">
                <div class="con">
                    <h1>
                        {{ __('messages.glass_roof_protection_title') }}
                    </h1>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.glass_roof_protection_subtitle') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.glass_roof_protection_description') }}
                    </p>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <h3>{{ __('messages.glass_roof_feature1') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.glass_roof_feature1_description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <h3>{{ __('messages.glass_roof_feature2') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.glass_roof_feature2_description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <h3>{{ __('messages.glass_roof_feature3') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.glass_roof_feature3_description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <h3>{{ __('messages.glass_roof_feature4') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.glass_roof_feature4_description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <h3>{{ __('messages.glass_roof_feature5') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.glass_roof_feature5_description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-car"></i>
                            <h3>{{ __('messages.glass_roof_feature6') }}</h3>
                            <p>{{ __('messages.glass_roof_feature6_description') }}</p>
                        </div>
                    </div>
                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('booking') }}" title="{{ __('messages.glass_roof_book_now') }}">
                        {{ __('messages.glass_roof_book_now') }}
                    </a>
                </div>
            </div>
            <div id="entertainment" class="category-details">
                <div class="con">
                    <h1>
                        {{ __('messages.front_glass_protection_title') }}
                    </h1>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.front_glass_protection_subtitle') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.front_glass_protection_description') }}
                    </p>
                    <div class="features">
                        <div class="feature">
                            <p style="direction: {{ $direction }};">{{ __('messages.front_glass_protection_feature1_description') }}</p>
                        </div>
                        <div class="feature">
                            <p style="direction: {{ $direction }};">{{ __('messages.front_glass_protection_feature2') }}</p>
                        </div>
                    </div>
                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('booking') }}" title="{{ __('messages.front_glass_protection_book_now') }}">
                        {{ __('messages.front_glass_protection_book_now') }}
                    </a>
                </div>
            </div>
            <div id="travel" class="category-details">
                <div class="con">
                    <h1>
                        {{ __('messages.floor_protection_title') }}
                    </h1>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.floor_protection_subtitle') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.floor_protection_description') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.floor_plastic_description') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.floor_leather_description') }}
                    </p>
                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('booking') }}" title="{{ __('messages.floor_protection_book_now') }}">
                        {{ __('messages.floor_protection_book_now') }}
                    </a>
                </div>
            </div>
            <div id="science" class="category-details">
                <div class="con">
                    <h1>
                        {{ __('messages.upholstery_title') }}
                    </h1>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.upholstery_subtitle') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.upholstery_description') }}
                    </p>
                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('booking') }}" title="{{ __('messages.upholstery_book_now') }}">
                        {{ __('messages.upholstery_book_now') }}
                    </a>
                </div>
            </div>
            <div id="food" class="category-details">
                <div class="con">
                    <h1>
                        {{ __('messages.underbody_rust_protection_title') }}
                    </h1>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.underbody_rust_protection_subtitle') }}
                    </p>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.underbody_rust_protection_description') }}
                    </p>
                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('booking') }}" title="{{ __('messages.upholstery_book_now') }}">
                        {{ __('messages.upholstery_book_now') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // JavaScript لإظهار التصنيف المطلوب وإخفاء الباقي
        function showCategory(event, category) {
            if (event) {
                event.preventDefault();
            }

            // إخفاء كل التفاصيل
            var allCategories = document.querySelectorAll('.category-details');
            allCategories.forEach(function(cat) {
                cat.classList.remove('active');
            });

            // إزالة الحالة النشطة من كل الروابط
            var allLinks = document.querySelectorAll('.sidebar ul li a');
            allLinks.forEach(function(link) {
                link.classList.remove('active-link');
            });

            // إظهار التصنيف المختار
            var selectedCategory = document.getElementById(category);
            selectedCategory.classList.add('active');

            // إضافة الحالة النشطة للرابط المناسب
            var activeLink = document.querySelector(`.sidebar ul li a[href="#${category}"]`);
            if (activeLink) {
                activeLink.classList.add('active-link');
            }
        }

        // إظهار أول تصنيف عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            showCategory(null, 'tech');
        });
    </script>
@endsection
