<template>
    <section class="admin-brand-wrapper">
        <md-toolbar class="md-primary">
            <h3 class="md-title">Создать бренд</h3>
        </md-toolbar>
        <md-tabs class="md-transparent">
            <md-tab style="overflow: visible" id="tab-home" md-label="Общее">
                <div class="admin-form brand-create-form">
                    <md-field :md-counter="true">
                        <label>Название </label>
                        <md-input maxlength="50" v-model="brand.name"></md-input>
                    </md-field>
                    <md-field>
                        <label>Окончание URL (/slug)</label>
                        <md-input v-model="brand.slug"></md-input>
                    </md-field>

                    <label>Описание</label>
                    <froala :tag="'textarea'" :config="frolaConfig" v-model="brand.description"></froala>

                    <div class="active-element-upload-container">
                        <md-switch v-model="brand.active">Активный элемент</md-switch>
                        <div class="upload-container">
                            <label>Обложка</label>
                            <input type="file" v-if="uploadReady" ref="imgUpload" @change="previewImage"/>
                        </div>
                    </div>

                </div>
                <div class="image-preview" v-if="imgData.length > 0">
                    <img class="preview" :src="imgData">
                    <div @click="removePicture()" class="remove-picture" v-if="brand.imgPath.length > 0">убрать </div>

                </div>
            </md-tab>
            <md-tab id="tab-pages" md-label="English">
                <div class="admin-form">
                    <md-field :md-counter="true">
                        <label>Name</label>
                        <md-input maxlength="50" v-model="brand.name_en"></md-input>
                    </md-field>
                    <label>Description</label>
                    <froala :tag="'textarea'" :config="frolaConfig" v-model="brand.description_en"></froala>
                </div>
            </md-tab>
        </md-tabs>
        <div class="button-wrapper">
            <md-button @click="submitForm()" class="md-raised md-accent">Создать</md-button>
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

<script>
import 'froala-editor/js/plugins.pkgd.min.js';
import config from '../../vue.config';

export default {
    mounted() {
    },

    data() {
        return {
            frolaConfig: {
                placeholderText: 'Start typing...',
                imageUploadURL: '/frola-upload',
            },
            brand: {
                active: true,
                name: "",
                name_en: "",
                description: "",
                description_en: "",
                imgPath: "",
            },
            imgData: "",
            snackBar: {
                show: false,
                position: 'center',
                duration: 7000,
                isInfinity: false,
                message: ''
            },
            uploadReady: true,
            imgToUpload: null
        }
    },

    methods: {
        submitForm() {
            if (this.brand.imgPath.length > 0) {
                this.uploadImg();
            } else {
                this.showSnackbar('Необходимо загрузить картинку')
            }
        },
        uploadImg() {
            const formData = new FormData();
            formData.append("image", this.imgToUpload);
            axios.post('/upload-img', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then((res) => {
                    this.brand.imgPath = res.data.path
                    this.sendForm();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        sendForm() {
            axios.post('/admin/create-brand', this.brand)
                .then((res) => {
                    this.validate(res.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        showSnackbar(message) {
            this.snackBar.show = true;
            this.snackBar.message = message;
        },
        validate(resData) {
            if (resData.validationErrors) {
                this.showSnackbar(Object.values(resData.validationErrors).join("\n"))
            } else {
                this.goToBrands();
            }
        },
        goToBrands() {
            window.location.replace('/admin/brand')
        },
        removePicture() {
            this.uploadReady = false
            this.imgData = '';
            this.brand.imgPath = '';
            this.$nextTick(() => {
                 this.uploadReady = true
             })


        },
        previewImage: function (event) {
            const input = event.target;
            const maxSize = 100000000; // 100mb

            if (input.files[0].size > maxSize) {
                this.imageError = `Maximum size allowed is ${maxSize / 1000} Mb`;
                return false;
            }
            if (input.files && input.files[0]) {
                this.imgToUpload = input.files[0];
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imgData = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
                this.brand.imgPath = config.imgUploadPath + input.files[0].name
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.admin-brand-wrapper {
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
