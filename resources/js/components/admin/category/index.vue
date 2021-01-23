<template>
    <section class="admin-entity-wrapper">
        <md-toolbar class="md-primary">
            <h3 class="md-title">Категории</h3>
        </md-toolbar>
        <md-table v-model="searched.data" md-card @md-selected="onSelect" md-sort="position" md-sort-order="asc">
            <md-table-toolbar>
                <md-field class="search-input">
                    <label>Поиск</label>
                    <md-input v-model="search" @input="searchOnTable"></md-input>
                </md-field>
                <md-button :href="'/admin/category/create'" class="md-fab md-mini">
                    <md-icon>add</md-icon>
                </md-button>
            </md-table-toolbar>

            <md-table-toolbar class="alternative-toolbar" slot="md-table-alternate-header" slot-scope="{ count }">
                <div class="md-toolbar-section-start" v-if="selected.length === 1">
                    <div class="from-position-sign">c</div>
                    <div class="current-position-sign">{{selected[0].position}}</div>
                    <div class="to-position-sign">на</div>
                    <input class="new-position-input" type="number" v-model="newPosition">
                    <md-button  @click="changePositionManually" class="change-position-btn md-raised md-accent">Сменить позицию</md-button>
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
                <md-table-cell md-label="No." md-sort-by="position">{{ item.position }}</md-table-cell>
                <md-table-cell md-label="Активен" md-sort-by="active">{{ item.active }}</md-table-cell>
                <md-table-cell md-label="Название" md-sort-by="name">{{ item.name }}</md-table-cell>
                <md-table-cell md-label="Окончание url" md-sort-by="slug">{{ item.slug }}</md-table-cell>
                <md-table-cell md-label="Дата создания" md-sort-by="created_at">{{ item.created_at | formatDate }}</md-table-cell>
                <md-table-cell md-label="Опции" md-sort-by="title">
                    <div class="option-container">
                        <a class="copy" :href="'/admin/category/copy/'+item.id">
                            <md-icon>content_copy</md-icon>
                        </a>
                        <a class="edit" :href="'/admin/category/edit/'+item.id">
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


<script>
import {indexMixin} from '../../../mixins/indexMixin.js'
export default {
    mixins: [indexMixin('category')]
}
</script>
