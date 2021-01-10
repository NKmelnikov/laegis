import Vue from "vue";
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

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false
require('./bootstrap');

window.Vue = require('vue');
Vue.use(VueMaterial)


Vue.component('admin-brand', require('./components/brand/index.vue').default);
Vue.component('admin-brand-create', require('./components/brand/create.vue').default);

const app = new Vue({
    el: '#admin-app',
});

