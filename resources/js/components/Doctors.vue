<template>
    <div>
        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Liste Médecins</h4>
            </div> 
            <div class="page-rightheader">
                <div class="btn-list">
                    <button data-bs-target="#addNew" data-bs-toggle="modal" class="btn btn-outline-primary">
                        <i class="fa fa-plus me-2"></i>
                        Nouveau Médecin
                    </button>
                     <new-doc/>
                </div>
            </div>
        </div>
        <!--End Page header-->

        <!-- Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Liste des médecins</h3>
                    </div>
                    <div class="card-body">
                        <div v-if="doctors.length" class="table-responsive">
                            <table class="table table-bordered table-hover card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr class="border-top">
                                        <th>Nom & prénom</th>
                                        <th>Spécialité</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-bottom" v-for="doctor in doctors" :key="doctor.id">
                                        <td>{{doctor.name}} {{doctor.fname}}</td>
                                        <td>{{doctor.speciality}}</td>
                                        <td>{{doctor.email}}</td>
                                        <td>
                                            <button @click="removeDoctor(doctor.id)" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p v-else class="text-center"> Aucun médecin trouvé ! </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</template>

<script>
    
    import NewDoc from './NewDoc.vue';
    export default {
        name:'doctors',
        components: {
            NewDoc
        },
        data() {
            return {
                doctors: []
            }
        }, 
        methods: {
            
            removeDoctor(id) {
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
                        axios.delete('/api/doctors/'+id)
                        .then(()=>{
                            this.getDoctors()
                            Swal.fire('Médecin supprimé!', '', 'success')
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
            this.getDoctors()
        }
    }
</script>
