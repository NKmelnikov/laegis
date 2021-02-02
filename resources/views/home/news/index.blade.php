@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection
<main class="news-wrapper">
    @include('layouts.header-second', ['message' => __('layouts.header.news')])
    <section class="news-container">
        @foreach ($news as $item)
                <div class="news-block">
                    <a class="news-block-link" href="{{ sprintf('/%s/news/%s', app()->getLocale(), $item->slug) }}">
                    <div class="news-block__header">
                        <div class="news-image" style='background-image: url("{{ $item->imgPath }}")'></div>
                    </div>
                    <div class="news-block__content">
                        <div class="news-block__title">
                            {{translate($item, 'title')}}
                        </div>
                        <div class="news-block__short-text">
                            {{ truncateString(translate($item, 'shortText'), 250) }}
                        </div>
                    </div>
                    <div class="news-block__actions">
                        <div class="news-block__date">{{ $item->created_at->format('d-m-Y') }}</div>
                        <a class="aegis-btn action-btn" href="{{ sprintf('/%s/news/%s', app()->getLocale(), $item->slug) }}">{{ __('news.readMore') }}</a>
                    </div>
                    </a>
                </div>
        @endforeach
    </section>
    <section class="pagination-container">
        {{ $news->links('pagination::bootstrap-4') }}
    </section>
</main>
@endsection
