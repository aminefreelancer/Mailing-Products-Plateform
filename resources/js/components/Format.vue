<template>
    <div>
        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Format Email</h4>
            </div> 
            <div class="page-rightheader">
                <div class="btn-list">
                    <button class="btn btn-outline-primary">
                        <i class="fa fa-plus me-2"></i>
                        Nouveau Email
                    </button>
                </div>
            </div>
        </div>
        <!--End Page header-->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Format d'email</h3>
                    </div>
                    <form  @submit.prevent="updateFormat">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row align-items-center">
                                    <label class="col-sm-2 form-label">Objet <span class="text-red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" v-model="email.subject" class="form-control" :class="{ 'is-invalid': email.errors.has('subject') }">
                                        <has-error :form="email" field="subject"></has-error>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <label class="col-sm-2 form-label">Contenu Email <span class="text-red">*</span></label>
                                    <div class="col-sm-10">
                                        <vue-editor :class="{ 'is-invalid': email.errors.has('format') }" v-model="email.format"></vue-editor>
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
    </div>
</template>

<script>
    export default {
        name:'Format',
        data() {
            return {
                email: new Form({
                    id : '',
                    subject: '',
                    format: ''
                }),
                btnDisable: false,
                btnText: 'Valider'
            }
        }, 
        methods: {
            
            updateFormat(){
                this.$Progress.start()
                this.btnText= 'Traitement en cours'
                this.btnDisable = true
                this.email.put('api/emails/'+this.email.id)
                .then((response) => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Format email modifié avec succès'
                    })
                    this.$Progress.finish()
                })
                .catch((error) => {
                    Toast.fire({
                        icon: 'error',
                        title: 'Modification échouée !'
                    })
                    this.$Progress.fail()
                })
                this.btnText= 'Modifier'
                this.btnDisable = false 
            }
        },
        created() {
            this.getFormat()
        }
    }
</script>

<style lang="scss" scoped>

</style>
