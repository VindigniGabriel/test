/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import 'bootstrap-vue/src/icons.scss'
import store from "./store";

//bootstrap-Vue
Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons)

Vue.component('nav-bar', require('./components/NavBar/NavBar.vue').default);
Vue.component('consultants', require('./components/Consultants/Consultants').default);

const app = new Vue({
    el: '#app',
    store
});
