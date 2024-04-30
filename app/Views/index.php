<?php 
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
// $this->session = session();
$session = session();
// $this->session->start();
$currentdate = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'includes/head.php' ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
	    
.no-js .owl-carousel, .owl-carousel.owl-loaded 
{
    display: block;
}


	</style>
</head>

<body class="bg-wight">
	<div class="eg-preloder"> </div>
	<?php include 'includes/header.php' ?>
		<div class="hero3">
			<div class="hero-wapper">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-8">
							<div class="hero-content">
								<h5 class="fw600">INDIA’S #1 JOB PLATFORM</h5>
								<h1>Discover Your Dream Job with Us </h1>
								<p class="text-black fw800">Your Ultimate Destination for Career Opportunities</p>
								
								<div class="job-search-area">
									<form method="get" action="<?php echo base_url('job_search')?>" >
                                        <div class="form-inner job-title">
                                        	<input type="text" name="jobs" placeholder="Job title/Keyword"> 
                                        </div>
                                        <div class="form-inner job-title">
                                        	<input type="text" name="location" id="location" placeholder="Enter Your City" autocomplete="off"> 
                                        </div>
                                        
                                        <div class="form-inner">
                                        	<button type="submit" class="primry-btn-2 ">
                                        	    <img src="<?php echo base_url('front/assets/images/icon/search-icon.svg')?>" alt=""> Search
                                        	</button>
                                        </div>
                                    </form>
								</div>
								<section class="deals mt-2">
									<div class="card-block">
										<div class="cat-slider owl-carousel owl-theme">
										   <?php
						    
                						    foreach($jobs as $list)
                                            {
                                                $careerlist=$list->career_level_id;
                                                $careerlevel=$this->commonModel->fs('job_attributes_career_levels',array('id'=>$careerlist));
                                                
                                                $functionalareaid=$list->functional_area_id;
                                                $functionallist=$this->commonModel->fs('function_area',array('id'=>$functionalareaid));
                                                
                                                $jobcategory=$list->jobcategory;
                                                $jobcatelist=$this->commonModel->fs('job_category',array('id'=>$jobcategory));
                                               
                                            ?>
                                           
											<div class="item"><a href="<?php echo base_url('career-level-jobs/'.$careerlevel->slug) ?>"><span class="badge badge-pill badge-blue"><?php echo $careerlevel->name ?></span></a> </div>
											<!--<div class="item"><a href="<?= base_url('jobs-by-career-level/' . $jobcatelist->slug . '/' . $functionallist->slug.'/'.$careerlevel->slug) ?>"><span class="badge badge-pill badge-blue"><?php echo $careerlevel->name ?></span></a> </div>-->
											<?php } ?>
											<!--<div class="item"> <span class="badge badge-pill badge-blue">IT Job</span> </div>-->
											<!--<div class="item"> <a href="#"><span class="badge badge-pill badge-blue">Marketing</span></a> </div>-->
											<!--<div class="item"> <a href="#"><span class="badge badge-pill badge-blue">Graphic Design</span></a> </div>-->
											<!--<div class="item"> <a href="#"><span class="badge badge-pill badge-blue">Web Developer</span></a> </div>-->
											<!--<div class="item"> <a href="#"><span class="badge badge-pill badge-blue">Animation</span></a> </div>-->
											<!--<div class="item"> <a href="#"><span class="badge badge-pill badge-blue"> Multimedia</span></a> </div>-->
											<!--<div class="item"> <a href="#"><span class="badge badge-pill badge-blue">Human Resource</span></a> </div>-->
											<!--<div class="item"> <a href="#"><span class="badge badge-pill badge-blue">Marketing</span></a> </div>-->
											<!--<div class="item"> <a href="#"><span class="badge badge-pill badge-blue">Graphic Design</span></a> </div>-->
										</div>
									</div>
									<div class="mt-30">
										<p>Unlock 50 Lakh+ Career Opportunities Await You</p>
									</div>
								</section>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="hero-img"> <img class="img-fluid" src="<?php echo base_url('front/assets/images/bg/banner-image-1.png') ?>" alt> </div>
							<!--<div class="hero-img"> <img class="img-fluid" src="<?php echo base_url('front/assets/images/bg/hero3-img-with-vec.png') ?>" alt> </div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="home4-feature-area mb-80">
			<div class="container">
				<div class="row mb-60">
					<div class="col-lg-8">
						<div class="section-title1">
							<h2>View All <span>Latest Jobs</span></h2> </div>
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
                                
                                $functionalareaidlist=$this->commonModel->fs('function_area',array('id'=>$functionalareaidid));
                                // $functionalareaidlist=$this->commonModel->fs('job_attributes_functional_areas',array('id'=>$functionalareaidid));
                                $degreelevelidlist=$this->commonModel->fs('job_attributes_degree_levels',array('id'=>$degreelevelid));
                                $jobtypeidlist=$this->commonModel->fs('job_attributes_job_types',array('id'=>$jobtypeid));
                                $genderidlist=$this->commonModel->fs('job_attributes_genders',array('id'=>$genderid));
                                $cityidlist=$this->commonModel->fs('location_cities',array('id'=>$cityid));
                                $vacantytypeidlist=$this->commonModel->fs('vacancy_type',array('id'=>$list->vacancy_type));
                                
                                
                                
                                if($currentdate < $list->expiry_date) {
                                    
                                ?>
                                
							<div class="col-lg-12 col-md-6">
								<div class="job-listing-card2">
									<div class="job-content">
										<div class="company-area">
											<div class="logo"> 
											<img src="<?php echo base_url('front/assets/images/favicon.png') ?>" alt=""> 
											</div>
											<div class="company-details">
												<div class="name-location">
												    
													<h3>
													    
													    <a href="job1/<?= esc($list->slug) ?>" class="text-blu"><?= esc($list->title) ?></a> 
        												
													
													- <span class="title fs-16 fw-500 text-blu"><?= esc($functionalareaidlist->name) ?> - <?= esc($degreelevelidlist->name) ?></span></h3>
													
													<ul class="d-none">
														<li>
															<p><span class="title"><?= esc($functionalareaidlist->name) ?> - </span> <?= esc($degreelevelidlist->name) ?></p>
															<!--<p><span class="title">Post Date:</span> <?php echo date('d M, Y',strtotime($list->created_at)) ?></p>-->
														</li>
													</ul>
												</div>
											</div>
											<div class="bookmark"> 
											<?php 
							                if(!empty($this->session->get('canid')))
							                {
							                    $alreadysave=$this->commonModel->allCount('jobsave',array('jobid'=>$id, 'userid'=>$this->session->get('canid')));
							                    if($alreadysave==0)
                                                {
            							    ?>
            							    <form method="post" >
											    <input type="hidden" id="JobID" name="JobID" value="<?= $id ?>">
											    <input type="hidden" id="userId" name="userId" value="<?= $canid ?>">
											    <!--<button type="submit" onclick="wishlistform()" id="wishbtn" class="bg-white"><i class="bi bi-bookmark"></i></button>-->
											    <button type="button" onclick="wishlistform(<?= $id ?>, <?= $canid ?>)" id="wishbtn_<?= $id ?>" class="bg-white">
											       <i class="bi bi-bookmark"></i>
											    </button>
											</form>
            							    
            							    <?php
                                            }
                                            else
                                            { ?>
											<a class="bg-white" href="<?php echo base_url('candidate/saved-jobs') ?>"><i class="bi bi-bookmark-heart"></i></a>
											<?php } } else { ?>
                                            <a class="bg-white" href="<?php echo base_url('candidate-login') ?>"><i class="bi bi-bookmark"></i></a>
                                            <?php } ?>	
											</div>
										</div>
										<div class="company-area">
											
											<div class="company-details">
												<div class="name-location">
												    <ul>
														<li>
															<p><span class="title fs-16 text-blu"><?= esc($vacantytypeidlist->name) ?>  </span> </p>
														</li>
														<li>
															<p><span class="title fs-16 text-blu"><?= esc($jobtypeidlist->name) ?>  </span> </p>
														</li>
														<li>
															<p><span class="title fs-16 text-capitalize text-blu"><?= esc($list->work_mode) ?>  </span> </p>
														</li>
													</ul>
												</div>
											</div>
											
										</div>
										<div class="d-flex">
										<div class="job-discription mt-1 width-88">
											<ul>
												<li>
													<p><span class="title"><img src="<?php echo base_url('front/assets/images/icon/location.png')?>" class="icon-jobss">Location : </span> <?= esc($cityidlist->name) ?></p> 
												</li>
												<li>
													<p><span class="title"><img src="<?php echo base_url('front/assets/images/icon/experience.png')?>" class="icon-jobss">Experience : </span> <?= esc($jobexperiencelist->name) ?> </p>
												</li>
												<li>
													<p><span class="title"><img src="<?php echo base_url('front/assets/images/icon/gender.png')?>" class="icon-jobss">Gender :</span> <?= esc($genderidlist->name) ?></p> 
												</li>
												<li>
													<p><span class="title"><img src="<?php echo base_url('front/assets/images/icon/salary.png')?>" class="icon-jobss">Salary :</span> <?= esc($list->salary_from) ?> <?= esc($list->salary_currency) ?> - <?= esc($list->salary_to) ?> <?= esc($list->salary_currency) ?> / <span class="time"><?= esc($salaryperiodidlist->name) ?></span></p>
												</li>
											    <li>
													<p><span class="title"><img src="<?php echo base_url('front/assets/images/icon/date.png')?>" class="icon-jobss">Expire Date :</span> <?php echo date('d M, Y',strtotime($list->expiry_date)) ?>
												</li>
												    
											</ul>
											
										</div>
										<div class="job-type-apply width-13">
											<!--<div class="job-type"> <span class="light-green">Full Time</span> </div>-->
											<div class="apply-btn"> 
											
											<?php 
											
											
							                
							                    $already=$this->commonModel->allCount('job_applicants',array('job_id'=>$id, 'user_id'=>$this->session->get('canid')));
							                 //   print_r($already);
							                    if($already==0)
                                                {
            							        ?>
            							        <a href="job1/<?= esc($list->slug) ?>" class="primry-btn-2 lg-btn">View More </a> 
											    <?php
                                                 }
                                                 else
                                                 { ?>
                							    <a href="javascript:void(0);" class="success-btn-2 lg-btn"><i class="fa fa-check pr-2"></i>  Applied</a>
                							    <!--<a href="job1/<!?= esc($list->slug) ?>" class="success-btn-2 lg-btn"><i class="fa fa-check pr-2"></i>  Applied</a>-->
											<?php } 
							                    
							                 ?>
											
                                            	
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
							<?php } } ?>
						</div>
						<div class="text-center"> <a href="<?php echo base_url('jobs')?>" class="primry-btn-2 lg-btn mb-2">More Jobs</a> </div>
					</div>
					<div class="col-lg-4 col-sticky">
						<h5 class="bg-blue-head">Featured Job</h5>
						<div class="row">
							<div class="col-md-12">
							<?php
                            foreach($jobs1 as $list)
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
                                $vacantytypeidlist=$this->commonModel->fs('vacancy_type',array('id'=>$list->vacancy_type));
                                
                                if($currentdate < $list->expiry_date) {
                                ?>
								<div class="item-job">
									<article>
										<div class="item-job-list bottom-hover">
											<div class="item-job-half">
												<div class="item-flex-box">
													<div class="item-job-pos">
														<h3 class="jb-title"><a href="job1/<?= esc($list->slug) ?>" style="color:#0000ff"><?= esc($list->title) ?></a></h3>
														<div class="job-location"> <span><i class="fa fa-map-marker pr-10 pl-5"></i>Location : <?= esc($cityidlist->name) ?></span> <span class="ml-2"><i class="fa fa-intersex pr-10 pl-5"></i>Gender : <?= esc($genderidlist->name) ?></span> <span class="ml-2"><i class="fa fa-plus-square-o pr-10 pl-5"></i>Experience : <?= esc($jobexperiencelist->name) ?></span> <span class="ml-2"></span><i class="fa fa-inr pr-10 pl-5"></i> Salary : <?= esc($list->salary_from) ?> - <span class="price-text"><?= esc($list->salary_to) ?> <span class="suffix"><?= esc($list->salary_currency) ?></span></span> <span class="ml-2"><i class="fa fa-calendar-check-o pr-10 pl-5"></i> Expire Date :<?php echo date('M d, Y',strtotime($list->expiry_date)) ?></span> </div>
													</div>
												</div>
											</div>
										</div>
									</article>
								</div>
							<?php } } ?>	
							</div>
						</div>
						<h5 class="bg-blue-head mt-30">Internship</h5>
						<div class="row">
							<div class="col-md-12">
							    <?php
                            foreach($jobs2 as $list)
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
                                $vacantytypeidlist=$this->commonModel->fs('vacancy_type',array('id'=>$list->vacancy_type));
                                
                                if($currentdate < $list->expiry_date) {
                                ?>
								<div class="item-job">
									<article>
										<div class="item-job-list bottom-hover">
											<div class="item-job-half">
												<div class="item-flex-box">
													<div class="item-job-pos">
														<h3 class="jb-title"><a href="job1/<?= esc($list->slug) ?>" style="color:#0000ff"><?= esc($list->title) ?></a></h3>
														<div class="job-location"> <span><i class="fa fa-map-marker pr-10 pl-5"></i>Location : <?= esc($cityidlist->name) ?></span> <span class="ml-2"><i class="fa fa-intersex pr-10 pl-5"></i>Gender : <?= esc($genderidlist->name) ?></span> <span class="ml-2"><i class="fa fa-plus-square-o pr-10 pl-5"></i>Experience : <?= esc($jobexperiencelist->name) ?></span> <span class="ml-2"></span><i class="fa fa-inr pr-10 pl-5"></i> Salary : <?= esc($list->salary_from) ?> - <span class="price-text"><?= esc($list->salary_to) ?> <span class="suffix"><?= esc($list->salary_currency) ?></span></span> <span class="ml-2"><i class="fa fa-calendar-check-o pr-10 pl-5"></i> Expire Date :<?php echo date('M d, Y',strtotime($list->expiry_date)) ?></span> </div>
													</div>
												</div>
											</div>
										</div>
									</article>
								</div>
									<?php }  } ?>	
								
							</div>
						</div>
						<h5 class="bg-blue-head mt-30">Work From Home</h5>
						<div class="row">
							<div class="col-md-12">
							    <?php
                            foreach($jobs2 as $list)
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
                                $vacantytypeidlist=$this->commonModel->fs('vacancy_type',array('id'=>$list->vacancy_type));
                                
                                if($currentdate < $list->expiry_date) {
                                ?>
								<div class="item-job">
									<article>
										<div class="item-job-list bottom-hover">
											<div class="item-job-half">
												<div class="item-flex-box">
													<div class="item-job-pos">
														<h3 class="jb-title"><a href="job1/<?= esc($list->slug) ?>" style="color:#0000ff"><?= esc($list->title) ?></a></h3>
														<div class="job-location"> <span><i class="fa fa-map-marker pr-10 pl-5"></i>Location : <?= esc($cityidlist->name) ?></span> <span class="ml-2"><i class="fa fa-intersex pr-10 pl-5"></i>Gender : <?= esc($genderidlist->name) ?></span> <span class="ml-2"><i class="fa fa-plus-square-o pr-10 pl-5"></i>Experience : <?= esc($jobexperiencelist->name) ?></span> <span class="ml-2"></span><i class="fa fa-inr pr-10 pl-5"></i> Salary : <?= esc($list->salary_from) ?> - <span class="price-text"><?= esc($list->salary_to) ?> <span class="suffix"><?= esc($list->salary_currency) ?></span></span> <span class="ml-2"><i class="fa fa-calendar-check-o pr-10 pl-5"></i> Expire Date :<?php echo date('M d, Y',strtotime($list->expiry_date)) ?></span> </div>
													</div>
												</div>
											</div>
										</div>
									</article>
								</div>
								<?php } } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="home1-trusted-company two mt-60 mb-60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title1">
							<h2>Featured <span>Companies</span></h2> </div>
						<div class="swiper trusted-company-slider">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="company-logo"><a href="#"><img src="<?php echo base_url('front/assets/images/company/1.jpg') ?>" alt=""></a> </div>
								</div>
								<div class="swiper-slide">
									<div class="company-logo"><a href="#"><img src="<?php echo base_url('front/assets/images/company/2.jpg') ?>" alt=""></a> </div>
								</div>
								<div class="swiper-slide">
									<div class="company-logo"><a href="#"><img src="<?php echo base_url('front/assets/images/company/3.jpg') ?>" alt=""></a> </div>
								</div>
								<div class="swiper-slide">
									<div class="company-logo"><a href="#"><img src="<?php echo base_url('front/assets/images/company/4.jpg') ?>" alt=""></a> </div>
								</div>
								<div class="swiper-slide">
									<div class="company-logo"><a href="#"><img src="<?php echo base_url('front/assets/images/company/5.jpg') ?>" alt=""></a> </div>
								</div>
								<div class="swiper-slide">
									<div class="company-logo"><a href="#"><img src="<?php echo base_url('front/assets/images/company/6.jpg') ?>" alt=""></a> </div>
									<!--<div class="company-logo"><a href="<!?php echo base_url('company-profile/elite-hangstroman') ?>"><img src="<!?php echo base_url('front/assets/images/company/6.jpg') ?>" alt=""></a> </div>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hirefrom two mt-60 mb-60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title1">
							<h2>Hire from  <span>50+</span> Job Categories</h2> </div>
						<div class="mt-4"> 
						<?php
						foreach($jobcate as $list){
						?>
						<a href="job-category/<?= esc($list->slug) ?>"><span class="badge badge-pill badge-blue1 mb-2"><?php echo $list->name?></span></a>
						<?php } ?>
						<span class="moretext d-none">
                    <a href=""><span class="badge badge-pill badge-blue1 mb-2">Creative Writing</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Fashion Journalism</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Internet Journalism</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Journalism</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Sports Journalism</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Hindi Journalism</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">English Journalism</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Urdu Journalism</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Reporter</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Photographer</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Actor</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Journalist</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Script writer</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Dancer</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Choreographer</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Disc Jockey</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Model</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Dramatics</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Cartoonist</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Hair Stylist</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Pedicurist and Manicurist</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Make Up Artist</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Mehendi Artist</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Skin Specialist</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Nail/ Tatoo artist</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Spa Therapist</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Beauty Wellness Advisor/Consultant</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Barber</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Leather Designer</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Footwear Cutter</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Leather goods Stitcher</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Tailoring</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Fashion Designer</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Fabric Cutter</span></a> </span> <a class="moreless-button d-none" href="javascript:void()">Show All</a> </div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="home3-user-feedback mb-120">
			<div class="container">
				<div class="row g-4 gy-5">
					<div class="col-lg-6">
						<div class="user-feedback-left">
							<div class="section-title1">
								<h2>Trusted by <span>10,000+</span> employer </h2>
								<p class="fw600 mt-3">Discover why more than 10,000 employer choose Pay Job India.</p>
								<p class="mt-4 mb-3">Join the ranks of satisfied employers who have chosen Pay Job India as their workforce partner. Discover the difference that a reliable and forward-thinking workforce solution can make for your business.</p>
								<div class="sign-in-btn"> <a class="primry-btn-2 lg-btn" href="<?php echo base_url('employer-login') ?>">  Login Now <i class="fas fa-angle-right pl-5"></i></a> </div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="counter-area">
							<div class="row divider justify-content-center">
								<div class="col-sm-6 mb-60">
									<div class="counter-single">
										<div class="counter-icon"> <img src="<?php echo base_url('front/assets/images/icon/companies.svg') ?>" alt="image"> </div>
										<div class="coundown">
											<p>Employer</p>
											<div class="d-flex align-items-center gap-2">
												<h3 class="odometer">10000</h3> <span>+</span> </div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 mb-60">
									<div class="counter-single two">
										<div class="counter-icon"> <img src="<?php echo base_url('front/assets/images/icon/job2.svg') ?>" alt="image"> </div>
										<div class="coundown">
											<p>Jobs</p>
											<div class="d-flex align-items-center gap-2">
												<h3 class="odometer">20000</h3> <span>+</span> </div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 d-flex">
									<div class="counter-single three">
										<div class="counter-icon"> <img src="<?php echo base_url('front/assets/images/icon/candidates.svg') ?>" alt="image"> </div>
										<div class="coundown">
											<p>Languages</p>
											<div class="d-flex align-items-center gap-2">
												<h3 class="odometer">24</h3> <span>+</span> </div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="counter-single four">
										<div class="counter-icon"> <img src="<?php echo base_url('front/assets/images/icon/new-jobs.svg') ?>" alt="image"> </div>
										<div class="coundown">
											<p>Years of Exp.</p>
											<div class="d-flex align-items-center gap-2">
												<h3 class="odometer">5</h3> <span>+</span> </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hirefrom two mt-60 mb-60">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title1">
							<h2>Hire from  <span>750+</span> Cities</h2> </div>
						<div class="mt-4"> 
						<?php
						foreach($city as $list){
						?>
						<a href="city-wise-job/<?= esc($list->slug) ?>"><span class="badge badge-pill badge-blue1 mb-2"><?php echo $list->name?></span></a> 
						<?php } ?>
						<span class="moretext1 d-none">
                    <a href=""><span class="badge badge-pill badge-blue1 mb-2">Rajkot</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Kalyan-Dombivali</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Vasai-Virar</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Varanasi</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Srinagar</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Aurangabad</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Dhanbad</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Amritsar</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Navi Mumbai</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Allahabad</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Howrah</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Ranchi</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Jabalpur</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Indore</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Thane</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Bhopal</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Visakhapatnam</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Pimpri-Chinchwad</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Patna</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Vadodara</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Ghaziabad</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Ludhiana</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Agra</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Nashik</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Faridabad</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Gwalior</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Coimbatore</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Vijayawada</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Jodhpur</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Madurai</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Raipur</span></a> <a href=""><span class="badge badge-pill badge-blue1 mb-2">Kota</span></a> </span> <a class="moreless-button1 d-none" href="javascript:void()">Show All</a> </div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<section class=" bg-gray mt-120 pt-50 pb-20" id="services">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="title-box text-center">
							<div class="section-title1">
								<h2>Why Should Use <span>Pay Job India</span> ?</h2> </div>
							<p class="mt-2">At Pay Job India, we understand the significance of finding the right job that aligns with your skills and aspirations. Here's why you should make us your go-to platform for all your job search needs:</p>
						</div>
					</div>
				</div>
				<div class="row mt-5 mb-5">
					<div class="col-md-4 col-sm-6 mb-3">
						<div class="serviceBox">
							<div class="service-content"> <i class="service-icon fa fa-search"></i>
								<h3 class="title">Effortless Job Search</h3>
								<p class="description"> Explore diverse job opportunities tailored to your skills and ambitions. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-3">
						<div class="serviceBox">
							<div class="service-content"> <i class="service-icon fa fa-newspaper-o"></i>
								<h3 class="title">Seamless Application Process</h3>
								<p class="description"> Apply to multiple jobs with just a few clicks, saving you time and energy. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-3">
						<div class="serviceBox">
							<div class="service-content"> <i class="service-icon fa fa-check"></i>
								<h3 class="title">Job Security Priority</h3>
								<p class="description"> Connect with reputable employers for a secure job-seeking experience. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-3">
						<div class="serviceBox">
							<div class="service-content"> <i class="service-icon fa fa fa-file-o"></i>
								<h3 class="title">Professional CV Creation</h3>
								<p class="description"> Craft an impressive CV effortlessly with our user-friendly tools. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-3">
						<div class="serviceBox">
							<div class="service-content"> <i class="service-icon fa fa-file-text-o"></i>
								<h3 class="title">Easy CV Publication</h3>
								<p class="description"> Showcase your skills to potential employers by easily publishing your CV on our platform. </p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-3">
						<div class="serviceBox">
							<div class="service-content"> <i class="service-icon fa fa-phone"></i>
								<h3 class="title">Dedicated Online Support</h3>
								<p class="description"> Receive assistance and guidance throughout your job search journey. </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<?php include 'includes/footer.php' ?>
<?php include 'includes/footerjs.php' ?>
	
		
<script>
$(document).ready(function () {
$("#state").change(function () {
var stateid = $(this).val(); // Get the selected state ID
var urls = "<?php echo base_url() ?>/get-cityid-by-stateid/" + stateid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        // console.log(data);
        document.getElementById('cityid').innerHTML=data;
    }
});
});
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		<?php
// Display Toastr messages if set in the session flashdata
if ($this->session->has('success')) {
    echo "<script>toastr.success('".$this->session->getFlashdata('success')."');</script>";
}

if ($this->session->has('error')) {
    echo "<script>toastr.error('".$this->session->getFlashdata('error')."');</script>";
}
?>
	
</body>

</html>