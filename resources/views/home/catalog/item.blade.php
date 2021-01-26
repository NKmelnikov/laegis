@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection
<main class="catalog-item-wrapper">
    @include('layouts.header-second', ['message' => translate($brand, 'name')])
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
            href="{{ sprintf('/%s/catalogs',app()->getLocale()) }}"
        >{{ __('layouts/header.catalogs') }}</a>
        <span
            class="breadcrumbs__divider">
      &nbsp;/&nbsp;
    </span>
        <a class="breadcrumbs__item current" >{{ $brand['name'] }}</a>
    </div>
    <section class="brand-description container">
        {!!translate($brand, 'description')!!}
    </section>

{{-- resources/js/components/home/catalog/index.vue --}}
    <home-catalog :locale="{{ json_encode(app()->getLocale(), true)}}"></home-catalog>
</main>

@endsection
