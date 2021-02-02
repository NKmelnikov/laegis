@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@endsection

<main class="services-metalworking-home-wrapper">
    @include('layouts.header-second', ['message' => __('service.index.complex_metalworking')])
    <div class="breadcrumbs container" id="breadcrumbs-products">
        <a
            class="breadcrumbs__item"
            href="{{ sprintf('/%s/',app()->getLocale()) }}"
        >{{ __('layouts.header.main') }}</a>
        <span class="breadcrumbs__divider">
      &nbsp;/&nbsp;
    </span>
        <a
            class="breadcrumbs__item"
            href="{{ sprintf('/%s/services',app()->getLocale()) }}"
        >{{ __('layouts.header.services') }}</a>
        <span
            class="breadcrumbs__divider">
      &nbsp;/&nbsp;
    </span>
        <a class="breadcrumbs__item current" >{{ __('service.metalworking.header') }}</a>
    </div>
    <section class="metalworking-wrapper container">
        <div class="metalworking-wrapper__box first-section">
            <div class="img-container">
                <img src="{{ asset('img/metalworking/metalworking-title-image.jpg') }}" alt="металлообработка">
            </div>
            <div class="text-container">
                <div class="title">{{ __('service.metalworking.title') }}</div>
                <div class="line"></div>
                <div class="text">
                    <p>{{ __('service.metalworking.p1') }}</p>
                    <p>{{ __('service.metalworking.p2') }}</p>
                </div>
            </div>
        </div>
        <div class="metalworking-wrapper__box second-section">
            <div class="title">{{ __('service.metalworking.services_we_offer') }}</div>
            <div class="services">
                <div class="services__item ">
                    <div class="img tokar"></div>
                    <p class="text">{{ __('service.metalworking.service1') }}</p>
                </div>
                <div class="services__item ">
                    <div class="img frez"></div>
                    <p class="text">{{ __('service.metalworking.service2') }}</p>
                </div>
                <div class="services__item ">
                    <div class="img termo"></div>
                    <p class="text">{{ __('service.metalworking.service3') }}</p>
                </div>
                <div class="services__item ">
                    <div class="img nakat"></div>
                    <p class="text">{{ __('service.metalworking.service4') }}</p>
                </div>
            </div>
        </div>
        <div class="metalworking-wrapper__box third-section">
            <div class="title">{{ __('service.metalworking.processed_materials') }}</div>
            <ul class="metalworking-list">
                <li class="metalworking-list__item">{{ __('service.metalworking.material1') }}</li>
                <li class="metalworking-list__item">{{ __('service.metalworking.material2') }}</li>
                <li class="metalworking-list__item">{{ __('service.metalworking.material3') }}</li>
                <li class="metalworking-list__item">{{ __('service.metalworking.material4') }}</li>
            </ul>
        </div>
        <div class="metalworking-wrapper__box fourth-section">
            <div class="title">{{ __('service.metalworking.completed_work') }}</div>
            <div class="equipment-container">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach($portfolio as $item)
                            @if ($loop->first)
                                <div class="carousel-item active">
                                    <div class="carousel-image d-block" style='background-image: url("{{ $item->imgPath }}")'></div>
                                </div>
                            @endif
                            <div class="carousel-item">
                                <div class="carousel-image d-block" style='background-image: url("{{ $item->imgPath }}")'></div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
