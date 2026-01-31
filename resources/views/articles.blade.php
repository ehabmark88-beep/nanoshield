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
  /* إعداد الحاوية الرئيسية */
.articles-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* تصميم بطاقة المقال */
.article-card {
    background: white;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    overflow: hidden;
    text-align: center;
}

.article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* تحسين عرض صورة المقال */
.article-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

/* تنسيق عنوان المقال */
.article-card h3 {
    font-size: 1.4rem;
    margin: 10px 0;
    color: #e67923;
}

/* تنسيق نص المقال */
.article-card p {
    font-size: 1rem;
    color: #555;
    line-height: 1.5;
}

/* زر قراءة المزيد */
.read-more {
    background-color: #e67923;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: inline-block;
    margin-top: 10px;
    text-decoration: none;
}

.read-more:hover {
    background-color: #d5681e;
}

/* إعداد الحاوية الرئيسية */
.articles-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* تصميم بطاقة المقال */
.article-card {
    background: white;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    overflow: hidden;
    text-align: center;
}

.article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* تحسين عرض صورة المقال */
.article-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
}

/* تنسيق عنوان المقال */
.article-card h3 {
    font-size: 1.4rem;
    margin: 10px 0;
    color: #e67923;
}

/* زر قراءة المزيد */
.read-more {
    background-color: #e67923;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: inline-block;
    margin-top: 10px;
    text-decoration: none;
}

.read-more:hover {
    background-color: #d5681e;
}

/* 🎯 **تحسين العرض على الهواتف والأجهزة الصغيرة** */
@media (max-width: 768px) {
    .articles-container {
        grid-template-columns: 1fr; /* عرض المقالات في عمود واحد */
    }

    .article-card {
        padding: 10px;
    }

    .article-card img {
        height: 180px;
    }

    .article-card h3 {
        font-size: 1.2rem;
    }

    .read-more {
        padding: 6px 12px;
        font-size: 0.9rem;
    }
}

/* 🎯 **تحسين العرض على الأجهزة اللوحية (تابليت)** */
@media (max-width: 1024px) {
    .articles-container {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }

    .article-card img {
        height: 190px;
    }

    .article-card h3 {
        font-size: 1.3rem;
    }

    .read-more {
        font-size: 1rem;
    }
}

</style>
    <link rel="stylesheet" href="{{ asset('css/articles.css') }}">
@endsection

@section('content')
@php
    $locale = app()->getLocale();
@endphp 
    <div class="template-header template-header-background">
        <img src="{{ URL::asset('assets/img/banners/news.png') }}" alt="background" class="background-image">
        <div class="template-header-content">
            <h1 style="color: white; font-size: 40px;">{{ __('messages.articles') }}</h1>
        </div>
    </div>

    <div class="articles-container">
        @foreach($news as $new)
            <div class="article-card">
                <img src="{{ asset('img/articles/' . $new->image) }}" alt="News Image">
                <h3>{{ $locale === 'ar' ? $new->title_ar : $new->title }}</h3>
                <a href="{{ route('articles.show', $locale === 'ar' ? $new->article_url_ar : $new->article_url_en) }}" class="read-more">
                    {{ __('messages.read_more') }}
                </a>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
<script>
    function showArticle(articleId) {
        document.querySelectorAll('.article-content').forEach(article => {
            article.style.display = 'none';
        });

        document.querySelector('.article-container').style.display = 'block';
        document.getElementById('article-' + articleId).style.display = 'block';
    }

    function toggleDetails(id) {
        var details = document.getElementById(id);
        if (details.style.display === "none" || details.style.display === "") {
            details.style.display = "block";
        } else {
            details.style.display = "none";
        }
    }
</script>
@endsection
