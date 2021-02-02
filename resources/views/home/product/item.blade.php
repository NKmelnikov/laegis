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
    @include('layouts/header-second', ['message' =>  __('product.index.products')])

    <div class="home-product-wrapper container">
        <div class="product-home-cloak"></div>
        <div class="content-container container">
            @include('home.product.category-accordion', ['categories' => $categories])
            <section class="product-wrapper">
                <home-product-item :locale="{{ json_encode(app()->getLocale(), true) }}"></home-product-item>
            </section>
        </div>
    </div>
</main>
@endsection
