<template>
    <div>
        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Produits GHN</h4>
            </div> 
            <div class="page-rightheader">
                <div class="btn-list">
                    <router-link :to="{name: 'newProduct'}" class="btn btn-outline-primary"><i class="fa fa-plus me-2"></i>
                        Nouveau Produit
                    </router-link>
                     
                </div>
            </div>
        </div>
        <!--End Page header-->

        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des produits</h3>
                    </div>
                    <div class="card-body">
                        <div v-if="products.length" class="table-responsive">
                            <table class="table table-bordered table-hover card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr class="border-top">
                                        <th>Nom</th>
                                        <th>Conditionnement</th>
                                        <th>Prix</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-bottom" v-for="product in products" :key="product.id">
                                        <td>{{product.name}}</td>
                                        <td>{{product.condition}}</td>
                                        <td>{{product.price}} DZD</td>
                                        <td>
                                            <router-link :to="{name: 'editProduct', params: {id: product.id}}" class="btn btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </router-link>

                                            <button @click="removeProduct(product.id)" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p v-else class="text-center"> Aucun produit trouvé ! </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</template>

<script>
    export default {
        name:'Products',
        data() {
            return {
                products: []
            }
        }, 
        methods: {
            getProducts() {
                axios.get('/api/products')
                .then((response) => {
                    console.log(response.data)
                    this.products = response.data;
                    this.loading=false;
                })
                .catch((error) => {
                    console.log(error)
                })
            },
            removeProduct(id) {
                Swal.fire({
                    title: 'Attention !',
                    text: "Action irréversible",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, je confirme !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.$Progress.start()
                        //Http request to delete the produit with $id
                        axios.delete('/api/products/'+id)
                        .then(()=>{
                            Swal.fire('Produit supprimé!', '', 'success')
                            this.getProducts()
                            this.$Progress.finish()
                        }).catch(()=>{
                            Swal.fire('Erreur!','Suppression échouée.','error')
                            this.$Progress.fail()
                        }) 
                    }
                })
            }
        },
        created() {
            this.getProducts()
        }
    }
</script>
