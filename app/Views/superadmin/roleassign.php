<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
?>

<head>
    <title>RoleAssign | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">All RoleAssign</h4>
                            
                        </div>
                    </div>
                    <div class="col-4">
                        <div style="text-align: right;">
                            <a href="<?= base_url('superadmin/add-roleassign')?>" class="btn btn-primary waves-effect waves-light" >Add New</a>
                        </div>
                    </div>
                    
                </div>
                <!-- end page title -->

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
                                            <th>Job Category</th>
                                            <th>Role Name</th>
                                            <!--<th>Permission</th>-->
                                            <th>Date</th>
                                            <th>Admin Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($roleassign as $d)
                                            {
                                                $sr++;
                                                $id=$d->id;
                                                // $jobcatid=$d->jobcate_id;
                                                $jobcat_ids = explode(',', $d->jobcate_id);
                                                $jobcate=$this->commonModel->fs('job_category',array('id'=>$jobcatids));
                                                
                                                // $jobcate11=$this->commonModel->fs('permissions_emp',array('role_id'=>$jobcatid));
                                                // $empid=$jobcate11->permission_type_id;
                                                
                                                
                                        ?>
                                        <tr>
                                            <td><? echo $sr ?></td> 
                                            <td>
                <?php
                // Loop through each job category ID and fetch corresponding job category
                foreach ($jobcat_ids as $jobcatid) {
                    $jobcate = $this->commonModel->fs('job_category', array('id' => $jobcatid));
                    
                    echo esc($jobcate->name) . ' <br> ';
                }
                ?>
            </td>
                                            <!--<td><?= esc($jobcate110->permission_name) ?></td>-->
                                            <td><?= esc($d->name) ?></td>
                                            
                                            <td><?php echo date('d M Y',strtotime($d->created)) ?> </td>
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
                                                <a href="view-permission/<?= esc($id) ?>" class="btn btn-sm btn-dark w-20"><i class="bx bx-show"></i></a>
                                                <a href="edit-roleassign/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-edit"></i></a>
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
            				<h5 class="modal-title" id="myModalLabel">Delete Crop</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            			</div>
            			<div class="modal-body">
            			    <h5>Are you sure you want to Delete this Crop?</h5>
            				<form method="POST" action="delete-crop" class="needs-validation" novalidate>
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