@extends('layouts.pages.master')

@section('css')
<style>
/* ================= LAYOUT ================= */
.search-wrapper {
    width: 70%;
    margin: auto;
}
@media (max-width: 992px) {
    .search-wrapper {
        width: 100%;
    }
}

/* ================= GRID ================= */
.search-section {
    margin-bottom: 80px;
}
.search-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 24px;
}
@media (min-width: 640px) {
    .search-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (min-width: 992px) {
    .search-grid { grid-template-columns: repeat(3, 1fr); }
}
@media (min-width: 1200px) {
    .search-grid { grid-template-columns: repeat(4, 1fr); }
}

/* ================= CARD ================= */
.search-card {
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,.08);
    transition: all .3s ease;
    display: flex;
    flex-direction: column;
    text-decoration: none;
}
.search-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 35px rgba(0,0,0,.15);
}

/* ================= IMAGE ================= */
.search-img {
    height: 220px;
    background: #f7f7f7;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
}
.search-img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

/* ================= CONTENT ================= */
.search-content {
    padding: 16px;
}
.search-title {
    font-size: 16px;
    font-weight: 700;
    color: #333;
    margin-bottom: 6px;
}
.search-desc {
    font-size: 14px;
    color: #777;
    line-height: 1.6;
}

/* ================= FEATURES ================= */
.package-features {
    list-style: none;
    padding: 0;
    margin: 10px 0 0;
}
.package-features li {
    font-size: 14px;
    color: #555;
    margin-bottom: 6px;
}
.package-features li::before {
    content: "✔";
    color: #21cc76;
    margin-inline-end: 6px;
}

/* ================= HEADER ================= */
.search-header {
    text-align: center;
    margin-bottom: 60px;
}
.search-header h1 {
    font-size: 32px;
    font-weight: 800;
    color: #333;
}
.search-header span {
    color: #e47823;
    font-weight: 700;
}
</style>
@endsection

@section('content')
<div class="search-wrapper py-12">

    {{-- Header --}}
    <div class="search-header">
        <h1>{{ App::isLocale('ar') ? 'نتائج البحث' : 'Search Results' }}</h1>
        <p>
            {{ App::isLocale('ar') ? 'كلمة البحث:' : 'Keyword:' }}
            <span>{{ $q }}</span>
        </p>
    </div>

    {{-- ================= PRODUCTS ================= --}}
    @if($products->count())
    <section class="search-section">
        <h2 class="text-2xl font-bold mb-6">{{ __('messages.products') }}</h2>

        <div class="search-grid">
            @foreach($products as $product)
                <a href="{{ route('products') }}" class="search-card">
                    <div class="search-img">
                        <img src="{{ asset('img/products/'.$product->image) }}">
                    </div>
                    <div class="search-content">
                        <h3 class="search-title">
                            {{ App::isLocale('ar') ? $product->name_ar : $product->name }}
                        </h3>
                        <p class="search-desc">
                            {{ Str::limit(App::isLocale('ar') ? $product->description_ar : $product->description, 70) }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ================= PACKAGES ================= --}}
    @if($packages->count())
    <section class="search-section">
        <h2 class="text-2xl font-bold mb-6">{{ __('messages.packages') ?? 'Packages' }}</h2>

        <div class="search-grid">
            @foreach($packages as $package)
                <a href="{{ route('booking') }}" class="search-card">
                    <div class="search-content">
                        <h3 class="search-title">
                            {{ App::isLocale('ar') ? $package->name : $package->name_en }}
                        </h3>
                        <p class="search-desc">
                            ⏱ {{ $package->hours }} {{ __('messages.hours') ?? 'Hours' }}
                        </p>

                        <ul class="package-features">
                            @for($i = 1; $i <= 3; $i++)
                                @php
                                    $feature = App::isLocale('ar')
                                        ? $package->{'feature_'.$i}
                                        : $package->{'feature_'.$i.'_en'};
                                @endphp
                                @if($feature)
                                    <li>{{ $feature }}</li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ================= ARTICLES ================= --}}
    @if($articles->count())
    <section class="search-section">
        <h2 class="text-2xl font-bold mb-6">{{ __('messages.articles') ?? 'Articles' }}</h2>

        <div class="search-grid">
            @foreach($articles as $article)
                <a href="{{ route('articles.show', App::isLocale('ar') ? $article->article_url_ar : $article->article_url_en) }}"
                   class="search-card">
                    <div class="search-img">
                        <img src="{{ asset('img/articles/' . $article->image) }}">
                    </div>
                    <div class="search-content">
                        <h3 class="search-title">
                            {{ App::isLocale('ar') ? $article->title_ar : $article->title }}
                        </h3>
                        <p class="search-desc">
                            {{ Str::limit(App::isLocale('ar') ? $article->details_ar : $article->details, 100) }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ================= NO RESULTS ================= --}}
    @if(!$products->count() && !$packages->count() && !$articles->count())
        <div class="text-center py-24">
            <div style="font-size:60px">🔍</div>
            <h2 style="font-size:22px;font-weight:700">
                {{ App::isLocale('ar') ? 'لا توجد نتائج' : 'No Results Found' }}
            </h2>
            <p style="color:#777">
                {{ App::isLocale('ar') ? 'جرّب كلمة بحث أخرى' : 'Try another keyword' }}
            </p>
        </div>
    @endif

</div>
@endsection
