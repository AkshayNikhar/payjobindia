<?php 
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
$cityid=$jobscity1->id;
$jobscity=$this->commonModel->allFetchd('jobs_list',array('is_active'=>1,'city_id'=>$cityid));
$currentdate = date('Y-m-d');
?>
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
					<h1><?php echo $jobscity1->name ?></h1> <span></span>
				</div>
			</div>
		</div>
	</div>
    </div>
	
	<section class="mt-5 mb-5">
			<div class="container">
			    <div class="row mb-20 justify-content-center d-none">
			        <div class="col-lg-10 ">
					    <div class="job-search-area">
					        <!--?php echo $this->include ('searchform.php') ?-->
					            <form>
                                    <div class="form-inner job-title">
                                    	<input type="text" placeholder="Job title/Keyword"> </div>
                                    <div class="form-inner category">
                                    	<select class="form-select form-control" name="state" id="state">
                                    		<option selected="" hidden="">State</option>
                                    		    <?php
												    foreach($state as $s)
												    {
                                                    echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
												    }
												?>
                                    	</select>
                                    </div>
                                    <div class="form-inner category">
                                    	<select class="form-select form-control" name="city" id="cityid">
                                    		<option  selected="" hidden="">City</option>
                                    		<?php
												    foreach($city as $s)
												    {
                                                    echo '<option value="'.$s->id.'" '.$sel.'>'.$s->name.'</option>';
												    }
												?>
                                    	</select>
                                    </div>
                                    <div class="form-inner">
                                    	<button type="submit" class="primry-btn-2 ">
                                    	    <img src="<?php echo base_url() ?>/front/assets/images/icon/search-icon.svg" alt=""> Search
                                    	</button>
                                    </div>
                                </form>
						</div>
					</div>
			    </div>
				<div class="row mb-60">
					
					<div class="col-lg-12 ">
						<div class="row">
						     <?php
						     if(count($jobscity)>0){
						    foreach($jobscity as $list)
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
                                <div class="col-lg-6 col-md-6">
								<div class="job-listing-card2">
									<div class="job-content">
										<div class="company-area">
											<div class="logo"> 
											<img src="<?php echo base_url('front/assets/images/favicon.png') ?>" alt=""> 
											
											</div>
											<div class="company-details">
												<div class="name-location">
												    
													<h3>
													    
													    <a href="<?php echo base_url('job1/'.$list->slug)?>" class="text-blu"><?= esc($list->title) ?></a>
													    
													    - <span class="title fs-16 fw-500 text-blu"><?= esc($functionalareaidlist->name) ?> - <?= esc($degreelevelidlist->name) ?></span>
													    <!--<a href="job1/<?= esc($list->slug) ?>" class="text-blu"><?= esc($list->title) ?></a> - <span class="title fs-16 fw-500 text-blu"><?= esc($functionalareaidlist->name) ?> - <?= esc($degreelevelidlist->name) ?></span>-->
													    </h3>
													
													<ul class="d-none">
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
            							        <a href="<?php echo base_url('job1/'.$list->slug) ?>" class="primry-btn-2 lg-btn">View More </a> 
											    <?php
                                                 }
                                                 else
                                                 { ?>
                							    <a href="<?php echo base_url('job1/'.$list->slug) ?>" class="success-btn-2 lg-btn"><i class="fa fa-check pr-2"></i>  Applied</a>
											<?php } 
							                    
							                ?>
											
                                            
											
											<!--<a href="<!?php echo base_url('job1/'.$list->slug) ?>" class="primry-btn-2 lg-btn">Apply </a> -->
											
											</div>
											<!--<div class="apply-btn"> <a href="job1/<?= esc($list->slug) ?>" class="primry-btn-2 lg-btn">Apply </a> </div>-->
										</div>
										</div>
									</div>
								</div>
							</div>
							
							<?php } } ?>
							<?php }
						    else{
						         ?>
                        <div class="col-lg-12 ">
						<div class="alert alert-info text-center" role="alert">
                            <strong>Jobs  Not Found!</strong>
                        </div>
                        </div>
                        <?php } ?>
						</div>
					</div>
					
					
				</div>
			</div>
		</section>
		
	<?php echo $this->include ('includes/footer.php') ?>
	<?php echo $this->include ('includes/footerjs.php') ?>
</body>

</html>