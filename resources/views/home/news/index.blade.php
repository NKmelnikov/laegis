@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection
<main class="news-wrapper">
    <section class="header-container">
        <div class="header-box container">
            <div class="header-box__title">{{ __('news/index.news') }}</div>
        </div>
    </section>
    <section class="news-container">
        @foreach ($news as $item)
            <div class="news-block">
                <div class="news-block__header">
                    <div class="news-block__title">
                        {{
                            (app()->getLocale() !== 'ru' && !empty($item['title_' . app()->getLocale()]))
                            ? $item['title_' . app()->getLocale()]
                            : $item->title
                        }}
                    </div>
                    <div class="news-block__date">{{ $item->created_at }}</div>
                </div>
                <div class="news-image" style="background: url({{ $item->imgPath }})"></div>
                <div class="news-block__content">
                    <p>
                        {{
                            (app()->getLocale() !== 'ru' && !empty($item['shortText_' . app()->getLocale()]) )
                            ? $item['shortText_' . app()->getLocale()]
                            : $item->shortText
                         }}
                    </p>
                </div>
                <div class="news-block__actions"><a href="{{ sprintf('/%s/news/%s', app()->getLocale(), $item->slug)  }}">{{ __('news/index.readMore') }}</a></div>
            </div>
        @endforeach
    </section>
    <section class="pagination-container">

    </section>
</main>
@endsection
