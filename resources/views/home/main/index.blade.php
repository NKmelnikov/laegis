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
                <a href="/products">
                    <div class="background-text"></div>
                    <span class="link-text">
            Продукция
          </span>
                </a>
            </div>
        </div>
        <div class="first-section-mobile__box services">
            <div class="first-section-mobile__item left section-metalworking">
                <a href="/services/metalworking">
                    <div class="background-text"></div>
                    <span class="link-text">
            Комплексная металлообработка
          </span>
                </a>
            </div>
            <div class="first-section-mobile__item right section-recovery">
                <a href="/services/recovery">
                    <div class="background-text"></div>
                    <span class="link-text">
            Восстановление инструмента
          </span>
                </a>
            </div>
        </div>
    </section>

    <second-section></second-section>
    <third-section></third-section>
    <fourth-section></fourth-section>
    <fifth-section></fifth-section>
    <sixth-section></sixth-section>

{{--    <section id="s5" class="fifth-section">--}}
{{--        <div class="title-container container">--}}
{{--            <div class="title" routerLink="/news">Новости--}}
{{--                <span class="material-icons"> east </span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <owl-carousel-o class="news-carousel container" [options]="carouselNewsOptions">--}}
{{--            <ng-template *ngFor="let post of news" carouselSlide>--}}
{{--                <div class="news-wrapper" [routerLink]="'/news/'+post.slug">--}}
{{--                    <div class="upper-box">--}}
{{--                        <div class="img-container" [ngStyle]="{'background-image': 'url(' +  post.imgPath + ')'}"></div>--}}
{{--                        <div class="date">{{post.created_at | date:'dd/MM/yyyy'}}</div>--}}
{{--                        <div class="title">{{ post.title }}</div>--}}
{{--                        <div class="line line1"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </ng-template>--}}
{{--        </owl-carousel-o>--}}
{{--    </section>--}}

</main>

@endsection
