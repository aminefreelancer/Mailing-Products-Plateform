<template>
    <div>
        <!--Page header-->
        <div class="page-header">
            <div class="page-leftheader">
                <h4 class="page-title mb-0 text-primary">Nouveau Produit</h4>
            </div> 
            <div class="page-rightheader">
                <div class="btn-list">
                    <button class="btn btn-outline-primary"><i class="fe fe-download me-2"></i>
                        Produits GHN
                    </button>
                     
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
                        <div class="row">
                            <form action="#" >
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Produit <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Conditionnement </label>
                                        <input type="text" class="form-control" name="condition">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Posologie </label>
                                        <input type="text" class="form-control" name="posology">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Cure </label>
                                        <input type="email" class="form-control" name="cure">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Prix <span class="text-red">*</span></label>
                                        <input type="email" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Lien </label>
                                        <input type="text" class="form-control" name="url">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Image </label>
                                        <input type="text" class="form-control" name="img">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Observation </label>
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Valider</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</template>

<script>
    export default {
        
    }
</script>
