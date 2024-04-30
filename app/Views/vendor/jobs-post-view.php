<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
$feedback='';

?>

<head>
    <title>All Jobs Applicant | Pay Job India</title>
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
                <div class="row ">
                    <div class="col-8">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">All Jobs Applicant</h4>
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
                                <table class="table align-middle table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="align-middle">Applied Date</th>
                                                        <th class="align-middle">Applied For Job</th>
                                                        <th class="align-middle">Candidate Name</th>
                                                        <th class="align-middle">Experience</th>
                                                        <th class="align-middle">Location</th>
                                                        <th class="align-middle">Functional Area</th>
                                                        <th class="align-middle">Career level</th>
                                                        <th class="align-middle">Status</th>
                                                        <th class="align-middle">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                   $sr=0;
                                                    foreach($todayjobs as $d)
                                                    {
                                                        $sr++;
                                                        $id=$d->id;
                                                        $activeid=$d->active_status;
                                                        $job_id=$d->job_id;
                                                        $user_id=$d->user_id;
                                                        
                                                        $joblist=$this->commonModel->fs('jobs_list',array('id'=>$job_id));
                                                        
                                                        $userlist=$this->commonModel->fs('users',array('id'=>$user_id));
                                                        
                                                        // print_r($userlist);exit;
                                                        
                                                        $gender=$userlist->gender_id;
        				                                $genderlist=$this->commonModel->fs('job_attributes_genders',array('id'=>$gender));
        				                                
        				                                $country=$userlist->country_id;
        				                                $countrylist=$this->commonModel->fs('location_countries',array('id'=>$country));
        				                                
        				                                $state=$userlist->state;
        				                                $statelist=$this->commonModel->fs('location_states',array('id'=>$state,'country_id'=>$country));
        				                                
        				                                $city=$userlist->city;
        				                                $citylist=$this->commonModel->fs('location_cities',array('id'=>$city));
        				                                
        				                                $degree=$userlist->education;
        				                                $edulevel=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$degree));
        				                                
        				                                $type=$joblist->degree_type_id;
        				                                $degtype=$this->commonModel->fs('job_attributes_degree_types',array('id'=>$type));
        				                                
        				                                $areafun=$joblist->functional_area_id;
        				                                $functionalareaid=$this->commonModel->fs('function_area',array('id'=>$areafun));
        				                                
        				                                $exp=$userlist->experience;
        				                                $exper=$this->commonModel->fs('job_attributes_job_experiences',array('id'=>$exp));
        				                                
        				                                $careerlevel=$joblist->career_level_id;
        				                                $career_level_id=$this->commonModel->fs('job_attributes_career_levels',array('id'=>$careerlevel));
                                                        ?>
                                                    <tr>
                                                        <td><?= esc($d->created_at) ?></td>
                                                        <td><?= esc($joblist->title) ?></td>
                                                        <td><a href="javascript: void(0);" class="text-body fw-bold"><?= esc($userlist->name) ?></a> </td>
                                                        <td>
                                                            <?= esc($exper->name) ?>
                                                        </td>
                                                        <td>
                                                            <?= esc($citylist->name) ?>
                                                        </td>
                                                        <td>
                                                            <?= esc($functionalareaid->name) ?>
                                                        </td>
                                                        
                                                        <td>
                                                            <?= esc($career_level_id->name) ?>
                                                        </td>
                                                        
                                                        
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
                                                        <td>
                                                            <button class="status <?php echo $ststus ?> "><?= esc($d->active_status) ?></button>
                                                        </td>
                                                        <td>
                                                            <!--<a href="edit-company-job-applicant/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>-->
                                                            <a href="javascript:void()" onclick="openDeleteModal('<?= esc($id) ?>','<?= esc($activeid) ?>')" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                                        
                                                            <a href="<?php echo base_url('vendor/view-candidate-job-applicant/'.$id) ?>" class="btn btn-sm btn-primary w-20">View</a>
                                                        </td>
                                                        <td class="d-none">
                                                            <?php if ($d->active_status == 0): ?>
                                                                <a href="<?= base_url("/vendor/change-status-jobss/$id/1") ?>"
                                                                    class="btn btn-sm btn-danger"> Reject </a>
                                                            <?php endif; ?>
                                                            <?php if ($d->active_status == 1): ?>
                                                                <a href="<?= base_url("/vendor/change-status-jobss/$id/0") ?>"
                                                                    class="btn btn-sm btn-success"> Shortlist </a>
                                                            <?php endif; ?>
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

               

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        
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
            				<form method="POST" action="<?= base_url('/company/edit-company-job-applicant'); ?>" class="needs-validation" novalidate>
            				    <input type="hidden" name="deleteId" id="deleteId">
            				    <div class="form-group mb-3">
                                    <input type="hidden" name="id" value="<?php echo $datajobapplicant->id ?>">
                                    <select name="active_status" id="active_status" class="form-select">
                                    <option selected>Choose  ...</option>
                                         <option value="Shortlist">Shortlist</option>
                                         <option value="Selected">Selected</option>
                                         <option value="Rejected">Rejected</option>
                                         <option value="Hold">Hold</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Message</label>
                                    <textarea type="text" class="form-control" name="description"></textarea>
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
         

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Required datatable js -->
<?php include 'layouts/footerjs.php' ?>



<script>
    function openDeleteModal(id,activeid)
    {
        var deleteId=document.getElementById('deleteId');
        var activeid=document.getElementById('activeid');
        deleteId.value=id;
        // activeid.value=activeid;
        $('#deleteModal').modal('show');
    }

</script>

</body>

</html>