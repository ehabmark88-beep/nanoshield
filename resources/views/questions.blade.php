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
        a, h1,h2, h3, h4, h5, h6, button, li, ul,p {
            font-family: 'Cairo', sans-serif !important;
            text-align: center;
        }


        .h_h1{
            color: #e67923 !important;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
        }

        .collapse {
            background-color: #e67923;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            margin-top: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .collapse:hover {
            background-color: #d55b1f;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .collapse h1 {
            margin: 0;
            font-size: 20px;
        }

        .content {
            overflow: hidden;
            max-height: 0;
            opacity: 0;
            padding: 0 15px;
            background-color: #fff;
            border: 1px solid #e67923;
            border-radius: 8px;
            transition: max-height 0.7s ease, opacity 0.7s ease;
            margin-top: 10px;
        }

        .content.open {
            max-height: 500px; /* Adjust based on content size */
            opacity: 1;
            padding: 15px;
        }

        @media (max-width:767px){
            .container {
                width: 90%;
            }
        }
        .collapse {
            PADDING: 3PX !important;
        }
        p {
            COLOR: BLACK !important;
        }
    </style>

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
        /* تنسيق العنوان الفرعي */
        .header h3 {
            color: #333;
            margin: 20px 0;
            font-size: 26px;
            text-align: center;
            border-bottom: 2px solid #e27723;
            padding-bottom: 5px;
        }

    </style>

@endsection

@section('content')

    @php
        $direction = (App::getLocale() == 'en') ? 'ltr' : 'rtl';
        $textAlign = (App::getLocale() == 'en') ? 'left' : 'right';
    @endphp

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/faq.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white;font-size: 60px ">{{ __('messages.faq') }}</h1>
            </div>
            <div>
            </div>
        </div>
    </div><br>

    <div >
        <h1 class="h_h1">
            {{ __('messages.if_you_have_any_inquiries') }}
        </h1>
        <br>
        <h3>
            {{ __('messages.nano_shield_welcomes_inquiries') }} <a class="h_h1" href="{{ route('contactus' )}}">{{ __('messages.contact_us') }}</a>
        </h3>
        <br><br>
    </div>

    <div style="width: 70%; margin: auto">
        @foreach ($faqs as $faq)
            <div class="collapse" onclick="toggleCollapse('{{ $faq->id }}')">
                <h1>{{ App::getLocale() === 'ar' ? $faq->question_ar : $faq->question  }}</h1>
            </div>
            <div class="content" id="content{{ $faq->id }}"   style="direction: {{ $direction }} !important;">
                <p>{{ App::getLocale() === 'ar' ? $faq->answer_ar : $faq->answer  }}</p>
            </div>
        @endforeach
    </div>

    <div class="div-body">
        <div class="container">
            <div class="header">
                <h3  @if(App::getLocale() == 'en') style="color: black; margin: 20px;direction: ltrtl"   @else style="color: black; margin: 20px;direction: rtl"   @endif ">
                    {{ __('messages.send_inquiry') }}
                </h3>
            </div>
            <form action="{{ route('formFaq') }}" method="post" enctype="multipart/form-data">
                @csrf

                <!-- اسم العميل -->
                <div class="form-group">
                    <label for="name">{{ __('messages.customer_name') }}</label>
                    <input id="name" type="text" name="name" placeholder="*{{ __('messages.customer_name') }}" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- رقم الجوال -->
                <div class="form-group">
                    <label for="phone_number">{{ __('messages.phone_number') }}</label>
                    <input id="phone_number" type="text" name="phone_number" placeholder="*{{ __('messages.phone_number') }}" value="{{ old('phone_number') }}">
                    @error('phone_number')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- البريد الإلكتروني -->
                <div class="form-group">
                    <label for="email">{{ __('messages.email') }}</label>
                    <input id="email" type="email" name="email" placeholder="*{{ __('messages.email') }}" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- رسالة الاستفسار -->
                <div class="form-group">
                    <label for="message">{{ __('messages.inquiry_message') }}</label>
                    <textarea id="message" name="message" placeholder="{{ __('messages.enter_inquiry') }}" required>{{ old('message') }}</textarea>
                    @error('message')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- زر الإرسال -->
                <div class="template-align-center template-clear-fix template-margin-top-1">
                <span class="template-state-block">
                    <input type="submit" value="{{ __('messages.submit') }}" class="template-component-button" name="submit-inquiry" id="submit-inquiry">
                </span>
                </div>
            </form>
        </div>
    </div>

    <br><br><br>

    <div id="floatingAlert" class="floating-alert">
        <span id="floatingAlertMessage"></span>
        <span class="check-icon">&#10003;</span> <!-- علامة صح -->
    </div>
@endsection

@section('js')
    <script>

        function toggleCollapse(contentId) {
            var content = document.getElementById('content' + contentId);
            if (content.classList.contains('open')) {
                content.classList.remove('open');
            } else {
                // Close other open content
                var allContents = document.querySelectorAll('.content');
                allContents.forEach(function (item) {
                    item.classList.remove('open');
                });

                // Open the clicked content
                content.classList.add('open');
            }
        }

    </script>
@endsection

