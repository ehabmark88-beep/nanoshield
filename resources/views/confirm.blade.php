@extends('layouts.pages.master')

{{--@section('title')--}}
{{--@if (app()->getLocale() === 'en')--}}
{{--{{ $seoSettings->first()->title_en ?? 'Nano Shield' }}--}}
{{--@else--}}
{{--{{ $seoSettings->first()->title ?? 'نانو شيلد' }}--}}
{{--@endif--}}
{{--@endsection--}}

{{--@section('description')--}}
{{--@if (app()->getLocale() === 'en')--}}
{{--{{ $seoSettings->first()->meta_description_en ?? 'Nano Shield' }}--}}
{{--@else--}}
{{--{{ $seoSettings->first()->meta_description ?? 'نانو شيلد' }}--}}
{{--@endif--}}
{{--@endsection--}}

{{--@section('keywords')--}}
{{--@if (app()->getLocale() === 'en')--}}
{{--{{ $seoSettings->first()->meta_keywords_en ?? 'Nano Shield' }}--}}
{{--@else--}}
{{--{{ $seoSettings->first()->meta_keywords ?? 'نانو شيلد' }}--}}
{{--@endif--}}
{{--@endsection--}}


@section('css')
<style>
i.fas.fa-globe {
    display: none;
}
/* تأثير قصير للـ .form-pay عند التركيز (لا يغيّر عناصرك الأساسية) */
.form-pay.highlight-on-focus {
  box-shadow: 0 8px 20px rgba(226,119,35,0.14);
  transform: translateY(-2px);
}
</style>

    <style>
    .loyalty-points{
    background:#fffbea;
    border:1px solid #f6e58d;
    border-radius:12px;
    padding:16px;
    margin:16px 0;
    font-family:inherit; /* يورّث من الموقع */
    }

    .loyalty-head{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:10px;
    flex-wrap:wrap;
    }

    .loyalty-title{
    margin:0;
    font-weight:800;
    font-size:18px;
    color: black; /* رمادي غامق */
    }

    .loyalty-rule{
    margin:0;
    font-size:14px;
    color:#6b7280; /* رمادي */
    }

    .loyalty-row{
    display:flex;
    align-items:flex-end;
    gap:12px;
    flex-wrap:wrap;
    margin-top:12px;
    }

    .loyalty-field{
    flex:1 1 240px;
    min-width:220px;
    }

    .loyalty-label{
    display:block;
    font-weight:600;
    margin-bottom:6px;
    color:#111827;
    }

    .loyalty-input{
    width:100%;
    padding:10px 12px;
    border:1px solid #d1d5db;
    border-radius:10px;
    font-size:16px;
    outline:none;
    transition:border-color .2s, box-shadow .2s;
    background:#fff;
    direction:ltr; /* لإدخال الأرقام بسهولة */
    }
    .loyalty-input:focus{
    border-color:#f59e0b;
    box-shadow:0 0 0 3px rgba(245,158,11,.15);
    }

    .loyalty-hint{
    display:block;
    margin-top:6px;
    color:#6b7280;
    font-size:12px;
    }

    .loyalty-btn{
    padding:10px 16px;
    border:none;
    border-radius:12px;
    background:#f59e0b; /* كهرماني */
    color:#fff;
    font-weight:800;
    cursor:pointer;
    white-space:nowrap;
    transition:transform .05s ease, opacity .2s ease;
    }
    .loyalty-btn:hover{ opacity:.95; }
    .loyalty-btn:active{ transform:scale(.98); }

    .loyalty-summary{
    margin-top:12px;
    display:flex;
    gap:12px;
    flex-wrap:wrap;
    }

    .loyalty-chip{
    background:#fff;
    padding:10px 12px;
    border-radius:10px;
    font-size:14px;
    display:flex;
    align-items:center;
    gap:6px;
    line-height:1.6;
    }

    .loyalty-chip--discount{
    border:1px dashed #f59e0b;
    font-weight:700;
    }

    .loyalty-chip--note{
    border:1px dashed #9ca3af;
    color:#374151;
    }

    .chip-label{ font-weight:600; }
    .chip-value{ font-weight:800; }
    .chip-currency{ opacity:.9; }

    /* استجابة الشاشات الصغيرة */
    @media (max-width:480px){
    .loyalty-title{ font-size:16px; }
    .loyalty-rule{ font-size:13px; }
    .loyalty-btn{ width:100%; }
    }
    /* ===== /Loyalty Points (CSS only) ===== */




        .car-type:hover, button.select-plan:hover {
            background-color: #ffa864;
            cursor: pointer; /* لإظهار يد عند المرور */
        }


        li.template-layout-column-left.template-margin-bottom-reset.template-responsive-column-a, li.template-layout-column-left.template-margin-bottom-reset.template-responsive-column-a {
            margin: 10px;
        }

        button#applyDiscount, button#submitBooking {
            BORDER-RADIUS: 10PX;
            PADDING: 6PX;
        }


        .package {
            max-height: 150px;
            height: 150px;
        }

        .template-component-booking-item-header.template-clear-fix {
            margin-top: 15px !important;
        }

        .car-type {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .bb {
            padding: 2px;
            margin: 2px;
        }

        button.bb1 {
            background-color: #e47823;
            color: wheat;
            font-family: 'Cairo';
            font-size: larger;
            border: 4px solid;
            border-radius: 9px;
            padding: 5px 70px;
            cursor: pointer;
            transition: 0.3s;
        }

        .bb1:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .custom-slide-box {
            display: none;
        }

        .custom-slide-box.visible {
            display: block;
        }

        #booking-form-governorate > option:nth-child(5) {
            display: none;
        }

        .template-component-booking-item-header h3, .time-s {
            direction: rtl !important;
        }

        .packages-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            width: 80%;
        }

        .packages-header div {
            width: 24%;
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
        }

        .packages-header div.selected {
            background-color: #e27723;
        }

        .package-details {
            display: flex;
            justify-content: space-between;
        }

        .package-detail {
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
            width: 32%;
            position: relative;
        }

        .package-detail img {
            width: 100%;
            border-radius: 5px;
        }

        .package-detail .price {
            background-color: #ff0000;
            padding: 5px;
            border-radius: 5px;
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .package-detail .price span {
            display: block;
        }

        .package-detail .price .currency {
            font-size: 12px;
        }

        .package-detail .price .amount {
            font-size: 18px;
        }

        .package-detail .details {
            margin-top: 10px;
        }

        .package-detail .details .time {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .package-detail .details .more {
            background-color: #e47823;
            padding: 5px;
            border-radius: 5px;
            text-decoration: none;
            color: #000;
        }

        /* إعدادات عامة للعناصر */
        .packages-header {
            display: flex;
            justify-content: space-between;
            gap: 2px;
        }

        .package {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        /* تخصيص الأيقونات */
        .package i {
            font-size: 24px;
            margin-bottom: 10px;
            transition: color 0.3s ease-in-out;
        }

        .package:hover {
            opacity: .9;
            transform: scale(1.05);
        }

        .package.selected {
            background-color: #e27723 !important;
            transform: scale(1.05) !important;
            border-color: #e27723;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        .package {
            transition: transform 0.2s ease, background-color 0.2s ease !important;
        }

        .package {
            transition: all 0.3s ease;
        }


        /* تغيير لون الأيقونة والنص في الحزمة المختارة */
        .package.selected i {
            color: #ffffff;
        }

        .package.selected p {
            color: #ffffff;
        }

        /* تخصيص النص */
        .package p {
            font-size: 14px;
            font-weight: bold;
            margin: 0;
        }

        .first-step {
            position: relative;
            width: 100%;
            height: 1000px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: url('https://i.ibb.co/XxPNcFB/1230.png') no-repeat center center/cover;
        }

        .car-types {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            flex-direction: row-reverse;
        }

        .car-types2 {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }


        .step {
            font-size: 18px;
            color: black;
        }

        .title {
            color: #e27723;
            font-weight: 900;
            font-size: 18px;
            background: #00000061;
            border-radius: 19px;
            padding: 5px;
            margin-bottom: 5px;
        }

        .car-type {
            font-size: 22px;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 20px;
            transition: background-color 0.3s;
            color: white;
            font-weight: 800;
        }

        .car-type.active {
            background-color: #e47823;
            color: #fff;
        }

        .car-images {
            position: relative;
            width: 80%;
            max-width: 800px;
            height: 400px;
        }

        .car-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .car-image.active {
            opacity: 1;
        }

        .navigation {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .nav-button {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 25px;
        }

        .nav-button:hover {
            background-color: rgba(255, 255, 255, 0.5);
        }

        .nav-button i {
            color: #fff;
            font-size: 20px;
        }

        .package {
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .package.selected {
            background-color: #e47823;
            transform: scale(1.1);
        }

        .add-ser {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #333;
        }

        .ser-head {
            text-align: center;
            margin-bottom: 40px;
        }

        .ser-head h2 {
            font-size: 36px;
            margin: 10px 0;
        }

        .ser-head p {
            font-size: 16px;
            color: #ccc;
        }

        .services {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .sec-of {
            width: 100%;
            background-color: #333;
        }

        .service {
            background-color: #fff;
            color: #000;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            width: 30%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .service img {
            width: 50px;
            height: 50px;
            margin: auto;
        }

        .service h3 {
            font-size: 20px;
            margin: 10px 0;
        }

        .service p {
            font-size: 14px;
            color: #666;
        }

        .service .details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .service .details span {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #e47823;
        }

        .service .details span i {
            margin-right: 5px;
        }

        .service .add-button {
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #e27723;
            color: #fff;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
        }

        .service.selected {
            border: 7px solid #e47823; /* اللون المحدد للخدمة المختارة */
        }

        /* تنسيق البطاقة */
        .pricing-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: background-color 0.3s ease, border 0.3s ease;
            border: 2px solid transparent;
        }

        /* تأثير hover لتمويه الخلفية */
        .pricing-card:hover {
            background-color: #f9f9f9;
        }


        /* تنسيق الزر */
        .select-plan {
            background-color: #e27723;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .select-plan:hover {
            background-color: #d40000; /* زر أكثر قتامة عند التمرير */
        }


        .pricing-table {
            display: flex;
            gap: 20px;
            width: 95%;
            margin: auto;
        }

        .pricing-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 100%;
            position: relative;
        }

        .pricing-card.featured {
            background: url('https://i.ibb.co/34HftbK/image.png') no-repeat center center;
            background-size: cover;
            color: #fff;
            opacity: 0.3; /* تقليل الشفافية لجعل الخلفية باهتة */
            z-index: -1; /* إبقاء الخلفية تحت المحتوى */

        }


        .pricing-card h3 {
            font-size: 18px;
            margin: 0 0 10px;
            color: #e27723;
        }

        .pricing-card h3.featured {
            color: #fff;
        }

        .price {
            font-size: 36px;
            margin: 10px 0;
        }

        .price sup {
            font-size: 18px;
            top: -10px;
        }

        .features {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            text-align: left;
        }

        .features li {
            margin: 10px 0;
            direction: rtl;
            text-align: right;
        }

        .features li i {
            margin-left: 10px;
            margin-right: 10px;
        }

        .time-s {
            margin: 5px;
        }

        .time {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0;
        }

        .time i {
            margin-right: 5px;
        }

        .select-plan {
            background: #e27723;
            border: none;
            border-radius: 50px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            text-transform: uppercase;
            transition: background 0.3s;
        }

        .select-plan:hover {
            background: #e47823;
        }

        .features li {
            font-size: 12px;
        }

        /* تنسيق العنوان */
        .template-component-booking-item-header h3 {
            font-size: 15px;
            color: #e27723;
            text-align: center;
            margin-bottom: 10px;
        }

        .template-component-booking-item-header h5 {
            font-size: 18px;
            color: #777;
            text-align: center;
            margin-bottom: 30px;
        }

        /* تنسيق الحقول */
        .template-component-form-field {
            margin-bottom: 20px;
            position: relative;
        }

        /* تنسيق عنوان الحقل */
        .template-component-form-field label {
            font-size: 22px;
            color: white;
            margin-bottom: 5px;
            display: block;
            background-color: #333;
            padding: 10px;
            border-radius: 20px;
            font-weight: 800;
        }

        li.template-layout-column-left.template-margin-bottom-reset {
            margin: 4px;
        }

        /* تنسيق القوائم المنسدلة */
        .stylish-select select {
            width: 100%;
            padding: 10px;
            font-size: 19px;
            color: #e47823;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            font-weight: 800;
        }

        /* إضافة سهم مخصص للقوائم المنسدلة */
        .stylish-select {
            position: relative;
            display: contents;

        }

        .stylish-select::after {
            content: "\25BC"; /* سهم لأسفل */
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            color: #666;
            pointer-events: none;
        }

        /* تمييز القائمة المنسدلة عند التركيز */
        .stylish-select select:focus {
            outline: none;
            border-color: #e47823;
            box-shadow: 0 0 5px rgba(228, 120, 35, 0.3);
        }

        /* تنسيق الأعمدة */
        .template-layout-50x50 {
            display: flex;
            width: 77%;
            margin: auto;
        }


        /* تكوين الهوامش */
        .template-layout-column-left {
            flex: 1;
        }


        .sec-time {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .sec-step {
            color: #d9534f;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .sec-title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .calendar {
            display: flex;
            justify-content: space-between;
        }

        .day {
            width: 13%;
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 10px;
        }

        .day.active {
            background-color: #fff;
            border: 2px solid #28a745;
        }

        .day.closed {
            color: #d9534f;
        }

        .day-header {
            font-size: 30px;
            font-weight: bold;
            margin: 30px;
            display: flex;
            justify-content: center;
        }

        .day-header span {
            display: block;
            font-size: 14px;
            color: #666;
        }

        .time {
            font-size: 16px;
            margin: 10px 0;
            padding: 5px 0;
            border-radius: 20px;
            background-color: #545353;
            color: #ccc;
        }

        .time.active {
            background-color: #e27723;
            color: #fff;
        }

        .time.active i {
            margin-left: 5px;
        }

        .time.disabled {
            background-color: #e0e0e0;
            color: #ccc;
        }

        .last {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            padding-right: 10%;
            padding-left: 10%;

        }

        .summary {
            width: 50%;
        }

        .summary h2 {
            font-size: 24px;
            color: #000;
            text-align: center;
            margin-bottom: 20px;
        }

        .summary .step {
            text-align: center;
            color: #e27723;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .summary .item {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            width: 95%;
        }

        .summary .item.highlight {
            border: 1px solid #e47823;
        }

        .summary .item i {
            font-size: 24px;
            color: #e27723;
            margin-bottom: 10px;
        }

        .summary .item .label {
            color: #e47823;
            font-size: 15px;
            margin-bottom: 5px;
            font-weight: 900;
        }

        .summary .item .value {
            font-size: 18px;
            color: #000;
        }

        .form-last {
            width: 50%;
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            color: #fff;
        }

        .form-last h3 {
            font-size: 18px;
            color: #fff;
            text-align: center;
            margin-bottom: 10px;
        }

        .form-last p {
            font-size: 14px;
            color: #b0b0b0;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-last .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        input#name {
            border-color: #333333;
        }

        .form-last .form-group input,
        .form-last .form-group textarea {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            background-color: white;
        }

        .form-last .form-group textarea {
            width: 100%;
            height: 100px;
        }

        .form-last .form-group input::placeholder,
        .form-last .form-group textarea::placeholder {
            color: #999;
        }

        .form-last .form-group input:focus,
        .form-last .form-group textarea:focus {
            outline: none;
        }

        .form-last .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #e47823;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
            cursor: not-allowed;
        }

        li {
            list-style-type: none;
        }

        .template-component-booking-package-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 أعمدة */
            gap: 5px; /* مسافة بين العناصر */
            width: 80%;
            margin: auto;
        }

        /* نمط أساسي لبعض العناصر */
        .pricing-table {
            display: inline-block;
            margin: 10px;
            border-radius: 5px;
            padding: 15px;
            width: 100%;
        }

        .pricing-card.selected {
            border: 4px solid #e47823;
        }

        .active {
            font-weight: bold;
        }

        body > div.template-header > div.template-header-top > div.template-header-top-menu.template-main > nav:nth-child(1) > div > ul > li:nth-child(10) > a {
            padding: 0 !important;
        }

        /* إعدادات النافذة المنبثقة */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* خلفية مظللة */
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000; /* لجعلها فوق جميع العناصر الأخرى */
            padding-top: 20px;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px; /* زوايا دائرية */
            max-width: 80%;
            width: 90%; /* عرض النسخة الجوال */
            margin-top: 15px;
        }

        .close {
            color: black;
            position: sticky;
            top: 10px;
            right: 15px;
            font-size: 30px;
            cursor: pointer;
        }

        /* إعدادات التصميم للعناصر داخل النافذة */
        .cars-container {
            display: flex;
            flex-wrap: wrap; /* لتجنب التزاحم على الشاشات الصغيرة */
            gap: 15px;
            justify-content: center; /* محاذاة العناصر للوسط */
        }

        .box {
            width: 460px;
            text-align: center; /* محاذاة المحتوى للوسط */
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .box img {
            width: 100%;
            height: auto;
            border-radius: 8px; /* زوايا دائرية للصورة */
            margin: auto !important;
        }

        .car-size {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .car-details {
            color: #666;
            font-weight: normal;
            font-size: 14px;
            margin-top: 5px;
        }

        i.fas.fa-car {
            position: relative;
            top: 17px;
            color: #fff;
        }


        @media (max-width: 768px) {

            .template-layout-50x50 {
                width: 100%;
                padding: 20px;
            }

            .first-step {
                margin-top: 75px;
            }

            .template-layout-50x50 {
                display: block;
            }

            .packages-header {
                display: grid;
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .first-step {
                height: 550px;
                background-size: cover;
            }

            .car-image {
                height: 60%;
            }
        }

        @media (max-width: 400px) {
            .calendar-days .day-name {
                font-size: 12px;
            }
        }
    </style>
    <style>
        @media (max-width: 768px) {
            .wrap{
                flex-wrap: wrap;
            }
            .packages-header div {
                height: 150px !important;
            }

            .packages-header div {
                width: 98%;
            }

            .template-component-booking-package-list {
                display: grid;
                grid-template-columns: repeat(1, 1fr); /* 4 أعمدة */
                gap: 5px; /* مسافة بين العناصر */
                width: 80%;
                margin: auto;
            }

            .packages-header {
                width: 98% !important;
            }

            .add-ser {
                width: 95% !important;
            }

            .service {
                width: 49% !important;
            }

            .last {
                width: 100%;
                display: block;
            }

            .summary {
                width: 100% !important;
            }

            .form-last {
                width: 100%;
            }

            #calendar {
                display: grid !important;
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
                width: 85%;

            }

            .day {
                width: 100% !important;
            }

            .stylish-select select {
                font-size: 18px;
            }
        }

        /* الحاوية */
        .car-table-container {
            max-width: 90%;
            margin: 20px auto;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* تنسيق الجدول */
        .car-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-family: Arial, sans-serif;
            color: #333;
        }

        /* رأس الجدول */
        .car-table th {
            background-color: #e27723;
            color: #fff;
            padding: 2px;
            font-size: 16px;
            border-radius: 5px 5px 0 0;
            text-align: center;
        }

        /* بيانات الجدول */
        .car-table td {
            padding: 2px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            text-align: center;
        }

        /* تغيير لون الصفوف بالتناوب */
        .car-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* تأثير على الصف عند المرور عليه */
        .car-table tr:hover {
            background-color: #f0e0c9;
        }

        /* تصميم مخصص للموبايل */
        @media (max-width: 768px) {
            .car-image {
                height: 60% !important;
            }

            .first-step {
                height: 500px !important;
            }

            .car-table {
                font-size: 14px;
            }

            .car-table th, .car-table td {
                padding: 8px;
            }

            .dis_d {
                display: none;
            }
        }

        /* تصميم مخصص للتابلت */
        @media (max-width: 1024px) {
            .car-table {
                font-size: 15px;
            }

            .car-table th, .car-table td {
                padding: 1px;
            }
        }

        body > div.template-header > div.last > div.form-last > form > div.form-group.payment-method > label:nth-child(2) > div > img {
            width: 65px;
        }

        .payment-method {
            display: block;
            color: #ffffff;
            font-size: larger;
            width: 100%;
            height: 100%;
            padding: 20px;
            border: 1px #e27723 solid;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s;
        }

        .form-last {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #ffffff;
        }

        .form-last:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #ff7300;
        }

        input[type="text"], input[type="email"], input[type="tel"] {
            border-color: #444444 !important;
            box-shadow: 0 0 5px #d3d1d1;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus {
            border-color: #ff7300;
            box-shadow: 0 0 5px rgba(255, 115, 0, 0.5);
        }

        input[type="checkbox"] {
            accent-color: #ff7300;
            width: 20px;
            height: 20px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        input[type="checkbox"]:hover {
            transform: scale(1.1);
        }

        input[type="radio"] {
            margin-right: 5px;
            accent-color: #ff7300;
            cursor: pointer;
        }

        .payment-icons img {
            margin-left: 10px;
            vertical-align: middle;
            width: 80px;
            height: 100%;
            transition: transform 0.3s;
        }

        body > div.template-header > div.last > div.form-last > form > div.form-group.payment-method > div:nth-child(2) > div > img {
            height: 62px !important;
        }

        .payment-icons img:hover {
            transform: scale(1.1);
        }

        .additional-options {
            display: none; /* مخفية افتراضيًا */
            padding: 10px;
            border: 1px dashed #ff7300;
            border-radius: 5px;
            background-color: #fff7f0;
        }

        .final-price input {
            background-color: #fff3e6;
            color: #ff7300;
            border: none;
            font-weight: bold;
            text-align: center;
        }

        .submit-btn {
            padding: 10px 20px;
            background-color: #ff7300;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .submit-btn:hover {
            background-color: #e66400;
            transform: translateY(-2px);
        }

        /* تنسيقات وسيلة الدفع */
        .payment-method {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .form-pay {
            display: flex;
            align-items: center;
            flex: 1 1 calc(33.333% - 15px);
            justify-content: center;
        }

        .form-pay label {
            margin-left: 5px;
            color: #ff7300;
        }

        /* استجابة للموبايل */
        @media (max-width: 768px) {
            .form-last {
                padding: 15px;
            }

            .payment-method {
                flex-direction: column;
                gap: 10px;
            }

            .form-pay {
                flex: 1 1 100%;
            }

            .payment-icons img {
                width: 70px;
            }

            body > div.template-header > div.last > div.form-last > form > div.form-group.payment-method > label.form-pay.selected > div > img {
                width: 50px;
            }
        }

        input[type="text"], input[type="email"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #333333;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s, box-shadow 0.3s;

        }

        .option-item {
            display: block !important;
            align-items: center;
            justify-content: space-between;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            flex: 1 1 30%;
            box-sizing: border-box;
            transition: opacity 0.3s ease;
            border: 1px solid transparent; /* افتراضي */

            width: 100%;
        }

        .additional-options.fade-in {
            background-color: rgb(255 219 196);
        }

        .option-item.selected {
            border: 3px solid #e47823;
            background-color: #e6f0ff;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .option-item:hover {
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            opacity: .7;
        }

        .option-label {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .option-input {
            accent-color: #007BFF;
            margin-right: 10px;
            cursor: pointer;
        }

        .option-text {
            display: flex;
            flex-direction: column;
            color: #555;
            font-size: 13px;
        }

        .option-price {
            font-weight: bold;
            margin-top: 5px;
            color: #e27723;
        }

        .option-input {
            display: none; /* إخفاء الراديو */
        }


        .additional-options {
            display: none;
            margin-top: 20px;
            background-color: #444444;
            padding: 15px;
            border-radius: 5px;
        }

        /* تأثير الأنيماشن */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        /* الأنيماشن */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* الأنميشن التلاشي */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        .fade-out {
            animation: fadeOut 0.5s ease-in-out;
        }

        /* الأنيماشن الخاص بإظهار التلاشي */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        .form-group.payment-method {
        }

        .form-group {
            display: flex;
            flex-direction: column;
            padding: 10px;
            box-sizing: border-box;
        }

        .payment-method {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .form-pay {
            display: flex;
            align-items: center;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .form-pay:hover {
            background-color: #ececec;
        }

        .payment-icons {
            margin-left: 15px;
        }

        .payment-icon {
            width: 60px;
            height: 40px;
            object-fit: cover;
        }

        .form-pay input[type="radio"] {
            display: none; /* إخفاء علامة الراديو */
        }

        .form-pay label {
            cursor: pointer;
            font-size: 16px;
            color: #333;
            transition: color 0.3s ease;
        }

        .form-pay label:hover {
            color: #e27723;
        }

        .form-pay {
            border: 2px solid transparent;
            padding: 10px;
            border-radius: 5px;
            transition: border 0.3s ease;
        }

        .form-pay input[type="radio"]:checked + label {
            color: #e27723;
            font-weight: bold;
        }

        /* هافارات (Tooltips) عند التمرير */
        .form-pay label::after {
            content: attr(data-tooltip);
            visibility: hidden;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 4px;
            padding: 6px;
            position: absolute;
            z-index: 1;
            bottom: 100%; /* موضع ظهور الهافارات */
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .form-pay:hover label::after {
            visibility: visible;
            opacity: 1;
        }

        button#applyDiscount, button#submitBooking {
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        button#applyDiscount:hover, button#submitBooking:hover {
            background-color: #cf6a1d;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .summary .item.highlight {
            height: 190px;
        }

        .form-pay {
            border: 2px solid transparent; /* الإطار الافتراضي */
            padding: 10px; /* إضافة مسافة داخلية لضمان مظهر جميل */
            border-radius: 5px; /* إضافة زوايا مستديرة */
            transition: border 0.3s ease; /* تأثير انتقال ناعم */
        }

        .form-pay.selected {
            border-color: #e27723; /* إطار برتقالي عند التحديد */
        }

        button#applyDiscount, button#submitBooking {
            background-color: #ff7e18;
            color: white;
            font-size: medium;
            border: navajowhite;
        }
    </style>
@endsection

@section('content')
    @php
    $direction = (App::getLocale() == 'en') ? 'ltr' : 'rtl';
    $textAlign = (App::getLocale() == 'en') ? 'left' : 'right';
    $reverse = (App::getLocale() == 'en') ? 'row-reverse' : 'row';
    @endphp

    <div  class="last" style="direction: {{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }} !important;gap: 10px">
        <div class="form-last" >
            <form method="POST" id="bookingForm" action="{{route('wash-bookings.store')}}">
                @csrf
                <input type="hidden" name="car_id" value="{{ $data['car_id'] }}" id="car_id">
                <input type="hidden" name="additional_services" value="{{ $data['additional_services'] }}" id="services_additional">
                <input  type="hidden" name="packages" value="{{ $data['packages'] }}" id="basic_service">
                <input type="hidden" name="branch_id" value="{{ $data['branch_id'] }}" id="id_branch">
                <input type="hidden" name="date" value="{{ $data['date'] }}" id="data">
                <input type="hidden" name="time" value="{{ $data['time'] }}" id="time">
                <input type="hidden" name="duration" value="{{ $data['duration'] }}" id="duration">
                <input type="hidden" name="total_price" value="{{ $data['total_price'] }}" id="final_price">
                <input type="hidden" name="payment_method" value="{{ $data['payment_method'] }}" id="payment_method">
                <input type="hidden" name="coupon_id" value="{{ $data['coupon_id'] }}" id="coupon_id">
                <input type="hidden" name="offer"  value="{{ $data['offer'] }}" id="offer">
                <input type="hidden" name="flatbed_id" value="{{ $data['flatbed_id'] }}" id="flatbed_id">
                <input type="hidden" id="services_total" value="{{ $data['total_price'] ?? 0 }}">
                <input type="hidden" id="flatbed_total" value="0">
                <input type="hidden" id="coupon_discount" value="0">
                <input type="hidden" id="final_total_input" name="total_price" value="{{ $data['total_price'] ?? 0 }}">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <h5> هذة الحقول فارغة</h5>
                        @foreach ($errors->all() as $error)
                        <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div style="display: flex; width: 100%" >
                    <!-- الاسم -->
                    <div class="form-group" style="width:50%;">
                        <label for="name">{{ __('messages.full_name') }}</label>
                        <input style="width: 100%" type="text" id="name" name="name"
                               placeholder="{{ __('messages.full_name') }}"
                               value="{{ old('name', isset($userData) ? $userData['name'] : '') }}"
                               required>
                    </div>
                    <!-- الايميل -->
                    <div class="form-group" style="width:50%;">
                        <label for="email">{{ __('messages.email') }}</label>
                        <input style="width: 100%" type="email" id="email" name="email"
                               placeholder="{{ __('messages.email') }}"
                               value="{{ old('email', isset($userData) ? $userData['email'] : '') }}"
                               required>
                    </div>
                </div>
                <div style="display: flex;width: 100%">
                    <!-- رقم الجوال -->
                    <div class="form-group" style="width:50%;">
                        <label for="phone">{{ __('messages.phone') }}</label>
                        <input style="width: 100%" type="tel" id="phone" name="phone_number"
                               placeholder="{{ __('messages.phone') }}"
                               value="{{ old('phone_number', isset($userData) ? $userData['phone_number'] : '') }}"
                               required>
                    </div>

                    <!-- خيار فتح الخيارات الإضافية -->
                    <div class="form-group" style="width:50%;">
                        <label for="additionalOptionsCheckbox">{{ __('messages.additional_options') }}</label>
                        <input style="width: 100%" type="checkbox" id="additionalOptionsCheckbox" name="additionalOptions">
                    </div>
                </div>

                <div class="additional-options" style="display: none; flex-wrap: wrap; gap: 20px;">

                    {{-- مجموعة النوع 1 --}}
                    <div class="form-group" data-type="1" style="display: block; width: 100%; padding: 10px; box-sizing: border-box;">
                        <label class="option-label" style="color:#e27723">{{ __('messages.extra_option') }}</label>
                        <div style="display:flex; flex-wrap:wrap; gap:20px;">
                            @foreach($flatbeds as $flatbed)
                                @if($flatbed->flatbed_type_id == '1')
                                    <div class="option-item"
                                         data-id="{{ $flatbed->id }}"
                                         data-price="{{ $flatbed->price }}"
                                         data-type="{{ $flatbed->flatbed_type_id }}"
                                         style="flex:1 1 30%; background:#f9f9f9; padding:10px; border-radius:5px; box-shadow:0 4px 6px rgba(0,0,0,.1); display:flex; align-items:center; cursor:pointer;">
                                        <label class="option-text" for="flatbed_{{ $flatbed->id }}">
                                            @if(app()->getLocale() == 'en') {{ $flatbed->name }} @else {{ $flatbed->name_ar }} @endif
                                            <span class="option-price" id="flatbed_{{ $flatbed->id }}">
              {{ $flatbed->price }}
                                                {{-- (SVG الريال كما هو) --}}
            </span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    {{-- مجموعة النوع 2 --}}
                    <div class="form-group" data-type="2" style="display:block; width:100%; padding:10px; box-sizing:border-box;">
                        <label class="option-label" style="color:#e27723">{{ __('messages.extra_option2') }}</label>
                        <div style="display:flex; flex-wrap:wrap; gap:20px;">
                            @foreach($flatbeds as $flatbed)
                                @if($flatbed->flatbed_type_id == '2')
                                    <div class="option-item"
                                         data-id="{{ $flatbed->id }}"
                                         data-price="{{ $flatbed->price }}"
                                         data-type="{{ $flatbed->flatbed_type_id }}"
                                         style="flex:1 1 30%; background:#f9f9f9; padding:10px; border-radius:5px; box-shadow:0 4px 6px rgba(0,0,0,.1); display:flex; align-items:center; cursor:pointer;">
                                        <label class="option-text" for="flatbed_{{ $flatbed->id }}">
                                            @if(app()->getLocale() == 'en') {{ $flatbed->name }} @else {{ $flatbed->name_ar }} @endif
                                            <span class="option-price" id="flatbed_{{ $flatbed->id }}">
              {{ $flatbed->price }}
                                                {{-- (SVG الريال كما هو) --}}
            </span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

   <section class="loyalty-points" dir="rtl" aria-labelledby="loyalty-title">
  <div class="loyalty-head">
    <h3 id="loyalty-title" class="loyalty-title" style="color:black;">
      @if(app()->getLocale() == 'en')
        ⭐ Loyalty Points
      @else
        ⭐ نقاط الولاء
      @endif
    </h3>
  </div>

  @auth
    {{-- لو المستخدم مسجّل دخول --}}
    <p class="loyalty-rule">
      @if(app()->getLocale() == 'en')
        You currently have <strong>{{ $availablePoints }}</strong> points available.
        <br>
        Every <strong>1000</strong> points = <strong>100</strong> SAR discount
      @else
        لديك حالياً <strong>{{ $availablePoints }}</strong> نقطة متاحة.
        <br>
        كل <strong>1000</strong> نقطة = خصم <strong>100</strong> ريال
      @endif
    </p>

    <div class="loyalty-row">
      <div class="loyalty-field">
        <label for="loyalty_points_input" class="loyalty-label">
          @if(app()->getLocale() == 'en')
            Enter the number of points to use
          @else
            أدخل عدد النقاط المراد استخدامها
          @endif
        </label>
                        <input  type="hidden" name="packages" value="{{ $data['packages'] }}" id="basic_service">

        <input
          type="number"
          id="loyalty_points_input"
          class="loyalty-input"
          inputmode="numeric"
          dir="ltr"
          min="1000"
          max="{{ $availablePoints }}"
          step="1000"
          placeholder="@if(app()->getLocale() == 'en') Nearest multiple of 1000 @else أقرب مضاعفات 1000 @endif">
        <small class="loyalty-hint">
          @if(app()->getLocale() == 'en')
            Every 1000 points will be converted into 100 SAR discount (rounded down).
          @else
            سيتم تحويل كل 1000 نقطة إلى 100 ريال خصم (يتم التقريب لأسفل).
          @endif
        </small>
      </div>

      <button id="apply_loyalty_btn" type="button" class="loyalty-btn">
        @if(app()->getLocale() == 'en')
          Apply Discount
        @else
          تطبيق الخصم
        @endif
      </button>
    </div>

    <div id="loyalty_summary" class="loyalty-summary" role="status" aria-live="polite">
      <div class="loyalty-chip loyalty-chip--discount">
        <span class="chip-label" style="color:black;">
          @if(app()->getLocale() == 'en') Points Discount: @else خصم النقاط: @endif
        </span>
        <span id="loyalty-discount-amount" class="chip-value" style="color:black;">0.00</span>
        <span class="chip-currency" style="color:black;">
          @if(app()->getLocale() == 'en') SAR @else ريال @endif
        </span>
      </div>
      <div class="loyalty-chip loyalty-chip--note">
        @if(app()->getLocale() == 'en')
          The discount value will be deducted from the final displayed price.
        @else
          سيتم خصم قيمة النقاط من السعر النهائي المعروض أدناه.
        @endif
      </div>
    </div>
  @else
    {{-- لو مفيش تسجيل دخول --}}
    <p class="loyalty-rule">
      <a href="{{ route('login') }}" style="color:#e47823; font-weight:bold;">
        @if(app()->getLocale() == 'en') Login @else سجّل الدخول @endif
      </a>
      @if(app()->getLocale() == 'en')
        to view and use your points for discounts.
      @else
        ليتم عرض نقاطك واستخدامها في الخصم.
      @endif
    </p>
  @endauth
</section>


                <div style="display: flex; width: 100%; gap: 20px;">
                    <!-- كود الخصم -->
                    <div class="form-group" style="width: 50%;">
                        <label for="discountCode">{{ __('messages.discount_code') }}</label>
                        <input style="width: 100% " type="text" id="discountCode" name="discountCode" placeholder="{{ __('messages.discount_code') }}">
                        <button class="button.select-plan" id="applyDiscount">{{ __('messages.apply_dis') }}</button>
                    </div>
                    <div class="form-group" style="width: 50%;">
                        <label for="finalPrice">{{ __('messages.price3') }}</label>
                        <h3 style="color: black" id="finalPrice"></h3>
                    </div>
                </div>
                <!-- اختيار وسيلة الدفع -->
                <label>{{ __('messages.payment_method') }}</label>
                <div class="form-group payment-method" style="display: flex; gap: 20px; flex-wrap: wrap;">
                    <label class="form-pay">
                        <input type="radio" id="VISA" name="payment_method1" value="VISA">
                        <span>{{ __('messages.credit_card') }}</span>
                        <div class="payment-icons">
                            <img src="{{ asset('asset/media/payment(3).png') }}" alt="MasterCard Logo" class="payment-icon" width="100px" height="40px">
                        </div>
                    </label>
                    <label class="form-pay">
                        <input type="radio" id="MASTER" name="payment_method1" value="MASTER" style=" width: 65px !important;" width="65px">
                        <span>{{ __('messages.master') }}</span>
                        <div class="payment-icons">
                            <img src="{{ asset('asset/media/payment(2).png') }}" alt="MasterCard Logo" class="payment-icon" width="100px" height="40px">
                        </div>
                    </label>

                    <label class="form-pay">
                        <input type="radio" id="MADA" name="payment_method1" value="MADA">
                        <span>{{ __('messages.mada') }}</span>
                        <div class="payment-icons">
                            <img src="{{ asset('asset/media/payment(1).png') }}" alt="MasterCard Logo" class="payment-icon" width="100px" height="40px">
                        </div>
                    </label>

                    <label class="form-pay">
                        <input type="radio" id="payBranch" name="payment_method1" value="payBranch">
                        <span>{{ __('messages.pay_branch') }}</span>
                        <div class="payment-icons">
                            <img src="{{ asset('asset/media/10791041.png') }}" alt="MasterCard Logo" class="payment-icon" style="width: 55px !important;">
                        </div>
                    </label>
                </div>
                <button id="submitBooking">{{ __('messages.send') }}</button>
            </form>
        </div>
        <div class="summary" >
    <span style="color: #e47823;">
        4/4
    </span>
            <h2>{{ __('messages.confirmation_and_summary') }}</h2>
            <div style="display: grid; grid-template-columns: repeat(2,minmax(0,1fr));">
                <div class="item highlight">
                    <i class="fas fa-car" style="color: #e27723 !important;"></i>
                    <div class="label">{{ __('messages.car_size') }}</div>
                    <div class="value" id="car-size">
                        @if(app()->getLocale() == 'en') {{$car->size}} @else  {{$car->size_ar}} @endif
                    </div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-tint"></i>
                    <div class="label">{{ __('messages.selected_services') }}</div>
                    <div class="value" id="selected-services">
                        @foreach($packages as $pkg)
                            <li>
                                @if(app()->getLocale() == 'en') {{$pkg->name_en}} @else  {{$pkg->name}} @endif
                            </li>
                            @endforeach</ul>
                    </div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="label">{{ __('messages.area') }}</div>
                    <div class="value" id="selected-governorate">
                        @if(app()->getLocale() == 'en')
                            {{ $governorate->name ?? '' }}
                        @else
                            {{ $governorate->name_ar ?? '' }}
                        @endif
                    </div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-building"></i>
                    <div class="label">{{ __('messages.branch') }}</div>
                    <div class="value" id="selected-branch">
                        @if(app()->getLocale() == 'en') {{$branch->branch_name}} @else  {{$branch->branch_name_ar}} @endif
                    </div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="label">{{ __('messages.booking_date') }}</div>
                    <div class="value" id="booking-date">{{ $data['date'] ?? __('messages.select_date') }}</div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-clock"></i>
                    <div class="label">{{ __('messages.booking_time') }}</div>
                    <div class="value" id="booking-time">{{ $data['time'] ?? __('messages.select_time') }}</div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-history"></i>
                    <div class="label">{{ __('messages.total_duration') }}</div>
                    @php
                        $isAr = app()->getLocale() === 'ar';
                        $dur  = (int) ($data['duration'] ?? 0); // تأكد أنه رقم صحيح
                        // عربي: "ساعة" إذا كان 1 أو >=10 ، و"ساعات" لو بين 2 و9
                        $unit = $isAr
                            ? ($dur === 1 ? 'ساعة' : ($dur < 10 ? 'ساعات' : 'ساعة'))
                            : 'hours'; // إنجليزي: زي ما طلبت "hours" دائمًا
                    @endphp

                    <div class="value" id="total-duration">
                        {{ $dur }} {{ $unit }}
                    </div>
                </div>
                <div class="item highlight">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 1124.14 1256.39">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #ff7e18;
                                }
                            </style>
                        </defs>
                        <path class="cls-1" d="M699.62,1113.02h0c-20.06,44.48-33.32,92.75-38.4,143.37l424.51-90.24c20.06-44.47,33.31-92.75,38.4-143.37l-424.51,90.24Z"/>
                        <path class="cls-1" d="M1085.73,895.8c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.33v-135.2l292.27-62.11c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.27V66.13c-50.67,28.45-95.67,66.32-132.25,110.99v403.35l-132.25,28.11V0c-50.67,28.44-95.67,66.32-132.25,110.99v525.69l-295.91,62.88c-20.06,44.47-33.33,92.75-38.42,143.37l334.33-71.05v170.26l-358.3,76.14c-20.06,44.47-33.32,92.75-38.4,143.37l375.04-79.7c30.53-6.35,56.77-24.4,73.83-49.24l68.78-101.97v-.02c7.14-10.55,11.3-23.27,11.3-36.97v-149.98l132.25-28.11v270.4l424.53-90.28Z"/>
                    </svg>
                    <div class="label">{{ __('messages.final_price') }}</div>
                    <div class="value" id="total-price" data-base="{{ $data['total_price'] ?? '0.00' }}">
                        {{ $data['total_price'] ?? '0.00' }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="floatingAlert" class="floating-alert">
        <span id="floatingAlertMessage"></span>
        <span class="check-icon">&#10003;</span> <!-- علامة صح -->
        <script>
            fbq('track', 'Purchase', {
                value: {{ session('paid_amount') }},
            currency: 'USD'
            });
        </script>
    </div>
</div>
@endsection


@section('js')
<!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
<script>
// أدوات رقمية
const num = (v, fb=0) => parseFloat(String(v).replace(/[^\d.]/g,'')) || fb;

// مراجع عناصر
const els = {
  totalPriceBox:  () => document.getElementById('total-price'),     // عندك فيه data-base
  finalPriceText: () => document.getElementById('finalPrice'),
  finalPriceInpt: () => document.getElementById('final_price'),      // موجود عندك
  finalTotalInpt: () => document.getElementById('final_total_input'), // هنضيفه فوق
  servicesInpt:   () => document.getElementById('services_total'),    // هنضيفه فوق
  flatbedInpt:    () => document.getElementById('flatbed_total'),     // هنضيفه فوق
  couponCode:     () => document.getElementById('discountCode'),
  couponDiscInpt: () => document.getElementById('coupon_discount'),   // هنضيفه فوق
  couponIdInpt:   () => document.getElementById('coupon_id'),
  loyaltyPts:     () => document.getElementById('loyalty_points_input'),
  loyaltySummary: () => document.getElementById('loyalty_summary'),
  applyLoyaltyBtn:() => document.getElementById('apply_loyalty_btn'),
};

// خدمات (يقرأ من input لو موجود، وإلا من #total-price[data-base] أو نصه)
function getServicesTotal() {
  const inpt = els.servicesInpt();
  if (inpt) {
    return num(inpt.value, NaN) ?? NaN;
  }
  const box = els.totalPriceBox();
  if (!box) return 0;
  const base = box.dataset.base ?? box.textContent;
  return num(base, 0);
}

// سطّاحة (من input مخفي لو موجود، وإلا من العنصر المختار .option-item.selected)
function getFlatbedPrice() {
  const inpt = els.flatbedInpt();
  if (inpt) return num(inpt.value, 0);
  const sel = document.querySelector('.option-item.selected');
  return sel ? num(sel.dataset.price, 0) : 0;
}

// قيمة خصم الكوبون (مبلغ)
function getCouponDiscount() {
  const inpt = els.couponDiscInpt();
  return inpt ? num(inpt.value, 0) : 0;
}

// base_total للولاء = خدمات + سطّاحة − كوبون
function getBaseTotal() {
  const v = getServicesTotal() + getFlatbedPrice() - getCouponDiscount();
  return Math.max(0, v);
}

// خصم الولاء الحالي (ريال)
let loyaltyDiscount = 0;

// النهائي للعرض = خدمات + سطّاحة − كوبون − ولاء
function computeFinal() {
  const v = getServicesTotal() + getFlatbedPrice() - getCouponDiscount() - loyaltyDiscount;
  return Math.max(0, v);
}

// رسم الأرقام + ملء الحقول
function renderTotals() {
  const final = computeFinal();
  const beforeLoyalty = Math.max(0, getServicesTotal() + getFlatbedPrice() - getCouponDiscount());

  if (els.finalPriceText()) els.finalPriceText().textContent = ' ' + final.toFixed(2);
  if (els.finalTotalInpt()) els.finalTotalInpt().value = final.toFixed(2);
  if (els.finalPriceInpt()) els.finalPriceInpt().value = final.toFixed(2);

  // خزّن السعر الكلي النهائي في #offer (بدل ما كان beforeLoyalty)
  const offer = document.getElementById('offer');
  if (offer) {
    offer.value = final.toFixed(2);   // <-- النهائي نفسه
  }

  // حدّث صندوق السعر الكبير ليعرض (الخدمات + السطّاحة) فقط (لو ده المطلوب عندك)
  if (els.totalPriceBox()) {
    els.totalPriceBox().textContent = (getServicesTotal() + getFlatbedPrice()).toFixed(2);
  }
}


function recalculateTotal(){ renderTotals(); }
window.recalculateTotal = recalculateTotal; // لو عايز تستدعيها من كود تاني
window.getBaseTotal     = getBaseTotal;

// تطبيق الكوبون (يحفظ قيمة الخصم فقط في hidden)
async function applyCouponIfExists() {
  const code = (els.couponCode()?.value || '').trim();
  if (!code) {
    if (els.couponDiscInpt()) els.couponDiscInpt().value = '0';
    if (els.couponIdInpt())   els.couponIdInpt().value   = '';
    recalculateTotal();
    return;
  }
  try {
    const res = await $.ajax({
      url: '/api/check-coupon',
      method: 'POST',
      data: { code, _token: '{{ csrf_token() }}' }
    });
    if (res && res.status) {
      const subtotalBeforeLoyalty = getServicesTotal() + getFlatbedPrice();
      let discountAmount = 0;
      if (res.type === 'percent') discountAmount = subtotalBeforeLoyalty * (res.discount/100);
      else if (res.type === 'fixed') discountAmount = res.discount;
      discountAmount = Math.max(0, discountAmount);

      if (els.couponDiscInpt()) els.couponDiscInpt().value = discountAmount.toFixed(2);
      if (els.couponIdInpt())   els.couponIdInpt().value   = res.coupon_id || '';
      recalculateTotal();
    } else {
      alert((res && res.message) ? res.message : 'كود غير صالح');
    }
  } catch(e){
    console.error(e);
    alert('حدث خطأ أثناء التحقق من الكود.');
  }
}
window.applyCouponIfExists = applyCouponIfExists;

// تطبيق نقاط الولاء
// تطبيق نقاط الولاء
async function applyLoyaltyPoints() {
  const points = parseInt(els.loyaltyPts()?.value || '0', 10);
  const base_total = getBaseTotal();

  if (!points || points < 1000) { alert('الحد الأدنى للاستخدام 1000 نقطة.'); return; }
  if (base_total <= 0)         { alert('لا يمكن تطبيق خصم نقاط الولاء على إجمالي صفر.'); return; }

  // NEW: اجلب قيمة الباكدجات المختارة (id أو JSON array)
  const basicServiceEl = document.getElementById('basic_service');
  const packages = basicServiceEl ? basicServiceEl.value : '';

  try {
    const res = await fetch('/api/loyalty/apply-consume', {
      method: 'POST',
      credentials: 'same-origin',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'X-Requested-With': 'XMLHttpRequest'
      },
      body: JSON.stringify({ points, base_total, packages }) // <-- أرسل packages
    });

    const ct = res.headers.get('content-type') || '';
    if (!res.ok) {
      const msg = ct.includes('application/json') ? (await res.json()).message : 'تعذر تطبيق نقاط الولاء.';
      alert(msg);
      return;
    }
    if (!ct.includes('application/json')) {
      alert('من فضلك سجّل الدخول لتطبيق نقاط الولاء.');
      return;
    }

    const data = await res.json();
    if (data.ok) {
      loyaltyDiscount = parseFloat(data.loyalty_discount) || 0;
      const badge = document.getElementById('loyalty-discount-amount');
      if (badge) badge.textContent = Number(data.loyalty_discount).toFixed(2);
      if (els.loyaltySummary()) {
        els.loyaltySummary().innerHTML =
          `تم استخدام <strong>${data.used_points}</strong> نقطة = خصم <strong>${data.loyalty_discount}</strong> ريال.`;
      }
      recalculateTotal();
    } else {
      alert(data.message || 'تعذر تطبيق نقاط الولاء.');
    }
  } catch (err) {
    console.error(err);
    alert('حصل خطأ أثناء الاتصال بخادم نقاط الولاء.');
  }
}


window.applyLoyaltyPoints = applyLoyaltyPoints;

document.addEventListener('DOMContentLoaded', () => {
  // زر الكوبون (لو موجود)
  const applyCouponBtn = document.getElementById('applyDiscount');
  if (applyCouponBtn) {
    applyCouponBtn.addEventListener('click', (e) => {
      e.preventDefault();
      applyCouponIfExists();
    });
  }

  // زر نقاط الولاء
  if (els.applyLoyaltyBtn()) {
    els.applyLoyaltyBtn().addEventListener('click', (e) => {
      e.preventDefault();
      applyLoyaltyPoints();
    });
  }

  // اختيار السطّاحة: حدّد عنصر واحد وحدث السعر
  document.addEventListener('click', (e) => {
    const item = e.target.closest('.option-item');
    if (!item) return;
    // احذف التحديد من الكل ثم عيّن الجديد
    document.querySelectorAll('.option-item.selected').forEach(el => el.classList.remove('selected'));
    item.classList.add('selected');

    // لو في hidden flatbed_total حدثه، وإلا الحساب هيقرأ من العنصر مباشرة
    if (els.flatbedInpt()) els.flatbedInpt().value = (item.dataset.price || '0');

    recalculateTotal();
  });

  // أي تغيير في خدمات/سطّاحة (لو الحقول موجودة)
  ['input','change'].forEach(ev => {
    if (els.servicesInpt()) els.servicesInpt().addEventListener(ev, recalculateTotal);
    if (els.flatbedInpt())  els.flatbedInpt().addEventListener(ev, recalculateTotal);
  });

  // أول تحميل
  // لو عندك data-base في #total-price، خلّي services_total (إن وُجد) يستلمها
  const tp = els.totalPriceBox();
  if (tp && els.servicesInpt()) {
    const base = tp.dataset.base ?? tp.textContent;
    els.servicesInpt().value = num(base, 0).toFixed(2);
  }
  recalculateTotal();
});
</script>

<style>
.option-item.selected{
  outline:2px solid #e27723;
  box-shadow:0 0 0 3px rgba(226,119,35,.15);
  background:#fff7f0;
}
</style>

<script>
// ===== فتح/إغلاق خيارات السطّاحة (additional-options) =====
(function () {
  const chk   = document.getElementById('additionalOptionsCheckbox');
  const panel = document.querySelector('.additional-options');
  const inpFlatbedId    = document.getElementById('flatbed_id');    // hidden
  const inpFlatbedTotal = document.getElementById('flatbed_total'); // hidden

  if (!chk || !panel) return;

  // دالة فتح اللوحة
  function openPanel() {
    panel.style.display = 'block';
    panel.classList.remove('fade-out');
    panel.classList.add('fade-in');
    // سكرول لطيف للجزء:
    try { panel.scrollIntoView({ behavior:'smooth', block:'start' }); } catch(e){}
    // اختياري: تعيين aria للإتاحة
    chk.setAttribute('aria-expanded', 'true');
  }

  // دالة إغلاق اللوحة
  function closePanel() {
    panel.classList.remove('fade-in');
    panel.classList.add('fade-out');
    // بعد الأنميشن نخفيها
    setTimeout(() => { panel.style.display = 'none'; }, 450);
    chk.setAttribute('aria-expanded', 'false');

    // عند الإغلاق نلغي أي اختيار ونصفّر القيم
    document.querySelectorAll('.option-item.selected').forEach(el => el.classList.remove('selected'));
    if (inpFlatbedId)    inpFlatbedId.value = '';
    if (inpFlatbedTotal) inpFlatbedTotal.value = '0';
    if (window.recalculateTotal) window.recalculateTotal();
  }

  // تبديل حسب حالة الـ checkbox
  function togglePanel(force) {
    const shouldOpen = typeof force === 'boolean' ? force : chk.checked;
    if (shouldOpen) openPanel(); else closePanel();
  }

  // ربط الحدث
  chk.addEventListener('change', () => togglePanel());

  // ===== اختيار عنصر من السطّاحة =====
  // ملاحظة: لو عندك لسنر مشابه موجود، ممكن تكتفي بده وتزيل التكرار.
  panel.addEventListener('click', (e) => {
    const item = e.target.closest('.option-item');
    if (!item) return;

    // إزالة التحديد عن الكل ثم تحديد الجديد
    document.querySelectorAll('.option-item.selected').forEach(el => el.classList.remove('selected'));
    item.classList.add('selected');

    // حفظ القيم في الهيدنز
    const id    = item.dataset.id || '';
    const price = item.dataset.price || '0';

    if (inpFlatbedId)    inpFlatbedId.value    = id;
    if (inpFlatbedTotal) inpFlatbedTotal.value = price;

    // تحديث المجموع
    if (window.recalculateTotal) window.recalculateTotal();
  });

  // ===== تهيئة عند التحميل =====
  // لو فيه اختيار سابق (flatbed_id) افتح اللوحة وفعّل العنصر
  document.addEventListener('DOMContentLoaded', () => {
    const preId = inpFlatbedId ? (inpFlatbedId.value || '') : '';
    if (preId) {
      chk.checked = true;
      togglePanel(true);
      const preItem = panel.querySelector(`.option-item[data-id="${preId}"]`);
      if (preItem) {
        preItem.classList.add('selected');
        if (inpFlatbedTotal) inpFlatbedTotal.value = preItem.dataset.price || '0';
      }
    } else {
      // لو مفيش اختيار سابق، طبّق الحالة الحالية للـ checkbox
      togglePanel(chk.checked);
    }
  });
})();
</script>
<script>
// ===== اختيار/إلغاء اختيار السطّاحة مع منع تعارض مستمع الوثيقة =====
(function () {
  const panel           = document.querySelector('.additional-options');   // الحاوية
  const inpFlatbedId    = document.getElementById('flatbed_id');          // hidden لحفظ id
  const inpFlatbedTotal = document.getElementById('flatbed_total');       // hidden لحفظ السعر

  if (!panel) return;

  // نستخدم capture=true + إيقاف الانتشار لمنع أي مستمع على document من إعادة التحديد
  panel.addEventListener('click', function (e) {
    const item = e.target.closest('.option-item');
    if (!item || !panel.contains(item)) return;

    // أوقف بابلينج قبل ما يوصل لمستمع document
    e.stopPropagation();
    e.stopImmediatePropagation();

    const wasSelected = item.classList.contains('selected');

    // لو العنصر كان محدد واضغطنا عليه ثانية -> ألغِ التحديد وصفّر القيم
    if (wasSelected) {
      item.classList.remove('selected');
      if (inpFlatbedId)    inpFlatbedId.value    = '';
      if (inpFlatbedTotal) inpFlatbedTotal.value = '0';
      if (window.recalculateTotal) window.recalculateTotal();
      return;
    }

    // خلاف ذلك: ألغِ تحديد الباقي ثم حدّد العنصر الحالي
    panel.querySelectorAll('.option-item.selected').forEach(el => el.classList.remove('selected'));
    item.classList.add('selected');

    // خزّن القيم في الهيدنز
    if (inpFlatbedId)    inpFlatbedId.value    = item.dataset.id    || '';
    if (inpFlatbedTotal) inpFlatbedTotal.value = item.dataset.price || '0';

    // حدّث الإجمالي
    if (window.recalculateTotal) window.recalculateTotal();
  }, true); // <-- capture=true
})();
</script>

<script>
(function () {
  const container = document.querySelector('.payment-method'); // غلاف وسائل الدفع
  const hiddenInp = document.getElementById('payment_method'); // الهيدن اللي هيخزن القيمة

  if (!container || !hiddenInp) return;

  // تهيئة: لو في راديو متعلّم مسبقاً من السيرفر
  const preChecked = container.querySelector('input[type="radio"]:checked');
  if (preChecked) {
    preChecked.closest('.form-pay')?.classList.add('selected');
    hiddenInp.value = preChecked.value || '';
  }

  // عند الضغط على أي كارد دفع
  container.addEventListener('click', function (e) {
    const card = e.target.closest('.form-pay');
    if (!card || !container.contains(card)) return;

    const radio = card.querySelector('input[type="radio"]');

    // إزالة التحديد عن الباقي
    container.querySelectorAll('.form-pay.selected').forEach(el => el.classList.remove('selected'));
    container.querySelectorAll('input[type="radio"]').forEach(r => r.checked = false);

    // تحديد الحالي وتحديث الهيدن
    if (radio) {
      radio.checked = true;
      hiddenInp.value = radio.value || '';
    }
    card.classList.add('selected');
  }, true);

  // دعم التغيير عبر الكيبورد (Tab + Space/Enter)
  container.addEventListener('change', function (e) {
    const radio = e.target.closest('input[type="radio"]');
    if (!radio) return;

    container.querySelectorAll('.form-pay.selected').forEach(el => el.classList.remove('selected'));
    radio.closest('.form-pay')?.classList.add('selected');
    hiddenInp.value = radio.value || '';
  });
})();
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('bookingForm');
  if (!form) return;

  // عنصر الحاوية التي تحتوي وسائل الدفع
  const paymentContainer = document.querySelector('.payment-method');
  // الحقل المخفي الذي تحفظ فيه القيمة
  const hiddenPayment = document.getElementById('payment_method');

  // أنشئ عنصر رسالة الخطأ (إن لم يوجد) — لن يغيّر أي شيء آخر في الـ DOM
  function getOrCreateError() {
    let err = document.getElementById('payment-error-msg');
    if (!err) {
      err = document.createElement('div');
      err.id = 'payment-error-msg';
      err.setAttribute('role','alert');
      err.setAttribute('aria-live','assertive');
      err.style.color = '#b91c1c';
      err.style.background = 'rgba(185,28,28,0.05)';
      err.style.border = '1px solid rgba(185,28,28,0.12)';
      err.style.padding = '8px 10px';
      err.style.borderRadius = '6px';
      err.style.marginTop = '10px';
      err.style.fontWeight = '600';
      err.style.display = 'none';
      if (paymentContainer && paymentContainer.parentNode) {
        paymentContainer.parentNode.insertBefore(err, paymentContainer.nextSibling);
      } else {
        // fallback: append to form bottom (لن يغيّر تخطيط الصفحة الأساسي)
        form.appendChild(err);
      }
    }
    return err;
  }

  function showError(msg) {
    const err = getOrCreateError();
    err.textContent = msg;
    err.style.display = 'block';
    // بصريًا نبرز الحاوية مؤقتاً بدون تغيير دائمي للتصميم
    if (paymentContainer) {
      paymentContainer.style.outline = '3px solid rgba(226,119,35,0.18)';
      paymentContainer.style.transition = 'outline .25s ease';
      // ازالة الإطار بعد 2.2 ثانية (تأثير مرئي لطيف)
      clearTimeout(paymentContainer._outlineTimeout);
      paymentContainer._outlineTimeout = setTimeout(() => {
        paymentContainer.style.outline = '';
      }, 2200);
    }
  }

  function hideError() {
    const err = document.getElementById('payment-error-msg');
    if (err) err.style.display = 'none';
  }

  function hasPaymentSelected() {
    // أولا: تحقق من الحقل المخفي إذا موجود
    if (hiddenPayment && hiddenPayment.value && hiddenPayment.value.trim() !== '') return true;
    // ثانياً: تحقق من وجود راديو محدد داخل الحاوية
    if (paymentContainer) {
      const checked = paymentContainer.querySelector('input[type="radio"]:checked');
      if (checked) return true;
    }
    // ثالثاً: تحقق إن هناك عنصر .form-pay مع .selected (لو الكود اللي عندك يضيف هذا الكلاس)
    if (paymentContainer && paymentContainer.querySelector('.form-pay.selected')) return true;
    return false;
  }

  // عند محاولة الإرسال
  form.addEventListener('submit', function (e) {
    if (!hasPaymentSelected()) {
      e.preventDefault();
      e.stopImmediatePropagation();

      // رسالة بالعربي (تقدر تغيرها)
      const msg = "{{ __('messages.choose_payment_method') ?? 'من فضلك اختر وسيلة الدفع قبل تأكيد الحجز.' }}";
      showError(msg);

      // ضع التركيز على أول خيار دفع قابل للتركيز
      // الأولوية: راديو → .form-pay → الرابط الداخلي
      let focusTarget = null;
      if (paymentContainer) {
        focusTarget = paymentContainer.querySelector('input[type="radio"]') ||
                      paymentContainer.querySelector('.form-pay') ||
                      paymentContainer;
      }
      if (focusTarget && typeof focusTarget.focus === 'function') {
        focusTarget.focus({ preventScroll: false });
        // لو العنصر هو .form-pay، اضغط عليه بصرياً (اختياري)
        if (focusTarget.classList && focusTarget.classList.contains('form-pay')) {
          focusTarget.classList.add('highlight-on-focus');
          setTimeout(() => focusTarget.classList.remove('highlight-on-focus'), 900);
        }
      }
      return false;
    } else {
      // كل شيء تمام — أخفِ رسالة الخطأ إن وُجدت
      hideError();
      return true;
    }
  }, true);

  // اختياري: عند اختيار أي وسيلة دفع نخفي رسالة الخطأ فوراً
  document.addEventListener('click', function (ev) {
    if (!paymentContainer) return;
    const clickedInside = paymentContainer.contains(ev.target);
    if (clickedInside) hideError();
  }, true);

  // مع دعم التغيير عبر لوحة المفاتيح (change event)
  if (paymentContainer) {
    paymentContainer.addEventListener('change', function (e) {
      if (paymentContainer.querySelector('input[type="radio"]:checked')) {
        hideError();
      }
    });
  }
});
</script>
@endsection
