// window.axios = require('axios');

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// let token = document.head.querySelector('meta[name="csrf-token"]');
//
// if (token) {
//     window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// } else {
//     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
// }

import AvoRed from './avored'


window.Vue = require('vue');
window.AvoRed = AvoRed

import CKEditor from '@ckeditor/ckeditor5-vue'
Vue.use(CKEditor)


import { 
    AvoRedInput,
    AvoRedSelect,
    AvoRedUpload,
  } from 'avored-components'

Vue.component('avored-input', AvoRedInput)
Vue.component('avored-select', AvoRedSelect)
Vue.component('avored-upload', AvoRedUpload)

Vue.component('a-layout', require('../components/core/layout/AvoRedLayout').default)

Vue.component('avored-toggle', () => import('../components/core/form/AvoRedToggle'))
Vue.component('avored-editor', () => import('../components/core/form/AvoRedEditor'))
Vue.component('avored-property-fields', () => import('../components/core/catalog/AvoRedPropertyFields'))
Vue.component('avored-attribute-fields', () => import('../components/core/catalog/AvoRedAttributeFields'))

Vue.component('avored-menu-builder', require('../components/core/cms/AvoRedMenuBuilder').default)
Vue.component('a-upload', require('../components/core/form/AvoRedUpload').default)
// Vue.component('a-input', require('../components/core/form/AvoRedInput').default)
Vue.component('login-fields', require('../components/user/auth/LoginFields.vue').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
