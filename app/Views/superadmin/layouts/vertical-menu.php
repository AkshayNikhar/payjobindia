<?php 
use App\Models\CommonModel;
$this->commonModel=new CommonModel();
$this->session = session();

$assignid= $this->session->get('id');
$assignRole= $this->session->get('roleassign');

$assigndetails=$this->commonModel->fs('payjobadmin',array('id'=>$assignid));

// $this->assign=$assigndetails->assign;

$Assignassigndetails=$this->commonModel->fs('roleAssign',array('id'=>$assignRole));

$jobcateid=$Assignassigndetails->jobcate_id;

$Jobassigndetails=$this->commonModel->fs('job_category',array('id'=>$jobcateid));

$rolepermissiondetails=$this->commonModel->allFetch('permissions_emp',array('emp_id'=>$assignid,'role_id'=>$assignRole));

  $permissionID=$rolepermissiondetails->permission_type_id;
  $empid=$rolepermissiondetails->emp_id;
  
  /*foreach ($rolepermissiondetails as $permissionDetail) {
    $permissionID = $permissionDetail->permission_type_id;
    $empid = $permissionDetail->emp_id;

    // Now you can use $permissionID and $empid as needed
    echo "Permission ID: $permissionID, Emp ID: $empid";
}*/
 $permissionIDs = array_column($rolepermissiondetails, 'permission_type_id');
 $empIDs = array_column($rolepermissiondetails, 'emp_id');
 $roleIDs = array_column($rolepermissiondetails, 'role_id');
 
// print_r($roleIDs);exit;

 $Assignassigndetails->name;
 $Jobassigndetails->name;
// print_r($rolepermissiondetails);exit;

// $asd($rolepermissiondetails->permission_type_id == 27 && $rolepermissiondetails->emp_id == $assignid && $rolepermissiondetails->role_id == $assignid);
//  $asd = (in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs));

