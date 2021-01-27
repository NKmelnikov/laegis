<template>
    <section class="product-keeper">

        <div id="current-view-name" class="selected-name">{{ pageTitle }}</div>
        <div class="product-container">
            <div v-if="entities.data.length === 0">В этой категории продукты не представлены</div>
            <div v-else class="product-item" v-for="item in entities.data">
                <div class="product-img" v-bind:style="{'background-image': 'url(' + item.imgPath + ')'}"></div>
                <div class="product-title-desc-container">
                    <div class="product-item__title">{{ item.name }}</div>
                    <div class="product-item__content description" v-html="$options.filters.truncate(item.description, 186)"></div>
                </div>
                <div class="product-item__actions button-container">
                    <button class="price aegis-btn">Запросить цену</button>
                    <a class="more aegis-btn" :href="getProductLink(item)">Подробнее</a>
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
    mixins: [homeMixin],
    props: ['locale', 'type', 'categories'],
    mounted() {
        this.getEntities();
        window.breadcrumb = {
            category: {
                name: null,
                slug: null
            },
            subcategory: {
                name: null,
                slug: null
            },
            product: {
                name: null,
                slug: null
            },
        };
    },
    data: () => ({
        entities: [],
        entityName: '',
        pageTitle: 'Все продукты',
        activeCategory: '',
        activeSubcategory: '',
        activeBrand: '',
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
                    this.getPageTitle(this.locale, 'all');
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
                    this.getCategory();
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
                    this.getSubcategory();
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
                    const categoryName = 'Бренды';
                    const categorySlug = 'brands';

                    this.pageTitle = categoryName;
                    window.breadcrumb.category.name = categoryName;
                    window.breadcrumb.category.slug = categorySlug;
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
                    this.getBrand();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getCategory() {
            axios.post(
                `/home/product/get-category`,
                {slug: this.getSlug()}
            )
                .then((res) => {
                    this.activeCategory = res.data;

                    const categoryName = this.getTranslations(this.activeCategory, 'name');
                    const categorySlug = this.activeCategory.slug;

                    this.pageTitle = categoryName;
                    window.breadcrumb.category.name = categoryName;
                    window.breadcrumb.category.slug = categorySlug;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        getSubcategory(){
            axios.post(
                `/home/product/get-subcategory`,
                {slug: this.getSlug()}
            )
                .then((res) => {
                    this.activeSubcategory = res.data;
                    const categoryName = this.getTranslations(this.activeSubcategory, 'category_name');
                    const categorySlug = this.activeSubcategory.category_slug;
                    const subcategoryName = this.getTranslations(this.activeSubcategory, 'name');
                    const subcategorySlug = this.activeSubcategory.slug;

                    this.pageTitle = subcategoryName;
                    window.breadcrumb.category.name = categoryName;
                    window.breadcrumb.category.slug = categorySlug;
                    window.breadcrumb.subcategory.name = subcategoryName;
                    window.breadcrumb.subcategory.slug = subcategorySlug;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        getBrand(){
            axios.post(
                `/home/product/get-brand`,
                {slug: this.getSlug()}
            )
                .then((res) => {
                    this.activeBrand = res.data;

                    const categoryName = 'Бренды';
                    const categorySlug = 'brands';
                    const subcategoryName = this.getTranslations(this.activeBrand, 'name');
                    const subcategorySlug = this.activeBrand.slug;

                    this.pageTitle = subcategoryName;
                    window.breadcrumb.category.name = categoryName;
                    window.breadcrumb.category.slug = categorySlug;
                    window.breadcrumb.subcategory.name = subcategoryName;
                    window.breadcrumb.subcategory.slug = subcategorySlug;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getProductLink(item) {
            return `/${this.locale}/products/${item.category_slug}/${item.subcategory_slug}/${item.slug}`;
        },

        getPageTitle(locale) {
            if (locale !== 'ru') {
                this.pageTitle = 'All products';
            }
        }
    }
}
</script>
