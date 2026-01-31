@extends('layouts.pages.master')

@section('title')
    {{ app()->getLocale() === 'en' ? ($article->title ?? 'Nano Shield') : ($article->title_ar ?? 'نانو شيلد') }}
@endsection

@section('description')
    {{ app()->isLocale('en') ? ($article->article_meta_en ?: 'Nano Shield') : ($article->article_meta_ar ?: 'نانو شيلد') }}
@endsection

@section('keywords')
    {{ app()->isLocale('en') ? ($article->article_meta_keyword_en ?: 'Nano Shield') : ($article->article_meta_keyword_ar ?: 'نانو شيلد') }}
@endsection


@section('content')

<br><br><br><br><br>
<div class="container" style="max-width: 800px; margin: auto; padding: 20px;">
    <h2 style="color: #e67923; text-align: center;">
        {{ App::getLocale() === 'en' ? $article->title : $article->title_ar }}
    </h2>

    <div class="article-image">
        <img src="{{ asset('img/articles/' . $article->image) }}" alt="News Image" style="width: 100%; border-radius: 8px;">
    </div>

    <p style="font-size: 1rem; line-height: 1.6; color: #333; margin-top: 20px;">
        {!! App::getLocale() === 'en' ? $article->details : $article->details_ar !!}
    </p>
    
    <div class="news-details" id="details-{{ $article->id }}">
        <p>
            {!! App::getLocale() === 'en' ? $article->more_details : $article->more_details_ar !!}
        </p>
    </div>
</div>

<!-- 🔹 قسم المقالات المقترحة -->
<div class="related-articles-container">
    <h3 style="text-align: center; color: #e67923; margin-top: 40px;">
        {{ __('messages.related_articles') }}
    </h3>
    <div class="related-articles">
        @foreach($related_articles as $related)
            <div class="article-card">
                <img src="{{ asset('img/articles/' . $related->image) }}" alt="Related Article">
                <h4>{{ App::getLocale() === 'en' ? $related->title : $related->title_ar }}</h4>
                <p class="links" href="{{ route('articles.show', App::getLocale() === 'ar' ? $related->article_url_ar : $related->article_url_en) }}" class="read-more">
                    {{ __('messages.read_more') }}
                </p>
            </div>
        @endforeach
    </div>
</div>

@endsection

@section('css')
<style>
.links{
    color: #e47823 !importanti;
}
/* 🔹 تنسيق قسم المقالات المقترحة */
.related-articles-container {
    width: 90%;
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
}

.related-articles {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    justify-content: center;
}

/* 🔹 تصميم بطاقة المقال */
.article-card {
    background: white;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    text-align: center;
}

.article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

/* 🔹 تحسين عرض صورة المقال */
.article-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 8px;
}

/* 🔹 تنسيق عنوان المقال */
.article-card h4 {
    font-size: 1.2rem;
    margin: 10px 0;
    color: #e67923;
}

/* 🔹 زر قراءة المزيد */
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

/* 🎯 تحسين العرض على الهواتف */
@media (max-width: 768px) {
    .related-articles {
        grid-template-columns: 1fr;
    }

    .article-card img {
        height: 160px;
    }

    .article-card h4 {
        font-size: 1rem;
    }

    .read-more {
        font-size: 0.9rem;
        padding: 6px 12px;
    }
}

/* 🎯 تحسين العرض على التابلت */
@media (max-width: 1024px) {
    .related-articles {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }

    .article-card img {
        height: 170px;
    }

    .article-card h4 {
        font-size: 1.1rem;
    }
}
</style>
@endsection
