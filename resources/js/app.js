import './bootstrap';
import Vue from 'vue';

window.Vue = Vue;


Vue.component('side-bar', require('./Components/Views/Layouts/Sidebar').default);
Vue.component('form-create', require('./Components/Views/Form/FormCreateIndex').default);
Vue.component('form-submit', require('./Components/Views/Form/FormSubmitIndex').default);

//Inputs
Vue.component('short-answer', require('./Components/Views/Form/Input/ShortText.vue').default);
Vue.component('long-answer', require('./Components/Views/Form/Input/LongText.vue').default);
Vue.component('multi-choice', require('./Components/Views/Form/Input/MultipleChoice.vue').default);
Vue.component('checkbox', require('./Components/Views/Form/Input/CheckBox.vue').default);
Vue.component('dropdown', require('./Components/Views/Form/Input/DropDown.vue').default);
Vue.component('time-picker', require('./Components/Views/Form/Input/Time.vue').default);
Vue.component('date-picker', require('./Components/Views/Form/Input/Date.vue').default);

import 'font-awesome/css/font-awesome.min.css';
const app = new Vue({
    el: '#app',
});

