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

        .inner-page {
            padding: 7%;
        }
        p {
            font-size: 20px !important;
            color: black !important;
            direction: rtl;
        }
        h1 {
            font-size: 35px;
            color: #e47823 !important;
        }
        .li-right {
            text-align: right !important;
        }
        .div_pad {
            padding-top: 10px;
            line-height: 35px;
        }
        #post-13290 > div:nth-child(2) {
            display: grid;
        }
        img.template-icon-feature-user-chat,
        img.template-icon-feature-check,
        img.template-icon-feature-eco-car,
        img.template-icon-feature-oil-gauge {
            position: relative;
            right: 39%;
        }
        img.template-icon-feature-water-drop {
            position: relative;
            right: 25%;
        }

        #entry-div > div > div.template-component-feature-list.template-component-feature-list-position-top > ul > li:nth-child(5) > h3{
            margin-left: 300px;
        }
        .container {
            width: 80% !important;
            margin: auto;
            gap: 20px;
            padding: 20px 0;
        }
    </style>
@endsection

@section('content')

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/commercial_concession.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white !important; font-size: 60px; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">
                    {{ __('messages.commercial_concession') }}
                </h1>
            </div>
            <div></div>
        </div>
    </div>
    <div class="inner-page text-page margin-default container" style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">
        <div class="row centered">
            <div class="col-xl-12 col-xs-12 text-page">
                <article id="post-13290" class="post-13290 page type-page status-publish hentry">
                    <div class="entry-content clearfix" id="entry-div">
                        <div class="wpb-content-wrapper">
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <br><br><br><br><br><br>
                                            <div class="wpb_text_column wpb_content_element">
                                                <h1 style="text-align: center; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">
                                                    <strong>{{ __('messages.what_are_the_requirements_for_nano_shield_franchise') }}</strong>
                                                </h1>
                                                <p style="text-align: center; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">
                                                    {{ __('messages.nano_shield_franchise_description') }}
                                                </p>
                                                <p style="text-align: center; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">
                                                    {{ __('messages.capital_requirement') }}
                                                </p>
                                                <p style="text-align: center; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">
                                                    {{ __('messages.contact_for_more_details') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <hr style="width: 100%; font-size: 3px"><br><br>

                            <div class="template-component-feature-list template-component-feature-list-position-top">
                                <h1 style="text-align: center; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">
                                    <strong>{{ __('messages.basic_requirements_for_franchise') }}</strong>
                                </h1><br>
                                <!-- Layout 25x25x25x25% -->
                                <ul class="template-layout-25x25x25x25 template-clear-fix">
                                    <li class="template-layout-column-left">
                                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-money-bill-wave"></i>
                                        <h3 class="div_pad" style="color:#e47823; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.sufficient_capital') }}</h3>
                                        <p style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.capital_description') }}</p>
                                    </li>
                                    <li class="template-layout-column-center-left">
                                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-star"></i>
                                        <h3 style="color:#e47823; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;" class="div_pad">{{ __('messages.experience_and_skills') }}</h3>
                                        <p style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.experience_description') }}</p>
                                    </li>
                                    <li class="template-layout-column-center-right">
                                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-handshake"></i>
                                        <h3 style="color:#e47823; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;" class="div_pad">{{ __('messages.commitment_to_standards') }}</h3>
                                        <p style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.commitment_description') }}</p>
                                    </li>
                                    <li class="template-layout-column-right">
                                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-map-marker-alt"></i>
                                        <h3 style="color:#e47823; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;" class="div_pad">{{ __('messages.geographic_location') }}</h3>
                                        <p style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.geographic_location_description') }}</p>
                                    </li>
                                    <li style="list-style-type: none; text-align: center; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">
                                        <i class="fas fa-handshake" style="font-size: 50px;color: #f7941d;"></i>
                                        <br>
                                        <i style="font-size: 22px; color:#e47823; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;" class="div_pad;">
                                            <h3 style="color:#e47823; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.contract_commitment') }}</h3>
                                        </i>
                                        <p style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.contract_description') }}</p>
                                    </li>
                                </ul>
                            </div>
                            <br><br>
                            <div class="template-component-feature-list template-component-feature-list-position-top">
                                <hr style="width: 100%; font-size: 3px"><br>
                                <h1 style="text-align: center; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">
                                    {{ __('messages.additional_services') }}
                                </h1><br>
                                <h4 style="text-align: center; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.additional_services_description') }}</h4>
                                <!-- Layout 25x25x25x25% -->
                                <ul class="template-layout-25x25x25x25 template-clear-fix">
                                    <li class="template-layout-column-left">
                                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-chalkboard-teacher"></i>
                                        <h3 class="div_pad" style="color:#e47823; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.training_and_support') }}</h3>
                                        <p style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.training_description') }}</p>
                                    </li>
                                    <li class="template-layout-column-center-left">
                                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-bullhorn"></i>
                                        <h3 class="div_pad" style="color:#e47823; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.marketing_and_promotion') }}</h3>
                                        <p style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.marketing_description') }}</p>
                                    </li>
                                    <li class="template-layout-column-center-right">
                                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-flask"></i>
                                        <h3 class="div_pad" style="color:#e47823; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.research_and_development') }}</h3>
                                        <p style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.research_description') }}</p>
                                    </li>
                                    <li class="template-layout-column-right">
                                        <i style="font-size: 50px;color: #f7941d;" class="fas fa-users"></i>
                                        <h3 class="div_pad" style="color:#e47823; direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.customer_network_access') }}</h3>
                                        <p style="direction: {{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }} !important;">{{ __('messages.network_description') }}</p>
                                    </li>
                                </ul>
                            </div>
                            <br>
                            <div style="justify-content: center; text-align: center;"><br>
                                <a href="{{ route('form_commercial') }}" class="template-component-button">{{ __('messages.apply_now') }}</a>
                            </div>
                        </div>
                </article>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
