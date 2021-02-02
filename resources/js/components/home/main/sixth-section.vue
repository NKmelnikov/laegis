<template>
    <section id="s6" class="sixth-section">
        <div id="map-wrap" @click="activateMap()" @mouseleave="deactivateMap()">
            <!--      <a href="https://yandex.ru/maps/158/mogilev/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Могилёв</a>-->
            <!--      <a href="https://yandex.ru/maps/158/mogilev/house/Z0kYdAFlTUACQFtpfXR2eH1hZQ==/?ll=30.265455%2C53.879122&utm_medium=mapframe&utm_source=maps&z=17.32" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Челюскинцев, 172 — Яндекс.Карты</a>-->
            <!--      <iframe src="https://yandex.ru/map-widget/v1/-/CCQ3bKCB2A" width="100%" height="600" frameborder="1" allowfullscreen="true" style="position:relative; pointer-events: none;"></iframe>-->
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A3192def8917fb60145baeed5886d061a481d064e7e5a58ee11f982e405bc3e4d&amp;source=constructor" width="100%" height="600" frameborder="0" style="pointer-events: none;"></iframe>
        </div>
<!--        <div class="fourth-section-wrapper container">-->
<!--            <div class="outer-title">-->
<!--                Наши партнеры-->
<!--            </div>-->
<!--            <div class="brands-wrapper">-->
<!--                <carousel  v-if="loaded" :items="5" :margin="30" :autoplay="true" :nav="false">-->
<!--                    <img class="brand-img" v-for="item in entities" :src="item.imgPath" alt="" v-bind:class="{'bison': item.slug === 'bison'}">-->
<!--&lt;!&ndash;                    <div class="brand-img" v-for="item in entities" v-bind:style="{'background-image': 'url(' + item.imgPath + ')'}"></div>&ndash;&gt;-->
<!--                </carousel>-->
<!--            </div>-->
<!--        </div>-->
    </section>
</template>
<script>
import {homeMixin} from "../../../mixins/homeMixin";
import carousel from 'vue-owl-carousel';

export default {
    mixins: [homeMixin],
    props: [
        'locale'
    ],
    created () {

    },
    mounted() {
    },
    data: () => ({
        entities: [],
        loaded: false
    }),
    methods: {
        activateMap() {
            this.yandexMap = document.querySelector('#map-wrap iframe');
            this.yandexMap.style.pointerEvents = 'all';
        },

        deactivateMap() {
            this.yandexMap.style.pointerEvents = 'none';
        }
    }
}
</script>
