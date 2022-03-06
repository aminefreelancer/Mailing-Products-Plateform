<template>
    <div>
        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Nouveau Mail</h4>
            </div> 
            <div class="page-rightheader">
                <div class="btn-list">
                    <router-link :to="{name: 'email'}" class="btn btn-outline-primary"><i class="fa fa-th-list me-2"></i>
                        Format Email
                    </router-link>
                     
                </div>
            </div>
        </div>
        <!--End Page header-->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Nouveau Mail</h3>
                    </div>
                    <form  @submit.prevent="sendMail">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-2 form-label">Destinataire(s) <span class="text-red">*</span></label>
                                    <div class="col-sm-8">
                                        <multiselect v-model="email.to" :options="doctors" selectLabel="Entrer pour sélectionner" deselectLabel="Entrer pour déselectionner" selectedLabel="Sélectionné" track-by="id" placeholder="Sélectionner un médecin" :close-on-select="true" required  :show-labels="false" :preserve-search="true" :custom-label="getDr" :multiple="true" :class="{ 'is-invalid': email.errors.has('to')}" ></multiselect>
                                        <has-error :form="email" field="to"></has-error>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" data-bs-target="#addNew" data-bs-toggle="modal" class="btn btn-outline-primary">
                                            <i class="fa fa-plus me-2"></i>
                                            Nouveau Médecin
                                        </button>
                                        <new-doc/>
                                    </div>
                                </div>
                            </div>    
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-2 form-label">Objet <span class="text-red">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" v-model="email.subject" class="form-control" :class="{ 'is-invalid': email.errors.has('subject') }">
                                        <has-error :form="email" field="subject"></has-error>
                                    </div>
                                    <label class="col-sm-2 form-label">Documents PDF <span class="text-red">*</span></label>
                                    <div class="col-sm-4">
                                        <multiselect v-model="email.docs" :options="products" selectLabel="Entrer pour sélectionner" deselectLabel="Entrer pour déselectionner" selectedLabel="Sélectionné" track-by="name" placeholder="Sélectionner un produit" :close-on-select="true" :multiple="true" required :preserve-search="true" label="name" :class="{ 'is-invalid': email.errors.has('docs')}" ></multiselect>
                                        <has-error :form="email" field="docs"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <label class="col-sm-2 form-label">Contenu Email <span class="text-red">*</span></label>
                                    <div class="col-sm-10">
                                        <vue-editor v-model="email.format"></vue-editor>
                                        <has-error :form="email" field="format"></has-error>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="card-footer d-sm-flex">
                            <div class="btn-list ms-auto">
                                <button type="submit" class="btn btn-primary" :disabled="btnDisable">{{btnText}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</template>

<script>
    import NewDoc from './NewDoc.vue';
    export default {
        name: "NewEmail",
        components: {
            NewDoc
        },
        data() {
            return {
                email: new Form({
                    to: '',
                    subject: '',
                    format: '', 
                    docs: [],
                }),
                doctors: [],
                products: [],
                btnText: 'Envoyer',
                btnDisable: false,
            }
        },
        methods: {
            getDr({ name, fname }) {
                return `Dr. ${name} ${fname}`
            },
            sendMail() {
                this.$Progress.start()
                this.btnText= 'Envoi en cours'
                this.btnDisable = true
                // Submit the form via a POST request
                this.email.post('/api/logs')
                .then(()=> {
                    Toast.fire({
                        icon: 'success',
                        title: 'Email envoyé avec succès'
                    })
                    this.$router.push({ name: 'dashboard'})
                    this.$Progress.finish()
                })
                .catch((error)=> {
                    Toast.fire({
                        icon: 'error',
                        title: 'Envoi échoué !'
                    })
                    this.$Progress.fail()
                    this.btnText= 'Envoyer'
                    this.btnDisable = false 
                })
            }
        },
        created(){
            this.getFormat()
            this.getDoctors()
            this.getProducts()
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>