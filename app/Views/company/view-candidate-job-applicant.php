<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();

// print_r($todayjobs);
 $user_id=$todayjobs->user_id;
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

$functionalareaid=$userlist->functional_area_id;
$functionalarealist=$this->commonModel->fs('function_area',array('id'=>$functionalareaid));

$education=$userlist->education;
$educationlist=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$education));

$degreetypeid=$userlist->degree_type_id;
$degreetypelist=$this->commonModel->fs('job_attributes_degree_types',array('id'=>$degreetypeid));

$experience=$userlist->experience;
$experiencelist=$this->commonModel->fs('job_attributes_job_experiences',array('id'=>$experience));



$feedback='';

?>

<head>
    <title> Candidate | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18"> Candidate Details </h4>
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
                                            <th scope="row" style="width: 400px;">Name</th>
                                            <td><?= esc($userlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="width: 400px;">Gender</th>
                                            <td><?= esc($genderlist->name) ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row">Functional Area</th>
                                            <td><?= esc($functionalarealist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Country</th>
                                            <td><?= esc($countrylist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">State</th>
                                            <td><?= esc($statelist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">City</th>
                                            <td><?= esc($citylist->name) ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row">Education</th>
                                            <td><?= esc($educationlist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Degree</th>
                                            <td><?= esc($degreetypelist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Experience</th>
                                            <td><?= esc($experiencelist->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Technical Skill</th>
                                            <td><?= esc($userlist->technical_skills) ?></td>
                                        </tr>
                                        <tr>
                                        
                                        
                                        
                                        
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