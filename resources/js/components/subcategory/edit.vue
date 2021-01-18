<template>
    <section class="admin-entity-wrapper">
        <md-toolbar class="md-primary">
            <h3 class="md-title">
                {{ actionTranslater(entity.action) }} подкатегорию</h3>
        </md-toolbar>
        <md-tabs class="md-transparent">
            <md-tab style="overflow: visible" id="tab-home" md-label="Общее">
                <div class="admin-form entity-create-form">
                    <md-field :md-counter="true">
                        <label>Название</label>
                        <md-input maxlength="100" v-model="entity.name"></md-input>
                    </md-field>
                    <md-field :md-counter="true">
                        <label>Окончание URL (/slug)</label>
                        <md-input maxlength="255" v-model="entity.slug"></md-input>
                    </md-field>
                    <md-field>
                        <md-select v-model="entity.category_id" name="category" id="category" placeholder="Категория">
                            <md-option v-for="item in categories" :value="item.id" :key="item.id">
                                {{ item.name }}
                            </md-option>
                        </md-select>
                    </md-field>
                    <div class="active-element-upload-container">
                        <md-switch v-model="entity.active">Активный элемент</md-switch>
                    </div>

                </div>
                <div class="image-preview" v-if="imgData.length > 0">
                    <img class="preview" :src="imgData">

                    <div @click="removePicture()" class="remove-picture" v-if="entity.imgPath.length > 0">убрать </div>

                </div>
            </md-tab>
<!--            english tab-->
            <md-tab id="tab-pages" md-label="English">
                <div class="admin-form">
                    <md-field :md-counter="true">
                        <label>Название</label>
                        <md-input maxlength="100" v-model="entity.name_en"></md-input>
                    </md-field>
                </div>
            </md-tab>

        </md-tabs>
        <div class="button-wrapper">
            <md-button @click="submitForm()" class="md-raised md-accent">{{ actionTranslater(entity.action) }}</md-button>
            <md-button @click="goToBrands()" class="md-raised md-primary">Отменить</md-button>
        </div>
        <md-snackbar
            :md-position="snackBar.position"
            :md-duration="snackBar.isInfinity ? snackBar.Infinity : snackBar.duration"
            :md-active.sync="snackBar.show"
            md-persistent>
            <span style="white-space: pre;">{{snackBar.message}}</span>
            <md-button class="md-primary" @click="snackBar.show = false">X</md-button>
        </md-snackbar>
    </section>
</template>

<style lang="scss" scoped>
.admin-entity-wrapper {
    width: 100%;
}

.admin-form {
    width: 800px;
}

.image-preview {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-end;
    max-width: 400px;
    margin-top: 20px;
}

.button-wrapper {
    padding-left: 25px;
}

.md-primary {
    height: 50px;
}

.search-input{
    width: 200px;
    margin-right: 20px;
}

.md-tabs {
    margin-left: 25px;
}

::v-deep .md-tabs-content {
    overflow: visible!important;
}

.md-button {
    height: 36px;
}

.remove-picture {
    color: #ff0000;
    cursor: pointer;
}

.active-element-upload-container {
    display: flex;

    .upload-container{
        margin: 16px 16px 16px 0;
    }
}
</style>

<script>
import 'froala-editor/js/plugins.pkgd.min.js';
import {editMixin} from "../../mixins/editMixin.js";

export default {
    mixins: [editMixin('subcategory')],
    mounted() {
        this.getCategories();
    },
    data() {
        return {
            categories: []
        }
    },
    methods: {
        getCategories() {
            axios.get(`/admin/category/getAll`)
                .then((res) => {
                    this.categories = res.data;
                    console.log(this.categories)
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
}
</script>
