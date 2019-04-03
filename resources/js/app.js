
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueTheMask from 'vue-the-mask';

import {DibujarDiente} from './keyrushelper';
import {DibujarDienteRojo} from './keyrushelper';

window.DibujarDienteRojo = DibujarDienteRojo;
window.DibujarDiente = DibujarDiente;
window.VueMultiselect = require('vue-multiselect');
window.spanish_lang = require('./datatable_spanish');
Vue.use(VueTheMask);

Vue.component('vue-multiselect', require('vue-multiselect').default);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('crear-paciente', require('./components/paciente/create.vue').default);
Vue.component('editar-tratamiento', require('./components/tratamiento/edit.vue').default);
Vue.component('editar-cita', require('./components/cita/edit.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
