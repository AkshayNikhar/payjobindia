<?php 
include 'layouts/head-main.php';
?>

<head>
    <title>Customer | FarmEasy</title>
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
                            <h4 class="mb-sm-0 font-size-18">All Customer</h4>
                            
                        </div>
                    </div>
                    <div class="col-4 d-none">
                        <div style="text-align: right;">
                            <a href="<?= base_url('superadmin/add-crop')?>" class="btn btn-primary waves-effect waves-light" >Add New</a>
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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <!--<th>Type</th>-->
                                            <th>Profession</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($customer as $customerlist)
                                            {
                                                $sr++;
                                                $id=$customerlist->cusid;
                                                
                                        ?>
                                        <tr>
                                            <td><? echo $sr ?></td> 
                                            <td><img src="<?= base_url('front/assets/img/user/avatar/'.$customerlist->cusimage) ?>" width="60px" height="60px"></td>
                                            <td><?= esc($customerlist->cusfname.' '.$customerlist->cuslname) ?></td>
                                            <td><?= esc($customerlist->cusemail) ?></td>
                                            <td><?= esc($customerlist->cusphone) ?></td>
                                            <td class="d-none">
                                                <?php 
                                                
                                                if($customerlist->be_a_seller==0){
                                                  echo $type='Farmer';
                                                }else{
                                                  echo $type='Seller';
                                                } 
                                                
                                                ?>
                                            </td>
                                            <td><?php echo $customerlist->cusprofession ?> </td>
                                            <td><?php echo date('d M Y',strtotime($customerlist->cuscreated_at)) ?> </td>
                                            
                                            <td class="">
                                                <!--<a href="edit-crop/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>-->
                                                <!--<a href="view-crop/<?= esc($slug) ?>" class="btn btn-sm btn-success"><i class="bx bx-navigation"></i></a>-->
                                                <?php if ($customerlist->active_status == 0): ?>
                                                    <a href="<?= base_url("superadmin/change-status-product/$customerlist->cusid/1") ?>"
                                                        class="btn btn-sm btn-danger"> <i class="fa fa-ban" aria-hidden="true"></i> </a>
                                                <?php endif; ?>
                                                
                                                <?php if ($customerlist->active_status == 1): ?>
                                                    <a href="<?= base_url("superadmin/change-status-product/$customerlist->cusid/0") ?>"
                                                        class="btn btn-sm btn-success"> <i class="fa fa-ban" aria-hidden="true"></i></a>
                                                <?php endif; ?>
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