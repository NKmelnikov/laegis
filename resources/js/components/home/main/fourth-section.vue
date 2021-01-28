<template>
    <section id="s4" class="fourth-section">
        <div class="fourth-section-wrapper container">
            <div class="outer-title">
                Наши партнеры
            </div>
            <div class="brands-wrapper">
                <carousel  v-if="loaded" :items="5" :margin="30" :autoplay="true" :nav="false">
                    <img class="brand-img" v-for="item in entities" :src="item.imgPath" alt="" v-bind:class="{'bison': item.slug === 'bison'}">
<!--                    <div class="brand-img" v-for="item in entities" v-bind:style="{'background-image': 'url(' + item.imgPath + ')'}"></div>-->
                </carousel>
            </div>
        </div>
    </section>
</template>
<script>
import {homeMixin} from "../../../mixins/homeMixin";
import carousel from 'vue-owl-carousel';

export default {
    mixins: [homeMixin],
    components: { carousel },
    props: [
        'locale'
    ],
    created () {

    },
    mounted() {
        this.getBrands();
    },
    data: () => ({
        entities: [],
        loaded: false
    }),
    methods: {
        getBrands() {
            axios.get(
                `/home/get-brands`,
            )
                .then((res) => {
                    this.entities = res.data;
                    this.loaded = true;
                    console.log(this.entities);
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
}
</script>
