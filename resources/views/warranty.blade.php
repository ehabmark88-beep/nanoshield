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

        .responsive-subheading{
            direction: rtl !important;
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
        .con_div{
            margin-right: 7%;
            margin-left: 7%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #e67923;
            color: white;
        }
        td {
            background-color: #fff;
        }
        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }
        b {
            font-weight: bold;
            color: black ;
        }
        /* تنسيق الحاوية الرئيسية */
        .vc_row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* تنسيق الأعمدة */
        .wpb_column {
            flex: 1;
            min-width: 18%;
            box-sizing: border-box;
        }

        /* تنسيق العناوين */
        .vc_custom_heading {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 10px;
        }

        /* تنسيق الأزرار */
        .vc_btn3-container {
            text-align: center;
            margin-top: 10px;
        }

        .vc_btn3 {
            background-color: #007bff; /* لون الزر الأساسي */
            color: #fff; /* لون النص داخل الزر */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .vc_btn3:hover {
            background-color: #0056b3; /* لون الزر عند التمرير */
        }

        /* تنسيق النقاط في القوائم */
        .wpb-plan-features li {
            font-size: 0.9em;
            margin-bottom: 10px;
            position: relative;
            padding-left: 30px;
        }

        .wpb-plan-features li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='22px' height='22px' viewBox='0 0 22 22' version='1.1'%3E%3Cg id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-472.000000, -546.000000)' fill-rule='nonzero'%3E%3Cg id='wpb-pricing-table-element' transform='translate(445.000000, 222.000000)'%3E%3Cg id='bullet' transform='translate(27.000000, 324.000000)'%3E%3Cpath d='M22,10.9999756 C22,17.0751668 17.0751778,22 11,22 C4.92487111,22 0,17.0751668 0,10.9999756 C0,4.92488206 4.92487111,0 11,0 C17.0751778,0 22,4.92488206 22,10.9999756 Z' id='Path' fill='%23dd9933'/%3E%3Cpolygon id='Path' fill='%23FFFFFF' transform='translate(11.011123, 9.631788) rotate(-45.000000) translate(-11.011123, -9.631788) ' points='8.39375516 6.63178844 8.39375516 10.0231025 16.2371538 10.0231255 16.2371538 12.6317884 5.78509217 12.6317133 5.78509217 6.63178844'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E") center no-repeat;
            background-size: 18px;
        }

        /* تنسيق القسم */
        .vc_general {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }

        /* تنسيق السعر */
        .wpb-price-container {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }


        /* تنسيق الحاوية الرئيسية */
        .vc_row {
            padding: 20px;
            background-color: #f5f5f5; /* لون خلفية فاتح للحاوية */
            border-radius: 8px;
        }

        /* تنسيق الأعمدة */
        .wpb_column {
            padding: 20px;
        }

        /* تنسيق النصوص */
        .wpb_text_column {
            background-color: #fff; /* لون خلفية أبيض للنصوص */
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
        }

        /* تنسيق العناوين */
        .wpb_text_column h6 {
            font-size: 16px;
            line-height: 1.6;
            color: #333; /* لون النص */
            margin-bottom: 15px; /* مسافة أسفل العناوين */
            font-weight: bold;
        }

        /* تنسيق النصوص المعنونة */
        .wpb_text_column h6 strong {
            color: #000; /* لون النص الغامق */
        }

        /* تنسيق النصوص ذات الخلفية المتكررة */
        .wpb_text_column h6:last-of-type {
            margin-bottom: 0; /* إزالة المسافة السفلى من آخر عنوان */
        }

        /* تنسيق العناوين ذات النصوص المتكررة */
        .wpb_text_column h6:nth-of-type(even) {
            color: #666; /* لون النص الباهت لعناوين معينة */
        }

        @media (min-width: 768px) {
            .wpb_text_column p {
                font-size: 25px;
            }


            .con_div{
                margin-right: 2% !important;
                margin-left: 2% !important;
            }
        }

        /* أساسيات التنسيق للعرض الكبير */
        .responsive-section {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px; /* لجعل الأعمدة تتناسب مع الحافة */
        }

        .responsive-column {
            flex: 1;
            min-width: 200px; /* عرض العمود لا يقل عن 200 بكسل */
            padding: 0 10px; /* تباعد بين الأعمدة */
            box-sizing: border-box; /* تأكد من أن الحشو والتخطيط يعملان بشكل صحيح */
        }

        h6 {
            font-size: 18px;
            margin: 10px 0;
            padding: 0;
        }

        .responsive-heading {
            font-size: 24px;
            color: #e67923;
            text-align: center;
            margin-bottom: 20px;
        }

        .responsive-subheading {
            font-size: 18px;
            text-align: right;
            margin-bottom: 15px; /* زيادة التباعد بين العناصر */
        }

        @media screen and (max-width: 1024px) {
            .responsive-heading {
                font-size: 22px;
            }

            .responsive-subheading {
                font-size: 17px;
            }
        }

        @media screen and (max-width: 768px) {
            .responsive-section {
                flex-direction: column; /* جعل الأعمدة تتكدس فوق بعضها بشكل عمودي */
                margin: 0; /* إزالة الهوامش السلبية */
            }

            .responsive-column {
                flex: 1 1 100%; /* جعل الأعمدة تأخذ عرض كامل الصف */
                margin-bottom: 20px; /* إضافة تباعد بين الأعمدة */
            }

            .responsive-heading {
                font-size: 20px;
            }

            .responsive-subheading {
                font-size: 16px;
            }
        }

        @media screen and (max-width: 480px) {
            .vc_row {
                display: block !important;
            }

            .responsive-heading {
                font-size: 18px;
            }

            .responsive-subheading {
                font-size: 14px;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #e67923;
            color: white;
        }
        td {
            background-color: #fff;
        }
        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }
        .enhanced-table .centered {
            vertical-align: middle !important; /* توسيط النص عموديًا */
            text-align: center !important;     /* توسيط النص أفقيًا */
        }
        .header {
            display: block !important;
        }
    </style>
