<template>
    <section class="admin-brand-wrapper">
        <md-toolbar class="md-primary">
            <h3 class="md-title">Бренды</h3>
        </md-toolbar>
        <md-table v-model="searched.data" md-card @md-selected="onSelect" md-sort="position" md-sort-order="asc">
            <md-table-toolbar>
                <md-field class="search-input">
                    <label>Поиск</label>
                    <md-input v-model="search" @input="searchOnTable"></md-input>
                </md-field>
                <md-button :href="'/admin/brand/create'" class="md-fab md-mini">
                    <md-icon>add</md-icon>
                </md-button>
            </md-table-toolbar>

            <md-table-toolbar class="alternative-toolbar" slot="md-table-alternate-header" slot-scope="{ count }">
                <div class="md-toolbar-section-start" v-if="selected.length === 1">
                        <div class="from-position-sign">c</div>
                        <div class="current-position-sign">{{selected[0].position}}</div>
                        <div class="to-position-sign">на</div>
                        <input class="new-position-input" type="number" v-model="newPosition">
                        <md-button @click="changePositionManually" class="change-position-btn md-raised md-accent">Сменить позицию</md-button>
                </div>

                <div class="md-toolbar-section-end">
                    <md-button @click="bulkActivate" class="md-icon-button">
                        <md-icon>check_circle_outline</md-icon>
                    </md-button>
                    <md-button @click="bulkDeactivate()" class="md-icon-button">
                        <md-icon>remove_circle_outline</md-icon>
                    </md-button>
                    <md-button @click="bulkDelete" class="md-icon-button">
                        <md-icon>delete</md-icon>
                    </md-button>
                </div>

            </md-table-toolbar>

            <md-table-row slot="md-table-row" slot-scope="{ item }" md-selectable="multiple" md-auto-select>
                <md-table-cell md-label="Обложка">
                    <img class="img-cell" :src="item.imgPath" alt="">
                </md-table-cell>
                <md-table-cell md-label="No." md-sort-by="position">{{ item.position }}</md-table-cell>
                <md-table-cell md-label="Активен" md-sort-by="active">{{ item.active }}</md-table-cell>
                <md-table-cell md-label="Название" md-sort-by="name">{{ item.name }}</md-table-cell>
                <md-table-cell md-label="Окончание url" md-sort-by="slug">{{ item.slug }}</md-table-cell>
                <md-table-cell md-label="Дата создания" md-sort-by="created_at">{{ item.created_at | formatDate }}</md-table-cell>
                <md-table-cell md-label="Опции" md-sort-by="title">
                    <div class="option-container">
                        <a class="copy" :href="'/admin/brand/copy/'+item.slug">
                            <md-icon>content_copy</md-icon>
                        </a>
                        <a class="edit" :href="'/admin/brand/edit/'+item.slug">
                            <md-icon>edit</md-icon>
                        </a>
                    </div>
                </md-table-cell>
            </md-table-row>
        </md-table>
        <pagination :data="entities" @pagination-change-page="getEntities">
            <span slot="prev-nav"><md-icon>arrow_left</md-icon></span>
            <span slot="next-nav"><md-icon>arrow_right</md-icon></span>
        </pagination>
    </section>
</template>

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

.option-container{
    display: flex;
    justify-content: flex-start;
    align-items: center;

    a {
        display: block;
        margin-right: 5px;
        transition: .1s ease-in;

        &:hover {
            transform: scale(1.2);
            text-decoration: none;
        }

        svg {
            width: 20px;
            height: 20px;
        }
    }
}

.pagination {
    list-style: none;
    display: flex;
    height: 30px;
    justify-content: flex-end;
    margin-right: 30px;

    li {
        border-left: 1px solid lightgray;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 15px;

        &:first-child {
            border-left: none;
        }

        &.active {
            background: #2d3748;
            border: none;

            a {
                color: white;
            }
        }


        a {
            transition: .1s ease-in;

            &:hover {
                text-decoration: none;

            }

            .sr-only {
                display: none;
            }
        }
    }
}

.md-button.change-position-btn {
    min-width: 160px;
}

.md-field.search-input {
}

.alternative-toolbar {
    height: 80px;

    .md-toolbar-section-start {
        display: flex;
        justify-content: flex-start;
        align-items: center;

        div {
            font-size: 16px;
            text-transform: uppercase;
            margin-right: 5px;

            &.current-position-sign {
                width: 30px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: lightgray;
                height: 30px;
                border-radius: 4px;


            }
        }

        input {
            width: 60px;
            height: 30px;
            border-radius: 4px;
            border: transparent;
            margin-left: 5px;
            font-size:16px;

            &.active {
                outline: none;
            }
        }
    }
}

</style>

<script>
import {indexMixin} from "../../mixins/indexMixin";

export default {
    mixins: [indexMixin('brand')]
}
</script>


