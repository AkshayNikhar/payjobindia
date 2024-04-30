<?php 
use App\Models\CommonModel;
$this->commonModel=new CommonModel();
$this->session = session();
$customerid= $this->session->get('venid');


$companydetails=$this->commonModel->fs('vendor',array('id'=>$customerid));
$company_name=$companydetails->name;
$company_email=$companydetails->email;
$phone=$companydetails->phone;
$assignRole=$companydetails->assign;

$roleAssignwiseCate=$this->commonModel->fs('roleAssign',array('id'=>$assignRole));
// print_r($roleAssignwiseCate);exit;

 

$rolepermissiondetails=$this->commonModel->allFetch('permissions_emp',array('emp_id'=>$customerid));
// print_r($rolepermissiondetails);

// $permissionIDs = array_column($rolepermissiondetails, 'permission_type_id');
// $empIDs = array_column($rolepermissiondetails, 'emp_id');

$permissionIDs = array_column($rolepermissiondetails, 'permission_type_id');
$empIDs = array_column($rolepermissiondetails, 'emp_id');
$roleIDs = array_column($rolepermissiondetails, 'role_id');
?>
<header id="page-topbar">
    <div class="navbar-header">
        
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo base_url('/') ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo base_url('front/assets/images/favicon.png')?>" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo base_url('front/assets/images/favicon.png')?>" alt="" height="17">
                    </span>
                </a>

                <a href="<?php echo base_url('/') ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo base_url('front/assets/images/favicon.png')?>" alt="" height="50" >
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo base_url('front/assets/images/logo.png')?>" alt="" height="50" style="background:#fff">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?php echo base_url('front/assets/images/favicon.png')?>" alt="<?php echo $company_name  ?>">
                    <span class=" d-xl-inline-block ms-1" style="font-size: 17px;text-transform: capitalize;margin-top: 10px;"><?php echo $company_name ?>  </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end ">
                    <!-- item-->
                    <a class="dropdown-item d-none" href="<?php echo base_url('farmer/dashboard') ?>"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Home</span></a>
                    <a class="dropdown-item d-none" href="<?php echo base_url('farmer/profile') ?>"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">Profile</span></a>
                    <a class="dropdown-item d-none" href="<?php echo base_url('farmer/task') ?>"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Task</span></a>
                    <a class="dropdown-item d-none" href="<?php echo base_url('farmer/change-password') ?>"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Change Password</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?= base_url('logout')?>"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span>Logout</span></a>
               
                </div>
            </div>


        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
               
                <li>
                    <a href="<?php echo base_url('vendor/dashboard') ?>" class="waves-effect"> <i class="bx bx-home-circle"></i> <span >Dashboard</span> </a>
                </li>
                <li class="d-none">
                    <a href="<?php echo base_url('vendor/profile') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >Company Profile</span> </a>
                </li>
               
                <li class="d-none">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Job Attributes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                    <li><a href="<?php echo base_url('vendor/all-job-category') ?>" key="t-blog">Job Category</a></li>
                    <li><a href="<?php echo base_url('vendor/all-function-area') ?>" key="t-blog">Functional Area</a></li>
                    <li><a href="<?php echo base_url('vendor/all-career-level') ?>" key="t-default">Career level</a></li>
                    </ul>
                </li>
                
                
                <li class="d-none">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Job Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php 
                        $jobcat_ids = explode(',', $roleAssignwiseCate->jobcate_id);
                        // print_r($jobcat_ids);exit;
                        // $jobcate=$this->commonModel->fs('job_category',array('id'=>$jobcatids));
                        // print_r($jobcat_ids);exit;
                        foreach ($jobcat_ids as $jobcatid) {
                            $jobcate = $this->commonModel->fs('job_category', array('id' => $jobcatid));
                        ?>
                    <li><a href="<?php echo base_url('vendor/job-display-category/'.$jobcatid) ?>" key="t-blog"><?php echo $jobcate->name ?></a></li>
                    <?php
                   }
                ?>
                    </ul>
                </li>
                
                
                
                
                
                
                <?php if((in_array(30, $permissionIDs) && in_array($customerid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <li class="">
                    <a href="<?php echo base_url('vendor/all-job-category') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >Job Attribute</span> </a>
                </li>
                <?php } else{ } ?>
                
                <?php if((in_array(37, $permissionIDs) && in_array($customerid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <li class="">
                    <a href="<?php echo base_url('vendor/all-function-area') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >Functional Area</span> </a>
                </li>
                <?php } else{ } ?>
                
                <?php if((in_array(38, $permissionIDs) && in_array($customerid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <li class="">
                    <a href="<?php echo base_url('vendor/all-career-level') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >Career Level</span> </a>
                </li>
                <?php } else{ } ?>
                
                <li class="">
                    <a href="<?php echo base_url('vendor/all-company') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >Company</span> </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url('vendor/all-user') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >Candidate</span> </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url('vendor/view-jobs') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >Jobs</span> </a>
                </li>
                <li class="d-none">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-dashboards">Jobs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('company/post-jobs') ?>" key="t-tui-calendar">Post Jobs</a></li>
                        <li><a href="<?php echo base_url('company/view-jobs') ?>" key="t-full-calendar">All Jobs</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo base_url('vendor/job-applicant') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Jobs Applicants</span> </a>
                    <!--<a href="<?php echo base_url('company/applicant') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Jobs Applicants</span> </a>-->
                </li>
                <?php if((in_array(36, $permissionIDs) && in_array($customerid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <li>
                    <a href="<?php echo base_url('vendor/all-pages') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Pages</span> </a>
                </li>
                <?php } else{ } ?>
                <li>
                    <a href="<?php echo base_url('vendor/change-password') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Change Password</span> </a>
                </li>
                
                <li>
                    <a href="<?= base_url('logout')?>" class="waves-effect"> <i class="bx bx-award"></i> <span>Logout</span> </a>
                </li>
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->