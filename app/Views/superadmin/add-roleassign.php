<?php 
include 'layouts/head-main.php';

?>

<head>
    <title>Add Role | Pay Job India</title>
    <?php include 'layouts/head.php'; ?>

    <link href="<?php echo base_url() ?>/back/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

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
                            <h4 class="mb-sm-0 font-size-18">Add Role </h4>
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
                                <form method="POST" class="needs-validation" action="<?= base_url('superadmin/create-assignrole'); ?>" novalidate>
                                    
                                    
                                    <div class="row">
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Job Category</label>
                                                <select name="job_category_id[]" id="job_category_id" multiple="multiple" class="form-select select2">
                                                <option value="all">all</option>
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
                                                <label>Role</label>
                                                <input type="text" class="form-control" name="title" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Status</label>
                                                <select name="is_active" id="is_active" class="form-select">
                                                <option selected>Select Status ...</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                    
                                        <h5>Employer Permission</h5>
                                        
                                        <div class="row">
                                            <div class="col-lg-2 mt-2">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                                    <label class="form-check-label" for="selectAll">Select All</label>
                                                </div>
                                            </div>
                                        <?php
                                            foreach($permission_emp as $s)
										    {
										        $id=$s->id;
										        
										        ?>
                                        <div class="col-lg-2 mt-2">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="permissions[]" type="checkbox" value="<?php echo $id ?>">
                                                <label class="form-check-label" for="formCheck1">
                                                    <?php echo $s->permission_name ?>
                                                </label>
                                            </div>
                                        </div>
                                        <? } ?>
                                        
                                        </div>
                                        
                                        <h5 class="mt-2 mb-2">Candidate Permission</h5>
                                        <div class="row">
                                        <?php
                                            foreach($permission_can as $ss)
										    {
										        $id=$ss->id;
										        
										        ?>
                                            <div class="col-lg-2 mt-2">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" name="candidatepermission[]" type="checkbox" value="<?php echo $id ?>">
                                                    <label class="form-check-label" for="formCheck1">
                                                        <?php echo $ss->permission_name ?>
                                                    </label>
                                                </div>
                                            </div>
                                             <? } ?>
                                        </div>
                                        
                                        
                                        <div class="row d-none">
                                        <?php
                                            foreach($permission_can as $ss)
										    {
										        $id=$ss->id;
										        
										        ?>
                                            <div class="col-lg-2">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" name="candidatepermission[]" type="checkbox" value="<?php echo $id ?>">
                                                    <label class="form-check-label" for="formCheck1">
                                                        <?php echo $ss->name ?>
                                                    </label>
                                                </div>
                                            </div>
                                             <? } ?>
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


<script>
$(document).ready(function() {
    // Handle "Select All" checkbox
    $('#selectAll').on('change', function() {
        if ($(this).prop('checked')) {
            // If "Select All" is checked, check all individual checkboxes
            $('.form-check-input[name="permissions[]"]').prop('checked', true);
        } else {
            // If "Select All" is unchecked, uncheck all individual checkboxes
            $('.form-check-input[name="permissions[]"]').prop('checked', false);
        }
    });

    // Handle individual checkboxes
    $('.form-check-input[name="permissions[]"]').on('change', function() {
        // If any individual checkbox is unchecked, uncheck "Select All"
        if ($('.form-check-input[name="permissions[]"]:not(:checked)').length > 0) {
            $('#selectAll').prop('checked', false);
        } else {
            // If all individual checkboxes are checked, check "Select All"
            $('#selectAll').prop('checked', true);
        }
    });
});
</script>





</body>

</html>