<section class="custom-product-section">
    <div>
        @include('layouts.pages.flash-massage')
    </div><br>
    <style>
        .custom-add-to-cart-btn {
            background-color: #e27723; /* اللون الافتراضي */
            color: #ffffff; /* لون النص الافتراضي */
            transition: background-color 0.3s ease, color 0.3s ease; /* لإضافة تأثير انسيابي */
        }

        .custom-add-to-cart-btn.added-to-cart {
            background-color: #6bd76b !important; /* اللون الجديد */
            color: white; /* لون النص الجديد */
            cursor: not-allowed; /* لجعل الزر يبدو معطلاً */
        }

        <style>
             /* إخفاء السلايدر الأساسي على الشاشات الكبيرة (أجهزة كمبيوتر) */
        @media (min-width: 1024px) {
            .custom-slider-container {
                display: none !important;
            }
            swiper-slide {
                display: flow !important;
            }
        }

        /* إخفاء السلايدر البديل على الشاشات الصغيرة (موبايل وتابلت صغير) */
        @media (max-width: 768px) {
            .custom-slider-container_1 {
                display: none !important;
            }
            swiper-slide {
                display: flow !important;
            }
        }

    </style>

    <div class="custom-slider-container">
        <swiper-container
            class="mySwiper"
{{--            pagination="true"--}}
{{--            pagination-clickable="true"--}}
            slides-per-view="auto"
            centered-slides="true"
            space-between="30"
        >
            @foreach($products as $product)
                <swiper-slide>
                    <div class="custom-product" id="custom-product{{ $product->id }}">
                        <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="custom-product-image">
                        <div class="custom-product-info">
                            <h3>{{ App::getLocale() === 'ar' ? $product->name_ar : $product->name }}</h3>
                            <p>{{ App::getLocale() === 'ar' ? $product->description_ar : $product->description }}</p>
                            <div class="custom-d-flix">
                            @if($product->price == 0)
                                <h4 class="custom-price" style="color: red">{{ __('messages.unavailable') }}</h4>
                            @else
                                <!--<del>{{ $product->price }}</del>-->
                                <h4 class="custom-price" style="color: #e27723">{{ $product->discount }}
                                    <br>{{ __('messages.currency') }}</h4>
                            @endif
                        </div>
                            <button
                                class="custom-add-to-cart-btn {{ in_array($product->id, session('addedProducts', [])) ? 'added-to-cart' : '' }}"
                                wire:click="addToCart({{ $product->id }})"
                                @if($product->price == 0) disabled style="background-color: red !important;" @endif
                                @if(in_array($product->id, session('addedProducts', []))) disabled @endif
                            >
                                {{ in_array($product->id, session('addedProducts', [])) ? __('messages.added_to_cart') : __('messages.add_to_cart') }}
                            </button>
                        </div>
                    </div>
                </swiper-slide>
            @endforeach
        </swiper-container>
    </div>

    <div class="custom-slider-container_1">
        <swiper-container
            class="mySwiper"
            pagination="false"
            slides-per-view="auto"
            centered-slides="false"
            space-between="20"
            init="false"
        >
            @foreach($products as $product)
                <swiper-slide>
                    <div class="custom-product" id="custom-product{{ $product->id }}">
                        <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="custom-product-image">
                        <div class="custom-product-info">
                            <h3>{{ App::getLocale() === 'ar' ? $product->name_ar : $product->name }}</h3>
                            <p>{{ App::getLocale() === 'ar' ? $product->description_ar : $product->description }}</p>
                            <div class="custom-d-flix">
                                @if($product->price == 0)
                                    <h4 class="custom-price" style="color: red">{{ __('messages.unavailable') }}</h4>
                                @else
                                    <del>{{ $product->price }}</del>
                                    <h4 class="custom-price" style="color: #e27723">
                                        {{ $product->discount }}
                                        <br>
                                        <!-- SVG أيقونة -->
                                        <!-- ضع الأيقونة هنا كما هي -->
                                    </h4>
                                @endif
                            </div>
                            <button
                                class="custom-add-to-cart-btn {{ in_array($product->id, session('addedProducts', [])) ? 'added-to-cart' : '' }}"
                                wire:click="addToCart({{ $product->id }})"
                                @if($product->price == 0) disabled style="background-color: red !important;" @endif
                                @if(in_array($product->id, session('addedProducts', []))) disabled @endif
                            >
                                {{ in_array($product->id, session('addedProducts', [])) ? __('messages.added_to_cart') : __('messages.add_to_cart') }}
                            </button>
                        </div>
                    </div>
                </swiper-slide>
            @endforeach
        </swiper-container>
    </div>
