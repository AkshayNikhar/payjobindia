<?php 
include 'layouts/head-main.php';

?>

<head>
    <title>Edit Blogs | Farmeasy</title>
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
                            <h4 class="mb-sm-0 font-size-18">Edit Blogs </h4>
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
                                <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('superadmin/edit-blogs'); ?>" novalidate>
                                    
                                    
                                    <div class="row">
                                        <input type="hidden" name="id" id="id" value="<?php echo $datablogs->id; ?>">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Title</label>
                                                <input type="text" class="form-control" name="title" value="<?php echo $datablogs->title; ?>" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Slug</label>
                                                <input type="text" class="form-control" name="slug" value="<?php echo $datablogs->slug; ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Meta Title</label>
                                                <input type="text" class="form-control" name="meta_title" value="<?php echo $datablogs->meta_title; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Description</label>
                                                <textarea type="text" class="form-control" name="description" id="editor" required><?php echo $datablogs->description; ?></textarea> 
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Meta Description</label>
                                                <textarea type="text" class="form-control" name="meta_description" ><?php echo $datablogs->meta_description; ?></textarea> 
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Meta Keyword</label>
                                                <textarea type="text" class="form-control" name="meta_keyword" ><?php echo $datablogs->meta_keyword; ?></textarea> 
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Schema Markup</label>
                                                <textarea type="text" class="form-control" name="schema_markup" ><?php echo $datablogs->schema_markup; ?></textarea> 
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Canonical tag</label>
                                                <textarea type="text" class="form-control" name="canonical_tag" ><?php echo $datablogs->canonical_tag; ?></textarea> 
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