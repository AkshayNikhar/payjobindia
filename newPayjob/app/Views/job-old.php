<?php 
$this->session = session();
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
$companyid=$job->company_id;
$companylist=$this->commonModel->fs('companies',array('id'=>$companyid));
$jtypelist=$this->commonModel->fs('job_attributes_job_types',array('id'=>$job->job_type_id));
$salaryperiodidlist=$this->commonModel->fs('job_attributes_salary_periods',array('id'=>$job->salary_period_id));
$jobexperiencelist=$this->commonModel->fs('job_attributes_job_experiences',array('id'=>$job->job_experience_id));
$genderlist=$this->commonModel->fs('job_attributes_genders',array('id'=>$job->gender_id));
$edulist=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$job->degree_level_id));
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->include ('includes/head.php') ?>
	
</head>

<body >
	<?php echo $this->include ('includes/header.php') ?>
	<div class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="banner-content text-center">
					<h1><?= $job->title ?></h1> <span></span>
				</div>
			</div>
		</div>
	</div>
    </div>
	
	<div class="job-details-pages pt-5 mb-5">
	<div class="container">
		<div class="row g-lg-4 gy-5">
			<div class="col-lg-8">
				<div class="job-details-content">
					<div class="job-list-content">
						<div class="company-area">
							<div class="logo"> <img src="<?php echo base_url('front/assets/images/bg/company-logo/company-01.png') ?>" alt=""> </div>
							<div class="company-details">
								<div class="name-location">
									<h5><a href="#"><?= $job->title ?></a></h5>
									<?php 
									    if($companyid==0){
									    ?>
									    <p>Pay Job Admin</p>
									   <?php }else{ ?>
									<p><?= $companylist->company_name ?></p>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="job-discription">
							<ul class="one">
								<li> <img src="<?php echo base_url('front/assets/images/icon/map-2.svg') ?>" alt="">
									<p><span class="title">Location:</span> Nagpur</p>
								</li>
								<li> <img src="<?php echo base_url('front/assets/images/icon/category-2.svg') ?>" alt="">
									<p><span class="title">Category:</span> Creative Design</p>
								</li>
							</ul>
							<ul>
								<li><img src="<?php echo base_url('front/assets/images/icon/company-2.svg') ?>" alt="">
									<p><span class="title">Job Type:</span> <?= $jtypelist->name ?></p>
								</li>
								<li> <img src="<?php echo base_url('front/assets/images/icon/salary-2.svg') ?>" alt="">
									<p><span class="title">Salary:</span> <?= $job->salary_from ?> - <?= $job->salary_to ?> / <?= $salaryperiodidlist->name ?></p>
								</li>
							</ul>
						</div>
					</div>
					
					<h6 class="mt-5 mb-4">Job Brief:</h6>
					<p> <?php echo $job->description ?></p>
					
					<h6 class="mt-5 mb-4">Key Responsibilities:</h6>
					
					<p> <?php echo $job->responbilities ?></p>
					
					
					<h6 class="mt-5 mb-4">Requirements:</h6>
					<ul class="d-none">
						<li>Bachelor degree to complete any reputational university.</li>
						<li>Bachelor degree to complete any reputational university.</li>
					</ul>
					<?php echo $job->requirements ?>
					
					
				</div>
			</div>
			<div class="col-lg-4">
				<div class="job-details-sidebar mb-120">
					<div class="save-apply-btn d-flex justify-content-end mb-50">
						<ul>
							<li><a class="save-btn" href="#">Save Job <span><i class="bi bi-bookmark-fill"></i></span></a></li>
							<li>
							    <?php 
							     
							    if(!empty($this->session->get('canid'))){
							    ?>
							    
							    <form method="POST" enctype="multipart/form-data" action="<?= base_url('applyjob') ?>" >
							    <input type="hidden" name="userid" value="<?= $this->session->get('canid') ?>">       
							    <input type="hidden" name="jobid" value="<?= $job->id ?>">       
							    <input type="hidden" name="slug" value="<?= $job->slug ?>">       
							    <button type="submit" name="submit" class="primry-btn-2 lg-btn">Apply</button>
							    </form>
							    <?php } else { ?>
                                <a class="primry-btn-2 lg-btn" href="<?php echo base_url('candidate-login') ?>">Apply Position</a>
                                <?php } ?>
							</li>
							   
							<!--<li><a class="primry-btn-2 lg-btn" href="#">Apply Position</a></li>-->
						</ul>
						
					</div>
					<?php echo $this->include ('includes/displayerrors.php') ?>
					<div class="job-summary-area mb-50">
						<div class="job-summary-title">
							<h6>Job Overview:</h6> </div>
						<ul>
							<li>
								<p><span class="title">Post Date:</span>  <?php echo date('d M, Y',strtotime($job->created_at)) ?></p>
							</li>
							<li>
								<p><span class="title">Expired Date:</span>  <?php echo date('d M, Y',strtotime($job->expiry_date)) ?>.</p>
							</li>
							<li>
								<p><span class="title">No of Vacancy:</span> <?= $job->vacancies ?> </p>
							</li>
							<li>
								<p><span class="title">Experiences:</span> <?= $jobexperiencelist->name ?></p>
							</li>
							<li>
								<p><span class="title">Education:</span> <?= $edulist->name ?>.</p>
							</li>
							<li>
								<p><span class="title">Gender:</span> <?= $genderlist->name ?>.</p>
							</li>
						</ul>
					</div>
					
					<div class="job-share-area mb-50">
						<h6>Share this Job:</h6>
						<ul>
							<li><a href="#"><i class="bx bx-link"></i></a></li>
							<li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
							<li><a href="https://twitter.com/"><i class="bx bxl-twitter"></i></a></li>
							<li><a href="https://www.linkedin.com/"><i class="bx bxl-linkedin"></i></a></li>
							<li><a href="https://www.instagram.com/"><i class="bx bxl-instagram-alt"></i></a></li>
						</ul>
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>

<!--Model start-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--Model end-->
		
	<?php echo $this->include ('includes/footer.php') ?>
	<?php echo $this->include ('includes/footerjs.php') ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>