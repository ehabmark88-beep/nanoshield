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
        .container {
            width: 80% !important;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: block !important;
        }

        .page-title {
            text-align: center;
            color: #e67923;
            margin-bottom: 40px;
            font-size: 2.5rem;
        }

        .news-section {
            display: flex;
            flex-wrap: wrap;
            background-color: #fff;
            margin-bottom: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .news-section:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .news-image {
            flex: 0 0 40%;
        }

        .news-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .news-content {
            flex: 1;
            padding: 20px;
            direction: rtl;
        }

        .div_center{
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .news-title {
            color: #e67923;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .news-description {
            font-size: 1rem;
            line-height: 1.6;
            color: #333;
            margin-bottom: 20px;
        }

        .read-more {
            background-color: #e67923;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .read-more:hover {
            background-color: #d5681e;
        }

        .news-details {
            display: none;
            margin-top: 20px;
            font-size: 1rem;
            color: #333;
            line-height: 1.6;
        }
    </style>
@endsection

@section('content')

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/branches.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white; font-size: 40px !important;">{{ __('messages.our_branches') }}</h1>
            </div>
            <div>
            </div>
        </div>
    </div><br>

    <div class="container">

        @foreach($branches as $branch)
            <div class="news-section"  @if(App::getLocale() == 'ar')
                style="direction: ltr;"
                 @else
                     style="direction: rtl;"
                @endif >
                <a href="{{ $branch->branch_details }}">
                    <div class="news-image">
                        <iframe src="{{ $branch->branch_link }}"  width="600" height="250" style="border: 0px; pointer-events: none;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </a>
                <div class="news-content">
                    <h2 class="news-title">{{ App::getLocale() === 'en' ? $branch->branch_name : $branch->branch_name_ar }}</h2>
                    <p class="news-description">
                        {{ App::getLocale() === 'en' ? $branch->branch_address : $branch->branch_address_ar }}
                    </p>
                    <div class="div_center">
                        <a href="tel:{{ $branch->contact_us }}" class="read-more">{{ __('messages.contact_branch') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')

@endsection

