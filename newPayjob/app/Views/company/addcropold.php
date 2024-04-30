<?php 
include 'layouts/head-main.php';
?>

<head>
    <title>Crop Management | Farmeasy</title>
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
                            <h4 class="mb-sm-0 font-size-18">Add Crop Management </h4>
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
                                <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('farmer/create-crop'); ?>" novalidate>
                                    
                                    
                                    <div class="row">
                                        
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Select Crop Name (फसल का नाम)</label>
                                                <select name="crop_name" id="crop_name" class="form-select">
                                                <option selected>Choose Crop ...</option>
                                                    <?php
                                                        foreach($croplist as $s)
													    {
                                                        echo '<option value="'.$s->croptype_id.'" '.$sel.'>'.$s->croptype_title.'</option>';
													    }
    											    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Crop Variety (फसल विविधता)</label>
                                                <input type="text" class="form-control" name="crop_variety" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Cultivation Date (खेती की तारीख) </label>
                                                <input type="date" class="form-control" name="cultivation_date" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Land Area (भूमि क्षेत्रफल)   </label>
                                                <select name="crop_land_area" id="crop_land_area" class="form-select">
                                                    <option value=''>Select Land Area</option>
                                                    <option value="0.5-1.0">0.5 - 1.0</option>
                                                    <option value="1.0-2.0">1.0 - 2.0</option>
                                                    <option value="2.0-3.0">2.0 - 3.0</option>
                                                    <option value="3.0-4.0">3.0 - 4.0</option>
                                                    <option value="4.0-5.0">4.0 - 5.0</option>
                                                    <option value="5.0-6.0">5.0 - 6.0</option>
                                                    <option value="6.0-7.0">6.0 - 7.0</option>
                                                    <option value="7.0-8.0">7.0 - 8.0</option>
                                                    <option value="8.0-9.0">8.0 - 9.0</option>
                                                    <option value="9.0-10.0">9.0 - 10.0</option>
                                                    <option value="10.0-15.0">10.0 - 15.0</option>
                                                    <option value="15.0-20.0">15.0 - 20.0</option>
                                                    <option value="20.0-25.0">20.0 - 25.0</option>
                                                    <option value="25.0-30.0">25.0 - 30.0</option>
                                                    <option value="30.0-35.0">30.0 - 35.0</option>
                                                    <option value="35.0-40.0">35.0 - 40.0</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Land Type (भूमि का प्रकार)   </label>
                                                <select name="crop_land_type" id="crop_land_type" class="form-select">
                                                    <option value=''>Select Land Area</option>
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
                                                <label>land preparation (भूमि तैयारी)</label>
                                                <select name="land_preparation" id="land_preparation" class="form-select">
                                                    <option value=''>Land Preparation </option>
                                                    <option value="cultivated"> Cultivated</option>
                                                    <option value="non-cultivated"> Non-cultivated</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Seeds variety (बीज प्रकार)   </label>
                                                <select name="seed_variety" id="seed_variety" class="form-select">
                                                    <option value=''>Seed Variety </option>
                                                    <option value="hybrid_vegetables_seed"> Hybrid Vegetables seed</option>
                                                    <option value="op_vegetables_seeds"> OP vegetables seeds</option>
                                                    <option value="organic_vegetables_seed"> Organic vegetables seed</option>
                                                    <option value="desi_vegetables_seeds"> Desi vegetables seeds</option>
                                                    <option value="hybrid_grain_seeds"> Hybrid Grain Seeds</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Seeds quantity (बीज मात्रा) ACRES/KG   </label>
                                                <input type="text" class="form-control" name="seed_quantity" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Choose Seeds Image (बीज छवि)</label>
                                                <input type="file" class="form-control" name="seed_image" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label style="width: 100%;">Seed Treatment (बीज उपचार)</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="seed_treatment" id="inlineRadio1" value="yes">
                                                    <label class="form-check-label" for="inlineRadio1">YES</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="seed_treatment" id="inlineRadio2" value="no">
                                                    <label class="form-check-label" for="inlineRadio2">NO</label>
                                                </div>                                                          
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Cultivation type (खेती प्रकार)     </label>
                                                <select name="cultivation_type" id="cultivation_type" class="form-select">
                                                    <option value=''>Cultivation type </option>
                                                    <option value="irrigated"> सिंचित (Irrigated)</option>
                                                    <option value="non_irrigated"> असिंचित (Non-Irrigated)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>kharapatavaar Nashak (खरपतवार नाशक)</label>
                                                <input type="text" class="form-control" name="kharapatvaar_nashak" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Cultivation Methods (खेती विधि)</label>
                                                <select name="cultivation_method" id="cultivation_method" class="form-select">
                                                    <option value=''>Cultivation Methods </option>
                                                    <option value="seed_drill"> बीज ड्रिल (BY SEED DRILL)</option>
                                                    <option value="seed_throw"> बीज फेंक द्वारा (BY SEED THROW)</option>
                                                    <option value="transplant"> प्रत्यारोपण द्वारा (BY TRANSPLANT)</option>
                                                    <option value="bed_planting"> बिस्तर संयंत्र द्वारा (BY FIRBS/ BED PLANTING)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Fertilizer Name (उर्वरक का नाम)</label>
                                                <input type="text" class="form-control" name="fertilizer_name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Fertilizer Image (उर्वरक छवि)</label>
                                                <input type="file" class="form-control" name="fertilizer_image" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Fertilizer quantity (उर्वरक मात्रा) KG)</label>
                                                <input type="text" class="form-control" name="fertilizer_quantity" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Water Supply (जलापूर्ति)</label>
                                                <input type="text" class="form-control" name="water_supply" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Water Supply (जलापूर्ति)</label>
                                                <select name="water_resource" id="water_resource" class="form-select">
                                                    <option value=''>Water Resources </option>
                                                    <option value="tubewell"> नलकूप/टूबवेल (Tubewell)</option>
                                                    <option value="well"> कुंआ (Well)</option>
                                                    <option value="canal"> नहर (Canal)</option>
                                                    <option value="rain"> बारिश (Rain)</option>/option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Seed Expenses (बीज खर्च)</label>
                                                <input type="text" class="form-control" name="seed_expenses" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Fertilizers Expenses (उर्वरक खर्च)</label>
                                                <input type="text" class="form-control" name="fertilizers_expenses" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Land Preparation Expenses</label>
                                                <input type="text" class="form-control" name="land_preparation_expenses" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Approx Yield (लगभग उपज)</label>
                                                <input type="text" class="form-control" name="approx_yield" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group mb-3">
                                                <label>Approx Expenses (लगभग खर्च)</label>
                                                <input type="text" class="form-control" name="approx_expenses" required>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="Uid" value="<?php echo $customerid ?>"    
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Mention Your Query</label>
                                                <textarea type="text" id="editor" class="form-control" name="msg" required></textarea>
                                            </div>
                                        </div>


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


</body>

</html>