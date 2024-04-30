<?php 
session_start(); 
include 'layouts/session.php';
include 'layouts/head-main.php';
$feedback='';

?>

<head>
    <title>Task | Farmer</title>
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
                <div class="row d-none">
                    <div class="col-8">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">All Task </h4>
                        </div>
                    </div>
                    <div class="col-4 ">
                        <div style="text-align: right;">
                            <a href="<?php echo base_url('farmer/addcrop') ?>" class="btn btn-primary waves-effect waves-light" >Add New</a>
                        </div>
                    </div>
                    
                </div>
                <!-- end page title -->
                
                 <!--Todo List start-->
                <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none d-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end d-none">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                            <div class="text-center d-grid">
                                                <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light addtask-btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" data-id="#upcoming-task"><i class="mdi mdi-plus me-1"></i> Add New</a>
                                            </div>
                                            
                                        </div> <!-- end dropdown -->
        
                                        <h4 class="card-title mb-4">All Task</h4>
                                        <div id="task-1">
                                            <div id="upcoming-task" class="pb-1 task-list">
                                                <div class="row">
                                                    <?php
                                                        $sr=0;
                                                        foreach($tasklist as $list)
                                                        {
                                                            $sr++;
                                                            $id=$list->tid;
                                                            // $slug=$list->croptype_slug;
                                                            
                                                            if($list->tstatus == 'Pending'){
                                                              $status="warning";
                                                            }
                                                            else if($list->tstatus == 'Approved'){
                                                                $status="primary";
                                                            }
                                                            else if($list->tstatus == 'Complete'){
                                                                $status="success";
                                                            }
                                                            else if($list->tstatus == 'Waiting'){
                                                                $status="secondary";
                                                            }
                                                            else{
                                                                $status="danger";
                                                            }
                                                            
                                                    ?>
                                                    <div class="col-lg-4">
                                                        <div class="card task-box" id="uptask-1">
                                                            <div class="card-body">
                                                                <div class="dropdown float-end">
                                                                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <button class="dropdown-item edittask-details" id="taskedit" data-id="#uptask-1" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg" onclick="updateRow(<?= esc($list->tid) ?>)">Edit</button>
                                                                        <a class="dropdown-item deletetask" href="javascript:void()" data-id="#uptask-1" onclick="openDeleteModal(<?= esc($id) ?>)" >Delete</a>
                                                                    </div>
                                                                </div> <!-- end dropdown -->
                                                                <div class="float-end ml-2">
                                                                    <span class="badge rounded-pill badge-soft-<?php echo $status ?> secondarye-12" id="task-status"><?= esc($list->tstatus) ?></span>
                                                                </div>
                                                                <div>
                                                                    <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark" id="task-name"><?= esc($list->tname) ?></a></h5>
                                                                    <p class="text-muted mb-4"><?php echo date('d M Y',strtotime($list->tdate)) ?></p>
                                                                    <p class="text-muted mt-"><?php echo $list->tdes ?> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <!-- end task card -->
                                                    </div>
                                                    <?
                                                    }
                                                    ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                       
                       <!--Task Model-->
                       <div id="modalForm" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 add-task-title">Add New Task</h5>
                                <h5 class="modal-title mt-0 update-task-title" style="display: none;">Update Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="NewtaskForm" role="form" method="POST" action="<?= base_url('/farmer/add-task'); ?>">
                                    <div class="form-group mb-3">
                                        <label for="taskname" class="col-form-label">Task Name<span class="text-danger">*</span></label>
                                        <div class="col-lg-12">
                                            <input id="taskname" name="taskname" type="text" class="form-control validate" placeholder="Enter Task Name..." required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="taskdate" class="col-form-label">Task Date<span class="text-danger">*</span></label>
                                        <div class="col-lg-12">
                                            <input id="taskdate" name="taskdate" type="date" class="form-control validate" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label">Task Description</label>
                                        <div class="col-lg-12">
                                            <textarea id="taskdesc" class="form-control" type="text" name="taskdesc"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="uid" value="<?php echo $customerid ?>">
                                    <div class="form-group mb-4">
                                        <label class="col-form-label">Status<span class="text-danger">*</span></label>
                                        <div class="col-lg-12">
                                            <select class="form-select validate" id="taskstatus" name="taskstatus" >
                                                <option value="" selected>Choose..</option>
                                                <!--<option value="Pending">Pending</option>-->
                                                <option value="Waiting">Waiting</option>
                                                <!--<option value="Approved">Approved</option>-->
                                                <option value="Complete">Complete</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="tid" />
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-primary" id="addtask" name="submit">Save</button>
                                            <!--<button type="button" class="btn btn-primary" id="updatetaskdetail">Update Task</button>-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                        <!-- /.Task Modal -->     
                <!--Todo List end-->
               

               

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
			    <h5>Are you sure you want to Delete this Task?</h5>
				<form method="POST" action="task-delete" class="needs-validation" novalidate>
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
        function updateRow(tid) {
        $.ajax({
                url: "<?php echo base_url('/farmer/taskedit') ?>/" + tid,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log("XX==", data)
                    // alert(data.tstatus)
                    $('[name="tid"]').val(data.tid);
                    
                    $('select#taskstatus option[value="' + data.tstatus + '"]').attr("selected", true);
                    $('[name="taskname"]').val(data.tname);
                    $('[name="taskdate"]').val(data.tdate);
                    $('[name="taskdesc"]').val(data.tdes);
                    // $('[name="uid"]').val(data.tuserID);
                    $('#myModal').modal('show');
                    $('.modal-title').text('Update Todo List');
                    $("#NewtaskForm").attr('action', '<?php echo base_url('/farmer/edittask1')?>')
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Error get data from ajax');
                }
            });
    }
    
    function openDeleteModal(id)
    {
        var deleteId=document.getElementById('deleteId');
        deleteId.value=id;
        $('#deleteModal').modal('show');
    }
    </script>



</body>

</html>