</section>

{{--<div class="custom-slider" id="custom-slider">--}}
{{--    @foreach($products as $product)--}}
{{--        <div class="custom-product" id="custom-product{{ $product->id }}">--}}
{{--            <img src="{{ asset('img/products/' . $product->image) }}" alt="{{ $product->name }}" class="custom-product-image">--}}
{{--            <div class="custom-product-info">--}}
{{--                <h3>{{ App::getLocale() === 'ar' ? $product->name_ar : $product->name }}</h3>--}}
{{--                <p>{{ App::getLocale() === 'ar' ? $product->description_ar : $product->description }}</p>--}}
{{--                <div class="custom-d-flix">--}}
{{--                    @if($product->price == 0)--}}
{{--                        <h4 class="custom-price" style="color: red">{{ __('messages.unavailable') }}</h4>--}}
{{--                    @else--}}
{{--                        <del>{{ $product->price }}</del>--}}

{{--                        <h4 class="custom-price" style="color: #e27723">{{ $product->discount }}--}}
{{--                            <br>                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1124.14 1256.39">--}}
{{--                                <defs>--}}
{{--                                    <style>--}}
{{--                                        .cls-1 {--}}
{{--                                            fill: #000;--}}
{{--                                        }--}}
{{--                                    </style>--}}
{{--                                </defs>--}}
{{--                                <path class="cls-1" d="M699.62,1113.02h0c-20.06,44.48-33.32,92.75-38.4,143.37l424.51-90.24c20.06-44.47,33.31-92.75,38.4-143.37l-424.51,90.24Z"/>--}}
{{--                                <path class="cls-1" d="M1085.73,895.8c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.33v-135.2l292.27-62.11c20.06-44.47,33.32-92.75,38.4-143.37l-330.68,70.27V66.13c-50.67,28.45-95.67,66.32-132.25,110.99v403.35l-132.25,28.11V0c-50.67,28.44-95.67,66.32-132.25,110.99v525.69l-295.91,62.88c-20.06,44.47-33.33,92.75-38.42,143.37l334.33-71.05v170.26l-358.3,76.14c-20.06,44.47-33.32,92.75-38.4,143.37l375.04-79.7c30.53-6.35,56.77-24.4,73.83-49.24l68.78-101.97v-.02c7.14-10.55,11.3-23.27,11.3-36.97v-149.98l132.25-28.11v270.4l424.53-90.28Z"/>--}}
{{--                            </svg></h4>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--                <!-- إضافة المنتج إلى السلة -->--}}
{{--                <button--}}
{{--                    class="custom-add-to-cart-btn {{ in_array($product->id, session('addedProducts', [])) ? 'added-to-cart' : '' }}"--}}
{{--                    wire:click="addToCart({{ $product->id }})"--}}
{{--                    @if($product->price == 0) disabled style="background-color: red !important;" @endif--}}
{{--                    @if(in_array($product->id, session('addedProducts', []))) disabled @endif--}}
{{--                >--}}
{{--                    {{ in_array($product->id, session('addedProducts', [])) ? __('messages.added_to_cart') : __('messages.add_to_cart') }}--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}
