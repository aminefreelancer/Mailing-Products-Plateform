<template>
    <div>
        <div class="modal fade" id="addNew">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Nouveau Médecin</h6>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
					</div>
                    <form @submit.prevent="addDoctor" >
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Nom <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" v-model="doctor.name" :class="{ 'is-invalid': doctor.errors.has('name') }">
                                        <has-error :form="doctor" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Prénom </label>
                                        <input type="text" class="form-control" v-model="doctor.fname" :class="{ 'is-invalid': doctor.errors.has('fname') }">
                                        <has-error :form="doctor" field="fname"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Email  <span class="text-red">*</span></label>
                                        <input type="email" class="form-control" v-model="doctor.email" :class="{ 'is-invalid': doctor.errors.has('email') }">
                                        <has-error :form="doctor" field="email"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Spécialité</label>
                                        <select class="form-control" v-model="doctor.speciality" :class="{ 'is-invalid': doctor.errors.has('speciality') }">
                                            <option>--Select--</option>
                                            <option value="Médecin Généraliste">Médecin Généraliste</option>
                                            <option value="Ophtalmologuie">Ophtalmologuie</option>
                                            <option value="Pédiatrie">Pédiatrie</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                        <has-error :form="doctor" field="speciality"></has-error>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" :disabled="btnDisable">{{btnText}}</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
    </div>
</template>

<script>
    export default {
        name: 'NewDoc',
        data() {
            return {
                doctor: new Form({
                    name: '',
                    fname: '',
                    email: '',
                    speciality: ''
                }),
                btnText: 'Valider',
                btnDisable: false,
            }
        },
        methods: {
            addDoctor() {
                this.$Progress.start()
                this.btnText= 'Traitement en cours'
                this.btnDisable = true
                // Submit the form via a POST request
                this.doctor.post('/api/doctors')
                .then(()=> {
                    Toast.fire({
                        icon: 'success',
                        title: 'Nouveau médecin ajouté'
                    })
                    $('#addNew').modal('hide')
                    this.getDoctors()
                    this.$Progress.finish()
                })
                .catch((error)=> {
                    Toast.fire({
                        icon: 'error',
                        title: 'Ajout échoué !'
                    })
                    this.$Progress.fail() 
                })
                this.btnText= 'Valider'
                this.btnDisable = false
                
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>