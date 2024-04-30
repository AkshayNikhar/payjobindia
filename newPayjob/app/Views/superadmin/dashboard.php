<?php 
include 'layouts/head-main.php';
// echo $_SESSION["cusemail"];
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
?>

<head>
    <title>Dashbord | Farmer</title>
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
                            <h4 class="mb-sm-0 font-size-18">Welcome to Pay Job India Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4 d-none">
                        <div class="card overflow-hidden">
                            <div class="bg-success bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-white">Welcome Back !</h5>
                                            <p class="text-white">PayJobIndia Dashboard</p>
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
                                            <img src="https://demo.payjobindia.com/img/favicon.png" alt="" class="img-thumbnail rounded-circle">
                                            <!--<img src="<?php echo base_url('back/assets/images/users/user.png')?>" alt="" class="img-thumbnail rounded-circle">-->
                                        </div>
                                        <h5 class="font-size-15 text-truncate">Admin</h5>
                                        <!--<p class="text-muted mb-0 text-truncate">Admin</p>-->
                                    </div>

                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-md-3">
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
                                                    <i class="mdi mdi-domain text-warning1 h"></i>
                                                </div>
                                                <div>
                                                    <h5>Total Company </h5>
                                                    <p class="text-muted mb-1">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                                                    <i class="mdi mdi-bag-checked text-warning1 h"></i>
                                                </div>
                                                <div>
                                                    <h5>Total Jobs</h5>
                                                    <p class="text-muted mb-1">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                                                    <i class="mdi mdi-account-box-multiple text-warning1 h"></i>
                                                </div>
                                                <div>
                                                    <h5>Total Employers</h5>
                                                    <p class="text-muted mb-1">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                                                    <i class="mdi mdi-account-multiple-check text-warning1 h"></i>
                                                </div>
                                                <div>
                                                    <h5>Total Candidates</h5>
                                                    <p class="text-muted mb-1">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5>RECENT REGISTER COMPANIES </h5>
                                <?php if(!empty($feedback)) {echo $feedback;} ?>
                                <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                <!--<table id="datatable" class="table table-bordered mb-0">-->
                                    <thead class="table-light">
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <!--<th>Date</th>-->
                                            <!--<th>Active</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($company as $d)
                                            {
                                                $sr++;
                                                $id=$d->id;
                                                $cityid=$d->city_id;
                                                $city=$this->commonModel->fs('location_cities',array('id'=>$cityid));
                                        ?>
                                        <tr>
                                            <td><? echo $sr ?></td> 
                                            <td><?= esc($d->company_name) ?></td>
                                            <td><?= esc($d->company_email) ?></td>
                                            <td><?= esc($city->name) ?></td>
                                            <td class="d-none"><?php echo date('d M Y',strtotime($d->created_at)) ?> </td>
                                            <td class="d-none">
                                                <?php 
                                                if($d->is_active==1){
                                                  $status =  'Active' ;
                                                  $status1 =  'badge-soft-success' ;
                                                  
                                                }else{
                                                  $status =  'Inactive';
                                                  $status1 =  'badge-soft-danger';
                                                }
                                                ?>
                                                <span class="badge badge-pill <?php echo $status1 ?> font-size-11"><?= esc($status) ?></span>
                                                
                                            </td>
                                            <td class="">
                                               <!--<a href="#" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>-->
                                               <a href="city-wise-job/<?= esc($cityid) ?>" class="btn btn-sm btn-primary w-20">View</a>
                                               <!--<a href="view-scheme/<?= esc($slug) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>-->
                                            </td>
                                        </tr>
                                        <?
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                            <div class="col-6">
                        <div class="card"> 
                            <div class="card-body">
                                <h5>RECENT JOBS </h5>
                                <?php if(!empty($feedback)) {echo $feedback;} ?>
                                <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                <!--<table id="datatable" class="table table-bordered mb-0">-->
                                    <thead class="table-light">
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Title</th>
                                            <th>Company Name</th>
                                            <th>City</th>
                                            <!--<th>Date</th>-->
                                            <!--<th>Active</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($jobs as $d)
                                            {
                                                $sr++;
                                                $id=$d->id; 
                                                $cityid=$d->city_id;
                                                $city=$this->commonModel->fs('location_cities',array('id'=>$cityid));
                                                $companyid=$d->company_id;
                                                $company=$this->commonModel->fs('companies',array('id'=>$companyid));
                                        ?>
                                        <tr>
                                            <td><? echo $sr ?></td> 
                                            <td><?= esc($d->title) ?></td>
                                            <td><?= esc($company->company_email) ?></td>
                                            <td><?= esc($city->name) ?></td>
                                            <td class="d-none"><?php echo date('d M Y',strtotime($d->created_at)) ?> </td>
                                            <td class="d-none">
                                                <?php 
                                                if($d->is_active==1){
                                                  $status =  'Active' ;
                                                  $status1 =  'badge-soft-success' ;
                                                  
                                                }else{
                                                  $status =  'Inactive';
                                                  $status1 =  'badge-soft-danger';
                                                }
                                                ?>
                                                <span class="badge badge-pill <?php echo $status1 ?> font-size-11"><?= esc($status) ?></span>
                                                
                                            </td>
                                            <td class="">
                                               <!--<a href="#" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>-->
                                               <a href="edit-jobs/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20">Edit</a>
                                               <!--<a href="view-scheme/<?= esc($slug) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>-->
                                            </td>
                                        </tr>
                                        <?
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                            
                        </div>
                        <!-- end row -->

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

<!-- apexcharts -->
<!--<script src="<?php echo base_url() ?>/back/assets/libs/apexcharts/apexcharts.min.js"></script>-->
<!--<script src="<?php echo base_url() ?>/back/assets/js/pages/dashboard.init.js"></script>-->

<!-- App js -->
<!--<script src="<!?php echo base_url('/back/assets/js/app.js') ?>"></script>-->

</body>

</html>