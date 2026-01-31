@extends('layouts.pages.master')

@section('title')
    @if (app()->getLocale() === 'en')
        {{ $seoSettings->first()->title_en ?? 'Nano Shield - Maintenance Appointment' }}
    @else
        {{ $seoSettings->first()->title ?? 'نانو شيلد - حجز موعد صيانة' }}
    @endif
@endsection

@section('description')
    @if (app()->getLocale() === 'en')
        {{ $seoSettings->first()->meta_description_en ?? 'Book your car maintenance appointment online with Nano Shield' }}
    @else
        {{ $seoSettings->first()->meta_description ?? 'احجز موعد صيانة سيارتك أونلاين مع نانو شيلد' }}
    @endif
@endsection

@section('keywords')
    @if (app()->getLocale() === 'en')
        {{ $seoSettings->first()->meta_keywords_en ?? 'Nano Shield, Maintenance Appointment' }}
    @else
        {{ $seoSettings->first()->meta_keywords ?? 'نانو شيلد, حجز موعد صيانة' }}
    @endif
@endsection

@section('css')
    <style>
    
        label {
            display: none;
        }
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
        .div-body {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 80%;
            margin: auto;
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
        .header h3 {
            color: #333;
            margin: 20px 0;
            font-size: 26px;
            text-align: center;
            border-bottom: 2px solid #e27723;
            padding-bottom: 5px;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="time"],
        input[type="file"],
        select,
        textarea {
            padding: 12px;
            font-size: 14px;
            border-radius: 6px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }
        input:focus, textarea:focus, select:focus {
            border-color: #e27723;
            outline: none;
            box-shadow: 0 0 5px rgba(226, 119, 35, 0.3);
        }
        .form-group input[type="submit"] {
            background-color: #e27723;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #c8641e;
        }
        
        @media (max-width: 768px) {
.container {
     width: 100%; 
        }
        }
    </style>
@endsection

@section('content')

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/countact.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white;font-size: 50px">{{ __('messages.maintenance_booking') }}</h1>
            </div>
        </div>
    </div>

    <div class="div-body">
        <div class="container">
            <br><br><br><br><br><br>

            <div class="header">
                <h3>{{ __('messages.fill_form') }}</h3>
            </div>

            <form action="{{ route('appointments') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- اسم العميل -->
                <div class="form-group">
                    <label for="customer_name">{{ __('messages.customer_name') }}</label>
                    <input id="customer_name" type="text" name="customer_name" placeholder="{{ __('messages.placeholder_customer_name') }}" value="{{ old('customer_name') }}" required>
                </div>

                <!-- رقم الجوال -->
                <div class="form-group">
                    <label for="phone">{{ __('messages.phone_number') }}</label>
                    <input id="phone" type="text" name="phone" placeholder="{{ __('messages.placeholder_phone_number') }}" value="{{ old('phone') }}">
                </div>

                <!-- البريد الإلكتروني -->
                <div class="form-group">
                    <label for="email">{{ __('messages.email') }}</label>
                    <input id="email" type="email" name="email" placeholder="{{ __('messages.placeholder_email') }}" value="{{ old('email') }}">
                </div>

                <!-- رقم الفاتورة -->
                <div class="form-group">
                    <label for="invoice_number">{{ __('messages.invoice_number') }}</label>
                    <input id="invoice_number" type="text" name="invoice_number" placeholder="{{ __('messages.placeholder_invoice_number') }}" value="{{ old('invoice_number') }}">
                </div>

                <!-- اختيار الفرع -->
                <div class="form-group">
                    <label for="branch_id">{{ __('messages.select_branch') }}</label>
                    <select id="branch_id" name="branch_id" required>
                        <option value="">{{ __('messages.select_branch') }}*</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                                {{ $branch->branch_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- التاريخ -->
                <div class="form-group">
                    <label for="appointment_date">{{ __('messages.appointment_date') }}</label>
                    <input id="appointment_date" type="date" name="appointment_date" value="{{ old('appointment_date') }}" required>
                </div>

                <!-- المعاد -->
                <div class="form-group">
                    <label for="appointment_time">{{ __('messages.appointment_time') }}</label>
<input id="appointment_time"
       type="time"
       name="appointment_time"
       min="12:00"
       max="21:00"
       value="{{ old('appointment_time') }}"
       required>

                </div>

                <!-- صورة -->
                <div class="form-group">
                    <label for="image">{{ __('messages.attachments') }}</label>
                    <input id="image" type="file" name="image" accept="image/*">
                </div>

                <!-- رسالة -->
                <div class="form-group">
                    <label for="message">{{ __('messages.message') }}</label>
                    <textarea id="message" name="message" placeholder="{{ __('messages.placeholder_message') }}">{{ old('message') }}</textarea>
                </div>

                <!-- زر -->
                <div class="template-align-center template-clear-fix template-margin-top-1">
                    <span class="template-state-block">
                        <input type="submit" value="{{ __('messages.submit_booking') }}" class="template-component-button">
                    </span>
                </div>
            </form>
        </div>
    </div>
                    <br><br><br><br><br><br><br>

@endsection

@section('js')
@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const dateInput = document.getElementById('appointment_date');
    const timeInput = document.getElementById('appointment_time');

    // منع الحجز يوم الجمعة
    dateInput.addEventListener('change', function () {
        const selectedDate = new Date(this.value);
        if (selectedDate.getDay() === 5) { // Friday
            alert('❌ لا يمكن الحجز يوم الجمعة');
            this.value = '';
        }
    });

    // التحقق من الوقت
    timeInput.addEventListener('change', function () {
        const time = this.value;

        if (time < '12:00' || time > '21:00') {
            alert('⏰ مواعيد الحجز المتاحة من 12 ظهرًا إلى 9 مساءً فقط');
            this.value = '';
        }
    });

});
</script>
@endsection

@endsection
