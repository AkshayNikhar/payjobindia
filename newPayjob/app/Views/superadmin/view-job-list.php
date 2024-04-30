<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
$feedback='';
?>

<head>
    <title>View Applied Job  | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">View Applied Job</h4>
                            
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
                                            <th>Applied Date</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Address</th>
                                            <th>Degree Level</th>
                                            <th>Degree Type</th>
                                            <th>Functional Area</th>
                                            <th>Experience</th>
                                            <th>Resume</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($jobslistss as $d)
                                            {
                                                $sr++;
                                                $id=$d->id;
                                                $user_id=$d->user_id;
                                                $job_id=$d->job_id;
                                                
                                                $joblist=$this->commonModel->fs('jobs_list',array('id'=>$job_id));
                                                
                                                
                                                $companyid=$joblist->company_id;
				                                $companylist=$this->commonModel->fs('companies',array('id'=>$companyid));
				                                
				                                $userlist=$this->commonModel->fs('users',array('id'=>$user_id));
				                                
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
				                                $functionalareaid=$this->commonModel->fs('job_attributes_functional_areas',array('id'=>$areafun));
				                                
				                                $exp=$userlist->experience;
				                                $exper=$this->commonModel->fs('job_attributes_job_experiences',array('id'=>$exp));
				                                
                                        ?>
                                        <tr>
                                            <td><? echo $sr ?></td> 
                                            <td><?= esc($d->created_at) ?></td>
                                            <td><?= esc($userlist->name) ?></td>
                                            <td><?= esc($genderlist->name) ?></td>
                                            <td><?= esc($userlist->email) ?></td>
                                            <td><?= esc($userlist->mobile) ?></td>
                                            <td><?= esc($countrylist->name) ?></td>
                                            <td><?= esc($statelist->name) ?></td>
                                            <td><?= esc($citylist->name) ?></td>
                                            <td><?= esc($userlist->address) ?></td>
                                            <td><?= esc($edulevel->name) ?></td>
                                            <td><?= esc($degtype->name) ?></td>
                                            <td><?= esc($functionalareaid->name) ?></td>
                                            <td><?= esc($exper->name) ?></td>
                                           
                                            <td>
                                               <a href="view-job-list/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20">View</a>
                                               <!--<a href="edit-country/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>-->
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
            				<h5 class="modal-title" id="myModalLabel">Delete Country</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            			</div>
            			<div class="modal-body">
            			    <h5>Are you sure you want to Delete this Country?</h5>
            				<form method="POST" action="delete-country" class="needs-validation" novalidate>
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