<?php 
include 'layouts/head-main.php';

?>

<head>
    <title>Edit Job Category | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">Edit Job Category </h4>
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
                                <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('vendor/edit-job-category'); ?>" novalidate>
                                    
                                    
                                    <div class="row">
                                        <input type="hidden" name="id" id="id" value="<?php echo $datajobcate->id; ?>">
                                        <div class="col-lg-8">
                                            <div class="form-group mb-3">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title"  value="<?php echo $datajobcate->name; ?>" required>
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Type</label>
                                                <select name="is_active" id="is_active" class="form-select">
                                                <option selected>Select Status ...</option>
                                                <option value="1" <?php if($datajobcate->is_active==1) {echo 'selected';} ?>>Active</option>
                                                <option value="0" <?php if($datajobcate->is_active==0) {echo 'selected';} ?>>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 d-none">
                                            <div class="form-group mb-3">
                                                <label>Job Description</label>
                                                <textarea type="text" id="editor" class="form-control" name="description" required><?php echo $datajobcate->description; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-none">
                                            <div class="form-group mb-3">
                                                <label>Responbilities</label>
                                                <textarea type="text" id="editor1" class="form-control" name="responbilities" required><?php echo $datajobcate->responsibility; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 d-none">
                                            <div class="form-group mb-3">
                                                <label>Requirements</label>
                                                <textarea type="text" id="editor2" class="form-control" name="requirements" required><?php echo $datajobcate->requirement; ?></textarea>
                                            </div>
                                        </div>    
                                        <input type="hidden" name="vid" value="<?php echo $customerid ?>">


                                       <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="submit" class="btn btn-primary" name="submit" value="Update">
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
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
</script>
</body>

</html>