<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
?>

<head>
    <title>Edit Permission | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">Edit Permission </h4>
                        </div>
                    </div>
                    <div class="col-4">
                        <div style="text-align: right;">
                            <a href="<?= base_url('superadmin/add-roleassign')?>" class="btn btn-primary waves-effect waves-light" >Add Role</a>
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
                                <form method="POST" class="needs-validation" enctype="multipart/form-data" action="<?= base_url('superadmin/vendor-edit'); ?>"  novalidate>
                                    
                                    <input type="hidden" class="form-control" name="id" value="<?php echo $vendordata->id ?>" required>
                                    
                                    <div class="row" style="margin-top: 20px;">
                                        
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="<?php echo $vendordata->name ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label> Email</label>
                                                <input type="text" class="form-control" name="email" value="<?php echo $vendordata->email ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Contact No.</label>
                                                <input type="text" class="form-control" name="phone" value="<?php echo $vendordata->phone ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Country</label>
                                                <select name="country_id" id="country_id" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                    foreach($country as $c)
												    {
												        if($c->id == $vendordata->country)
													        {
													            $sel='selected';
													        }
													        else
                                                            {
                                                                $sel='';
                                                            }
                                                    // echo '<option value="'.$countrys->id.'" '.$sel.'>'.$countrys->name.'</option>';
                                                    echo '<option value="'.$c->id.'" '.$sel.'>'.$c->name.'</option>';
												    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>State</label>
                                                <select name="state_id" id="state_id" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <?php
											    if(!empty($state))
											    {
    											    foreach($state  as $c)
    											    {
    											        if($c->id == $vendordata->state)
                                                        {
                                                            $sel1='selected';
                                                        }
                                                        else
                                                        {
                                                            $sel1='';
                                                        }
    											    echo '<option value="'.$c->id.'" '.$sel1.'>'.$c->name.'</option>';
    											    }
											    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>City</label>
                                                <select name="city_id" id="city_id" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <?php
											    if(!empty($city))
											    {
    											    foreach($city  as $c)
    											    {
    											        if($c->id == $vendordata->city)
                                                        {
                                                            $sel1='selected';
                                                        }
                                                        else
                                                        {
                                                            $sel1='';
                                                        }
    											    echo '<option value="'.$c->id.'" '.$sel1.'>'.$c->name.'</option>';
    											    }
											    }
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Address</label>
                                                <textarea  type="text" class="form-control" name="address"><?php echo $vendordata->address ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Role Assigned</label>
                                                <select name="assign" id="assign" class="form-select select2">
                                                <option selected hidden>Select ...</option>
                                                <?php
                                                // print_r($roleassign);exit;
                                                    foreach($roleassign as $role)
												    {
												      if($role->id == $vendordata->assign)
                                                        {
                                                            $sel1='selected';
                                                        }
                                                        else
                                                        {
                                                            $sel1='';
                                                        }  
                                                    echo '<option value="'.$role->id.'" '.$sel1.'>'.$role->name.'</option>';
												    }
											    
											    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                        
                                    <div class="row">    
                                        
                                        
                                            
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <input type="submit" class="btn btn-primary" name="submit" value="Add">
                                                <!--<a href="<?php echo base_url('superadmin/add-roleassign') ?>" class="btn btn-primary text-right">Vendor</a>-->
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
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if(!empty($feedback)) {echo $feedback;} ?>
                                <div class="table-responsive">
                                <table id="datatable" class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Sr No</th>
                                            <!--<th>Name</th>-->
                                            <th>Permission</th>
                                            <th>Permission For</th>
                                            <!--<th>Role Assign</th>-->
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                        $roleassignpermission=$this->commonModel->allFetchd('permissions_emp',array('role_id'=>$vendordata->assign));
                                            $sr=0;
                                            foreach($roleassignpermission as $d)
                                            {
                                                $sr++;
                                                $id=$d->id;
                                                $roleAssign=$d->role_id;
                                                $permission_type_id=$d->permission_type_id;
                                                $empid=$d->emp_id;
                                                
                                                // $jobcateid=$d->jobcate_id;
                                                $permissiontype=$this->commonModel->fs('permission_type',array('id'=>$permission_type_id));
                                                
                                                // $functionalareaid=$d->function_area_id;
                                                $roleAssign=$this->commonModel->fs('roleAssign',array('id'=>$roleAssign));
                                                
                                                $vendor=$this->commonModel->fs('vendor',array('id'=>$empid));
                                        ?>
                                        <tr>
                                            <td><? echo $sr ?></td> 
                                            <!--<td><?= esc($vendor->name) ?></td>-->
                                            <td><?= esc($permissiontype->permission_name) ?></td>
                                            <td><?= esc($permissiontype->permission_for) ?></td>
                                            <!--<td><?= esc($roleAssign->name) ?></td>-->
                                            
                                           
                                            
                                        </tr>
                                        <?
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
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