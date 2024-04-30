<?php 
include 'layouts/head-main.php';
?>

<head>
    <title>Land Management | Farmeasy</title>
    <?php include 'layouts/head.php'; ?>

    

    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-8">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Add Land </h4>
                        </div>
                    </div>
                    
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-lg-2"></div> -->
                                    <div class="col-lg-12">
                                    
                                    <div class="col-lg-12  mb-3">
                                         <?php if (session()->getFlashdata('success')) : ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <?= session()->getFlashdata('success') ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (session()->getFlashdata('error')) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <?= session()->getFlashdata('error') ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        <?php endif; ?>
                                    </div>   
                                <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url(''); ?>" novalidate>
                                    
                                    
                                    <div class="row">
                                        
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Area of Land ( भूमि का क्षेत्रफल )</label>
                                                <input type="text" class="form-control" name="area_of_land" placeholder="Area of Land in acres" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Type of Land (भूमि का प्रकार)   </label>
                                                <select name="land_type" id="land_type" class="form-select">
                                                    <option value=''>Select Land TYpe</option>
                                                    <option value="Permanent_pasture"> Permanent pasture </option>
                                                    <option value="Forests"> Forests</option>
                                                    <option value="Land not available for cultivation"> Land not available for cultivation</option>
                                                    <option value="Net area sown"> Net area sown</option>
                                                    <option value="Plantation"> Plantation</option>
                                                    <option value="Commercial agriculture"> Commercial agriculture</option>
                                                    <option value="Culturable waste"> Culturable waste</option>
                                                    <option value="Current fallow">Current fallow</option>
                                                    <option value="Dryland farming">Dryland farming</option>
                                                    <option value="Extensive agriculture">Extensive agriculture</option>
                                                    <option value="Shifting agriculture">Shifting agriculture</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Type of Soil (मिट्टी का प्रकार)   </label>
                                                <select name="soil_type" id="soil_type" class="form-select">
                                                    <option value=''>Select Soil Area</option>
                                                    <option value="alluvial_soil"> जलोढ़ मिट्टी (Alluvial soil)</option>
                                                    <option value="red_soil"> लाल मिट्टी (Red soil)</option>
                                                    <option value="black_soil"> काली मिट्टी (Black soil)</option>
                                                    <option value="laterite_soil"> लेटराइट मिट्टी (Laterite soil)</option>
                                                    <option value="desert_soil"> रेगिस्तान मिट्टी (Desert soil)</option>
                                                    <option value="marshy_soil"> मार्श मिट्टी (Marshy soil)</option>
                                                    <option value="forest_soil"> वन मिट्टी (Forest soil)</option>
                                                    <option value="mountain_soil"> पहाड़ मिट्टी (Mountain soil)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Ownership of Land (भूमि का स्वामित्व)</label>
                                                <!--<input type="text" class="form-control" name="ownership_land" required>-->
                                                <select name="ownership_land" class="form-select">
                                                    <option value=''>Select Ownership </option>
                                                    <option value="Owned"> Owned</option>
                                                    <option value="Rented"> Rented</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>khasra number (खसरा नंबर) </label>
                                                <input type="text" class="form-control" name="khasra_no" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Tehsil (तहसील)</label>
                                                <input type="text" class="form-control" name="tehsil" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Destrict (जिला)</label>
                                                <input type="text" class="form-control" name="destrict" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Village Name (गाँव का नाम)</label>
                                                <input type="text" class="form-control" name="village_name" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Irrigation Sources (सिंचाई स्रोत)</label>
                                                <select name="irrigation_source" id="irrigation_source" onchange="irrigation_source_function()" class="form-select">
                                                    <option value=''>Select Irrigation Sources </option>
                                                    <option value="Yes"> Yes</option>
                                                    <option value="No"> No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3" id="irrigation_source_yes" style="display:none">
                                            <div class="form-group mb-3">
                                                <label>Type Irrigation Sources  (सिंचाई स्रोतों के प्रकार)</label>
                                                <select name="irrigation_source_yes"  class="form-select">
                                                    <option value=''>Select Irrigation Sources </option>
                                                    <option value="wells"> wells</option>
                                                    <option value="lakes"> lakes</option>
                                                    <option value="canals"> canals</option>
                                                    <option value="tube-wells"> tube-wells</option>
                                                    <option value="dams"> dams</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3" id="irrigation_source_no" style="display:none">
                                            <div class="form-group mb-3">
                                                <label>Type Irrigation Sources  (सिंचाई स्रोतों के प्रकार)</label>
                                                <select name="irrigation_source_yes"  class="form-select">
                                                    <option value=''>Select Irrigation Sources </option>
                                                    <option value="Rain fed"> Rain fed</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Method of Irrigation  (सिंचाई के प्रकार)   </label>
                                                <select name="seed_variety" id="seed_variety"  class="form-select">
                                                    <option value=''>Method Irrigation </option>
                                                    <option value="Surface Irrigation"> Surface Irrigation</option>
                                                    <option value="Localized Irrigation"> Localized Irrigation</option>
                                                    <option value="Sprinkler Irrigation"> Sprinkler Irrigation</option>
                                                    <option value="Drip Irrigation"> Drip Irrigation</option>
                                                    <option value="Centre Pivot Irrigation"> Centre Pivot Irrigation</option>
                                                    <option value="Sub Irrigation"> Sub Irrigation</option>
                                                    <option value="Manual Irrigation"> Manual Irrigation</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <input type="hidden" name="Uid" value="<?php echo $customerid ?>"    
                                        
                                        


                                       <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="submit" class="btn btn-primary" name="submit" value="Add">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

               

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<!-- Required datatable js -->
<?php include 'layouts/footerjs.php' ?>
<!-- Required datatable js -->

<script>
    function irrigation_source_function(){
        var irrigation_source = document.getElementById("irrigation_source").value;
        if(irrigation_source=='Yes'){
            document.getElementById("irrigation_source_yes").style.display='block';
            document.getElementById("irrigation_source_no").style.display='none';
        }
        else if(irrigation_source=='No'){
            document.getElementById("irrigation_source_yes").style.display='none';
            document.getElementById("irrigation_source_no").style.display='block';
        }else{
            document.getElementById("irrigation_source_yes").style.display='none';
            document.getElementById("irrigation_source_no").style.display='none';
        }
    }
</script>

</body>

</html>