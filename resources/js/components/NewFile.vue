<template>
    <div>
        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Nouveau Document</h4>
            </div> 
            <div class="page-rightheader">
                <div class="btn-list">
                    <router-link :to="{name: 'files'}" class="btn btn-outline-primary"><i class="fa fa-th-list me-2"></i>
                        Documents GHN
                    </router-link>
                     
                </div>
            </div>
        </div>
        <!--End Page header-->

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="card-title">Information Document</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="addFile" enctype="multipart/form-data">
                            <div class="row">
								<div class="col-sm-12 col-md-3">
                                    
                                </div> 
                                <div class="col-sm-12 col-md-6"> 
                                    <div class="form-group">	
										<label class="form-label">Produit <span class="text-red">*</span></label>
										<multiselect v-model="file.product" :options="products" selectLabel="Entrer pour sélectionner" deselectLabel="Entrer pour déselectionner" selectedLabel="Sélectionné" track-by="name" placeholder="Sélectionner un produit" :close-on-select="true" required :preserve-search="true" label="name" :class="{ 'is-invalid': file.errors.has('product')}" ></multiselect>
                                        <has-error :form="file" field="product"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Document PDF <span class="text-red">*</span></label>
                                    </div>
                                    <div class="input-group file-browser mb-5">
                                        <input type="text" class="form-control border-end-0 browse-file" :class="{ 'is-invalid': file.errors.has('file.product')}" placeholder="Sélectionner un PDF" readonly>
                                        <label class="input-group-text btn btn-primary">
                                                Parcourir <input type="file" v-on:change="onFileChange" class="file-browserinput" style="display: none;">
                                        </label>
                                        <has-error :form="file" field="pdf"></has-error>
                                    </div>
                                    <div class="form-group text-center">
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
        name: "NewFile",
        data() {
            return {
                file: new Form({
                    pdf: '',
                    product: ''
                }),
                products: [],
                btnText: 'Valider',
                btnDisable: false,
            }
        },
        methods: {
            onFileChange(e){
                this.file.pdf = e.target.files[0];
            },
            addFile() {
                this.$Progress.start()
                this.btnText= 'Traitement en cours'
                this.btnDisable = true

                let formData = new FormData();
                formData.append('file', this.file.pdf);

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                // Submit the form via a POST request
                this.file.post('/api/files', formData, config)
                .then(()=> {
                    Toast.fire({
                        icon: 'success',
                        title: 'Nouveau document ajouté'
                    })
                    this.$router.push({ name: 'files'})
                    this.$Progress.finish()
                    
                })
                .catch((error)=> {
                    //console.log(error.response.data.message)
                    Toast.fire({
                        icon: 'error',
                        title: error.response.data.message
                    })
                    this.$Progress.fail()
                    this.btnText= 'Valider'
                    this.btnDisable = false 
                })
            },
            getProducts() {
                axios.get('/api/products')
                .then((response) => {
                    // console.log(response.data)
                    this.products = response.data;
                })
                .catch((error) => {
                    console.log(error)
                })
            }
        },
        mounted() {
            $(document).on('change', '.file-browserinput', function() {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
                });

            // We can watch for our custom `fileselect` event like this
            $(document).ready( function() {
                $(':file').on('fileselect', function(event, numFiles, label) {

                    var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) alert(log);
                    }

                });
            });
        },
        created() {
            this.getProducts()
        }

    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
