<template>
    <div class="breadcrumbs container" id="breadcrumbs-products">
        <a class="breadcrumbs__item" href="/">Главная</a>
        <span class="breadcrumbs__divider"> &nbsp;/&nbsp;</span>
        <a
            class="breadcrumbs__item"
            v-bind:class="{ 'current': this.getSlug() === 'products'}"
            :href="`/${locale}/products`">Продукция
        </a>
        <span class="category breadcrumbs__divider" v-if="categoryName != null"> &nbsp;/&nbsp; </span>
        <a
            class="category breadcrumbs__item"
            v-bind:class="{ 'current': categoryName != null && subcategoryName == null && productName == null}"
            :href="categoryLink"
            v-if="categoryName != null">{{ categoryName }}
        </a>
        <span class="breadcrumbs__divider" v-if="subcategoryName != null">&nbsp;/&nbsp;</span>
        <a
            class="breadcrumbs__item"
            v-bind:class="{ 'current': categoryName != null && subcategoryName != null && productName == null }"
            :href="subcategoryLink"
            v-if="subcategoryName != null">{{ subcategoryName }}
        </a>
        <span class="breadcrumbs__divider" v-if="productName != null">&nbsp;/&nbsp;</span>
        <a class="breadcrumbs__item"
           :href="productLink"
           v-bind:class="{ 'current': categoryName != null && subcategoryName != null && productName != null }"
           v-if="productName != null">{{ productName }}
        </a>
    </div>
</template>

<script>
import {homeMixin} from "../../../mixins/homeMixin";

export default {
    mixins:[homeMixin],
    props: ['locale'],
    mounted() {
        window.addEventListener('load', () => {
            setTimeout(() => {
                this.getData();
            }, 100)
            console.log('aasd');
            console.log(this.categoryName);
        })

    },
    data: () => ({
        categoryName: null,
        categoryLink: null,
        subcategoryName: null,
        subcategoryLink: null,
        productName: null,
        productLink: null,
    }),
    methods: {
        getData() {
                this.categoryName = window.breadcrumb.category.name;
                this.categoryLink = `${this.locale}/products/${window.breadcrumb.category.slug}`;
                this.subcategoryName = window.breadcrumb.subcategory.name;
                this.subcategoryLink = `${this.locale}/products/${window.breadcrumb.category.slug}/${window.breadcrumb.subcategory.slug}`;
                this.productName = window.breadcrumb.product.name;
                this.productLink = `${this.locale}/products/${window.breadcrumb.category.slug}/${window.breadcrumb.subcategory.slug}/${window.breadcrumb.product.slug}`;
        }
    }
}
</script>
