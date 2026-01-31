@extends('layouts.pages.master')

@section('css')
<style>
    .success-wrapper {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fdfdfd;
    }

    .success-box {
        background: #fff;
        padding: 40px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,.08);
        max-width: 450px;
        width: 100%;
    }

    .success-icon {
        font-size: 70px;
        color: #28a745;
        margin-bottom: 15px;
    }

    .success-title {
        font-size: 26px;
        font-weight: bold;
        color: #28a745;
        margin-bottom: 15px;
    }

    .success-message {
        font-size: 17px;
        color: #555;
        margin-bottom: 30px;
        line-height: 1.7;
    }

    .btn-home {
        display: inline-block;
        padding: 12px 30px;
        background: #ff7a00;
        color: #fff;
        text-decoration: none;
        border-radius: 6px;
        transition: .3s;
        font-weight: 600;
    }

    .btn-home:hover {
        background: #e96c00;
        color: #fff;
    }
</style>
@endsection

@section('content')
@php
    $isArabic = app()->getLocale() === 'ar';
@endphp

<div class="success-wrapper" dir="{{ $isArabic ? 'rtl' : 'ltr' }}">
    <div class="success-box">

        <div class="success-icon">✔</div>

        <div class="success-title">
            {{ $isArabic ? 'تم طلب الخدمة بنجاح' : 'Service Requested Successfully' }}
        </div>

        <div class="success-message">
            {{ $isArabic 
                ? 'شكرًا لاختيارك خدماتنا، تم استلام طلبك بنجاح وسيتم التواصل معك في أقرب وقت ممكن.' 
                : 'Thank you for choosing our service. Your request has been received and we will contact you shortly.' 
            }}
        </div>
        <div class="success-message" style="margin-bottom: 20px;">
    {{ $isArabic
        ? '💡 ملاحظة: عند إنشاء حساب يمكنك متابعة حالة طلبك بسهولة، بالإضافة إلى الاستفادة من نظام نقاط الولاء والحصول على خصومات وعروض حصرية.'
        : '💡 Note: By creating an account, you will be able to track your order status and benefit from our loyalty points system with exclusive discounts and offers.'
    }}
</div>
<a href="{{ route('register') }}" class="btn-home" style="background:#28a745; margin-bottom:15px;">
    {{ $isArabic ? 'إنشاء حساب جديد' : 'Create an Account' }}
</a>
        <a href="{{ url('/') }}" class="btn-home">
            {{ $isArabic ? 'الرجوع إلى الصفحة الرئيسية' : 'Back to Home' }}
        </a>

    </div>
</div>
@endsection
