<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->include ('includes/head.php') ?>
</head>

<body class="bg-wight">
	<?php echo $this->include ('includes/header.php') ?>
	
	<div class="inner-banner">
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
	<div class="container">
		<div class="row g-lg-4 gy-5 mb-90">
			<?php echo $this->include ('candidate/menu.php') ?>
			<div class="col-lg-9">
	<div class="applied-job-area">
		<div class="table-wrapper">
			<div class="table-title-filter">
				<div class="section-title">
					<h5>Applied Jobs:</h5> </div>
			</div>
			<table class="eg-table table category-table mb-30">
				<thead>
					<tr>
						<th>Job Tittle</th>
						<th>Apply Date</th>
						<th>Company</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				    <?php
				    foreach($jobapplied as $job)
				    {
				        $id=$job->id;
				        $jobid=$job->job_id;
				        $joblist=$this->commonModel->fs('jobs_list',array('id'=>$jobid));
				        
				        $companyid=$joblist->company_id;
				        $companylist=$this->commonModel->fs('companies',array('id'=>$companyid));
				        
				        $stateid=$joblist->state_id;
				        $statelist=$this->commonModel->fs('location_states',array('id'=>$stateid));
				        
				        $cityid=$joblist->city_id;
				        $citylist=$this->commonModel->fs('location_cities',array('id'=>$cityid));
				        
				        $salaryperiodidlist=$this->commonModel->fs('job_attributes_salary_periods',array('id'=>$joblist->salary_period_id));
				        
				        // print_r($companylist);
				        
				    ?>
					<tr>
						<td data-label="Job Title">
							<div class="company-info">
								<div class="logo"> <img src="<?php echo base_url('front/assets/images/bg/company-logo/company-06.png') ?>" alt=""> </div>
								<div class="company-details">
									<div class="top">
										<h6><a href="job-details.html"> <?= esc($joblist->title) ?></a></h6> </div>
									<ul>
										<li><?= esc($citylist->name) ?>, <?= esc($statelist->name) ?></li>
										<li> 
											<p><span class="title">Salary:</span> Rs. <?= esc($joblist->salary_from) ?> - <?= esc($joblist->salary_to) ?> / <span class="time"> <?= esc($salaryperiodidlist->name) ?></span></p>
										</li>
									</ul>
								</div>
							</div>
						</td>
						<td data-label="Apply Job"><?php echo date('d M Y',strtotime($job->created_at)) ?></td>
						<td data-label="Company"><a class="view-btn" href=""><?= esc($companylist->company_name) ?></a></td>
						<td data-label="Status">
							<button class="eg-btn purple-btn">Viewed</button>
						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>
			
		</div>
	</div>
</div>
		</div>
		
	</div>
</div>
	
		
	<?php echo $this->include ('includes/footer.php') ?>
	<?php echo $this->include ('includes/footerjs.php') ?>
</body>

</html>