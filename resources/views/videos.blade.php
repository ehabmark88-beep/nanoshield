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
            margin: auto;
            display: grid !important;
            grid-template-columns: repeat(4, minmax(250px, 1fr)) !important;
            gap: 20px;
            padding: 20px 0;
        }

        .card {
            border-bottom: 4px solid #e47823; /* لون الموقع الأساسي */
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card video {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 4px solid #e47823; /* لون الموقع الأساسي */
        }

        .card h3 {
            font-size: 20px;
            color: #e47823; /* لون الموقع الأساسي */
            margin: 15px 0;
        }

        .card p {
            padding: 0 15px 15px;
            color: #666;
        }

        /* استجابة لشاشات الهاتف المحمول */
        @media (max-width: 768px) {
            .container {
                grid-template-columns: repeat(1, minmax(150px, 1fr)) !important;
            }

            .card video {
                height: 150px;
            }
        }
    </style>
@endsection

@section('content')

    <div class="template-header template-header-background template-header">
        <img src="{{URL::asset('assets/img/banners/gallery.png')}}" alt="background" class="background-image">
        <div class="template-header-content">
            <div class="template-header-bottom-page-title">
                <h1 style="color: white;font-size: 60px">{{ __('messages.video_gallery') }}</h1>
            </div>
            <div></div>
        </div>
    </div><br>

    <div>
    </div>
    <br><br><br>
    <section class="container">
        @foreach($videos as $video)
            <div class="card">
                @if($video->video_link)
                    <iframe width="350" height="215" src="{{ $video->video_link }}" frameborder="0" allowfullscreen></iframe>
                @else
                    <p>{{ __('messages.no_video') }}</p>
                @endif
            </div>
        @endforeach
    </section>

@endsection

@section('js')
    <script>
        // يمكنك إضافة سكربتات هنا إذا كنت بحاجة إلى المزيد من التحكم في الفيديوهات
    </script>
@endsection
