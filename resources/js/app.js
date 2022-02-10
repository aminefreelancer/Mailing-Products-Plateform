
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Index from './components/Index.vue';
import Products from './components/Products.vue';
import EditProduct from './components/EditProduct.vue';
import NewProduct from './components/NewProduct.vue';

//Config Vue Form Validation
import { Form } from 'vform'
window.Form = Form;

import { Button, HasError, AlertError, AlertErrors, AlertSuccess} from 'vform/src/components/bootstrap5'
Vue.component(Button.name, Button)
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertErrors.name, AlertErrors)
Vue.component(AlertSuccess.name, AlertSuccess)


const router = new VueRouter({
  mode: 'history',
  routes: [
    {path: '/', component: Index, name: 'dashboard'},
    {path: '/products', component: Products, name: 'products'},
    {path: '/products/create', component: NewProduct, name: 'newProduct'},
    {path: '/products/edit/:id', component: EditProduct, name: 'editProduct'}

  ]
});

//Config Progress Bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
})

//Config SweetAlert
import Swal from 'sweetalert2'
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Swal = Swal;
window.Toast = Toast;




const app = new Vue({
    el: '#app',
    router
});