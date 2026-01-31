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

        .h_h1 {
            color: #e67923 !important;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px; /* هامش من الجانبين */
        }

        .about-us {
            margin: 40px 0; /* هامش علوي وسفلي للصفحة */
        }

        .hero {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .hero-image {
            flex: 0 0 30%;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
        }

        .hero-text {
            flex: 0 0 70%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hero-text h1 {
            color: #e67923;
            margin-top: 0;
        }

        .hero-text p {
            line-height: 1.6;
        }

        .animation {
            text-align: center;
            margin-top: 20px;
        }

        .car-wash-animation img {
            max-width: 100%;
            height: auto;
            animation: spin 10s linear infinite;
        }

        @keyframes slide {
            0% { transform: translateY(-100%); opacity: 0; }
            50% { transform: translateY(0); opacity: 0.5; }
            100% { transform: translateY(0); opacity: 1; }
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            animation: slide 1.5s ease-out;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-30px); }
            60% { transform: translateY(-15px); }
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            animation: bounce 2s ease infinite;
        }

        .gallery {
            background-color: #ffffff;
            padding: 60px 0;
        }

        .gallery-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .gallery-item {
            flex: 1;
            min-width: 22%;
            position: relative;
            background-color: #000000;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
            transition: filter 0.3s ease;
        }

        .gallery-item:hover img {
            filter: brightness(50%);
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgb(٠, ٠, ٠);
        }

        .gallery-text {
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            text-align: center;
        }

        .gallery-text h3.title {
            margin: 10px 0;
            font-size: 1.5rem;
            color: #e67923;
        }

        .gallery-text p.description {
            margin: 0;
            font-size: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .gallery-item {
                min-width: 45%;
            }

            .hero {
                flex-direction: column;
            }

            .hero-image,
            .hero-text {
                flex: 1 0 100%;
            }

            .gallery-item {
                min-width: 100%;
            }

            .gallery-text h3.title {
                font-size: 1.2rem;
            }

            .gallery-text p.description {
                font-size: 0.9rem;
            }
        }
        @media (max-width: 434px) {
            .hero-image img {
                max-width: 30%;
            }
            }
    </style>
@endsection

@section('content')

    @php
        $direction = (App::getLocale() == 'en') ? 'ltr' : 'rtl';
        $textAlign = (App::getLocale() == 'en') ? 'left' : 'right';
    @endphp
    
    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/about.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white; font-size: 40px !important;">{{ __('messages.about_us') }}</h1>
            </div>
            <div class="template-header-bottom-page-breadcrumb">
                <span></span>
            </div>
        </div>
    </div>
    <br>

    <div class="inner-page text-page margin-default">
        <div class="container">
            <section class="about-us">
                <div class="hero">
                    @if(App::getLocale() == 'en')
                        <div class="hero-text">
                            <br><br><br>
                            <h4  style="direction: {{ $direction }} !important;" >{{ __('messages.about_company') }}</h4>
                        </div>
                        <br><br>
                        <div class="hero-image">
                            <img src="{{URL::asset('assets/img/media/Logo.2.png')}}" alt="Logo" />
                        </div>

                    @else
                        <div class="hero-image">
                            <img src="{{URL::asset('assets/img/media/Logo.2.png')}}" alt="Logo" />
                        </div>
                        <br><br>
                        <div class="hero-text">
                            <br><br><br>
                            <h4 @if(App::getLocale() == 'en') class="ltr"  @else  style="direction: rtl" @endif>{{ __('messages.about_company') }}</h4>
                        </div>
                    @endif

                </div>
            </section>

            <section class="gallery">
                <div class="gallery-container">
                    <div class="gallery-item">
                        <img src="{{URL::asset('assets/img/media/tmyz.jpg')}}" alt="Image 3" />
                        <div class="gallery-text">
                            <h3 class="title">{{ __('messages.warranty') }}</h3>
                            <p class="description"  @if(App::getLocale() == 'en') class="ltr"  @else  style="direction: rtl @endif ">{{ __('messages.warranty_description') }}</p>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{URL::asset('assets/img/media/work.jpg')}}" alt="Image 4" />
                        <div class="gallery-text">
                            <h3 class="title">{{ __('messages.excellence') }}</h3>
                            <p class="description"  @if(App::getLocale() == 'en') class="ltr"  @else  style="direction: rtl" @endif >{{ __('messages.excellence_description') }}</p>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{URL::asset('assets/img/media/atkan.jpg')}}" alt="Image 1" />
                        <div class="gallery-text">
                            <h3 class="title">{{ __('messages.perfection') }}</h3>
                            <p class="description"  @if(App::getLocale() == 'en') class="ltr"  @else  style="direction: rtl @endif ">{{ __('messages.perfection_description') }}</p>
                        </div>
                    </div>
                    <div class="gallery-item">
                        <img src="{{URL::asset('assets/img/media/gawda.jpg')}}" alt="Image 2" />
                        <div class="gallery-text">
                            <h3 class="title">{{ __('messages.high_quality') }}</h3>
                            <p class="description" @if(App::getLocale() == 'en') class="ltr"  @else  style="direction: rtl @endif ">{{ __('messages.high_quality_description') }}</p>
                        </div>
                    </div>
                </div>
            </section>
            <br><br>
        </div>
    </div>
@endsection

@section('js')
@endsection
