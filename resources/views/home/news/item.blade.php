@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection
<main class="news-item-wrapper">
    <section class="header-container">
        <div class="header-box container">
            <div class="header-box__title">{{ $item['title'] }}</div>
        </div>
    </section>
    <div class="breadcrumbs container" id="breadcrumbs-products">
        <a
            class="breadcrumbs__item"
            href="{{ sprintf('/%s/',app()->getLocale()) }}"
        >Главная</a>
        <span class="breadcrumbs__divider">
      &nbsp;/&nbsp;
    </span>
        <a
            class="breadcrumbs__item"
            href="{{ sprintf('/%s/news',app()->getLocale()) }}"
        >Новости</a>
        <span
            class="breadcrumbs__divider">
      &nbsp;/&nbsp;
    </span>
        <a class="breadcrumbs__item current" >{{ $item['title'] }}</a>
    </div>
    <section class="news-item-container container">
        <article class="news-item-container__article">
            {!!
                (app()->getLocale() !== 'ru' && !empty($item['article_' . app()->getLocale()]) )
                ? $item['article_' . app()->getLocale()]
                : $item->article
             !!}
        </article>
    </section>

</main>
@endsection
