<template>
    <div>
        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Nouveau Produit</h4>
            </div> 
            <div class="page-rightheader">
                <div class="btn-list">
                    <router-link :to="{name: 'products'}" class="btn btn-outline-primary"><i class="fa fa-th-list me-2"></i>
                        Produits GHN
                    </router-link>
                     
                </div>
            </div>
        </div>
        <!--End Page header-->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Information Produit</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="addProduct">
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Produit <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" v-model="product.name" :class="{ 'is-invalid': product.errors.has('name') }">
                                        <has-error :form="product" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Conditionnement </label>
                                        <input type="text" class="form-control" v-model="product.condition" :class="{ 'is-invalid': product.errors.has('condition') }">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Posologie </label>
                                        <input type="text" class="form-control" v-model="product.posology" :class="{ 'is-invalid': product.errors.has('posology') }">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Cure </label>
                                        <input type="text" class="form-control" v-model="product.cure" :class="{ 'is-invalid': product.errors.has('cure') }">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Prix <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" v-model="product.price" :class="{ 'is-invalid': product.errors.has('price') }">
                                        <has-error :form="product" field="price"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Lien </label>
                                        <input type="text" class="form-control" v-model="product.url" :class="{ 'is-invalid': product.errors.has('url') }">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Image </label>
                                        <input type="text" class="form-control" v-model="product.img" :class="{ 'is-invalid': product.errors.has('img') }">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Observation </label>
                                        <input type="text" class="form-control" v-model="product.observation" :class="{ 'is-invalid': product.errors.has('observation') }">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary" :disabled="btnDisable">{{btnText}}</button>                                        
                                    </div>
                                </div>
                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</template>

<script>
    export default {
        name: "NewProduct",
        data() {
            return {
                product: new Form({
                    name: '',
                    condition: '',
                    posology: '', 
                    cure: '',
                    price: '',
                    observation: '',
                    url: '',
                    img: ''
                }),
                btnText: 'Valider',
                btnDisable: false,
            }
        },
        methods: {
            addProduct() {
                this.$Progress.start()
                this.btnText= 'Traitement en cours'
                this.btnDisable = true
                // Submit the form via a POST request
                this.product.post('/api/products')
                .then(()=> {
                    Toast.fire({
                        icon: 'success',
                        title: 'Nouveau produit ajouté'
                    })
                    this.$router.push({ name: 'products'})
                    this.$Progress.finish()
                })
                .catch((error)=> {
                    Toast.fire({
                        icon: 'error',
                        title: 'Ajout échoué !'
                    })
                    this.$Progress.fail()
                    this.btnText= 'Valider'
                    this.btnDisable = false 
                })
            }
        }
    }
</script>
