<section class="side-bar">
    <div class="cross-box">
        <div class="cross-square">
            <span class="line line-crossed-left"></span>
            <span class="line line-crossed-right"></span>
        </div>
    </div>
    <div class="link-box">
        <nav class="item item1 item-main">
            <a href="{{ sprintf('/%s', app()->getLocale()) }}">Главная</a>
        </nav>
        <nav class="item item2 item-products">
            <a href="{{ sprintf('/%s/products', app()->getLocale()) }}">Продукция</a>
        </nav>
        <nav class="item item3 item-products">
            <a href="{{ sprintf('/%s/services', app()->getLocale()) }}">Услуги</a>
        </nav>
        <nav class="item item4 item-catalogs">
            <a href="{{ sprintf('/%s/catalogs', app()->getLocale()) }}">Каталоги</a>
        </nav>
        <nav class="item item5 item-news">
            <a href="{{ sprintf('/%s/news', app()->getLocale()) }}">Новости</a>
        </nav>
        <nav class="item item6 item-about">
            <a href="{{ sprintf('/%s/about', app()->getLocale()) }}">О нас</a>
        </nav>
    </div>
    <div class="info-box">
        <h3 class="info-box__head">ЧТУП «АЕГИС»</h3>
        <h5 class="info-box__head">Головной офис и склад</h5>
        <div class="info-box__item">
            <div class="info-box__small-img">
                <img src="{{ asset('img/footer-icon-img-01.png') }}" alt="icon_widget_image">
            </div>
            <div class="info-box__small-text">
                212012, ул. Челюскинцев, д. 172 <br> г. Могилёв, Республика Беларусь
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
        <h5 class="info-box__head">Почтовый адрес и бухгалтерия</h5>
        <div class="info-box__item">
            <div class="info-box__small-img">
                <img src="{{ asset('img/footer-icon-img-01.png') }}" alt="icon_widget_image">
            </div>
            <div class="info-box__small-text">
                212030, пер. Пожарный, д.3, <br> г. Могилёв, Республика Беларусь
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