?>
<header id="page-topbar">
    <div class="navbar-header">
        
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo base_url('superadmin/dashboard') ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        
                        <img src="<?php echo base_url('front/assets/images/favicon.png')?>" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo base_url('front/assets/images/favicon.png')?>" alt="" height="17">
                    </span>
                </a>

                <a href="<?php echo base_url('superadmin/dashboard') ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo base_url('front/assets/images/favicon.png') ?>" alt="" height="50" >
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
                    <img class="rounded-circle header-profile-user" src="<?php echo base_url('front/assets/images/favicon.png') ?>" alt="Payjob Dashboard">
                    <span class=" d-xl-inline-block ms-1" >PayJob Dashboard  </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <!--<a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Home</span></a>-->
                    <!--<a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">About</span></a>-->
                    <!--<a class="dropdown-item" href="#"><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Daily Update</span></a>-->
                    <!--<a class="dropdown-item" href="auth-lock-screen"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Service</span></a>-->
                    <!--<a class="dropdown-item" href="auth-lock-screen"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Crops</span></a>-->
                    <!--<div class="dropdown-divider"></div>-->
                    <a class="dropdown-item text-danger" href="<?= base_url('superadmin/logout')?>"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span>Logout</span></a>
               
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
                    <a href="<?php echo base_url('superadmin/dashboard') ?>" class="waves-effect"> <i class="bx bx-home-circle"></i> <span >Dashboard</span> </a>
                </li>
                
                
                <?php 
                    if($assignRole == 0 && $assignid == 1) { 
                    ?>
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Job Attributes</span>
                    </a>
                    
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/all-job-category') ?>" key="t-blog">Job Category</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-function-area') ?>" key="t-blog">Functional Area</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-career-level') ?>" key="t-default">Career level</a></li>
                        <!--<li><a href="<?php echo base_url('superadmin/all-jobs-role') ?>" key="t-saas">Job Role</a></li>-->
                        <li><a href="<?php echo base_url('superadmin/all-gender') ?>" key="t-crypto">Genders</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-industry') ?>" key="t-blog">Industries</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-job-experience') ?>" key="t-blog">Job Experience</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-vacancytype') ?>" key="t-blog">Vancancy Types</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-jobtype') ?>" key="t-blog">Job Types</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-jobshift') ?>" key="t-blog">Job Shift</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-education') ?>" key="t-blog">Education</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-degree-level') ?>" key="t-blog">Degree Levels</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-ownership') ?>" key="t-blog">Ownership Types</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-salary') ?>" key="t-blog">Salary Periods</a></li>
                        
                        <!--<li><a href="<?php echo base_url('superadmin/add-roleassign') ?>" key="t-blog">Role Assign</a></li>-->
                    </ul>
                </li>
                <?php } elseif((in_array(1, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Job Attributes</span>
                    </a>
                    
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/all-job-category') ?>" key="t-blog">Job Category</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-function-area') ?>" key="t-blog">Functional Area</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-career-level') ?>" key="t-default">Career level</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-jobs-role') ?>" key="t-saas">Job Role</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-gender') ?>" key="t-crypto">Genders</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-industry') ?>" key="t-blog">Industries</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-job-experience') ?>" key="t-blog">Job Experience</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-vacancytype') ?>" key="t-blog">Vancancy Types</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-jobtype') ?>" key="t-blog">Job Types</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-jobshift') ?>" key="t-blog">Job Shift</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-education') ?>" key="t-blog">Education</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-degree-level') ?>" key="t-blog">Degree Levels</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-ownership') ?>" key="t-blog">Ownership Types</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-salary') ?>" key="t-blog">Salary Periods</a></li>
                        
                        <!--<li><a href="<?php echo base_url('superadmin/add-roleassign') ?>" key="t-blog">Role Assign</a></li>-->
                    </ul>
                </li>
               
                <?php } else{
                    
                        }
                        ?>
               
                
                
                
                <?php 
                    if($assignRole == 0 && $assignid == 1) { 
                
                        // if((in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { 
                    ?>
                <li>
                    
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Company Registration</span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/all-company') ?>">All Company</a></li>
                        <li><a href="<?php echo base_url('superadmin/add-company') ?>">Add Company</a></li>
                    </ul>
                </li>
                <?php } elseif((in_array(2, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <li>
                    
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Company Registration</span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/all-company') ?>">All Company</a></li>
                        <li><a href="<?php echo base_url('superadmin/add-company') ?>">Add Company</a></li>
                    </ul>
                </li>
                <?php } else{
                    
                    }
                    ?>
                
                
                <?php 
                if($assignRole == 0 && $assignid == 1) { 
            
                    // if((in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { 
                ?>
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Candidate Registration</span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/all-user') ?>">All Candidate</a></li>
                        <!--<li><a href="<?php echo base_url('superadmin/add-user') ?>">Add Candidate</a></li>-->
                    </ul>
                </li>
                <?php } elseif((in_array(3, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Candidate Registration</span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/all-user') ?>">All Candidate</a></li>
                        <li><a href="<?php echo base_url('superadmin/add-user') ?>">Add Candidate</a></li>
                    </ul>
                </li>
                <?php } else{
                    
                    }
                    ?>
               
                
                <?php 
                if($assignRole == 0 && $assignid == 1) { 
                ?> 
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Location</span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/all-country') ?>">Country</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-state') ?>">State</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-city') ?>">City</a></li>
                    </ul>
               </li>
                <?php } elseif((in_array(4, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                 <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Location</span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/all-country') ?>">Country</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-state') ?>">State</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-city') ?>">City</a></li>
                    </ul>
               </li>
                <?php } else{
                    
                }
                ?>
                
                <?php 
                if($assignRole == 0 && $assignid == 1) { 
                ?> 
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Jobs</span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/all-jobs') ?>">All Jobs</a></li>
                        
                        <li><a href="<?php echo base_url('superadmin/add-jobs') ?>">Add Jobs</a></li>
                    </ul>
                </li>
                <?php } elseif((in_array(5, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Jobs</span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/all-jobs') ?>">All Jobs</a></li>
                        
                        <li><a href="<?php echo base_url('superadmin/add-jobs') ?>">Add Jobs</a></li>
                    </ul>
                </li>
                <?php } else{
                    
                }?>
                <!-- Other roles or no permissions - Do Nothing -->
                
                
                <?php 
                    if($assignRole == 0 && $assignid == 1) { 
                    ?>
                <li>
                    <a href="<?php echo base_url('superadmin/all-applied-jobs') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >Applied Job</span> </a>
                </li>
                <?php } elseif((in_array(6, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <a href="<?php echo base_url('superadmin/all-applied-jobs') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >Applied Job</span> </a>
                <?php } else{
                    }
                    ?>
                 
                  <?php 
                    if($assignRole == 0 && $assignid == 1) { 
                    ?>   
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Employes Role</span>
                    </a>
                   
                    <ul class="sub-menu" aria-expanded="false">
                        
                        <!--<li><a href="<?php echo base_url('superadmin/add-role-permission') ?>" key="t-blog">Permission</a></li>-->
                        <li><a href="<?php echo base_url('superadmin/vendor-list') ?>" key="t-blog">Vendor</a></li>
                        <li><a href="<?php echo base_url('superadmin/roleassign') ?>" key="t-blog">Role Assign</a></li>
                        <!--<li><a href="<?php echo base_url('superadmin/view-consultant') ?>" key="t-blog">Vendor</a></li>-->
                    </ul>
                 </li>
                <?php } elseif((in_array(7, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Employes Role</span>
                    </a>
                   
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/roleassign') ?>" key="t-blog">Role Assign</a></li>
                        <li><a href="<?php echo base_url('superadmin/add-role-permission') ?>" key="t-blog">Permission</a></li>
                        
                    </ul>
                 </li>
                <?php } else{
                    }
                    ?>
                
                <?php 
                    if($assignRole == 0 && $assignid == 1) { 
                    ?>
                <li class="d-none">
                    <a href="#" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Report</span> </a>
                </li>
                <li class="">
                    <a href="<?php echo base_url('superadmin/all-blogs') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Blog</span> </a>
                </li>
                <?php } elseif((in_array(8, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <li class="d-none">
                    <a href="#" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Report</span> </a>
                </li>
                <?php } else{
                    }
                    ?>
                
                <?php 
                    if($assignRole == 0 && $assignid == 1) { 
                    ?>
                <li class="">
                    <a href="<?php echo base_url('superadmin/all-pages') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Pages</span> </a>
                </li>
                <?php } elseif((in_array(9, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                <li class="">
                    <a href="<?php echo base_url('superadmin/all-pages') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Pages</span> </a>
                </li>
                <?php } else{
                    }
                    ?>
                <li>
                    <a href="<?= base_url('superadmin/logout')?>" class="waves-effect"> <i class="bx bx-award"></i> <span>Logout</span> </a>
                </li>
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->