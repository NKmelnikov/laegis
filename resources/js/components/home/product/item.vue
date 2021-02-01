<template>
        <section class="product-item-keeper">
            <product-modal></product-modal>
            <home-breadcrumbs :locale="locale" :breadcrumbs="breadcrumbs"></home-breadcrumbs>

            <div id="current-view-name" class="selected-name">{{getTranslations(entity, 'name')}}</div>
            <div class="product-item">
                <div class="product-item__img">
                    <img :src="entity.imgPath" alt="">
                </div>
                <div class="product-item__description-container">
                    <div class="description">
                        <div class="button-container">
                            <a v-if="entity.pdf1Path != null"
                               :href="entity.pdf1Path"
                               target="_blank"
                               class="threeBtns button-container__consult1-btn">
                                <i class="material-icons md-18">file_download</i>
                                Тех. описание
                            </a>
                            <a v-if="entity.pdf2Path != null"
                               :href="entity.pdf2Path"
                               target="_blank"
                               class="threeBtns button-container__consult2-btn">
                                <i class="material-icons md-18">file_download</i>
                                Паспорт качества
                            </a>
                            <button class="threeBtns button-container__order-btn" @click="showModal({item: entity, obj: getSendObject(entity)})">Заказать</button>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="spec">
                <div v-if="entity.description.length > 0" class="text description" v-html="entity.description"></div>
                <div v-if="entity.spec != null" class="text specification" v-html="entity.spec"></div>
            </div>
        </section>
</template>

<script>
import {homeMixin} from "../../../mixins/homeMixin";

export default {
    mixins:[homeMixin],
    props: ['locale', 'type'],
    mounted() {
        this.getEntity();
    },
    data: () => ({
        email: '',
        text: '',
        entity: [],
        entityName: '',
        breadcrumbs: {
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
        }
    }),
    methods: {
        getEntity() {
            axios.post(
                `/home/product/get-item`,
                {slug: this.getSlug()}
                )
                .then((res) => {
                    this.entity = res.data;

                    this.breadcrumbs.category.name = this.getTranslations(this.entity, 'category_name');
                    this.breadcrumbs.category.slug = this.entity.category_slug;
                    this.breadcrumbs.subcategory.name = this.getTranslations(this.entity, 'subcategory_name');
                    this.breadcrumbs.subcategory.slug = (this.getTranslations(this.entity, 'subcategory_name') === 'no-subcategory') ? '' : `/${this.entity.subcategory_slug}`;
                    this.breadcrumbs.product.name = this.getTranslations(this.entity, 'name');
                    this.breadcrumbs.product.slug = this.entity.slug;


                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getSendObject(item) {
            return {
                type: `*Заказать*`,
                name: item.name,
                category_name: item.category_name,
                subcategory_name: item.subcategory_name,
                brand_name: item.brand_name,
            }
        },
    }
}
</script>
