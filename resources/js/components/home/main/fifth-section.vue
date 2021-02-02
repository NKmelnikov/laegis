<template>
    <section id="s5" class="fifth-section">
        <div class="title-container container">
            <a class="title" href="/news">{{ __('main.fifth.news')}}
                <i class="material-icons md-18">east</i>
            </a>
        </div>
        <carousel v-if="loaded" :responsive="{0:{items:1},1024:{items:3}}" :nav="false" class="news-carousel container">
                <a class="main-news-wrapper" v-for="item of entities"  :href="'/news/'+item.slug">
                    <div class="upper-box">
                        <div class="img-container" v-bind:style="{'background-image': 'url(' + item.imgPath + ')'}"></div>
                        <div class="date">{{item.created_at | formatDate('d-m-Y') }}</div>
                        <div class="title">{{ getTranslations(item, 'title') }}</div>
                        <div class="line line1"></div>
                    </div>
                </a>
        </carousel>
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
        this.getNews();
    },
    data: () => ({
        entities: [],
        loaded: false
    }),
    methods: {
        getNews() {
            axios.get(
                `/home/get-news`,
            )
                .then((res) => {
                    this.entities = res.data;
                    this.loaded = true;
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
}
</script>
