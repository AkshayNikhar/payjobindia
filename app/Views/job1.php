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
$edutype=$this->commonModel->fs('job_attributes_degree_types',array('id'=>$job->degree_type_id));
$functionarea=$this->commonModel->fs('function_area',array('id'=>$job->functional_area_id));
$states=$this->commonModel->fs('location_states',array('id'=>$job->state_id));
$city=$this->commonModel->fs('location_cities',array('id'=>$job->city_id));
$careerlevel=$this->commonModel->fs('job_attributes_career_levels',array('id'=>$job->career_level_id));

$totalapply=$this->commonModel->allCount('job_applicants',array('job_id'=>$job->id));




?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->include ('includes/head.php') ?>
	<style>
	
	.form-select {
    color: #979797;
}

	    .modal-dialog.modal-sm {
    width: 500px;
    }
    .close {
    float: right;
    font-size: 21px;
    line-height: 1;
    color: #000;
    opacity: 1;
}
    .modal-header {
    position: relative;
    background: #4552ff;
    color: white;
}
    .job-details-content .job-list-content .company-area .logo img {
    border-radius: 50%;
    height: 100px;
    width: 100px;
}
.job-details-content .job-list-content .company-area .company-details .name-location h5 a {
    font-size: 1.9rem;
    /*font-size: 2.063rem;*/
    font-weight: 600;
    color: var(--title-color1);
    font-family: var(--font-exo2);
    transition: .35s;
    text-transform: uppercase;
}

.inner-banner {
    background-image: url(../front/assets/images/banner.jpg);
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    padding: 50px 0;
}

.modal-dialog
{
    width:50%;
    top:1%;
}
@media(max-width:480px) {
    .modal-dialog
{
    width:90%;
}
	html {
		font-size: 90%;
	}
	.job-details-content .job-list-content .company-area {
    display: block !important;
    align-items: center;
    position: relative;
    }
    .light-yellow{
        display:block;
    }
    .light-purple{
        display:block;
    }
    .mt-10{
        margin-top:10px;
    }
    .job-details-content .job-list-content .company-area .company-details .name-location h5 a {
    font-size: 20px;
    
    }
    .col-sticky {
    position: sticky;
    top: 0;
    height: 600px;
    /*overflow: scroll;*/
    top: 0;
    left: 0;
    z-index: 1;
    position: static;
    /*position: sticky;*/
    top: 5.5em;
    padding: 0px 1em;
    }
}
.btn-success {
    color: #fff;
    background-color: #198754;
    border-color: #198754;
}
.pr-2
{
    padding-right:3px;
}

