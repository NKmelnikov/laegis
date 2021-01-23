@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection
        <main class="about-wrapper">
            @include('layouts.header-second', ['message' => __('layouts/header.about')])
            <article class="about-container container">
                <div class="first-section">
                    <div class="img-container">
                        <img src="{{asset('img/about/metalloobrabotka-frezerovka-scaled.jpg')}}" alt="металлообработка">
                    </div>
                    <div class="text-container">
                        <div class="title">{{ __('about/index.company') }}</div>
                        <div class="line"></div>
                        <div class="text">
                            <p>{{ __('about/index.p1') }}</p>
                            <p>{{ __('about/index.p2') }}</p>

                        </div>
                    </div>
                </div>
                <div class="second-section">
                    <p>{{ __('about/index.p3') }}</p>
                    <p>{{ __('about/index.p4') }}</p>
                </div>
                <div class="third-section">
                    <div class="text-container">
                        <div class="title">{{ __('about/index.directions') }}</div>
                        <div class="line"></div>
                        <div class="text">
                            <ul class="work-goals">
                                <li><i class="material-icons md-18">build</i> {{ __('about/index.direction1') }}</li>
                                <li><i class="material-icons md-18">psychology</i> {{ __('about/index.direction2') }}</li>
                                <li><i class="material-icons md-18">engineering</i> {{ __('about/index.direction3') }}</li>
                                <li><i class="material-icons md-18">business</i> {{ __('about/index.direction4') }}</li>
                                <li><i class="material-icons md-18">perm_data_setting</i> {{ __('about/index.direction5') }}</li>
                                <li><i class="material-icons md-18">miscellaneous_services</i> {{ __('about/index.direction6') }}</li>
                                <li><i class="material-icons md-18">local_fire_department</i> {{ __('about/index.direction7') }}</li>
                            </ul>
                            <p class="short-description">{{ __('about/index.p5') }}</p>
                            <br>
                            <p class="main-text">{{ __('about/index.pHighlighted') }}</p>
                        </div>
                    </div>
                </div>
            </article>
        </main>
@endsection
