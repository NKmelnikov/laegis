<template>
    <section id="s2" class="second-section">
        <div class="second-section__advantages adv-section_js container">
            <div class="second-section__advantages-item text-item">
                <div class="title">Преимущества <br> нашей компании</div>
                <div class="line"></div>
                <div class="text">Мы сотрудничаем с крупнейшими производственными компания по всему миру</div>
            </div>
            <div class="second-section__advantages-item">
                <div class="title">{{ clients }}</div>
                <div class="line"></div>
                <div class="text">Клиентов</div>
            </div>
            <div class="second-section__advantages-item">
                <div class="title">{{ yearsOrMarket }}</div>
                <div class="line"></div>
                <div class="text">Лет <br> на рынке</div>
            </div>
            <div class="second-section__advantages-item">
                <div class="title">{{ developers }}</div>
                <div class="line"></div>
                <div class="text">Лучших <br> производителей</div>
            </div>
            <div class="second-section__advantages-item">
                <div class="title">{{ countries }}</div>
                <div class="line"></div>
                <div class="text">Стран <br> отгрузки</div>
            </div>
        </div>
        <div class="second-section__partner container">
            <img src="/img/back0.png" alt="">
            <div class="second-section__partner-info">
                <div class="title">
                    Ваш надёжный <br> партнёр и поставщик
                </div>
                <div class="line"></div>
                <div class="text">
                    Мы работаем с высококачественными материалами
                    и предоставляем отличный сервис, потому что
                    считаем, что это единственный способ работать
                    хорошо. Мы каждый день тестируем наши продукты
                    с клиентами, каждый день в постоянном процессе
                    разработки, где единственные вещи, которые
                    считаются важными - это факты, цифры и отчеты.
                    Мы используем нашу гибкость, потому что это
                    позволяет нам сосредоточиться на деталях и
                    предлагать своим клиентам индивидуальные решения.
                </div>
                <a class="btn" href="/about">Подробнее</a>
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
        clients : 1,
        yearsOrMarket : 1,
        developers : 1,
        countries : 1,
        advCountTriggered : false,
    }),
    methods: {
        advantageCounter(time, val, item) {
            setInterval(() => {
                if(this[item] !== val){
                    this[item]++
                }
            },time)
        },

        handleScroll () {
            const advSection = document.querySelector('.adv-section_js');
            if (this.isInViewport(advSection) && !this.advCountTriggered) {
                this.startAdvantageCount();
            }
        },

        startAdvantageCount() {
            this.advantageCounter(25, 110, 'clients')
            this.advantageCounter(100, 5, 'yearsOrMarket')
            this.advantageCounter(100, 11, 'developers')
            this.advantageCounter(100, 6, 'countries')
            this.advCountTriggered = true;
        }
    }
}
</script>
