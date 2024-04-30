<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
$feedback='';
?>

<head>
    <title>Applied Job  | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">All Applied Job</h4>
                            
                        </div>
                    </div>
                    <div class="col-4 d-none">
                        <div style="text-align: right;">
                            <a href="#" class="btn btn-primary waves-effect waves-light" >Add New</a>
                            <!--<a href="<?= base_url('superadmin/add-country')?>" class="btn btn-primary waves-effect waves-light" >Add New</a>-->
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
                                            <th>Date</th>
                                            <th>Company</th>
                                            <th>Job Title</th>
                                            <th>UserName</th>
                                            <th>User Email</th>
                                            <th>User Phone</th>
                                            <th>Education</th>
                                            <th>Degree</th>
                                            <th>Company Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($joblistcount as $d)
                                            {
                                                $sr++;
                                                $id=$d->id;
                                                $user_id=$d->user_id;
                                                $job_id=$d->job_id;
                                                $companys_id=$d->company_id;
                                                
                                                $appovedid=$d->appoved;
                                                
                                                $joblist=$this->commonModel->fs('jobs_list',array('id'=>$job_id));
                                                $companyid=$joblist->company_id;
				                                $companylist=$this->commonModel->fs('companies',array('id'=>$companyid));
				                                $userlist=$this->commonModel->fs('users',array('id'=>$user_id));
				                                $education=$userlist->education;
				                                $education=$userlist->education;
				                                $degree=$userlist->degree_type_id;
				                                $educationlist=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$education));
				                                $degreelist=$this->commonModel->fs('job_attributes_degree_types',array('id'=>$degree));
				                                
				                               
				                        ?>
                                        <tr>
                                            <td><? echo $sr ?></td> 
                                            <td><?php echo date('d M Y',strtotime($d->created_at)) ?></td>
                                            <td><?= esc($companylist->company_name) ?></td>
                                            <td><?= esc($joblist->title) ?></td>
                                            <td><?= esc($userlist->name) ?></td>
                                            <td><?= esc($userlist->email) ?></td>
                                            <td><?= esc($userlist->mobile) ?></td>
                                            <td><?= esc($educationlist->name) ?></td>
                                            <td><?= esc($degreelist->name) ?></td>
                                            <!--<td><!?php echo date('d M Y',strtotime($joblist->expiry_date)) ?> </td>-->
                                            
                                            <?php
                                            if($d->active_status=='Shortlist'){
                                            	$ststus='btn-success';
                                            	
                                            }
                                            else if($d->active_status=='Selected'){
                                            	$ststus='btn-info';
                                            	
                                            }
                                            else if($d->active_status=='Rejected'){
                                            	$ststus='btn-danger';
                                            }
                                            else if($d->active_status=='Hold'){
                                            	$ststus='btn-warning';
                                            }else{
                                            	$ststus='btn-dark';
                                            }
                                            ?>
                                            <td class="">
                                            	<button class="status <?php echo $ststus ?> "><?= esc($d->active_status) ?></button>
                                            </td>
                                            
                                            <td class="">
                                                <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="javascript:void()" onclick="openDeleteModal('<?= esc($id) ?>','<?= esc($appovedid) ?>')" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } elseif((in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="javascript:void()" onclick="openDeleteModal('<?= esc($id) ?>','<?= esc($appovedid) ?>')" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } else{ }
                                                ?>
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
            				<h5 class="modal-title" id="myModalLabel">Update Status</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            			</div>
            			<div class="modal-body">
            			    <!--<h5>Are you sure you want to Delete this Education?</h5>-->
            				<form method="POST" action="<?= base_url('/superadmin/edit-company-job-applicant_approved'); ?>" class="needs-validation" novalidate>
            				    
            				    <div class="form-group mb-3">
                                    <input type="hidden" name="deleteId" id="deleteId">
                                    <select name="appovedid" id="appovedid" class="form-select">
                                    <option selected>Choose  ...</option>
                                         <option value="Approved">Approved</option>
                                         <option value="Rejected">Rejected</option>
                                         <option value="Hold">Hold</option>
                                    </select>
                                </div>
                                
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
    function openDeleteModal(id,appovedid)
    {
        var deleteId=document.getElementById('deleteId');
        var appovedid=document.getElementById('appovedid');
        // alert(deleteId);
        deleteId.value=id;
        // activeid.value=activeid;
        $('#deleteModal').modal('show');
    }

</script>

</body>

</html>