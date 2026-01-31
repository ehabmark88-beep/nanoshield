<!DOCTYPE html>
<html lang="ar">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3, user-scalable=yes">
    <!-- الكلمات المفتاحية - يتم تخصيصها ديناميكيًا في الصفحات المختلفة -->
    <meta name="keywords" content="@yield('keywords')">
    <!-- الوصف - يتم تخصيصه ديناميكيًا في الصفحات المختلفة -->
    <meta name="description" content="@yield('description')">

<meta name="google-site-verification" content="rwzHiCsLezI5zFqNtAS8Wrgzu9nHYqkzwixQZ1tH2iA" />
    <!-- الفavicon -->
    <link rel="icon" href="{{URL::asset('assets/img/media/lo.png')}}" type="image/x-icon"/>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '713045624404017');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=713045624404017&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

    <!-- تحميل الخطوط مسبقاً -->
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900&amp;subset=latin,latin-ext" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=PT+Serif:700italic,700,400italic&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" as="style" onload="this.rel='stylesheet'">

    <!-- تحميل أيقونات الخطوط مسبقاً -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" as="style" onload="this.rel='stylesheet'">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" as="style" onload="this.rel='stylesheet'">

    <!-- تحميل CSS الأساسي مسبقاً -->
    <link rel="preload" href="{{URL::asset('asset/style/jquery.qtip.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="{{URL::asset('asset/style/jquery-ui.min.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="{{URL::asset('asset/style/superfish.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="{{URL::asset('asset/style/flexnav.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="{{URL::asset('asset/style/DateTimePicker.min.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="{{URL::asset('asset/style/fancybox/jquery.fancybox.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="{{URL::asset('asset/style/fancybox/helpers/jquery.fancybox-buttons.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="{{URL::asset('asset/style/revolution/layers.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="{{URL::asset('asset/style/revolution/settings.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="{{URL::asset('asset/style/revolution/navigation.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="{{URL::asset('asset/style/base.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="{{URL::asset('asset/style/responsive.css')}}" as="style" onload="this.rel='stylesheet'"/>
    <link rel="preload" href="https://unpkg.com/swiper/swiper-bundle.min.css" as="style" onload="this.rel='stylesheet'"/>

    <!-- روابط CSS الخطوط الرئيسية -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900&amp;subset=latin,latin-ext">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Serif:700italic,700,400italic&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" rel="stylesheet">

    <!-- Swiper CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="https://unpkg.com/beerslider/dist/BeerSlider.css">

    <!-- تحميل jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('asset/script/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a2f0d2b6bc.js" crossorigin="anonymous"></script>
    
    
<style>
    :root {
        --cc-primary: {{ $websiteSettings->primary_color ?? '#e67923' }};
        --cc-secondary: {{ $websiteSettings->secondary_color ?? '#000000' }};
        --cc-third: {{ $websiteSettings->third_color ?? '#fff' }};
    }
</style>

    @yield('css')
    <style>
        :root { color-scheme: light; }
        body { margin:0; font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial; background:#f7f7f7; }
        .page-wrap { padding: 24px; max-width: 1100px; margin-inline: auto; }

        /* نفس هيكلة المقال مع تحسينات بسيطة */
        .slider-container {
            position: relative;
            width: 100%;
            max-width: 920px;
            margin: 0 auto 28px;
            overflow: hidden;
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,.06);
        }
        .slider {
            position: relative;
            width: 100%;
            user-select: none;
            touch-action: none;
        }
        .slider img {
            width: 100%;
            display: block;
            pointer-events: none;
        }

        /* طبقنا أسلوب overlay: before فوق after */
        .slider .before-img {
            position: absolute;
            inset: 0;
            z-index: 2;
            /* الكليب سيتغير ديناميكياً */
            clip: rect(0, 50%, 9999px, 0);
        }
        .slider .after-img {
            position: relative;
            z-index: 1;
        }

        /* الهاندل */
        .slider-handle {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 10px;
            height: 100%;
            background: #ff6a00;
            cursor: ew-resize;
            z-index: 3;
            box-shadow: inset 0 0 0 1px rgba(0,0,0,.1);
        }
        .slider-handle::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #fff;
            border: 2px solid #ff6a00;
            box-shadow: 0 4px 12px rgba(0,0,0,.15);
        }

        /* لاصقات Before/After */
        .label {
            position: absolute;
            top: 12px;
            padding: 6px 10px;
            font-size: 13px;
            background: rgba(0,0,0,.6);
            color: #fff;
            border-radius: 8px;
            z-index: 4;
            backdrop-filter: saturate(120%) blur(2px);
        }
        .label-before { inset-inline-start: 12px; }
        .label-after  { inset-inline-end: 12px; }

        /* دعم الشاشات الصغيرة */
        @media (max-width: 640px) {
            .slider-container { border-radius: 10px; }
            .slider-handle::before { width: 30px; height: 30px; }
        }

        /* تنسيقات إضافية اختيارية للعنوان/الأزرار */
        .header {
            display:flex; align-items:center; justify-content:space-between; gap:16px; margin-bottom:18px;
        }
        .header .title {
            font-size: clamp(20px, 2vw, 28px);
            margin: 0;
        }
        .btn {
            display:inline-flex; align-items:center; gap:8px;
            background:#111; color:#fff; border:none; border-radius:10px; padding:10px 14px; cursor:pointer;
            text-decoration:none;
        }
        .btn:hover { opacity:.9; }
    </style>
    <style>
        :root {
            --primary-color: #fb9e40;
            --bg-color: #000;
            --text-color: #fff;
            --hover-color: #fb9e40;
        }

        .nav-superbox {
            background-color: var(--bg-color);
            position: fixed;
            width: 100%;
            z-index: 1000;
            top: 0;
            right: 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.6);
            transition: all 0.3s ease-in-out;
        }

        .nav-container-x {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1200px;
            margin: auto;
        }

        .nav-logo-magic {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.7rem;
        }

        .nav-links-cluster {
            display: flex;
            gap: 1.2rem;
            flex-wrap: wrap;
            align-items: center;
            transition: all 0.3s ease-in-out;
        }
        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
        .nav-links-cluster a {
            color: var(--text-color);
            text-decoration: none;
            position: relative;
            font-weight: 500;
            padding: 0.4rem 0.6rem;
        }

        .nav-links-cluster a::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            height: 2px;
            width: 0%;
            background-color: var(--hover-color);
            transition: 0.3s;
        }

        .nav-links-cluster a:hover::after {
            width: 100%;
        }

        .nav-links-cluster a:hover {
            color: var(--hover-color);
        }

        .nav-dropdown-box {
            position: relative;
        }

        .nav-dropdown-box:hover .nav-dropdown-menu {
            display: block;
        }

        .nav-dropdown-menu {
            display: none;
            position: absolute;
            background-color: #111;
            top: 100%;
            right: 0;
            min-width: 180px;
            z-index: 100;
            border: 1px solid #222;
            border-radius: 6px;
            overflow: hidden;
        }

        .nav-dropdown-menu a {
            display: block;
            padding: 0.6rem 1rem;
            color: var(--text-color);
            background-color: transparent;
            transition: background 0.3s;
        }

        .nav-dropdown-menu a:hover {
            background-color: #222;
            color: var(--hover-color);
        }

        .nav-icons-bundle {
            display: flex;
            gap: 1.2rem;
            font-size: 1.2rem;
            color: var(--text-color);
        }

        .nav-icons-bundle i:hover {
            color: var(--hover-color);
            cursor: pointer;
        }

        .nav-toggle-trigger {
            display: none;
            font-size: 1.8rem;
            color: var(--primary-color);
            cursor: pointer;
        }
        .active-link {
            color: #fb9e40 !important;
            font-weight: bold;
            position: relative;
        }
        .active-link::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #fb9e40;
        }
        .nav-icons-bundle {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .icon-box {
            position: relative;
            cursor: pointer;
            font-size: 18px;
            color: #fff;
        }

        .icon-box i {
            transition: color 0.3s ease;
        }

        .icon-box i:hover {
            color: #e47823;
        }

        .icon-box a {
            color: inherit;
            text-decoration: none;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background: #fff;
            color: #000;
            min-width: 150px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.15);
            z-index: 1000;
            padding: 10px 0;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 15px;
            color: #333;
            font-size: 14px;
            white-space: nowrap;
        }

        .dropdown-menu a:hover {
            background-color: #f1f1f1;
            color: #e47823;
        }

        .dropdown-menu img {
            width: 20px;
            margin-inline-end: 8px;
            vertical-align: middle;
        }

        /* Show dropdown when parent has 'open' class */
        .icon-box.open .dropdown-menu {
            display: block;
        }

        /* Responsive tweaks */
        @media (max-width: 768px) {
            .nav-icons-bundle {
                gap: 15px;
            }

            .dropdown-menu {
                right: auto;
                left: 0;
            }
        }
        @media (max-width: 768px) {
            .dropdown-menu {
                left: 50% !important;
                transform: translateX(-50%) !important;
                right: auto !important;
                min-width: 200px;
                text-align: center;
            }

            .dropdown-menu a {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .nav-dropdown-menu {
                position: relative;
            }

            .nav-links-cluster {
                flex-direction: column;
                background-color: var(--bg-color);
                position: absolute;
                width: 100%;
                top: 100%;
                right: 0;
                display: none;
                padding: 1rem 2rem;
                border-top: 1px solid #222;
            }

            .nav-links-cluster.active-magic {
                display: grid;
                animation: fadeInDown 0.4s ease forwards;
            }

            .template-logo {
                max-width: 100px !important;
            }
            .nav-toggle-trigger {
                display: block;
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        .swiper-horizontal > .swiper-pagination-bullets, .swiper-pagination-bullets.swiper-pagination-horizontal, .swiper-pagination-custom, .swiper-pagination-fraction {
            display: none;
        }
    </style>

    <style>
        swiper-container {
            width: 100%;
            height: 100%;
        }

        swiper-slide {
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .custom-product {
            background: #fff;
            color: white;
            border-radius: 10px;
            width: 100%;
            height: 100%;
        }
    </style>
    <style>
        .nav-wrapper {
            width: 100%;
        }

        .nav-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .nav-logo img {
            height: 50px;
        }

        .nav-menu {
            display: flex;
            gap: 20px;
        }

        .nav-list {
            display: flex;
            list-style: none;
            gap: 20px;
            align-items: center;
        }

        .nav-list .dropdown {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            background-color: #fff;
            list-style: none;
            padding: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            z-index: 1000;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .mobile-toggle {
            display: none;
            background: none;
            font-size: 24px;
            border: none;
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .mobile-toggle {
                display: block;
            }

            .mobile-menu {
                display: none;
                flex-direction: column;
                background-color: #fff;
                padding: 10px;
            }

            .mobile-menu.open {
                display: flex;
            }
        }



        span#cart-count {
        background-color: red;
        padding: 4px;
        border-radius: 50px;
        color: white;
    }
        h1, h2, h3, h4, h5, h6, .template-component-recent-post>li>a>span, .template-component-image .template-component-image-hover>span>span>span.template-component-image-hover-header, body>.template-component-search-form>form>div>input[type="search"] {
            text-transform: capitalize !important;
        }
        path {
            color: white !important;
        }
        .my-account ul {
            background-color: black !important;
        }
        .ltr{
            direction: ltr !important;
        }
        .reverse{
            flex-direction: row-reverse !important;
        }
        .main2{
            margin-left: 430px !important;
        }
        .my-account2{
            margin-right: 0 !important;
        }
        .template-header .template-header-top {
            padding: 20px;
            display: flex;
            flex-direction: row;
        }
        .template-main {
            width: 1220px;
            margin-left: 200px;
            margin-right: 500px;
        }
        .my-account{
            margin-right: 150px;
            margin-top: 30px;
            color: aliceblue;
        }
        .sf-menu li {
            display: flex;
            direction: rtl;
        }

        i.fa.fa-globe {
            color: white;
            font-size: 30px;
        }

        button#dropdownMenuButton {
            background-color: black;
            border: none;
        }
        .dropdown {
            position: relative;
            display: inline-block;
            margin-top: 35px;
        }

        .dropdown-menu {
            margin: 3px;
            display: none;
            position: absolute;
            background-color: #000000;
            border: 1px solid #e47823;
            z-index: 1000;
            min-width: 160px;
            padding: 10px;
        }

        .dropdown-menu a {
            display: flex;
            align-items: center;
            text-decoration: none;
            padding: 5px 10px;
            color: #ececec;
        }

        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }


        .template-component-menu-default>.sf-menu>li ul li a span {
            margin-left: 16px !important;
        }
        /* تنسيق الرابط النشط */
        ul.sf-menu li.active > a {
            color: #e47823 !important; /* لون النص للرابط النشط */
            font-weight: bold; /* جعل النص عريضًا */
            border-bottom: 2px solid #e47823; /* خط سفلي للرابط النشط */
        }

        /* تنسيق افتراضي للواتساب على الشاشات الكبيرة */
        .whatsapp-button {
            position: relative;
            right: 95px;
            color: white;
        }

        /* تعديل الموضع للواتساب على الأجهزة المحمولة */
        @media (max-width: 768px) {
            body > div.go-to-top-wrapper > a:nth-child(2){
                right: 72px !important;

            }
        }
        span.template-icon-meta-arrow-right-12:before {
            content: "◀" !important;
        }

        .template-icon-meta-arrow-large-tb:before {
            content: "▲" !important;
        }

        .go-to-top-arrow::before {
            content: "▲"; /* رمز السهم */
            font-size: 24px; /* حجم السهم */
            color: #e47823; /* لون السهم */
        }

        ul, li {

        }
        .x-x:hover{
            color: #e47823;
        }
        .info-item a {
            color: white; /* اللون الأساسي */
            text-decoration: none; /* إزالة الخط السفلي */
            transition: color 0.3s; /* تأثير سلس لتغيير اللون */
        }

        .info-item a:hover span {
            color: #e47823; /* اللون عند المرور */
        }

        @media (max-width: 400px) {

            .modal-content {
                max-height: 570px !important;
                margin-top: 15%;
                padding: 3px !important;

            }
            p {
                font-size: 8px;
            }
        }

        @media (max-width: 768px) {

            button#dropdownMenuButton {
                background-color: white;
            }
            i.fa.fa-globe {
                color: black;
                font-size: 25px;
            }

            .modal-content {
                max-height: 900px !important;
                margin-top: 26%;
                padding: 3px  !important;

            }
            p {
                font-size: 8px;
            }

            .template-header .template-header-top .template-header-top-icon-list {
                margin: 0 !important;
            }

                        .template-header .template-header-top .template-header-top-icon-list .template-icon-meta-menu {
                margin-left: 100px;
            }

                        .template-header .template-header-top .template-header-top-icon-list .template-icon-meta-menu:before {
                right: 12px !important;
            }

            .template-header .template-header-top .template-header-top-icon-list .template-icon-meta-menu:before {
                top: 0px;
                font-size: 40px;
                right: 2px;
                color: #e67923;
            }

            .template-header .template-header-top .template-header-top-icon-list .template-icon-meta-menu:before {
                top: 0px;
                font-size: 40px;
            }

            i.template-icon-meta-menu {
                width: 70px;
                height: 70px;
            }
        }
        @media (max-width: 1024px) {
            .template-header .template-header-top .template-header-top-icon-list {

                margin: 7px 335px 29px 0px;
            }

            .template-header .template-header-top .template-header-top-icon-list .template-icon-meta-menu:before {
                top: 12px;
                font-size: 40px;
            }

            i.template-icon-meta-menu {
                width: 70px;
                height: 70px;
            }
        }
        .social-icons {
            display: flex;
            gap: 20px;
        }
        .x-x{
            transition: transform 0.3s ease; /* يجعل التغيير ناعماً */
            cursor: pointer;
        }
        .x-x:hover{
            transform: scale(1.2); /* تكبير الصورة بنسبة 1.2 عند المرور بالفأرة */
        }
        .social-icons i {
            font-size: 24px; /* حجم الأيقونة */
            color: white; /* اللون الأساسي */
            transition: transform 0.3s, color 0.3s; /* تأثير التحجيم وتغيير اللون */
            cursor: pointer; /* يجعل الأيقونة قابلة للنقر */
        }
        .info-item i:hover {
            transform: scale(1.2) rotate(10deg); /* تكبير الأيقونة والدوران قليلاً */
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1); /* زيادة حجم الأيقونة إلى 110% */
            }
            100% {
                transform: scale(1);
            }
        }

        .info-item i {
            font-size: 30px;
            color: #e47823;
            margin-bottom: 10px;
            animation: pulse 2s infinite; /* تطبيق تأثير النبض */
        }


        /* تأثير عند الوقوف على الأيقونة */
        .social-icons i:hover {
            transform: scale(1.2); /* تكبير الأيقونة */
            color: #e47823; /* تغيير اللون عند التمرير */
        }
        .info-item i {
            font-size: 30px;
            color: #e47823;
            margin-bottom: 10px;
            transition: transform 0.3s ease; /* إضافة تأثير انتقال */
        }

        .info-item i:hover {
            transform: scale(1.2); /* تكبير الأيقونة عند المرور فوقها */
        }

        i {
            transition: transform 0.3s ease, color 0.3s ease;
        }

        i:hover {
            transform: scale(1.2); /* تكبير الأيقونة بنسبة 20% */
            color: #ea8534; /* تغيير اللون */
        }

        /* إعدادات الخطوط والتنسيق العام للعناصر */
        a, h1, h2, h3, h4, h5, h6, button, li, ul, p, label, select, input, span, pre, li, strong, b,div, td, th {
            font-family: 'Cairo', sans-serif !important;
            text-align: center;
            letter-spacing: 0 !important;
        }
        svg.w-6.h-6.text-gray-800.dark\:text-white {
            width: 50px;
            height: 38px;
        }

        body > div.template-header > div.template-header-top > div.template-header-top-logo > a {
            margin-right: 80px;
        }
        .template-header .template-header-top.template-header-top-sticky {
            position: fixed;
            background-color: black !important;
        }

        ul.sf-menu.sf-js-enabled {
            flex-direction: row;
            display: flex;
            margin-right: -120px;
        }
        .template-header-top {
            background-color: black;
        }
        .template-component-menu-default>.sf-menu>li>a {
            font-size: 22px !important;
            font-family: 'Cairo', sans-serif !important;
            font-weight: 900 !important;
            padding: 30px 10px 0px 15px !important;
        }

        .template-component-menu-default>.sf-menu>li ul {
            left: -113px;
            width: 222px;
            margin-top: -10px;
            padding: 19px 25px 19px 25px;
        }
        /* تنسيقات الرسالة العائمة */
        .floating-alert {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            padding: 15px;
            background-color: #d4edda;
            border: 1px solid #c3e6ئcb;
            color: #155724;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: none;
            align-items: center;
            font-family: Arial, sans-serif;
            font-size: 16px;
            font-weight: bold;
        }

        .floating-alert .check-icon {
            margin-left: 15px;
            font-size: 20px;
            color: #28a745;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        /*footer*/
        /* footer styles */
        .fo-f {
            width: 80%;
            margin: auto;
            background-color: #000000;
            height: 10px;
            position: relative;
        }
        .fo-f::after {
            content: '';
            display: block;
            width: 100%;
            height: 10px;
            background-color:  var(--cc-primary);
            position: absolute;
            top: 0;
        }
        .content-f {
            background-color: #000000;
            background-size: cover;
            padding: 50px 0;
            text-align: center;
        }
        .logo {
            margin-bottom: 20px;
        }
        .logo img {
            width: 100px;
            height: 100px;
        }
        .description {
            margin-bottom: 40px;
            font-size: 16px;
            line-height: 1.5;
        }
        .info {
            display: flex;
            justify-content: center;
            gap: 50px;
        }
        .info-item {
            text-align: center;
        }
        .info-item i {
            font-size: 30px;
            color: #e47823;
            margin-bottom: 10px;
        }
        .info-item p {
            color: white !important;
            font-size: 15px; !important;
            margin: 5px 0;
        }
        .info-item .title {
            font-weight: bold;
        }
        .info-item .subtitle {
            color: #e30613;
        }
        .footer-f0 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .line {
            width: 80%;
            border-top: 1px solid #555;
            margin: 20px 0;
        }
        .social-icons {
            display: flex;
            gap: 20px;
        }
        .social-icons i {
            font-size: 24px;
            color: white;
        }

        /* Responsive Styles */

        /* For tablets */
        @media (max-width: 768px) {
            .info {
                flex-direction: column; /* Stack items vertically */
                align-items: center; /* Center items */
                gap: 20px; /* Adjust gap */
            }
            .info-item {
                width: 100%; /* Make each item full width */
                text-align: center; /* Center text */
            }
            .content-f {
                padding: 30px 20px; /* Adjust padding */
            }
        }

        /* For mobile devices */
        @media (max-width: 480px) {
            .template-component-social-icon-list {
                margin-right: 0 !important;
                margin-top: 15px;
            }

            .content-f {
                padding: 20px 10px; /* Further adjust padding */
            }
            .info-item i {
                font-size: 24px; /* Smaller icon size */
            }
            .info-item p {
                font-size: 14px; /* Smaller text size */
            }
            .social-icons {
                gap: 10px; /* Reduce gap between social icons */
            }
        }

        {{-- footer--}}

        /* إعدادات جسم الصفحة */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        .div-body {
            font-family: 'Roboto', sans-serif;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 85vh;
            margin: 0;
            width: 100%;
            margin-bottom: 40px;
        }

        /*!* إعدادات الهيدر الرئيسي *!*/
        .template-header.template-header-background {
            padding: 0 !important;
        }

        .template-header {
            position: relative;
            width: 100%;
            height: 500px;
        }

        .background-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .template-header-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
            background: rgba(0, 0, 0, 0.5);
        }

        .template-header-bottom-page-title h1 {
            font-size: 40px;
            margin: 0;
            text-align: center;
        }

        .template-header-bottom-page-breadcrumb {
            margin-top: 10px;
            text-align: center;
        }

        .template-header-bottom-page-breadcrumb a {
            color: #fff;
            text-decoration: none;
            margin: 0 5px;
        }

        .template-header-bottom-page-breadcrumb span {
            color: #fff;
        }

        .template-header-bottom {
            border-radius: 10px;
        }

        /* إعدادات الهيدر للشاشات الصغيرة */
        @media (max-width: 768px) {
            i.template-icon-meta-menu {
                color: #e67923;
                width: 45px;
                height: 45px;
            }
            .template-header .template-header-top .template-header-top-icon-list .template-icon-meta-menu:before {
                top: 2px;
            }
            .template-header {
                height: 300px;
            }

            .template-header-bottom-page-title h1 {
                font-size: 28px;
            }

            .template-header-bottom-page-breadcrumb {
                margin-top: 5px;
            }

            .template-header-bottom-page-breadcrumb a {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .template-header {
                height: 250px;
            }

            .template-header-bottom-page-title h1 {
                font-size: 22px;
            }

            .template-header-bottom-page-breadcrumb a {
                font-size: 12px;
            }
        }

        .template-footer {
            background-color: black;
        }
        img.attachment-full.size-full {
            position: relative;
            bottom: 30px;
            scale: 1.2;
        }
        img.attachment-full.size-full:hover {
            transform: scale(1.3);
        }
        a.template-component-go-to-top.template-icon-meta-arrow-large-tb {
            width: 45px;
            height: 60px;
        }

        span.txt {
            position: relative;
            bottom: 47px;
            font-size: 10px;
            color: white;
        }
        .template-footer {
            padding: 0;
        }
        .cat_footer{
            color:#e47823 !important;
        }
        .template-footer .template-footer-bottom {
            padding-top: 35px !important;
            padding-bottom: 35px !important;
        }

        @media (max-width:767px){
            .template-header-bottom-page-title h1{
                font-size: 30px !important;
            }
            body > div.template-header > div.template-header-top > div.template-header-top-logo > a {
                margin-right: 0;
            }
            .template-component-social-icon-list {
                margin-right: 155px;
                margin-top: 15px;
            }
            .template-logo {
                max-width: 140px;
                display: inline-block;
            }
        }

        .template-component-menu-default>.sf-menu>li>a {
            font-size: 18px !important;
        }
        body > div.template-header > div.template-header-top.template-header-top-sticky > div.template-header-top-menu.template-main > nav:nth-child(1) > div > ul > li:nth-child(10) > a, body > div.template-header > div.template-header-top > div.template-header-top-menu.template-main > nav:nth-child(1) > div > ul > li:nth-child(10) > a {
            padding: 0 !important;
        }

@media (min-width: 1300px) and (max-width: 1700px) {
    ul.sf-menu.reverse.sf-js-enabled {
        margin-right: 415px !important;
    }
    .my-account {
        margin-right: 30px !important;
    }
}
        @media (max-width: 1300px) {
            .right-section .feature {
                display: none !important;
            }
            .custom-product-info h3 {
                font-size: 1rem !important;
            }
            .template-header .template-header-top {
                position: fixed !important;
                padding: 17px !important;
                display: flex !important;
                justify-content: space-between !important;
            }
            i.template-icon-meta-menu{
                font-size: 28px !important;
                border-radius: 3px !important;
                padding-right: 15px!important;
                padding-left: 15px!important;
                padding-top: 4px !important;
            }
        }


        @media (max-width: 1700px) {
            .template-component-menu-default>.sf-menu>li>a {
                font-size: 14px !important;
            }

            .main2 {
                margin-left: 280px !important;
            }

        }
        .header {
    justify-content: center !important;
}
</style>
    @livewireStyles
</head>
