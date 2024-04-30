<?php 
include 'layouts/head-main.php';

?>

<head>
    <title>Edit Permission | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">Edit Permission </h4>
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
                                <form method="POST" class="needs-validation" enctype="multipart/form-data" action="<?= base_url('superadmin/vendor-edit'); ?>"  novalidate>
                                    
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $vendordata->id ?>" required>
                                    
                                    <div class="row" style="margin-top: 20px;">
                                        
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label> Name</label>
                                                <input type="text" class="form-control" name="name" value="<?php echo $vendordata->name ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label> Email</label>
                                                <input type="text" class="form-control" name="email" value="<?php echo $vendordata->email ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Contact No.</label>
                                                <input type="text" class="form-control" name="phone" value="<?php echo $vendordata->phone ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Job Category</label>
                                                <select name="job_category_id" id="job_category_id" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                    foreach($jobcategory as $s)
												    {
												        if($s->id == $roleAssigns->jobcate_id)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                    echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
                                                    
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Role Assigned</label>
                                                <select name="assign" id="assign" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                // print_r($roleassign);exit;
                                                    foreach($roleassign as $role)
												    {
												      if($role->id == $vendordata->assign)
                                                        {
                                                            $sel1='selected';
                                                        }
                                                        else
                                                        {
                                                            $sel1='';
                                                        }  
                                                    echo '<option value="'.$role->id.'">'.$role->name.'</option>';
												    }
											    
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                    
                                         <h4>Permission</h4>
                                
                                    
                                   
                                        
                                        <div class="row">
                                            
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" name="permissions" type="checkbox" value="Company Name"
                                                           
                                                        <label class="form-check-label" for="formCheck1">
                                                           Permission
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" name="permissions" type="checkbox" value="Company Name"
                                                           
                                                        <label class="form-check-label" for="formCheck1">
                                                            Sub Permission
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" name="permissions" type="checkbox" value="Company Name"
                                                           
                                                        <label class="form-check-label" for="formCheck1">
                                                            Read
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" name="permissions" type="checkbox" value="Company Name"
                                                           
                                                        <label class="form-check-label" for="formCheck1">
                                                            Write
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" name="permissions" type="checkbox" value="Company Name"
                                                           
                                                        <label class="form-check-label" for="formCheck1">
                                                            Update
                                                        </label>
                                                    </div>
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