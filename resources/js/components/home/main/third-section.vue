<template>
    <section id="s3" class="third-section">
        <div class="third-section__1 proofs-section_js container">
            <div class="third-section__1_item proof-item_js">
                <div class="img-container">
                    <img src="/img/hands.png" alt="">
                </div>
                <div class="line"></div>
                <div class="small-title">{{ __('main.third.small_title1')}}</div>
                <div class="big-title">{{ __('main.third.big_title1')}}</div>
                <div class="medium-title">{{ __('main.third.medium_title1')}}</div>
                <div class="text">
                    {{ __('main.third.text1')}}
                </div>
            </div>
            <div class="third-section__1_item proof-item_js">
                <div class="img-container">
                    <img src="/img/hands.png" alt="">
                </div>
                <div class="line"></div>
                <div class="small-title">{{ __('main.third.small_title2')}}</div>
                <div class="big-title">{{ __('main.third.big_title2')}}</div>
                <div class="medium-title">{{ __('main.third.medium_title2')}}</div>
                <div class="text">
                    {{ __('main.third.text2')}}
                </div>
            </div>
            <div class="third-section__1_item proof-item_js">
                <div class="img-container">
                    <img src="/img/money.png" alt="">
                </div>
                <div class="line"></div>
                <div class="small-title">{{ __('main.third.small_title3')}}</div>
                <div class="big-title">{{ __('main.third.big_title3')}}</div>
                <div class="medium-title">{{ __('main.third.medium_title3')}}</div>
                <div class="text">{{ __('main.third.text3')}}</div>
            </div>
            <div class="third-section__1_item proof-item_js">
                <div class="img-container">
                    <img src="/img/car.png" alt="">
                </div>
                <div class="line"></div>
                <div class="small-title">{{ __('main.third.small_title4')}}</div>
                <div class="big-title">{{ __('main.third.big_title4')}}</div>
                <div class="medium-title">{{ __('main.third.medium_title4')}}</div>
                <div class="text">{{ __('main.third.text4')}}</div>
            </div>
        </div>
        <div class="third-section__2 quality-section_js container">
            <div class="third-section__2_info quality-section-left_js">
                <div class="title">{{ __('main.third.appreciate_title')}}</div>
                <div class="line"></div>
                <div class="text">{{ __('main.third.appreciate_text')}}</div>
                <a class="btn" :href="`${locale}/products`">{{ __('main.second.more')}}</a>
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
