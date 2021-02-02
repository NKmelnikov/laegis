@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection
<main class="main-wrapper">
    <section id="s1" class="first-section">
        <div class="video-container">
            <video id="video-drill" width="120%" height="100%" autoplay loop muted>
                <source src="{{ asset('/videos/drill.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </section>
    <section id="s1-mobile" class="first-section-mobile">
        <div class="first-section-mobile__box products">
            <div class="first-section-mobile__item section-products">
                <a href="{{ sprintf('/%s/products',app()->getLocale()) }}">
                    <div class="background-text"></div>
                    <span class="link-text">
            {{ __('product.index.products') }}
          </span>
                </a>
            </div>
        </div>
        <div class="first-section-mobile__box services">
            <div class="first-section-mobile__item left section-metalworking">
                <a href="{{ sprintf('/%s/services/metalworking',app()->getLocale()) }}">
                    <div class="background-text"></div>
                    <span class="link-text">
            {{ __('service.metalworking.header') }}
          </span>
                </a>
            </div>
            <div class="first-section-mobile__item right section-recovery">
                <a href="{{ sprintf('/%s/services/recovery',app()->getLocale()) }}">
                    <div class="background-text"></div>
                    <span class="link-text">
            {{ __('service.recovery.title') }}
          </span>
                </a>
            </div>
        </div>
    </section>

    <second-section :locale="{{ json_encode(app()->getLocale(), true) }}"></second-section>
    <third-section :locale="{{ json_encode(app()->getLocale(), true) }}"></third-section>
    <fourth-section :locale="{{ json_encode(app()->getLocale(), true) }}"></fourth-section>
    <fifth-section :locale="{{ json_encode(app()->getLocale(), true) }}"></fifth-section>
    <sixth-section></sixth-section>
</main>

@endsection
