import Vue from 'vue'
import VueRouter from 'vue-router'
import component from "vuetify/lib/util/component";

import Forum from '../components/forum/Forum'
import Read from '../components/forum/Read'
import Create from '../components/forum/Create'

import Category from '../components/Category/CategoryCRUD'

import Signup from '../components/login/Signup'
import Login from '../components/login/login'
import Logout from '../components/login/Logout'

Vue.use(VueRouter)

const routes =
    [
        {path: '/forum', component: Forum, name: 'forum'},
        {path: '/question/:slug', component:Read, name: 'read'},
        {path: '/ask', component: Create},
        {path: '/category', component: Category},
        {path: '/signup', component: Signup},
        {path: '/login', component: Login},
        {path: '/logout', component: Logout},
    ]

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'
})

export default router
