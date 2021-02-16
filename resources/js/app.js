// require('./bootstrap');
// import Vue from 'vue'
//
// //Main pages
// import App from './views/app.vue'
//
//
// const app = new Vue({
//     el: '#app',
//     components: { App }
// });
// Vue.component('app-component', require('./views/app'));
require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue';
import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';

Vue.use(VueRouter);

Vue.use(VueAxios, axios);
Vue.use('vue-resource');
Vue.component('news', require('./components/News.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: router,
});

