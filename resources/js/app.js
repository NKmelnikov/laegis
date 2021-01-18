require('./bootstrap');

import Vue from "vue";
import moment from 'moment'

if(window.location.pathname.includes('admin')) {
    require('vue-material/dist/vue-material.min.css')
    require('vue-material/dist/theme/default.css')
    require('froala-editor/js/froala_editor.pkgd.min.js')
    require('froala-editor/css/froala_editor.pkgd.min.css')
    require('froala-editor/css/froala_style.min.css')
}

import VueMaterial from 'vue-material'
// Import and use Vue Froala lib.
import VueFroala from 'vue-froala-wysiwyg'
Vue.use(VueFroala)

window.Vue = require('vue');
Vue.use(VueMaterial)

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('DD/MM/YYYY hh:mm')
    }
});

Vue.component('admin-brand', require('./components/brand/index.vue').default);
Vue.component('admin-brand-edit', require('./components/brand/edit.vue').default);

Vue.component('admin-news', require('./components/news/index.vue').default);
Vue.component('admin-news-edit', require('./components/news/edit.vue').default);

Vue.component('admin-catalog', require('./components/catalog/index.vue').default);
Vue.component('admin-catalog-edit', require('./components/catalog/edit.vue').default);

Vue.component('admin-service', require('./components/service/index.vue').default);
Vue.component('admin-service-edit', require('./components/service/edit.vue').default);

Vue.component('admin-category', require('./components/category/index.vue').default);
Vue.component('admin-category-edit', require('./components/category/edit.vue').default);

Vue.component('admin-subcategory', require('./components/subcategory/index.vue').default);
Vue.component('admin-subcategory-edit', require('./components/subcategory/edit.vue').default);

Vue.component('admin-product', require('./components/product/index.vue').default);
Vue.component('admin-product-edit', require('./components/product/edit.vue').default);

if(window.location.pathname.includes('admin')) {
    const app = new Vue({
        el: '#admin-app',
    });
}