.inner-banner0 {
    background-image: url(https://payjobindia.com/front/assets/job-details.jpg);
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    padding: 50px 0;
}
	</style>
</head>

<body>
	<?php echo $this->include ('includes/header.php') ?>
	<div class="inner-banner d-none">
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
	
	<div class="job-details-pages  pt-5 mb-5">
	<div class="inner-banner0">    
    	<div class="container">
    		<div class="row g-lg-4 gy-5">
    			<div class="col-lg-12">
    				<div class="job-details-content">
    					<div class="job-list-content">
    						<div class="company-area">
    							<!--<div class="logo d-sm-block"> <img src="<?php echo base_url('front/assets/images/favicon.png') ?>" alt=""> </div>-->
    							<div class="company-details">
    								<div class="name-location">
    									<h5><a><?= $job->title ?> (<?= esc($functionarea->name)?> - <?= esc($edulist->name)?>)</a></h5>
    									
    								<div class="job-type" style="margin-top:15px">
                                    <span class="light-yellow" style="border: 1px solid #4353ff;padding: 10px;border-radius: 28px;font-weight: 700;">Date Posted : <?php echo date('d M, Y',strtotime($job->created_at)) ?></span>
                                    <span class="light-purple mt-10" style="border: 1px solid #4353ff;padding: 10px;border-radius: 28px;font-weight: 700;">Expired Date : <?php echo date('d M, Y',strtotime($job->expiry_date)) ?></span>
                                    </div>
                                    
    								<div class="job-type" style="margin-top:20px">
                                    <span class="light-yellow mb-10" style="padding: 10px;border-radius: 28px;font-weight: 700;">Location : <?=esc($states->name)?>, <?=esc($city->name)?></span>
                                    <span class="light-purple " style="padding: 10px;border-radius: 28px;font-weight: 700;">Total Apply : <?=esc($totalapply)?></span>
                                    </div>
    								
    								<?php 
    							     
    							    if(!empty($this->session->get('canid'))){
    							     //   check if already applied
    							     
    							     $already=$this->commonModel->allCount('job_applicants',array('job_id'=>$job->id, 'user_id'=>$this->session->get('canid')));
    							     if($already==0)
    							     {
    							    ?>
    							    
    							         
    							        <button type="submit" name="submit" class="primry-btn-2 lg-btn" data-toggle="modal" data-target="#applyModal" style="margin-top:20px">Apply Now</button>
    							    
    							    <?php
    							     }
    							     else
    							     {
    							         ?>
    							          <button type="submit" name="submit" class="primry-btn-2 btn-success lg-btn"  style="margin-top:20px"><i class="fa fa-check pr-2"></i> Already Applied</button>
    							         <?php
    							     }
    							    } 
    							    else 
    							    { 
    							    ?>
                                    <a class="primry-btn-2 lg-btn" href="<?php echo base_url('candidate-login') ?>" style="margin-top:20px">Apply Now</a>
                                    <?php } ?>	
    								</div><br>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
	</div>
	
	<div class="container">
	    <div class="row">
    		<div class="col-lg-8 col-sticky">
    		    <?php echo $this->include ('includes/displayerrors.php') ?>
    			<div class="job-details-content">		
    				<div class="company-details-content">
    				<h3 class="mt-5 mb-4" style="font-weight: 700;color: #4353ff;">Job Overview:</h3>
                        <div class="row pt-20">
                            <div class="col-sm-4 col-6 mb-50">
                            <div class="working-process d-flex">
                            <div class="icon">
                            <i class="bx bx-square" style="font-size: 25px;margin-right: 10px;font-weight: 900;color: #ff9104;"></i>
                            </div>
                            <div class="work-content">
                            
                            <h6 class="text-dark">Degree Level</h6>
                            <p><?= $edutype->name ?></p>
                            <!--<p><?= $edulist->name ?></p>-->
                            </div>
                            </div>
                            </div>
                            <div class="col-sm-4 col-6 mb-50">
                            <div class="working-process d-flex">
                            <div class="icon">
                            <i class="bx bx-square" style="font-size: 25px;margin-right: 10px;font-weight: 900;color: #ff9104;"></i>
                            </div>
                            <div class="work-content">
                            
                            <h6 class="text-dark">Career Level</h6>
                            <p><?=  $careerlevel->name ?></p>
                            </div>
                            </div>
                            </div>
                            <div class="col-sm-4 col-6 mb-50">
                            <div class="working-process d-flex">
                            <div class="icon">
                            <i class="bx bx-square" style="font-size: 25px;margin-right: 10px;font-weight: 900;color: #ff9104;"></i>
                            </div>
                            <div class="work-content">
                            
                            <h6 class="text-dark">Gender</h6>
                            <p><?= $genderlist->name ?></p>
                            </div>
                            </div>
                            </div>
                            <div class="col-sm-4 col-6 mb-50">
                            <div class="working-process d-flex">
                            <div class="icon">
                            <i class="bx bx-square" style="font-size: 25px;margin-right: 10px;font-weight: 900;color: #ff9104;"></i>
                            </div>
                            <div class="work-content">
                            <h6 class="text-dark">Experience</h6>
                            <p><?= $jobexperiencelist->name ?></p>
                            </div>
                            </div>
                            </div>
                            <div class="col-sm-4 col-6 mb-50">
                            <div class="working-process d-flex">
                            <div class="icon">
                            <i class="bx bx-square" style="font-size: 25px;margin-right: 10px;font-weight: 900;color: #ff9104;"></i>
                            </div>
                            <div class="work-content">
                            <h6 class="text-dark">Remote Work</h6>
                            <p><?= $job->work_mode ?></p>
                            <!--<p><?= $jtypelist->name ?></p>-->
                            </div>
                            </div>
                            </div>
                            <div class="col-sm-4 col-6 mb-50">
                            <div class="working-process d-flex">
                            <div class="icon" >
                            <i class="bx bx-square" style="font-size: 25px;margin-right: 10px;font-weight: 900;color: #ff9104;"></i>
                            </div>
                            <div class="work-content">
                            <h6 class="text-dark">Offered Salary</h6>
                            <p><?= $job->salary_from ?> - <?= $job->salary_to ?> / <?= $salaryperiodidlist->name ?></p>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    if($job->isdisplay_des==0){
                    
                    if(empty($careerlevel->description)){
                        
                    }else{
                    ?>
                    <h6 class="mt-5 mb-4">Job Brief:</h6>
                    <?php echo $careerlevel->description ?>
                    <?php } } else { ?>
                    <h6 class="mt-5 mb-4">Job Brief:</h6>
                    <?php echo $job->company_des ?>
                    <?php } ?>
                    
                    
                    <?php
                    if($job->isdisplay_res==0){
                    if(empty($careerlevel->responbilities)){
                        
                    }else{
                    ?>
                    <h6 class="mt-5 mb-4">Key Responsibilities:</h6>
                    <?php echo $careerlevel->responbilities ?>
                    <?php } } else { ?>
                    <h6 class="mt-5 mb-4">Key Responsibilities:</h6>
                    <?php echo $job->company_responbility_home ?>
                    <?php } ?>
                    
                    <?php 
                    if($job->isdisplay_req==0){
                    if(empty($careerlevel->requirements)){
                        
                    }else{
                    ?>
                    <h6 class="mt-5 mb-4">Key Requirement:</h6>
                    <?php echo $careerlevel->requirements ?>
                    <?php } } else { ?>
                    <h6 class="mt-5 mb-4">Key Requirement:</h6>
                    <?php echo $job->company_requirement_home ?>
                    <?php } ?>
                    
    				
    				
    			
    				
    				
    			</div>
    		</div>
    		<div class="col-lg-4">
    			<div class="job-details-sidebar mb-120">
    				<img src="<?php echo base_url('front/assets/images/banner11.jpeg') ?>" width="100%">
    				<!--<img src="https://placehold.jp/500x700.png" width="100%">-->
    			</div>
    		</div>
		</div>
	</div>
	

</div>

<!--Model start-->
<div id="applyModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h5 class="modal-title">Apply- <?= $job->title ?></h5>
        <button type="button" class="close" data-dismiss="modal" style="color:white">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="<?= base_url('applyjob') ?>" class="d-none">
	    <input type="hidden" name="userid" value="<?= $this->session->get('canid') ?>">       
	    <input type="hidden" name="jobid" value="<?= $job->id ?>">       
	    <input type="hidden" name="companyid" value="<?= $companylist->id ?>">       
	    <input type="hidden" name="vendorid" value="<?= $job->vendorID ?>">       
	    <input type="hidden" name="slug" value="<?= $job->slug ?>">  
          <div class="form-group mb-3">
            <label for="resume" class="mb-2"> Upload Resume:</label>
            <input type="file" class="form-control" name="resume" id="resume" accept=".pdf,.docx">
          </div>
          
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        
        <form class="profile-form" method="POST" enctype="multipart/form-data" action="<?= base_url('candidate/edit-candidate-profile2'); ?>">
            <input type="hidden" name="userid" value="<?= $this->session->get('canid') ?>">       
	    <input type="hidden" name="jobid" value="<?= $job->id ?>">       
	    <input type="hidden" name="companyid" value="<?= $companylist->id ?>">       
	    <input type="hidden" name="vendorid" value="<?= $job->vendorID ?>">       
	    <input type="hidden" name="slug" value="<?= $job->slug ?>">
	    
				<div class="row">
				    <input type="hidden" class="form-control" name="id" value="<?php echo $this->session->get('canid') ?>"> 
				    <div class="col-md-6">
				    <div class="title-and-coupon">
                        <div class="title">
                        <h5 class="h51">Resume Upload</h5>
                        </div>
                        <div class="form-inner mb-25">
							<div class="input-area"> 
								<input type="file" name="resume" class="form-control" accept=".pdf,.docx" >
							</div>
						</div>
                    
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-and-coupon">
                        <div class="title">
                        <h5 class="h51">Image</h5>
                        </div>
						<div class="form-inner mb-25">
							
							<div class="input-area"> 
								<input type="file" name="image" class="form-control" accept=".jpg,.png,.jpeg" >
							</div>
						</div>
					</div>
					</div>
                    <div class="title text-left mb-25">
                        <h4 class="h51">OR</h4>
                    </div>
					
					
					<div class="col-lg-4 col-md-4">
						<div class="form-inner mb-25">
							<label>Education*</label>
							<div class="input-area"> 
								<select class="form-control form-select " name="education" id="degree_level_id" required>
								    <option selected hidden>Select Education ...</option>
								<?php
                                           
								    foreach($degree as $deg)
									    {
									        if($deg->id == $this->useredu)
									        {
									            $sel='selected';
									        }
									        else
                                            {
                                                $sel='';
                                            }
                                        echo '<option value="'.$deg->id.'" '.$sel.'>'.$deg->name.'</option>';
									    }
							    ?>
							     </select>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="form-inner mb-25">
							<label>Degree*</label>
							<div class="input-area"> 
								<select class="form-control form-select js-example-basic-single1" name="degree_type_id" id="degree_type_id" required>
								    <option selected hidden>Select Degree ...</option>
								<?php
                                           
								    foreach($degreetype as $degty)
									    {
									        if($degty->id == $this->useredutype)
									        {
									            $sel='selected';
									        }
									        else
                                            {
                                                $sel='';
                                            }
                                        echo '<option value="'.$degty->id.'" '.$sel.'>'.$degty->name.'</option>';
									    }
							    ?>
							     </select>
						    </div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4">
						<div class="form-inner mb-25">
							<label>Job Category*</label>
							<div class="input-area"> 
							<select class="form-control form-select " name="jobcate_id" id="job_category_id" required>
							    <option selected hidden>Select Job Category ...</option>
								<?php
                                           
								    foreach($jobcate as $jobcates)
									    {
									        if($jobcates->id == $this->userjobcate_id)
									        {
									            $sel='selected';
									        }
									        else
                                            {
                                                $sel='';
                                            }
                                        echo '<option value="'.$jobcates->id.'" '.$sel.'>'.$jobcates->name.'</option>';
									    }
							    ?>
							     </select>
							
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="form-inner mb-25">
							<label>Functional Area*</label>
							<div class="input-area"> 
							<select class="form-control form-select" name="functional_area_id" id="functional_area_id" required>
							    <option selected hidden>Select Functional Area ...</option>
								<?php
                                           
								    foreach($function_area as $funare)
									    {
									        if($funare->id == $this->userfunarea)
									        {
									            $sel='selected';
									        }
									        else
                                            {
                                                $sel='';
                                            }
                                        echo '<option value="'.$funare->id.'" '.$sel.'>'.$funare->name.'</option>';
									    }
							    ?>
							     </select>
							
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="form-inner mb-25">
							<label>Career Level*</label>
							<div class="input-area"> 
							<select class="form-control form-select js-example-basic-single1" name="career_level_id" id="career_level_id" required>
							    <option selected hidden>Select  ...</option>
								<?php
                                           
								    foreach($careerlevel1 as $career)
									    {
									        if($career->id == $this->usercareerlevel_id)
									        {
									            $sel='selected';
									        }
									        else
                                            {
                                                $sel='';
                                            }
                                        echo '<option value="'.$career->id.'" '.$sel.'>'.$career->name.'</option>';
									    }
							    ?>
							     </select>
							
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="form-inner mb-25">
							<label>Experience*</label>
							<div class="input-area"> 
								<select class="form-control form-select " name="experience" required>
								    <option selected hidden>Select Experience ...</option>
								<?php
                                           
								    foreach($exp as $exps)
									    {
									        if($exps->id == $this->userexp)
									        {
									            $sel='selected';
									        }
									        else
                                            {
                                                $sel='';
                                            }
                                        echo '<option value="'.$exps->id.'" '.$sel.'>'.$exps->name.'</option>';
									    }
							    ?>
							     </select>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="form-inner mb-25">
							<label>Gender*</label>
							<div class="input-area"> 
								<select class="form-control form-select js-example-basic-single1" name="gender_id" required>
                                <option selected hidden>Select Gender ...</option>
                                <?php
                                           
								    foreach($gender1 as $gen)
									    {
									        if($gen->id == $this->usergender)
									        {
									            $sel='selected';
									        }
									        else
                                            {
                                                $sel='';
                                            }
                                        echo '<option value="'.$gen->id.'" '.$sel.'>'.$gen->name.'</option>';
									    }
							    ?>
                                </select>
                            </div>
						</div>
					</div>
					<div class="col-lg-8 col-md-8">
						<div class="form-inner mb-25">
							<label>Technical Skills*</label>
							<div class="input-area"> 
								<input type="text"  name="technical_skills" class="form-control" value="<?php echo $this->userskill ?>" required>
							</div>
						</div>
					</div>
					
					
					<div class="col-lg-4 col-md-4">
						<div class="form-inner mb-25">
							<label>Country*</label>
							<div class="input-area"> 
								<select class="form-select" name="country_id" id="country_id" required>
								    <option selected hidden>Select Country ...</option>
								<?php
                                    if(!empty($country))
                                    {        
								    foreach($country as $countr)
									    {
									        if($countr->id == $this->usercountry)
									        {
									            $sel='selected';
									        }
									        else
                                            {
                                                $sel='';
                                            }
                                        echo '<option value="'.$countr->id.'" '.$sel.'>'.$countr->name.'</option>';
									    }
                                    }
							    ?>
							     </select>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4">
						<div class="form-inner mb-25">
							<label>State*</label>
							<div class="input-area"> 
								<select class="form-control form-select " name="state" id="state_id" required>
								    <option selected hidden>Select State ...</option>
								<?php
                                    if(!empty($state))
                                    {       
								    foreach($state as $states)
									    {
									        if($states->id == $this->userstate)
									        {
									            $sel='selected';
									        }
									        else
                                            {
                                                $sel='';
                                            }
                                        echo '<option value="'.$states->id.'" '.$sel.'>'.$states->name.'</option>';
									    }
                                    }
							    ?>
							     </select>
						    </div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="form-inner mb-25">
							<label>City*</label>
							<div class="input-area"> 
							<select class="form-select js-example-basic-single1" name="city1" id="city_id" required>
							    <option selected hidden>Select City ...</option>
								<?php
                                    if(!empty($city))
                                    {       
								    foreach($city1 as $cities)
									    {
									        
                                            ?>
                                       <option value="<?php echo $cities->id ?>"  <?php if($cities->id == $this->usercity) {echo 'selected';} ?>><?php echo $cities->name ?></option>
                                        <?
                                        
									    }
                                    }
							    ?>
							     </select>
							
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-inner mb-25">
							<label>Address*</label>
							<div class="input-area">
								<input type="text" class="form-control" name="address" value="<?php echo $this->useraddress ?>" required>
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
                    <div class="form-inner mb-50">
                    <label>Description*</label>
                    <textarea type="text" class="form-control" name="description" placeholder="Write something about yourself.........." ><?php echo $this->userdescription ?></textarea>
                    </div>
                    </div>
				
					<div class="col-md-12">
						<div class="form-inner">
							<button class="primry-btn-2 lg-btn w-unset" type="submit">Submit</button>
						</div>
					</div>
				</div>
			</form>
			
      </div>
      <div class="modal-footer d-none">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--Model end-->
		
	<?php echo $this->include ('includes/footer.php') ?>
	<?php echo $this->include ('includes/footerjs.php') ?>
  <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 

<script>


$(document).ready(function () {
$("#country_id").change(function () {
var countryid = $(this).val(); // Get the selected state ID
// alert(countryid);
var urls = "https://payjobindia.com/get-stateid-by-countryid/" + countryid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        // console.log(data);
        document.getElementById('state_id').innerHTML=data;
    }
});
});
});
</script>
<script>
$(document).ready(function () {
$("#state_id").change(function () {
var stateid = $(this).val(); // Get the selected state ID
var urls = "https://payjobindia.com/get-cityid-by-stateid/" + stateid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        // console.log(data);
        document.getElementById('city_id').innerHTML=data;
    }
});
});
});
</script>
<script>
$(document).ready(function () {
$("#job_category_id").change(function () {
var jobcategoryid = $(this).val(); // Get the selected state ID
var urls = "https://payjobindia.com/get-functionid-by-jobcateid/" + jobcategoryid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        // console.log(data);
        document.getElementById('functional_area_id').innerHTML=data;
    }
});
});
});
</script>
<script>
$(document).ready(function () {
$("#functional_area_id").change(function () {
var functionareaid = $(this).val(); // Get the selected state ID
var urls = "<?= base_url('')?>/get-careerlevelid-by-functionareaid/" + functionareaid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        // console.log(data);
        document.getElementById('career_level_id').innerHTML=data;
    }
});
});
});
</script>


<script>
$(document).ready(function () {
$("#degree_level_id").change(function () {
var degreelevelid = $(this).val(); // Get the selected state ID
// alert(degreelevelid);
var urls = "<?= base_url('')?>/get-educationid-by-degreelevelid/" + degreelevelid;

$.ajax({
    url: urls,
    method: "GET",
    success: function (data) {
        // console.log(data);
        // document.getElementById('degree_type_id').innerHTML=data;
        $('#degree_type_id').html(data);
       $('#degree_type_id').select2();
    }
});
});
});


</script>
    
</body>

</html>