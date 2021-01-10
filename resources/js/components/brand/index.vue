<template>
    <section class="admin-brand-wrapper">
        <md-toolbar class="md-primary">
            <h3 class="md-title">Бренды</h3>
        </md-toolbar>
        <md-table v-model="brands" md-card @md-selected="onSelect">
            <md-table-toolbar>
                <md-field class="search-input">
                    <label>Поиск</label>
                    <md-input></md-input>
                </md-field>
                <md-button :href="'/admin/brand/create'" class="md-fab md-mini">
                    <md-icon>add</md-icon>
                </md-button>
            </md-table-toolbar>

            <md-table-toolbar slot="md-table-alternate-header" slot-scope="{ count }">
                <div class="md-toolbar-section-start"></div>

                <div class="md-toolbar-section-end">
                    <md-button class="md-icon-button">
                        <md-icon>delete</md-icon>
                    </md-button>
                </div>
            </md-table-toolbar>

            <md-table-row slot="md-table-row" slot-scope="{ item }" md-selectable="multiple" md-auto-select>
                <md-table-cell md-label="Обложка">
                    <img class="img-cell" :src="item.imgPath" alt="">
                </md-table-cell>
                <md-table-cell md-label="No." md-sort-by="position">{{ item.position }}</md-table-cell>
                <md-table-cell md-label="Активен" md-sort-by="email">{{ item.active }}</md-table-cell>
                <md-table-cell md-label="Название" md-sort-by="gender">{{ item.name }}</md-table-cell>
                <md-table-cell md-label="Окончание url" md-sort-by="title">{{ item.slug }}</md-table-cell>
                <md-table-cell md-label="Дата создания" md-sort-by="title">{{ item.created_at }}</md-table-cell>
                <md-table-cell md-label="Опции" md-sort-by="title">
                    <div class="option-container">
                        <a :href="'/admin/brand/copy/'+item.slug">
                            <i class="far fa-copy"></i>
                        </a>
                        <a :href="'/admin/brand/edit/'+item.slug">
                            <i class="far fa-edit"></i>
                        </a>
                        <a :href="'/admin/brand/delete/'+item.slug">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </div>
                </md-table-cell>
            </md-table-row>
        </md-table>
    </section>
</template>


<script>
    export default {
        mounted() {
            this.getBrands();
        },
        data: () => ({
            brands: [],
            selected: [],
        }),
        methods: {
            getBrands() {
                axios.get('/home/get-brands')
                    .then((res) => {
                        this.brands = res.data;
                        console.log(res.data);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            onSelect (items) {
                this.selected = items
            },
        }
    }
</script>

<style lang="scss">
.admin-brand-wrapper {
    width: 100%;
}

.md-primary {
    height: 50px;
}

.search-input{
    width: 200px;
    margin-right: 20px;
}

.img-cell {
    height: 40px!important;
    width: 150px;
}

</style>
