<?php 
include 'layouts/head-main.php';
use App\Models\CommonModel;
$this->commonModel = new CommonModel();

?>

<head>
    <title>Vendor List | Pay Job India</title>
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
                            <h4 class="mb-sm-0 font-size-18">All Vendor</h4>
                            
                        </div>
                    </div>
                    <div class="col-4 d-none">
                        <div style="text-align: right;">
                            <a href="#" class="btn btn-primary waves-effect waves-light" >Add New</a>
                            <!--<a href="<?= base_url('superadmin/add-company')?>" class="btn btn-primary waves-effect waves-light" >Add New</a>-->
                        </div>
                    </div>
                    
                </div>
                <!-- end page title -->

                <div class="row">
                    <form class="row gy-2 gx-3 align-items-center " action="<?= base_url('superadmin/filter-vendor') ?>" method="post">
                        
                        <div class="col-sm-auto">
                            <label>Vendor Name</label>
                            <input type="text" class="form-control" name="vendor_name" id="vendor_name" placeholder="Vendor Name">
                        </div>
                        <div class="col-sm-auto">
                            <label>State</label>
                            <select name="state_id" id="state_id" class="form-select">
                                <option value="" >Select States ...</option>
                                <?php
                                    foreach($state as $states)
    							    {
                                    echo '<option value="'.$states->id.'">'.$states->name.'</option>';
    							    }
    						    ?>
                            </select>
                        </div>
                        <div class="col-sm-auto">
                            <label>City</label>
                            <select name="city_id" id="city_id" class="form-select ">
                                <option value="">Select City ...</option>
                                <?php
                                    foreach($city as $citys)
    							    {
                                    echo '<option value="'.$citys->id.'">'.$citys->name.'</option>';
    							    }
    						    ?>
                            </select>
                        </div>
                        <div class="col-sm-auto">
                            <label>Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Start date">
                        </div>
                        <div class="col-sm-auto">
                            <label>End Date</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" placeholder="End date">
                        </div>
                        
                        <div class="col-sm-auto">
                           <button type="submit" class="btn btn-primary w-md" style="margin-top: 25px;">Filter</button>
                        </div>
                        <!--<button type="submit">Filter</button>-->
                    </form>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if(!empty($feedback)) {echo $feedback;} ?>
                                <div class="table-responsive">
                                <table id="datatable1-buttons" class="table table-bordered mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Sr No</th>
                                            <!--<th>Image</th>-->
                                            <th>Created Date</th>
                                            <th>Vendor Name</th>
                                            <th>Vendor Email</th>
                                            <th>Vendor Contact No.</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                            $sr=0;
                                            foreach($vendorlist as $d)
                                            {
                                                $sr++;
                                                $id=$d->id;
                                                $assignid=$d->assign;
                                                $role=$this->commonModel->fs('roleAssign',array('id'=>$assignid));
                                                
                                                $currentdate = date('Y-m-d');
                                                $todaydate= date('Y-m-d',strtotime($d->created));
                                        ?>
                                        <?php 
                                            if($todaydate==$currentdate){
                                            ?>
                                        <tr style="background: #737276d1;color: #fff;">
                                            <td><? echo $sr ?></td> 
                                            <!--<td><img src="<!?= base_url('back/assets/images/vendorlogo/'.$d->logo) ?>" class="img-fluid" width="80px"></td>-->
                                            <td>
                                                <?php echo date('d M Y ',strtotime($d->created)) ?>
                                            </td>
                                            <td><?= esc($d->name) ?></td>
                                            <td><?= esc($d->email) ?></td>
                                            <td><?= esc($d->phone) ?></td>
                                            <td><?= esc($role->name) ?></td>
                                            <!--<td><?php echo date('d M Y',strtotime($d->created)) ?> </td>-->
                                            <td>
                                                <a href="vendor-edit/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                                <a href="total-vendor-company-jobs/<?= esc($id) ?>" class="w-20 btn btn-sm btn-dark">All Jobs</a> 
                                                 <a href="total-vendor-company/<?= esc($id) ?>" class="w-20 btn btn-sm btn-dark">All Company</a> 
                                                <a href="total-vendor-company-jobs-view/<?= esc($id) ?>" class="btn btn-sm btn-success w-20"><i class="bx bx-show"></i></a>
                                            </td>
                                           
                                        </tr>
                                        <?
                                        } else { 
                                        ?>
                                        <tr>
                                            <td><? echo $sr ?></td> 
                                            <!--<td><img src="<!?= base_url('back/assets/images/vendorlogo/'.$d->logo) ?>" class="img-fluid" width="80px"></td>-->
                                            <td>
                                                <?php echo date('d M Y ',strtotime($d->created)) ?>
                                            </td>
                                            <td><?= esc($d->name) ?></td>
                                            <td><?= esc($d->email) ?></td>
                                            <td><?= esc($d->phone) ?></td>
                                            <td><?= esc($role->name) ?></td>
                                            <!--<td><?php echo date('d M Y',strtotime($d->created)) ?> </td>-->
                                            <td>
                                                <a href="vendor-edit/<?= esc($id) ?>" class="btn btn-sm btn-primary w-20"><i class="bx bx-pencil"></i></a>
                                                <a href="total-vendor-company-jobs/<?= esc($id) ?>" class="w-20 btn btn-sm btn-dark">All Jobs</a> 
                                                <a href="total-vendor-company/<?= esc($id) ?>" class="w-20 btn btn-sm btn-dark">All Company</a> 
                                                <a href="total-vendor-company-jobs-view/<?= esc($id) ?>" class="btn btn-sm btn-success w-20"><i class="bx bx-show"></i></a>
                                            </td>
                                           
                                        </tr>
                                        <?php } } ?>
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
            				<h5 class="modal-title" id="myModalLabel">Delete Company</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            			</div>
            			<div class="modal-body">
            			    <h5>Are you sure you want to Delete this Company?</h5>
            				<form method="POST" action="delete-company" class="needs-validation" novalidate>
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