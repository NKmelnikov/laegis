<template>
    <section id="s5" class="fifth-section">
        news
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
            // axios.get(
            //     `/home/get-brands`,
            // )
            //     .then((res) => {
            //         this.entities = res.data;
            //         this.loaded = true;
            //         console.log(this.entities);
            //     })
            //     .catch((error) => {
            //         console.log(error);
            //     });
        }
    }
}
</script>
