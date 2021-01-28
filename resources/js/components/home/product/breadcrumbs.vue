<template>
    <div class="breadcrumbs container" id="breadcrumbs-products">
        <a class="breadcrumbs__item" href="/">Главная</a>
        <span class="breadcrumbs__divider"> &nbsp;/&nbsp;</span>
        <a
            class="breadcrumbs__item"
            v-bind:class="{ 'current': getSlug() === 'products'}"
            :href="`/${locale}/products`">Продукция
        </a>
        <span class="category breadcrumbs__divider" v-if="breadcrumbs.category.name != null"> &nbsp;/&nbsp; </span>
        <a
            class="category breadcrumbs__item"
            v-bind:class="{ 'current': breadcrumbs.category.name != null && breadcrumbs.subcategory.name == null && breadcrumbs.product.name == null}"
            :href="`/${locale}/products/${breadcrumbs.category.slug}`"
            v-if="breadcrumbs.category.name != null">{{ breadcrumbs.category.name }}
        </a>
        <span class="breadcrumbs__divider" v-if="breadcrumbs.subcategory.name != null && breadcrumbs.subcategory.name !== 'no-subcategory' ">&nbsp;/&nbsp;</span>
        <a
            class="breadcrumbs__item"
            v-bind:class="{ 'current': breadcrumbs.subcategory.name != null && breadcrumbs.subcategory.name != null && breadcrumbs.product.name == null }"
            :href="`/${locale}/products/${breadcrumbs.category.slug}${breadcrumbs.subcategory.slug}`"
            v-if="breadcrumbs.subcategory.name != null && breadcrumbs.subcategory.name !== 'no-subcategory' ">{{ breadcrumbs.subcategory.name }}
        </a>
        <span class="breadcrumbs__divider" v-if="breadcrumbs.product.name != null">&nbsp;/&nbsp;</span>
        <a class="breadcrumbs__item"
           :href="`/${locale}/products/${breadcrumbs.category.slug}${breadcrumbs.subcategory.slug}/${breadcrumbs.product.slug}`"
           v-bind:class="{ 'current': breadcrumbs.subcategory.name != null && breadcrumbs.subcategory.name != null && breadcrumbs.product.name != null }"
           v-if="breadcrumbs.product.name != null">{{ breadcrumbs.product.name }}
        </a>
    </div>
</template>

<script>
import {homeMixin} from "../../../mixins/homeMixin";

export default {
    mixins:[homeMixin],
    props: ['locale', 'breadcrumbs']
}
</script>
