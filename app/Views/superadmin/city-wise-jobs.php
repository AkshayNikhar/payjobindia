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
                            <h4 class="mb-sm-0 font-size-18">All <?= esc($datascity->name) ?> Jobs </h4>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if(!empty($feedback)) {echo $feedback;} ?>
                                <div class="table-responsive">
                                <table id="datatable" class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            
                                            <!--<th>Type</th>-->
                                            <th>Create Date</th>
                                            <th>Company Name</th>
                                            <th>Type</th>
                                            <th>Designation</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <!--<th>Career level</th>-->
                                            <!--<th>Jobs Type</th> -->
                                            <!--<th>Gender</th>-->
                                            <th>Area</th>
                                            <!--<th>Pincode</th>-->
                                            <!--<th>Education</th>-->
                                            <!--<th>Vacancies</th>-->
                                           
                                            <th>No. of Post Jobs</th>
                                             <th>Applied Jobs</th>
                                            <th>Expiry Date</th>
                                            <th>Admin Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($datajob as $list)
                                            {
                                                $sr++;
                                                $id=$list->id;
                                                // $company_id=$list->company_id;
                                                
                                                $vendorid=$list->vendorID;
                                                $vendor=$this->commonModel->fs('vendor',array('id'=>$vendorid));
                                                
                                                $appliedcount=$this->commonModel->allCount('job_applicants',array('job_id'=>$id));
                                                
                                                
                                                
                                                $jobtypeid=$list->job_type_id;
                                                $jobtype=$this->commonModel->fs('job_attributes_job_types',array('id'=>$jobtypeid));
                                                
                                                $cityid=$list->city_id;
                                                $city=$this->commonModel->fs('location_cities',array('id'=>$cityid));
                                                
                                                $degreeid=$list->degree_level_id;
                                                $degree=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$degreeid));
                                                
                                                $companyid=$list->company_id;
                                                $vendorid=$list->vendorID;
                                                $company=$this->commonModel->fs('companies',array('id'=>$companyid));
                                                
                                                $jobcount=$this->commonModel->allCount('jobs_list',array('company_id'=>$companyid));
                                                $jobcounts=$this->commonModel->allCount('jobs_list',array('vendorID'=>$vendorid));
                                                
                                                $careerlevelid=$list->career_level_id;
                                                $careerlevelidlist=$this->commonModel->fs('job_attributes_career_levels',array('id'=>$careerlevelid));
                                                
                                                $genderid=$list->gender_id;
                                                $genderidlist=$this->commonModel->fs('job_attributes_genders',array('id'=>$genderid));
                                                
                                                $currentdate = date('Y-m-d');
                                                $todaydate= date('Y-m-d',strtotime($list->created_at));
                                        ?>
                                        <tr>
                                            
                                            
                                            <?php 
                                            if($todaydate==$currentdate){
                                            ?>
                                            <td style="background: #3a00add1;color: #fff;">
                                                <?php echo date('d M, Y ', strtotime($list->created_at))  ?>
                                            </td>
                                            <?php } else { ?>
                                            <td>
                                                <?php echo date('d M, Y ', strtotime($list->created_at)) ?>
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
                                            
                                            <td class="">
                                                <?php
                                                if($list->company_id==0){
                                                ?>
                                                <!--<a href="<!--?php echo base_url('superadmin/total-vendor-company-jobs/'.$vendorid) ?>"></a>-->
                                                <span class="badge badge-pill badge-soft-primary font-size-12">Member</span>
                                                <!--<a href="total-vendor-company-jobs/<?= esc($vendorid) ?>">Member</a>-->
                                                <?php } else { ?>
                                                <span style="font-size: 15px;font-weight: 600;" class="text-danger">Employer</span>
                                                <?php } ?>
                                            </td>
                                            <!--<td><?= esc($company->company_ceo) ?></td>-->
                                            
                                            <td><?= esc($list->title) ?></td>
                                            <td><?= esc($company->phone) ?></td>
                                            <!--<td><!?= esc($careerlevelidlist->name) ?></td>-->
                                            <!--<td><!?= esc($jobtype->name) ?></td>-->
                                            <td><?= esc($company->company_email) ?></td>
                                            <!--<td><!?= esc($genderidlist->name) ?></td>-->
                                            <td><?= esc($city->name) ?></td>
                                            <!--<td><!?= esc($degree->name) ?></td>-->
                                            <!--<td><!?= esc($list->vacancies) ?></td>-->
                                            
                                            <td>
                                                <?php 
                                                if($vendorid==0){
                                                ?>
                                                <?php 
                                                if($jobcount==0){
                                                ?>
                                                <a href="<?php echo base_url('superadmin/jobs-count-list/'.$companyid) ?>" class="btn btn-outline-secondary"><?= esc($jobcount) ?></a>
                                                <?php } else { ?>
                                                <a href="<?php echo base_url('superadmin/jobs-count-list/'.$companyid) ?>" class="btn btn-primary"><?= esc($jobcount) ?></a>
                                               <?php } } else { ?>
                                               
                                               <?php 
                                               if($jobcounts==0){
                                               ?>
                                               <a href="<?php echo base_url('superadmin/total-vendor-company-jobs/'.$vendorid) ?>" class="btn btn-outline-secondary"><?= esc($jobcounts) ?></a>
                                                <?php } else { ?>
                                                <a href="<?php echo base_url('superadmin/total-vendor-company-jobs/'.$vendorid) ?>" class="btn btn-primary"><?= esc($jobcounts) ?></a>
                                                <?php } }?>
                                                <!--<a href="jobs-count-list/<?php echo $companys_id ?>" class="btn btn-outline-secondary"><?= esc($jobcount) ?></a>-->
                                            </td>
                                            
                                            <td>
                                                <?php 
                                                if($appliedcount==0){
                                                ?>
                                                <a href="<?php echo base_url('superadmin/applied-jobs-count/'.$id) ?>" class="btn btn-outline-secondary"><?php echo $appliedcount ?></a>
                                                <?php } else { ?>
                                                <a href="<?php echo base_url('superadmin/applied-jobs-count/'.$id) ?>" class="btn btn-primary"><?php echo $appliedcount ?></a>
                                                <?php } ?>
                                                <!--<a href="applied-jobs-count/<?php echo $id ?>" class="btn btn-outline-secondary"><?php echo $appliedcount ?></a>-->
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
                                                <?php 
                                                if($currentdate < $list->expiry_date) {
                                                ?>
                                                <span class="badge badge-pill <?php echo $status1 ?> font-size-11"><?= esc($status) ?></span>
                                                <?php } else { ?>
                                                <span class="badge badge-pill badge-soft-danger font-size-11">Inactive</span>
                                                <?php } ?>
                                            </td>
                                            
                                            <td class="">
                                               <a href="<?php echo base_url('superadmin/edit-jobs/'.$id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <!--<a href="edit-jobs/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>-->
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