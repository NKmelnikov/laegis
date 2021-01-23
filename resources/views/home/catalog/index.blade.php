@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection
<main class="catalog-home-wrapper">
    @include('layouts.header-second', ['message'=> __('layouts/header.catalogs')])
    <div class="brand-container">
        <div class="brand-box container">
            <div class="brand-box__title">{{ __('catalog/index.select_manufacturer') }}</div>
            <div class="brand-box__brands">
                @foreach ($brands as $item)
                <div class="brand-box__keeper">
                    <a href="{{ sprintf('/%s/catalogs/%s', app()->getLocale(), $item->slug)  }}">
                        <div class="brand-box__img" style='background-image: url("{{ $item->imgPath }}")'></div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection


