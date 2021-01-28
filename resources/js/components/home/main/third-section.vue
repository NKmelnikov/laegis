<template>
    <section id="s3" class="third-section">
        <div class="third-section__1 proofs-section_js container">
            <div class="third-section__1_item proof-item_js">
                <div class="img-container">
                    <img src="/img/hands.png" alt="">
                </div>
                <div class="line"></div>
                <div class="small-title">официальные</div>
                <div class="big-title">гарантии качества</div>
                <div class="medium-title">Поставляемой нами <br> продукции</div>
                <div class="text">
                    Наша компания гаратирует замену любой
                    некачественной продукции и предоставляет
                    полную гарантию качества.
                </div>
            </div>
            <div class="third-section__1_item proof-item_js">
                <div class="img-container">
                    <img src="/img/hands.png" alt="">
                </div>
                <div class="line"></div>
                <div class="small-title">официальный</div>
                <div class="big-title">представитель</div>
                <div class="medium-title">компаний-производителей с мировым именем</div>
                <div class="text">
                    Мы являемся официальным представителем нескольких
                    крупнейших мировых производственных компаний.
                </div>
            </div>
            <div class="third-section__1_item proof-item_js">
                <div class="img-container">
                    <img src="/img/money.png" alt="">
                </div>
                <div class="line"></div>
                <div class="small-title">удобная и гибкая</div>
                <div class="big-title">система оплаты</div>
                <div class="medium-title">мы найдем индивидуальный подход к каждому клиенту</div>
                <div class="text">
                    Наша компания предоставляет гибкие условия оплаты.
                    Свяжитесь с нами и мы найдём удобное решение.
                </div>
            </div>
            <div class="third-section__1_item proof-item_js">
                <div class="img-container">
                    <img src="/img/car.png" alt="">
                </div>
                <div class="line"></div>
                <div class="small-title">быстрая</div>
                <div class="big-title">доставка до места</div>
                <div class="medium-title">в течении самых коротких сроков из возможных</div>
                <div class="text">
                    Мы доставим продукцию в кротчайшие сроки,
                    максимально удобным для Вас способом.
                </div>
            </div>
        </div>
        <div class="third-section__2 quality-section_js container">
            <div class="third-section__2_info quality-section-left_js">
                <div class="title">Оцените <br> качество нашей <br> продукции</div>
                <div class="line"></div>
                <div class="text">
                    Уверенность в качестве является для нас
                    одним из главных приоритетов в работе с вами!
                    Под этим девизом мы понимаем: качественную
                    и стабильную продукцию, своевременно оказанные
                    услуги и грамотную техническую поддержку,
                    таким образом: надежность в
                    качестве — надежность во всем!
                    Мы используем передовые технологии как
                    в области подбора продукции, так и в области коммуникаций,
                    логистики и технической поддержки.
                </div>
                <a class="btn" href="/products">Подробнее</a>
            </div>
            <div class="third-section__2_img quality-section-right_js">
                <img src="/img/drill2.png" alt="">
                <img src="/img/drill1.png" alt="">
            </div>
        </div>
    </section>
</template>

<script>
import {homeMixin} from "../../../mixins/homeMixin";

export default {
    mixins: [homeMixin],
    props: [
        'locale'
    ],
    created () {
        window.addEventListener('scroll', this.handleScroll);
    },
    mounted() {

    },
    data: () => ({
        proofsTriggered : false,
        qualityTriggered : false,
    }),
    methods: {
        handleScroll () {
            const proofsSection = document.querySelector('.proofs-section_js');
            const qualitySection = document.querySelector('.quality-section_js');

            if (this.isInViewport(proofsSection) && !this.proofsTriggered) {
                this.proofsAnimation();
            }
            if (this.isInViewport(qualitySection) && !this.qualityTriggered) {
                this.qualityAnimation();
            }
        },

        proofsAnimation() {
            const proofItems = document.querySelectorAll('.proof-item_js');
            for (let i = 0; i < 5; i++) {
                setTimeout(function timer() {
                    proofItems[i].className = proofItems[i].className + ' fadeInFromTop';
                }, i * 300);
            }
            this.proofsTriggered = true;
        },

        qualityAnimation() {
            const qualityLeft = document.querySelector('.quality-section-left_js');
            const qualityRight = document.querySelector('.quality-section-right_js');
            qualityLeft.className = qualityLeft.className + ' fadeInFromLeft';
            qualityRight.className = qualityRight.className + ' fadeInFromRight';
            this.qualityTriggered = true;
        }
    }
}
</script>
