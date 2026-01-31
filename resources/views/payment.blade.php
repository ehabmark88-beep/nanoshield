<!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
<head>
    <title>الدفع</title>
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
        *{
            font-family: 'Cairo', sans-serif;
        }
        .nav-container-x.reverse {
    max-width: 70%;
    margin: auto;
}

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
            background-color: #e47823;
            position: absolute;
            top: 0;
        }

@media (max-width: 992px){

    .nav-container-x.reverse {
        max-width: 100%;
        margin: auto;
    }

    </style>
</head>


<style>
  .swiper-pagination-progressbar .swiper-pagination-progressbar-fill { background: #e67923; }

  /* ——— القيم العامة للهيدر ——— */
  .nav-superbox {
    position: sticky; top: 0; z-index: 200;
    background: #000;
    transition: box-shadow .2s ease, background-color .2s ease;
  }
  .nav-superbox.is-sticky { box-shadow: 0 8px 24px rgba(0,0,0,.35); }

  .nav-container-x {
    display: flex; align-items: center; justify-content: space-between;
    gap: 12px;
    padding: 12px 16px;       /* ↑ سنة صغيرة */
    min-height: 64px;
  }
  .nav-container-x.reverse { flex-direction: row-reverse; }

  .template-logo { display: block; max-height: 48px; height: auto; width: auto; }

  /* زر قائمة الموبايل */
  .nav-toggle-trigger { display: none; color: #fff; cursor: pointer; }
  .nav-toggle-trigger i { font-size: 20px; }

  /* ——— روابط الهيدر ——— */
  .nav-links-cluster { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
  .nav-links-cluster.reverse { flex-direction: row-reverse; }
  .nav-links-cluster a {
    color: #fff; text-decoration: none; padding: 8px 4px; line-height: 1; transition: color .2s ease;
  }
  .nav-links-cluster a:hover { color: #e67923; }
  .nav-links-cluster a.active-link { color: #e67923 !important; } /* 🟧 تأكيد الأكتف */

  /* ——— دروب داون الدسكتوب ——— */
  .nav-dropdown-box { position: relative; }
  .nav-dropdown-box > a { display: inline-flex; align-items: center; gap: 6px; color:#fff; }
  .nav-dropdown-menu {
    position: absolute; top: 100%; inset-inline-start: 0;
    background: #111; border: 1px solid #222; min-width: 220px;
    padding: 8px; display: none; flex-direction: column; gap: 6px;
  }
  .nav-dropdown-box:hover .nav-dropdown-menu { display: flex; }

  .nav-dropdown-menu a {
    padding: 8px 10px; border-radius: 4px; color:#fff; text-decoration:none;
  }
  .nav-dropdown-menu a:hover { background: #1a1a1a; color: #e67923; }

  /* ✅ تلوين العنصر المفتوح داخل الدروب داون */
  .nav-dropdown-menu a.active-sub {
    color: #e67923 !important;
    background: #151515;
  }

  /* ——— أيقونات يمين الهيدر ——— */
  .nav-icons-bundle { display: flex; align-items: center; gap: 12px; color: #fff; }
  .icon-box { position: relative; }
  .icon-box > a, .icon-box > i {
    color:#fff; display:inline-flex; align-items:center; justify-content:center;
    width:36px; height:36px; border-radius:6px; background:#111; border:1px solid #1f1f1f; cursor:pointer;
    transition: background .2s ease, color .2s ease, border-color .2s ease;
  }
  .icon-box > a:hover, .icon-box > i:hover { color:#e67923; border-color:#2a2a2a; }

  .icon-box .dropdown-menu {
    position:absolute; top:calc(100% + 6px);
    inset-inline-end:0; background:#111; border:1px solid #222;
    min-width:240px; padding:8px; display:none; flex-direction:column; gap:6px; z-index:10;
  }
  .icon-box.open .dropdown-menu { display:flex; }
  .icon-box .dropdown-menu a {
    color:#fff; text-align:start; padding:8px 10px; border-radius:4px; background:transparent; border:0; width:100%;
  }
  .icon-box .dropdown-menu button{
    color:#fff; text-align:start; padding:8px 10px; border-radius:4px; background:transparent; border:0; width:auto;
  }
  .icon-box .dropdown-menu a:hover, .icon-box .dropdown-menu button:hover { background:#1a1a1a; color:#e67923; }

  /* ——— البحث المنسدل ——— */
  .search-panel { padding:10px; }
  .search-panel form { display:flex; align-items:center; gap:8px; }
  .search-panel input[type="search"]{
    flex:1; background:#0f0f0f; border:1px solid #222; color:#fff;
    padding:12px 14px; border-radius:8px; outline:none;
  }
  .search-panel button{
    background:#e67923; color:#000; border:0; border-radius:8px;
    padding:8px 10px; font-weight:700; cursor:pointer; line-height:1; height:36px; min-width:72px;
  }
  .search-panel button:hover { filter:brightness(1.05); }

  /* ——— موبايل ——— */
  @media (max-width: 992px){
    .nav-toggle-trigger { display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; }

    .nav-links-cluster{
      position:absolute; inset-inline:0; top:100%; background:#000; border-top:1px solid #1f1f1f;
      display:none; flex-direction:column; gap:0; padding:8px 10px;
    }
    .nav-links-cluster.active-magic{ display:flex; }
    .nav-links-cluster a, .nav-dropdown-box > a{ width:100%; padding:12px 8px; }

    /* أكورديون الدروب داون في الموبايل */
    .nav-dropdown-box:hover .nav-dropdown-menu { display:none; } /* تعطيل hover */
    .nav-dropdown-box.mobile-open > .nav-dropdown-menu{
      display:flex; position:static; padding:6px 8px; gap:4px; border:0; background:#0b0b0b;
    }
    .nav-dropdown-menu a{ padding:10px 8px; border-radius:4px; }
    .nav-dropdown-box > a .fas.fa-chevron-down{ transition:transform .2s ease; }
    .nav-dropdown-box.mobile-open > a .fas.fa-chevron-down{ transform:rotate(180deg); }
  }

  /* تحسين تباعد بسيط */
  .nav-superbox .fas, .nav-superbox .fa-solid { line-height: 1; }

  /* ——— محاذاة وفتح من اليمين للأيقونات في العربي ———
     (من غير ما نلمس <html>؛ بنستند على عكس الديفات بـ reverse) */
  .nav-container-x.reverse .icon-box .dropdown-menu {
    inset-inline-end: 8px;    /* إزاحة بسيطة للداخل */
    text-align: right;        /* نص يمين */
  }
  .nav-container-x.reverse .icon-box .dropdown-menu {
    inset-inline-end: -55px;
  }
          @media (max-width: 768px) {
      .dropdown-menu {
          transform: none !important;
          }
          /* للاتجاه LTR (الإنجليزية) */
        html[dir="ltr"] .dropdown-menu {
            left: 15px !important;   /* مسافة من اليسار */
        }
  }
</style>

<body class="template-page-home">


<nav class="nav-superbox" id="mainNav">
  <div @if(App::getLocale() == 'en') class="nav-container-x" @else class="nav-container-x reverse" @endif>
    <!-- Logo -->
    <div class="nav-logo-magic">
      <a href="https://nanoshield.eg/"><img src="{{URL::asset('assets/img/media/Logo.png')}}" alt="Nanoshield Logo - Home" class="template-logo"/></a>
    </div>

    <!-- Mobile Toggle -->
    <div class="nav-toggle-trigger" onclick="toggleMobileMenu()">
      <i class="fas fa-bars"></i>
    </div>

    <!-- Links -->
    <div id="navMenu" @if(App::getLocale() == 'en') class="nav-links-cluster" @else class="nav-links-cluster reverse" @endif>

      <!-- Home: اللون البرتقالي يظهر فقط عند الـ Active -->
      <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'active-link' : '' }}">
        {{ __('messages.home') }}
      </a>

      <a href="{{ route('booking') }}" class="{{ request()->routeIs('booking') ? 'active-link' : '' }}">
        {{ __('messages.booking') }}
      </a>

      @php
        $aboutActive = request()->routeIs('about') || request()->routeIs('branches') || request()->routeIs('news') || request()->routeIs('articles') || request()->routeIs('questions') || request()->routeIs('gallery') || request()->routeIs('videos');
      @endphp
      <div class="nav-dropdown-box">
        <a href="#" class="{{ $aboutActive ? 'active-link' : '' }}">
          {{ __('messages.about') }} <i class="fas fa-chevron-down"></i>
        </a>
        <div class="nav-dropdown-menu">
          <a href="{{ route('about') }}"    class="{{ request()->routeIs('about')    ? 'active-sub' : '' }}">{{ __('messages.about_us') }}</a>
          <a href="{{ route('branches') }}" class="{{ request()->routeIs('branches') ? 'active-sub' : '' }}">{{ __('messages.branches') }}</a>
          <a href="{{ route('gallery') }}"  class="{{ request()->routeIs('gallery')  ? 'active-sub' : '' }}">{{ __('messages.gallery') }}</a>
          <a href="{{ route('videos') }}"   class="{{ request()->routeIs('videos')   ? 'active-sub' : '' }}">{{ __('messages.videos') }}</a>
          <a href="{{ route('news') }}"     class="{{ request()->routeIs('news')     ? 'active-sub' : '' }}">{{ __('messages.media_center') }}</a>
          <a href="{{ route('articles') }}" class="{{ request()->routeIs('articles') ? 'active-sub' : '' }}">{{ __('messages.articles') }}</a>
          <a href="{{ route('questions') }}"class="{{ request()->routeIs('questions')? 'active-sub' : '' }}">{{ __('messages.faq') }}</a>
        </div>
      </div>

      @php
        $warrantyActive = request()->routeIs('warranty') || request()->routeIs('maintenance_appointments');
      @endphp
      <div class="nav-dropdown-box">
        <a href="#" class="{{ $warrantyActive ? 'active-link' : '' }}">
          {{ __('messages.warranty') }} <i class="fas fa-chevron-down"></i>
        </a>
        <div class="nav-dropdown-menu">
          <a href="{{ route('warranty') }}"                 class="{{ request()->routeIs('warranty')                 ? 'active-sub' : '' }}">{{ __('messages.warranty') }}</a>
          <a href="{{ route('maintenance_appointments') }}" class="{{ request()->routeIs('maintenance_appointments') ? 'active-sub' : '' }}">حجز موعد صيانة</a>
        </div>
      </div>

      @php
        $servicesActive = request()->routeIs('services_car') || request()->routeIs('contracting');
      @endphp
      <div class="nav-dropdown-box">
        <a href="#" class="{{ $servicesActive ? 'active-link' : '' }}">
          {{ __('messages.services3') }} <i class="fas fa-chevron-down"></i>
        </a>
        <div class="nav-dropdown-menu">
          <a href="{{ route('services_car') }}" class="{{ request()->routeIs('services_car') ? 'active-sub' : '' }}">{{ __('messages.car_services') }}</a>
          <a href="{{ route('contracting') }}"  class="{{ request()->routeIs('contracting')  ? 'active-sub' : '' }}">{{ __('messages.contracting') }}</a>
        </div>
      </div>

      <a href="{{ route('products') }}" class="{{ request()->routeIs('products') ? 'active-link' : '' }}">
        {{ __('messages.products') }}
      </a>

      @php
        $businessActive = request()->routeIs('commercial_concession') || request()->routeIs('Partnerships_and_contracts') || request()->routeIs('privacy_policy') || request()->routeIs('warranty');
      @endphp
      <div class="nav-dropdown-box">
        <a href="#" class="{{ $businessActive ? 'active-link' : '' }}">
          {{ __('messages.business') }} <i class="fas fa-chevron-down"></i>
        </a>
        <div class="nav-dropdown-menu">
          <a href="{{ route('commercial_concession') }}" class="{{ request()->routeIs('commercial_concession') ? 'active-sub' : '' }}">{{ __('messages.commercial_concession') }}</a>
          <a href="{{ route('Partnerships_and_contracts') }}" class="{{ request()->routeIs('Partnerships_and_contracts') ? 'active-sub' : '' }}">{{ __('messages.partnerships') }}</a>
          <a href="{{ route('privacy_policy') }}" class="{{ request()->routeIs('privacy_policy') ? 'active-sub' : '' }}">{{ __('messages.privacy_policy') }}</a>
        </div>
      </div>

      @php
        $contactActive = request()->routeIs('contactus') || request()->routeIs('jobs') || request()->routeIs('complaint');
      @endphp
      <div class="nav-dropdown-box">
        <a href="#" class="{{ $contactActive ? 'active-link' : '' }}">
          {{ __('messages.contact_us') }} <i class="fas fa-chevron-down"></i>
        </a>
        <div class="nav-dropdown-menu">
          <a href="{{ route('contactus') }}" class="{{ request()->routeIs('contactus') ? 'active-sub' : '' }}">{{ __('messages.message') }}</a>
          <a href="{{ route('jobs') }}"     class="{{ request()->routeIs('jobs')     ? 'active-sub' : '' }}">{{ __('messages.jobs') }}</a>
          <a href="{{ route('complaint') }}"class="{{ request()->routeIs('complaint')? 'active-sub' : '' }}">{{ __('messages.complaint') }}</a>
        </div>
      </div>
    </div>

    <!-- Icons bundle (Search / Account / Cart / Language) -->
    <div class="nav-icons-bundle">
      <!-- البحث -->
      <div class="icon-box has-dropdown" id="searchBox">
        <i class="fas fa-search" title="Search"></i>
        <div class="dropdown-menu search-panel" dir="{{ App::getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
          <form action="{{ route('products') }}" method="GET" role="search" aria-label="Site search">
            <input type="search" name="q" placeholder="{{ App::getLocale() === 'ar' ? 'ابحث…' : 'Search…' }}" />
            <button type="submit">{{ App::getLocale() === 'ar' ? 'بحث' : 'Search' }}</button>
          </form>
        </div>
      </div>

      <!-- الحساب -->
      <div class="icon-box has-dropdown">
        <i class="fas fa-user"></i>
<div class="dropdown-menu"
     @if(app()->getLocale()==='ar') dir="rtl" style="text-align:right" @endif>
  {{-- إذا المستخدم غير مسجل دخول --}}
  @guest
    @if(app()->getLocale() === 'ar')
      <a href="{{ route('login') }}">تسجيل الدخول</a>
      <a href="{{ route('register') }}">تسجيل حساب</a>
    @else
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
    @endif
  @endguest

  {{-- إذا المستخدم مسجل دخول --}}
  @auth
    @if(app()->getLocale() === 'ar')
      <a href="{{ route('profile.show') }}">صفحتي</a>
      <form method="POST" action="{{ route('logout') }}" style="display:inline">
        @csrf
        <button type="submit">تسجيل الخروج</button>
      </form>
    @else
      <a href="{{ route('profile.show') }}">My Profile</a>
      <form method="POST" action="{{ route('logout') }}" style="display:inline">
        @csrf
        <button type="submit">Logout</button>
      </form>
    @endif
  @endauth
</div>

      </div>

      <!-- السلة -->
      <div class="icon-box">
        <a href="{{ route('carts') }}">
          <i class="fas fa-shopping-cart" title="{{ __('messages.cart') }}"></i>
        </a>
      </div>

      <!-- اللغة -->
      <div class="icon-box has-dropdown">
  <i class="fas fa-globe"></i>
  <div class="dropdown-menu"
       @if(app()->getLocale()==='ar') dir="rtl" style="text-align:right" @endif>
    <a href="{{ route('changeLanguage', ['locale' => 'ar']) }}">
      <img src="https://flagcdn.com/w40/sa.png" alt="Arabic Flag"> العربية
    </a>
    <a href="{{ route('changeLanguage', ['locale' => 'en']) }}">
      <img src="https://flagcdn.com/w40/us.png" alt="English Flag"> English
    </a>
  </div>
</div>

    </div>
  </div>

  <!-- Scripts -->
  <script>
    function toggleMobileMenu() {
      const navMenu = document.getElementById('navMenu');
      navMenu.classList.toggle('active-magic');
    }
  </script>

  <script>
    function isMobileWidth(){ return window.matchMedia('(max-width: 992px)').matches; }

    document.addEventListener('DOMContentLoaded', () => {
      // Sticky shadow
      const nav = document.getElementById('mainNav');
      const onScroll = () => nav.classList.toggle('is-sticky', window.scrollY > 2);
      onScroll(); window.addEventListener('scroll', onScroll);

      // فتح/غلق قوائم الأيقونات — على الزر فقط
      document.querySelectorAll('.icon-box.has-dropdown').forEach(box => {
        const trigger = box.querySelector(':scope > i, :scope > a');
        if (trigger) {
          trigger.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            document.querySelectorAll('.icon-box.has-dropdown').forEach(b => { if (b !== box) b.classList.remove('open'); });
            box.classList.toggle('open');
          });
        }
      });

      // عدم الإغلاق عند الكتابة/الضغط داخل القائمة (بحث خصوصًا)
      document.querySelectorAll('.icon-box .dropdown-menu').forEach(menu => {
        ['click','mousedown','touchstart','pointerdown','focusin'].forEach(evt => {
          menu.addEventListener(evt, (e) => e.stopPropagation(), true);
        });
      });

      // اغلاق القوائم عند الضغط خارجها
      document.addEventListener('click', () => {
        document.querySelectorAll('.icon-box.has-dropdown').forEach(b => b.classList.remove('open'));
      });

      // أكورديون قوائم الموبايل
      const navMenu = document.getElementById('navMenu');
      navMenu.querySelectorAll('.nav-dropdown-box > a').forEach(trigger => {
        trigger.addEventListener('click', (e) => {
          if (isMobileWidth()) {
            e.preventDefault();
            const parent = trigger.closest('.nav-dropdown-box');
            navMenu.querySelectorAll('.nav-dropdown-box').forEach(box => { if (box !== parent) box.classList.remove('mobile-open'); });
            parent.classList.toggle('mobile-open');
          }
        });
      });
    });
  </script>
</nav>

<br><br>


<!-- ====== MAIN CONTENT - PAYMENT ====== -->
<main class="main-content" style="padding: 18px;">
    <div class="wpwl-page-wrapper" role="main" aria-labelledby="wpwl-header">

        <div id="wpwl-header" class="wpwl-header">
            <div style="display: flex; justify-content: center; align-items: center;">
                <h2>{{ app()->getLocale() === 'ar' ? 'الدفع الآمن' : 'Secure Payment' }}</h2>
            </div>
            <div style="display: flex; justify-content: center; align-items: center;">
                {{ app()->getLocale() === 'ar' ? 'املأ تفاصيل بطاقتك لإتمام الدفع' : 'Fill your card details to complete the payment' }}
            </div>
        </div>

        <!-- Payment widget: uses the same variable names $baseUrl, $id, $brands -->
        <div class="wpwl-widget-wrapper" aria-live="polite">
            {{-- HyperPay script (checkoutId must be correct) --}}
            <script src="{{ $baseUrl }}/paymentWidgets.js?checkoutId={{ $id }}"></script>

            <script>
                var wpwlOptions = {
                    style: "card"
                };
            </script>

            {{-- The form that HyperPay will replace with fields --}}
            <form action="" class="paymentWidgets" data-brands="{{ $brands }}"></form>
        </div>


        <div style="display: flex; justify-content: center; align-items: center;">
            {{ app()->getLocale() === 'ar' ? 'لن يتم تخزين بيانات بطاقتك على موقعنا.' : 'Your card details are not stored on our servers' }} 
        </div>


    </div>
</main>

<br><br><br><br>

<style>
    footer {
        width: 100%;
        background-color: #000;
        font-family: 'Open Sans', sans-serif;
        color: #fff;
    }
    a { text-decoration: none !important; color: #fff; }
    a:hover { color: #e67923; }
    .highlight { color: #e67923; }

    /* === Layout === */
    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    /* === Left === */
    .footer-left { flex: 1 1 260px; max-width: 260px; }
    .footer-left img { width: 100px; margin-bottom: 12px; }
    .footer-left p { font-size: 13px; line-height: 1.5; }

    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 10px;
        gap: 8px;
    }
    .contact-item i { color: #e67923; font-size: 16px; min-width: 20px; }
    .contact-text { font-size: 12px; }

    /* === Center === */
    .footer-center {
        flex: 1 1 ;
        max-width: 40%;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .services-column {
        width: 100%;
        margin: 2px;
    }

    .services-title {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .underline {
        width: 40px;
        height: 2px;
        background-color: #fff;
        margin-bottom: 10px;
    }

    .service-item {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        row-gap: 8px;
        column-gap: 10px;
    }

    .service-item a {
        font-size: 12px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .service-item i {
        color: #e67923;
        font-size: 11px;
    }

    /* === Right === */
    .footer-right {
        flex: 1 1 280px;
        max-width: 280px;
        text-align: center;
    }
    .offer-title {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .offer-underline {
        width: 40px;
        height: 2px;
        background-color: #fff;
        margin: 0 auto 10px auto;
    }

    .offer-box {
        border: 1px dashed #fff;
        padding: 10px;
        margin-bottom: 12px;

    }


    /* === Social Icons === */
    .social-icons {
        display: flex;
        justify-content: center;
        flex-wrap: nowrap;
        gap: 10px;
        margin-top: 8px;
    }

    .social-icons a {
        background: #e67923;
        color: #fff;
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        font-size: 14px;
        transition: 0.3s;
    }

    .social-icons a:hover { opacity: 0.85; }

    /* === Bottom === */
    .footer-bottom {
        background-color: #e67923;
        text-align: center;
        font-size: 12px;
        padding: 8px 10px;
    }
    .footer-bottom a { font-weight: 700; color: #fff; }


    /* === Responsive === */
    @media (max-width:900px) {
        .footer-container { flex-direction: column; align-items: center; text-align: center; }
        .footer-left, .footer-center, .footer-right { max-width: 100%; }
        .service-item { grid-template-columns: repeat(3, 1fr); }
        .logonano {display: flex;justify-content: center;}
    }

    @media (max-width:600px) {
        .service-item { grid-template-columns: repeat(3, 1fr); }
        .social-icons { justify-content: center; flex-wrap: nowrap; }
    }
</style>

@php
    $direction = (App::getLocale() == 'en') ? 'ltr' : 'rtl';
@endphp


<div class="fo-f"></div>
<footer>
    <div class="footer-container" style="direction: {{ $direction }};">

        <!-- ===== LEFT ===== -->
        <div class="footer-left">
            <div class="logonano">
                <a href="https://nanoshield.eg/"> <img  src="{{ URL::asset('assets/img/media/Logo.png') }}" alt="Nano Shield Logo"/></a>
            </div>

            <div class="contact-item">
                <i class="fas fa-home"></i>
                <div class="contact-text">
                    <strong>{{ __('messages.info.admin_location') }}</strong>
                    <a href="https://www.google.com/maps/place/%D9%86%D8%A7%D9%86%D9%88+%D8%B4%D9%8A%D9%84%D8%AF+Nano+Shield%E2%80%AD/@24.7416103,46.8034034,17z" target="_blank">{{ __('messages.info.address') }}</a>
                </div>
            </div>

            <div class="contact-item">
                <i class="fas fa-phone-alt"></i>
                <div class="contact-text">
                    <strong>{{ __('messages.info.mobile_number') }}</strong>
                    <a href="tel:+966546411164">{{ __('messages.info.phone_number') }}</a>
                </div>
            </div>

            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <div class="contact-text">
                    <strong>{{ __('messages.info.email') }}</strong>
                    <a href="mailto:info@nanoshield.sa">{{ __('messages.info.email_address') }}</a>
                </div>
            </div>

            <div class="contact-item">
                <i class="fas fa-clock"></i>
                <div class="contact-text">
                    <strong>{{ __('messages.info.working_hours') }}</strong>
                    <span>{{ __('messages.info.work_time') }}</span>
                </div>
            </div>

                        <div class="social-icons">
                <a href="https://www.facebook.com/profile.php?id=61552230751408" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.tiktok.com/@nanoshieldsa" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a href="https://t.snapchat.com/oFy3pqeU" target="_blank"><i class="fab fa-snapchat-ghost"></i></a>
                <a href="https://www.instagram.com/nanoshieldsa/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com/nanoshieldusa?s=21&t=rCYH4YQdOX_fWxkdHoAzqw" target="_blank"><i class="fa-brands fa-x-twitter">X</i></a>
                <a href="https://www.youtube.com/@NaanoShield" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <!-- ===== CENTER ===== -->
        <div class="footer-center">
            <div class="services-column">
                <div class="services-title">{{ __('messages.about_part1') }} <span class="highlight">{{ __('messages.about_highlight') }}</span></div>
                <div class="underline"></div>
                <div class="service-item">
                    <a href="{{ route('about') }}"><i class="fas fa-angle-right"></i>{{ __('messages.about_us') }}</a>
                    <a href="{{ route('branches') }}"><i class="fas fa-angle-right"></i>{{ __('messages.branches') }}</a>
                    <a href="{{ route('gallery') }}"><i class="fas fa-angle-right"></i>{{ __('messages.gallery') }}</a>
                    <a href="{{ route('videos') }}"><i class="fas fa-angle-right"></i>{{ __('messages.videos') }}</a>
                    <a href="{{ route('news') }}"><i class="fas fa-angle-right"></i>{{ __('messages.media_center') }}</a>
                    <a href="{{ route('articles') }}"><i class="fas fa-angle-right"></i>{{ __('messages.articles') }}</a>
                </div>
            </div>

            <div class="services-column">
                <div class="services-title">{{ __('messages.links_part1') }} <span class="highlight">{{ __('messages.links_highlight') }}</span></div>
                <div class="underline"></div>
                <div class="service-item">
                    <a href="{{ route('services_car') }}"><i class="fas fa-angle-right"></i>{{ __('messages.car_services') }}</a>
                    <a href="{{ route('contracting') }}"><i class="fas fa-angle-right"></i>{{ __('messages.contracting') }}</a>
                    <a href="{{ route('commercial_concession') }}"><i class="fas fa-angle-right"></i>{{ __('messages.commercial_concession') }}</a>
                    <a href="{{ route('Partnerships_and_contracts') }}"><i class="fas fa-angle-right"></i>{{ __('messages.partnerships') }}</a>
                    <a href="{{ route('jobs') }}"><i class="fas fa-angle-right"></i>{{ __('messages.jobs') }}</a>
                    <a href="{{ route('privacy_policy') }}"><i class="fas fa-angle-right"></i>{{ __('messages.privacy_policy') }}</a>
                </div>
            </div>
        </div>

        <!-- ===== RIGHT ===== -->
        <div class="footer-right" >
            <div class="services-title">{{ __('messages.offer_part1') }} <span  class="highlight">{{ __('messages.offer_highlight') }}</span></div>
            <div class="underline"></div>
            <div class="offer-box">
                @if($offers->isNotEmpty())
                    <img alt="{{ $offers->first()->name }}" src="{{ asset('img/offers/' . $offers->first()->image) }}" />
                @endif
            </div>

        </div>
    </div>

    <!-- ===== BOTTOM COPYRIGHT ===== -->
    <div class="footer-bottom" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        @php $year = now()->year; @endphp
        @if(app()->getLocale() === 'ar')
            جميع الحقوق محفوظة لـ <a href="https://nanoshield.sa/">Nano Shield  ©</a> {{ $year }}
        @else
            All rights reserved for <a href="https://nanoshield.sa/">Nano Shield  ©</a> {{ $year }}
        @endif
    </div>
    <!-- 🚗 Go Top + WhatsApp Buttons -->
<div class="fixed-buttons">
  <!-- 🟢 WhatsApp -->
  <a href="https://wa.me/966546411164" target="_blank" class="whatsapp-btn">
    <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/whatsapp.svg" alt="WhatsApp" />
  </a>

  <!-- 🚗 Go Top -->
  <div id="goTop" class="go-top-btn" onclick="scrollToTop()">
    <div class="car-container">
      <img src="https://i.ibb.co/DHfLVjMh/4163525.png" alt="Go Top" />
      <span class="go-top-text">
        {{ app()->getLocale() === 'ar' ? 'إلى الأعلى' : 'Go Top' }}
      </span>
    </div>
  </div>
</div>

<script>
  // Show/Hide Go Top + move WhatsApp
  window.addEventListener("scroll", function () {
    const goTop = document.getElementById("goTop");
    const whatsapp = document.querySelector(".whatsapp-btn");

    if (window.scrollY > 200) {
      goTop.classList.add("show");
      whatsapp.classList.remove("alone");
    } else {
      goTop.classList.remove("show");
      whatsapp.classList.add("alone");
    }
  });

  // Scroll to top with animation
  function scrollToTop() {
    const car = document.querySelector(".go-top-btn img");
    car.classList.add("drive");
    window.scrollTo({ top: 0, behavior: "smooth" });
    setTimeout(() => car.classList.remove("drive"), 1200);
  }
</script>

<style>
  /* ✅ الحاوية */
  .fixed-buttons {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: flex;
    flex-direction: row; /* جمب بعض */
    align-items: center;
    gap: 10px;
    z-index: 9999;
    transition: all 0.3s ease;
  }

  /* 🚗 زر السيارة */
  .go-top-btn {
    width: 42px;
    height: 42px;
    background: rgba(0,0,0,0.6);
    border-radius: 50%;
    box-shadow: 0 2px 10px rgba(0,0,0,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: transform 0.3s ease, opacity 0.3s ease;
    position: relative;
  }

  .car-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .car-container img {
    width: 30px;
    height: 30px;
  }

  .go-top-text {
    font-size: 6px;
    color: #fff;
    margin-top: 1px;
    text-align: center;
    font-weight: 700;
  }

  /* 🟢 واتساب */
  .whatsapp-btn {
    width: 45px;
    height: 45px;
    background: rgba(0,0,0,0.6);
    border-radius: 50%;
    box-shadow: 0 2px 10px rgba(0,0,0,0.25);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
  }

  .whatsapp-btn img {
    width: 25px;
    height: 25px;
    filter: invert(84%) sepia(40%) saturate(600%) hue-rotate(90deg) brightness(100%) contrast(90%);
  }

  /* لما تكون لوحدها */
  .whatsapp-btn.alone {
    transform: translateX(52px); /* تتحرك لمكان Go Top */
  }

  /* إظهار/إخفاء Go Top */
  .go-top-btn {
    opacity: 0;
    transform: translateY(30px);
    pointer-events: none;
  }

  .go-top-btn.show {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
  }

  /* 🚗 أنميشن السيارة */
  @keyframes driveUp {
    0% { transform: translateY(0) rotate(0deg); }
    30% { transform: translateY(-15px) rotate(-10deg); }
    60% { transform: translateY(-30px) rotate(10deg); }
    100% { transform: translateY(-60vh) rotate(0deg); opacity: 0; }
  }

  .go-top-btn img.drive {
    animation: driveUp 1.2s ease-in-out forwards;
  }

  /* 📱 للموبايل */
  @media (max-width: 768px) {
    .fixed-buttons {
      bottom: 15px;
      right: 15px;
      gap: 8px;
    }

    .go-top-btn {
      width: 38px;
      height: 38px;
    }

    .car-container img {
      width: 26px;
      height: 26px;
    }

    .whatsapp-btn {
      width: 40px;
      height: 40px;
    }

    .whatsapp-btn img {
      width: 22px;
      height: 22px;
    }

    .whatsapp-btn.alone {
      transform: translateX(46px);
    }

    .go-top-text {
      font-size: 3px;
    }
  }
</style>

</footer>
