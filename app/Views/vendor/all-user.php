<?php 
include 'layouts/head-main.php';
$feedback='';
?>

<head>
    <title>Candidate | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">All Candidate</h4>
                            
                        </div>
                    </div>
                   <?php if((in_array(7, $permissionIDs) && in_array($customerid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                    <div class="col-4 ">
                        <div style="text-align: right;">
                            <!--<a href="#" class="btn btn-primary waves-effect waves-light" >Add New</a>-->
                            <a href="<?= base_url('vendor/add-user')?>" class="btn btn-primary waves-effect waves-light" >Add New</a>
                        </div>
                    </div>
                   <?php } else{ } ?>
                    
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
                                            <!--<th>image</th>-->
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact No.</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($users as $d)
                                            {
                                                $sr++;
                                                $id=$d->id;
                                        ?>
                                        <tr>
                                            <td><? echo $sr ?></td> 
                                            <!--td>
                                                <?php 
                                                if(empty($d->logo)){
                                                ?>
                                                <img src="https://placehold.jp/80x80.png" class="img-fluid">
                                                <?php } else{ ?>
                                                <img src="<?= base_url('back/assets/images/profile/'.$d->logo) ?>" class="img-fluid" width="80px">
                                                <?php } ?>
                                            </td-->
                                            <td><?= esc($d->name) ?></td>
                                            <td><?= esc($d->email) ?></td>
                                            <td><?= esc($d->mobile) ?></td>
                                            <td><?php echo date('d M Y',strtotime($d->created_at)) ?> </td>
                                            
                                            <td>
                                                <?php if((in_array(8, $permissionIDs) && in_array($customerid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                                <a href="edit-user/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                                <?php } else{ }
                                                ?>
                                                <?php if((in_array(9, $permissionIDs) && in_array($customerid, $empIDs) && in_array($assignRole, $roleIDs))) { ?>
                                                <a href="view-user/<?= esc($id) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>
                                                <?php } else{ }
                                                ?>
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
            				<h5 class="modal-title" id="myModalLabel">Delete User</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            			</div>
            			<div class="modal-body">
            			    <h5>Are you sure you want to Delete this User?</h5>
            				<form method="POST" action="delete-user" class="needs-validation" novalidate>
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