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
            <aside class="navigation-container">
                <div class="category-title">
                    Категории
                </div>
                <div id="accordion">
                    @foreach($categories as $category)
                        <div class="card">
                            <div class="card__header {{ $category['slug'] }}" id="{{ 'heading'. $category['slug'] }}">
                                <a href="{{ sprintf('/%s/products/%s', app()->getLocale(), $category['slug'] ) }}">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="{{ '#'. $category['slug'] }}" aria-expanded="false" aria-controls="{{ $category['slug'] }}">
                                       <span class="text">{{ $category['name'] }}</span>
                                    </button>
                                </a>
                            </div>
                            <div id="{{ $category['slug'] }}" class="collapse" aria-labelledby="{{ $category['slug'] }}" data-parent="#accordion">

                                @foreach($category['subcategories'] as $subcategory)
                                    <div class="card__body">
                                        <a href="{{ sprintf('/%s/products/%s/%s', app()->getLocale(), $category['slug'], $subcategory['slug'] ) }}">{{ $subcategory['name'] }}</a>
                                    </div>
                                @endforeach
                                @if($category['subcategories']->isEmpty())
                                        <div class="card__body">
                                            подкатегорий нет
                                        </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </aside>
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
