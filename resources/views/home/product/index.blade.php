@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@endsection

<main class="products-home-wrapper">
    @include('layouts/header-second', ['message' => 'Продукция'])
    <home-breadcrumbs :locale="{{ json_encode(app()->getLocale(), true) }}"></home-breadcrumbs>

    <div class="home-product-wrapper container">
        <div class="product-home-cloak"></div>
        <div class="content-container container">
            @include('home.product.category-accordion', ['categories' => $categories])
            <section class="product-wrapper">
                <home-product-list :categories="{{ json_encode($categories, true) }}" :type="{{ json_encode($type, true) }}" :locale="{{ json_encode(app()->getLocale(), true) }}"></home-product-list>
            </section>
        </div>
    </div>
</main>
@push('single-script')
    @include('home/product.js')
@endpush
@endsection
