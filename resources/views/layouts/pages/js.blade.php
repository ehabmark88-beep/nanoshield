<!-- JS files -->
<script type="text/javascript" src="{{URL::asset('asset/script/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/superfish.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.easing.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.blockUI.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.qtip.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.fancybox.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/isotope.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.actual.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.flexnav.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/sticky.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.scrollTo.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.fancybox-media.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.fancybox-buttons.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.carouFredSel.packed.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.responsiveElement.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/jquery.touchSwipe.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/DateTimePicker.min.js')}}"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

<!-- Revolution Slider files -->
<script type="text/javascript" src="{{URL::asset('asset/script/revolution/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/revolution/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/revolution/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/revolution/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/revolution/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/revolution/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/revolution/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/revolution/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/revolution/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/revolution/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/revolution/extensions/revolution.extension.video.min.js')}}"></script>

<!-- Plugins files -->
<script type="text/javascript" src="{{URL::asset('asset/plugin/booking/jquery.booking.js')}}"></script>

<!-- Components files -->
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.tab.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.image.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.helper.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.header.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.counter.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.gallery.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.goToTop.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.fancybox.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.moreLess.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.googleMap.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.accordion.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.searchForm.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/script/template/jquery.template.testimonial.js')}}"></script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const style = document.createElement('style');
        style.textContent = `
      .swiper-horizontal > .swiper-pagination-bullets,
      .swiper-pagination-bullets.swiper-pagination-horizontal,
      .swiper-pagination-custom,
      .swiper-pagination-fraction {
        width: 0 !important;
      }
    `;
        document.head.appendChild(style);
    });
</script>


<script type="text/javascript" src="{{URL::asset('asset/script/public.js')}}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N4LH1TPRVH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-N4LH1TPRVH');
</script>

<script>
    document.getElementById('servicesLink').addEventListener('click', function(event) {
        event.preventDefault(); // يمنع الانتقال إلى الرابط
    });
</script>
<script>
    function showAlert(message) {
        var alertBox = document.getElementById('floatingAlert');
        var alertMessage = document.getElementById('floatingAlertMessage');
        alertMessage.textContent = message;
        alertBox.style.display = 'flex'; // عرض الرسالة كـ flexbox لمركز المحتوى عمودياً
        setTimeout(function() {
            alertBox.style.display = 'none';
        }, 5000);
    }

    function closeAlert() {
        document.getElementById('floatingAlert').style.display = 'none';
    }
    @if (session('success'))
    showAlert("{{ session('success') }}");
    @endif
</script>

<script>
    function selectCarSize(element) {
        // Remove 'selected' class from all car-size elements
        var carSizes = document.querySelectorAll('.car-size');
        carSizes.forEach(function(carSize) {
            carSize.classList.remove('selected');
        });

        // Add 'selected' class to the clicked element
        element.classList.add('selected');
    }
</script>

<script type="module">
    const swiperEl = document.querySelector('swiper-container');

    Object.assign(swiperEl, {
        slidesPerView: 'auto',
        centeredSlides: false,
        spaceBetween: 20,
        breakpoints: {
            0: {
                slidesPerView: 1.2,
                spaceBetween: 15,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        },
    });

    swiperEl.initialize();
</script>

@yield('js')

    @livewireScripts
</body>
</html>
