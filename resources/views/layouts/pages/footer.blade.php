<div class="fo-f"></div>

<link href="https://fonts.googleapis.com/css2?family=Open+Sans&amp;display=swap" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

<style>
    footer {
        width: 100%;
        background-color: var(--cc-secondary);
        font-family: 'Open Sans', sans-serif;
        color: var(--cc-third);
    }


.service-item a{
    color:  var(--cc-third);
}
    a:hover { 
        color: var(--cc-primary); 
    }

    .highlight { 
        color: var(--cc-primary); 
    }

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

    .contact-item i { 
        color: var(--cc-primary); 
        font-size: 16px; 
        min-width: 20px; 
    }

    .contact-text { font-size: 12px; }

    /* === Center === */
    .footer-center {
        flex: 1 1;
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
        background-color: var(--cc-third);
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
        color: var(--cc-primary);
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
        background-color: var(--cc-third);
        margin: 0 auto 10px auto;
    }

    .offer-box {
        border: 1px dashed var(--cc-third);
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
        background: var(--cc-primary);
        color: var(--cc-third);
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        font-size: 14px;
        transition: 0.3s;
    }

    .social-icons a:hover { 
        opacity: 0.85; 
    }

    /* === Bottom === */
    .footer-bottom {
        background-color: var(--cc-primary);
        text-align: center;
        font-size: 12px;
        padding: 8px 10px;
        color: var(--cc-secondary);
    }

    .footer-bottom a { 
        font-weight: 700; 
        color: var(--cc-third); 
    }

    /* === Responsive === */
    @media (max-width:900px) {
        .footer-container { 
            flex-direction: column; 
            align-items: center; 
            text-align: center; 
        }

        .footer-left, 
        .footer-center, 
        .footer-right { 
            max-width: 100%; 
        }

        .service-item { 
            grid-template-columns: repeat(3, 1fr); 
        }

        .logonano {
            display: flex;
            justify-content: center;
        }
    }

    @media (max-width:600px) {
        .service-item { 
            grid-template-columns: repeat(3, 1fr); 
        }

        .social-icons { 
            justify-content: center; 
            flex-wrap: nowrap; 
        }
    }
</style>

@php
    $direction = (App::getLocale() == 'en') ? 'ltr' : 'rtl';
@endphp

<footer>
    <div class="footer-container" style="direction: {{ $direction }};">

        <!-- ===== LEFT ===== -->
        <div class="footer-left">
            <div class="logonano">
                <a href="https://nanoshield.sa/"> <img  src="{{ URL::asset('assets/img/media/Logo.png') }}" alt="Nano Shield Logo"/></a>
            </div>

            <div class="contact-item">
                <i class="fas fa-home"></i>
                <div class="contact-text">
                    <strong>{{ __('messages.info.admin_location') }}</strong>
                    <a href="https://www.google.com/maps/place/%D9%86%D8%A7%D9%86%D9%88+%D8%B4%D9%8A%D9%84%D8%AF+Nano+Shield%E2%80%AD/@24.7416103,46.8034034,17z/data=!3m1!4b1!4m6!3m5!1s0x3e2f0195a136a663:0x3da2e8b31e153b99!8m2!3d24.7416103!4d46.8034034!16s%2Fg%2F11y2ty_x5z?entry=tts&g_ep=EgoyMDI0MTEyNC4xIPu8ASoASAFQAw%3D%3D" target="_blank">{{ __('messages.info.address') }}</a>
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
                <a href="{{ $websiteSettings->facebook_url ?? 'https://www.facebook.com/profile.php?id=61552230751408' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ $websiteSettings->tiktok_url ?? 'https://www.tiktok.com/@nanoshieldsa' }}" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a href="{{ $websiteSettings->snapchat_url ?? 'https://t.snapchat.com/oFy3pqeU' }}" target="_blank"><i class="fab fa-snapchat-ghost"></i></a>
                <a href="{{ $websiteSettings->instagram_url ?? 'https://www.instagram.com/nanoshieldsa/' }}" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="{{ $websiteSettings->x_platform_url ?? 'https://twitter.com/nanoshieldusa?s=21&t=rCYH4YQdOX_fWxkdHoAzqw' }}" target="_blank"><i class="fa-brands fa-x-twitter">X</i></a>
                <a href="{{ $websiteSettings->youtube_url ?? 'https://www.youtube.com/@NaanoShield' }}" target="_blank"><i class="fab fa-youtube"></i></a>
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
<div class="offer-box" style="border:1px dashed #ccc;padding:15px;border-radius:10px;text-align:center">

    {{-- عنوان العرض حسب اللغة --}}
    <h3 style="margin-bottom:10px; color:var(--cc-third) ;">
        @if(app()->getLocale() === 'ar')
            {{ $websiteSettings->offer_title }}
        @else
            {{ $websiteSettings->offer_title_en }}
        @endif
    </h3>

    {{-- كود العرض --}}
    @if($websiteSettings->offer_code)
        @if(app()->getLocale() === 'ar')
                <div>اضغط لنسخ الكود</div>
        @else
            <div>prees to copy code</div>
        @endif
        <div 
            id="offerCode"
            onclick="copyOfferCode()"
            style="
                display:inline-block;
                padding:8px 16px;
                background:#f1f1f1;
                border-radius:6px;
                cursor:pointer;
                font-weight:bold;
                letter-spacing:1px;
                color: var(--cc-primary);
            "
            title="اضغط لنسخ الكود"
        >
            {{ $websiteSettings->offer_code }}
        </div>

        <div id="copyMessage" style="margin-top:8px;color:green;display:none;">
            ✔ تم نسخ كود العرض
        </div>
    @endif
</div>
<script>
    function copyOfferCode() {
        const code = document.getElementById('offerCode').innerText;

        navigator.clipboard.writeText(code).then(function () {
            const msg = document.getElementById('copyMessage');
            msg.style.display = 'block';

            setTimeout(function () {
                msg.style.display = 'none';
            }, 2000);
        });
    }
</script>

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
      font-size: 7px;
    }
  }
</style>

</footer>
