<template>
    <section id="s2" class="second-section">
        <div class="second-section__advantages adv-section_js container">
            <div class="second-section__advantages-item text-item">
                <div class="title">{{ __('main.second.advantages_title') }}</div>
                <div class="line"></div>
                <div class="text">{{ __('main.second.advantages_text') }}</div>
            </div>
            <div class="second-section__advantages-item">
                <div class="title">{{ clients }}</div>
                <div class="line"></div>
                <div class="text">{{ __('main.second.clients') }}</div>
            </div>
            <div class="second-section__advantages-item">
                <div class="title">{{ yearsOrMarket }}</div>
                <div class="line"></div>
                <div class="text">{{ __('main.second.years') }}</div>
            </div>
            <div class="second-section__advantages-item">
                <div class="title">{{ developers }}</div>
                <div class="line"></div>
                <div class="text">{{ __('main.second.providers') }}</div>
            </div>
            <div class="second-section__advantages-item">
                <div class="title">{{ countries }}</div>
                <div class="line"></div>
                <div class="text">{{ __('main.second.countries') }}</div>
            </div>
        </div>
        <div class="second-section__partner container">
            <img src="/img/back0.png" alt="">
            <div class="second-section__partner-info">
                <div class="title">
                    {{ __('main.second.your_partner_title') }}
                </div>
                <div class="line"></div>
                <div class="text">
                    {{ __('main.second.your_partner_text') }}
                </div>
                <a class="btn" :href="`${locale}/about`">{{ __('main.second.more') }}</a>
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
        console.log(this.locale);

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
