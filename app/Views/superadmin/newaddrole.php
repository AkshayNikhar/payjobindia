<?php 
include 'layouts/head-main.php';

?>

<head>
    <title>Add Role | Pay Job India</title>
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
                                <form method="POST"  class="needs-validation" action="<?= base_url('superadmin/create-assignrole'); ?>" novalidate>
                                    
                                    
                                    <div class="row">
                                        
                                        <div class="col-lg-4">
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
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                               

                                <div class="table-responsive">
                                    <table class="table mb-0">

                                        <thead class="table-light">
                                            <tr>
                                                
                                                <th>Permission</th>
                                                <th>Sub Permission</th>
                                                <th>Read</th>
                                                <th>Write</th>
                                                <th>Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td>
                                                    Company
                                                       <input type="hidden" class="form-control" name="title" value="Company">
                                                </td>
                                                <td>

                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="companyread" type="checkbox" value="False" onclick="selectAllCompany()" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="companywrite" type="checkbox" value="False" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="companyupdate" type="checkbox" value="False" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Company
                                                       <input type="hidden" class="form-control checkboxForm" name="title" value="Company" >
                                                </td>
                                                <td>
                                                    <div class="form-group mb-3">
                                                        Company Name
                                                       <input type="hidden" class="form-control checkboxForm" name="title" value="Company Name" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input checkboxForm" name="read" type="checkbox" value="True" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input checkboxForm" name="read" type="checkbox" value="True" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="False" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Company
                                                       <input type="hidden" class="form-control" name="title" value="Company">
                                                </td>
                                                <td>
                                                    <div class="form-group mb-3">
                                                        Company Name
                                                       <input type="hidden" class="form-control" name="title" value="Company Name" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="False" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Company
                                                       <input type="hidden" class="form-control" name="title" value="Company">
                                                </td>
                                                <td>
                                                    <div class="form-group mb-3">
                                                        Company Name
                                                       <input type="hidden" class="form-control" name="title" value="Company Name" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="False" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Company
                                                       <input type="hidden" class="form-control" name="title" value="Company">
                                                </td>
                                                <td>
                                                    <div class="form-group mb-3">
                                                        Company Name
                                                       <input type="hidden" class="form-control" name="title" value="Company Name" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="False" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Jobs
                                                       <input type="hidden" class="form-control" name="title" value="Company">
                                                </td>
                                                <td>
                                                    <div class="form-group mb-3">
                                                        Jobs Name
                                                       <input type="hidden" class="form-control" name="title" value="Company Name" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="False" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Company
                                                       <input type="hidden" class="form-control" name="title" value="Company">
                                                </td>
                                                <td>
                                                    <div class="form-group mb-3">
                                                        Company Name
                                                       <input type="hidden" class="form-control" name="title" value="Company Name" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="False" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Company
                                                       <input type="hidden" class="form-control" name="title" value="Company">
                                                </td>
                                                <td>
                                                    <div class="form-group mb-3">
                                                        Company Name
                                                       <input type="hidden" class="form-control" name="title" value="Company Name" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="False" >
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Company
                                                       <input type="hidden" class="form-control" name="title" value="Company">
                                                </td>
                                                <td>
                                                    <div class="form-group mb-3">
                                                        Company Name
                                                       <input type="hidden" class="form-control" name="title" value="Company Name" >
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="True" Checked>
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="form-check mb-3 text-center">
                                                        <input class="form-check-input" name="read" type="checkbox" value="False" >
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                                        </div>
                                        
                                        <h5 class="mt-2 mb-2">Candidate Permission</h5>
                                        
                                        

                                        
                                        
                                            
                                        


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
    function selectAllCompany() {
        // console.log("21212121");
      var checkboxes = document.querySelectorAll('.checkboxForm input[type="checkbox"]');
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = true;
      });
    }

    function clearSelection() {
      var checkboxes = document.querySelectorAll('#checkboxForm input[type="checkbox"]');
      checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
      });
    }
  </script>






</body>

</html>