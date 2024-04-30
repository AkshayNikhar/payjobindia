<?php 
include 'layouts/head-main.php';
?>

<head>
    <title>Companies | Pay Job India</title>
    <?php include 'layouts/head.php'; ?>

    <?php include 'layouts/head-style.php'; ?>
    <style>
        tr{
    vertical-align: middle;
    }
    </style>
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
                <div class="row ">
                    <div class="col-8">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">All Companies</h4>
                            
                        </div>
                    </div>
                    <div class="col-4 d-none">
                        <div style="text-align: right;">
                            <a href="#" class="btn btn-primary waves-effect waves-light" >Add New</a>
                            <!--<a href="<?= base_url('superadmin/add-company')?>" class="btn btn-primary waves-effect waves-light" >Add New</a>-->
                        </div>
                    </div>
                    
                </div>
                <!-- end page title -->
<!--td class="d-none">
    <?php 
    if(empty($d->logo)){
    ?>
    <img src="https://placehold.jp/80x80.png" class="img-fluid">
    <?php } else{ ?>
    <img src="<?= base_url('back/assets/images/company_logo/'.$d->logo) ?>" class="img-fluid" width="80px">
    <?php } ?>
</td-->
                <div class="row">
                    
                    <form class="row gy-2 gx-3 align-items-center mb-4" action="<?= base_url('superadmin/filter-companies') ?>" method="post">
                        
                        <div class="col-sm-auto">
                            <label>Company Name</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name">
                        </div>
                        <div class="col-sm-auto">
                            <label>State</label>
                            <select name="state_id" id="state_id" class="form-select">
                                <option value="" >Select States ...</option>
                                <?php
                                    foreach($state as $states)
    							    {
                                    echo '<option value="'.$states->id.'">'.$states->name.'</option>';
    							    }
    						    ?>
                            </select>
                        </div>
                        <div class="col-sm-auto">
                            <label>City</label>
                            <select name="city_id" id="city_id" class="form-select ">
                                <option value="">Select City ...</option>
                                <?php
                                    foreach($city as $citys)
    							    {
                                    echo '<option value="'.$citys->id.'">'.$citys->name.'</option>';
    							    }
    						    ?>
                            </select>
                        </div>
                        <div class="col-sm-auto">
                            <label>Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start date">
                        </div>
                        <div class="col-sm-auto">
                            <label>End Date</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" placeholder="End date">
                        </div>
                        <!-- Input fields for start_date and end_date -->
                        <!--<input type="date" name="start_date" id="start_date" >-->
                        <!--<input type="date" name="end_date" id="end_date" >-->
                        <!-- Submit button -->
                        <div class="col-sm-auto">
                           <button type="submit" class="btn btn-primary w-md" style="margin-top: 25px;">Filter</button>
                        </div>
                        <!--<button type="submit">Filter</button>-->
                    </form>
                    
                    
                    <div class="col-xl-12 d-none">
                                        <div class="mt-4">
                                            

                                            <div class="accordion" id="accordionExample">
                                                <?php
                                                $outerSr = 0;
                                                foreach ($company as $d) {
                                                    $outerSr++;
                                                    $todaydate = date('d M Y', strtotime($d->distinct_date));
                                                    $outerSruniqueId = 'collapse_' . $outerSr;
                                                ?>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="heading<?php echo $outerSr; ?>">
                                                            <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $outerSruniqueId; ?>" aria-expanded="true" aria-controls="<?php echo $outerSruniqueId; ?>">
                                                                <?php echo $todaydate; ?>
                                                            </button>
                                                        </h2>
                                                        <div id="<?php echo $outerSruniqueId; ?>" class="accordion-collapse collapse <?php echo ($outerSr == 1) ? 'show' : ''; ?>" aria-labelledby="heading<?php echo $outerSr; ?>" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body">
                                                                <div class="text-muted">
                                                                    
                                                                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if(!empty($feedback)) {echo $feedback;} ?>
                                <div class="table-responsive">
                                <table id="datatable1-button" class="mytablee table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Create Date</th>
                                            <!--<th>Logo</th>-->
                                            <th>Type</th>
                                            <th>Company Name</th>
                                            <th>Company Email</th>
                                            <th>Company Contact No.</th>
                                           
                                            <th>Admin Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                        //   echo $currentDate = date('Y-m-d H:i:s');
                                             $companyss=$this->commonModel->allFetchd('companies',array('DATE(created_at)'=>$d->distinct_date));
                                            foreach($companyss as $d)
                                            {
                                                $sr++;
                                                $id=$d->id;
                                                $vendorid=$d->vendorID;
                                                
                                                $currentYear = date('Y-m-d');
                                                $todaydate= date('Y-m-d',strtotime($d->created_at));
                                                
                                                if($todaydate==$currentYear){ 
                                        ?>
                                        <tr style="background: #3a00add1;color: #fff;">
                                            <td><? echo $sr ?></td> 
                                            <td><?php echo date('d M Y h:i A',strtotime($d->created_at)) ?> </td>
                                            <td>
                                                
                                                <?php 
                                                if($d->vendorID==0){
                                                ?>
                                                <span style="color: #f00;font-size: 15px;font-weight: 600;">Employer</span>
                                                <?php } else{ ?>
                                                <a href="total-vendor-company-jobs/<?= esc($vendorid) ?>" style="font-size: 15px;font-weight: 600;">Member</a>
                                                <?php } ?>
                                            </td>
                                            <td><?= esc($d->company_name) ?></td>
                                            <td><?= esc($d->company_email) ?></td>
                                            <td><?= esc($d->phone) ?></td>
                                            
                                            <td>
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
                                            <td>
                                               <!--<a href="#" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>-->
                                               <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="edit-company/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } elseif((in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="edit-company/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } else{ }
                                                ?>
                                                <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="view-company/<?= esc($id) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>
                                               <?php } elseif((in_array(28, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="view-company/<?= esc($id) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>
                                               <?php } else{ }
                                                ?>
                                               <a href="total-company-jobs/<?= esc($id) ?>" class="w-20 btn btn-sm btn-dark">All Jobs</a> 
                                               
                                            </td>
                                        </tr>
                                        <?
                                        }
                                             else{  
                                        ?>
                                         <tr class="">
                                            <td><? echo $sr ?></td> 
                                            <td><?php echo date('d M Y h:i A',strtotime($d->created_at)) ?> </td>
                                            <td>
                                                <?php 
                                                if($d->vendorID==0){
                                                ?>
                                                <span style="color: #f00;font-size: 15px;font-weight: 600;">Employer</span>
                                                <?php } else{ ?>
                                                <a href="total-vendor-company-jobs/<?= esc($vendorid) ?>" style="font-size: 15px;font-weight: 600;">Member</a>
                                                <?php } ?>
                                            </td>
                                            <td><?= esc($d->company_name) ?></td>
                                            <td><?= esc($d->company_email) ?></td>
                                            <td><?= esc($d->phone) ?></td>
                                            
                                            <td>
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
                                            <td>
                                               <!--<a href="#" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>-->
                                               <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="edit-company/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } elseif((in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="edit-company/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } else{ }
                                                ?>
                                                <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="view-company/<?= esc($id) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>
                                               <?php } elseif((in_array(28, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="view-company/<?= esc($id) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>
                                               <?php } else{ }
                                                ?>
                                               <a href="total-company-jobs/<?= esc($id) ?>" class="w-20 btn btn-sm btn-dark">All Jobs</a> 
                                               
                                            </td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                    </div>
                    
                    
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <?php if(!empty($feedback)) {echo $feedback;} ?>
                                <div class="table-responsive">
                                <table id="datatable1-buttons" class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Create Date</th>
                                            <!--<th>Logo</th>-->
                                            <th>Type</th>
                                            <th>Company Name</th>
                                            <th>Company Email</th>
                                            <th>Company Contact No.</th>
                                            <th>Admin Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                        //   echo $currentDate = date('Y-m-d H:i:s');
                                             
                                            foreach($company as $d)
                                            {
                                                $sr++;
                                                $id=$d->id;
                                                $vendorid=$d->vendorID;
                                                
                                                $currentYear = date('Y-m-d');
                                                $todaydate= date('Y-m-d',strtotime($d->created_at));
                                                
                                                if($todaydate==$currentYear){ 
                                        ?>
                                        
                                        <tr style="background: #737276d1;color: #fff;">
                                            <td><? echo $sr ?></td> 
                                            <td><?php echo date('d M Y',strtotime($d->created_at)) ?> </td>
                                            <td class="">
                                                
                                                <?php 
                                                if($d->vendorID==0){
                                                ?>
                                                <span style="color: #f00;font-size: 15px;font-weight: 600;">Employer</span>
                                                <?php } else{ ?>
                                                <a href="total-vendor-company-jobs/<?= esc($vendorid) ?>" style="color: #556ee6;font-size: 15px;font-weight: 600;">Member</a>
                                                <?php } ?>
                                            </td>
                                            <td><?= esc($d->company_name) ?></td>
                                            <td><?= esc($d->company_email) ?></td>
                                            <td><?= esc($d->phone) ?></td>
                                            
                                            <td>
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
                                            <td>
                                               <!--<a href="#" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>-->
                                               <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="edit-company/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } elseif((in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="edit-company/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } else{ }
                                                ?>
                                                <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="view-company/<?= esc($id) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>
                                               <?php } elseif((in_array(28, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="view-company/<?= esc($id) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>
                                               <?php } else{ }
                                                ?>
                                               <a href="total-company-jobs/<?= esc($id) ?>" class="w-20 btn btn-sm btn-dark">All Jobs</a> 
                                               
                                            </td>
                                        </tr>
                                        <?
                                        }
                                             else{  
                                        ?>
                                         <tr>
                                            <td><? echo $sr ?></td> 
                                            <td><?php echo date('d M Y',strtotime($d->created_at)) ?> </td>
                                            <td class="">
                                                <?php 
                                                if($d->vendorID==0){
                                                ?>
                                                <span style="color: #f00;font-size: 15px;font-weight: 600;">Employer</span>
                                                <?php } else{ ?>
                                                <a href="total-vendor-company-jobs/<?= esc($vendorid) ?>" style="color: #556ee6;font-size: 15px;font-weight: 600;">Member</a>
                                                <?php } ?>
                                            </td>
                                            <td><?= esc($d->company_name) ?></td>
                                            <td><?= esc($d->company_email) ?></td>
                                            <td><?= esc($d->phone) ?></td>
                                            
                                            <td>
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
                                            <td>
                                               <!--<a href="#" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>-->
                                               <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="edit-company/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } elseif((in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="edit-company/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } else{ }
                                                ?>
                                                <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="view-company/<?= esc($id) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>
                                               <?php } elseif((in_array(28, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="view-company/<?= esc($id) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>
                                               <?php } else{ }
                                                ?>
                                               <a href="total-company-jobs/<?= esc($id) ?>" class="w-20 btn btn-sm btn-dark">All Jobs</a> 
                                               
                                            </td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

               <!--Delete Modal-->
			<div id="deleteModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title" id="myModalLabel">Delete Company</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            			</div>
            			<div class="modal-body">
            			    <h5>Are you sure you want to Delete this Company?</h5>
            				<form method="POST" action="delete-company" class="needs-validation" novalidate>
            				    <input type="hidden" name="deleteId" id="deleteId">
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Yes">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                </div>
            				</form>
            			</div>
            		</div>
            	</div>
            </div>
            <!-- End Delete Modal -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        
         

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Required datatable js -->
<?php include 'layouts/footerjs.php' ?>



<script>
    function openDeleteModal(id)
    {
        var deleteId=document.getElementById('deleteId');
        deleteId.value=id;
        $('#deleteModal').modal('show');
    }
</script>

<script>
    $(document).ready(function() {
    $('.mytablee').DataTable( {
        dom: 'Bfrtip',
        // buttons: [
        //     'excel', 'pdf'
        // ],
         lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength','excel', 'pdf'
        ]
    } );
} );
</script>

</body>

</html>