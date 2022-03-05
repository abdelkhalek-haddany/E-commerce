/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue').default;
 
 import vmodal from 'vue-js-modal';
 Vue.use(vmodal);
 import VueRouter from 'vue-router';
 import VueAxios from 'vue-axios';
 import axios from 'axios';
 import moment from 'moment';
 import {routes} from './routes';
 import { TimeAgo } from 'vue2-timeago'
 import 'vue2-timeago/dist/vue2-timeago.css'
 Vue.component('time-ago', TimeAgo);
 import VueCountdownTimer from 'vuejs-countdown-timer';
 
 Vue.use(VueRouter);
 Vue.use(VueAxios, axios);
Vue.use(VueCountdownTimer);


 Vue.filter('formatDate', function(value) {
   if (value) {
     return moment(String(value)).format('MM/DD/YYYY hh:mm')
   }
 })
 
 Vue.filter('two_digits', function (value) {
   if(value.toString().length <= 1)
   {
       return "0"+value.toString();
   }
   return value.toString();
 })
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 Vue.component('add-cart', require('./components/Cart/add.vue').default);
 Vue.component('add-message', require('./components/Messages/add.vue').default);
 Vue.component('choose-product', require('./components/Products/_choose-product-modal.vue').default);
 Vue.component('countdown-timer', require('./components/Products/_countdown.vue').default);
 Vue.component('add-subscriber', require('./components/Subscribers/add.vue').default);
 Vue.component('new-products', require('./components/Products/_new-products.vue').default);
 Vue.component('orders-table', require('./components/orders/_table.vue').default);
 Vue.component('vendor-orders-table', require('./components/VendorOrders/_table.vue').default);
 Vue.component('orders-stats', require('./components/orders/_statistics.vue').default);
 Vue.component('livreurs-table', require('./components/livreurs/livreurs_table.vue').default);
 Vue.component('livreurs-statistics', require('./components/livreurs/livreurs_statistics.vue').default);
 Vue.component('checkout-cart', require('./components/shopping-cart/_checkout-modal.vue').default);
 Vue.component('is-loading', require('./components/globale/IsLoading.vue').default);
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
  const app = new Vue({
     el: '#app',
   })