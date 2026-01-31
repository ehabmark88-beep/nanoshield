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
    </style>
@endsection

@section('content')

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/countact.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white;font-size: 60px">{{ __('messages.partnership_form') }}</h1>
            </div>
        </div>
    </div><br>

    <div class="div-body">
        <div class="container">
            <div class="header">
                <h3 style="color: black; margin: 20px">
                    {{ __('messages.partnership_title') }}
                </h3>
            </div>
            <form action="{{ route('partnershipss') }}" method="post" enctype="multipart/form-data">
                @csrf

                <!-- اسم الجهة -->
                <div class="form-group">
                    <label for="organization_name">{{ __('messages.organization_name') }}</label>
                    <input id="organization_name" type="text" name="organization_name" placeholder="{{ __('messages.placeholder_organization_name') }}" value="{{ old('organization_name') }}" required>
                    @error('organization_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- نوع الجهة -->
                <div class="form-group">
                    <label for="organization_type">{{ __('messages.organization_type') }}</label>
                    <select id="organization_type" name="organization_type" required>
                        <option style="color:#000;" value="">{{ __('messages.select_organization_type') }}</option>
                        <option style="color:#000;" value="جهة حكومية" {{ old('organization_type') == 'جهة حكومية' ? 'selected' : '' }}>{{ __('messages.government') }}</option>
                        <option style="color:#000;" value="جهة خاصة" {{ old('organization_type') == 'جهة خاصة' ? 'selected' : '' }}>{{ __('messages.private') }}</option>
                        <option style="color:#000;" value="وكالة سيارات" {{ old('organization_type') == 'وكالة سيارات' ? 'selected' : '' }}>{{ __('messages.car_agency') }}</option>
                        <option style="color:#000;" value="معارض سيارات" {{ old('organization_type') == 'معارض سيارات' ? 'selected' : '' }}>{{ __('messages.car_showroom') }}</option>
                    </select>
                    @error('organization_type')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- مسؤول التواصل -->
                <div class="form-group">
                    <label for="contact_person">{{ __('messages.contact_person') }}</label>
                    <input id="contact_person" type="text" name="contact_person" placeholder="{{ __('messages.placeholder_contact_person') }}" value="{{ old('contact_person') }}" required>
                    @error('contact_person')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- رقم الجوال -->
                <div class="form-group">
                    <label for="phone_number">{{ __('messages.phone_number') }}</label>
                    <input id="phone_number" type="text" name="phone_number" placeholder="{{ __('messages.placeholder_phone_number') }}" value="{{ old('phone_number') }}" required>
                    @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- البريد الإلكتروني -->
                <div class="form-group">
                    <label for="email">{{ __('messages.email') }}</label>
                    <input id="email" type="email" name="email" placeholder="{{ __('messages.placeholder_email') }}" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- تفاصيل الطلب -->
                <div class="form-group">
                    <label for="request_details">{{ __('messages.request_details') }}</label>
                    <textarea id="request_details" name="request_details" placeholder="{{ __('messages.placeholder_request_details') }}" required>{{ old('request_details') }}</textarea>
                    @error('request_details')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- السجل التجاري -->
                <div class="form-group">
                    <p for="image">{{ __('messages.commercial_registry') }}</p>
                    <input id="image" type="file" name="commercial_registry_files[]" multiple accept="*/*">
                    @error('commercial_registry_files.*')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- زر الإرسال -->
                <div class="template-align-center template-clear-fix template-margin-top-1">
                <span class="template-state-block">
                    <input type="submit" value="{{ __('messages.submit_partnership') }}" class="template-component-button" name="submit-partnership" id="submit-partnership">
                </span>
                </div>
            </form>
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
