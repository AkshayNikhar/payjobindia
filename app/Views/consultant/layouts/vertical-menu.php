<?php 
use App\Models\CommonModel;
$this->commonModel=new CommonModel();
$this->session = session();
echo $customerid= $this->session->get('venid');
$assignRole= $this->session->get('roleassign');

$Assignassigndetails=$this->commonModel->fs('roleAssign',array('id'=>$assignRole));

$vendordetails=$this->commonModel->fs('vendor',array('id'=>$customerid));
$vendorname=$vendordetails->name;

$jobcateid=$Assignassigndetails->jobcate_id;

$Jobassigndetails=$this->commonModel->fs('job_category',array('id'=>$jobcateid));

$rolepermissiondetails=$this->commonModel->allFetch('permissions_emp',array('emp_id'=>$customerid));
// print_r($rolepermissiondetails);exit;

$permissionIDs = array_column($rolepermissiondetails, 'permission_type_id');
$empIDs = array_column($rolepermissiondetails, 'emp_id');
$roleIDs = array_column($rolepermissiondetails, 'role_id');
// print_r($roleIDs);

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
                    <img class="rounded-circle header-profile-user" src="<?php echo base_url('front/assets/images/favicon.png')?>" alt="<?php echo $vendorname  ?>">
                    <span class=" d-xl-inline-block ms-1" style="font-size: 17px;text-transform: capitalize;margin-top: 10px;"><?php echo $vendorname ?>  </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end ">
                    <!-- item-->
                    
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
                    <a href="<?php echo base_url('consultant/dashboard') ?>" class="waves-effect"> <i class="bx bx-home-circle"></i> <span >Dashboard</span> </a>
                </li>
                
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Company</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        
                        <li><a href="<?php echo base_url('consultant/all-company') ?>">All Company</a></li>
                       
                        <?php 
                        if((in_array(2, $permissionIDs) && in_array($customerid, $empIDs) && in_array($assignRole, $roleIDs))) {
                        ?> 
                        <li><a href="<?php echo base_url('consultant/add-company') ?>">Add Company</a></li>
                        <?php } else{ }?>
                    </ul>
                </li>
                
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Candidate</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        
                        <li><a href="<?php echo base_url('consultant/all-user') ?>">All Candidate</a></li>
                        
                        <?php 
                        if((in_array(7, $permissionIDs) && in_array($customerid, $empIDs) && in_array($assignRole, $roleIDs))) {
                        ?> 
                        <li><a href="<?php echo base_url('consultant/add-user') ?>">Add Candidate</a></li>
                        <?php } else{ }?>
                    </ul>
                </li>
                
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Jobs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                         
                        <li><a href="<?php echo base_url('consultant/view-jobs') ?>">All Jobs</a></li>
                        
                        <?php 
                        if((in_array(20, $permissionIDs) && in_array($customerid, $empIDs) && in_array($assignRole, $roleIDs))) {
                        ?> 
                        <li><a href="<?php echo base_url('consultant/post-jobs') ?>">Add Jobs</a></li>
                        <?php } else{ }?>
                    </ul>
                </li>
                 
                
                
                
                <?php 
                if((in_array(24, $permissionIDs) && in_array($customerid, $empIDs) && in_array($assignRole, $roleIDs))) {
                ?>
                <li>
                    <a href="<?php echo base_url('consultant/all-applied-jobs') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >All Applied Job</span> </a>
                </li>
                <?php } else{ }?>
                
                
                <li>
                    <a href="<?php echo base_url('consultant/change-password') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Setting</span> </a>
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