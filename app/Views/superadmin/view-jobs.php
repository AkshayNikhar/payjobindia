<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();

$jobtypeid=$datajobpost->job_type_id;
$jobtype=$this->commonModel->fs('job_attributes_job_types',array('id'=>$jobtypeid));

$cityid=$datajobpost->city_id;
$city=$this->commonModel->fs('location_cities',array('id'=>$cityid));

$degreeid=$datajobpost->degree_level_id;
$degree=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$degreeid));

$companyid=$datajobpost->company_id;
$company=$this->commonModel->fs('companies',array('id'=>$companyid));

$functionalareaid=$datajobpost->functional_area_id;
$functionalareaidlist=$this->commonModel->fs('job_attributes_functional_areas',array('id'=>$functionalareaid));

$careerlevelid=$datajobpost->career_level_id;
$careerlevelidlist=$this->commonModel->fs('job_attributes_career_levels',array('id'=>$careerlevelid));

$degreetypeid=$datajobpost->degree_type_id;
$degreetypeidlist=$this->commonModel->fs('job_attributes_degree_types',array('id'=>$degreetypeid));

$jobexperienceid=$datajobpost->job_experience_id;
$jobexperienceidlist=$this->commonModel->fs('job_attributes_job_experiences',array('id'=>$jobexperienceid));

$genderid=$datajobpost->gender_id;
$genderidlist=$this->commonModel->fs('job_attributes_genders',array('id'=>$genderid));

$jobshiftid=$datajobpost->job_shift_id;
$jobshiftidlist=$this->commonModel->fs('job_attributes_job_shifts',array('id'=>$jobshiftid));

$countryid=$datajobpost->country_id;
$countryidlist=$this->commonModel->fs('location_countries',array('id'=>$countryid));

$stateid=$datajobpost->state_id;
$stateidlist=$this->commonModel->fs('location_states',array('id'=>$stateid));

$cityid=$datajobpost->city_id;
$cityidlist=$this->commonModel->fs('location_cities',array('id'=>$cityid));

$salaryperiodid=$datajobpost->salary_period_id;
$salaryperiodidlist=$this->commonModel->fs('job_attributes_salary_periods',array('id'=>$salaryperiodid));

$feedback='';

?>

<head>
    <title>Jobs Details | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">Jobs Details </h4>
                        </div>
                    </div>
                    <div class="col-4 ">
                        <div style="text-align: right;">
                            <a href="<?php echo base_url('superadmin/add-jobs') ?>" class="btn btn-primary waves-effect waves-light" >Add New</a>
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
                                <table class="table mb-0 table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="width: 400px;">Company Name</th>
                                            <td><?= esc($company->company_name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Designation</th>
                                            <td><?= esc($datajobpost->title) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Functional Area</th>
                                            <td><?= esc ($functionalareaidlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Career Level</th>
                                            <td><?=esc ($careerlevelidlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Education</th>
                                            <td><?= esc($degree->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Degree</th>
                                            <td><?= esc($degreetypeidlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Experience</th>
                                            <td><?= esc($jobexperienceidlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Gender</th>
                                            <td><?= esc($genderidlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Job Type</th>
                                            <td><?= esc($jobtype->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Job Shift</th>
                                            <td><?= esc($jobshiftidlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Vacancies</th>
                                            <td><?= esc($datajobpost->vacancies) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Country</th>
                                            <td><?= esc($countryidlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">State</th>
                                            <td><?= esc($stateidlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">City</th>
                                            <td><?= esc($cityidlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Salary</th>
                                            <td><?= esc($datajobpost->salary_from) ?> - <?= esc($datajobpost->salary_to) ?> <?= esc($datajobpost->salary_currency) ?> / <?= esc($salaryperiodidlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Work Mode</th>
                                            <td><?= esc($datajobpost->work_mode) ?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Expire Date</th>
                                            <td><?= esc($datajobpost->expiry_date) ?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td><?= esc($datajobpost->address) ?> </td>
                                        </tr>
                                        <tr class="d-none">
                                            <th scope="row">Job Description</th>
                                            <td><?php echo $datajobpost->description ?> </td>
                                        </tr>
                                        <tr class="d-none">
                                            <th scope="row">Responbilities</th>
                                            <td><?php echo $datajobpost->responbilities ?> </td>
                                        </tr>
                                        <tr class="d-none">
                                            <th scope="row">Requirements</th>
                                            <td><?php echo $datajobpost->requirements ?> </td>
                                        </tr>
                                        
                                        <tr class="">
                                            <th scope="row">Company Job Description</th>
                                            <td><?php echo $datajobpost->company_des ?> </td>
                                        </tr>
                                        <tr class="">
                                            <th scope="row">Company Responbilities</th>
                                            <td><?php echo $datajobpost->company_responbility_home ?> </td>
                                            
                                        </tr>
                                        <tr class="">
                                            <th scope="row">Company Requirements</th>
                                            <td><?php echo $datajobpost->company_requirement_home ?> </td>
                                        </tr>
                                        <tr class="d-none">
                                            <th scope="row">Resume</th>
                                            <td><a href="https://jobportal.swarajventures.com/assets/resume/5865Sin_cara.png" target="_blank" class="btn btn-sm btn-primary" download="">Download</a></td>
                                        </tr>
                                        
                                       
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