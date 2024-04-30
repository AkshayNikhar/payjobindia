<?php 
include 'layouts/head-main.php';
$feedback='';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
?>

<head>
    <title>City  | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">All <?php echo $datastate->name ?> City</h4>
                            
                        </div>
                    </div>
                    <?php 
                    if($assignRole == 0 && $assignid == 1) { 
                    ?>
                    <div class="col-4">
                        <div style="text-align: right;">
                            <!--<a href="#" class="btn btn-primary waves-effect waves-light" >Add New</a>-->
                            <a href="<?= base_url('superadmin/add-city')?>" class="btn btn-primary waves-effect waves-light" >Add New</a>
                        </div>
                    </div>
                    <?php } elseif((in_array(33, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                     <div class="col-4">
                        <div style="text-align: right;">
                            <!--<a href="#" class="btn btn-primary waves-effect waves-light" >Add New</a>-->
                            <a href="<?= base_url('superadmin/add-city')?>" class="btn btn-primary waves-effect waves-light" >Add New</a>
                        </div>
                    </div>
                    <?php } else{ }
                    ?>
                    
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if(!empty($feedback)) {echo $feedback;} ?>
                                <div class="table-responsive">
                                
                                <table id="datatable1-buttons" class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Sr No</th>
                                            <!--<th>Country</th>-->
                                            <!--<th>State</th>-->
                                            <th>City Name</th>
                                            <th>City Company</th>
                                            <th>City Jobs</th>
                                            <th>Date</th>
                                            <th>Admin Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($datacity as $d)
                                            {
                                                $sr++;
                                                $id=$d->id;
                                                $state_id=$d->state_id;
                                                $state=$this->commonModel->fs('location_states',array('id'=>$state_id));
                                                
                                                $country_id=$state->country_id;
                                                $country=$this->commonModel->fs('location_countries',array('id'=>$country_id));
                                                
                                                $citywisecompany=$this->commonModel->allCount('companies',array('city_id'=>$id));
                                                
                                                // $citywisecompany=$this->commonModel->allCount('companies',array('city_id'=>$id));
                                                
                                                $citywisejob=$this->commonModel->allCount('jobs_list',array('city_id'=>$id));
                                                // print_r($citywisecompany);
                                                
                                        ?>
                                        <tr>
                                            <td><? echo $sr ?></td> 
                                            <!--<td><?= esc($country->name) ?></td>-->
                                            <!--<td><?= esc($state->name) ?></td>-->
                                            <td><?= esc($d->name) ?>  </td>
                                            <!--<td><a href="city-wise-company/<!?= esc($id) ?>"><!?= esc($d->name) ?> <span class="btn btn-primary"><?php echo $citywisecompany ?></span> </a> </td>-->
                                            <td>
                                                <?php
                                                if($citywisecompany==0){
                                                
                                                ?>
                                                <a href="<?php echo base_url('superadmin/city-wise-company/'.$id) ?>"><span class="btn btn-outline-dark"><?php echo $citywisecompany ?></span> </a>
                                                <?php } else { ?>
                                                <a href="<?php echo base_url('superadmin/city-wise-company/'.$id) ?>"><span class="btn btn-primary" style="background: #737276d1;color: #fff;"><?php echo $citywisecompany ?></span> </a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php
                                                if($citywisejob==0){
                                                
                                                ?>
                                                <a href="<?php echo base_url('superadmin/city-wise-jobs/'.$id) ?>">
                                                <span class="btn btn-outline-dark"><?php echo $citywisejob ?></span>
                                                </a>
                                                <?php } else { ?>
                                                <a href="<?php echo base_url('superadmin/city-wise-jobs/'.$id) ?>">
                                                <span class="btn btn-primary"><?php echo $citywisejob ?></span>
                                                </a>
                                                <?php } ?>
                                                
                                            </td>  
                                            <td><?php echo date('d M Y',strtotime($d->created_at)) ?> </td>
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
                                               <a href="<?php echo base_url('superadmin/edit-city/'.$id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <!--<a href="edit-city/<!?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>-->
                                               <?php } elseif((in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="edit-city/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } else{ }
                                                ?>
                                               <!--<a href="view-scheme/<?= esc($slug) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>-->
                                               <!--<a href="#" class="w-20 btn btn-sm btn-danger"><i class="bx bx-trash"></i></a> -->
                                               <!--<a href="javascript:void()" onclick="openDeleteModal(<?= esc($id) ?>)" class="w-20 btn btn-sm btn-danger"><i class="bx bx-trash"></i></a> -->
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
                    </div> <!-- end col -->
                </div> <!-- end row -->

               <!--Delete Modal-->
			<div id="deleteModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title" id="myModalLabel">Delete City</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            			</div>
            			<div class="modal-body">
            			    <h5>Are you sure you want to Delete this City?</h5>
            				<form method="POST" action="delete-city" class="needs-validation" novalidate>
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

</body>

</html>