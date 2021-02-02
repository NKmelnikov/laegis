@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection

<main class="services-metalworking-home-wrapper">
    @include('layouts.header-second', ['message' => __('service.index.tool_recovery')])
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
        <a class="breadcrumbs__item current" >{{ __('service.recovery.title') }}</a>
    </div>
    <section class="recovery-wrapper container">
        <div class="recovery-wrapper__box first-section">
            <div class="text-container">
                <div class="title">{{ __('service.recovery.title') }}</div>
                <div class="line"></div>
                <div class="text">
                    <p>{{ __('service.recovery.p1') }}</p>
                </div>
            </div>
        </div>
        <div class="recovery-wrapper__box second-section">
            <div class="img-container">
                <img src="{{ asset('img/recovery/recovery2.png') }}" alt="металлообработка">
            </div>
            <div class="text-container">
                <div class="title">{{ __('service.recovery.tool_coating') }}</div>
                <div class="line"></div>
                <div class="text">
                    <p>{{ __('service.recovery.p2') }}</p>
                </div>
            </div>
        </div>
        <div class="recovery-wrapper__box third-section">
            <div class="title">{{ __('service.recovery.types_of_coatings') }}</div>
            <div class="coating-item">
                <img src="{{ asset('img/recovery/coating1.png') }}" class="product-img" alt="">
                <div class="coating-item__text">
                    <div class="coating-item__header">
                        <div class="coating-item__title">{{ __('service.recovery.coating_name1') }}</div>
                    </div>
                    <div class="coating-item__spec">{!! __('service.recovery.spec1') !!} </div>
                    <div class="coating-item__description">{{ __('service.recovery.description1') }}</div>
                </div>
            </div>
            <div class="coating-item">
                <img src="{{asset('img/recovery/coating2.png')}}" class="product-img" alt="">
                <div class="coating-item__text">
                    <div class="coating-item__header">
                        <div class="coating-item__title">{{ __('service.recovery.coating_name2') }}</div>
                    </div>
                    <div class="coating-item__spec">{!! __('service.recovery.spec2') !!} </div>
                    <div class="coating-item__description">{{ __('service.recovery.description2') }}</div>
                </div>
            </div>
            <div class="coating-item">
                <img src="{{asset('img/recovery/coating3.png')}}" class="product-img" alt="">
                <div class="coating-item__text">
                    <div class="coating-item__header">
                        <div class="coating-item__title">{{ __('service.recovery.coating_name3') }}</div>
                    </div>
                    <div class="coating-item__spec">{!! __('service.recovery.spec3') !!} </div>
                    <div class="coating-item__description">{{ __('service.recovery.description3') }}</div>
                </div>
            </div>
            <div class="coating-item">
                <img src="{{asset('img/recovery/coating4.png')}}" class="product-img" alt="">
                <div class="coating-item__text">
                    <div class="coating-item__header">
                        <div class="coating-item__title">{{ __('service.recovery.coating_name4') }}</div>
                    </div>
                    <div class="coating-item__spec">{!! __('service.recovery.spec4') !!} </div>
                    <div class="coating-item__description">{{ __('service.recovery.description4') }}</div>
                </div>
            </div>
            <div class="coating-item">
                <img src="{{asset('img/recovery/coating5.png')}}" class="product-img" alt="">
                <div class="coating-item__text">
                    <div class="coating-item__header">
                        <div class="coating-item__title">{{ __('service.recovery.coating_name5') }}</div>
                    </div>
                    <div class="coating-item__spec">{!! __('service.recovery.spec5') !!} </div>
                    <div class="coating-item__description">{{ __('service.recovery.description5') }}</div>
                </div>
            </div>
        </div>

    </section>
</main>

@endsection
