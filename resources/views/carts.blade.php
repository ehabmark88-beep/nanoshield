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
    <link href="https://unpkg.com/tailwindcss@1.4.6/dist/tailwind.min.css" rel="stylesheet">
    <style>

        input#email,input#name, input#phone {
            border: #e777234f 2px solid !important;
            padding: 6px !important;
            margin: 5px;
        }
        
        input:focus{
            opacity: .7;
        }
        
        .payment-method {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 15px;
        }

        h1.ml-2.font-bold.uppercase {
            color: black;
        }
        a, h1,h2, h3, h4, h5, h6, button, li, ul,p, label, select,td, th, span, div {
            font-family: 'Cairo', sans-serif !important;
            text-align: center;
            letter-spacing: 0 !important;
        }

        th{
            color: #e47823;
        }
        button.text-gray-700.md\:ml-4 {
            padding-right: 30px;
        }
        button.flex.items-center.justify-center.w-10.h-full.text-white.bg-green-500.rounded-r-lg.hover\:bg-green-600.transition.duration-200,
        button.flex.items-center.justify-center.w-10.h-full.text-white.bg-red-500.rounded-l-lg.hover\:bg-red-600.transition.duration-200{
            background-color: #e47823;
        }
    </style>
@endsection

@section('content')

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/cart.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white; font-size: 60px !important;">
                    {{ __('messages.cart') }}
                </h1>
            </div>
        </div>
    </div><br>

    <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #ffffff;">
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            <livewire:shoppingcart />
        </div>
    </div>
    </body>

@endsection

@section('js')
    <script>

    </script>
@endsection
