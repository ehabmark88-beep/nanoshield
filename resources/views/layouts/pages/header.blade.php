<!-- ====== HEADER / NAVBAR (FULL, STICKY) ====== -->
<style>
  .swiper-pagination-progressbar .swiper-pagination-progressbar-fill { background: var(--cc-primary); }

  /* ——— القيم العامة للهيدر ——— */
  .nav-superbox {
    position: sticky; top: 0; z-index: 200;
    background: var(--cc-secondary);
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
  .nav-toggle-trigger { display: none; color: var(--cc-third); cursor: pointer; }
  .nav-toggle-trigger i { font-size: 20px; }

  /* ——— روابط الهيدر ——— */
  .nav-links-cluster { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
  .nav-links-cluster.reverse { flex-direction: row-reverse; }
  .nav-links-cluster a {
    color: var(--cc-third); text-decoration: none; padding: 8px 4px; line-height: 1; transition: color .2s ease;
  }
  .nav-links-cluster a:hover { color: var(--cc-primary); }
  .nav-links-cluster a.active-link { color: var(--cc-primary) !important; } /* 🟧 تأكيد الأكتف */

  /* ——— دروب داون الدسكتوب ——— */
  .nav-dropdown-box { position: relative; }
  .nav-dropdown-box > a { display: inline-flex; align-items: center; gap: 6px; color:var(--cc-third); }
  .nav-dropdown-menu {
    position: absolute; top: 100%; inset-inline-start: 0;
    background: #111; border: 1px solid #222; min-width: 220px;
    padding: 8px; display: none; flex-direction: column; gap: 6px;
  }
  .nav-dropdown-box:hover .nav-dropdown-menu { display: flex; }

  .nav-dropdown-menu a {
    padding: 8px 10px; border-radius: 4px; color:var(--cc-third); text-decoration:none;
  }
  .nav-dropdown-menu a:hover { background: #1a1a1a; color: var(--cc-primary); }

  /* ✅ تلوين العنصر المفتوح داخل الدروب داون */
  .nav-dropdown-menu a.active-sub {
    color: var(--cc-primary) !important;
    background: #151515;
  }

  /* ——— أيقونات يمين الهيدر ——— */
  .nav-icons-bundle { display: flex; align-items: center; gap: 12px; color: var(--cc-third); }
  .icon-box { position: relative; }
  .icon-box > a, .icon-box > i {
    color:var(--cc-third); display:inline-flex; align-items:center; justify-content:center;
    width:36px; height:36px; border-radius:6px; background:#111; border:1px solid #1f1f1f; cursor:pointer;
    transition: background .2s ease, color .2s ease, border-color .2s ease;
  }
  .icon-box > a:hover, .icon-box > i:hover { color:var(--cc-primary); border-color:#2a2a2a; }

  .icon-box .dropdown-menu {
    position:absolute; top:calc(100% + 6px);
    inset-inline-end:0; background:#111; border:1px solid #222;
    min-width:240px; padding:8px; display:none; flex-direction:column; gap:6px; z-index:10;
  }
  .icon-box.open .dropdown-menu { display:flex; }
  .icon-box .dropdown-menu a {
    color:var(--cc-third); text-align:start; padding:8px 10px; border-radius:4px; background:transparent; border:0; width:100%;
  }
  .icon-box .dropdown-menu button{
    color:var(--cc-third); text-align:start; padding:8px 10px; border-radius:4px; background:transparent; border:0; width:auto;
  }
  .icon-box .dropdown-menu a:hover, .icon-box .dropdown-menu button:hover { background:#1a1a1a; color:var(--cc-primary); }

  /* ——— البحث المنسدل ——— */
  .search-panel { padding:10px; }
  .search-panel form { display:flex; align-items:center; gap:8px; }
  .search-panel input[type="search"]{
    flex:1; background:#0f0f0f; border:1px solid #222; color:var(--cc-third);
    padding:12px 14px; border-radius:8px; outline:none;
  }
  .search-panel button{
    background:var(--cc-primary); color:var(--cc-secondary); border:0; border-radius:8px;
    padding:8px 10px; font-weight:700; cursor:pointer; line-height:1; height:36px; min-width:72px;
  }
  .search-panel button:hover { filter:brightness(1.05); }

  /* ——— موبايل ——— */
  @media (max-width: 992px){
    .nav-toggle-trigger { display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; }

    .nav-links-cluster{
      position:absolute; inset-inline:0; top:100%; background:var(--cc-secondary); border-top:1px solid #1f1f1f;
      display:none; flex-direction:column; gap:0; padding:8px 10px;
    }
    .nav-links-cluster.active-magic{ display:block; }
    .nav-links-cluster a, .nav-dropdown-box > a{ padding:12px 8px; }
/*    div#navMenu {*/
/*    display: grid;*/
/*}*/

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
      <a href="https://nanoshield.sa/"><img src="{{URL::asset('assets/img/media/Logo.png')}}" alt="Nanoshield Logo - Home" class="template-logo"/></a>
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

      <div class="nav-dropdown-box">
      <a href="{{ route('booking') }}" class="{{ request()->routeIs('booking') ? 'active-link' : '' }}">
        {{ __('messages.booking') }}
      </a>
      </div>


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
          <a href="{{ route('maintenance_appointments') }}" class="{{ request()->routeIs('maintenance_appointments') ? 'active-sub' : '' }}"> {{ __('messages.maintenance_appointments') }}</a>
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
        $businessActive = request()->routeIs('commercial_concession') || request()->routeIs('Partnerships_and_contracts') || request()->routeIs('privacy_policy')
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
          <form action="{{ route('search') }}" method="GET" role="search" aria-label="Site search">
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

@yield('content')
<!-- ====== /HEADER / NAVBAR ====== -->
