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
        padding: 20px;
    }

    .news-section:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .news-content {
        width: 100%;
    }

    .news-title {
        color: #e67923;
        font-size: 1.8rem;
        margin-bottom: 10px;
        text-align: right;
    }

    .news-image {
        margin-bottom: 20px;
        text-align: center;
    }

    .news-image img {
        width: 100%;
        height: auto;
        max-width: 100%;
        display: block;
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
        margin-top: 20px;
        font-size: 1rem;
        color: #333;
        line-height: 1.6;
        padding-top: 10px;
        border-top: 1px solid #ddd;
        transition: max-height 0.3s ease-out;
    }
</style>
@endsection

@section('content')

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/news.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white;font-size: 40px !important;">{{ __('messages.media_center') }}</h1>
            </div>
            <div>
            </div>
        </div>
    </div>
    @php
        $direction = (App::getLocale() == 'en') ? 'ltr' : 'rtl';
        $textAlign = (App::getLocale() == 'en') ? 'left' : 'right';
    @endphp

    <div class="container">
        @foreach($news as $new)

            <!-- News Section 1 -->
            <div class="news-section">
                <div class="news-content">

                    <h2 class="news-title"  style="direction: {{ $direction }} !important; text-align: {{ $textAlign }}!important;" >{{ App::getLocale() === 'en' ? $new->title : $new->title_ar }}</h2>
                    <div class="news-image">
                        <img src="{{ asset('img/news/' . $new->image) }}" alt="News 1">
                    </div>
                    <h3 class="news-description">
                      {{ App::getLocale() === 'en' ? $new->details : $new->details_ar }}
                    </h3>
                    <div class="news-details" id="details-1">
                        <h3>
                            {{ App::getLocale() === 'en' ? $new->more_details : $new->more_details_ar }}
                        </h3>
                    </div>
                    <a href="{{ $new->link }}">
                        <button class="read-more" onclick="toggleDetails('details-1')">{{ __('messages.branch_title') }}</button>
                    </a>
                </div>
            </div>
        @endforeach

    </div>

@endsection


@section('js')
{{--<script>--}}
{{--    function toggleDetails(id) {--}}
{{--        var details = document.getElementById(id);--}}
{{--        if (details.style.display === "none" || details.style.display === "") {--}}
{{--            details.style.display = "block";--}}
{{--        } else {--}}
{{--            details.style.display = "none";--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
@endsection

