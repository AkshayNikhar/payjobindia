<?php 
include 'layouts/head-main.php';

?>

<head>
    <title>Add Company | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">Add Company </h4>
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
                                <form method="POST" class="needs-validation" enctype="multipart/form-data" action="<?= base_url('superadmin/create-company'); ?>"  novalidate>
                                    
                                    <div class="row" style="padding-top: 20px;padding-bottom: 20px;background: #212f7c29;">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Allow Active Status</label>
                                                <select name="is_active" id="is_active" class="form-select" required>
                                                <option selected>Select Status ...</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Is Featured?</label>
                                                <select name="is_featured" id="is_featured" class="form-select" required>
                                                <option selected>Select Feature ...</option>
                                                <option value="1">Enable</option>
                                                <option value="0">Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Logo</label>
                                                <input type="file" class="form-control" name="image" accept=".jpg,.png,.jpeg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control" name="company_name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Email</label>
                                                <input type="text" class="form-control" name="company_email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Contact No.</label>
                                                <input type="text" class="form-control" name="phone" required>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="row">
                                         
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Industry</label>
                                                <select name="industry_id" id="industry_id" class="form-select">
                                                <option selected hidden>Select Industry ...</option>
                                                <?php 
                                                foreach ($industry as $indus){
                                                echo '<option value="'.$indus->id.'">'.$indus->name.'</option>';
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company CEO</label>
                                                <input type="text" class="form-control" name="companyceo" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Company Type</label>
                                                <select name="ownership_type_id" id="ownership_type_id" class="form-select">
                                                <option selected hidden>Select Ownership ...</option>
                                                <?php 
                                                foreach ($ownership as $own){
                                                echo '<option value="'.$own->id.'">'.$own->name.'</option>';
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Number of Employees</label>
                                                <select name="no_of_employees" id="no_of_employees" class="form-select">
                                                <option selected hidden>Select Number ...</option>
                                                <option value="1-10">1-10</option>
                                                <option value="11-50">11-50</option>
                                                <option value="51-100">51-100</option>
                                                <option value="101-200">101-200</option>
                                                <option value="201-300">201-300</option>
                                                <option value="301-600">301-600</option>
                                                <option value="601-1000">601-1000</option>
                                                <option value="1001-1500">1001-1500</option>
                                                <option value="1501-2000">1501-2000</option>
                                                <option value="2001-2500">2001-2500</option>
                                                <option value="2501-3000">2501-3000</option>
                                                <option value="3001-3500">3001-3500</option>
                                                <option value="3501-4000">3501-4000</option>
                                                <option value="4001-4500">4001-4500</option>
                                                <option value="4501-5000">4501-5000</option>
                                                <option value="5000+">5000+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Number of Office</label>
                                                <select name="no_of_offices" id="no_of_offices" class="form-select">
                                                    <option selected hidden>Select Office ...</option>
                                                    <?php 
                                                        foreach ($numberList as $listno){
                                                        echo '<option value="'.$listno.'">'.$listno.'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Established</label>
                                                <select name="established_in" id="established_in" class="form-select">
                                                <option selected hidden>Select Year ...</option>
                                                <?php
                                                    foreach($years as $year)
												    {
                                                    echo '<option value="'.$year.'">'.$year.'</option>';
												    }
											    ?>
                                                
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Country</label>
                                                <select name="country_id" id="country_id" class="form-select">
                                                <option selected hidden>Select Status ...</option>
                                                <?php
                                                    foreach($country as $countrys)
												    {
                                                    echo '<option value="'.$countrys->id.'">'.$countrys->name.'</option>';
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>State</label>
                                                <select name="state_id" id="state_id" class="form-select">
                                                <option selected hidden>Select States ...</option>
                                                <?php
                                                    foreach($state as $states)
												    {
                                                    echo '<option value="'.$states->id.'">'.$states->name.'</option>';
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>City</label>
                                                <select name="city_id" id="city_id" class="form-select">
                                                <option selected hidden>Select City ...</option>
                                                <?php
                                                    foreach($city as $citys)
												    {
                                                    echo '<option value="'.$citys->id.'">'.$citys->name.'</option>';
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Website Url</label>
                                                <input type="text" class="form-control" name="website" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Fax</label>
                                                <input type="text" class="form-control" name="fax" >
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Facebook Link</label>
                                                <input type="text" class="form-control" name="facebook" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Twitter link</label>
                                                <input type="text" class="form-control" name="twitter" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Linkedin link</label>
                                                <input type="text" class="form-control" name="linkedin" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Youtube link</label>
                                                <input type="text" class="form-control" name="youtube" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Pinterest link</label>
                                                <input type="text" class="form-control" name="pinterest" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Password</label>
                                                <input type="text" class="form-control" name="password" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Description</label>
                                                <textarea type="text" class="form-control" name="description" id="editor" ></textarea> 
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