<?php 
include 'layouts/head-main.php';

?>

<head>
    <title>Add Permission | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">Add Permission </h4>
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
                                <form method="POST" class="needs-validation" enctype="multipart/form-data" action="<?= base_url('superadmin/create-role-permission'); ?>"  novalidate>
                                    
                                    
                                    <div class="row" style="margin-top: 20px;">
                                        
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label> Name</label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label> Email</label>
                                                <input type="text" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Contact No.</label>
                                                <input type="text" class="form-control" name="phone" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Country</label>
                                                <select name="country_id" id="country_id" class="form-select select2">
                                                <option selected hidden>Select ...</option>
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
                                                <select name="state_id" id="state_id" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <!--?php
                                                    foreach($state as $states)
												    {
                                                    echo '<option value="'.$states->id.'">'.$states->name.'</option>';
												    }
											    ?-->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>City</label>
                                                <select name="city_id" id="city_id" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <!--?php
                                                    foreach($city as $citys)
												    {
                                                    echo '<option value="'.$citys->id.'">'.$citys->name.'</option>';
												    }
											    ?-->
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Address</label>
                                                <textarea  type="text" class="form-control" name="address"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Role Assigned</label>
                                                <select name="assign" id="assign" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                    foreach($roleassign as $role)
												    {
                                                    echo '<option value="'.$role->id.'">'.$role->name.'</option>';
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-none">
                                            <div class="form-group mb-3">
                                                <label>Job Category</label>
                                                <select name="job_category_id" id="job_category_id" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                    foreach($jobcategory as $s)
												    {
                                                    echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Password</label>
                                                <input type="text" class="form-control" name="password" required>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                        
                                    <div class="row">    
                                        
                                        
                                            
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