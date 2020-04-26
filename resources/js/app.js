// window.axios = require('axios');

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// let token = document.head.querySelector('meta[name="csrf-token"]');
//
// if (token) {
//     window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// } else {
//     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
// }

window.Vue = require('vue');

import CKEditor from '@ckeditor/ckeditor5-vue'
Vue.use(CKEditor)

Vue.component('a-layout', require('../components/core/layout/AvoRedLayout').default)

Vue.component('avored-toggle', require('../components/core/form/AvoRedToggle').default)
Vue.component('avored-editor', require('../components/core/form/AvoRedEditor').default)
Vue.component('avored-menu-builder', require('../components/core/cms/AvoRedMenuBuilder').default)
Vue.component('avored-property-options', require('../components/core/catalog/AvoRedPropertyOption').default)

Vue.component('a-input', require('../components/core/form/AvoRedInput').default)
Vue.component('login-fields', require('../components/user/auth/LoginFields.vue').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
