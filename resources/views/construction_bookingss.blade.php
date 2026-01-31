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

        .template-header-content {
            height: 100% !important;
        }
        .background-image {
            max-height: 580px !important;

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

        label{
            display: none;
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
        <img src="{{URL::asset('assets/img/banners/contracting.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white !important; font-size: 60px">{{ __('messages.construction_booking_form') }}</h1>
            </div>
        </div>
    </div>

    <div class="div-body">
        <div class="container">
            <div class="header">
                <h3 style="color: black; margin: 20px">
                    {{ __('messages.construction_booking_title') }}
                </h3>
            </div>
            <form action="{{ route('construction_booking') }}" method="post" enctype="multipart/form-data">
                @csrf

                <!-- نوع الكيان -->
                <div class="form-group">
                    <label for="entity_type">{{ __('messages.entity_type') }}</label>
                    <select id="entity_type" name="type" required>
                        <option value="" style="color:#000;">{{ __('messages.entity_type') }}</option>
                        <option value="individual" style="color:#000;" {{ old('entity_type') == 'individual' ? 'selected' : '' }}>{{ __('messages.individual') }}</option>
                        <option value="company" style="color:#000;" {{ old('entity_type') == 'company' ? 'selected' : '' }}>{{ __('messages.company') }}</option>
                    </select>
                    @error('entity_type')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- اسم العميل -->
                <div class="form-group">
                    <label for="name">{{ __('messages.customer_name') }}</label>
                    <input id="name" type="text" name="name" placeholder="*{{ __('messages.customer_name') }}" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- رقم الجوال -->
                <div class="form-group">
                    <label for="phone_number">{{ __('messages.phone_number') }}</label>
                    <input id="phone_number" type="text" name="phone_number" placeholder="*{{ __('messages.phone_number') }}" value="{{ old('phone_number') }}" required>
                    @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- البريد الإلكتروني -->
                <div class="form-group">
                    <label for="email">{{ __('messages.email') }}</label>
                    <input id="email" type="email" name="email" placeholder="*{{ __('messages.email') }}" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- المدينة -->
                <div class="form-group">
                    <label for="city">{{ __('messages.city') }}</label>
                    <input id="city" type="text" name="city" placeholder="*{{ __('messages.city') }}" value="{{ old('city') }}" required>
                    @error('city')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- نوع الخدمة -->
                <div class="form-group">
                    <label for="service_id">{{ __('messages.service_type') }}</label>
                    <select id="service_id" name="service_id" required>
                        <option value="">{{ __('messages.service_type') }}</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ app()->getLocale() == 'en' ? $service->name_en : $service->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- المساحة التقريبية -->
                <div class="form-group">
                    <label for="approximate_area">{{ __('messages.approximate_area') }}</label>
                    <input id="approximate_area" type="number" name="approximate_area" placeholder="*{{ __('messages.approximate_area') }}" value="{{ old('approximate_area') }}" required>
                    @error('approximate_area')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- صور الموقع -->
                <div class="form-group">
                    <p for="image">{{ __('messages.site_images') }}</p>
                    <input id="image" type="file" name="image[]" multiple accept="image/*">
                    @error('image.*')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- السجل التجاري -->
                <div class="form-group">
                    <p for="commercial_registry_files">{{ __('messages.commercial_registry') }}</p>
                    <input id="commercial_registry_files" type="file" name="commercial_registry_files[]" multiple accept="*/*">
                    @error('commercial_registry_files.*')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- زر الإرسال -->
                <div class="template-align-center template-clear-fix template-margin-top-1">
                <span class="template-state-block">
                    <input type="submit" value="{{ __('messages.submit_booking') }}" class="template-component-button" name="submit-booking" id="submit-booking">
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
