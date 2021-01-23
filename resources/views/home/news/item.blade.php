@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection
<main class="news-item-wrapper">
    @include('layouts.header-second', ['message' => translate($item, 'title')])
    <div class="breadcrumbs container" id="breadcrumbs-products">
        <a
            class="breadcrumbs__item"
            href="{{ sprintf('/%s/',app()->getLocale()) }}"
        >{{ __('layouts/header.main') }}</a>
        <span class="breadcrumbs__divider">
      &nbsp;/&nbsp;
    </span>
        <a
            class="breadcrumbs__item"
            href="{{ sprintf('/%s/news',app()->getLocale()) }}"
        >{{ __('layouts/header.news') }}</a>
        <span
            class="breadcrumbs__divider">
      &nbsp;/&nbsp;
    </span>
        <a class="breadcrumbs__item current" >{{ $item['title'] }}</a>
    </div>
    <section class="news-item-container container">
        <article class="news-item-container__article">
            {!!translate($item, 'article')!!}
        </article>
    </section>

</main>
@endsection
