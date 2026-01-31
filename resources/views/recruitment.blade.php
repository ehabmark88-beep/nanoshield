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
         .error-message {
             color: red;
             font-size: 0.9rem;
             margin-top: 5px;
             text-align: right;
             direction: rtl;
         }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/countact.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white;font-size: 60px">{{ __('messages.recruitment') }}</h1>
            </div>
        </div>
    </div><br>

    <div class="div-body">
        <div class="container">
            <div class="header">
                <h3>{{ __('messages.join_us') }}</h3>
            </div>
            <form action="{{ route('recruitments') }}" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name">{{ __('messages.name') }}</label>
                    <input id="name" type="text" name="name" placeholder="{{ __('messages.placeholder_name') }}" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="form-group">
                    <label for="date_of_birth">{{ __('messages.date_of_birth') }}</label>
                    <input id="date_of_birth" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                    @error('date_of_birth')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">{{ __('messages.email') }}</label>
                    <input id="email" type="email" name="email" placeholder="{{ __('messages.email') }}" value="{{ old('email') }}">
                    @error('email')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">{{ __('messages.phone') }}</label>
                    <input id="phone" type="text" name="phone" placeholder="{{ __('messages.phone') }}" value="{{ old('phone') }}" required>
                    @error('phone')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="form-group">
                    <label for="gender">{{ __('messages.gender') }}</label>
                    <select id="gender" name="gender" required>
                        <option value="">{{ __('messages.gender') }}</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{ __('messages.gender_male') }}</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{ __('messages.gender_female') }}</option>
                    </select>
                    @error('gender')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Job Position -->
                <div class="form-group">
                    <label for="job_position">{{ __('messages.job_position') }}</label>
                    <input id="job_position" type="text" name="job_position" placeholder="{{ __('messages.placeholder_job_position') }}" value="{{ old('job_position') }}" required>
                    @error('job_position')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- City -->
                <div class="form-group">
                    <label for="city">{{ __('messages.city') }}</label>
                    <input id="city" type="text" name="city" placeholder="{{ __('messages.placeholder_city') }}" value="{{ old('city') }}" required>
                    @error('city')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Training Courses -->
                <div class="form-group">
                    <label for="training_courses">{{ __('messages.training_courses') }}</label>
                    <textarea id="training_courses" name="training_courses" placeholder="{{ __('messages.training_courses') }}">{{ old('training_courses') }}</textarea>
                    @error('training_courses')
                    <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- CV Upload -->
                <div class="form-group">
                    <p for="cv">{{ __('messages.cv') }}</p>
                    <input id="cv" type="file" name="cv[]" required multiple accept=".pdf,.doc,.docx">
                    @foreach ($errors->get('cv.*') as $fileErrors)
                        @foreach ($fileErrors as $message)
                            <div class="error-message">{{ $message }}</div>
                        @endforeach
                    @endforeach
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <input type="submit" value="{{ __('messages.submit') }}" class="template-component-button" name="submit-recruitment" id="submit-recruitment">
                </div>
            </form>
        </div>
    </div>


    <div class="template-component-space template-component-space-4"></div>
    <div id="floatingAlert" class="floating-alert">
        <span id="floatingAlertMessage"></span>
        <span class="check-icon">&#10003;</span> <!-- علامة صح -->
    </div>

    </div>
@endsection

@section('js')
@endsection
