
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Index from './components/Index.vue';
import Products from './components/Products.vue';
import NewProduct from './components/NewProduct.vue';
import EditProduct from './components/EditProduct.vue';
import Files from './components/Files.vue';
import NewFile from './components/NewFile.vue';
import Doctors from './components/Doctors.vue';
import Email from './components/Format.vue';
import NewEmail from './components/NewEmail.vue';

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
		{path: '/products/edit/:id', component: EditProduct, name: 'editProduct'},
		{path: '/files', component: Files, name: 'files'},
		{path: '/files/create', component: NewFile, name: 'newFile'},
		{path: '/doctors', component: Doctors, name: 'doctors'},
		{path: '/email', component: Email, name: 'email'},
		{path: '/email/create', component: NewEmail, name: 'newEmail'},
	]
});

//Config Progress Bar
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
		color: 'rgb(143, 255, 199)',
		failedColor: 'red',
		height: '3px'
})

//Multiselect
import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)

//Config SweetAlert
import Swal from 'sweetalert2'
import Vue from 'vue';
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

// VUE Editor 
import { VueEditor } from "vue2-editor";
Vue.component('vue-editor', VueEditor)
//Global methods 

Vue.mixin({
	methods: {
		getProducts() {
			axios.get('/api/products')
			.then((response) => {
				//console.log(response.data)
				this.products = response.data;
				this.loading=false;
			})
			.catch((error) => {
				console.log(error)
			})
		},
		getDoctors: function () {
			axios.get('/api/doctors')
			.then((response) => {
					this.doctors = response.data;
					this.loading=false;
			})
			.catch((error) => {
					console.log(error)
			})
		},
		getFormat() {
			axios.get('/api/emails')
			.then((response) => {
				// console.log(response.data)
				this.email.id = response.data.id;
				this.email.subject = response.data.subject;
				this.email.format = response.data.format;
				this.loading=false;
			})
			.catch((error) => {
				console.log(error)
			})
		},
	},
})

const app = new Vue({
		el: '#app',
		router
});