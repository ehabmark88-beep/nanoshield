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
        label{
            display: none;
        }
        /* تنسيق العنوان الرئيسي */
        .main-title-container {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
        }

        .main-title {
            color: #e27723;
            font-size: 32px;
            font-weight: bold;
            margin: 0;
        }

        /* تنسيق الحاويات */
        .div-body {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 80%;
            margin: auto;
            height: auto !important;

            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .container {
            width: 60%;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
        }

        /* تنسيق العنوان الفرعي */
        .header h3 {
            color: #333;
            margin: 20px 0;
            font-size: 26px;
            text-align: center;
            border-bottom: 2px solid #e27723;
            padding-bottom: 5px;
        }

        /* تنسيق الحقول داخل النموذج */
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="file"],
        select,
        textarea {
            padding: 12px;
            font-size: 14px;
            border-radius: 6px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="date"]:focus,
        input[type="file"]:focus,
        select:focus,
        textarea:focus {
            border-color: #e27723;
            outline: none;
            box-shadow: 0 0 5px rgba(226, 119, 35, 0.3);
        }

        textarea {
            resize: vertical;
            height: 80px;
        }

        /* تنسيق زر الإرسال */
        .form-group input[type="submit"] {
            background-color: #e27723;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group input[type="submit"]:hover {
            background-color: #c8641e;
        }

        /* تنسيق العنصر العنوان الرئيسي لجعله في اليمين */
        .main-title-container {
            width: 30%;
            text-align: center;
            margin: auto;
        }

        /* تأثيرات بصرية أخرى */
        .form-group input,
        .form-group textarea,
        .form-group select {
            transition: transform 0.2s;
        }

        .form-group input:hover,
        .form-group textarea:hover,
        .form-group select:hover {
            transform: scale(1.02);
        }

        /* تنسيقات مخصصة للأجهزة الصغيرة */
        @media (max-width: 768px) {
            .div-body {
                flex-direction: column;
                width: 90%;
                padding: 10px;
            }

            .main-title-container {
                width: 100%;
                text-align: center;
                padding: 0;
                margin-bottom: 20px;
            }

            .container {
                width: 100%;
            }

            .main-title {
                font-size: 28px;
            }
        }
        ul {
            list-style-type: none;
        }
        body > div.template-header > div.template-content > div:nth-child(1) > div > div > ul > li:nth-child(1) {
            margin-right: 30px;
        }

        .template-layout-column-right {
            display: inline-block;
            text-align: center;
        }
    </style>

@endsection

@section('content')

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/commercial_concession.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white;font-size: 60px">{{ __('messages.booka') }}</h1>
            </div>
            <div></div>
        </div>
    </div><br>
    <br><br>

    <!-- Content -->
    <div class="template-content">
        <div style="width: 70%; margin: auto;">
            <div class="template-component-feature-list template-component-feature-list-position-top">
                <h1 style="text-align: center; color: #e27723; font-size: 25px; direction: rtl;">
                    {{ __('messages.franchise_requirements') }}
                </h1><br><br>

                <!-- Layout 25x25x25x25% -->
                <ul class="template-layout-25x25x25x25 template-clear-fix">
                    <li class="template-layout-column-left">
                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-wallet"></i>
                        <h3 class="div_pad" style="color:black;">{{ __('messages.financial_ability') }}</h3>
                    </li>
                    <li class="template-layout-column-center-left">
                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-briefcase"></i>
                        <h3 class="div_pad" style="color:black;">{{ __('messages.skills_experience') }}</h3>
                    </li>
                    <li class="template-layout-column-center-right">
                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-check-circle"></i>
                        <h3 class="div_pad" style="color:black;">{{ __('messages.commitment_standards') }}</h3>
                    </li>
                    <li class="template-layout-column-right">
                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-lightbulb"></i>
                        <h3 class="div_pad" style="color:black;">{{ __('messages.entrepreneurial_creativity') }}</h3>
                    </li>
                </ul>

                <div style="width: 70%; margin: auto; display: flex; justify-content: center; gap: 60px;">
                    <ul style="list-style-type: none; padding: 0;">
                        <li class="template-layout-column-right">
                            <i style="font-size: 50px;color: #f7941d;" class="fas fa-globe"></i>
                            <h3 class="div_pad" style="color:black;">{{ __('messages.region_specified') }}</h3>
                        </li>
                        <li class="template-layout-column-right">
                            <i style="font-size: 50px;color: #f7941d;" class="fas fa-user-check"></i>
                            <h3 class="div_pad" style="color:black;">{{ __('messages.age_requirement') }}</h3>
                        </li>
                    </ul>
                </div>

                <br>
                <hr style="width: 100%; font-size: 3px">
            </div>
        </div>

        <br>

        <!-- Section -->
        <div class="div-body">
            <div class="container">
                <div class="header">
                    <h3 style="color: black; margin: 20px">{{ __('messages.apply_now1') }}</h3>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- نموذج الإدخال -->
                <form action="{{ route('franchise_requirements') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- اسم المتقدم -->
                    <div class="form-group">
                        <label for="name">{{ __('messages.applicant_name') }}</label>
                        <input id="name" type="text" name="name" placeholder="{{ __('messages.placeholder_name') }}" value="{{ old('name') }}" required class="form-control">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- رقم الجوال -->
                    <div class="form-group">
                        <label for="phone_number">{{ __('messages.phone_number') }}</label>
                        <input id="phone_number" type="text" name="phone_number" placeholder="{{ __('messages.placeholder_phone') }}" value="{{ old('phone_number') }}" class="form-control">
                        @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- الجنسية -->
                    <div class="form-group">
                        <label for="nationality">{{ __('messages.nationality') }}</label>
                        <input id="nationality" type="text" name="nationality" placeholder="{{ __('messages.placeholder_nationality') }}" value="{{ old('nationality') }}" required class="form-control">
                        @error('nationality')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- المدينة -->
                    <div class="form-group">
                        <label for="city">{{ __('messages.city') }}</label>
                        <input id="city" type="text" name="city" placeholder="{{ __('messages.placeholder_city') }}" value="{{ old('city') }}" required class="form-control">
                        @error('city')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- الدولة -->
                    <div class="form-group">
                        <label for="country">{{ __('messages.country') }}</label>
                        <input id="country" type="text" name="country" placeholder="{{ __('messages.placeholder_country') }}" value="{{ old('country') }}" required class="form-control">
                        @error('country')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- زر الإرسال -->
                    <div class="template-align-center template-clear-fix template-margin-top-1">
                    <span class="template-state-block">
                        <input type="submit" value="{{ __('messages.submit_application') }}" class="template-component-button" name="submit-franchise" id="submit-franchise">
                    </span>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="template-component-space template-component-space-4"></div>
    <div id="floatingAlert" class="floating-alert">
        <span id="floatingAlertMessage"></span>
        <span class="check-icon">&#10003;</span> <!-- علامة صح -->
    </div>
@endsection

@section('js')

@endsection

