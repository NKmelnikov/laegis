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
    <div class="breadcrumbs container" id="breadcrumbs-products">
        <a
            class="breadcrumbs__item"
            href="/"
        >Главная</a>
        <span class="breadcrumbs__divider">
      &nbsp;/&nbsp;
    </span>
        <a
            class="breadcrumbs__item"
            href="/ru/products"
        >Продукция</a>
        <span
            class="breadcrumbs__divider">
      &nbsp;/&nbsp;
    </span>
        <a
            class="breadcrumbs__item"
            href="/products/category"
        > Категория </a>
        <span
            class="breadcrumbs__divider">
      &nbsp;/&nbsp;
    </span>
        <a
            class="breadcrumbs__item"
            href="/products/category/sub"
        >Подкатегория</a>
        <span
            class="breadcrumbs__divider">
      &nbsp;/&nbsp;
    </span>
        <a
            class="breadcrumbs__item"
            href="/products/category/sub.product"
        >Продукт</a>
    </div>

    <div class="home-product-wrapper container">
        <div class="content-container container">
            @include('home.product.category-accordion', ['categories' => $categories])
            <section class="product-wrapper">
                <div id="current-view-name" class="selected-name"> selectedNameToShow </div>
                <div>
                    <home-products :products="{{ $products ?? false }}"></home-products>
                </div>
            </section>
        </div>
    </div>
</main>
@push('single-script')
    @include('home/product.js')
@endpush
@endsection
