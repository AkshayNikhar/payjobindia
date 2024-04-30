<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
$feedback='';

?>

<head>
    <title>All Jobs | Pay Job India</title>
    <?php include 'layouts/head.php'; ?>
<style>
        .tr001 {
    text-align: center;
    font-size: 23px;
    font-weight: 600;
    color: #fff;
    background: #3d437f;
    border-width: 0px 0px !important;
}
.trspan {
   
    font-size: 18px;
    
}
.td001{
    
    background: #fff;
    color: #000;

}
.table>:not(caption)>*>* {
    padding: 9px;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    -webkit-box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}
    </style>
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
                            <h4 class="mb-sm-0 font-size-18">Today Jobs </h4>
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
                                            <th>Create Date</th>
                                            <th>Company Name</th>
                                            <th>Type</th>
                                            <th>Job Title</th>
                                            <th>City</th>
                                            <th>Education</th>
                                            <th>Vacancies</th>
                                            <th>Applied Job</th>
                                            <th>Expire Date</th>
                                            <th>Jobs Type</th>
                                            <th>Admin Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($jobs as $list)
                                            {
                                                $sr++;
                                                $id=$list->id;
                                                
                                                $vendorid=$list->vendorID;
                                                
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
                                                
                                                $genderid=$list->gender_id;
                                                $genderidlist=$this->commonModel->fs('job_attributes_genders',array('id'=>$genderid));
                                                
                                                $salaryperiodid=$list->salary_period_id;
                                                $salaryperiodidlist=$this->commonModel->fs('job_attributes_salary_periods',array('id'=>$salaryperiodid));
                                                
                                                $jobexperienceid=$list->job_experience_id;
                                                $jobexperienceidlist=$this->commonModel->fs('job_attributes_job_experiences',array('id'=>$jobexperienceid));
                                                
                                                $degreetypeid=$list->degree_type_id;
                                                $degreetypeidlist=$this->commonModel->fs('job_attributes_degree_types',array('id'=>$degreetypeid));
                                                // print_r($degreetypeidlist);exit;
                                                
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
                                        <?php 
                                        if($list->company_id==0){
                                        ?>
                                        <tr class="badge-soft-dark">
                                            
                                            
                                            <?php 
                                            if($todaydate==$currentdate){
                                            ?>
                                            <td style="background: #3a00add1;color: #fff;">
                                                <?php echo $list->created_at ?>
                                            </td>
                                            <?php } else { ?>
                                            <td>
                                                <?php echo $list->created_at ?>
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
                                            <td>
                                                <?php
                                                if($list->company_id==0){
                                                ?>
                                                <a href="total-vendor-company-jobs/<?= esc($vendorid) ?>"><span style="font-size: 15px;font-weight: 600;">Member</span></a>
                                                <?php } else { ?>
                                               Employer
                                                <!--<a href="total-company-jobs/<!?= esc($vendorid) ?>" >Employer</a>-->
                                                <?php } ?>
                                            </td>
                                            <td><?= esc($list->title) ?></td>
                                            <td><?= esc($city->name) ?></td>
                                            <td><?= esc($degree->name) ?></td>
                                            <td>
                                                <?= esc($list->vacancies) ?>
                                                <!--<a href="jobs-count-list/<?php echo $companyid ?>" class="btn btn-outline-secondary"><?php echo $jobcount ?></a>-->
                                            </td>
                                            <td>
                                                <a href="applied-jobs-count/<?php echo $id ?>" class="btn btn-outline-secondary"><?php echo $appliedcount ?></a>
                                            </td>
                                            
                                            
                                            <td>
                                                <?php 
                                                if($currentdate < $list->expiry_date) {
                                                ?>
                                                <?php echo date('d M Y',strtotime($list->expiry_date)) ?>
                                                <?php } else { ?>
                                                
                                                <span class="badge badge-pill badge-soft-danger"><?php echo date('d M Y',strtotime($list->expiry_date)) ?></span>
                                                <?php } ?>
                                            </td>
                                            <td><?= esc($jobtype->name) ?></td>
                                            
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
                                               <a href="edit-jobs/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } elseif((in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="edit-jobs/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } else{ }
                                                ?>
                                                <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="view-jobs/<?= esc($id) ?>" class="btn btn-sm btn-dark w-20"><i class="bx bx-show"></i></a>
                                               <?php } elseif((in_array(28, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="view-jobs/<?= esc($id) ?>" class="btn btn-sm btn-dark w-20"><i class="bx bx-show"></i></a>
                                               <?php } else{ }
                                                ?>
                                               <!-- Add this button in your HTML file -->
                                                <!--button onclick="generateImages()" class="btn btn-sm btn-warning w-20"><i class="bx bx-image"></i></button-->
                                                <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
<a href="javascript:void(0)" onclick="openImageModal('<?= esc($list->title) ?>', '<?=esc($functionalareaidlist->name)?>','<?= esc($careerlevelidlist->name) ?>','<?= esc($list->vacancies) ?> - Vacancy','<?= esc($degree->name) ?>','<?= esc($degreetypeidlist->name) ?>' ,'<?= esc($jobtype->name) ?>','<?= esc($list->work_mode) ?>','<?= esc($vacancyidlist->name) ?>', '<?= esc($jobexperienceidlist->name) ?>','<?=esc($genderidlist->name)?>', '<?= esc($city->name) ?>', '<?= esc($salary) ?>', '<?= esc($list->expiry_date) ?>')" class="w-20 btn btn-sm btn-warning">
    <i class="bx bx-image"></i>
</a>
                                                <?php } elseif((in_array(29, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
<a href="javascript:void(0)" onclick="openImageModal('<?= esc($list->title) ?>', '<?=esc($functionalareaidlist->name)?>','<?= esc($careerlevelidlist->name) ?>','<?= esc($list->vacancies) ?> - Vacancy','<?= esc($degree->name) ?>','<?= esc($degreetypeidlist->name) ?>' ,'<?= esc($jobtype->name) ?>','<?= esc($list->work_mode) ?>','<?= esc($vacancyidlist->name) ?>', '<?= esc($jobexperienceidlist->name) ?>','<?=esc($genderidlist->name)?>', '<?= esc($city->name) ?>', '<?= esc($salary) ?>', '<?= esc($list->expiry_date) ?>')" class="w-20 btn btn-sm btn-warning">
    <i class="bx bx-image"></i>
</a>                                                
                                                <?php } else{ }
                                                ?>
                                               <!--<a href="javascript:void()" onclick="openDeleteModal(<?= esc($id) ?>)" class="w-20 btn btn-sm btn-danger"><i class="bx bx-trash"></i></a> -->
                                            </td>
                                        </tr>
                                        <?php } else { ?>
                                        <tr>
                                            
                                            <?php 
                                            if($todaydate==$currentdate){
                                            ?>
                                            <td style="background: #3a00add1;color: #fff;">
                                                <?php echo $list->created_at ?>
                                            </td>
                                            <?php } else { ?>
                                            <td>
                                                <?php echo $list->created_at ?>
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
                                            <td>
                                                <?php
                                                if($list->company_id==0){
                                                ?>
                                                Member
                                                <?php } else { 
                                                // echo $list->company_id;
                                                ?>
                                                <a href="total-company-jobs/<?= esc($list->company_id) ?>" class="text-danger"><span style="font-size: 15px;font-weight: 600;">Employer</span></a>
                                                <?php } ?>
                                            </td>
                                            <td><?= esc($list->title) ?></td>
                                            <td><?= esc($city->name) ?></td>
                                            <td><?= esc($degree->name) ?></td>
                                            <td><?= esc($list->vacancies) ?></td>
                                            <td>
                                                <a href="applied-jobs-count/<?php echo $id ?>" class="btn btn-outline-secondary"><?php echo $appliedcount ?></a>
                                            </td>
                                            
                                           
                                            <td>
                                                <?php 
                                                if($currentdate < $list->expiry_date) {
                                                ?>
                                                <?php echo date('d M Y',strtotime($list->expiry_date)) ?>
                                                <?php } else { ?>
                                                
                                                <span class="badge badge-pill badge-soft-danger"><?php echo date('d M Y',strtotime($list->expiry_date)) ?></span>
                                                <?php } ?>
                                            </td>
                                            <td><?= esc($jobtype->name) ?></td>
                                            
                                            
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
                                               <a href="edit-jobs/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } elseif((in_array(27, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="edit-jobs/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <?php } else{ }
                                                ?>
                                                <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
                                               <a href="view-jobs/<?= esc($id) ?>" class="btn btn-sm btn-dark w-20"><i class="bx bx-show"></i></a>
                                               <?php } elseif((in_array(28, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                               <a href="view-jobs/<?= esc($id) ?>" class="btn btn-sm btn-dark w-20"><i class="bx bx-show"></i></a>
                                               <?php } else{ }
                                                ?>
                                               <!-- Add this button in your HTML file -->
                                                <!--button onclick="generateImages()" class="btn btn-sm btn-warning w-20"><i class="bx bx-image"></i></button-->
                                                <?php 
                                                if($assignRole == 0 && $assignid == 1) { 
                                                ?>
<a href="javascript:void(0)" onclick="openImageModal('<?= esc($list->title) ?>', '<?=esc($functionalareaidlist->name)?>','<?= esc($careerlevelidlist->name) ?>','<?= esc($list->vacancies) ?> - Vacancy','<?= esc($degree->name) ?>','<?= esc($degreetypeidlist->name) ?>' ,'<?= esc($jobtype->name) ?>','<?= esc($list->work_mode) ?>','<?= esc($vacancyidlist->name) ?>', '<?= esc($jobexperienceidlist->name) ?>','<?=esc($genderidlist->name)?>', '<?= esc($city->name) ?>', '<?= esc($salary) ?>', '<?= esc($list->expiry_date) ?>')" class="w-20 btn btn-sm btn-warning">
    <i class="bx bx-image"></i>
</a>
                                                <?php } elseif((in_array(29, $permissionIDs) && in_array($assignid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
<a href="javascript:void(0)" onclick="openImageModal('<?= esc($list->title) ?>', '<?=esc($functionalareaidlist->name)?>','<?= esc($careerlevelidlist->name) ?>','<?= esc($list->vacancies) ?> - Vacancy','<?= esc($degree->name) ?>','<?= esc($degreetypeidlist->name) ?>' ,'<?= esc($jobtype->name) ?>','<?= esc($list->work_mode) ?>','<?= esc($vacancyidlist->name) ?>', '<?= esc($jobexperienceidlist->name) ?>','<?=esc($genderidlist->name)?>', '<?= esc($city->name) ?>', '<?= esc($salary) ?>', '<?= esc($list->expiry_date) ?>')" class="w-20 btn btn-sm btn-warning">
    <i class="bx bx-image"></i>
</a>                                                
                                                <?php } else{ }
                                                ?>
                                               <!--<a href="javascript:void()" onclick="openDeleteModal(<?= esc($id) ?>)" class="w-20 btn btn-sm btn-danger"><i class="bx bx-trash"></i></a> -->
                                            </td>
                                        </tr>
                                        <?php
                                        }
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
    
    <!--Image Modal-->
			<div id="imageModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title" id="myModalLabel">Image Download</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            			</div>
            			<div class="modal-body">
            			    <div class="table-responsive1" id="table-container">
                                <table class="table table-bordered border-primary mb-0">
                                    <tbody class="bg-white text-capitalize">
                                        <tr class="tr001">
                                            <td colspan="2">
                                                <span style="float: left;" class="d-none">  
                                                    <img src="<?php echo base_url('front/assets/images/favicon.png')?>" style="width: 50px;height: 50px;">
                                                </span>
                                                <span id="title"></span><br>
                                                <span id="functional" class="trspan"></span> <span class="trspan">/</span> <span id="careerlevel" class="trspan"></span>
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <td>Vacancy:</td>
                                            <td id="vacancy"></td>
                                        </tr>
                                        <tr>
                                            <td>Education:</td>
                                            <td id="education"></td>
                                        </tr>
                                        <tr>
                                            <td>Degree Level:</td>
                                            <td id="degreelevel"></td>
                                        </tr>
                                        <tr>
                                            <td>Job Type:</td>
                                            <td id="jobtype"></td>
                                        </tr>
                                        <tr>
                                            <td>Work Mode:</td>
                                            <td id="workmode"></td>
                                        </tr>
                                        <tr>
                                            <td>Vacancy Type:</td>
                                            <td id="vacancy_type"></td>
                                        </tr>
                                        <tr>
                                            <td>Experience:</td>
                                            <td id="exp"></td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td id="gender"></td>
                                        </tr>
                                        <tr>
                                            <td>City:</td>
                                            <td id="city"></td>
                                        </tr>
                                        <tr>
                                            <td>Salary:</td>
                                            <td id="salary"></td>
                                        </tr>
                                        <tr>
                                            <td>Expiry Date:</td>
                                            <td id="expire"></td>
                                        </tr>
                                    </tbody>
                                </table>
            				</div>
            				<div class="text-center mt-2">
            				<a id="downloadLink" href="#" class="btn btn-primary" onclick="downloadImage()">Download Image</a>
            				</div>
                		</div>
            	    </div>
            	</div>
            </div>
            <!-- End Image Modal -->        
            
    
         

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Required datatable js -->
<?php include 'layouts/footerjs.php' ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>


<script>
    function openDeleteModal(id)
    {
        var deleteId=document.getElementById('deleteId');
        deleteId.value=id;
        $('#deleteModal').modal('show');
    }
    function openImageModal(title, functional, careerlevel,vacancy, education,degreelevel,jobtype, workmode,  vacancy_type,exp, gender, city, salary, expire)
    {
        document.getElementById('title').textContent = title;
        document.getElementById('functional').textContent = functional;
        document.getElementById('careerlevel').textContent = careerlevel;
        document.getElementById('vacancy').textContent = vacancy;
        document.getElementById('education').textContent = education;
        document.getElementById('degreelevel').textContent = degreelevel;
        document.getElementById('jobtype').textContent = jobtype;
        document.getElementById('workmode').textContent = workmode;
        document.getElementById('exp').textContent = exp;
        document.getElementById('vacancy_type').textContent = vacancy_type;
        document.getElementById('gender').textContent = gender;
        document.getElementById('city').textContent = city;
        document.getElementById('salary').textContent = salary;
        document.getElementById('expire').textContent = expire;
        $('#imageModal').modal('show');
    }
    
    
</script>

<script>
    function downloadImage() {
        // Get the container element
        var container = document.getElementById('table-container');

        // Use HTML2Canvas to capture the content of the table as an image
        html2canvas(container, {
            backgroundColor: null, // Set this to 'null' to capture the existing background
        }).then(canvas => {
            // Convert the canvas to a data URL
            var imageData = canvas.toDataURL();

            // Create a temporary anchor element
            var anchor = document.createElement('a');

            // Set the href attribute to the data URL
            anchor.href = imageData;

            // Set the download attribute to the desired filename
            anchor.download = 'downloaded_image.jpg';

            // Append the anchor to the document
            document.body.appendChild(anchor);

            // Trigger a click on the anchor to start the download
            anchor.click();

            // Remove the anchor from the document
            document.body.removeChild(anchor);
        });
    }
</script>

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