<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();

$functionalareaid=$datacandidate->functional_area_id;
$functionalarealist=$this->commonModel->fs('function_area',array('id'=>$functionalareaid));

$education=$datacandidate->education;
$educationlist=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$education));

$degreetypeid=$datacandidate->degree_type_id;
$degreetypelist=$this->commonModel->fs('job_attributes_degree_types',array('id'=>$degreetypeid));

$experience=$datacandidate->experience;
$experiencelist=$this->commonModel->fs('job_attributes_job_experiences',array('id'=>$experience));

$countryid=$datacandidate->country_id;
$countryidlist=$this->commonModel->fs('location_countries',array('id'=>$countryid));

$stateid=$datacandidate->state;
$stateidlist=$this->commonModel->fs('location_states',array('id'=>$stateid));

$cityid=$datacandidate->city;
$cityidlist=$this->commonModel->fs('location_cities',array('id'=>$cityid));


$useridlist=$this->commonModel->fs('job_applicants',array('user_id'=>$datacandidate->id));

$usersidlist=$this->commonModel->fs('companies_Permission',array('companyID'=>$this->session->get('empid')));
// print_r($usersidlist);exit;
$feedback='';

?>

<head>
    <title>All Candidate | Pay Job India</title>
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
                                            <td><?= esc($datacandidate->name) ?></td>
                                        </tr>
                                        
                                        
                                        <?php
                                        if($usersidlist->email==1){
                                        ?>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td><?= esc($datacandidate->email) ?></td>
                                        </tr>
                                        <?php } else { } ?>
                                        
                                        <?php
                                        if($usersidlist->phone==1){
                                        ?>
                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td><?= esc($datacandidate->mobile) ?></td>
                                        </tr>
                                        <?php } else { } ?>
                                        
                                        <tr>
                                            <th scope="row">Functional Area</th>
                                            <td><?= esc($functionalarealist->name) ?></td>
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
                                            <th scope="row">Address</th>
                                            <td><?=esc ($datacandidate->address) ?></td>
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
                                            <td><?= esc($datacandidate->technical_skills) ?></td>
                                        </tr>
                                        <tr>
                                        
                                        
                                        <tr>
                                            <th scope="row">Company Info</th>
                                            <td><?php echo $datacandidate->description ?> </td>
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