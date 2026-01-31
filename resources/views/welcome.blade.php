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
        
            .swiper {
                width: 100%;
                max-height: 550px;
                height: 550px;
            }

            .swiper-slide {
                position: relative;
                text-align: center;
                font-size: 18px;
                background: var(--cc-secondary);
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                height: 100%;
            }

            .swiper-slide img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 5s ease;
            }

            .swiper-slide-active img {
                transform: scale(1.05); /* Zoom effect */
            }

            .slide-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                z-index: 2;
                width: 100%;
                max-width: 90%;
            }

            .slide-title {
                font-size: 32px;
                margin-bottom: 20px;
                color: var(--cc-third);
                text-shadow: 0 0 5px var(--cc-secondary);
            }

            .slide-buttons button {
                margin: 10px;
                padding: 12px 24px;
                font-size: 16px;
                border: none;
                border-radius: 5px;
                background-color: rgba(255, 255, 255, 0.8);
                color: var(--cc-secondary);
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .slide-buttons button:hover {
                background-color: var(--cc-third);
            }

            .swiper-button-next,
            .swiper-button-prev {
                color: var(--cc-third);
            }

            .swiper-pagination {
                bottom: 5px;
            }

            @media (max-width: 768px) {
                .swiper.mySwiper {
                    max-height: 230px !important;
                }
            }
        </style>
    <style>

        body > h1{
            display: none;
        }

        /* الحاوية الرئيسية للسلايدر */
        .custom-slider-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* السلايدر */
        .custom-slider {
            display: flex;
            gap: 20px; /* تباعد بين المنتجات */
            transition: transform 0.5s ease-in-out;
            will-change: transform;
        }

        /* المنتجات */
        .custom-product {
            flex: 0 0 25%;
            box-sizing: border-box;
            padding: 10px;
            background: var(--cc-third);
            border: 1px solid #e5e5e5;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .custom-product:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* الصور */
        .custom-product-image {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 8px;
        }

        /* النصوص */
        .custom-product-info h3 {
            font-size: 1.2rem;
            color: #333;
            margin: 10px 0 5px;
        }

        .custom-product-info p {
            font-size: 0.9rem;
            color: #555;
        }

        .custom-product-info{
            display: grid;
        }

        .custom-price {
            font-size: 1.2rem;
            color: var(--cc-primary);
            font-weight: bold;
        }

        .custom-d-flix del {
            font-size: 0.9rem;
            color: #888;
        }

        .custom-d-flix {
            display: flex;
            justify-content: center;
        }

        /* زر "إضافة إلى السلة" */
        .custom-add-to-cart-btn {
            background: var(--cc-primary) !important;
            color: var(--cc-third);
            border: none;
            padding: 10px 15px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            font-family: 'Tajawal', sans-serif;
        }

        .custom-add-to-cart-btn:hover {
            background: var(--cc-primary);
            transform: scale(1.05); /* تكبير الزر قليلاً عند التمرير */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* أزرار التحكم */
        .custom-ctrl-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            font-size: 2rem;
            color: var(--cc-primary);
            cursor: pointer;
            z-index: 10;
            transition: color 0.3s, transform 0.3s;
        }

        .custom-ctrl-btn:hover {
            color: var(--cc-primary);
            transform: scale(1.2); /* تكبير الأيقونة قليلاً */
        }

        .custom-prev-btn {
            left: 10px;
        }

        .custom-next-btn {
            right: 10px;
        }
        /* التصميم الافتراضي لأجهزة التابلت (عرض بين 768px و 1024px) */
        @media (max-width: 1024px) and (min-width: 768px) {
            .custom-product {
                flex: 0 0 33.33%; /* ثلاث منتجات في الصف */
                padding: 8px;
            }

            .custom-ctrl-btn {
                font-size: 1.8rem; /* تقليل حجم الأيقونات */
            }

            .custom-add-to-cart-btn {
                font-size: 0.9rem; /* تصغير الزر قليلاً */
                padding: 8px 12px;
            }
        }
        .features {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(4, 1fr); /* الوضع العادي: 4 أعمدة */
            padding: 20px;
        }

        .feature {
            background-color: var(--cc-secondary)00;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: var(--cc-secondary);
        }

        /* للصور أو الأيقونات */
        .feature img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        /* ميديا كويري للموبايل: 2 أعمدة فقط */
        @media (max-width: 768px) {
            .features {
                grid-template-columns: repeat(2, 1fr) !important;
            }
        }

        /* شاشة أصغر (اختياري): عمود واحد فقط */
        @media (max-width: 480px) {
            .features {
                grid-template-columns: 1fr;
            }
        }

        /* التصميم لأجهزة الموبايل (عرض أقل من 768px) */
        @media (max-width: 768px) {
            .custom-slider-container {
                padding: 5px; /* تقليل الحواف الخارجية */
            }

            .custom-slider {
                gap: 10px; /* تقليل المسافات بين العناصر */
            }

            .custom-product {
                flex: 0 0 100%; /* منتجان فقط في الصف */
                padding: 5px;
            }

            .custom-product-image {
                border-radius: 5px; /* تقليل التقوس للصور */
            }

            .custom-product-info h3 {
                font-size: 1rem; /* تصغير العناوين */
            }

            .custom-product-info p {
                font-size: 0.8rem; /* تصغير الوصف */
            }

            .custom-add-to-cart-btn {
                font-size: 0.8rem; /* تصغير زر السلة */
                padding: 6px 10px;
            }

            .custom-ctrl-btn {
                font-size: 1.5rem; /* تقليل حجم الأيقونات */
            }

            .custom-prev-btn {
                left: 5px; /* تعديل المسافة من اليسار */
            }

            .custom-next-btn {
                right: 5px; /* تعديل المسافة من اليمين */
            }
        }

        .product-info p {
            color: #666;
            display: none;
        }
        .d_flix{
            display: flex;
            justify-content: center;
        }

        body > div.template-content > div.template-section.template-section-padding-1.template-clear-fix.template-main > div.template-layout-33x66.template-clear-fix > div.template-layout-column-right > p {
            text-align: right !important;
            color: var(--cc-secondary);
        }

        .template-padding-reset {
            direction: rtl;
            font-size: 20px;
            line-height: 34px;
            font-weight: 610;
        }

        /*المنتاجات*/
        .product-section {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: withe;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: var(--cc-primary); /* لون الموقع الأساسي */
            text-align: center;
        }

        .product-container {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            gap: 20px;
            padding-bottom: 20px;
        }

        .product {
            flex: 0 0 auto;
            width: 250px; /* عرض ثابت للمنتج */
            box-sizing: border-box;
            background-color: var(--cc-third);
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .product:hover {
            transform: scale(1.05);
        }

        .product-image {
            width: 100%;
            height: 100%; /* تحديد ارتفاع موحد للصورة */
            object-fit: cover; /* ضمان ملاءمة الصورة ضمن العنصر */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .product-info {
            padding: 9px;
            text-align: center;
        }

        .product-info h3 {
            margin: 10px 0;
            color: #333;
        }

        .price {
            font-size: 25px !important;
            color: var(--cc-primary);
            margin: 5px 0;
            padding: 4px;
        }

        .product-info p {
            color: #666;
        }

        .add-to-cart-btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            font-size: 16px;
            font-weight: bold;
            color: var(--cc-third);
            background-color: var(--cc-primary); /* لون الموقع الأساسي */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .add-to-cart-btn:hover {
            background-color: var(--cc-primary); /* لون أغمق قليلاً لتأثير الهوفير */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .add-to-cart-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* استجابة لشاشات الهاتف المحمول */
        @media (max-width: 768px) {
            .product-container {
                display: flex;
                flex-wrap: nowrap;
            }

            /*.banner {*/
            /*    margin-top: 60px;*/
            /*}*/

            .product {
                width: 45%; /* عرض كل منتج ليظهر بشكل جيد على الهواتف */
            }
        }

        .template-background-image-1 {
            position: relative;
            overflow: hidden;
        }

        .template-layout-flex {
            display: flex;
            flex-wrap: wrap; /* Allow wrapping on smaller screens */
        }

        .products-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .product {
            background-color: var(--cc-third);
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .product:hover {
            transform: scale(1.05);
        }

        section {
            display: grid;
            place-items: center;
            background: rgb(255, 255, 255);
        }

        .slider {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 80%;
            overflow: hidden;
            background: rgb(255, 255, 255);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(7.4px);
            -webkit-backdrop-filter: blur(7.4px);
            border: 1px solid rgb(255, 255, 255);
            position: relative;
        }

        .slider-items {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            animation: scrolling 20s linear infinite;
        }

        @keyframes scrolling {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .slider-items img {
            width: 50%;
            margin: 20px;
            object-fit: contain;
            max-height: 115px; /* لضمان تناسب الصورة */
        }

        .slider:hover .slider-items {
            animation-play-state: paused; /* توقف الحركة عند مرور الماوس */
        }

        /*///////////////*/
        .banner {
            background-color: var(--cc-primary);
            color: var(--cc-third);
            text-align: left;
            padding: 50px 0;
            position: relative;
            overflow: hidden; /* Prevent overflow if zooming out of bounds */
        }

        .banner::before {
            content: '';
            display: block;
            background-color: var(--cc-primary);
            height: 200px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .banner-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 50px;
        }

        .banner-text {
            font-size: 24px;
            font-weight: bold;
            margin-left: 20%;
            transition: transform .5s;
        }

        .banner-text-p {
            font-size: 30px;
            padding: 25px 0 10px 0 !important;
            transition: transform .5s;
        }

        .banner-text span {
            color: #1c1c1c;
        }

        .banner-button {
            background-color: var(--cc-secondary);
            color: var(--cc-third)fff;
            border: none;
            padding: 30px 50px;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            margin-right: 15%;
            transition: transform .5s;
        }

        .banner-button i {
            margin-left: 10px;
        }

        .banner-image {
            position: absolute;
            top: 30px;
            right: 883px;
            z-index: 1;
            transition: transform .5s;
            height: 305px;
        }

        .banner-image2 {
            position: absolute;
            top: 34px;
            right: 680px;
            z-index: 1;
            transition: transform .5s;
            height: 300px;
        }

        .banner-button:hover, .banner-image2:hover, .banner-image:hover, .banner-text:hover {
            transform: scale(1.2);
        }

        /* استعلامات الوسائط للأجهزة اللوحية */
        @media (max-width: 1024px) {
            .template-header .template-header-top .template-header-top-icon-list {

                margin: 7px 335px 29px 0;
            }

            .template-header .template-header-top .template-header-top-icon-list .template-icon-meta-menu:before {
                top: 12px;
                font-size: 40px;
            }

            i.template-icon-meta-menu {
                width: 70px;
                height: 70px;
            }

            .banner-content {
                flex-direction: column; /* ترتيب المحتوى عمودياً */
                align-items: center; /* توسيط المحتوى */
                padding: 0 20px; /* تقليل padding */
                margin-top: 115px;
            }

            .banner-text {
                margin-left: 0; /* إزالة الهامش الأيسر */
                text-align: center; /* توسيط النص */
            }

            .banner-text-p {
                font-size: 24px; /* تقليل حجم الخط */
            }

            .banner-button {
                padding: 20px 40px; /* تقليل padding */
                margin: 20px 0; /* إضافة مسافة فوق وتحت الزر */
            }

            .banner-image {
                right: 57%;
                transform: translateX(50%);
                top: -20px;
                height: 200px;
                width: 205px;
            }

            .banner-image2 {
                right: 43%;
                transform: translateX(50%);
                top: -28px;
                height: 180px;
                width: 180px;
            }
        }

        .template-header .template-header-top .template-header-top-icon-list .template-icon-meta-menu:before {
            color: var(--cc-primary);
        }

        /* استعلامات الوسائط للهواتف المحمولة */
        @media (max-width: 768px) {
            .template-header .template-header-top .template-header-top-icon-list {
                margin: 0 168px 28px 5px;
            }

            .template-header .template-header-top .template-header-top-icon-list .template-icon-meta-menu:before {
                top: 0;
                font-size: 40px;
                right: 2px;
                color: var(--cc-primary);
            }

            .template-header .template-header-top .template-header-top-icon-list .template-icon-meta-menu:before {
                top: 0;
                font-size: 40px;
            }

            i.template-icon-meta-menu {
                width: 70px;
                height: 70px;
            }

            .banner-content {
                padding: 0 10px; /* تقليل padding */
                margin-top: 115px;
            }

            .banner-text {
                font-size: 20px; /* تقليل حجم الخط */
                text-align: center; /* توسيط النص */
            }

            .banner-text-p {
                font-size: 22px; /* تقليل حجم الخط */
                padding: 15px 0 5px 0 !important; /* تعديل padding */
            }

            .banner-button {
                padding: 15px 30px; /* تقليل padding */
                font-size: 14px; /* تقليل حجم الخط */
                margin: 10px 0; /* إضافة مسافة فوق وتحت الزر */
            }

            .banner-image {
                right: 57%;
                transform: translateX(50%);
                top: 0;
                height: 200px;
                width: 205px;
            }

            .banner-image2 {
                right: 43%;
                transform: translateX(50%);
                top: 0;
                height: 180px;
                width: 180px;
            }
        }


        .slider-section {
            display: flex;
            background-color: var(--cc-secondary);
            color: var(--cc-third);
        }

        .description {
            flex: 0 0 30%; /* 30% لوصف */
            padding: 20px;
        }

        .image-slider {
            flex: 0 0 70%; /* 70% لصورة قبل وبعد */
            position: relative;
        }

        .image-slider .slide {
            display: none;
        }

        .image-slider .active {
            display: block;
        }

        .image-slider img {
            width: 100%;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .slider-wrapper {
            position: relative;
        }

        .slider-wrapper .slide-button {
            position: absolute;
            top: 50%;
            outline: none;
            border: none;
            height: 50px;
            width: 50px;
            z-index: 5;
            color: var(--cc-third);
            display: flex;
            cursor: pointer;
            font-size: 2.2rem;
            background: var(--cc-secondary);
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transform: translateY(-50%);
        }

        .slider-wrapper .slide-button:hover {
            background: #404040;
        }

        .slider-wrapper .slide-button#prev-slide {
            left: -25px;
            display: none;
        }

        .slider-wrapper .slide-button#next-slide {
            right: -25px;
        }

        .slider-wrapper .image-list {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            gap: 18px;
            font-size: 0;
            list-style: none;
            margin-bottom: 30px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .slider-wrapper .image-list::-webkit-scrollbar {
            display: none;
        }

        .slider-wrapper .image-list .image-item {
            width: 325px;
            height: 400px;
            object-fit: cover;
        }

        .container .slider-scrollbar {
            height: 24px;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .slider-scrollbar .scrollbar-track {
            background: #ccc;
            width: 100%;
            height: 2px;
            display: flex;
            align-items: center;
            border-radius: 4px;
            position: relative;
        }

        .slider-scrollbar:hover .scrollbar-track {
            height: 4px;
        }

        .slider-scrollbar .scrollbar-thumb {
            position: absolute;
            background: var(--cc-secondary);
            top: 0;
            bottom: 0;
            width: 50%;
            height: 100%;
            cursor: grab;
            border-radius: inherit;
        }

        .slider-scrollbar .scrollbar-thumb:active {
            cursor: grabbing;
            height: 8px;
            top: -2px;
        }

        .slider-scrollbar .scrollbar-thumb::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: -10px;
            bottom: -10px;
        }

        /* Styles for mobile and tablets */
        @media only screen and (max-width: 1023px) {
            .slider-wrapper .slide-button {
                display: none !important;
            }

            .slider-wrapper .image-list {
                gap: 10px;
                margin-bottom: 15px;
                scroll-snap-type: x mandatory;
            }

            .slider-wrapper .image-list .image-item {
                width: 280px;
                height: 380px;
            }

            .slider-scrollbar .scrollbar-thumb {
                width: 20%;
            }
        }


        .sec-1 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .sec-1header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sec-1header .text {
            max-width: 50%;
            padding: 20px;
        }

        .sec-1header .text h1 {
            font-size: 36px;
            font-weight: 700;
            margin: 0;
        }

        .sec-1header .text h2 {
            font-size: 18px;
            font-weight: 700;
            color: var(--cc-primary);
            margin: 0 0 20px 0;
        }

        .sec-1header .text p {
            font-size: 16px;
            line-height: 1.5;
            margin: 20px 0;
        }

        .sec-1header .text .call {
            font-size: 18px;
            font-weight: 700;
            color: var(--cc-secondary);
            margin: 20px 0;
            direction: rtl;
        }

        .sec-1header .text .btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: var(--cc-primary);
            color: var(--cc-third);
            text-decoration: none;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 700;
        }

        .sec-1header .text .btn i {
            margin-left: 10px;
        }

        .sec-1header .sec-image {
            max-width: 50%;
        }

        .sec-1header .sec-image img {
            width: 100%;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1); /* تكبير بسيط في المنتصف */
            }
            100% {
                transform: scale(1);
            }
        }

        /* أو أنيميشن الاهتزاز اللطيف */
        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-2px); /* يتحرك قليلًا لليسار */
            }
            75% {
                transform: translateX(2px); /* يتحرك قليلًا لليمين */
            }
        }

        /* تطبيق أنيميشن النبض أو الاهتزاز على الصور */
        .features .feature img {
            display: inline-block;
            animation: pulse 1.5s ease-in-out infinite; /* لتطبيق النبض */
            /* استخدم هذا السطر إذا أردت الاهتزاز بدلًا من النبض */
            /* animation: shake 0.5s ease-in-out infinite; */
            width: 48px; /* حجم الصورة */
            height: auto; /* للحفاظ على النسبة */
            transition: filter 0.3s ease; /* تأثير سلس لتغيير الفلتر */
        }

        .features .feature img:hover {
            filter: brightness(1.2); /* زيادة السطوع عند التمرير */
        }

        /* تنسيقات التابلت */
        @media (max-width: 991px) {
            .sec-1header {
                flex-direction: column; /* تكديس الصورة والنص فوق بعضهما */
                align-items: center; /* توسيط النص */
                padding: 30px 0; /* تقليل الحشو */
            }

            .sec-1header .text, .sec-1header .sec-image {
                max-width: 100%; /* جعل العرض كاملاً */
            }

            .sec-1header .text h1 {
                font-size: 30px; /* تصغير حجم العنوان */
            }

            .sec-1header .text h2, .sec-1header .text p, .sec-1header .text h5 {
                font-size: 16px;
            }

            .features {
                flex-wrap: wrap; /* وضع العناصر في صفوف */
                padding: 30px 0;
            }

            .features .feature {
                max-width: 45%; /* توزيع العناصر */
                margin-bottom: 20px; /* زيادة التباعد بين العناصر */
            }
        }


        /* تنسيقات الموبايل */
        @media (max-width: 576px) {
            .sec-image {
                display: none;
            }

            .sec-1 {
                padding: 10px; /* تقليل الهوامش الداخلية */
            }

            .sec-1header .text h1 {
                font-size: 24px; /* حجم أصغر للعنوان */
            }

            .sec-1header .text h2, .sec-1header .text p, .sec-1header .text h5 {
                font-size: 14px; /* حجم أصغر للنصوص */
            }

            .sec-1header .text .btn {
                padding: 10px 20px; /* تصغير الزر */
                font-size: 14px;
            }

            .sec-1header {
                padding: 20px 0;
            }

            .features {
                flex-direction: column; /* تكديس العناصر في عمود */
                align-items: center;
            }

            .features .feature {
                max-width: 100%; /* جعل العناصر تأخذ العرض الكامل */
                margin-bottom: 15px;
            }

            .features .feature h3 {
                font-size: 16px; /* تصغير حجم العناوين */
            }

            .features .feature p {
                font-size: 12px; /* حجم أصغر للنص */
            }
        }

        .sec2 {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh; /* يجعل السلايدر يشغل ارتفاع الشاشة بالكامل */
            padding: 20px;
            background-color: var(--cc-secondary);
        }

        .sec2-content {
            margin-top: 30px;

            display: flex;
            max-width: 1200px;
            width: 100%; /* يجعله متجاوباً */
            background-color: #2c2c2c;
            border-radius: 10px;
            overflow: hidden;
            flex-direction: column; /* لجعل العناصر في عمود */
        }

        .image-section {
            flex: 1;
            position: relative;
            text-align: center;
            width: 65%;
        }

        .image-section img {
            width: 100%;
            height: auto; /* تغيير الارتفاع إلى auto لتحسين نسبة العرض إلى الارتفاع */
            object-fit: cover; /* يحافظ على نسبة العرض إلى الارتفاع */
        }

        .text-section {
            background-color: var(--cc-third);
            color: var(--cc-secondary);
            padding: 20px; /* تقليل padding لجعل المحتوى يتناسب بشكل أفضل على الأجهزة الصغيرة */
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 35%;
        }

        .text-section h2 {
            font-size: 24px; /* تقليل حجم الخط */
            margin: 10px 0;
        }

        .text-section h3 {
            font-size: 20px; /* تقليل حجم الخط */
            color: var(--cc-primary);
            margin: 10px 0; /* تقليل المسافة */
        }

        .text-section p {
            font-size: 14px; /* تقليل حجم الخط */
            line-height: 1.5;
            margin-bottom: 10px; /* تقليل المسافة */
        }

        .text-section ul {
            list-style: none;
            padding: 0;
            margin-bottom: 10px; /* تقليل المسافة */
        }

        .text-section ul li {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            direction: rtl;
            text-align: right;
        }

        .text-section ul li i {
            color: #00c853;
            margin-left: 5px; /* تقليل المسافة */
        }

        .button {
            display: inline-block;
            padding: 10px 15px; /* تقليل padding لجعله مناسبًا */
            background-color: var(--cc-primary);
            color: var(--cc-third);
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            margin-top: 10px; /* إضافة مسافة فوق الزر */
        }

        /* تحكم في زر التنقل */
        .navigation {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }

        .navigation i {
            cursor: pointer;
            color: var(--cc-third);
            font-size: 24px;
            margin: 0 10px;
        }

        /* Media Queries لتحسين الاستجابة */
        @media (max-width: 768px) {
            .product {
                width: 250px !important;
            }

            .text-section {
                padding: 15px; /* تقليل padding */
            }

            .text-section h2 {
                font-size: 20px; /* تقليل حجم الخط */
            }

            .text-section h3 {
                font-size: 18px; /* تقليل حجم الخط */
            }

            .text-section p {
                font-size: 13px; /* تقليل حجم الخط */
            }

            .button {
                padding: 8px 12px; /* تقليل padding */
            }

            /* ترتيب العناصر على الشاشة الصغيرة */
            .slider-item {
                flex-direction: column; /* يجعل الصورة فوق التفاصيل */
            }
        }

        @media (max-width: 480px) {
            .comparison-container {
                position: relative;
                width: 300px !important;
                height: 195px !important;
                overflow: hidden;
                display: none;
            }

            .sec2 {
                display: block;
                height: 91vh;

            }

            .text-section {
                padding: 10px; /* تقليل padding */
                width: 100%;
            }

            .image-section {

                width: 100%;
            }

            .text-section h2 {
                font-size: 18px; /* تقليل حجم الخط */
            }

            .text-section h3 {
                font-size: 16px; /* تقليل حجم الخط */
            }

            .text-section p {
                font-size: 12px; /* تقليل حجم الخط */
            }

            .button {
                padding: 5px 10px; /* تقليل padding */
            }

            .navigation i {
                font-size: 20px; /* تقليل حجم الأيقونة */
            }
        }

        .sec3 {
            width: 100%;
            background-color: var(--cc-secondary);
        }

        .cont {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px;
            width: 100%;
            margin: auto;
        }

        .left-section {
            max-width: 30%;
        }

        .left-section h2 {
            color: var(--cc-primary);
            font-size: 14px;
            letter-spacing: 2px;
        }

        .left-section h1 {
            font-size: 36px;
            line-height: 1.2;
            margin: 20px 0;
        }

        .left-section button {
            background-color: var(--cc-primary);
            color: var(--cc-third);
            border: none;
            padding: 15px 30px;
            font-size: 16px;
            border-radius: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .left-section button i {
            margin-left: 10px;
        }

        .left-section .navigation {
            display: flex;
            margin-top: 30px;
        }

        .left-section .navigation div {
            width: 40px;
            height: 40px;
            border: 2px solid var(--cc-third);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            cursor: pointer;
        }

        .left-section .navigation div.active {
            background-color: var(--cc-third);
            color: #121212;
        }

        .middle-section {
            position: relative;
        }

        .middle-section img {
            border-radius: 10px;
            width: 600px;
            height: auto;
        }

        .middle-section .before, .middle-section .after {
            position: absolute;
            font-size: 48px;
            font-weight: bold;
            color: rgba(255, 255, 255, 0.1);
        }

        .middle-section .before {
            top: 10px;
            left: 10px;
        }

        .middle-section .after {
            bottom: 10px;
            right: 10px;
        }

        .right-section {
            max-width: 30%;
            padding: 30px;
        }

        .right-section .feature {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .right-section .feature i {
            font-size: 36px;
            color: var(--cc-primary);
            margin-right: 20px;
        }

        .right-section .feature h3 {
            font-size: 18px;
            margin: 0;
        }

        .right-section .feature p {
            margin: 5px 0 0;
            color: #b0b0b0;
        }

        .left-section button {
            margin: auto;
        }

        /* تنسيقات التابلت (أجهزة بشاشات متوسطة العرض) */
        @media (max-width: 1024px) {
            .cont {
                flex-direction: column;
                align-items: center;
                width: 90%;
            }

            .left-section, .right-section {
                max-width: 100%;
                text-align: center;
            }

            .left-section h1 {
                font-size: 28px;
            }

            .middle-section img {
                width: 100%;
                height: auto;
            }

            .right-section .feature {
                justify-content: center;
                text-align: center;
            }
        }

        .pree {
            color: var(--cc-secondary);
            padding: 5px;
            font-size: 18px !important;
            font-weight: 900;
        }

        .mob{
            display: none !important;
        }

        /* تنسيقات الموبايل (شاشات صغيرة العرض) */
        @media (max-width: 768px) {
            .mob{
                display: flex !important;
            }
            .web{
                display: none !important;
            }
            .pree {
                font-size: 11px !important;
            }

            .cont {
                flex-direction: column;
                align-items: center;
                width: 95%;
                padding: 20px;
            }

            .left-section, .right-section {
                max-width: 100%;
                text-align: center;
                margin-top: 20px;
            }

            .left-section h1 {
                font-size: 24px;
                margin: 15px 0;
            }

            .left-section h2 {
                font-size: 12px;
            }

            .left-section button {
                padding: 10px 20px;
                font-size: 14px;
                margin: auto;
            }

            .left-section .navigation {
                justify-content: center;
            }

            .navigation {
                margin-bottom: 20px;
            }

            .left-section .navigation div {
                width: 35px;
                height: 35px;
            }

            .middle-section img {
                width: 100%;
                height: auto;
            }

            .middle-section .before, .middle-section .after {
                font-size: 36px;
            }

            .right-section .feature {
                flex-direction: column;
                align-items: center;
                margin-bottom: 20px;
                text-align: center;
            }

            .right-section .feature i {
                margin-right: 0;
                margin-bottom: 10px;
                font-size: 30px;
            }

            .right-section .feature h3 {
                font-size: 16px;
            }

            .right-section .feature p {
                font-size: 14px;
            }
        }

        .features .feature p {
            direction: rtl;
        }


        /* تخصيص الحاوية */
        .comparison-container {
            position: relative;
            width: 600px;
            height: 400px;
            overflow: hidden;
        }

        /* تصميم صورة "قبل" */
        .comparison-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* تصميم صورة "بعد" */
        .image-after {
            clip-path: inset(0 50% 0 0); /* في البداية تعرض نصف الصورة */
            transition: clip-path 0.2s ease;
        }

        /* تصميم الشريط المتحرك */
        .comparison-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            appearance: none;
            background: transparent;
            cursor: ew-resize;
            z-index: 10;
        }

        .comparison-slider::-webkit-slider-thumb {
            width: 15px;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px solid #333;
            cursor: ew-resize;
        }

        .comparison-slider::-moz-range-thumb {
            width: 15px;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px solid #333;
            cursor: ew-resize;
        }

        /* الحاوية الرئيسية للمقارنة */
        .comparison-container {
            position: relative;
            width: 600px;
            height: 400px;
            overflow: hidden;
            display: none; /* إخفاء الشرائح في البداية */
        }

        /* اظهار الشريحة النشطة */
        .comparison-container.active {
            display: block;
        }

        /* باقي الأكواد مثل الكلاسات التي تم تعديلها سابقًا */
        .comparison-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            appearance: none;
            background: transparent;
            cursor: ew-resize;
            z-index: 10;
        }

        .comparison-slider::-webkit-slider-thumb {
            width: 15px;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px solid #333;
            cursor: ew-resize;
        }

        .comparison-slider::-moz-range-thumb {
            width: 15px;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px solid #333;
            cursor: ew-resize;
        }

        .zoom-section {
            background-color: #f5f5f5; /* Light background */
            overflow: hidden; /* Prevent overflow if zooming out of bounds */
        }

        /* Container styling */
        .zoom-container {
            position: relative;
            overflow: hidden; /* Hide image overflow */
            border-radius: 15px; /* Optional: Rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Optional: Add a shadow */
        }

        /* Image animation */
        .zoom-image {
            width: 100%;
            height: auto;
            animation: zoomEffect 15s infinite alternate ease-in-out; /* Smooth continuous zoom */
        }

        /* Keyframes for zoom effect */
        @keyframes zoomEffect {
            0% {
                transform: scale(1); /* Normal size */
            }
            100% {
                transform: scale(1.1); /* Zoomed size */
            }
        }


        /* الحاوية الرئيسية لكل شريحة */
        .comparison-container {
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.5s ease; /* أنيميشن عند التبديل */
        }

        /* الصورة التي تظهر بعد */
        .image-after {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            clip-path: inset(0 50% 0 0); /* افتراضي */
            transition: clip-path 0.3s ease;
        }

        /* الفاصل البرتقالي بين الصور */
        .slider-divider {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%; /* نقطة الوسط */
            width: 4px; /* عرض الخط */
            background-color: var(--cc-third)fff; /* اللون البرتقالي */
            pointer-events: none; /* تجاهل النقر */
            z-index: 10; /* يظهر فوق الصور */
        }
        /* القسم الأيسر (المحتوى النصي) */
        .left-section {
            position: relative;
            transition: transform 0.5s ease, opacity 0.5s ease; /* تأثير انزلاق وظهور */
        }

        /* عندما يتم إخفاء القسم الأيسر */
        .left-section.hidden {
            opacity: 0;
            transform: translateX(-100%); /* يتحرك للخارج */
        }

        /* عندما يكون القسم الأيسر مرئيًا */
        .left-section.active {
            opacity: 1;
            transform: translateX(0); /* يظهر في مكانه */
        }

        /* أنيميشن Fade-In عند ظهور الشريحة */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9); /* تصغير طفيف */
            }
            to {
                opacity: 1;
                transform: scale(1); /* الحجم الطبيعي */
            }
        }
        .comparison-slider {
            position: absolute;
            bottom: 10px;
            left: -4px;
            /*transform: translateX(-50%);*/
            width: 101%;
            top: -5px;
            height: 104%;
        }
        .custom-price {
            font-size: 1.7rem !important;
            padding: 2px;
        }
        i.banner-image.fas.fa-map-marked-alt {
            FONT-SIZE: 145px !important;
        }
        @media (max-width: 767px) {

            .template-header-bottom{
                width: 100% !important;
                height: 200px !important;
            }
            .swiper-horizontal {
                width: 150% !important;
            }
            swiper-container {
                width: 130% !important;
                height: 100%;
                margin-left: -17px  !important;
            }
            i.banner-image.fas.fa-map-marked-alt {
                FONT-SIZE: 230px !important;
            }
            .product-section {
                width: 100% !important;
            }


        }
        .tp-caption{
            height: 100px !important;
        }
        @media only screen and (max-width: 768px) {
            .tp-caption {
                top: 10px !important;
                position: relative;
                transform: translateY(0) !important;
            }
            a.template-component-button.template-color-var(--cc-third) {
                padding: 10px 36px !important;
            }
        }
        <!-- CSS -->
        .zoom-image {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .zoom-container {
            width: 100%;
            min-width: 100%;
            overflow: hidden;
        }
        .left-section h2 {
            direction: rtl !important;
        }

        /* تنسيقات max-width: 1300px */
        @media (max-width: 1500px) {
            .right-section .feature {
                display: none !important;
            }
            .custom-product-info h3 {
                font-size: 1rem !important;
            }
            .banner-text-p {
                color: var(--cc-secondary);
            }
        }

        .custom-slider {
            display: flex;
            overflow-x: scroll;
            scroll-behavior: smooth; /* تمرير سلس */
            -webkit-overflow-scrolling: touch; /* لتحسين الأداء على iOS */
        }

        .custom-slider::-webkit-scrollbar {
            display: none; /* إخفاء شريط التمرير */
        }
    </style>
@endsection

@section('content')
    @php
        $direction = (App::getLocale() == 'en') ? 'ltr' : 'rtl';
        $textAlign = (App::getLocale() == 'en') ? 'left' : 'right';
    @endphp

        <div class="swiper mySwiper" style="width: 100% !important; max-height: 600px">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                <div class="swiper-slide">
                    <img src="{{ asset('img/sliders/' . $slider->image) }}" alt="Slide 1" />
                    <div class="slide-content">
                        <div class="slide-title">{{ App::getLocale() === 'ar' ? $slider->name_ar : $slider->name }}</div>
                        <div class="slide-buttons">
                            <a class="template-component-button template-color-white"
                               href="{{ route($slider->title) }}"
                               title="{{ App::getLocale() === 'ar' ? 'احجز الأن' : 'Book Now' }}">
                                {{ App::getLocale() === 'ar' ? 'احجز الأن' : 'Book Now' }}
                            </a>
                            <a class="template-component-button template-color-white"
                               href="{{ route($slider->details) }}"
                               title="{{ App::getLocale() === 'ar' ? '.. قراءة المزيد' : 'Read More..' }}">
                                {{ App::getLocale() === 'ar' ? '.. قراءة المزيد' : 'Read More..' }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar",
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>


    <div class="template-content">
        <div class="sec-1">
            <div class="sec-1header">
                @if(App::getLocale() == 'en')
                    <div class="text">
                        <h1 style="color: var(--cc-primary)">
                            {{ __('messages.nano1') }}</h1>
                        <br>
                        <pre class="pree" style="text-align: center !important;">
Nano Shield,   the authorized brand owner in the field   of car care since
2010, is honored to provide its exceptional services in   the Kingdom of
Saudi Arabia and the Middle East.

The company   provides car care and  general contracting services  using
environmentally  friendly  nano  ceramic    products   with   global quality
under  its  trademark. Nano Shield relies on precise technical procedures
that have been developed and tested since its establishment, to provide
 high-quality service that achieves customer satisfaction  and facilitates
their service throughout the region.
                    </pre>
                        <p class="call">
                            <a href="{{ route('booking') }}" class="template-component-button">
                                <i class="fas fa-arrow-right"></i> {{ __('messages.book_now') }}
                            </a>
                        </p>                    </div>
                @endif
                <div class="sec-image">
                    <img alt="A person washing a red car with a hose" height="400" src="{{URL::asset('assets/img/NANO-WEB-.png')}}" width="600"/>
                </div>
                @if(App::getLocale() == 'en')
                @else
                    <div class="text">
                        <h1 style="color: var(--cc-primary)">
                            {{ __('messages.nano1') }}
                        </h1>
                        <br>
                        <pre class="pree">
تتشرف شركة نانو شيلــد، صاحبة العلامــة التجارية المعتمدة
في مجال العنايـة بالسيــارات منذ عام 2010، بتقديــم خدماتها
الاسـتثنائية فـي المملكة العربية السعودية والشرق الأوسط

تـقدم الـشركة خـدمات العنايـة بالسيـارات والمقاولات العامة
بـاسـتخدام مـنتجات نـانو سـيراميـك صـديقـة لـلبيئة وبـجــودة
عـالـميـة  تـحـت عـلامـتهـا التجاريـة. تـعـتمـد نـانـو شـيلد عـلـى
إجـراءات فـنية دقـيقة تـم تـطويرها وتـجربتهـا منذ تأسيـسهـا
لـتـقديم خـدمـة عـالـية الـجودة تـحقق رضــا العمـلاء وتـسهــل
خــدمــتـــهـــم  فـــــــــي  جـــمــيــع أنــــحــــاء المــنــــطـقـــــة
</pre>
                        <p class="call">
                            <a href="{{ route('booking') }}" class="template-component-button">
                                <i class="fas fa-arrow-right"></i> {{ __('messages.book_now') }}
                            </a>
                        </p>
                    </div>
                @endif
            </div>
            <div class="features">
                <div class="feature">
                    <img class="fas fa-car" src="{{URL::asset('asset/media/1.jpg')}}" alt=""/>
                    <h3>{{ __('messages.guarantee') }}</h3>
                    <p>{{ __('messages.guarantee_description') }}</p>
                </div>
                <div class="feature">
                    <img class="fas fa-flask" src="{{URL::asset('asset/media/2.jpg')}}" alt=""/>
                    <h3>{{ __('messages.excellence') }}</h3>
                    <p>{{ __('messages.excellence_description1') }}</p>
                </div>
                <div class="feature">
                    <img class="fas fa-tools" src="{{URL::asset('asset/media/3.jpg')}}" alt=""/>
                    <h3>{{ __('messages.perfection') }}</h3>
                    <p>{{ __('messages.perfection_description1') }}</p>
                </div>
                <div class="feature">
                    <img class="fas fa-broom" src="{{URL::asset('asset/media/4.jpg')}}" alt=""/>
                    <h3>{{ __('messages.quality') }}</h3>
                    <p>{{ __('messages.quality_description') }}</p>
                </div>
            </div>
        </div>

        <div class="sec2">
            <div class="sec2-content" id="slider">
                @foreach($offers as $index => $offer)
                    <div class="slider-item" style="{{ $index !== 0 ? 'display: none;' : '' }}">
                        <div class="image-section">
                            <img alt="{{ $offer->name }}" src="{{ asset('img/offers/' . $offer->image) }}" />
                        </div>
                        <div class="text-section">
                            <h2 style="color: var(--cc-primary)">{{ __('messages.our_exclusive_offers') }}</h2>
                            <hr  style=" width:70% ; font-size: 3px">
                            {{ App::getLocale() === 'ar' ? $offer->name_ar : $offer->name }}
                            <h4 style="color: var(--cc-primary)">
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
                                </svg>
                                {{ App::getLocale() === 'ar' ? $offer->details_ar : $offer->details }}
                            </h4>
                            <ul>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="padding: 5px" class="fas fa-check"></i>{{ App::getLocale() === 'ar' ? $offer->feature1_ar : $offer->feature1 }}</li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="padding: 5px" class="fas fa-check"></i>{{ App::getLocale() === 'ar' ? $offer->feature2_ar : $offer->feature2 }}</li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="padding: 5px" class="fas fa-check"></i>{{ App::getLocale() === 'ar' ? $offer->feature3_ar : $offer->feature3 }}</li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="padding: 5px" class="fas fa-check"></i>{{ App::getLocale() === 'ar' ? $offer->feature4_ar : $offer->feature4 }}</li>
                                <li style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;"><i style="padding: 5px" class="fas fa-check"></i>{{ App::getLocale() === 'ar' ? $offer->feature5_ar : $offer->feature5 }}</li>
                            </ul>

                            <a class="template-component-button" href="{{route('booking')}}">{{ __('messages.book_now') }}<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="navigation">
                <i class="fas fa-chevron-left" id="prev"></i>
                <span id="slide-number">1/{{ count($offers) }}</span>
                <i class="fas fa-chevron-right" id="next"></i>
            </div>
        </div>

        <div class="banner">
            <div class="banner-content">
                <div class="banner-text">
                    <p class="banner-text-p">{{ __('messages.franchise') }}</p>
                </div>
                <a class="banner-button" href="{{ route('commercial_concession') }}">
                    {{ __('messages.join_now') }}
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <img alt="Discount cards with water droplets" class="banner-image" height="50" src="{{URL::asset('assets/img/media/Visa1.png')}}" width="300"/>
            <img alt="Discount cards with water droplets" class="banner-image2" height="50" src="{{URL::asset('assets/img/media/Visa1.png')}}" width="300"/>
        </div><br><br>
    </div>

    <section class="product-section">
        <h2 class="section-title">{{ __('messages.our_products') }}</h2>
        <div></div>
        <livewire:productlist />
    </section>
<!--<script>-->
<!--    document.addEventListener("DOMContentLoaded", function () {-->
<!--        const slider = document.getElementById("custom-slider");-->
<!--        const prevBtn = document.querySelector(".custom-prev-btn");-->
<!--        const nextBtn = document.querySelector(".custom-next-btn");-->

<!--        let currentIndex = 0;-->
        <!--const step = 300; // تحريك السلايدر بمقدار 300px-->
<!--        const totalProducts = document.querySelectorAll(".custom-product").length;-->
<!--        const maxIndex = Math.ceil((totalProducts * step) / slider.offsetWidth) - 1;-->

<!--        function updateSliderPosition() {-->
            <!--slider.style.transition = "transform 0.5s ease-in-out"; // حركة سلسة-->
<!--            slider.style.transform = `translateX(-${currentIndex * step}px)`;-->
<!--        }-->

<!--        nextBtn.addEventListener("click", () => {-->
<!--            if (currentIndex < maxIndex) {-->
<!--                currentIndex++;-->
<!--                updateSliderPosition();-->
<!--            }-->
<!--        });-->

<!--        prevBtn.addEventListener("click", () => {-->
<!--            if (currentIndex > 0) {-->
<!--                currentIndex--;-->
<!--                updateSliderPosition();-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->
  <script>
        document.addEventListener("DOMContentLoaded", function () {
            const slider = document.getElementById("custom-slider");

            let isDragging = false;
            let startX, scrollLeft;

            slider.addEventListener('mousedown', startDrag);
            slider.addEventListener('touchstart', startDrag);

            slider.addEventListener('mousemove', dragMove);
            slider.addEventListener('touchmove', dragMove);

            slider.addEventListener('mouseup', endDrag);
            slider.addEventListener('mouseleave', endDrag);
            slider.addEventListener('touchend', endDrag);

            function startDrag(e) {
                isDragging = true;
                startX = getPositionX(e) - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
                slider.style.cursor = "grabbing";
            }

            function dragMove(e) {
                if (!isDragging) return;
                e.preventDefault();
                const x = getPositionX(e) - slider.offsetLeft;
                const walk = (x - startX) * 1.5; // تحكم بسرعة السحب
                slider.scrollLeft = scrollLeft - walk;
            }

            function endDrag() {
                isDragging = false;
                slider.style.cursor = "grab";
            }

            function getPositionX(e) {
                return e.type.includes('mouse') ? e.pageX : e.touches[0].clientX;
            }
        });

    </script>

    <div class="sec3"><br>
        <!--<div class="web" style="display: flex;justify-content: center;gap: 200px">-->
        <!--    <h2>{{ __('messages.after') }}</h2>-->
        <!--    <h2>{{ __('messages.before') }}</h2>-->
        <!--</div>-->
{{--        <div class="cont">--}}
{{--            <div class="left-section">--}}
{{--                <h2> {{ __('messages.ser_def') }}</h2>--}}
{{--                <h1 style="font-size: 30px !important;">--}}
{{--                    {{ __('messages.ser_def2') }}--}}
{{--                </h1>--}}
{{--                <a href="{{route('booking')}}">--}}
{{--                    <button style="margin:auto"  class="banner-button">{{ __('messages.book_now') }} <i class="fas fa-arrow-right"></i></button>--}}
{{--                </a>--}}
{{--                <div class="navigation">--}}
{{--                    <div onclick="changeSlide(-1)">--}}
{{--                        <i class="fas fa-arrow-left"></i>--}}
{{--                    </div>--}}
{{--                    <div onclick="changeSlide(1)">--}}
{{--                        <i class="fas fa-arrow-right"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="mob" style="display: flex;justify-content: center;gap: 200px">--}}
{{--                <h2>{{ __('messages.after') }}</h2>--}}
{{--                <h2>{{ __('messages.before') }}</h2>--}}
{{--            </div>--}}

{{--            <div class="middle-section">--}}
{{--                @foreach($before_afters as $index => $before_after)--}}
{{--                    <div class="comparison-container {{ $index === 0 ? 'active' : '' }}">--}}
{{--                        <div class="beer-slider" data-beer-start="50" data-beer-label="{{ __('messages.before') }}">--}}
{{--                            --}}{{-- صورة قبل --}}
{{--                            <img--}}
{{--                                src="{{ asset('img/before_after/' . $before_after->image_before) }}"--}}
{{--                                alt="{{ __('messages.before') }}"--}}
{{--                                loading="lazy"--}}
{{--                                class="ba-img"--}}
{{--                            >--}}

{{--                            --}}{{-- صورة بعد --}}
{{--                            <div class="beer-reveal" data-beer-label="{{ __('messages.after') }}">--}}
{{--                                <img--}}
{{--                                    src="{{ asset('img/before_after/' . $before_after->image_after) }}"--}}
{{--                                    alt="{{ __('messages.after') }}"--}}
{{--                                    loading="lazy"--}}
{{--                                    class="ba-img image-after"--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            <script>--}}
{{--                let currentSlide = 0;--}}
{{--                const language = "{{ app()->getLocale() }}";--}}

{{--                function changeSlide(direction) {--}}
{{--                    const slides = document.querySelectorAll('.comparison-container');--}}
{{--                    const leftSection = document.querySelector('.left-section');--}}

{{--                    slides[currentSlide].classList.remove('active');--}}
{{--                    leftSection.classList.add('hidden');--}}

{{--                    currentSlide = (currentSlide + direction + slides.length) % slides.length;--}}

{{--                    setTimeout(() => {--}}
{{--                        slides[currentSlide].classList.add('active');--}}
{{--                        updateLeftSectionContent(currentSlide);--}}
{{--                        leftSection.classList.remove('hidden');--}}
{{--                    }, 500);--}}
{{--                }--}}

{{--                function updateLeftSectionContent(index) {--}}
{{--                    const leftSection = document.querySelector('.left-section');--}}
{{--                    const beforeAfters = @json($before_afters);--}}
{{--                    const currentData = beforeAfters[index];--}}

{{--                    const name = (language === 'ar') ? currentData.name_ar : currentData.name;--}}
{{--                    const details = (language === 'ar') ? currentData.details_ar : currentData.details;--}}

{{--                    leftSection.querySelector('h2').textContent = name;--}}
{{--                    leftSection.querySelector('h1').textContent = details;--}}
{{--                }--}}
{{--            </script>--}}

{{--            <div class="right-section">--}}
{{--                <div class="feature">--}}
{{--                    <i class="fas fa-spray-can"></i>--}}
{{--                    <div>--}}
{{--                        <h3 style="color: white">{{ __('messages.natural_cleaning_products') }}</h3>--}}
{{--                        <p>{{ __('messages.natural_cleaning_description') }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="feature">--}}
{{--                    <i class="fas fa-hand-sparkles"></i>--}}
{{--                    <div>--}}
{{--                        <h3 style="color: white">{{ __('messages.extreme_care') }}</h3>--}}
{{--                        <p>{{ __('messages.extreme_care_description') }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="feature">--}}
{{--                    <i class="fas fa-tint"></i>--}}
{{--                    <div>--}}
{{--                        <h3 style="color: white">{{ __('messages.spraying_technology') }}</h3>--}}
{{--                        <p>{{ __('messages.spraying_technology_description') }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}



{{--        <div class="page-wrap">--}}
{{--            <div class="header">--}}
{{--                <h1 class="title">{{ __('messages.ser_def') }}</h1>--}}
{{--                <a href="{{ route('booking') }}" class="btn">--}}
{{--                    {{ __('messages.book_now') }}--}}
{{--                    <span aria-hidden>→</span>--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            --}}{{-- عناوين للهاتف كما طلبت سابقاً --}}
{{--            <div class="mob" style="display:flex;justify-content:center;gap:140px;margin-bottom:8px">--}}
{{--                <h3 style="margin:0">{{ __('messages.after') }}</h3>--}}
{{--                <h3 style="margin:0">{{ __('messages.before') }}</h3>--}}
{{--            </div>--}}

{{--            --}}{{-- لو عندك كولكشن من قبل/بعد هنكرره كله --}}
{{--            @foreach($before_afters as $index => $before_after)--}}
{{--                <div class="slider-container">--}}
{{--                    <div class="slider" data-initial="50">--}}
{{--                        --}}{{-- صورة بعد (خلف) --}}
{{--                        <img--}}
{{--                            src="{{ asset('img/before_after/' . $before_after->image_after) }}"--}}
{{--                            alt="{{ __('messages.after') }}"--}}
{{--                            class="after-img"--}}
{{--                            loading="lazy"--}}
{{--                        />--}}
{{--                        --}}{{-- صورة قبل (أمام) --}}
{{--                        <img--}}
{{--                            src="{{ asset('img/before_after/' . $before_after->image_before) }}"--}}
{{--                            alt="{{ __('messages.before') }}"--}}
{{--                            class="before-img"--}}
{{--                            loading="lazy"--}}
{{--                        />--}}
{{--                        <div class="slider-handle" role="separator" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50" aria-label="Image comparison handle"></div>--}}

{{--                        --}}{{-- لاصقات --}}
{{--                        <div class="label label-before">{{ __('messages.before') }}</div>--}}
{{--                        <div class="label label-after">{{ __('messages.after') }}</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <script>--}}
{{--            // مبني على منطق المقال: سحب هاندل وتغيير clip للطبقة الأمامية--}}
{{--            // مع دعم لمس + حدود داخل الحاوية + عدة سلايدر على الصفحة--}}
{{--            (function () {--}}
{{--                const sliders = document.querySelectorAll('.slider');--}}

{{--                sliders.forEach((slider) => {--}}
{{--                    const beforeImg = slider.querySelector('.before-img');--}}
{{--                    const afterImg  = slider.querySelector('.after-img');--}}
{{--                    const handle   = slider.querySelector('.slider-handle');--}}

{{--                    // تأكد من نفس الارتفاع بعد التحميل (اختياري)--}}
{{--                    function syncHeight() {--}}
{{--                        const h = afterImg.naturalHeight && afterImg.clientWidth--}}
{{--                            ? (afterImg.naturalHeight * (afterImg.clientWidth / afterImg.naturalWidth))--}}
{{--                            : slider.getBoundingClientRect().height;--}}
{{--                        slider.style.height = h ? h + 'px' : '';--}}
{{--                    }--}}
{{--                    afterImg.addEventListener('load', syncHeight, { once: true });--}}
{{--                    beforeImg.addEventListener('load', syncHeight, { once: true });--}}
{{--                    window.addEventListener('resize', () => requestAnimationFrame(() => moveTo(percent)));--}}

{{--                    // البداية (٪)--}}
{{--                    const initial = Number(slider.getAttribute('data-initial') || 50);--}}
{{--                    let isDown = false;--}}
{{--                    let percent = Math.max(0, Math.min(100, initial));--}}

{{--                    function moveTo(pct) {--}}
{{--                        const rect = slider.getBoundingClientRect();--}}
{{--                        pct = Math.max(0, Math.min(100, pct));--}}
{{--                        const x = rect.width * (pct / 100);--}}
{{--                        // clip: top, right, bottom, left  (نستخدم rect القديمة كما في المقال)--}}
{{--                        beforeImg.style.clip = `rect(0, ${x}px, ${rect.height}px, 0)`;--}}
{{--                        handle.style.left = `${pct}%`;--}}
{{--                        handle.setAttribute('aria-valuenow', Math.round(pct));--}}
{{--                        percent = pct;--}}
{{--                    }--}}

{{--                    function pointerPos(clientX) {--}}
{{--                        const rect = slider.getBoundingClientRect();--}}
{{--                        const x = Math.max(0, Math.min(rect.width, clientX - rect.left));--}}
{{--                        return (x / rect.width) * 100;--}}
{{--                    }--}}

{{--                    function onPointerDown(e) {--}}
{{--                        isDown = true;--}}
{{--                        document.body.style.cursor = 'ew-resize';--}}
{{--                        const clientX = (e.touches && e.touches[0]) ? e.touches[0].clientX : e.clientX;--}}
{{--                        moveTo(pointerPos(clientX));--}}
{{--                        e.preventDefault();--}}
{{--                    }--}}
{{--                    function onPointerMove(e) {--}}
{{--                        if (!isDown) return;--}}
{{--                        const clientX = (e.touches && e.touches[0]) ? e.touches[0].clientX : e.clientX;--}}
{{--                        moveTo(pointerPos(clientX));--}}
{{--                    }--}}
{{--                    function onPointerUp() {--}}
{{--                        isDown = false;--}}
{{--                        document.body.style.cursor = '';--}}
{{--                    }--}}

{{--                    // أحداث الماوس--}}
{{--                    handle.addEventListener('mousedown', onPointerDown);--}}
{{--                    document.addEventListener('mousemove', onPointerMove);--}}
{{--                    document.addEventListener('mouseup', onPointerUp);--}}

{{--                    // لمس (موبايل)--}}
{{--                    handle.addEventListener('touchstart', onPointerDown, { passive: false });--}}
{{--                    document.addEventListener('touchmove', onPointerMove, { passive: false });--}}
{{--                    document.addEventListener('touchend', onPointerUp);--}}

{{--                    // تهيئة أولية--}}
{{--                    moveTo(initial);--}}
{{--                });--}}
{{--            })();--}}
{{--        </script>--}}


        <div class="cont">
            <div class="left-section">
                <h2 style="color:var(--cc-primary)"> {{ __('messages.ser_def') }}</h2>
                <h1 style="font-size: 22px !important;line-height: 1.7; margin-bottom: 20px; padding:20px; color: #b0b0b0;">
                    {{ __('messages.ser_def2') }}
                </h1>
                <a href="{{ route('booking') }}">
                    <button style="margin:auto" class="banner-button">
                        {{ __('messages.book_now') }} <i class="fas fa-arrow-right"></i>
                    </button>
                </a>
                <div class="navigation">
                    <div onclick="changeSlide(-1)">
                        <i class="fas fa-arrow-left"></i>
                    </div>
                    <div onclick="changeSlide(1)">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>

            <!--<div class="mob" style="display:flex;justify-content:center;gap:200px">-->
            <!--    <h2>{{ __('messages.after') }}</h2>-->
            <!--    <h2>{{ __('messages.before') }}</h2>-->
            <!--</div>-->

            {{-- === قبل/بعد (نسخة Native) مع الحفاظ على منطق التنقل === --}}
            <div class="middle-section">
                @foreach($before_afters as $index => $before_after)
                    <div class="comparison-container {{ $index === 0 ? 'active' : '' }}">
                        <div class="slider" data-initial="50">
                            {{-- صورة "بعد" بالخلف --}}
                            <img
                                src="{{ asset('img/before_after/' . $before_after->image_after) }}"
                                alt="{{ __('messages.after') }}"
                                class="after-img"
                                loading="lazy"
                            />
                            {{-- صورة "قبل" بالأمام (سيتم قصّها ديناميكيًا) --}}
                            <img
                                src="{{ asset('img/before_after/' . $before_after->image_before) }}"
                                alt="{{ __('messages.before') }}"
                                class="before-img"
                                loading="lazy"
                            />

                            {{-- مقبض السحب --}}
                            <div class="slider-handle" role="separator" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50" aria-label="Image comparison handle"></div>

                            {{-- لاصقات توضيحية --}}
                            <div class="label label-before">{{ __('messages.before') }}</div>
                            <div class="label label-after">{{ __('messages.after') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- سكربتاتك الأصلية (مع تعديل بسيط) --}}
            <script>
                let currentSlide = 0; // الشريحة الحالية
                const language = "{{ app()->getLocale() }}";

                function changeSlide(direction) {
                    const slides = document.querySelectorAll('.comparison-container');
                    const leftSection = document.querySelector('.left-section');

                    // إخفاء الشريحة الحالية
                    slides[currentSlide].classList.remove('active');
                    leftSection.classList.add('hidden');

                    // تحديث المؤشر
                    currentSlide = (currentSlide + direction + slides.length) % slides.length;

                    // إظهار الشريحة الجديدة بعد أنيميشن بسيط
                    setTimeout(() => {
                        slides[currentSlide].classList.add('active');
                        updateLeftSectionContent(currentSlide);
                        leftSection.classList.remove('hidden');

                        // مزامنة/تهيئة السلايدر داخل الشريحة النشطة (مرة واحدة فقط)
                        const activeSlider = slides[currentSlide].querySelector('.slider');
                        if (activeSlider) {
                            if (!activeSlider.dataset.initialized) {
                                initSingleSlider(activeSlider);
                            } else {
                                // إعادة تموضع المقبض بعد تغيير المقاسات
                                requestAnimationFrame(() => repositionSlider(activeSlider));
                            }
                        }
                    }, 500);
                }

                function updateLeftSectionContent(index) {
                    const leftSection = document.querySelector('.left-section');
                    const beforeAfters = @json($before_afters);
                    const currentData = beforeAfters[index];

                    const name = (language === 'ar') ? currentData.name_ar : currentData.name;
                    const details = (language === 'ar') ? currentData.details_ar : currentData.details;

                    leftSection.querySelector('h2').textContent = name;
                    leftSection.querySelector('h1').textContent = details;
                }

                // ========== منطق السلايدر (Native) ==========
                function initSliders() {
                    document.querySelectorAll('.slider').forEach(slider => {
                        if (!slider.dataset.initialized) initSingleSlider(slider);
                    });
                }

                function initSingleSlider(slider) {
                    const beforeImg = slider.querySelector('.before-img');
                    const afterImg  = slider.querySelector('.after-img');
                    const handle   = slider.querySelector('.slider-handle');

                    // بداية النسبة
                    let percent = clamp(+slider.getAttribute('data-initial') || 50, 0, 100);
                    let isDown = false;

                    function clamp(v, min, max){ return Math.max(min, Math.min(max, v)); }

                    function getRect(){ return slider.getBoundingClientRect(); }

                    function moveTo(pct){
                        pct = clamp(pct, 0, 100);
                        const rect = getRect();
                        const x = rect.width * (pct / 100);
                        beforeImg.style.clip = `rect(0, ${x}px, ${rect.height}px, 0)`;
                        handle.style.left = `${pct}%`;
                        handle.setAttribute('aria-valuenow', Math.round(pct));
                        percent = pct;
                    }

                    function pointerPos(clientX){
                        const rect = getRect();
                        const x = clamp(clientX - rect.left, 0, rect.width);
                        return (x / rect.width) * 100;
                    }

                    function onDown(e){
                        isDown = true;
                        document.body.style.cursor = 'ew-resize';
                        const clientX = (e.touches && e.touches[0]) ? e.touches[0].clientX : e.clientX;
                        moveTo(pointerPos(clientX));
                        e.preventDefault?.();
                    }
                    function onMove(e){
                        if (!isDown) return;
                        const clientX = (e.touches && e.touches[0]) ? e.touches[0].clientX : e.clientX;
                        moveTo(pointerPos(clientX));
                    }
                    function onUp(){
                        isDown = false;
                        document.body.style.cursor = '';
                    }

                    // أحداث
                    handle.addEventListener('mousedown', onDown);
                    document.addEventListener('mousemove', onMove);
                    document.addEventListener('mouseup', onUp);

                    handle.addEventListener('touchstart', onDown, { passive:false });
                    document.addEventListener('touchmove', onMove, { passive:false });
                    document.addEventListener('touchend', onUp);

                    // عند تحميل الصور/تغيير المقاس، أعد التموضع
                    function syncAndReposition(){ requestAnimationFrame(() => moveTo(percent)); }
                    beforeImg.addEventListener('load', syncAndReposition);
                    afterImg.addEventListener('load', syncAndReposition);
                    window.addEventListener('resize', syncAndReposition);

                    // تهيئة أولية
                    moveTo(percent);

                    // علّم أنه مهيّأ
                    slider.dataset.initialized = '1';
                }

                function repositionSlider(slider){
                    const handle = slider.querySelector('.slider-handle');
                    const now = +handle.getAttribute('aria-valuenow') || (+slider.getAttribute('data-initial') || 50);
                    // إعادة تطبيق القص وفق حجم الحاوية الحالي
                    const beforeImg = slider.querySelector('.before-img');
                    const rect = slider.getBoundingClientRect();
                    const x = rect.width * (now / 100);
                    beforeImg.style.clip = `rect(0, ${x}px, ${rect.height}px, 0)`;
                    handle.style.left = `${now}%`;
                }

                // ابدأ تهيئة كل السلايدرات + ضمان أن الأولى نشطة
                document.addEventListener('DOMContentLoaded', function () {
                    initSliders();
                    // تأكد من إبقاء واحدة فقط ظاهرة
                    const slides = document.querySelectorAll('.comparison-container');
                    slides.forEach((s, i) => s.classList.toggle('active', i === 0));
                });
            </script>

            <div class="right-section">
                <div class="feature">
                    <i class="fas fa-spray-can"></i>
                    <div>
                        <h3 style="color: white">{{ __('messages.natural_cleaning_products') }}</h3>
                        <p>{{ __('messages.natural_cleaning_description') }}</p>
                    </div>
                </div>
                <div class="feature">
                    <i class="fas fa-hand-sparkles"></i>
                    <div>
                        <h3 style="color: white">{{ __('messages.extreme_care') }}</h3>
                        <p>{{ __('messages.extreme_care_description') }}</p>
                    </div>
                </div>
                <div class="feature">
                    <i class="fas fa-tint"></i>
                    <div>
                        <h3 style="color: white">{{ __('messages.spraying_technology') }}</h3>
                        <p>{{ __('messages.spraying_technology_description') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <style>
            /* إظهار شريحة واحدة فقط */
            .comparison-container { display:none; }
            .comparison-container.active { display:block; }

            /* هيكل السلايدر */
            .slider { position: relative; width: 100%; user-select: none; touch-action: none; }
            .slider img { width: 100%; display: block; pointer-events: none; }

            /* صورة قبل (أمام) تُقص حسب المقبض */
            .before-img {
                position: absolute;
                inset: 0;
                z-index: 2;
                /* سيتم ضبط clip عبر JS */
                clip: rect(0, 50%, 9999px, 0);
            }
            /* صورة بعد (خلف) */
            .after-img { position: relative; z-index: 1; }

            /* المقبض (الفاصل) */
            .slider-handle {
                position: absolute;
                top: 0; left: 50%;
                transform: translateX(-50%);
                width: 10px; height: 100%;
                background: #ff6a00;
                cursor: ew-resize;
                z-index: 3;
                box-shadow: inset 0 0 0 1px rgba(0,0,0,.1);
            }
            .slider-handle::before {
                content:"";
                position:absolute; top:50%; left:50%;
                transform: translate(-50%,-50%);
                width: 36px; height: 36px; border-radius: 50%;
                background:#fff; border:2px solid #ff6a00;
                box-shadow: 0 4px 12px rgba(0,0,0,.15);
            }

            /* لاصقات Before/After */
            .label {
                position: absolute; top: 12px; padding: 6px 10px;
                font-size: 13px; background: rgba(0,0,0,.6); color:#fff;
                border-radius: 8px; z-index: 4; backdrop-filter: saturate(120%) blur(2px);
            }
            .label-before { inset-inline-start: 12px; }
            .label-after  { inset-inline-end: 12px; }
        </style>

        <!-- مكتبة BeerSlider -->
{{--        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/beerslider@1.0.3/dist/BeerSlider.css">--}}
{{--        <script src="https://cdn.jsdelivr.net/npm/beerslider@1.0.3/dist/BeerSlider.js"></script>--}}
{{--        <script>--}}
{{--            document.addEventListener('DOMContentLoaded', function () {--}}
{{--                document.querySelectorAll('.beer-slider').forEach(function (el) {--}}
{{--                    new BeerSlider(el, { start: 50 });--}}
{{--                });--}}
{{--            });--}}
{{--        </script>--}}

        <style>
            .ba-img { display:block; width:100%; height:auto; object-fit:cover; }
            .beer-handle { width:2px; }
        </style>
        <div class="banner">
            <div class="banner-content">
                <div class="banner-text">
                    <p class="banner-text-p">{{ __('messages.branches') }}</p>
                </div>
                <a class="banner-button" href="{{ route('branches') }}">
                    {{ App::getLocale() === 'ar' ? '.. اذهب' : 'view branches..' }}
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <i alt="Discount cards with water droplets" class="banner-image fas fa-map-marked-alt" " ></i>
        </div>
    </div>


    <script type="text/javascript">
        jQuery(document).ready(function($)
        {
            $('#template-booking').booking();
        });
    </script>

    <section>
        <div class="template-component-header-subheader" style="margin-bottom: 50px">
            <br>
            <h2 class="h-orange" style="color: var(--cc-primary)">{{ __('messages.success_partners') }}</h2>
        </div>
        <div class="slider">
            <div class="slider-items">
                @foreach($partners as $partner)
                    <img src="{{ asset('img/partners/' . $partner->logo) }}" alt="Partner Logo">
                @endforeach
            </div>
        </div>
    </section>
    <br>
    
    
<div class="reviews-section">
    <br>

    <!-- Header -->
    <div class="template-component-header-subheader" style="margin-bottom: 0 !important;">
        <h2 class="h-orange" style="color: var(--cc-primary)">
            {{ __('messages.customer_reviews') }}
        </h2>
    </div><br>

    <!-- Swiper -->
    <div class="swiper reviews-swiper">
        <div class="swiper-wrapper">

            @foreach($reviews as $review)
                @php
                    $image = App::getLocale() === 'en'
                        ? $review->english_review_images
                        : $review->arabic_review_images;
                @endphp

                @if($image)
                    <div class="swiper-slide review-slide">
                        <img
                            src="{{ asset('uploads/reviews/'.$image) }}"
                            alt="Customer Review"
                            onclick="openReviewModal(this.src)"
                        >
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</div>

<!-- Modal -->
<div class="review-modal" id="reviewModal">
    <span class="review-modal-close" onclick="closeReviewModal()">×</span>
    <img id="reviewModalImg">
</div>

<style>

body > div.reviews-section > div.swiper.reviews-swiper.swiper-initialized.swiper-horizontal.swiper-backface-hidden{
    max-height: 300px;
    max-width: -webkit-fill-available;
}
/* Section */
.reviews-section {
    max-width: 1200px;
    margin: auto;
    padding: 30px 15px;
}

/* Swiper */
.reviews-swiper {
    padding-bottom: 10px;
}

/* Slide */
.review-slide {
    height: 300px;
    border-radius: 0;        /* ❌ مفيش ريديوس هنا */
    overflow: visible;       /* مهم */
    background: transparent; /* ❌ مفيش خلفية */
}

/* Image */
.review-slide img {
    width: 100%;
    height: 100%;
    object-fit: contain;     /* الصورة كاملة بدون قص */
    background: transparent; /* ❌ مفيش أي باك جراند */
    border-radius: 18px;     /* ✅ الريديـوس على الصورة */
    cursor: pointer;
    transition: transform .4s ease;
}

/* Hover */
.review-slide:hover img {
    transform: scale(1.05);
}

/* Modal */
.review-modal {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,.85);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.review-modal img {
    max-width: 90%;
    max-height: 90%;
    border-radius: 18px !important;
}

.review-modal-close {
    position: absolute;
    top: 30px;
    right: 40px;
    font-size: 45px;
    color: #fff;
    cursor: pointer;
}

</style>

<script>
const reviewsSwiper = new Swiper('.reviews-swiper', {
    slidesPerView: 3,
    spaceBetween: 20,
    loop: true,
    grabCursor: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 3,
        }
    }
});

/* Modal */
const modal = document.getElementById('reviewModal');
const modalImg = document.getElementById('reviewModalImg');

function openReviewModal(src) {
    modal.style.display = 'flex';
    modalImg.src = src;
    document.body.style.overflow = 'hidden';
}

function closeReviewModal() {
    modal.style.display = 'none';
    modalImg.src = '';
    document.body.style.overflow = '';
}

modal.addEventListener('click', (e) => {
    if (e.target === modal) closeReviewModal();
});
</script>


@endsection

@section('js')
    <script>
        let currentSlide = 0;

        function changeSlide(direction) {
            const slides = document.querySelectorAll('.slide');
            slides[currentSlide].classList.remove('active');

            currentSlide = (currentSlide + direction + slides.length) % slides.length;

            slides[currentSlide].classList.add('active');
        }

        // تفعيل الشريحة الأولى
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('.slide');
            if (slides.length > 0) {
                slides[0].classList.add('active');
            }
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('.slider-item');
            const prevButton = document.getElementById('prev');
            const nextButton = document.getElementById('next');
            const slideNumber = document.getElementById('slide-number');
            let currentIndex = 0;
            let autoSlideInterval;

            // تحديث السلايدر
            function updateSlider() {
                items.forEach((item, index) => {
                    item.classList.remove('active');
                    item.style.display = 'none'; // لإخفاء العناصر الأخرى
                });
                items[currentIndex].classList.add('active');
                items[currentIndex].style.display = 'flex'; // عرض العنصر الحالي
                slideNumber.textContent = `${currentIndex + 1}/${items.length}`;
            }

            // التبديل إلى الشريحة التالية
            function nextSlide() {
                currentIndex = (currentIndex + 1) % items.length; // التكرار إلى أول عنصر
                updateSlider();
            }

            // التبديل إلى الشريحة السابقة
            function prevSlide() {
                currentIndex = (currentIndex - 1 + items.length) % items.length; // التكرار إلى آخر عنصر
                updateSlider();
            }

            // البدء بالتقليب التلقائي
            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 5000); // كل 5 ثوانٍ
            }

            // إيقاف التقليب التلقائي
            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }

            // أزرار التنقل
            nextButton.addEventListener('click', () => {
                stopAutoSlide();
                nextSlide();
                startAutoSlide();
            });

            prevButton.addEventListener('click', () => {
                stopAutoSlide();
                prevSlide();
                startAutoSlide();
            });

            // بدء التشغيل
            updateSlider();
            startAutoSlide();
        });

    </script>
    
@endsection

