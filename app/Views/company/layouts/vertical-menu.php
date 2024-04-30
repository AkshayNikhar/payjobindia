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
                    <a href="<?php echo base_url('company/dashboard') ?>" class="waves-effect"> <i class="bx bx-home-circle"></i> <span >Dashboard</span> </a>
                </li>
                <li>
                    <a href="<?php echo base_url('company/profile') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >Company Profile</span> </a>
                </li>
                <li>
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
                    <a href="<?php echo base_url('company/job-applicant') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Jobs Applicants</span> </a>
                    <!--<a href="<?php echo base_url('company/applicant') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Jobs Applicants</span> </a>-->
                </li>
                
                <li>
                    <a href="<?php echo base_url('company/change-password') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Setting</span> </a>
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