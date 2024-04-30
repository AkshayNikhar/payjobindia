<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();

$job_id=$datajobapplicant->job_id;
$user_id=$datajobapplicant->user_id;

$joblist=$this->commonModel->fs('jobs_list',array('id'=>$job_id));

$userlist=$this->commonModel->fs('users',array('id'=>$user_id));

$gender=$userlist->gender_id;
$genderlist=$this->commonModel->fs('job_attributes_genders',array('id'=>$gender));

$country=$userlist->country_id;
$countrylist=$this->commonModel->fs('location_countries',array('id'=>$country));

$state=$userlist->state;
$statelist=$this->commonModel->fs('location_states',array('id'=>$state,'country_id'=>$country));

$city=$userlist->city;
$citylist=$this->commonModel->fs('location_cities',array('id'=>$city));

$degree=$userlist->education;
$edulevel=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$degree));

$type=$joblist->degree_type_id;
$degtype=$this->commonModel->fs('job_attributes_degree_types',array('id'=>$type));

$areafun=$joblist->functional_area_id;
$functionalareaid=$this->commonModel->fs('job_attributes_functional_areas',array('id'=>$areafun));

$exp=$userlist->experience;
$exper=$this->commonModel->fs('job_attributes_job_experiences',array('id'=>$exp));
?>

<head>
    <title> Edit Job Applicant | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18"> Edit Job Applicant </h4>
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
                                    
                                    <div class="row">
                    <div class="col-12">
                        
                                <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="width: 400px;">Name</th>
                                            <td><?= esc($userlist->name) ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row">Gender</th>
                                            <td><?= esc($genderlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Country</th>
                                            <td><?= esc($countrylist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">State</th>
                                            <td><?= esc($statelist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">City</th>
                                            <td><?= esc($citylist->name) ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row">Education</th>
                                            <td><?= esc($edulevel->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Degree</th>
                                            <td><?= esc($degtype->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Experience</th>
                                            <td><?= esc($exper->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status</th>
                                            <td><?= esc($datajobapplicant->active_status) ?></td>
                                            <td>
                                                <form method="POST" enctype="multipart/form-data" class="needs-validation" action="<?= base_url('/company/edit-company-job-applicant'); ?>" novalidate>
                                                <div class="form-group mb-3">
                                                    <input type="hidden" name="id" value="<?php echo $datajobapplicant->id ?>">
                                                    <select name="active_status" id="active_status" class="form-select">
                                                    <option selected>Choose  ...</option>
                                                         <option value="Shortlist">Shortlist</option>
                                                         <option value="Selected">Selected</option>
                                                         <option value="Rejected">Rejected</option>
                                                         <option value="Hold">Hold</option>
                                                    </select>
                                                    
                                                    
                                                </div>
                                                <div class="form-group mb-3">
                                                <label>Message</label>
                                                <textarea type="text" class="form-control" name="description"></textarea>
                                                </div>
                                                <input type="submit" class="btn btn-primary" name="submit" value="Update">
                                            </form>
                                            </td>
                                        </tr>
                                        
                                       
                                        
                                        
                                        
                                    </tbody>
                                </table>
                                </div>
                            
                </div> <!-- end row -->
                                
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