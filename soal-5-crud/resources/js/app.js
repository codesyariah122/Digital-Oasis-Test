/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import App from './App.vue'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import LaravelVuePagination from 'laravel-vue-pagination'
import axios from 'axios'
import { routes } from './routes'
import VueMoment from 'vue-moment'
import moment from 'moment-timezone'
//import Bootstrap, Popper, jQuery
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret,faTrash,faEye,faEdit,faSearch,faFemale,faMale } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import 'bootstrap/dist/css/bootstrap.css'
import 'jquery/dist/jquery.min'
import 'popper.js/dist/popper.min'
import 'bootstrap/dist/js/bootstrap.min'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

library.add(faUserSecret,faTrash,faEye,faEdit,faSearch,faFemale,faMale)

Vue.use(VueRouter)
Vue.use(VueAxios, axios)
Vue.use(VueSweetalert2)
Vue.use(VueMoment, {
    moment,
})
Vue.component('pagination', LaravelVuePagination)
Vue.component('font-awesome-icon', FontAwesomeIcon)


const router = new VueRouter({
    mode: 'history',
    routes: routes
})
 
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
})