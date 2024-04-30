<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
$feedback='';

?>

<head>
    <title>All Jobs | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">All <?= esc($datasjobs->company_name) ?> Jobs </h4>
                        </div>
                    </div>
                    <div class="col-4 d-none">
                        <div style="text-align: right;">
                            <a href="<?php echo base_url('company/addjobs') ?>" class="btn btn-primary waves-effect waves-light" >Add New</a>
                        </div>
                    </div>
                    
                </div>
                <!-- end page title -->

                <div class="row">
                    <form class="row gy-2 gx-3 align-items-center " action="<?= base_url('superadmin/filter-job-list') ?>" method="post">
                        <div class="col-sm-auto">
                            <label>Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start date">
                        </div>
                        <input type="hidden" class="form-control" name="company_id" value="<?php echo $joblistcount[0]->company_id ?>">
                        <div class="col-sm-auto">
                            <label>End Date</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" placeholder="End date">
                        </div>
                       
                        <div class="col-sm-auto">
                           <button type="submit" class="btn btn-primary w-md" style="margin-top: 25px;">Filter</button>
                        </div>
                        <!--<button type="submit">Filter</button>-->
                    </form>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if(!empty($feedback)) {echo $feedback;} ?>
                                <div class="table-responsive">
                                <table id="datatable1-buttons" class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Create Date</th>
                                            <th>Company Name</th>
                                            <th>Job Title</th>
                                            <!--<th>Career level</th>-->
                                            <!--<th>Jobs Type</th>-->
                                            <!--<th>Gender</th>-->
                                            <th>City</th>
                                            <!--<th>Education</th>-->
                                            <th>Vacancies</th>
                                            <th>Applied Count</th>
                                            <th>Expire Date</th>
                                            <th>Admin Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($joblistcount as $list)
                                            {
                                                $sr++;
                                                $id=$list->id;
                                                
                                                $appliedcount=$this->commonModel->allCount('job_applicants',array('job_id'=>$id));
                                                $salary=$list->salary_from.'-'.$list->salary_to.' '.$list->salary_currency;
                                                
                                                $jobtypeid=$list->job_type_id;
                                                $jobtype=$this->commonModel->fs('job_attributes_job_types',array('id'=>$jobtypeid));
                                                
                                                $cityid=$list->city_id;
                                                $city=$this->commonModel->fs('location_cities',array('id'=>$cityid));
                                                
                                                $degreeid=$list->degree_level_id;
                                                $degree=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$degreeid));
                                                
                                                $companyid=$list->company_id;
                                                $company=$this->commonModel->fs('companies',array('id'=>$companyid));
                                                
                                                $jobcount=$this->commonModel->allCount('jobs_list',array('company_id'=>$companyid));
                                                $jobcount1=$this->commonModel->allCount('jobs_list',array('vendorID'=>$vendorid));
                                                
                                                $vendorid=$list->vendorID;
                                                $vendor=$this->commonModel->fs('vendor',array('id'=>$vendorid));
                                                
                                                $careerlevelid=$list->career_level_id;
                                                $careerlevelidlist=$this->commonModel->fs('job_attributes_career_levels',array('id'=>$careerlevelid));
                                                
                                                $genderid=$list->gender_id;
                                                $genderidlist=$this->commonModel->fs('job_attributes_genders',array('id'=>$genderid));
                                                
                                                $salaryperiodid=$list->salary_period_id;
                                                $salaryperiodidlist=$this->commonModel->fs('job_attributes_salary_periods',array('id'=>$salaryperiodid));
                                                
                                                $jobexperienceid=$list->job_experience_id;
                                                $jobexperienceidlist=$this->commonModel->fs('job_attributes_job_experiences',array('id'=>$jobexperienceid));
                                                
                                                $degreetypeid=$list->degree_type_id;
                                                $degreetypeidlist=$this->commonModel->fs('job_attributes_degree_types',array('id'=>$degreetypeid));
                                                
                                                $careerlevelid=$list->career_level_id;
                                                $careerlevelidlist=$this->commonModel->fs('job_attributes_career_levels',array('id'=>$careerlevelid));
                                                
                                                $functionalareaid=$list->functional_area_id;
                                                $functionalareaidlist=$this->commonModel->fs('function_area',array('id'=>$functionalareaid));
                                                // $functionalareaidlist=$this->commonModel->fs('job_attributes_functional_areas',array('id'=>$functionalareaid));
                                                
                                                $vacancyid=$list->vacancy_type;
                                                $vacancyidlist=$this->commonModel->fs('vacancy_type',array('id'=>$vacancyid));
                                                
                                                $currentdate = date('Y-m-d');
                                                $todaydate= date('Y-m-d',strtotime($list->created_at));
                                                
                                        ?>
                                        <tr>
                                            <?php 
                                            if($todaydate==$currentdate){
                                            ?>
                                            <td style="background: #3a00add1;color: #fff;">
                                                <?php echo date('d M, Y h:i A', strtotime($list->created_at))  ?>
                                            </td>
                                            <?php } else { ?>
                                            <td>
                                                <?php echo date('d M, Y h:i A', strtotime($list->created_at)) ?>
                                            </td>
                                            <?php } ?>
                                            <td>
                                                <?php
                                                if($list->company_id==0){
                                                ?>
                                                <?= esc($vendor->name) ?>
                                                <?php } else { ?>
                                                <?= esc($company->company_name) ?>
                                                <?php } ?>
                                            </td>
                                            <td><?= esc($list->title) ?></td>
                                            <!--<td><?= esc($careerlevelidlist->name) ?></td>-->
                                            <!--<td><?= esc($jobtype->name) ?></td>-->
                                            <!--<td><?= esc($genderidlist->name) ?></td>-->
                                            <td><?= esc($city->name) ?></td>
                                            <!--<td><?= esc($degree->name) ?></td>-->
                                            <td><span class="btn btn-outline-dark"><?= esc($list->vacancies) ?></span></td>
                                            <td>
                                                <a href="<?php echo base_url('superadmin/applied-jobs-count/'.$id) ?>"><span class="btn btn-primary"><?php echo $appliedcount ?></span></a>
                                            </td>
                                            <td>
                                                <?php 
                                                if($currentdate < $list->expiry_date) {
                                                ?>
                                                <?php echo date('d M Y',strtotime($list->expiry_date)) ?>
                                                <?php } else { ?>
                                                
                                                <span class="badge badge-pill badge-soft-danger font-size-12"><?php echo date('d M Y',strtotime($list->expiry_date)) ?></span>
                                                <?php } ?>
                                            </td>
                                            
                                            <td>
                                                <?php 
                                                if($list->is_active==1){
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
                                                <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="<?php echo base_url('superadmin/edit-jobs/'.$id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } elseif((in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="<?php echo base_url('superadmin/edit-jobs/'.$id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } else{ }
                                                ?>
                                               <!--<a href="javascript:void()" onclick="openDeleteModal(<?= esc($id) ?>)" class="w-20 btn btn-sm btn-danger"><i class="bx bx-trash"></i></a> -->
                                               <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="<?php echo base_url('superadmin/view-jobs/'.$id) ?>" class="btn btn-sm btn-dark w-20"><i class="bx bx-show"></i></a>
                                               <?php } elseif((in_array(28, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="<?php echo base_url('superadmin/view-jobs/'.$id) ?>" class="btn btn-sm btn-dark w-20"><i class="bx bx-show"></i></a>
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

               

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        
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