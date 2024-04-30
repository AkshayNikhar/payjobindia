<?php 
include 'layouts/head-main.php';
// echo $_SESSION["cusemail"];
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
?>

<head>
    <title>Dashbord | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">Welcome to Consultant Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-success bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-white">Welcome Back !</h5>
                                            <p class="text-white"><?php echo $company_name ?> Dashboard</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="<?php echo base_url('back/assets/images/profile-img.png')?>" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src="<?php echo base_url('back/assets/images/users/user.png')?>" alt="" class="img-thumbnail rounded-circle">
                                        </div>
                                        <h5 class="font-size-15 text-truncate">Admin</h5>
                                        <!--<p class="text-muted mb-0 text-truncate">Admin</p>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="card-body p-0">
                                            <div class="float-end dropdown ms-2">
                                                <a class="text-muted dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                </a>
                                            </div>
                                            <div>
                                                <div class=" me-3">
                                                    <i class="mdi mdi-text-box-check-outline text-warning1 h"></i>
                                                </div>
            
                                                <div>
                                                    <h5>Total Jobs</h5>
                                                    <p class="text-muted mb-1"><?= esc ($totaljobs) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="card-body p-0">
                                            <div class="float-end dropdown ms-2">
                                                <a class="text-muted dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                </a>
                                            </div>
                                            <div>
                                                <div class=" me-3">
                                                    <i class="mdi mdi-human-greeting-proximity text-warning1 h"></i>
                                                </div>
            
                                                <div>
                                                    <h5>Total Applicants</h5>
                                                    <p class="text-muted mb-1"><?= esc($totalapplicants) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <!-- end row -->
                
                <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Today Jobs Applied</h4>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="align-middle">Name</th>
                                                        <th class="align-middle">Gender</th>
                                                        <th class="align-middle">Country</th>
                                                        <th class="align-middle">State</th>
                                                        <th class="align-middle">City</th>
                                                        <th class="align-middle">Education</th>
                                                        <th class="align-middle">Degree</th>
                                                        <th class="align-middle">Experience</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                   $sr=0;
                                                    foreach($todayjobs as $d)
                                                    {
                                                        $sr++;
                                                        $id=$d->id;
                                                        $job_id=$d->job_id;
                                                        $user_id=$d->user_id;
                                                        
                                                        $joblist=$this->commonModel->fs('jobs_list',array('id'=>$job_id));
                                                        
                                                        $userlist=$this->commonModel->fs('users',array('id'=>$user_id));
                                                        
                                                        // print_r($userlist);exit;
                                                        
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
                                                    <tr>
                                                        <td><a href="javascript: void(0);" class="text-body fw-bold"><?= esc($userlist->name) ?></a> </td>
                                                        <td><?= esc($genderlist->name) ?></td>
                                                        <td>
                                                            <?= esc($countrylist->name) ?>
                                                        </td>
                                                        <td>
                                                            <?= esc($statelist->name) ?>
                                                        </td>
                                                        <td>
                                                            <?= esc($citylist->name) ?>
                                                        </td>
                                                        <td>
                                                            <?= esc($edulevel->name) ?>
                                                        </td>
                                                        <td>
                                                            <?= esc($degtype->name) ?>
                                                        </td>
                                                        
                                                        <td>
                                                            <?= esc($exper->name) ?>
                                                        </td>
                                                    </tr>
                                                    <?
                                                    }
                                                    ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>
                                </div>
                            </div>
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




<!-- /Right-bar -->



<?php include 'layouts/footerjs.php'; ?>



<!--<script src="<!?php echo base_url('/back/assets/js/app.js') ?>"></script>-->
<!-- plugin js -->
<script src="<?php echo base_url('/back/assets/js/main.js')?>"></script>




<script src="<?php echo base_url('back/assets/libs/apexcharts/apexcharts.min.js')?>"></script>
<script src="<?php echo base_url('back/assets/js/pages/saas-dashboard.init.js')?>"></script>
</body>

</html>