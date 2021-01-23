<header class="header-desktop">
    <nav class="logo"><a href="#"><img src="{{asset('img/AEGIS_logo_white_en.png')}}" alt=""></a></nav>
    <nav class="item item1 item-main">
        <a href="{{ sprintf('/%s',app()->getLocale()) }}">{{ __('layouts/header.main') }}</a>
    </nav>
    <nav class="item item2 item-products">
        <a href="{{ sprintf('/%s/products',app()->getLocale()) }}">{{ __('layouts/header.products') }}</a>
    </nav>
    <nav class="item item2 item-products">
        <a href="{{ sprintf('/%s/services',app()->getLocale()) }}">{{ __('layouts/header.services') }}</a>
    </nav>
    <nav class="item item3 item-catalogs">
        <a href="{{ sprintf('/%s/catalogs',app()->getLocale()) }}">{{ __('layouts/header.catalogs') }}</a>
    </nav>
    <nav class="item item4 item-news">
        <a href="{{ sprintf('/%s/news',app()->getLocale()) }}">{{ __('layouts/header.news') }}</a>
    </nav>
    <nav class="item item5 item-about">
        <a href="{{ sprintf('/%s/about',app()->getLocale()) }}">{{ __('layouts/header.about') }}</a>
    </nav>
    {{app()->getLocale() }}
    <div class="translation">
        @foreach (config('app.available_locales') as $locale)
            <div class="nav-item">
                <a class="nav-link translation__{{app()->getLocale()}}"
                   href="
                    {{
                    route(
                        \Illuminate\Support\Facades\Route::currentRouteName(),
                        array_merge(\Illuminate\Support\Facades\Route::current()->parameters(),
                        ['locale'=> $locale])
                        )
                    }}"
                   @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
            </div>
        @endforeach
    </div>
    <!--  <nav class="item item6 item-translations">-->
    <!--    <div class="item-translations__ru">RU</div>-->
    <!--    <div class="item-translations__en">EN</div>-->
    <!--  </nav>-->
    <nav id="o-s0" class="item item6 item-contacts">
        <div class="line-container" id="o-s1">
            <span class="line line-top" id="o-s2"></span>
            <span class="line line-mid" id="o-s3"></span>
            <span class="line line-bot" id="o-s4"></span>
        </div>
    </nav>
</header>
<header class="header-mobile">
    <nav class="logo"><a href="#"><img src="{{asset('img/AEGIS_logo_white_en.png')}}" alt=""></a></nav>
    <nav id="o-s5" class="item item6 item-contacts">
        <div class="line-container" id="o-s6">
            <span class="line line-top" id="o-s7"></span>
            <span class="line line-mid" id="o-s8"></span>
            <span class="line line-bot" id="o-s9"></span>
        </div>
    </nav>
</header>
