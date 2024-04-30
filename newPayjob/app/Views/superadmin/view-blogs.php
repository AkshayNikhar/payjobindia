<?php 
include 'layouts/head-main.php';
?>

<head>
    <title>Blogs Details | FarmEasy</title>
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
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">FarmEasy Blogs Details</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="pt-3">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-8">
                                            <div>
                                                <div class="text-center">
                                                    <h4><?= $datablogs->blogs_name ?></h4>
                                                </div>

                                                <hr>
                                                <div class="my-5">
                                                    <img src="<?= base_url('back/assets/images/blogs/'.$datablogs->blogs_image) ?>" alt="" class="img-thumbnail mx-auto d-block">
                                                </div>

                                                <hr>

                                                <div class="mt-4">
                                                    <div class="text-muted font-size-14">
                                                        <p><?php echo $datablogs->blogs_description; ?></p>
                                                    </div>

                                                    <hr>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                

               
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php include 'layouts/footerjs.php' ?>

</body>

</html>