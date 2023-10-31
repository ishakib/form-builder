import './bootstrap';
import Vue from 'vue';

window.Vue = Vue;


Vue.component('side-bar', require('./Components/Views/Layouts/Sidebar.vue').default);


const app = new Vue({
    el: '#app',
});

