<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();



$city=$this->commonModel->fs('location_cities',array('id'=>$vendorlistview->city));

$countryidlist=$this->commonModel->fs('location_countries',array('id'=>$vendorlistview->country));

$stateidlist=$this->commonModel->fs('location_states',array('id'=>$vendorlistview->state));

$assignidlist=$this->commonModel->fs('roleAssign',array('id'=>$vendorlistview->assign));




$feedback='';

?>

<head>
    <title>Vendor Details | Pay Job India</title>
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
                    <div class="col-4 d-none">
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
                                            <td><?= esc($vendorlistview->name) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td><?= esc($vendorlistview->email) ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td><?= esc ($vendorlistview->phone) ?></td>
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
                                            <td><?= esc($city->name) ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td><?= esc($vendorlistview->address) ?> </td>
                                        </tr>
                                        <tr class="">
                                            <th scope="row">Assign</th>
                                            <td><?php echo $assignidlist->name ?> </td>
                                        </tr>
                                        <tr class="">
                                            <th scope="row">Created</th>
                                            <td><?php echo $vendorlistview->created ?> </td>
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