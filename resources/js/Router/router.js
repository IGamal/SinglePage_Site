import Vue from 'vue'
import VueRouter from 'vue-router'
import component from "vuetify/lib/util/component";

import Forum from '../components/forum/Forum'
import Login from '../components/login/login'
import Signup from '../components/login/Signup'

Vue.use(VueRouter)

const routes =
    [
        {path: '/forum', component: Forum, name: 'forum'},
        {path: '/login', component: Login},
        {path: '/signup', component: Signup}
    ]

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'
})

export default router
