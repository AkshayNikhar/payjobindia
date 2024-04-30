<?php 
include 'layouts/head-main.php';

?>

<head>
    <title>Edit Pages | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">Edit Pages </h4>
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
                                <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('superadmin/edit-pages'); ?>" novalidate>
                                    
                                    
                                    <div class="row">
                                        <input type="hidden" name="id" id="id" value="<?php echo $datapages->id; ?>">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <select name="name" id="name" class="form-select">
                                                <option selected hidden>Select Pages ...</option>
                                                <option value="Home" <?php if($datapages->name=='Home') {echo 'selected';} ?>>Home</option>
                                                <option value="About" <?php if($datapages->name=='About') {echo 'selected';} ?>>About</option>
                                                <option value="Intership" <?php if($datapages->name=='Intership') {echo 'selected';} ?>>Intership</option>
                                                <option value="Jobs" <?php if($datapages->name=='Jobs') {echo 'selected';} ?>>Jobs</option>
                                                <option value="Start Hiring" <?php if($datapages->name=='Start Hiring') {echo 'selected';} ?>>Start Hiring</option>
                                                <option value="Contact Us" <?php if($datapages->name=='Contact Us') {echo 'selected';} ?>>Contact Us</option>
                                                <option value="Refund Policy" <?php if($datapages->name=='Refund Policy') {echo 'selected';} ?>>Refund Policy</option>
                                                <option value="Privacy Policy" <?php if($datapages->name=='Privacy Policy') {echo 'selected';} ?>>Privacy Policy</option>
                                                <option value="Terms & Condition" <?php if($datapages->name=='Terms & Condition') {echo 'selected';} ?>>Terms & Condition</option>
                                                <option value="FAQ" <?php if($datapages->name=='Terms & Condition') {echo 'selected';} ?>>FAQ</option>
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Meta Title</label>
                                                <textarea type="text" class="form-control" name="title" required><?php echo $datapages->title; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Meta Keyword</label>
                                                <textarea type="text" class="form-control" name="keywords" required><?php echo $datapages->keywords; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Meta Description</label>
                                                <textarea type="text" class="form-control" name="description" required><?php echo $datapages->description; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Canonical Tag</label>
                                                <textarea type="text" class="form-control" name="canonical_tag" required><?php echo $datapages->canonical_tag; ?></textarea>
                                            </div>
                                        </div>
                                            
                                        


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


</body>

</html>