require('./bootstrap');

import Vue from "vue";
import moment from 'moment'
import { VueReCaptcha } from "vue-recaptcha-v3";
Vue.use(VueReCaptcha, { siteKey: "6Lebi8wZAAAAAIBnqQzUohm0qT5NhiOoUOqQTzaK" });

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
        return moment(String(value)).format('DD-MM-YYYY')
    }
});

Vue.filter('truncate', function (value, limit) {
    if (value.length > limit) {
        value = value.substring(0, (limit - 3)) + '...';
    }

    return value
})

Vue.component('admin-brand', require('./components/admin/brand/index.vue').default);
Vue.component('admin-brand-edit', require('./components/admin/brand/edit.vue').default);

Vue.component('admin-news', require('./components/admin/news/index.vue').default);
Vue.component('admin-news-edit', require('./components/admin/news/edit.vue').default);

Vue.component('admin-catalog', require('./components/admin/catalog/index.vue').default);
Vue.component('admin-catalog-edit', require('./components/admin/catalog/edit.vue').default);

Vue.component('admin-service', require('./components/admin/service/index.vue').default);
Vue.component('admin-service-edit', require('./components/admin/service/edit.vue').default);

Vue.component('admin-category', require('./components/admin/category/index.vue').default);
Vue.component('admin-category-edit', require('./components/admin/category/edit.vue').default);

Vue.component('admin-subcategory', require('./components/admin/subcategory/index.vue').default);
Vue.component('admin-subcategory-edit', require('./components/admin/subcategory/edit.vue').default);

Vue.component('admin-product', require('./components/admin/product/index.vue').default);
Vue.component('admin-product-edit', require('./components/admin/product/edit.vue').default);

Vue.component('home-catalog', require('./components/home/catalog/index.vue').default);

Vue.component('home-product-list', require('./components/home/product/index.vue').default);
Vue.component('home-product-item', require('./components/home/product/item.vue').default);
Vue.component('home-breadcrumbs', require('./components/home/product/breadcrumbs.vue').default);

Vue.component('second-section', require('./components/home/main/second-section.vue').default);
Vue.component('third-section', require('./components/home/main/third-section.vue').default);
Vue.component('fourth-section', require('./components/home/main/fourth-section.vue').default);
Vue.component('fifth-section', require('./components/home/main/fifth-section.vue').default);
Vue.component('sixth-section', require('./components/home/main/sixth-section.vue').default);


Vue.component('footer-brands', require('./components/layout/footer/brands.vue').default);
Vue.component('footer-contact-form', require('./components/layout/footer/contact-form.vue').default);

if(window.location.pathname.includes('admin')) {
    const app = new Vue({
        el: '#admin-app',
    });
}

if(!window.location.pathname.includes('admin')) {
    const app = new Vue({
        el: '#app',
    });
}


