@extends('layouts.pages.master')

@section('css')
<style>
    .error-wrapper {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fdfdfd;
    }

    .error-box {
        background: #fff;
        padding: 40px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,.08);
        max-width: 420px;
        width: 100%;
    }

    .error-code {
        font-size: 80px;
        font-weight: bold;
        color: #ff7a00; /* البرتقالي الأساسي */
        margin-bottom: 10px;
    }

    .error-message {
        font-size: 18px;
        color: #555;
        margin-bottom: 25px;
        line-height: 1.6;
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

    $homeText = $isArabic ? 'الرجوع إلى الصفحة الرئيسية' : 'Back to Home';
    $defaultTitle = $isArabic ? 'حدث خطأ' : 'Error Occurred';
@endphp

<div class="error-wrapper" dir="{{ $isArabic ? 'rtl' : 'ltr' }}">
    <div class="error-box">
        <div class="error-code">{{ $code }}</div>

        <div class="error-message">
            {{ $message ?? $defaultTitle }}
        </div>

        <a href="{{ url('/') }}" class="btn-home">
            {{ $homeText }}
        </a>
    </div>
</div>
@endsection
