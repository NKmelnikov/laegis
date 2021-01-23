<template>
    <section class="admin-entity-wrapper">
        <section class="catalogs-container container">
            <div class="catalog-keeper" >
                <div class="catalog-multiplier" v-for="entity in entities.data">
                    <a class="catalog-multiplier__link" target="_blank" :href="entity.pdfPath">
                        <img  class="catalog-multiplier__cover" :src="entity.imgPath" alt="PDF">
                        <div class="bot-title-box">
                            <img class="bot-title-box__img" src="/img/pdf-orange.png" alt="">
                            <span class="bot-title-box__text">{{ getTranslations(entity) }}</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <pagination :data="entities" @pagination-change-page="getEntities" class="container">
            <span slot="prev-nav"><i class="material-icons md-18">arrow_left</i></span>
            <span slot="next-nav"><i class="material-icons md-18">arrow_right</i></span>
        </pagination>
    </section>
</template>

<script>
export default {
    props: [
        'locale'
    ],
    mounted() {
        this.getEntities();
    },
    data: () => ({
        entities: [],
        entityName: ''
    }),
    methods: {
        getEntities(page = 1) {
            axios.post(
                `/home/catalog/getByBrandSlug?page=${page}`,
                {slug: this.getSlug()}
            )
                .then((res) => {
                    this.entities = res.data;
                    console.log(this.getTranslations());
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getSlug() {
            return window.location.pathname.substring(window.location.pathname.lastIndexOf('/') + 1)
        },
        getTranslations(entity) {
            return (this.locale !== 'ru' && entity[`name_${this.locale}`] !== null) ? entity[`name_${this.locale}`] : entity.name ;
        }
    }
}
</script>