@endsection

@section('content')
    @php
        $direction = (App::getLocale() == 'en') ? 'ltr' : 'rtl';
        $textAlign = (App::getLocale() == 'en') ? 'left' : 'right';
    @endphp
    <div class="template-header template-header-background template-header">
        <img src="{{ URL::asset('assets/img/banners/warranty.png') }}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white !important;font-size: 40px !important;">{{ __('messages.warranty') }}</h1>
            </div>
            <div>
            </div>
        </div>
    </div><br>

    <div class="con_div">
        <div class="wpb-content-wrapper">
            <div class="vc_row wpb_row vc_row-fluid">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <h1 style="text-align: center; color:#e67923;" dir="rtl">{{ __('messages.warranty_and_after_sales') }}</h1>
                            <p style="text-align: center; font-size: 20px; line-height: 1.5; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif" >
                                {{ __('messages.after_sales_service_description') }}
                            </p>
                            <p style="text-align: center; font-size: 20px; line-height: 1.5; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif" >
                            {{ __('messages.after_sales_service_description_2') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 style="color:#e47823;"> {{ __('messages.our_services_include') }} </h3>
        <h3> {{ __('messages.warranty_and_after_sales') }} </h3>

        <div class="vc_row wpb_row vc_row-fluid responsive-row">
            <div class="wpb_column vc_column_container vc_col-sm-3">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <ul class="ltx-block-icon has-descr icons-count-1 align-center ltx-icon-color-main ltx-icon-size-default ltx-header-color-default ltx-icon-type-transparent ltx-bg-color-transparent layout-cols1 ltx-icon-top">
                            <li class="ltx-icon-image">
                                <div class="in">
                                    <span class="ltx-icon ltx-icon-image bg-transparent"></span>
                                    <i class="fas fa-user-tie" style="color:#e67923; font-size: 40px;"></i>
                                    <h6 class="header" style="color: #e27723">{{ __('messages.support_and_consultation') }}</h6>
                                    <div class="descr">
                                        <p style="direction: {{ $direction }} !important;">{{ __('messages.support_and_consultation_description') }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="wpb_column vc_column_container vc_col-sm-3">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <ul class="ltx-block-icon has-descr icons-count-1 align-center ltx-icon-color-main ltx-icon-size-default ltx-header-color-default ltx-icon-type-transparent ltx-bg-color-transparent layout-cols1 ltx-icon-top">
                            <li class="ltx-icon-image">
                                <div class="in" style="">
                                    <span class="ltx-icon ltx-icon-image bg-transparent"></span>
                                    <i class="fas fa-arrow-up" style="color:#e67923; font-size: 40px;"></i>
                                    <h6 class="header" style="color: #e27723">{{ __('messages.upgrades_and_improvements') }}</h6>
                                    <div class="descr">
                                        <p style="direction: {{ $direction }} !important;">{{ __('messages.upgrades_and_improvements_description') }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="wpb_column vc_column_container vc_col-sm-3">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <ul class="ltx-block-icon has-descr icons-count-1 align-center ltx-icon-color-main ltx-icon-size-default ltx-header-color-default ltx-icon-type-transparent ltx-bg-color-transparent layout-cols1 ltx-icon-top">
                            <li class="ltx-icon-image">
                                <div class="in">
                                    <span class="ltx-icon ltx-icon-image bg-transparent"></span>
                                    <i class="fas fa-tools" style="color:#e67923; font-size: 40px;"></i>
                                    <h6 class="header" style="color: #e27723">{{ __('messages.maintenance_and_repair') }}</h6>
                                    <div class="descr">
                                        <p style="direction: {{ $direction }} !important;">{{ __('messages.maintenance_and_repair_description') }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="wpb_column vc_column_container vc_col-sm-3">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <ul class="ltx-block-icon has-descr icons-count-1 align-center ltx-icon-color-main ltx-icon-size-default ltx-header-color-default ltx-icon-type-transparent ltx-bg-color-transparent layout-cols1 ltx-icon-top">
                            <li class="ltx-icon-image">
                                <div class="in">
                                    <span class="ltx-icon ltx-icon-image bg-transparent"></span>
                                    <i class="fas fa-search" style="color:#e67923; font-size: 40px;"></i>
                                    <h6 class="header" style="color: #e27723">{{ __('messages.inspection_and_evaluation') }}</h6>
                                    <div class="descr">
                                        <p style="direction: {{ $direction }} !important;">{{ __('messages.inspection_and_evaluation_description') }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <div class="vc_row wpb_row vc_row-fluid">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="wpb_text_column wpb_content_element">
                            <div class="wpb_wrapper">
                                <p style="text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">
                                    {{ __('messages.nano_shield_intro') }}
                                </p>
                                <p style="text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">
                                {{ __('messages.nano_shield_priority') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wpb_raw_code wpb_raw_html wpb_content_element">
            <div class="wpb_wrapper">
                <table class="enhanced-table" dir="rtl">
                    <tbody>
                    <tr>
                        <td><b style="color: #e27723; text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">{{ __('messages.service') }}</b></td>
                        <td><b style="color: #e27723; text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">{{ __('messages.category') }}</b></td>
                        <td><b style="color: #e27723; text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">{{ __('messages.warranty_period') }}</b></td>
                        <td><b style="color: #e27723; text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">{{ __('messages.maintenance') }}</b></td>
                        <td><b style="color: #e27723; text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">{{ __('messages.conditions') }}</b></td>
                    </tr>
                    <tr>
                        <td style="background-color: #f0f0f0" rowspan="3" class="centered"><b style="color: #e27723; text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">{{ __('messages.thermal_insulation') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.nano') }}</b></td>
                        <td style="background-color: #f0f0f0" rowspan="2" class="centered"><b>{{ __('messages.open') }}</b></td>
                        <td style="background-color: #f0f0f0" rowspan="3" class="centered"><b>{{ __('messages.none') }}</b></td>
                        <td style="direction: {{ $direction }} !important; background-color: #f0f0f0"  rowspan="3" class="centered"><b  @if(App::getLocale() == 'en') style=" direction: ltr !important;" @else style=" direction: rtl !important;" @endif> {{ __('messages.window_closure_condition') }}</b></td>
                    </tr>
                    <tr>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.CH') }}</b></td>
                    </tr>
                    <tr>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.HP') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.five_years') }}</b></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="centered"><b style="color: #e27723; text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">{{ __('messages.paint_protection_films') }}</b></td>
                        <td><b>{{ __('messages.nano_extreme_plus') }}</b></td>
                        <td rowspan="2" class="centered"><b>{{ __('messages.open') }}</b></td>
                        <td rowspan="2" class="centered"><b>{{ __('messages.six_months') }}</b></td>
                        <td style="direction: {{ $direction }} !important; background-color: #f0f0f0"  rowspan="2" class="centered"><b  @if(App::getLocale() == 'en') style=" direction: ltr !important;" @else style=" direction: rtl !important;" @endif>{{ __('messages.paint_film_conditions') }}</b></td>
                    </tr>
                    <tr>
                        <td style="direction: {{ $direction }} !important; background-color: #f0f0f0" style="background-color: #ffffff"><b>{{ __('messages.nano_ultimate') }}</b></td>
                    </tr>
                    <tr>
                        <td style="background-color: #f0f0f0" rowspan="4" class="centered"><b style="color: #e27723; text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">{{ __('messages.external_ceramic_nano') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.Q30') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.one_year') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.none') }}</b></td>
                        <td  style="direction: {{ $direction }} !important; background-color: #f0f0f0" rowspan="4" class="centered"><b>{{ __('messages.maintenance_conditions') }}</b></td>
                    </tr>
                    <tr>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.H9') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.five_years') }}</b></td>
                        <td style="direction: {{ $direction }} !important; background-color: #f0f0f0"><b>{{ __('messages.renewal_annual') }}</b></td>
                    </tr>
                    <tr>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.H9_six_layers') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.eight_years') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.renewal_annual') }}</b></td>
                    </tr>
                    <tr>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.nano_graphin') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.ten_years') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.renewal_annual') }}</b></td>
                    </tr>
                    <tr>
                        <td><b style="color: #e27723; text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">{{ __('messages.internal_ceramic_nano') }}</b></td>
                        <td><b>{{ __('messages.Pro20') }}</b></td>
                        <td><b>{{ __('messages.one_year') }}</b></td>
                        <td><b>{{ __('messages.none') }}</b></td>
                        <td style="direction: {{ $direction }} !important; background-color: #f0f0f0"><b>{{ __('messages.internal_cleaning_conditions') }}</b></td>
                    </tr>
                    <tr>
                        <td><b style="color: #e27723; text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">{{ __('messages.polishing_and_treatment') }}</b></td>
                        <td><b>{{ __('messages.external_polishing') }}</b></td>
                        <td><b>{{ __('messages.none') }}</b></td>
                        <td rowspan="3" class="centered"><b>{{ __('messages.none') }}</b></td>
                        <td style="direction: {{ $direction }} !important; background-color: #f0f0f0" rowspan="3" class="centered"><b>{{ __('messages.none') }}</b></td>
                    </tr>
                    <tr>
                        <td style="background-color: #f0f0f0"><b style="color: #e27723">{{ __('messages.sunroof_paint_protection') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.sunroof') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.five_years') }}</b></td>
                    </tr>
                    <tr>
                        <td><b style="color: #e27723">{{ __('messages.windshield_protection') }}</b></td>
                        <td><b>{{ __('messages.safety') }}</b></td>
                        <td><b>{{ __('messages.none') }}</b></td>
                    </tr>
                    <tr>
                        <td><b style="color: #e27723; text-align: center; font-size: 20px; @if(App::getLocale() == 'en') direction: ltr !important;  @else direction: rtl !important; @endif ">{{ __('messages.under_car_rust_protection') }}</b></td>
                        <td><b>{{ __('messages.four_layers') }}</b></td>
                        <td><b>{{ __('messages.five_years') }}</b></td>
                        <td><b>{{ __('messages.annual_check') }}</b></td>
                        <td style="direction: {{ $direction }} !important; background-color: #f0f0f0"><b>{{ __('messages.available_in_sehat') }}</b></td>
                    </tr>
                    <tr>
                        <td><b style="color: #e27723">{{ __('messages.upholstery_service') }}</b></td>
                        <td><b>{{ __('messages.leather') }}</b></td>
                        <td><b>{{ __('messages.two_years') }}</b></td>
                        <td  rowspan="4" class="centered"><b>{{ __('messages.none') }}</b></td>
                        <td style="direction: {{ $direction }} !important; background-color: #f0f0f0" rowspan="4" class="centered"><b>{{ __('messages.none') }}</b></td>
                    </tr>
                    <tr>
                        <td style="background-color: #f0f0f0"><b style="color: #e27723">{{ __('messages.nano_wheels_service') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.two_layers') }}</b></td>
                        <td style="background-color: #f0f0f0"><b>{{ __('messages.one_year') }}</b></td>
                    </tr>
                    <tr>
                        <td><b style="color: #e27723">{{ __('messages.noise_insulation_service') }}</b></td>
                        <td rowspan="2" class="centered"><b>{{ __('messages.none') }}</b></td>
                        <td style="direction: {{ $direction }} !important; background-color: #f0f0f0" rowspan="2" class="centered"><b>{{ __('messages.none') }}</b></td>
                    </tr>
                    <tr>
                        <td style="background-color: #f0f0f0"><b style="color: #e27723">{{ __('messages.interior_protection_service') }}</b></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="vc_row wpb_row vc_row-fluid responsive-section">
            <div class="wpb_column vc_column_container vc_col-sm-1/5 responsive-column">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <section>
                            <div id="vc-pricing-table-intellectual-property" class="vc_general wpb-pricing-table vc_do_pricing_table">
                                <h6 class="vc_custom_heading vc_do_custom_heading" style="color: #e27723">
                                    {{ __('messages.intellectual_property') }}
                                </h6>
                                <ul dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                                    <li>{{ __('messages.intellectual_property_text') }}</li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="wpb_column vc_column_container vc_col-sm-1/5 responsive-column">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <section>
                            <div id="vc-pricing-table-responsibility" class="vc_general wpb-pricing-table vc_do_pricing_table">
                                <h6 class="vc_custom_heading vc_do_custom_heading" style="color: #e27723">
                                    {{ __('messages.responsibility1') }}
                                </h6>
                                <ul dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                                    <li>{{ __('messages.responsibility_text') }}</li>
                                </ul>
                            </div>

                        </section>
                    </div>
                </div>
            </div>

            <div class="wpb_column vc_column_container vc_col-sm-1/5 responsive-column">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <section>
                            <div id="vc-pricing-table-warranty" class="vc_general wpb-pricing-table vc_do_pricing_table">
                                <h6 class="vc_custom_heading vc_do_custom_heading" style="color: #e27723">
                                    {{ __('messages.warranty') }}
                                </h6>
                                <ul dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                                    <li>{{ __('messages.warranty_text') }}</li>
                                </ul>
                            </div>

                        </section>
                    </div>
                </div>
            </div>

            <div class="wpb_column vc_column_container vc_col-sm-1/5 responsive-column">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <section>
                            <div id="vc-pricing-table-bookings-payments" class="vc_general wpb-pricing-table vc_do_pricing_table">
                                <h6 class="vc_custom_heading vc_do_custom_heading" style="color: #e27723">
                                    {{ __('messages.bookings_payments') }}
                                </h6>
                                <ul dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                                    <li>{{ __('messages.bookings_payments_points.booking_requirement') }}</li>
                                    <li>{{ __('messages.bookings_payments_points.advance_payment') }}</li>
                                    <li>{{ __('messages.bookings_payments_points.cancellation_fees') }}</li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="wpb_column vc_column_container vc_col-sm-1/5 responsive-column">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <section>
                            <div id="vc-pricing-table-services" class="vc_general wpb-pricing-table vc_do_pricing_table">
                                <h6 class="vc_custom_heading vc_do_custom_heading" style="color: #e27723">
                                    {{ __('messages.services1') }}
                                </h6>
                                <ul dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
                                    <li>{{ __('messages.services_points1.nano_technology') }}</li>
                                    <li>{{ __('messages.services_points1.polishing_protection') }}</li>
                                    <li>{{ __('messages.services_points1.window_tinting') }}</li>
                                    <li>{{ __('messages.services_points1.paint_care') }}</li>
                                </ul>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>

        <div class="vc_row wpb_row vc_row-fluid responsive-section">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <h1 class="responsive-heading">{{ __('messages.terms_conditions') }}</h1>

                        <div class="wpb_text_column wpb_content_element">
                            <div class="wpb_wrapper">
                                <h1 class="responsive-heading">{{ __('messages.definitions') }}</h1>

                                <h2 dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.center_definition') }}
                                </h2>

                                <h2 dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.customer_definition') }}
                                </h2>

                                <h2 dir="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.services_definition') }}
                                </h2>


                                <h1 class="responsive-heading">{{ __('messages.accept_terms1') }}</h1>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.accept_terms_text') }}
                                </h2>

                                <h1 class="responsive-heading">{{ __('messages.customer_duties') }}</h1>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.provide_correct_information') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.follow_instructions') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.keep_records') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.provide_ownership') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.inspect_vehicle') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.maintain_vehicle_condition') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.authorize_moving_vehicle') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.responsible_for_tint_selection') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.bring_installation_invoice') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.collect_vehicle_on_time') }}
                                </h2>


                                <h1 class="responsive-heading">{{ __('messages.payment_settlement') }}</h1>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.fees') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.payment_methods') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.advanced_payments') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.no_claim_for_personal_account_payments') }}
                                </h2>

                                <h1 class="responsive-heading">{{ __('messages.responsibility') }}</h1>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.damage_due_to_services') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.data_protection') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.lost_items_in_vehicle') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.electrical_mechanical_faults') }}
                                </h2>

                                <h1 class="responsive-heading"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.service_cancellation') }}
                                </h1>
                                <h2 class="responsive-subheading"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.cancellation_by_customer') }}
                                </h2>
                                <h2 class="responsive-subheading"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.no_changes_during_execution') }}
                                </h2>
                                <h2 class="responsive-subheading"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.no_refund_after_entry') }}
                                </h2>
                                <h2 class="responsive-subheading"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.cancellation_by_center') }}
                                </h2>

                                <h1 class="responsive-heading"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.terms_modifications') }}
                                </h1>
                                <h2 class="responsive-subheading"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.center_right_to_modify') }}
                                </h2>

                                <h1 class="responsive-heading"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.compensation') }}
                                </h1>
                                <h2 class="responsive-subheading"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.no_replacement_car') }}
                                </h2>
                                <h2 class="responsive-subheading"  style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.limited_compensation') }}
                                </h2>

                                <h1 class="responsive-heading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.privacy_protection1') }}
                                </h1>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.privacy_commitment') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.right_to_take_photos') }}
                                </h2>

                                <h1 class="responsive-heading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.dispute_resolution1') }}
                                </h1>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.dispute_resolution_method') }}
                                </h2>

                                <h1 class="responsive-heading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.force_majeure1') }}
                                </h1>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.center_not_responsible') }}
                                </h2>

                                <h1 class="responsive-heading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.service_terms') }}
                                </h1>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important; color: #e47823;">
                                    {{ __('messages.nano_ceramic_window_tint') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.window_tint_instructions') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.scratch_exclusion') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.glass_break_exclusion') }}
                                </h2>

                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.ppf_film') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.ppf_review') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.ppf_damage_exclusion') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.ppf_accident_exclusion') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.ppf_natural_damage_exclusion') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.ppf_paint_exclusion') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.ppf_cleaning_service') }}
                                </h2>

                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    {{ __('messages.polishing_and_protection') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.polishing_damage_exclusion') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.polishing_accident_exclusion') }}
                                </h2>
                                <h2 class="responsive-subheading" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important; text-align: {{ App::getLocale() == 'ar' ? 'right' : 'left' }} !important;">
                                    * {{ __('messages.polishing_paint_exclusion') }}
                                </h2>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>

    </script>
@endsection

