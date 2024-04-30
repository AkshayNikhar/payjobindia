<?php 
include 'layouts/head-main.php';

?>

<head>
    <title>Add Pages | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">Add Pages </h4>
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
                                <form method="POST" class="needs-validation" action="<?= base_url('superadmin/create-pages'); ?>" novalidate>
                                    
                                    
                                    <div class="row">
                                        
                                       <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <select name="name" id="name" class="form-select">
                                                <option selected hidden>Select Pages ...</option>
                                                <option value="Home">Home</option>
                                                <option value="About">About</option>
                                                <option value="Intership">Intership</option>
                                                <option value="Jobs">Jobs</option>
                                                <option value="Start Hiring">Start Hiring</option>
                                                <option value="Contact Us">Contact Us</option>
                                                <option value="Refund Policy">Refund Policy</option>
                                                <option value="Privacy Policy">Privacy Policy</option>
                                                <option value="Terms & Condition">Terms & Condition</option>
                                                <option value="FAQ">FAQ</option>
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Meta Title</label>
                                                <textarea type="text" class="form-control" name="title" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Meta Keyword</label>
                                                <textarea type="text" class="form-control" name="keywords" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Meta Description</label>
                                                <textarea type="text" class="form-control" name="description" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Canonical Tag</label>
                                                <textarea type="text" class="form-control" name="canonical_tag" required></textarea>
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