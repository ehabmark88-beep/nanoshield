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

        body > div.template-header > div.container > div.sidebar > ul > li:nth-child(7) > a {
            direction: ltr;
            margin-left: 40px;
        }
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

        li{
            direction: rtl !important;
            text-align: right!important;
        }
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
            display: flex;
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
        $textAlign = (App::getLocale() == 'en') ? 'left' : 'right';
    @endphp
    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/contracting.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white !important; font-size: 40px !important;">
                    {{ __('messages.contracting_services_title') }}
                </h1>
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
        @endif >
        <div class="sidebar">
            <div style="display: flex; justify-content: center; background-color: white !important; border-radius: 5px;">
                <h2 style="color: black !important;">
                    {{ __('messages.services_subtitle') }}
                </h2>
            </div>
            <ul>
                <hr style="width: 70%;">
                <br>
                <li style="text-align: center;">
                    <a href="#tech" onclick="showCategory(event, 'tech')" style="display: inline-block; width: 100%;">{{ __('messages.service_thermal_insulation') }}</a>
                </li>
                <hr style="width: 100%;">
                <li><a href="#health" onclick="showCategory(event, 'health')">{{ __('messages.service_surface_protection') }}</a></li>
                <hr style="width: 100%;">
                <li><a href="#sports" onclick="showCategory(event, 'sports')">{{ __('messages.service_smart_film') }}</a></li>
                <hr style="width: 100%;">
                <li><a href="#education" onclick="showCategory(event, 'education')">{{ __('messages.service_skylight') }}</a></li>
                <hr style="width: 100%;">
                <li><a href="#business" onclick="showCategory(event, 'business')">{{ __('messages.service_frosted_films') }}</a></li>
                <hr style="width: 100%;">
                <li><a href="#lifestyle" onclick="showCategory(event, 'lifestyle')">{{ __('messages.service_furniture_protection') }}</a></li>
                <hr style="width: 100%;">
                <hr style="width: 100%;">
            </ul>
        </div>
        <!-- Content -->
        <div class="content">
            <div id="tech" class="category-details">
                <div class="con">
                    <h1>{{ __('messages.thermal_insulation_title') }}</h1>
                    <h2>{{ __('messages.thermal_insulation_definition_title') }}</h2>
                    <p style="direction: {{ $direction }};">{{ __('messages.thermal_insulation_definition') }}</p>
                    <ul>
                        <li  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.types_of_heat.walls_and_roofs') }}</li>
                        <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.types_of_heat.windows') }}</li>
                        <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">{{ __('messages.types_of_heat.ventilation') }}</li>
                    </ul>
                    <p style="direction: {{ $direction }};">{{ __('messages.importance_of_insulation') }}</p>

                    <h2>{{ __('messages.thermal_insulation_benefits') }}</h2>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-bolt"></i>
                            <h3>{{ __('messages.energy_savings.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.energy_savings.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-thermometer-half"></i>
                            <h3>{{ __('messages.maintain_temperature.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.maintain_temperature.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-cogs"></i>
                            <h3>{{ __('messages.reduced_ac_cost.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.reduced_ac_cost.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-users"></i>
                            <h3>{{ __('messages.comfort_level.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.comfort_level.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-volume-up"></i>
                            <h3>{{ __('messages.noise_reduction.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.noise_reduction.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-cloud-sun"></i>
                            <h3>{{ __('messages.weather_protection.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.weather_protection.description') }}</p>
                        </div>
                    </div>

                    <h2>{{ __('messages.choose_thermal_insulation_title') }}</h2>
                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-thermometer-three-quarters"></i>
                            <h3>{{ __('messages.features.low_thermal_conductivity.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.features.low_thermal_conductivity.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-sun"></i>
                            <h3>{{ __('messages.features.thermal_radiation_resistance.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.features.thermal_radiation_resistance.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-flask"></i>
                            <h3>{{ __('messages.features.nano_ceramic_content.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.features.nano_ceramic_content.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-temperature-high"></i>
                            <h3>{{ __('messages.features.thermal_stress_resistance.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.features.thermal_stress_resistance.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-hammer"></i>
                            <h3>{{ __('messages.features.mechanical_properties.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.features.mechanical_properties.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-bacteria"></i>
                            <h3>{{ __('messages.features.bacteria_and_mold_resistance.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.features.bacteria_and_mold_resistance.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-ruler-combined"></i>
                            <h3>{{ __('messages.features.dimension_stability.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.features.dimension_stability.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-flask"></i>
                            <h3>{{ __('messages.features.chemical_resistance.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.features.chemical_resistance.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-user-md"></i>
                            <h3>{{ __('messages.features.health_safety.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.features.health_safety.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <h3>{{ __('messages.features.standard_specifications.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.features.standard_specifications.description') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-wrench"></i>
                            <h3>{{ __('messages.features.easy_installation.title') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.features.easy_installation.description') }}</p>
                        </div>
                    </div>

                    <h2>{{ __('messages.types_of_thermal_insulation_films') }}</h2>
                    <hr style="width: 25%;">
                    <hr style="width: 25%;">


                    <div
                        @if(App::getLocale() == 'ar')
                            style="direction: ltr; display: flex;justify-content: center"
                        @else
                            style="direction: rtl; display: flex;justify-content: center"
                        @endif>
                        <div class="film-type" style="margin:30px">
                            <img height="600px" width="350px" src="{{URL::asset('assets/img/media/con1.png')}}">
                        </div>

                        <div class="film-type">
                            <br>
                            <h3 style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                <i style="color: #e47823;" class="fas fa-sun"></i>
                                {{ __('messages.transparent_nano_films') }}
                            </h3>
                            <hr style="width: 25%;">
                            <br>
                            <ul>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="color: #e47823;" class="fas fa-sun"></i> {{ __('messages.infrared_insulation') }}</li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="color: #e47823;" class="fas fa-cloud-sun"></i> {{ __('messages.uv_insulation') }}</li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="color: #e47823;" class="fas fa-flask"></i> {{ __('messages.nano_material') }}</li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="color: #e47823;" class="fas fa-shield-alt"></i> {{ __('messages.scratch_resistant') }}</li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="color: #e47823;" class="fas fa-tint"></i> {{ __('messages.reduce_glare') }}</li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="color: #e47823;" class="fas fa-user-md"></i> {{ __('messages.health_safe') }}</li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="color: #e47823;" class="fas fa-bolt"></i> {{ __('messages.electricity_savings') }}</li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="color: #e47823;" class="fas fa-temperature-low"></i> {{ __('messages.maintain_cool') }}</li>
                            </ul>
                        </div>
                    </div>
                    <hr style="width: 90%;">

                    <div
                        @if(App::getLocale() == 'ar')
                            style="direction: ltr; display: flex;justify-content: center"
                        @else
                            style="direction: rtl; display: flex;justify-content: center"
                        @endif>
                        <div class="film-type" style="margin: 30px;">
                            <img height="600px" width="350px" src="{{URL::asset('assets/img/media/con2.png')}}">
                        </div>

                        <div class="film-type">
                            <br>
                            <h3 style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" class="fas fa-atom">
                                {{ __('messages.thermal_insulation_films1') }}
                            </h3>
                            <hr style="width: 25%;">
                            <br>
                            <ul>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-sun"></i> {{ __('messages.infrared_insulation1') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-cloud-sun"></i> {{ __('messages.uv_insulation1') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-ban"></i> {{ __('messages.no_metal_fibers1') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-shield-alt"></i> {{ __('messages.scratch_resistant1') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-tint"></i> {{ __('messages.reduce_glare1') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-leaf"></i> {{ __('messages.eco_friendly1') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-bolt"></i> {{ __('messages.electricity_savings1') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-temperature-low"></i> {{ __('messages.maintain_cool1') }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <hr style="width: 90%;">


                    <div
                        @if(App::getLocale() == 'ar')
                            style="direction: ltr; display: flex;justify-content: center"
                        @else
                            style="direction: rtl; display: flex;justify-content: center"
                        @endif
                    >
                        <div class="film-type" style="margin:30px">
                            <img height="600px" width="350px" src="{{URL::asset('assets/img/media/con3.png')}}">
                        </div>

                        <div class="film-type">
                            <br>
                            <h3 style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" class="fas fa-cogs">
                                {{ __('messages.nano_ceramic_thermal_insulation_hp2') }}
                            </h3>
                            <hr style="width: 25%;">
                            <br>
                            <ul>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-sun"></i> {{ __('messages.infrared_insulation_652') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-cloud-sun"></i> {{ __('messages.uv_insulation_992') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-ban"></i> {{ __('messages.no_metal_fibers2') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-shield-alt"></i> {{ __('messages.scratch_resistant2') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-tint"></i> {{ __('messages.reduce_glare2') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-leaf"></i> {{ __('messages.eco_friendly2') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-bolt"></i> {{ __('messages.electricity_savings2') }}
                                </li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;">
                                    <i style="color: #e47823;" class="fas fa-temperature-low"></i> {{ __('messages.maintain_cool2') }}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <hr style="width: 90%;">

                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('construction_bookings') }}" title="Purchase Template">{{ __('messages.book_now') }}</a>
                </div>
            </div>

            <div id="health" class="category-details">
                <div class="con">
                    <h1>{{ __('messages.nano_technology_title') }}</h1>
                    <p style="direction: {{ $direction }};">{{ __('messages.nano_technology_description') }}</p>

                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-shield-alt"></i>
                            <h3>{{ __('messages.surface_protection') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.surface_protection_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-tint"></i>
                            <h3>{{ __('messages.stain_resistance') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.stain_resistance_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-spray-can"></i>
                            <h3>{{ __('messages.easy_cleaning') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.easy_cleaning_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-cogs"></i>
                            <h3>{{ __('messages.long_term_protection') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.long_term_protection_desc') }}</p>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: center">
                        <img src="{{ URL::asset('assets/img/media/con4.png') }}">
                    </div><br>

                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('construction_bookings') }}" title="Purchase Template">{{ __('messages.book_now') }}</a>
                </div>
            </div>
            <div id="sports" class="category-details">
                <div class="con">
                    <h1 style="direction: rtl">{{ __('messages.smart_film_title') }}</h1>
                    <p style="direction: {{ $direction }};">{{ __('messages.smart_film_description') }}</p>

                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-user-secret"></i>
                            <h3>{{ __('messages.privacy_control') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.privacy_control_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-solar-panel"></i>
                            <h3>{{ __('messages.energy_saving') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.energy_saving_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-sun"></i>
                            <h3>{{ __('messages.light_control') }}</h3>
                            <p>{{ __('messages.light_control_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-adjust"></i>
                            <h3>{{ __('messages.ac_control') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.ac_control_desc') }}</p>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: center">
                        <img src="{{ URL::asset('assets/img/media/con5.png') }}">
                    </div><br>

                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('construction_bookings') }}" title="Purchase Template">{{ __('messages.book_now') }}</a>
                </div>
            </div>

            <div id="education" class="category-details">
                <div class="con">
                    <h1 style="direction: rtl">{{ __('messages.skylight_title') }}</h1>
                    <p style="direction: {{ $direction }};">{{ __('messages.skylight_description') }}</p>
                    <p style="direction: {{ $direction }};">{{ __('messages.skylight_description_2') }}</p>

                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-sun"></i>
                            <h3>{{ __('messages.thermal_control') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.thermal_control_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-eye-slash"></i>
                            <h3>{{ __('messages.privacy_enhancement') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.privacy_enhancement_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-paint-brush"></i>
                            <h3>{{ __('messages.artistic_designs') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.artistic_designs_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-tools"></i>
                            <h3>{{ __('messages.installation_simplicity') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.installation_simplicity_desc') }}</p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-umbrella"></i>
                            <h3>{{ __('messages.uv_protection5') }}</h3>
                            <p style="direction: {{ $direction }};">{{ __('messages.uv_protection_desc5') }}</p>
                        </div>
                    </div>

                    <div style="display: flex; justify-content: center">
                        <img src="{{ URL::asset('assets/img/media/con6.png') }}">
                    </div><br>

                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('construction_bookings') }}" title="Purchase Template">{{ __('messages.book_now') }}</a>
                </div>
            </div>
            <div id="business" class="category-details">
                <div class="con">
                    <h1>{{ __('messages.title2') }}</h1>
                    <p style="direction: {{ $direction }};">{{ __('messages.description10') }}</p>
                    <div style="display: flex; justify-content: center">
                        <img src="{{ URL::asset('assets/img/media/con7.png') }}">
                    </div><br>
                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('construction_bookings') }}" title="Purchase Template">{{ __('messages.book_now') }}</a>
                </div>
            </div>
            <div id="lifestyle" class="category-details">
                <div class="con">
                    <h1>{{ __('messages.title1') }}</h1>
                    <p style="direction: {{ $direction }};">
                        {{ __('messages.description') }}
                    </p>

                    <div class="features">
                        <div class="feature">
                            <i class="fas fa-screwdriver"></i>
                            <h3>{{ __('messages.scratch_protection') }}</h3>
                            <p style="direction: {{ $direction }};">
                                {{ __('messages.scratch_protection_desc') }}
                            </p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-tint"></i>
                            <h3>{{ __('messages.stain_resistance') }}</h3>
                            <p style="direction: {{ $direction }};">
                                {{ __('messages.stain_resistance_desc') }}
                            </p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-water"></i>
                            <h3>{{ __('messages.water_resistance') }}</h3>
                            <p style="direction: {{ $direction }};">
                                {{ __('messages.water_resistance_desc') }}
                            </p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-sun"></i>
                            <h3>{{ __('messages.uv_protection1') }}</h3>
                            <p style="direction: {{ $direction }};">
                                {{ __('messages.uv_protection_desc1') }}
                            </p>
                        </div>
                        <div class="feature">
                            <i class="fas fa-paint-brush"></i>
                            <h3>{{ __('messages.easy_application') }}</h3>
                            <p  style="direction: {{ $direction }};">
                                {{ __('messages.easy_application_desc') }}
                            </p>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: center">
                        <img src="{{ URL::asset('assets/img/media/con8.png') }}">
                    </div><br>
                    <a class="template-component-button template-color-white" style="background-color: #e47823" href="{{ route('construction_bookings') }}" title="Purchase Template">{{ __('messages.book_now') }}</a>
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


