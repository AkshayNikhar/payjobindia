<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->include ('includes/head.php') ?>
	<style>
	    .job-search-area {
        max-width: 100%;
        }
	</style>
</head>

<body >
	<?php echo $this->include ('includes/header.php') ?>
	<div class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="banner-content text-center">
					<h1>All Job</h1> <span></span>
				</div>
			</div>
		</div>
	</div>
    </div>
	
	<section class="mt-5 mb-5">
			<div class="container">
			    <div class="row mb-20 justify-content-center">
			        <div class="col-lg-10 ">
					    <div class="job-search-area">
					        <?php echo $this->include ('searchform.php') ?>
						</div>
					</div>
			    </div>
				<div class="row mb-60">
					
					<div class="col-lg-12 ">
						<div class="row">
						     <?php
						    foreach($jobs as $list)
                            {
                                $id=$list->id;
                                $companyid=$list->company_id;
                                $jobexperienceid=$list->job_experience_id;
                                $salaryperiodid=$list->salary_period_id;
                                
                                $functionalareaidid=$list->functional_area_id;
                                $degreelevelid=$list->degree_level_id;
                                $jobtypeid=$list->job_type_id;
                                $genderid=$list->gender_id;
                                $cityid=$list->city_id;
                                
                                $jobexperiencelist=$this->commonModel->fs('job_attributes_job_experiences',array('id'=>$jobexperienceid));
                                $companylist=$this->commonModel->fs('companies',array('id'=>$companyid));
                                $salaryperiodidlist=$this->commonModel->fs('job_attributes_salary_periods',array('id'=>$salaryperiodid));
                                
                                $functionalareaidlist=$this->commonModel->fs('job_attributes_functional_areas',array('id'=>$functionalareaidid));
                                $degreelevelidlist=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$degreelevelid));
                                $jobtypeidlist=$this->commonModel->fs('job_attributes_job_types',array('id'=>$jobtypeid));
                                $genderidlist=$this->commonModel->fs('job_attributes_genders',array('id'=>$genderid));
                                $cityidlist=$this->commonModel->fs('location_cities',array('id'=>$cityid));
                                
                                ?>
							<div class="col-lg-4 col-md-4">
								<div class="job-listing-card2">
									<div class="job-content">
										<div class="company-area">
											<div class="logo"> <img src="<?php echo base_url('front/assets/images/bg/company-logo/company-01.png') ?>" alt=""> </div>
											<div class="company-details">
												<div class="name-location">
												    
													<h5><a href="job/<?= esc($list->slug) ?>"><?= esc($list->title) ?></a></h5>
													
													<ul>
														<li>
															<p><span class="title"><?= esc($functionalareaidlist->name) ?> - </span> <?= esc($degreelevelidlist->name) ?></p>
															<!--<p><span class="title">Post Date:</span> <?php echo date('d M, Y',strtotime($list->created_at)) ?></p>-->
														</li>
													</ul>
												</div>
											</div>
											<div class="bookmark"> <i class="bi bi-bookmark"></i> </div>
										</div>
										<div class="company-area">
											
											<div class="company-details">
												<div class="name-location">
												    <ul>
														<li>
															<p><span class="title"><?= esc($jobtypeidlist->name) ?>  </span> </p>
														</li>
														<li>
															<p><span class="title text-capitalize"><?= esc($list->work_mode) ?>  </span> </p>
														</li>
													</ul>
												</div>
											</div>
											
										</div>
										<div class="job-discription mt-20">
											<ul>
												<li>
													<p><span class="title">Salary:</span> <?= esc($list->salary_from) ?> <?= esc($list->salary_currency) ?> - <?= esc($list->salary_to) ?> <?= esc($list->salary_currency) ?> / <span class="time"><?= esc($salaryperiodidlist->name) ?></span></p>
												</li>
												<li>
													<p><span class="title">Experience:</span> <?= esc($jobexperiencelist->name) ?> </p>
												</li>
												<li>
													<p><span class="title">Gender:</span> <?= esc($genderidlist->name) ?></p> 
												</li>
												<li>
													<p><span class="title">Location:</span> <?= esc($cityidlist->name) ?></p> 
												</li>
												<li>
													<p><span class="title">Expire Date:</span> <?php echo date('d M, Y',strtotime($list->expiry_date)) ?>
												</li>
											</ul>
										</div>
										<div class="job-type-apply">
											<!--<div class="job-type"> <span class="light-green">Full Time</span> </div>-->
											<div class="apply-btn"> <a href="job/<?= esc($list->slug) ?>" class="primry-btn-2 lg-btn">Apply Now</a> </div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="col-lg-4 col-md-4 d-none">
								<div class="job-listing-card2">
									<div class="job-content">
										<div class="company-area">
											<div class="logo"> <img src="<?php echo base_url('front/assets/images/bg/company-logo/company-02.png') ?>" alt=""> </div>
											<div class="company-details">
												<div class="name-location">
													<h5><a href="<?php echo base_url('job') ?>">Graphic Designer</a></h5>
													<ul>
														<li>
															<p><span class="title">Post Date:</span> 2 Dec, 2023</p>
														</li>
													</ul>
												</div>
											</div>
											<div class="bookmark"> <i class="bi bi-bookmark"></i> </div>
										</div>
										<div class="job-discription">
											<ul>
												<li>
													<p><span class="title">Salary:</span> 10000 INR - 50000 INR / <span class="time">Per Month</span></p>
												</li>
												<li>
													<p><span class="title">Experience:</span> 3-3.5 Years</p>
												</li>
												<li>
													<p><span class="title">Location:</span> Nagpur</p>
												</li>
											</ul>
										</div>
										<div class="job-type-apply">
											<div class="job-type"> <span class="light-green">Full Time</span> </div>
											<div class="apply-btn"> <a href="<?php echo base_url('job') ?>" class="primry-btn-2 lg-btn">Apply Now</a> </div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 d-none">
								<div class="job-listing-card2">
									<div class="job-content">
										<div class="company-area">
											<div class="logo"> <img src="<?php echo base_url('front/assets/images/bg/company-logo/company-04.png') ?>" alt=""> </div>
											<div class="company-details">
												<div class="name-location">
													<h5><a href="<?php echo base_url('job') ?>">SEO Specialist</a></h5>
													<ul>
														<li>
															<p><span class="title">Post Date:</span> 2 Dec, 2023</p>
														</li>
													</ul>
												</div>
											</div>
											<div class="bookmark"> <i class="bi bi-bookmark"></i> </div>
										</div>
										<div class="job-discription">
											<ul>
												<li>
													<p><span class="title">Salary:</span> 10000 INR - 50000 INR / <span class="time">Per Month</span></p>
												</li>
												<li>
													<p><span class="title">Experience:</span> 3-3.5 Years</p>
												</li>
												<li>
													<p><span class="title">Location:</span> Nagpur</p>
												</li>
											</ul>
										</div>
										<div class="job-type-apply">
											<div class="job-type"> <span class="light-green">Full Time</span> </div>
											<div class="apply-btn"> <a href="<?php echo base_url('job') ?>" class="primry-btn-2 lg-btn">Apply Now</a> </div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 d-none">
								<div class="job-listing-card2">
									<div class="job-content">
										<div class="company-area">
											<div class="logo"> <img src="<?php echo base_url('front/assets/images/bg/company-logo/company-03.png') ?>" alt=""> </div>
											<div class="company-details">
												<div class="name-location">
													<h5><a href="<?php echo base_url('job') ?>">PHP Developer</a></h5>
													<ul>
														<li>
															<p><span class="title">Post Date:</span> 2 Dec, 2023</p>
														</li>
													</ul>
												</div>
											</div>
											<div class="bookmark"> <i class="bi bi-bookmark"></i> </div>
										</div>
										<div class="job-discription">
											<ul>
												<li>
													<p><span class="title">Salary:</span> 10000 INR - 50000 INR / <span class="time">Per Month</span></p>
												</li>
												<li>
													<p><span class="title">Experience:</span> 3-3.5 Years</p>
												</li>
												<li>
													<p><span class="title">Location:</span> Nagpur</p>
												</li>
											</ul>
										</div>
										<div class="job-type-apply">
											<div class="job-type"> <span class="light-green">Full Time</span> </div>
											<div class="apply-btn"> <a href="<?php echo base_url('job') ?>" class="primry-btn-2 lg-btn">Apply Now</a> </div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 d-none">
								<div class="job-listing-card2">
									<div class="job-content">
										<div class="company-area">
											<div class="logo"> <img src="<?php echo base_url('front/assets/images/bg/company-logo/company-01.png') ?>" alt=""> </div>
											<div class="company-details">
												<div class="name-location">
													<h5><a href="<?php echo base_url('job') ?>">WordPress Developer</a></h5>
													<ul>
														<li>
															<p><span class="title">Post Date:</span> 2 Dec, 2023</p>
														</li>
													</ul>
												</div>
											</div>
											<div class="bookmark"> <i class="bi bi-bookmark"></i> </div>
										</div>
										<div class="job-discription">
											<ul>
												<li>
													<p><span class="title">Salary:</span> 10000 INR - 50000 INR / <span class="time">Per Month</span></p>
												</li>
												<li>
													<p><span class="title">Experience:</span> 3-3.5 Years</p>
												</li>
												<li>
													<p><span class="title">Location:</span> Nagpur</p>
												</li>
											</ul>
										</div>
										<div class="job-type-apply">
											<div class="job-type"> <span class="light-green">Full Time</span> </div>
											<div class="apply-btn"> <a href="<?php echo base_url('job') ?>" class="primry-btn-2 lg-btn">Apply Now</a> </div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 d-none">
								<div class="job-listing-card2">
									<div class="job-content">
										<div class="company-area">
											<div class="logo"> <img src="<?php echo base_url('front/assets/images/bg/company-logo/company-02.png') ?>" alt=""> </div>
											<div class="company-details">
												<div class="name-location">
													<h5><a href="<?php echo base_url('job') ?>">Graphic Designer</a></h5>
													<ul>
														<li>
															<p><span class="title">Post Date:</span> 2 Dec, 2023</p>
														</li>
													</ul>
												</div>
											</div>
											<div class="bookmark"> <i class="bi bi-bookmark"></i> </div>
										</div>
										<div class="job-discription">
											<ul>
												<li>
													<p><span class="title">Salary:</span> 10000 INR - 50000 INR / <span class="time">Per Month</span></p>
												</li>
												<li>
													<p><span class="title">Experience:</span> 3-3.5 Years</p>
												</li>
												<li>
													<p><span class="title">Location:</span> Nagpur</p>
												</li>
											</ul>
										</div>
										<div class="job-type-apply">
											<div class="job-type"> <span class="light-green">Full Time</span> </div>
											<div class="apply-btn"> <a href="<?php echo base_url('job') ?>" class="primry-btn-2 lg-btn">Apply Now</a> </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		
	<?php echo $this->include ('includes/footer.php') ?>
	<?php echo $this->include ('includes/footerjs.php') ?>
</body>

</html>