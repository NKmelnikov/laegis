<section class="side-bar">
    <div class="cross-box">
        <div class="translation">
            @foreach (config('app.available_locales') as $locale)
                <div class="nav-item">
                    <a class="nav-link translation__{{app()->getLocale()}} {{ (app()->getLocale() == $locale) ? 'active' : ''}}"
                       href="
                    {{
                    route(
                        \Illuminate\Support\Facades\Route::currentRouteName(),
                        array_merge(\Illuminate\Support\Facades\Route::current()->parameters(),
                        ['locale'=> $locale])
                        )
                    }}">{{ strtoupper($locale) }}</a>
                </div>
            @endforeach
        </div>
        <div class="cross-square">
            <span class="line line-crossed-left"></span>
            <span class="line line-crossed-right"></span>
        </div>
    </div>
    <div class="link-box">
        <nav class="item item1 item-main">
            <a href="{{ sprintf('/%s', app()->getLocale()) }}">{{ __('layouts.header.main') }}</a>
        </nav>
        <nav class="item item2 item-products">
            <a href="{{ sprintf('/%s/products', app()->getLocale()) }}">{{ __('layouts.header.products') }}</a>
        </nav>
        <nav class="item item3 item-products">
            <a href="{{ sprintf('/%s/services', app()->getLocale()) }}">{{ __('layouts.header.services') }}</a>
        </nav>
        <nav class="item item4 item-catalogs">
            <a href="{{ sprintf('/%s/catalogs', app()->getLocale()) }}">{{ __('layouts.header.catalogs') }}</a>
        </nav>
        <nav class="item item5 item-news">
            <a href="{{ sprintf('/%s/news', app()->getLocale()) }}">{{ __('layouts.header.news') }}</a>
        </nav>
        <nav class="item item6 item-about">
            <a href="{{ sprintf('/%s/about', app()->getLocale()) }}">{{ __('layouts.header.about') }}</a>
        </nav>
    </div>
    <div class="info-box">
        <h3 class="info-box__head">{{ __('layouts.sidebar.ptue_aegis') }}</h3>
        <h5 class="info-box__head">{{ __('layouts.sidebar.office_title') }}</h5>
        <div class="info-box__item">
            <div class="info-box__small-img">
                <img src="{{ asset('img/footer-icon-img-01.png') }}" alt="icon_widget_image">
            </div>
            <div class="info-box__small-text">
                {!! __('layouts.sidebar.office_address') !!}
            </div>
        </div>
        <div class="info-box__item">
            <div class="info-box__small-img">
                <img src="{{ asset('img/footer-icon-img-03.png') }}" alt="icon_widget_image">
            </div>
            <div class="info-box__small-text">
                + (375) 222 65-92-02 <br>
                + (375) 222 40-40-40
            </div>
        </div>
        <h5 class="info-box__head">{{ __('layouts.sidebar.mailing_title') }}</h5>
        <div class="info-box__item">
            <div class="info-box__small-img">
                <img src="{{ asset('img/footer-icon-img-01.png') }}" alt="icon_widget_image">
            </div>
            <div class="info-box__small-text">
                {!! __('layouts.sidebar.mailing_address') !!}
            </div>
        </div>
        <div class="info-box__item">
            <div class="info-box__small-img">
                <img src="{{ asset('img/footer-icon-img-03.png') }}" alt="icon_widget_image">
            </div>
            <div class="info-box__small-text">
                + (375) 222 64-80-33 <br>
            </div>
        </div>

        <div class="info-box__social">
            <div class="social-network">
                <a href="#" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
            <div class="social-network">
                <a href="#" target="_blank">
                    <i class="fab fa-telegram-plane"></i>
                </a>
            </div>
            <div class="social-network">
                <a href="https://www.linkedin.com/company/aegis-pe" target="_blank">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>
</section>

