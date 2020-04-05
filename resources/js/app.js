/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import Homepage from './components/Homepage'
import Create from './components/categories/Create'
import Read from './components/categories/Read'
import Update from './components/categories/Update'
import ReadMeal from './components/mealtime/Read'
import CreateMeal from './components/mealtime/Create'
import UpdateMeal from './components/mealtime/Update'
import ReadCountry from './components/countries/Read'
import CreateCountry from './components/countries/Create'
import UpdateCountry from './components/countries/Update'
import ReadCurrency from './components/currencies/Read'
import CreateCurrency from './components/currencies/Create'
import UpdateCurrency from './components/currencies/Update'
import ReadLocation from './components/locations/Read'
import CreateLocation from './components/locations/Create'
import UpdateLocation from './components/locations/Update'
import { TablePlugin } from 'bootstrap-vue'
import { FormGroupPlugin } from 'bootstrap-vue'
import { FormInputPlugin } from 'bootstrap-vue'
import { FormPlugin } from 'bootstrap-vue'
import { ButtonPlugin } from 'bootstrap-vue'
import { InputGroupPlugin } from 'bootstrap-vue'
import { LayoutPlugin } from 'bootstrap-vue'
import Multiselect from 'vue-multiselect'
import { FormFilePlugin } from 'bootstrap-vue'
Vue.use(FormFilePlugin)
import { PaginationPlugin } from 'bootstrap-vue'
// import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.component('multiselect', Multiselect)
Vue.use(TablePlugin)
Vue.use(PaginationPlugin)
Vue.use(FormGroupPlugin)
Vue.use(FormInputPlugin)
Vue.use(FormPlugin)
Vue.use(ButtonPlugin)
Vue.use(InputGroupPlugin)
Vue.use(LayoutPlugin)
import '@pencilpix/vue2-clock-picker/dist/vue2-clock-picker.min.css';
const VueClockPickerPlugin = require('@pencilpix/vue2-clock-picker/dist/vue2-clock-picker.plugin.js')
Vue.use(VueClockPickerPlugin)
// window.Vue = require('vue');

Vue.use(VueRouter)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
const router = new VueRouter({
        mode: 'history',
        routes: [
            {path: '/admin/categories',name: 'read',component: Read,props: true,meta: { auth: true,title: 'Categories' }},
            {path: '/admin/categories/create',name: 'create',component: Create,props: true,meta:{ auth: true,title: 'Category Create ' }},
            {path: '/admin/categories/update/:postId',name: 'update',component: Update,props: true,meta:{ auth: true,title: 'Category Update'}},
            {path: '/admin/mealtime',name: 'read_meal',component: ReadMeal,props: true,meta: { auth: true,title: 'Mealtime' }},
            {path: '/admin/mealtime/create',name: 'create_mealtime',component: CreateMeal,props: true,meta: { auth: true,title: 'Mealtime Create' }},
            {path: '/admin/mealtime/update/:postId',name: 'update_mealtime',component: UpdateMeal,props: true ,meta: { auth: true,title: 'Mealtime Update' }},
            {path: '/admin/countries', name:'read_countrie',component: ReadCountry,props: true,meta: { auth: true,title: 'Countries' }},
            {path: '/admin/countries/create',name: 'create_countries',component: CreateCountry,props: true,meta: { auth: true,title: 'Country Create' }},
            {path: '/admin/countries/update/:postId',name: 'update_countries',component: UpdateCountry,props: true,meta: { auth: true,title: 'Country Update' }},
            {path: '/admin/currencies', name:'read_currencies',component: ReadCurrency,props: true,meta: { auth: true,title: 'Currencies' }},
            {path: '/admin/currencies/create',name: 'create_currencies',component: CreateCurrency,props: true,meta: { auth: true,title: 'Currency Create' }},
            {path: '/admin/currencies/update/:postId',name: 'update_currencies',component: UpdateCurrency,props: true,meta: { auth: true,title: 'Currencies Update' }},
            {path: '/admin/location', name:'read_location',component: ReadLocation,props: true,meta: { auth: true,title: 'Locations' }},
            {path: '/admin/location/create',name: 'create_location',component: CreateLocation,props: true,meta: { auth: true,title: 'Location Create' }},
            {path: '/admin/location/update/:postId',name: 'update_location',component: UpdateLocation,props: true,meta: { auth: true,title: 'Location Update' }}, 	
        ],
    });

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('task', require('./components/Task.vue').default);
Vue.component('sidebar', require('./components/Sidebar.vue').default);
Vue.component('navi', require('./components/Nav.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
        components: { Read },
    watch: {
      '$route':{
        handler: (to, from) => {
          document.title = to.meta.title || 'Online Ordering',
          document.getElementById("page-title").innerHTML = to.meta.title || 'Online Ordering'
        },
         immediate: true
      }
    },
});
