
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)



import Index from './components/Index.vue';
import Products from './components/Products.vue';
import NewProduct from './components/NewProduct.vue';


const router = new VueRouter({
  mode: 'history',
  routes: [
    {path: '/', component: Index, name: 'dashboard'},
    {path: '/products', component: Products, name: 'products'},
    {path: '/products/create', component: NewProduct, name: 'newProduct'}
  ]
});



const app = new Vue({
    el: '#app',
    router
});