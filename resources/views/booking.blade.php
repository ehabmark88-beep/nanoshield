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
            height: 710px;
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

    <div class="first-step">
        <div class="background"></div>
        <div class="step">
            1/4
        </div>
        <div class="title">
            {{ app()->getLocale() === 'ar' ? 'من فضلك قم بأختيار حجم سيارتك' : 'Please choose your car size' }}
        </div>

        <div class="guide" style="gap: 10px; cursor: pointer; display: block" onclick="openModal()">
            <i class="fas fa-car" style=""></i>
            <p style="font-weight: 900; color: white">
                {{ app()->getLocale() === 'ar' ? 'دليل حجم السيارة' : 'Car Size Guide' }}
            </p>
        </div>


        <div class="{{ app()->getLocale() === 'ar' ? 'car-types' : 'car-types2' }}">
            @foreach($cars as $index => $car)
            <div class="car-type" data-index="{{ $index }}" data-car-id="{{ $car->id }}" data-car-size="{{ app()->getLocale() === 'ar' ? $car->size_ar : $car->size }}" style="direction: {{ $direction }} !important;">
                <p >{{ app()->getLocale() === 'ar' ? $car->size_ar : $car->size }}</p>
            </div>
            @endforeach
        </div>
        <div class="car-images">
            @foreach($cars as $index => $car)
            <img
                alt="Red minibus in a dark garage"
                class="car-image {{ $index == 0 ? 'active' : '' }}"
                src="{{ asset('img/cars/' . $car->image) }}"
                data-index="{{ $index }}"
                width="600" height="600"/>
            @endforeach
        </div>
        <div class="navigation">
            <button class="nav-button prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="nav-button next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
    <div id="modal" class="modal" style="display: none;"> <!-- جعل العرض مخفيًا افتراضيًا -->
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="wrap" style="width: 100%; display: flex; justify-content: center;
           {{ app()->getLocale() === 'ar' ? 'flex-direction: row-reverse;' : 'flex-wrap: wrap; flex-direction: row;'}}">
                <div class="box" style="margin: 10px; text-align: center;">
                    <!-- تغيير العنوان بناءً على اللغة -->
                    <h3 style="display: block; color: #e27723">
                        {{ app()->getLocale() === 'ar' ? 'صغيرة' : 'Small' }}
                    </h3>
                    <table class="car-table">
                        <thead>
                        <tr>
                            <th>{{ app()->getLocale() === 'ar' ? 'الموديل' : 'Model' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'السيارة' : 'Car' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? 'افينتادور' : 'Aventador' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'لامبورغيني' : 'Lamborghini' }}</td>
                        </tr>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? 'i3' : 'i3' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'بي ام دبليو' : 'BMW' }}</td>
                        </tr>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? 'A-Class' : 'A-Class' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'مرسيدس' : 'Mercedes' }}</td>
                        </tr>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? '1A' : '1A' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'أودي' : 'Audi' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'Ford Fiesta' : 'Ford Fiesta' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'فورد' : 'Ford' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'بيجو 107' : 'Peugeot 107' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'بيجو' : 'Peugeot' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'بورش 911 تارجا' : 'Porsche 911 Targa' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'بورش' : 'Porsche' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'هيونداي أكسنت' : 'Hyundai Accent' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'هيونداي' : 'Hyundai' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'نيسان كيكس' : 'Nissan Kicks' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'نيسان' : 'Nissan' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'شيفروليه سبارك' : 'Chevrolet Spark' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'شيفروليه' : 'Chevrolet' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'فولكس جولف' : 'Volkswagen Golf' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'فولكس فاجن' : 'Volkswagen' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'كيا بيكانتو' : 'Kia Picanto' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'كيا' : 'Kia' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box" style="margin: 10px; text-align: center;">
                    <h3 style="display: block; color: #e27723">{{ app()->getLocale() === 'ar' ? 'متوسطه' : 'Medium' }}</h3>
                    {{-- <p style="color:#000; font-weight: bolder">{{ $car->details }}</p> --}}
                    <table class="car-table">
                        <thead>
                        <tr>
                            <th>{{ app()->getLocale() === 'ar' ? 'الموديل' : 'Model' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'السيارة' : 'Car' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? 'كامري' : 'Camry' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'تويوتا' : 'Toyota' }}</td>
                        </tr>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? 'ES' : 'ES' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'لكزس' : 'Lexus' }}</td>
                        </tr>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? 'Series 4' : 'Series 4' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'بي ام دبليو' : 'BMW' }}</td>
                        </tr>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? 'C-Class' : 'C-Class' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'مرسيدس' : 'Mercedes' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'A6' : 'A6' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'أودي' : 'Audi' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'Velar' : 'Velar' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'لاند روفر' : 'Land Rover' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'Ford Taurus' : 'Ford Taurus' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'فورد' : 'Ford' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'بيجو 3008' : 'Peugeot 3008' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'بيجو' : 'Peugeot' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'Carrera 911' : 'Carrera 911' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'بورش' : 'Porsche' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'سوناتا' : 'Sonata' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'هيونداي' : 'Hyundai' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'أكورد' : 'Accord' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'هوندا' : 'Honda' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'ألتيما' : 'Altima' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'نيسان' : 'Nissan' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="box" style="margin: 10px; text-align: center;"> <!-- Add margin to space out elements -->
                    <h3 style="display: block; color: #e27723">{{ app()->getLocale() === 'ar' ? 'كبيرة' : 'Large' }}</h3>
                    <table class="car-table">
                        <thead>
                        <tr>
                            <th>{{ app()->getLocale() === 'ar' ? 'الموديل' : 'Model' }}</th>
                            <th>{{ app()->getLocale() === 'ar' ? 'السيارة' : 'Car' }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? 'لاندكروزر' : 'Land Cruiser' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'تويوتا' : 'Toyota' }}</td>
                        </tr>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? 'لكزس LX' : 'Lexus LX' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'لكزس' : 'Lexus' }}</td>
                        </tr>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? '7 Series' : '7 Series' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'بي ام دبليو' : 'BMW' }}</td>
                        </tr>
                        <tr>
                            <td>{{ app()->getLocale() === 'ar' ? 'GS-Class' : 'GS-Class' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'مرسيدس' : 'Mercedes' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'Q7' : 'Q7' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'أودي' : 'Audi' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'Range Rover' : 'Range Rover' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'لاند روفر' : 'Land Rover' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'Continental GT' : 'Continental GT' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'بنتلي' : 'Bentley' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'Phantom' : 'Phantom' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'رولز رويس' : 'Rolls Royce' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'Ford Expedition' : 'Ford Expedition' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'فورد' : 'Ford' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'Cayenne' : 'Cayenne' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'بورش' : 'Porsche' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'سنتافي' : 'Santa Fe' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'هيونداي' : 'Hyundai' }}</td>
                        </tr>
                        <tr class="dis_d">
                            <td>{{ app()->getLocale() === 'ar' ? 'جينيسيس G80' : 'Genesis G80' }}</td>
                            <td>{{ app()->getLocale() === 'ar' ? 'جينيسيس' : 'Genesis' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<div id="car-details" style="display: none;">
    <div class="template-component-booking-item-header template-clear-fix">
                        <span style="color: #e47823;">
              2/4
                </span>
        <h3>
            {{ App::getLocale() == 'ar' ? 'اختيار الفرع' : 'Choose Time and Branch' }}
        </h3>
        <h5>
            {{ App::getLocale() == 'ar' ? 'من فضلك قم باختيار المنطقة و الفرع' : 'Please select the region and branch' }}
        </h5>
    </div>
    <div class="template-component-booking-item-content template-margin-top-reset">
        <ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix" style="direction: {{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }} !important;">
            <!-- Select Branch -->
            <!-- Select Governorate -->
            <li class="template-layout-column-left template-margin-bottom-reset">
                <div class="template-component-form-field stylish-select">
                    <label for="booking-form-governorate">{{ __('messages.governorate') }}</label>
                    <select name="booking-form-governorate" id="booking-form-governorate" class="styled-select">
                        <option value="" disabled selected>{{ __('messages.choose_governorate') }}</option>
                        @foreach($governorates as $governorate)
                            <option value="{{ $governorate->id }}">
                                @if(App::getLocale() === 'en')
                                    {{ $governorate->name }}
                                @else
                                    {{ $governorate->name_ar }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </li>
            <li class="template-layout-column-left template-margin-bottom-reset">
                <div class="template-component-form-field stylish-select">
                    <label for="booking-form-branch">{{ __('messages.branch') }}</label>
                    <select name="booking-form-branch" id="booking-form-branch" class="styled-select" disabled>
                        <option value="" disabled selected>{{ __('messages.choose_first') }}</option>
                    </select>
                </div>
            </li>
        </ul>
    </div>
    <style>
        select#booking-form-branch,select#booking-form-governorate {
            border-radius: 20px;
        }
        /* إعداد عرض المحتوى */
        .con {
            display: flex;
            gap: 20px;
            margin: auto;
            width: 77%;
            margin-top: 10px !important;

        }

        /* تخصيص الأزرار الخاصة بالوقت */
        .time-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            width: 49%;
            padding: 20px;
            border-radius: 8px;
            background-color: #444;
        }

        .time-buttons button {
            background-color: #555;
            color: white;
            border: none;
            padding: 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .time-buttons button:hover {
            background-color: #666;
        }

        .time-buttons button.disabled {
            background-color: #888;
            cursor: not-allowed;
        }

        .time-buttons button:active {
            background-color: #777;
        }

        /* تخصيص التقويم */
        .calendar {
            display: block;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar-header i {
            cursor: pointer;
            font-size: 20px;
        }

        .calendar-header span {
            font-size: 24px;
            color: #e47823;
        }

        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .calendar-days button {
            color: white;
            background-color: #444;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            border: none;
            font-size: 16px;
        }

        /*.calendar-days button:hover {*/
        /*    background-color: #555;*/
        /*}*/

        .calendar-days .selected {
            background-color: #e27723;
        }

        .calendar-days .day-name {
            font-weight: bold;
            color: #e47823;
            text-align: center;
        }

        .calendar-days .active {
            background-color: #888;  /* لون الخلفية للنمط النشط (اليوم الحالي) */
        }

        .time-buttons .selected-time {
            background-color: #e27723;
            color: white;
        }

        /* تنسيق موبايل (الشاشات التي عرضها أقل من 768px) */
        @media screen and (max-width: 768px) {
            .con {
                flex-direction: column;
                gap: 10px;
                width: 90%;
            }

            .calendar {
                width: 100% !important;
            }

            .calendar-days {
                grid-template-columns: repeat(7, 1fr);
            }

            .time-buttons {
                width: 100%;
            }

            .calendar-days button {
                padding: 8px;
                font-size: 14px;
            }

            .time-buttons button {
                font-size: 14px;
            }
        }

        /* تنسيق تابلت (الشاشات التي عرضها من 768px إلى 992px) */
        @media screen and (min-width: 768px) and (max-width: 992px) {
            .con {
                flex-direction: column;
                gap: 15px;
                width: 85%;
            }

            .calendar {
                width: 90%;
            }

            .time-buttons {
                width: 48%;
            }

            .calendar-days button {
                padding: 10px;
                font-size: 15px;
            }

            .time-buttons button {
                padding: 14px;
                font-size: 15px;
            }
        }

        /* تنسيق أجهزة المكتب (الشاشات التي عرضها أكبر من 992px) */
        @media screen and (min-width: 992px) {
            .con {
                flex-direction: row;
                gap: 20px;
                margin: auto;
                width: 77%;
            }

            .calendar {
                width: 50%;
            }

            .time-buttons {
                width: 50%;
            }

            .calendar-days button {
                padding: 10px;
                font-size: 16px;
            }

            .time-buttons button {
                padding: 15px;
                font-size: 16px;
            }
        }

    </style>
    <li>
        <div class="template-component-booking-item-header template-clear-fix">
        <span style="color: #e47823">
            3/4
        </span>
            <h2>
                {{ app()->getLocale() === 'ar' ? 'الباقات والخدمات' : 'Packages and Services' }}
            </h2>
            <h5>
{{--                {{ app()->getLocale() === 'ar' ? 'من فضلك قم باختيار الباقة أو الخدمة المطلوبة' : 'Please select the required package or service' }}--}}
                {{ app()->getLocale() === 'ar' ? 'من فضلك قم بأختيار حجم السيارة و نوع الخدمة لتظهر الخدمات' : 'Please select the car size and service type to display the services' }}
            </h5>
        </div>
        <div class="packages-header" style="margin: auto !important; width: 75%;direction: {{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }} !important;">
            @foreach($categories as $category)
            <div class="package category-option" data-category-id="{{ $category->id }}" >
                <i class="{{ $category->details }}"></i>
                @if(App::getLocale() === 'en')
                <p>{{ $category->name }}</p>
                @else
                <p>{{ $category->name_ar }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </li>
    <li>
        <div id="packages-list" class="template-component-booking-item-header template-clear-fix">
            <ul class="template-component-booking-package-list" id="package-list" style="direction: {{ $direction }}">
                <div class="pricing-table" style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important;">
                    <div class="pricing-card" data-price="${package.price}" data-duration="${package.hours}">
                        <h3>
                            {{ app()->getLocale() === 'ar' ? 'نانو سيراميك خارجي' : 'External Nano Ceramic' }}
                        </h3>
                        <div class="price" style="color:black;">
                            666<sup>.00
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1124.14 1256.39">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #000;
                                            }
                                        </style>
                                    </defs>
                                    <path class="cls-1" d="M699.62,1113.02h0c-20.06,44.48-33.32,92.75-38.4,143.37l424.51-90.24c20.06-44.47,33.31-92.75,38.4-143.37l-424.51,90.24Z"/>
                                    <path class="cls-1" d="M1085.73,895.8c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.33v-135.2l292.27-62.11c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.27V66.13c-50.67,28.45-95.67,66.32-132.25,110.99v403.35l-132.25,28.11V0c-50.67,28.44-95.67,66.32-132.25,110.99v525.69l-295.91,62.88c-20.06,44.47-33.33,92.75-38.42,143.37l334.33-71.05v170.26l-358.3,76.14c-20.06,44.47-33.32,92.75-38.4,143.37l375.04-79.7c30.53-6.35,56.77-24.4,73.83-49.24l68.78-101.97v-.02c7.14-10.55,11.3-23.27,11.3-36.97v-149.98l132.25-28.11v270.4l424.53-90.28Z"/>
                                </svg></sup>
                        </div>
                        <ul class="features">
                            <h5><del>-</del></h5>
                            <li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important;color:black;"><i class="fas fa-check" style="color: green;" ></i>{{ app()->getLocale() === 'ar' ? 'اسم المنتج Q30' : 'Product Name Q30' }}</li>
                            <li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important;color:black;"><i class="fas fa-check" style="color: green;"></i>{{ app()->getLocale() === 'ar' ? 'طبقتين' : 'Two Layers' }}</li>
                            <li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important;color:black;"><i class="fas fa-check" style="color: green;"></i>{{ app()->getLocale() === 'ar' ? 'الضمان سنة' : 'Warranty 1 Year' }}</li>
                            <li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important;color:black;"><i class="fas fa-check" style="color: green;"></i>{{ app()->getLocale() === 'ar' ? 'تطبق الشروط و الأحكام' : 'Terms and Conditions Apply' }}</li>
                            @if(app()->getLocale() !== 'ar')
                            <li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important;"><i class="fas fa-check" style="color: green;"></i>-</li>
                            @endif
                        </ul>
                        <div class="time-s">
                            <i class="fas fa-clock"></i> {{ app()->getLocale() === 'ar' ? 'ساعة 16' : '16 Hours' }}
                        </div>
                        <button class="select-plan">
                            {{ app()->getLocale() === 'ar' ? 'اختر هذه الخدمة' : 'Select This Service' }}
                        </button>
                    </div>
                </div>
                <div class="pricing-table">
                    <div class="pricing-card" data-price="${package.price}" data-duration="${package.hours}">
                        <h3>
                            {{ app()->getLocale() === 'ar' ? 'حماية داخلية السيارة بتقنية النانو سيراميك' : 'Interior Car Protection with Nano Ceramic' }}
                        </h3>
                        <div class="price" style="color:black;">
                            999<sup>.00
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1124.14 1256.39">
                                    <defs>
                                        <style>
                                            .cls-1 {
                                                fill: #000;
                                            }
                                        </style>
                                    </defs>
                                    <path class="cls-1" d="M699.62,1113.02h0c-20.06,44.48-33.32,92.75-38.4,143.37l424.51-90.24c20.06-44.47,33.31-92.75,38.4-143.37l-424.51,90.24Z"/>
                                    <path class="cls-1" d="M1085.73,895.8c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.33v-135.2l292.27-62.11c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.27V66.13c-50.67,28.45-95.67,66.32-132.25,110.99v403.35l-132.25,28.11V0c-50.67,28.44-95.67,66.32-132.25,110.99v525.69l-295.91,62.88c-20.06,44.47-33.33,92.75-38.42,143.37l334.33-71.05v170.26l-358.3,76.14c-20.06,44.47-33.32,92.75-38.4,143.37l375.04-79.7c30.53-6.35,56.77-24.4,73.83-49.24l68.78-101.97v-.02c7.14-10.55,11.3-23.27,11.3-36.97v-149.98l132.25-28.11v270.4l424.53-90.28Z"/>
                                </svg>                                                                                      </sup>
                        </div>
                        <ul class="features">
                            <h5><del>-</del></h5>
                            <li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i> {{ app()->getLocale() === 'ar' ? 'اسم المنتج PRO20' : 'Product Name PRO20' }}</li>
                            <li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i>{{ app()->getLocale() === 'ar' ? 'طبقتين' : 'Two Layers' }}</li>
                            <li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i>{{ app()->getLocale() === 'ar' ? 'داخلية السيارة (جلد ، مخمل ، شامواة ، كنتارا)' : 'Car Interior (Leather, Velvet, Alcantara)' }}</li>
                            <li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i>{{ app()->getLocale() === 'ar' ? 'الضمان سنة' : 'Warranty 1 Year' }}</li>
                            <li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i>{{ app()->getLocale() === 'ar' ? 'تطبق الشروط و الأحكام' : 'Terms and Conditions Apply' }}</li>
                        </ul>
                        <div class="time-s">
                            <i class="fas fa-clock"></i> {{ app()->getLocale() === 'ar' ? 'ساعة 16' : '16 Hours' }}
                        </div>
                        <button class="select-plan">
                            {{ app()->getLocale() === 'ar' ? 'اختر هذه الخدمة' : 'Select This Service' }}
                        </button>
                    </div>
                </div>
            </ul>
        </div>
    </li>

    <h2 style="color: black;padding:10px">
        {{ app()->getLocale() === 'ar' ? 'التاريخ و الموعد' : 'Date and time' }}
    </h2>
    <div class="con" style="direction: {{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }} !important;">
        <div class="calendar">
            <div class="calendar-header">
                <i class="fas fa-chevron-left" id="prev-month"></i>
                <span id="current-month-year"></span>
                <i class="fas fa-chevron-right" id="next-month"></i>
            </div>
            <div class="calendar-days" id="calendar-days"></div>
        </div>
        <div class="time-buttons" id="time-buttons">
            <button class="disabled">PM 12:00</button>
            <button class="disabled">PM 1:00</button>
            <button class="disabled">PM 2:00</button>
            <button class="disabled">PM 3:00</button>
            <button class="disabled">PM 4:00</button>
            <button class="disabled">PM 5:00</button>
            <button class="disabled">PM 6:00</button>
            <button class="disabled">PM 7:00</button>
            <button class="disabled">PM 8:00</button>
            <button class="disabled">PM 9:00</button>
            <button class="disabled">PM 10:00</button>
        </div>
    </div>

    {{--    <div class="sec-of">--}}
{{--        <div class="add-ser">--}}
{{--            <div class="ser-head">--}}
{{--                <span style="color: #e47823;">--}}
{{--              3/5--}}
{{--                </span>--}}
{{--                <h2 style="color: white;">--}}
{{--                    {{ App::getLocale() == 'ar' ? 'الخدمات الإضافية' : 'Additional Services' }}--}}
{{--                </h2>--}}
{{--            </div>--}}
{{--            <div class="services">--}}
{{--                @foreach($services as $service)--}}
{{--                <div class="service" data-id="{{ $service->id }}" data-price="{{ $service->price }}" data-duration="{{ $service->duration }}">--}}
{{--                    <img alt="{{ $service->name }}" height="50" src="{{ asset('img/additional_services/' . $service->image) }}" width="50"/>--}}
{{--                    <h3>--}}
{{--                        @if(App::getLocale() === 'en')--}}
{{--                        {{ ucfirst(strtolower($service->name)) }}--}}
{{--                        @else--}}
{{--                        {{ ucfirst($service->name_ar) }}--}}
{{--                        @endif--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        @if(App::getLocale() === 'en')--}}
{{--                        {{ $service->details }}--}}
{{--                        @else--}}
{{--                        {{ $service->details_ar }} <!-- Assuming you have `details_ar` for Arabic description -->--}}
{{--                        @endif--}}
{{--                    </p>--}}
{{--                    <div class="details">--}}
{{--                            <span>--}}
{{--                                <i class="fas fa-clock"></i>--}}
{{--                                @if(App::getLocale() === 'en')--}}
{{--                                    @if($service->duration == 1)--}}
{{--                                        {{ $service->duration }} Hour--}}
{{--                                    @elseif($service->duration >= 3 && $service->duration <= 10)--}}
{{--                                        {{ $service->duration }} Hours--}}
{{--                                    @else--}}
{{--                                        {{ $service->duration }} Hours--}}
{{--                                    @endif--}}
{{--                                @else--}}
{{--                                    @if($service->duration == 1)--}}
{{--                                        ساعة {{ $service->duration }}--}}
{{--                                    @elseif($service->duration >= 3 && $service->duration <= 10)--}}
{{--                                        ساعات {{ $service->duration }}--}}
{{--                                    @else--}}
{{--                                        ساعة {{ $service->duration }}--}}
{{--                                    @endif--}}
{{--                                @endif--}}
{{--                            </span>--}}
{{--                        <span>--}}
{{--                                <i></i>--}}
{{--                                @if(App::getLocale() === 'en')--}}
{{--                                                                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1124.14 1256.39">--}}
{{--                                  <defs>--}}
{{--                                    <style>--}}
{{--                                      .cls-1 {--}}
{{--                                          fill: #000;--}}
{{--                                      }--}}
{{--                                    </style>--}}
{{--                                  </defs>--}}
{{--                                  <path class="cls-1" d="M699.62,1113.02h0c-20.06,44.48-33.32,92.75-38.4,143.37l424.51-90.24c20.06-44.47,33.31-92.75,38.4-143.37l-424.51,90.24Z"/>--}}
{{--                                  <path class="cls-1" d="M1085.73,895.8c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.33v-135.2l292.27-62.11c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.27V66.13c-50.67,28.45-95.67,66.32-132.25,110.99v403.35l-132.25,28.11V0c-50.67,28.44-95.67,66.32-132.25,110.99v525.69l-295.91,62.88c-20.06,44.47-33.33,92.75-38.42,143.37l334.33-71.05v170.26l-358.3,76.14c-20.06,44.47-33.32,92.75-38.4,143.37l375.04-79.7c30.53-6.35,56.77-24.4,73.83-49.24l68.78-101.97v-.02c7.14-10.55,11.3-23.27,11.3-36.97v-149.98l132.25-28.11v270.4l424.53-90.28Z"/>--}}
{{--                                </svg>  {{ $service->price }}--}}
{{--                                @else--}}
{{--                                                                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1124.14 1256.39">--}}
{{--                                  <defs>--}}
{{--                                    <style>--}}
{{--                                      .cls-1 {--}}
{{--                                          fill: #000;--}}
{{--                                      }--}}
{{--                                    </style>--}}
{{--                                  </defs>--}}
{{--                                  <path class="cls-1" d="M699.62,1113.02h0c-20.06,44.48-33.32,92.75-38.4,143.37l424.51-90.24c20.06-44.47,33.31-92.75,38.4-143.37l-424.51,90.24Z"/>--}}
{{--                                  <path class="cls-1" d="M1085.73,895.8c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.33v-135.2l292.27-62.11c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.27V66.13c-50.67,28.45-95.67,66.32-132.25,110.99v403.35l-132.25,28.11V0c-50.67,28.44-95.67,66.32-132.25,110.99v525.69l-295.91,62.88c-20.06,44.47-33.33,92.75-38.42,143.37l334.33-71.05v170.26l-358.3,76.14c-20.06,44.47-33.32,92.75-38.4,143.37l375.04-79.7c30.53-6.35,56.77-24.4,73.83-49.24l68.78-101.97v-.02c7.14-10.55,11.3-23.27,11.3-36.97v-149.98l132.25-28.11v270.4l424.53-90.28Z"/>--}}
{{--                                </svg>  {{ $service->price }}--}}
{{--                                @endif--}}
{{--                            </span>--}}
{{--                    </div>--}}
{{--                    <div class="add-button">--}}
{{--                        +--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <form method="post" action="{{ route('confirm.store') }}" id="confirmForm">
        @csrf
        <input hidden name="car_id" value="" id="car_id">
        <input hidden name="additional_services" value="" id="services_additional">
        <input hidden name="packages" value="" id="basic_service">
        <input hidden name="branch_id" value="" id="id_branch">
        <input hidden name="date" value="" id="data">
        <input hidden name="time" value="" id="time">
        <input hidden name="duration" value="" id="duration">
        <input hidden name="total_price" value="" id="final_price">
        <input hidden name="payment_method" value="" id="payment_method">
        <input hidden name="coupon_id" value="" id="coupon_id">
        <input hidden name="offer" value="" id="offer">
        <input hidden name="flatbed_id" value="" id="flatbed_id">

        <div style="margin: auto; width: 70%">
            <h3 id="formError" style="min-height:1.5em; color:#d32f2f;padding: 10px;"></h3>
            <button type="submit" class="select-plan" style="width: 30%;">
                {{ app()->getLocale() === 'ar' ? 'التالي' : 'Next' }}
            </button>
        </div>
    </form>

   <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form  = document.getElementById('confirmForm');
        const h3    = document.getElementById('formError');
        const carId = document.getElementById('car_id');
        const pkg   = document.getElementById('basic_service'); // packages (JSON array of IDs)
        const time  = document.getElementById('time');

        // رسالة باللغتين حسب لغة التطبيق
        const errorMsg = "{{ app()->getLocale() === 'ar'
            ? 'تحقّق من اختيار حجم السيارة والفرع والموعد وخدمتك المُختارة'
            : 'Please check your car size, branch, appointment time, and selected service'
        }}";

        form.addEventListener('submit', function (e) {
            const isCarOk  = (carId.value || '').trim() !== '';

            // هنا نتأكد أن الباكدجات ليست فارغة ولا تساوي [] بعد التغيير
            const pkgValue = (pkg.value || '').trim();
            let isPkgOk    = pkgValue !== '';

            try {
                const parsed = JSON.parse(pkgValue);
                if (Array.isArray(parsed) && parsed.length === 0) {
                    isPkgOk = false;
                }
            } catch (err) {
                // لو مش JSON (أو فاضي أصلاً) نخليه false
                if (pkgValue === '' || pkgValue === '[]') {
                    isPkgOk = false;
                }
            }

            const isTimeOk = (time.value || '').trim() !== '';

            if (!isCarOk || !isPkgOk || !isTimeOk) {
                e.preventDefault();
                h3.textContent = errorMsg;
                h3.style.color = '#d32f2f';
                h3.setAttribute('role', 'alert');
                h3.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                // نظّف الرسالة لو كله تمام ودعه يُرسل
                h3.textContent = '';
            }
        });
    });
</script>


    <div hidden class="last" style="direction: {{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }} !important;gap: 10px">
        <div class="form-last" hidden>
            <form method="post" id="bookingForm"  action="{{route('wash-bookings.store')}}">
                @csrf
                <input hidden name="car_id" value="" id="car_id">
                <input hidden name="additional_services" value="" id="services_additional">
                <input hidden name="packages" value="" id="basic_service">
                <input hidden name="date" value="" id="data">
                <input hidden name="time" value="" id="time">

                <input type="hidden" id="selected_packages_ids" name="packages">
<input type="hidden" id="total_price" name="total_price">
<input type="hidden" id="total_duration" name="duration">

                <input hidden name="payment_method" value="" id="payment_method">
                <input hidden name="coupon_id" value="" id="coupon_id">
                <input hidden name="offer" value="" id="offer">
                <input hidden name="flatbed_id" value="" id="flatbed_id">

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
                    <div class="form-group" style="display: block; width: 100%; padding: 10px; box-sizing: border-box;">
                        <label for="extraOption1" class="option-label" style="color: #e27723"> {{ __('messages.extra_option') }} </label>
                        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                            @foreach($flatbeds as $flatbed)
                                @if($flatbed->flatbed_type_id == '1')
                                    <div class="option-item" data-id="{{ $flatbed->id }}" style="flex: 1 1 30%; background-color: #f9f9f9; padding: 10px; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                                        <label for="flatbed_{{ $flatbed->id }}" class="option-text">
                                            @if(app()->getLocale() == 'en')
                                                {{ $flatbed->name }}
                                            @else
                                                {{ $flatbed->name_ar }}
                                            @endif
                                            <span class="option-price" id="flatbed_{{ $flatbed->id }}">{{ $flatbed->price }}                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 1124.14 1256.39">
                                  <defs>
                                    <style>
                                      .cls-1 {
                                          fill: #000;
                                      }
                                    </style>
                                  </defs>
                                  <path class="cls-1" d="M699.62,1113.02h0c-20.06,44.48-33.32,92.75-38.4,143.37l424.51-90.24c20.06-44.47,33.31-92.75,38.4-143.37l-424.51,90.24Z"/>
                                  <path class="cls-1" d="M1085.73,895.8c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.33v-135.2l292.27-62.11c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.27V66.13c-50.67,28.45-95.67,66.32-132.25,110.99v403.35l-132.25,28.11V0c-50.67,28.44-95.67,66.32-132.25,110.99v525.69l-295.91,62.88c-20.06,44.47-33.33,92.75-38.42,143.37l334.33-71.05v170.26l-358.3,76.14c-20.06,44.47-33.32,92.75-38.4,143.37l375.04-79.7c30.53-6.35,56.77-24.4,73.83-49.24l68.78-101.97v-.02c7.14-10.55,11.3-23.27,11.3-36.97v-149.98l132.25-28.11v270.4l424.53-90.28Z"/>
                                </svg></span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group" style="display: block; width: 100%; padding: 10px; box-sizing: border-box;">
                        <label for="extraOption2" class="option-label" style="color: #e27723">{{ __('messages.extra_option2') }} </label>
                        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                            @foreach($flatbeds as $flatbed)
                                @if($flatbed->flatbed_type_id == '2')
                                    <div class="option-item" data-id="{{ $flatbed->id }}" style="flex: 1 1 30%; background-color: #f9f9f9; padding: 10px; border-radius: 5px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); display: flex; align-items: center;">
                                        <label for="flatbed_{{ $flatbed->id }}" class="option-text">
                                            @if(app()->getLocale() == 'en')
                                                {{ $flatbed->name }}
                                            @else
                                                {{ $flatbed->name_ar }}
                                            @endif

                                            <span class="option-price" id="flatbed_{{ $flatbed->id }}">{{ $flatbed->price }}                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 1124.14 1256.39">
                                  <defs>
                                    <style>
                                      .cls-1 {
                                          fill: #000;
                                      }
                                    </style>
                                  </defs>
                                  <path class="cls-1" d="M699.62,1113.02h0c-20.06,44.48-33.32,92.75-38.4,143.37l424.51-90.24c20.06-44.47,33.31-92.75,38.4-143.37l-424.51,90.24Z"/>
                                  <path class="cls-1" d="M1085.73,895.8c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.33v-135.2l292.27-62.11c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.27V66.13c-50.67,28.45-95.67,66.32-132.25,110.99v403.35l-132.25,28.11V0c-50.67,28.44-95.67,66.32-132.25,110.99v525.69l-295.91,62.88c-20.06,44.47-33.33,92.75-38.42,143.37l334.33-71.05v170.26l-358.3,76.14c-20.06,44.47-33.32,92.75-38.4,143.37l375.04-79.7c30.53-6.35,56.77-24.4,73.83-49.24l68.78-101.97v-.02c7.14-10.55,11.3-23.27,11.3-36.97v-149.98l132.25-28.11v270.4l424.53-90.28Z"/>
                                </svg></span>
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
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
        <div class="summary" hidden>
                        <span style="color: #e47823;">
              4/4
                </span>            <h2>{{ __('messages.confirmation_and_summary') }}</h2>
            <div style="display: grid; grid-template-columns: repeat(2,minmax(0,1fr));">
                <div class="item highlight">
                    <i class="fas fa-car" style="color: #e27723 !important;"></i>
                    <div class="label">{{ __('messages.car_size') }}</div>
                    <div class="value" id="car-size">{{ __('messages.select_car_size') }}</div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-tint"></i>
                    <div class="label">{{ __('messages.selected_services') }}</div>
                    <div class="value" id="selected-services">{{ __('messages.choose_services') }}</div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="label">{{ __('messages.area') }}</div>
                    <div class="value" id="selected-governorate">{{ __('messages.choose_area') }}</div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-building"></i>
                    <div class="label">{{ __('messages.branch') }}</div>
                    <div class="value" id="selected-branch">{{ __('messages.choose_branch') }}</div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-calendar-alt"></i>
                    <div class="label">{{ __('messages.booking_date') }}</div>
                    <div class="value" id="booking-date">{{ __('messages.select_date') }}</div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-clock"></i>
                    <div class="label">{{ __('messages.booking_time') }}</div>
                    <div class="value" id="booking-time">{{ __('messages.select_time') }}</div>
                </div>
                <div class="item highlight">
                    <i class="fas fa-history"></i>
                    <div class="label">{{ __('messages.total_duration') }}</div>
                    <div class="value" id="total-duration"> 0 {{ __('messages.hours') }}</div>
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
                    <div class="value" id="total-price"> 0.00</div>
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

</div>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- 1) اختيار نوع السيارة + إظهار تفاصيل الحجز --}}
    <script>
        $(document).ready(function () {
            $('.car-type').on('click', function () {
                $('.car-type').removeClass('selected');
                $(this).addClass('selected');
                $('#car-details').show();
            });
        });
    </script>

    {{-- 2) التحكم في السلايدز (1 إلى 5) + شرط اختيار باقة ووقت --}}
    <script>
        let current = 1;
        const total = 5;

        document.addEventListener('DOMContentLoaded', () => {
            const carOptions = document.querySelectorAll('.car-type');
            const nextBtn = document.getElementById('nextBtn');
            const backBtn = document.getElementById('backBtn');
            const timeButtons = document.querySelectorAll('.time-buttons button');

            carOptions.forEach(option => {
                option.addEventListener('click', () => {
                    carOptions.forEach(opt => opt.classList.remove('selected'));
                    option.classList.add('selected');

                    if (current === 1) {
                        nextBtn.disabled = false;
                    }
                });
            });

            timeButtons.forEach(button => {
                button.addEventListener('click', () => {
                    if (button.classList.contains('disabled')) return;
                    button.classList.toggle('selected-time');
                });
            });

            updateButtonStates();

            function showDiv(index) {
                for (let i = 1; i <= total; i++) {
                    const slide = document.getElementById('slide' + i);
                    if (slide) slide.classList.remove('visible');
                }
                const targetSlide = document.getElementById('slide' + index);
                if (targetSlide) targetSlide.classList.add('visible');
                updateButtonStates();
            }

            function updateButtonStates() {
                backBtn.disabled = current === 1;

                if (current === 1) {
                    const selected = document.querySelector('.car-type.selected');
                    nextBtn.disabled = !selected;
                } else {
                    nextBtn.disabled = false;
                }

                if (current === 5) {
                    nextBtn.style.visibility = 'hidden';
                } else {
                    nextBtn.style.visibility = 'visible';
                }
            }

            window.goNext = function () {
                if (current === 2) {
                    const pricingCards = document.querySelectorAll('.pricing-card.selected');
                    if (pricingCards.length === 0) {
                        alert('اختر الباقة أولا');
                        return;
                    }
                }

                if (current === 4) {
                    const selectedTime = document.querySelector('.time-buttons button.selected-time');
                    if (!selectedTime) {
                        alert('اختر الوقت أولا');
                        return;
                    }
                }

                if (current < total) {
                    current++;
                    showDiv(current);
                }
            }

            window.goBack = function () {
                if (current > 1) {
                    current--;
                    showDiv(current);
                }
            }
        });
    </script>

    {{-- 3) اختيار وسيلة الدفع + حفظها في حقل مخفي --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const paymentMethods = document.querySelectorAll('.form-pay input[type="radio"]');
            const paymentMethodDisplay = document.getElementById('payment_method');

            paymentMethods.forEach(input => {
                input.addEventListener('change', function () {
                    paymentMethods.forEach(radio => {
                        radio.closest('.form-pay').classList.remove('selected');
                    });

                    if (this.checked) {
                        this.closest('.form-pay').classList.add('selected');
                        paymentMethodDisplay.value = `${this.value}`;
                    }
                });
            });
        });
    </script>

    {{-- 4) تفعيل البلجن الرئيسي --}}
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#template-booking').booking();
        });
    </script>

    {{-- 5) تحديد اللغة في JS --}}
    @if(App::getLocale() === 'en')
        <script>const lang = 'en';</script>
    @else
        <script>const lang = 'ar';</script>
    @endif

    {{-- 6) منطق السيارة + الكاتيجوري + الباقات + الخدمات الإضافية + السطحة + الخصم --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const carTypes = $('.car-type');
            const carImages = $('.car-image');
            const prevButton = $('.nav-button.prev');
            const nextButton = $('.nav-button.next');
            const packageOptions = $('.category-option');
            const summaryCarSize = $('#car-size');

            let currentIndex = 0;

            // مصفوفات/أوبجكت لتخزين الاختيارات
            let selectedBasicServices = [];        // أسماء الباقات الأساسية (للعرض فقط)
            let selectedAdditionalServices = [];   // أسماء الخدمات الإضافية
            let selectedFlatbed = null;           // عنصر السطحة المختارة
            let selectedPackagesIds = [];         // IDs لكل الباقات المختارة (أساسية)
            let packagesData = {};                // {id: {price, duration}} لكل باقة تم تحميلها

            function updateActiveCar(index) {
                carTypes.removeClass('active');
                carImages.removeClass('active');
                carTypes.eq(index).addClass('active');
                carImages.eq(index).addClass('active');

                const selectedCarSize = carTypes.eq(index).data('car-size');
                summaryCarSize.text(selectedCarSize);
            }

            function showPrevCar() {
                currentIndex = (currentIndex - 1 + carTypes.length) % carTypes.length;
                updateActiveCar(currentIndex);
                loadPackagesAndCategories();
            }

            function showNextCar() {
                currentIndex = (currentIndex + 1) % carTypes.length;
                updateActiveCar(currentIndex);
                loadPackagesAndCategories();
            }

            function loadPackagesAndCategories() {
                const carId = $('.car-type.active').data('car-id');
                const categoryId = $('.category-option.selected').data('category-id');

                if (carId && categoryId) {
                    $.ajax({
                        url: "{{ route('get.packages') }}",
                        method: 'GET',
                        data: { car_id: carId, category_id: categoryId },
                        success: function(response) {
                            $('#package-list').empty();

                            if (response.packages && response.packages.length > 0) {
                                response.packages.forEach(pkg => {
                                    const hoursText =
                                        pkg.hours === 1
                                            ? "{{ __('messages.hour') }}"
                                            : (pkg.hours >= 10
                                                ? "{{ __('messages.hours') }}"
                                                : "{{ __('messages.hours_plural') }}");

                                    // حفظ بيانات الباقة مرة واحدة حسب الـ id
                                    packagesData[pkg.id] = {
                                        price: parseFloat(pkg.price),
                                        duration: parseFloat(pkg.hours)
                                    };

                                    $('#package-list').append(`
                                        <div class="pricing-table">
                                            <div class="pricing-card"
                                                 data-id="${pkg.id}"
                                                 data-price="${pkg.price}"
                                                 data-duration="${pkg.hours}">
                                                <h3>${ lang === 'ar' ? pkg.name : pkg.name_en }</h3>
                                                <div class="price" style="color:black;">
                                                    ${Math.floor(pkg.price)}
                                                    <sup>.${(pkg.price % 1).toFixed(2).split('.')[1]}
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                             viewBox="0 0 1124.14 1256.39">
                                                            <defs>
                                                                <style>.cls-1{fill:#000;}</style>
                                                            </defs>
                                                            <path class="cls-1"
                                                                  d="M699.62,1113.02h0c-20.06,44.48-33.32,92.75-38.4,143.37l424.51-90.24c20.06-44.47,33.31-92.75,38.4-143.37l-424.51,90.24Z"/>
                                                            <path class="cls-1"
                                                                  d="M1085.73,895.8c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.33v-135.2l292.27-62.11c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.27V66.13c-50.67,28.45-95.67,66.32-132.25,110.99v403.35l-132.25,28.11V0c-50.67,28.44-95.67,66.32-132.25,110.99v525.69l-295.91,62.88c-20.06,44.47-33.33,92.75-38.42,143.37l334.33-71.05v170.26l-358.3,76.14c-20.06,44.47-33.32,92.75-38.4,143.37l375.04-79.7c30.53-6.35,56.77-24.4,73.83-49.24l68.78-101.97v-.02c7.14-10.55,11.3-23.27,11.3-36.97v-149.98l132.25-28.11v270.4l424.53-90.28Z"/>
                                                        </svg>
                                                    </sup>
                                                </div>
                                                <ul class="features">
                                                    ${pkg.feature_1 ? `<h5><del>${ lang === 'ar' ? pkg.feature_1 : pkg.feature_1_en }</del></h5>` : ''}
                                                    ${pkg.feature_2 ? `<li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i> ${ lang === 'ar' ? pkg.feature_2 : pkg.feature_2_en }</li>` : ''}
                                                    ${pkg.feature_3 ? `<li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i> ${ lang === 'ar' ? pkg.feature_3 : pkg.feature_3_en }</li>` : ''}
                                                    ${pkg.feature_4 ? `<li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i> ${ lang === 'ar' ? pkg.feature_4 : pkg.feature_4_en }</li>` : ''}
                                                    ${pkg.feature_5 ? `<li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i> ${ lang === 'ar' ? pkg.feature_5 : pkg.feature_5_en }</li>` : ''}
                                                    ${pkg.feature_6 ? `<li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i> ${ lang === 'ar' ? pkg.feature_6 : pkg.feature_6_en }</li>` : ''}
                                                    ${pkg.feature_7 ? `<li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i> ${ lang === 'ar' ? pkg.feature_7 : pkg.feature_7_en }</li>` : ''}
                                                    ${pkg.feature_8 ? `<li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i> ${ lang === 'ar' ? pkg.feature_8 : pkg.feature_8_en }</li>` : ''}
                                                    ${pkg.feature_9 ? `<li style="direction: {{ $direction }} !important;text-align: {{ $textAlign }}!important; color:black;"><i class="fas fa-check" style="color: green;"></i> ${ lang === 'ar' ? pkg.feature_9 : pkg.feature_9_en }</li>` : ''}
                                                </ul>
                                                <div class="time-s">
                                                    <i class="fas fa-clock"></i> ${pkg.hours} ${hoursText}
                                                </div>
                                                <button class="select-plan">{{ __('messages.choose_this_service') }}</button>
                                            </div>
                                        </div>
                                    `);
                                });

                                // استعادة حالة الباقات المختارة
                                $('.pricing-card').each(function() {
                                    const card = $(this);
                                    const id = parseInt(card.data('id'));
                                    if (selectedPackagesIds.includes(id)) {
                                        card.addClass('selected');
                                        card.find('.select-plan').text('{{ __('messages.selected') }}');
                                    }
                                });

                                addCardClickHandlers();
                            } else {
                                $('#package-list').append('<li>لا توجد حزم متاحة لهذه الفئة.</li>');
                            }
                        },
                        error: function() {
                            $('#package-list').append('<li>حدث خطأ في جلب الحزم.</li>');
                        }
                    });
                }
            }

            // عند اختيار حجم السيارة: تصفير كل الاختيارات
            carTypes.on('click', function() {
                currentIndex = $(this).data('index');
                updateActiveCar(currentIndex);

                selectedBasicServices = [];
                selectedPackagesIds = [];
                selectedAdditionalServices = [];
                selectedFlatbed = null;

                $('.pricing-card').removeClass('selected');
                $('.pricing-card .select-plan').text('{{ __('messages.choose_this_service') }}');
                $('.service').removeClass('selected');
                $('.option-item').removeClass('selected');

                $('#basic_service').val('[]');
                $('#services_additional').val('[]');
                $('#flatbed_id').val('');
                $('#total-price').text(' 0.00 ');
                $('#final_price').val('0.00');
                $('#total-duration').text(`0 {{ __('messages.hours') }} `);
                $('#duration').val(0);
                $('#selected-services').text('اختر الخدمات');

                loadPackagesAndCategories();
            });

            // اختيار الكاتيجوري
            packageOptions.on('click', function() {
                packageOptions.removeClass('selected');
                $(this).addClass('selected');
                loadPackagesAndCategories();
            });

            // أزرار السلايدر للسيارات
            prevButton.on('click', showPrevCar);
            nextButton.on('click', showNextCar);

            // التعامل مع بطاقات الخدمات الأساسية
            function addCardClickHandlers() {
                $('.pricing-card').each(function() {
                    const card = $(this);
                    const button = card.find('.select-plan');

                    if (button.length > 0) {
                        button.off('click').on('click', () => {
                            const serviceName = card.find('h3').text();
                            const isSelected = card.hasClass('selected');
                            const id = parseInt(card.data('id'));

                            if (isSelected) {
                                selectedBasicServices = selectedBasicServices.filter(s => s !== serviceName);
                                selectedPackagesIds = selectedPackagesIds.filter(x => x !== id);
                            } else {
                                if (!selectedBasicServices.includes(serviceName)) {
                                    selectedBasicServices.push(serviceName);
                                }
                                if (!selectedPackagesIds.includes(id)) {
                                    selectedPackagesIds.push(id);
                                }
                            }

                            card.toggleClass('selected');
                            button.text(card.hasClass('selected')
                                ? '{{ __('messages.selected') }}'
                                : '{{ __('messages.choose_this_service') }}');

                            document.getElementById('basic_service').value = JSON.stringify(selectedPackagesIds);

                            updateSelectedServices();
                        });
                    }
                });
            }

            // اختيار خدمة إضافية
            $('.service').on('click', function() {
                const serviceName = $(this).find('h3').text();
                const isSelected = $(this).hasClass('selected');

                if (isSelected) {
                    selectedAdditionalServices = selectedAdditionalServices.filter(s => s !== serviceName);
                } else {
                    if (!selectedAdditionalServices.includes(serviceName)) {
                        selectedAdditionalServices.push(serviceName);
                    }
                }

                $(this).toggleClass('selected');

                const selectedServices = document.querySelectorAll('.service.selected');
                const servicesIds = [];
                selectedServices.forEach(service => {
                    const serviceId = service.getAttribute('data-id');
                    servicesIds.push(serviceId);
                });
                document.getElementById('services_additional').value = JSON.stringify(servicesIds);

                updateSelectedServices();
            });

            // حساب السعر والمدة + تحديث الملخص (الأساسيات عبر IDs + packagesData)
            function updateSelectedServices(isFlatbedSelected, flatbedId) {
                const allSelectedServices = [...selectedBasicServices, ...selectedAdditionalServices];
                let totalPrice = 0;
                let totalDuration = 0;

                // الباقات الأساسية من selectedPackagesIds باستخدام packagesData
                selectedPackagesIds.forEach(id => {
                    if (packagesData[id]) {
                        totalPrice += packagesData[id].price || 0;
                        totalDuration += packagesData[id].duration || 0;
                    }
                });

                // الخدمات الإضافية (ثابتة في الـ DOM)
                selectedAdditionalServices.forEach(service => {
                    const card = $(`.service:contains('${service}')`);
                    if (card.length > 0) {
                        totalPrice += parseFloat(card.data('price')) || 0;
                        totalDuration += parseInt(card.data('duration')) || 0;
                    }
                });

                // السطحة
                if (selectedFlatbed) {
                    if (!isFlatbedSelected) {
                        totalPrice += parseFloat(selectedFlatbed.find('.option-price').text()) || 0;
                        document.getElementById('flatbed_id').value = flatbedId || selectedFlatbed.data('id');
                    } else {
                        document.getElementById('flatbed_id').value = '';
                    }
                }

                $('#total-duration').text(`${totalDuration} {{ __('messages.hours') }} `);
                $('#duration').val(totalDuration);

                $('#total-price').text(` ${totalPrice.toFixed(2)} `);
                $('#final_price').val(`${totalPrice.toFixed(2)}`);

                if (allSelectedServices.length > 0 || selectedFlatbed) {
                    $('#selected-services').text(
                        allSelectedServices.concat(selectedFlatbed ? [selectedFlatbed.find('h3').text()] : []).join(', ')
                    );
                } else {
                    $('#selected-services').text('اختر الخدمات');
                }

                applyDiscountIfExists(totalPrice);
            }

            // السطحة
            $('.option-item').on('click', function() {
                selectedFlatbed = $(this);
                const flatbedId = selectedFlatbed.data('id');
                const isSelected = selectedFlatbed.hasClass('selected');

                if (!isSelected) {
                    $('.option-item').removeClass('selected');
                    $(this).addClass('selected');
                } else {
                    $('.option-item').removeClass('selected');
                }

                updateSelectedServices(isSelected, flatbedId);
            });

            // تطبيق الخصم لو كود موجود
            function applyDiscountIfExists(totalPrice) {
                const discountCode = $('#discountCode').val();
                if (!discountCode) return;

                $.ajax({
                    url: '/api/check-coupon',
                    method: 'POST',
                    data: {
                        code: discountCode,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status) {
                            let finalPrice = totalPrice;
                            if (response.type === 'percent') {
                                finalPrice -= totalPrice * (response.discount / 100);
                            } else if (response.type === 'fixed') {
                                finalPrice -= response.discount;
                            }

                            $('#finalPrice').html(' ' + finalPrice.toFixed(2));
                            $('#offer').val(finalPrice.toFixed(2));
                            $('#coupon_id').val(response.coupon_id);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('حدث خطأ أثناء التحقق من الكود.');
                    }
                });
            }
        });
    </script>

    {{-- 7) التحكم في إظهار خيارات السطحة الإضافية --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const additionalCheckbox = document.getElementById('additionalOptionsCheckbox');
            const additionalOptions = document.querySelector('.additional-options');

            additionalOptions.style.display = 'none';

            additionalCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    additionalOptions.classList.remove('fade-out');
                    additionalOptions.classList.add('fade-in');
                    additionalOptions.style.display = 'flex';
                } else {
                    additionalOptions.classList.remove('fade-in');
                    additionalOptions.classList.add('fade-out');
                    setTimeout(() => {
                        additionalOptions.style.display = 'none';
                    }, 500);
                }
            });
        });
    </script>

    {{-- 8) تحديث ملخص المنطقة والفرع --}}
    <script>
        document.getElementById('booking-form-governorate').addEventListener('change', () => {
            const governorate = document.getElementById('booking-form-governorate').selectedOptions[0].text;
            document.getElementById('selected-governorate').textContent = governorate;
        });

        document.getElementById('booking-form-branch').addEventListener('change', () => {
            const branch = document.getElementById('booking-form-branch').selectedOptions[0].text;
            document.getElementById('selected-branch').textContent = branch;

            const branchId = document.getElementById('booking-form-branch').value;
            document.getElementById('id_branch').value = branchId;
        });
    </script>

    {{-- 9) نافذة دليل حجم السيارة --}}
    <script>
        function openModal() {
            document.getElementById("modal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("modal").style.display = "none";
        }

        window.onclick = function(event) {
            const modal = document.getElementById("modal");
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>

    {{-- 10) أسماء الشهور والأيام حسب اللغة --}}
    @if(App::getLocale() === 'en')
        <script>
            const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            const dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        </script>
    @else
        <script>
            const monthNames = ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"];
            const dayNames = ["الأحد", "الاثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"];
        </script>
    @endif

    {{-- 11) التقويم + الأوقات --}}
    <script>
        const calendarDays = document.getElementById('calendar-days');
        const currentMonthYear = document.getElementById('current-month-year');
        const prevMonthButton = document.getElementById('prev-month');
        const nextMonthButton = document.getElementById('next-month');

        let date = new Date();
        let bookedTimes = [];

        function updateCalendar(branchId, selectedDate) {
            fetch(`/api/booked-times/${branchId}/${selectedDate}`)
                .then(response => {
                    if (!response.ok) throw new Error('Failed to fetch booked times.');
                    return response.json();
                })
                .then(data => {
                    bookedTimes = data.bookedTimes;

                    const previouslySelected = document.querySelector('.calendar-days .selected');
                    const previouslySelectedDate = previouslySelected ? previouslySelected.textContent : null;

                    renderCalendar();

                    if (previouslySelectedDate) {
                        const refreshedDay = Array.from(document.querySelectorAll('.calendar-days button'))
                            .find(button => button.textContent === previouslySelectedDate);
                        if (refreshedDay) {
                            refreshedDay.classList.add('selected');
                        }
                    }

                    updateTimeButtons();
                })
                .catch(error => console.error('Error fetching booked times:', error));
        }

        function renderCalendar() {
            const year = date.getFullYear();
            const month = date.getMonth();

            currentMonthYear.textContent = `${monthNames[month]} ${year}`;
            calendarDays.innerHTML = '';

            dayNames.forEach(day => {
                const dayNameDiv = document.createElement('div');
                dayNameDiv.textContent = day;
                dayNameDiv.classList.add('day-name');
                calendarDays.appendChild(dayNameDiv);
            });

            const firstDayOfMonth = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            for (let i = 0; i < firstDayOfMonth; i++) {
                const emptyDiv = document.createElement('div');
                calendarDays.appendChild(emptyDiv);
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const dayDiv = document.createElement('button');
                dayDiv.textContent = day;

                const today = new Date();
                if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                    dayDiv.classList.add('active');
                }

                if (bookedTimes.includes(`${day.toString().padStart(2, '0')}:00:00`)) {
                    dayDiv.classList.add('disabled');
                    dayDiv.disabled = true;
                }

                calendarDays.appendChild(dayDiv);
            }
        }

