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

        .container.main-wrapper {
            padding: 7%;
            padding-top: 3% !important;
        }

        @media screen and (max-width: 480px) {
            .container.main-wrapper {
                padding: 0;
                padding-top: 1% !important;
            }
            p {
                font-size: 18px !important;
                color: #000000;
            }
        }

        p {
            font-size: 20px !important;
            color: black !important;
            direction: rtl;
        }
        h1 {
            font-size: 35px;
            color: #e47823 !important;
            text-align: right;
        }

        .li-right {
            text-align: right !important;
            list-style-type: circle;
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
        <img src="{{URL::asset('assets/img/banners/warranty.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white !important; font-size: 60px ">{{ __('messages.privacy_policy') }}</h1>
            </div>
            <div>
            </div>
        </div>
    </div><br>

    <div class="container main-wrapper">
        <div class="row centered">
            <article id="post-13917" class="post-13917 page type-page status-publish hentry">
                <div class="entry-content clearfix" id="entry-div">
                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.welcome_message') }}
                    </p>

                    <h1><b>{{ __('messages.about_us_title') }}</b></h1>
                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.about_us_text') }}
                    </p>

                    <br><hr style="width: 100%; font-size: 3px"><br>

                    <h1><b>{{ __('messages.data_collection_title') }}</b></h1>
                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.data_collection_text') }}
                    </p>

                    <ul style="list-style-type: none; padding: 0; margin: 0;">
                        <li style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}; color: #414040; font-size: 16px; margin-bottom: 10px; padding-left: 20px; border-left: 3px solid #e27723; border-radius: 8px; padding-right: 15px; background-color: #f8f9fa; border: 1px solid #e47823; line-height: 1.6;">
                            <strong>{{ __('messages.device_name') }}:</strong> {{ __('messages.device_name_desc') }}
                        </li>
                        <li style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}; color: #414040; font-size: 16px; margin-bottom: 10px; padding-left: 20px; border-left: 3px solid #e27723; border-radius: 8px; padding-right: 15px; background-color: #f8f9fa; border: 1px solid #e47823; line-height: 1.6;">
                            <strong>{{ __('messages.ip_address') }}:</strong> {{ __('messages.ip_address_desc') }}
                        </li>
                        <li style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}; color: #414040; font-size: 16px; margin-bottom: 10px; padding-left: 20px; border-left: 3px solid #e27723; border-radius: 8px; padding-right: 15px; background-color: #f8f9fa; border: 1px solid #e47823; line-height: 1.6;">
                            <strong>{{ __('messages.date_time') }}:</strong> {{ __('messages.date_time_desc') }}
                        </li>
                        <li style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}; color: #414040; font-size: 16px; margin-bottom: 10px; padding-left: 20px; border-left: 3px solid #e27723; border-radius: 8px; padding-right: 15px; background-color: #f8f9fa; border: 1px solid #e47823; line-height: 1.6;">
                            <strong>{{ __('messages.site_address') }}:</strong> {{ __('messages.site_address_desc') }}
                        </li>
                        <li style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}; color: #414040; font-size: 16px; margin-bottom: 10px; padding-left: 20px; border-left: 3px solid #e27723; border-radius: 8px; padding-right: 15px; background-color: #f8f9fa; border: 1px solid #e47823; line-height: 1.6;">
                            <strong>{{ __('messages.visited_pages') }}:</strong> {{ __('messages.visited_pages_desc') }}
                        </li>
                        <li style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}; color: #414040; font-size: 16px; margin-bottom: 10px; padding-left: 20px; border-left: 3px solid #e27723; border-radius: 8px; padding-right: 15px; background-color: #f8f9fa; border: 1px solid #e47823; line-height: 1.6;">
                            <strong>{{ __('messages.browser_info') }}:</strong> {{ __('messages.browser_info_desc') }}
                        </li>
                    </ul>


                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.data_analysis') }}
                    </p>
                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.social_media_sharing') }}
                    </p>
                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.personal_info_agreement') }}
                    </p>
                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.cookies_usage') }}
                    </p>
                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.no_personal_data_without_login') }}
                    </p>

                    <br><hr style="width: 100%; font-size: 3px"><br>

                    <h1>{{ __('messages.security_title') }}</h1>
                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.security_text') }}
                    </p>

                    <br><hr style="width: 100%; font-size: 3px"><br>

                    <h1>{{ __('messages.third_party_links1') }}</h1>
                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.third_party_links') }}
                    </p>

                    <br><hr style="width: 100%; font-size: 3px"><br>

                    <h1>{{ __('messages.update_personal_info1') }}</h1>
                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.update_personal_info') }}
                    </p>
                                        <br><hr style="width: 100%; font-size: 3px"><br>

                    <h1>{{ __('messages.refund_policy_title') }}</h1>
<p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
    {{ __('messages.refund_policy') }}
</p>
                                        <br><hr style="width: 100%; font-size: 3px"><br>

<h1>{{ __('messages.delivery_policy_title') }}</h1>
<p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
    {{ __('messages.delivery_policy') }}
</p>



                    <br><hr style="width: 100%; font-size: 3px"><br>

                    <h1>{{ __('messages.privacy_policy_acceptance1') }}</h1>
                    <p style="direction: {{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }};">
                        {{ __('messages.privacy_policy_acceptance') }}
                    </p>

                </div>
            </article>
        </div>
    </div>
@endsection

@section('js')
@endsection
