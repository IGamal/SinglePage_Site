require('./bootstrap');

window.Vue = require('vue');

import Vuetify from "../plugins/vuetify"
import router from './Router/router.js'
import User from './helpers/User'
import Exception from './helpers/Exception'
import VueSimplemde from 'vue-simplemde'
import md from 'marked'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import '@mdi/font/css/materialdesignicons.css'

window.User = User
window.Exception = Exception
window.EventBus = new Vue();
window.md = md

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('AppHome', require('./components/AppHome.vue').default);
Vue.component('vue-simplemde', VueSimplemde);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    vuetify: Vuetify,
    router,
    el: '#app'
});
