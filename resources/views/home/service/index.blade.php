@extends('layouts.app')

@section('content')

@section('meta')
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
@endsection
<main class="services-wrapper">
    <section id="s1" class="first-section">
        <div class="first-section-left-sector"></div>
        <div class="first-section-right-sector"></div>
        <div class="first-section-sq-sector">
            <img class="first-section-sq-sector__left sq-sector-item" src="{{ asset('img/background/sq-left-metalworking.png') }}" alt="">
            <img class="first-section-sq-sector__right sq-sector-item" src="{{ asset('img/background/sq-right-recovery.png') }}" alt="">
        </div>
        <div class="first-section-goToService-sector">
            <div class="first-section-goToService-sector__left goToService-sector-item">
                <div class="title-box title-box-left">{!! __('service/index.complex_metalworking') !!}</div>
                <a
                    class="goToService-btn goToService-btn-left"
                    href="{{ sprintf('/%s/services/metalworking', app()->getLocale())  }}"
                >{!! __('service/index.go_to_section') !!}</a>
            </div>
            <div class="first-section-goToService-sector__right goToService-sector-item">
                <div class="title-box title-box-right">{!! __('service/index.tool_recovery') !!}</div>
                <a
                    class="goToService-btn goToService-btn-left"
                    href="{{ sprintf('/%s/services/recovery', app()->getLocale())  }}"
                >{!! __('service/index.go_to_section') !!}</a>
            </div>
        </div>
    </section>
    <section id="s2" class="second-section">

    </section>
</main>
@endsection
