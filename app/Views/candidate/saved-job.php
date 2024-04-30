<?php 
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->include ('includes/head.php') ?>
	<style>
	    .modal-dialog {
    max-width: 410px;
    margin: 0 auto;
    padding-top: 160px;
}
	</style>
</head>

<body class="bg-wight">
	<?php echo $this->include ('includes/header.php') ?>
	
	<div class="inner-banner d-none">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="banner-content text-center">
					<h1>Dashboard</h1> <span></span>
				</div>
			</div>
		</div>
	</div>
    </div>
    
    <div class="dashboard-area pt-50 mb-50">
	<div class="container-fluid">
		<div class="row g-lg-4 gy-5 mb-90 justify-content-center">
			<?php echo $this->include ('candidate/menu.php') ?>
			<div class="col-lg-10">
	<div class="applied-job-area">
		<div class="table-wrapper">
			<div class="table-title-filter">
				<div class="section-title">
					<h5>Saved Jobs:</h5> </div>
			</div>
			<table class="eg-table table category-table mb-30">
				<thead>
					<tr>
						<th>Job Tittle</th>
						<th>Save Date</th>
						<th>Expiry Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				    <?php 
				    foreach($jobsave as $list) {
				        
				        $ids=$list->id;
				        $idjob=$list->jobid;
				        $datajobs=$this->commonModel->fs('jobs_list',array('is_active'=>1,'id'=>$idjob));
				        $id=$datajobs->id;
				        $slug=$datajobs->slug;
				        $cityid=$datajobs->city_id;
				        $stateid=$datajobs->state_id;
				        $salaryperiodid=$datajobs->salary_period_id;
				        $companyid=$datajobs->company_id;
				        
				        $companylist=$this->commonModel->fs('companies',array('id'=>$companyid));
				        $cityidlist=$this->commonModel->fs('location_cities',array('id'=>$cityid));
				        $stateidlist=$this->commonModel->fs('location_states',array('id'=>$stateid));
				        $salaryperiodidlist=$this->commonModel->fs('job_attributes_salary_periods',array('id'=>$salaryperiodid));
				        // print_r($datajobs);exit;
				        $currentdate = date('Y-m-d');
				        if($currentdate < $datajobs->expiry_date) {
				    ?>
					<tr>
						<td data-label="Job Title">
							<div class="company-info">
								<div class="logo"> <img src="<?php echo base_url('front/assets/images/favicon.png') ?>" alt=""> </div>
								<div class="company-details">
									<div class="top">
										<h6>
										    <a href="<?php echo base_url('job1/'.$datajobs->slug)?>"><?= esc($datajobs->title) ?></a>
										    <!--<a href="job1/<?= esc($datajobs->slug) ?>"><?= esc($datajobs->title) ?></a>-->
										</h6> 
								    </div>
									<ul>
										<li><?php echo $cityidlist->name ?>, <?php echo $stateidlist->name ?></li>
										<li> 
											<p><span class="title">Salary:</span><?= esc($datajobs->salary_from) ?> - <?= esc($datajobs->salary_to) ?> <?= esc($datajobs->salary_currency) ?> / <span class="time"> Per <?= esc($salaryperiodidlist->name) ?></span></p>
										</li>
									</ul>
								</div>
							</div>
						</td>
						<td data-label="Company"><?php echo date('d M, Y',strtotime($list->created)) ?></td>
						<td data-label="Apply Job"><?php echo date('d M, Y',strtotime($datajobs->expiry_date)) ?></td>
						
						<td data-label="Status">
							<a href="javascript:void()" onclick="openDeleteModal(<?= esc($ids) ?>)" id="" class="w-20 btn btn-sm btn-danger"><i class="bx bx-trash"></i></a>
						</td>
					</tr>
				<?php } }?>	
					
				</tbody>
			</table>
			
		</div>
	</div>
</div>

            
    
            
		</div>
		
		
		<!--Delete Modal-->
            <div class="row justify-content-center">
                <div class="col-lg-5">
        			<div id="deleteModal" class="modal fade bd-example-modal-sm" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" >
                    	<div class="modal-dialog">
                    		<div class="modal-content">
                    			<div class="modal-header">
                    				<h5 class="modal-title" id="myModalLabel">Delete Job</h5>
                    				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    			</div>
                    			<div class="modal-body">
                    			    <h5>Are you sure you want to Delete this Job?</h5>
                    				<form method="POST" action="<?php echo base_url('candidate/delete-save-job') ?>" class="needs-validation" novalidate>
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
                </div>
            </div>
    <!-- End Delete Modal -->
		

		
	</div>
</div>

    
	
		
	<?php echo $this->include ('includes/footer.php') ?>
	<?php echo $this->include ('includes/footerjs.php') ?>
	
<script>
    // function openDeleteModal(id)
    // {
    //     var deleteId=document.getElementById('deleteId');
    //     alert(deleteId);
    //     deleteId.value=id;
    //     $('#deleteModal').modal('show');
    // }
    
    
    function openDeleteModal(id)
    {
        var deleteId=document.getElementById('deleteId');
        // alert(deleteId);
        deleteId.value=id;
        
        $('#deleteModal').modal('show');
    }

</script>
</body>

</html>