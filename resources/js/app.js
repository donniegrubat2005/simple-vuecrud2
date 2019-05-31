
require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
import {routes} from './routes.js'


Vue.use(VueRouter)

Vue.component('home-component', require('./components/Home.vue').default);

const router = new VueRouter({
    routes,
    mode: 'history'
});



const app = new Vue({
    el: '#app',
    router

});
