import Vue from "vue";
import moment from 'moment'
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'
require('froala-editor/js/froala_editor.pkgd.min.js')

// Require Froala Editor css files.
require('froala-editor/css/froala_editor.pkgd.min.css')
require('froala-editor/css/froala_style.min.css')

// Import and use Vue Froala lib.
import VueFroala from 'vue-froala-wysiwyg'
Vue.use(VueFroala)

require('./bootstrap');

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

const app = new Vue({
    el: '#admin-app',
});

