<footer>
    <section class="footer-up container">
        <div class="footer-up__item brands">
            <a href="{{ sprintf('/%s/catalogs', app()->getLocale()) }}">
                <h3 class="title brands clickable">Бренды</h3>
            </a>
            <footer-brands></footer-brands>
        </div>
        <div class="footer-up__item services">
            <a href="{{ sprintf('/%s/services', app()->getLocale()) }}">
                <h3 class="title brands clickable">Услуги</h3>
            </a>
            <a class="text" href="{{ sprintf('/%s/services/metalworking', app()->getLocale()) }}">Комплексная металлообработка</a>
            <a class="text" href="{{ sprintf('/%s/services/recovery', app()->getLocale()) }}">Восстановление инструмента </a>
        </div>
        <div class="footer-up__item">
            <h3 class="title">Контакты</h3>
            <div class="footer-up__item_info-item">
                <div class="footer-up__item_small-img">
                    <img src="{{asset('/img/footer-icon-img-01.png')}}" alt="icon_widget_image">
                </div>
                <div class="footer-up__item_small-text text">212012, ул. Челюскинцев,<br>д. 172, г. Могилёв, <br>Республика Беларусь</div>
            </div>
            <div class="footer-up__item_info-item">
                <div class="footer-up__item_small-img">
                    <img src="{{ asset('/img/footer-icon-img-03.png') }}" alt="icon_widget_image">
                </div>
                <div class="footer-up__item__small-text text">+ (375) 222 65-92-02<br>+ (375) 222 40-40-40</div>
            </div>
            <div class="footer-up__item_info-item">
                <div class="footer-up__item_small-img">
                    <img src="{{ asset('/img/footer-icon-img-02.png') }}" alt="icon_widget_image">
                </div>
                <div class="footer-up__item_small-text text">info@aegis.by</div>
            </div>
        </div>
        <div class="footer-up__item contact-us">
            <h3 class="title">Напишите нам</h3>
            <footer-contact-form></footer-contact-form>

        </div>
    </section>
    <section class="fronter-down-wrapper">
        <section class="footer-down container">

            <div class="footer-down__logo">
                <a href="#"><img src="{{ asset('/img/AEGIS_logo_white_en.png') }}" alt=""></a>
            </div>
            <div class="footer-down__copyright">
                <span>© Copyright Aegis.by</span>
                <span>
          <span>Сайт разработан: </span>
          <a target="_blank" href="https://www.linkedin.com/in/nikita-melnikov-a71a06b8/">nkmelnikov</a></span>
            </div>
            <div class="footer-down__social">
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
        </section>
    </section>
</footer>
