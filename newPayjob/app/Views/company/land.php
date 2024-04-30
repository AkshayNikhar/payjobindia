<?php 
session_start(); 
include 'layouts/session.php';
include 'layouts/head-main.php';
$feedback='';

?>

<head>
    <title>Land Management | Farmer</title>
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
                            <h4 class="mb-sm-0 font-size-18">All Land </h4>
                        </div>
                    </div>
                    <div class="col-4 ">
                        <div style="text-align: right;">
                            <a href="<?php echo base_url('farmer/addland') ?>" class="btn btn-primary waves-effect waves-light" >Add New</a>
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
                                            <th>Land Area</th>
                                            <th>Type</th>
                                            <th>Soil</th>
                                            <th>Ownership</th>
                                            <th>Khasra No.</th>
                                            <!--<th>Action</th>-->
                                        </tr>
                                    </thead>


                                    <tbody>
                                        
                                        <tr>
                                            <td>
                                              Crop Name : dfs <br>
                                              
                                            </td>
                                            <td>
                                               Date : gfd<br>
                                               
                                            </td>
                                            <td>
                                               Variety : dfs<br>
                                               
                                            </td>
                                            <td>
                                                Name : hjhg<br>
                                                
                                            </td>
                                            <td>
                                               Land : gfh<br>
                                               
                                            </td>
                                            <td class="d-none">
                                               <a href="" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                               <a href="javascript:void()" onclick="" class="w-20 btn btn-sm btn-danger"><i class="bx bx-trash"></i></a> 
                                            </td>
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