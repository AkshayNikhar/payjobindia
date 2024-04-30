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
                    <img class="rounded-circle header-profile-user" src="https://demo.payjobindia.com/img/favicon.png" alt="Payjob Dashboard">
                    <!--<img class="rounded-circle header-profile-user" src="<?= base_url('front/assets/img/Farm Easy Web Icon.png') ?>" alt="FarmEasy Dashboard">-->
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
                
                
                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Job Attributes</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo base_url('superadmin/all-career-level') ?>" key="t-default">Career level</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-jobs-role') ?>" key="t-saas">Job Role</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-gender') ?>" key="t-crypto">Genders</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-industry') ?>" key="t-blog">Industries</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-job-experience') ?>" key="t-blog">Job Experience</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-jobtype') ?>" key="t-blog">Job Types</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-jobshift') ?>" key="t-blog">Job Shift</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-degree-level') ?>" key="t-blog">Degree Levels</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-education') ?>" key="t-blog">Education</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-ownership') ?>" key="t-blog">Ownership Types</a></li>
                        <li><a href="<?php echo base_url('superadmin/all-salary') ?>" key="t-blog">Salary Periods</a></li>
                    </ul>
                </li>
                
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
                
                
                <li>
                    <a href="<?php echo base_url('superadmin/all-applied-jobs') ?>" class="waves-effect"> <i class="bx bx-cube"></i> <span >Applied Job</span> </a>
                </li>
                <li>
                    <a href="#" class="waves-effect"> <i class="bx bx-cube"></i> <span >Employes Role</span> </a>
                </li>
                <li class="">
                    <a href="#" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Report</span> </a>
                </li>
                <li class="d-none">
                    <a href="<?php echo base_url('superadmin/all-crop-type') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >All Crops Type</span> </a>
                </li>
                <!--<li>-->
                <!--    <a href="<?php echo base_url('superadmin/crop-management') ?>" class="waves-effect"> <i class="bx bx-calendar-event"></i> <span >Crops Management</span> </a>-->
                <!--</li>-->
                <li class="d-none">
                    <a href="<?php echo base_url('superadmin/all-news') ?>" class="waves-effect"> <i class="bx bx-video"></i> <span>All News</span> </a>
                </li> 
                <li class="d-none">
                    <a href="<?php echo base_url('superadmin/all-events') ?>" class="waves-effect"> <i class="bx bx-video"></i> <span>All Events</span> </a>
                </li> 
                <li class="d-none">
                    <a href="<?php echo base_url('superadmin/all-blogs') ?>" class="waves-effect"> <i class="bx bx-video"></i> <span>All Blogs</span> </a>
                </li> 
                <li class="d-none">
                    <a href="<?php echo base_url('superadmin/all-training') ?>" class="waves-effect"> <i class="bx bx-video"></i> <span>All Training</span> </a>
                </li> 
                <li class="d-none">
                    <a href="<?php echo base_url('superadmin/all-product') ?>" class="waves-effect"> <i class="bx bx-video"></i> <span>All Product</span> </a>
                </li> 
                <li class="d-none">
                    <a href="<?php echo base_url('superadmin/all-diseases') ?>" class="waves-effect"> <i class="bx bx-video"></i> <span>All Diseases</span> </a>
                </li> 
                <li class="d-none">
                    <a href="<?php echo base_url('superadmin/all-customer') ?>" class="waves-effect"> <i class="bx bx-user"></i> <span>All Customers</span> </a>
                </li> 
                <li class="d-none">
                    <a href="<?php echo base_url('superadmin/all-contact') ?>" class="waves-effect"> <i class="bx bx-user"></i> <span>All Contacts</span> </a>
                </li> 
                <li class="d-none">
                    <a href="<?php echo base_url('superadmin/crop-enquiry') ?>" class="waves-effect"> <i class="bx bx-user"></i> <span>Assign to advisor</span> </a>
                </li> 
                <!--<li>-->
                <!--    <a href="<?php echo base_url('superadmin/tracker') ?>" class="waves-effect"> <i class="bx bx-video"></i> <span>Expense Tracker</span> </a>-->
                <!--</li> -->
                <!--<li>-->
                <!--    <a href="<?php echo base_url('superadmin/order') ?>" class="waves-effect"> <i class="bx bx-video"></i> <span>My Order</span> </a>-->
                <!--</li> -->
                <!--<li>-->
                <!--    <a href="<?php echo base_url('superadmin/booking') ?>" class="waves-effect"> <i class="bx bx-photo-album"></i> <span>My Booking</span> </a>-->
                <!--</li>-->
                <!--<li>-->
                <!--    <a href="<?php echo base_url('superadmin/service') ?>" class="waves-effect"> <i class="bx bx-chat"></i> <span>Services</span> </a>-->
                <!--</li>-->
                <li>
                    <a href="<?= base_url('superadmin/logout')?>" class="waves-effect"> <i class="bx bx-award"></i> <span>Logout</span> </a>
                </li>
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->