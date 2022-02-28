<template>
    <div>
        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Documents GHN</h4>
            </div> 
            <div class="page-rightheader">
                <div class="btn-list">
                    <router-link :to="{name: 'newFile'}" class="btn btn-outline-primary"><i class="fa fa-plus me-2"></i>
                        Nouveau Document
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
                        <h3 class="card-title">Liste des documents</h3>
                    </div>
                    <div class="card-body">
                        <div v-if="files.length" class="table-responsive">
                            <table class="table table-bordered table-hover card-table table-vcenter text-nowrap">
                                <thead>
                                    <tr class="border-top">
                                        <th>Document</th>
                                        <th>Produit</th>
                                        <th>lien</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-bottom" v-for="file in files" :key="file.id">
                                        <td>{{file.pdf}}</td>
                                        <td>{{file.product.name}}</td>
                                        <td>{{file.url}}</td>
                                        <td>
                                            <button @click="removeFile(file.id)" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p v-else class="text-center"> Aucun document trouvé ! </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</template>

<script>
    export default {
        name:'files',
        data() {
            return {
                files: []
            }
        }, 
        methods: {
            getFiles() {
                axios.get('/api/files')
                .then((response) => {
                    console.log(response.data)
                    this.files = response.data;
                    this.loading=false;
                })
                .catch((error) => {
                    console.log(error)
                })
            },
            removeFile(id) {
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
                        axios.delete('/api/files/'+id)
                        .then(()=>{
                            this.getFiles()
                            Swal.fire('Document supprimé!', '', 'success')
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
            this.getFiles()
        }
    }
</script>
