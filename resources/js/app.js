import './bootstrap';
import Vue from 'vue';

window.Vue = Vue;


Vue.component('side-bar', require('./Components/Views/Layouts/Sidebar').default);
Vue.component('form-create', require('./Components/Views/Form/FormCreateIndex').default);
Vue.component('form-submit', require('./Components/Views/Form/FormSubmitIndex').default);


const app = new Vue({
    el: '#app',
});

