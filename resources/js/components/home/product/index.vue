<template>
        <section class="product-keeper">
            <div class="product-container">
                <div v-if="entities.data.length === 0">В этой категории продукты не представлены</div>
                <div v-else class="product-item" v-for="item in entities.data">
                    <div class="product-img" v-bind:style="{'background-image': 'url(' + item.imgPath + ')'}"></div>
                    <div class="product-title-desc-container">
                        <div class="product-item__title">{{item.name}}</div>
                        <div class="product-item__content description" v-html="item.description"></div>
                    </div>
                    <div class="product-item__actions button-container">
                        <button class="price aegis-btn">Запросить цену</button>
                        <a class="more aegis-btn" :href="`/products/${item.category_slug}/${item.subcategory_slug}/${item.slug}`">Подробнее</a>
                    </div>
                </div>
            </div>
            <pagination :data="entities" @pagination-change-page="getEntities" class="container">
                <span slot="prev-nav"><i class="material-icons md-18">arrow_left</i></span>
                <span slot="next-nav"><i class="material-icons md-18">arrow_right</i></span>
            </pagination>
        </section>
</template>

<script>
import {homeMixin} from "../../../mixins/homeMixin";

export default {
    mixins:[homeMixin],
    props: ['locale', 'type'],
    mounted() {
        this.getEntities();
    },
    data: () => ({
        entities: [],
        entityName: ''
    }),
    methods: {
        getEntities(page = 1) {
            switch (this.type) {
                case 'all':
                    this.getAll(page);
                    break;
                case 'category':
                    this.getByCategory(page);
                    break;
                case 'subcategory':
                    this.getBySubcategory(page);
                    break;
                case 'brandAll':
                    this.getAllBrand(page);
                    break;
                case 'brand':
                    this.getByBrand(page);
                    break;
            }
        },
        getAll(page = 1) {
            axios.get(`/home/product/get-all?page=${page}`)
                .then((res) => {
                    this.entities = res.data;
                    console.log(this.entities);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getByCategory(page = 1) {
            axios.post(
                `/home/product/get-by-category?page=${page}`,
                {slug: this.getSlug()}
            )
                .then((res) => {
                    this.entities = res.data;
                    console.log(this.entities);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getBySubcategory(page = 1) {
            axios.post(
                `/home/product/get-by-subcategory?page=${page}`,
                {slug: this.getSlug()}
            )
                .then((res) => {
                    this.entities = res.data;
                    console.log(this.entities);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getAllBrand(page = 1) {
            axios.get(
                `/home/product/get-all-brand?page=${page}`,
            )
                .then((res) => {
                    this.entities = res.data;
                    console.log(this.entities);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getByBrand(page = 1) {
            axios.post(
                `/home/product/get-by-brand?page=${page}`,
                {slug: this.getSlug()}
            )
                .then((res) => {
                    this.entities = res.data;
                    console.log(this.entities);
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
}
</script>