function handleDayClick(event) {
    const selectedDay = event.target;
    if (selectedDay.tagName === 'BUTTON' && !selectedDay.classList.contains('disabled')) {
        event.preventDefault();

        const year = date.getFullYear();
        const month = date.getMonth();
        const day = parseInt(selectedDay.textContent);

        const today = new Date();
        const selectedDate = new Date(year, month, day);

        // 🚫 منع اختيار يوم الجمعة
        if (selectedDate.getDay() === 5) {
            alert('لا يمكن اختيار يوم الجمعة');
            return;
        }

        if (selectedDate <= today) {
            alert('لا يمكنك اختيار يوم سابق لليوم الحالي');
            return;
        }

        const formattedDate = `${year}-${(month + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
        const branchId = document.getElementById('booking-form-branch').value;

        if (!branchId) {
            alert('يرجى اختيار فرع أولاً');
            return;
        }

        const previouslySelected = document.querySelector('.calendar-days .selected');
        if (previouslySelected && previouslySelected !== selectedDay) {
            previouslySelected.classList.remove('selected');
        }

        selectedDay.classList.add('selected');

        updateCalendar(branchId, formattedDate);

        setTimeout(() => {
            const refreshedDay = document.querySelector(`.calendar-days button[data-date="${formattedDate}"]`);
            if (refreshedDay) {
                refreshedDay.classList.add('selected');
            }
        }, 0);

        updateTimeButtons();

        date = selectedDate;

        const formattedDateDisplay =
            `${dayNames[selectedDate.getDay()]}, ${selectedDate.getDate()} ${monthNames[selectedDate.getMonth()]} ${selectedDate.getFullYear()}`;
        document.getElementById('booking-date').textContent = formattedDateDisplay;

        const formattedDateForInput =
            `${selectedDate.getFullYear()}-${String(selectedDate.getMonth() + 1).padStart(2, '0')}-${String(selectedDate.getDate()).padStart(2, '0')}`;
        document.getElementById('data').value = formattedDateForInput;
    }
}


        function updateTimeButtons() {
            const timeButtonsContainer = document.getElementById('time-buttons');
            const availableTimes = [
                "PM 12:00", "PM 1:00", "PM 2:00", "PM 3:00",
                "PM 4:00", "PM 5:00", "PM 6:00", "PM 7:00",
                "PM 8:00", "PM 9:00", "PM 10:00"
            ];

            timeButtonsContainer.innerHTML = '';

            availableTimes.forEach(time => {
                const button = document.createElement('button');
                button.textContent = time;

                if (bookedTimes.includes(time)) {
                    button.classList.add('disabled');
                    button.disabled = true;
                }

                timeButtonsContainer.appendChild(button);
            });
        }

        calendarDays.addEventListener('click', handleDayClick);

        prevMonthButton.addEventListener('click', () => {
            date.setMonth(date.getMonth() - 1);
            renderCalendar();
        });

        nextMonthButton.addEventListener('click', () => {
            date.setMonth(date.getMonth() + 1);
            renderCalendar();
        });

        function handleTimeButtonClick(event) {
            const selectedTime = event.target;
            if (selectedTime.tagName === 'BUTTON' && !selectedTime.classList.contains('disabled')) {
                const previouslySelected = document.querySelector('.time-buttons .selected-time');
                if (previouslySelected) {
                    previouslySelected.classList.remove('selected-time');
                }
                selectedTime.classList.add('selected-time');

                document.getElementById('booking-time').textContent = `${selectedTime.textContent}`;
                document.getElementById('time').value = `${selectedTime.textContent}`;
            }
        }

        document.querySelector('.time-buttons').addEventListener('click', handleTimeButtonClick);

        document.addEventListener('DOMContentLoaded', function() {
            const governorateSelect = document.getElementById('booking-form-governorate');
            const branchSelect = document.getElementById('booking-form-branch');
            const currentLang = "{{ app()->getLocale() }}";

            governorateSelect.addEventListener('change', function() {
                const governorateId = governorateSelect.value;
                if (governorateId) {
                    fetch(`/api/branches/${governorateId}`)
                        .then(response => {
                            if (!response.ok) throw new Error('Failed to fetch branches.');
                            return response.json();
                        })
                        .then(data => {
                            branchSelect.innerHTML = '<option value="" disabled selected>{{ __('messages.choose_branch') }}</option>';
                            if (data.length > 0) {
                                branchSelect.disabled = false;
                                data.forEach(branch => {
                                    const option = document.createElement('option');
                                    option.value = branch.id;
                                    option.textContent =
                                        currentLang === 'ar'
                                            ? `${branch.branch_name_ar} - ${branch.branch_address_ar}`
                                            : `${branch.branch_name} - ${branch.branch_address}`;
                                    branchSelect.appendChild(option);
                                });
                            } else {
                                branchSelect.disabled = true;
                            }
                        })
                        .catch(error => console.error('Error fetching branches:', error));
                } else {
                    branchSelect.innerHTML = '<option value="" disabled selected>{{ __('messages.choose_branch') }}</option>';
                    branchSelect.disabled = true;
                }
            });

            branchSelect.addEventListener('change', function() {
                const branchId = branchSelect.value;
                const today = new Date();
                const selectedDate = `${today.getFullYear()}-${(today.getMonth() + 1).toString().padStart(2, '0')}-${today.getDate().toString().padStart(2, '0')}`;

                if (branchId) {
                    updateCalendar(branchId, selectedDate);
                }
            });
        });

        renderCalendar();
    </script>

    {{-- 12) زر تطبيق الكوبون --}}
    <script>
        $(document).ready(function() {
            $('#applyDiscount').click(function(e) {
                e.preventDefault();

                var discountCode = $('#discountCode').val();
                var totalPriceText = $('#total-price').text().trim();
                var totalPrice = parseFloat(totalPriceText.replace(/[^\d.]/g, ''));

                $.ajax({
                    url: '/api/check-coupon',
                    method: 'POST',
                    data: {
                        'code': discountCode,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status) {
                            var finalPrice = totalPrice;
                            if (response.type === 'percent') {
                                finalPrice -= totalPrice * (response.discount / 100);
                            } else if (response.type === 'fixed') {
                                finalPrice -= response.discount;
                            }

                            $('#finalPrice').html('  ' + finalPrice.toFixed(2));
                            $('#offer').val(finalPrice.toFixed(2));
                            $('#coupon_id').val(response.coupon_id);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function() {
                        alert('حدث خطأ أثناء التحقق من الكود.');
                    }
                });
            });
        });
    </script>

    {{-- 13) حفظ car_id في hidden عند اختيار السيارة --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carTypesEls = document.querySelectorAll('.car-type');

            carTypesEls.forEach(function(carType) {
                carType.addEventListener('click', function() {
                    const carId = this.getAttribute('data-car-id');
                    document.getElementById('car_id').value = carId;
                });
            });
        });
    </script>
@endsection
