<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->include ('includes/head.php') ?>
	<style>
	   .my-profile-inner .section-title h5:hover {
                color: #ffffff;
                background: #4353ff;
                } 
                
                .h51 {
                    font-size: 1.9rem;
                    color: #4353ff;
                    font-weight: 600;
                }
                .h511{
                font-size: 20px;
                background: #4353ff !important;
                color: #fff !important;
                }
                .h511:hover{
                background: #000 !important;
                color: #fff !important;
                }
                
                .form-wrapper form .form-inner .input-area {
    background: #fff;
    border: 2px solid rgb(0 0 0);
    border-radius: 5px;
    height: 50px;
    padding: 15px 12px;
    width: 100%;
    display: flex;
    align-items: center;
    position: relative;
    transition: .35s;
}
.form-wrapper form .form-inner textarea {
    width: 100%;
    border: 2px solid rgb(0 0 0);
    border-radius: 5px;
    min-height: 120px;
    padding: 20px;
    width: 100%;
    font-family: var(--font-exo2);
    font-weight: 400;
    font-size: .875rem;
    color: var(--title-color1);
    line-height: 1;
    transition: .35s;
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
    
    <div class="dashboard-area pt-10 mb-50">
	<div class="container">
		<div class="row g-lg-4 gy-5 mb-90">
			<?php echo $this->include ('candidate/menu.php') ?>
			<div class="col-lg-10">
	<div class="my-profile-inner">
		<div class="form-wrapper mb-60">
		    <div class="row">
		        <div class="col-lg-2 col-4">
	            	<div class="section-title">
        				<h5>My Profile</h5> 
        			</div>
		        </div>
		        <div class="col-lg-3 col-6">
		            <div class="section-title">
        				<a href="<?php echo base_url('jobs')?>" class="custom-btn btn-11" target="_blank">See More Jobs</a>
        			</div>
		        </div>
		    </div>
		
			
			<!--<form class="profile-form" method="POST" enctype="multipart/form-data" action="#">-->
			<?php echo $this->include ('includes/displayerrors.php') ?>
			<form class="profile-form" method="POST" enctype="multipart/form-data" action="<?= base_url('candidate/edit-candidate-profile'); ?>">
				<div class="row">
				    <input type="hidden" class="form-control" name="id" value="<?php echo $this->session->get('canid') ?>"> 
				    <div class="col-md-6">
				    <div class="title-and-coupon">
                        <div class="title">
                        <h5 class="h51">Resume Upload</h5>
                        </div>
                        <div class="form-inner mb-25">
							<div class="input-area"> 
								<input type="file" name="resume" class="form-control" accept=".pdf,.docx">
							</div>
						</div>
                    
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="title-and-coupon">
                        <div class="title">
                        <h5 class="h51">Profile Image</h5>
                        </div>
						<div class="form-inner mb-25">
							
							<div class="input-area"> 
								<input type="file" name="image" class="form-control" accept=".jpg,.png,.jpeg">
							</div>
						</div>
					</div>
					</div>
                    <div class="title text-left mb-25">
                        <h4 class="h51">OR</h4>
                    </div>
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>Name*</label>
							<div class="input-area"> 
								<input type="text" name="name" class="form-control" value="<?php echo $this->username ?>"> 
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>Email*</label>
							<div class="input-area"> 
								<input type="text" name="email" class="form-control" value="<?php echo $this->useremail ?>"> 
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>Mobile Number*</label>
							<div class="input-area"> 
								<input type="text" name="mobile" class="form-control" value="<?php echo $this->userphone ?>"> 
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>Gender*</label>
							<div class="input-area"> 
								<select class="form-control form-select js-example-basic-single" name="gender_id">
                                <option selected hidden>Select Gender ...</option>
                                <?php
                                           
								    foreach($gender as $gen)
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
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>Education*</label>
							<div class="input-area"> 
								<select class="form-control form-select " name="education" id="degree_level_id">
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
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>Degree*</label>
							<div class="input-area"> 
								<select class="form-control form-select js-example-basic-single" name="degree_type_id" id="degree_type_id">
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
					
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>Job Category*</label>
							<div class="input-area"> 
							<select class="form-control form-select " name="jobcate_id" id="job_category_id">
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
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>Functional Area*</label>
							<div class="input-area"> 
							<select class="form-control form-select" name="functional_area_id" id="functional_area_id">
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
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>Career Level*</label>
							<div class="input-area"> 
							<select class="form-control form-select js-example-basic-single" name="career_level_id" id="career_level_id">
							    <option selected hidden>Select  ...</option>
								<?php
                                           
								    foreach($careerlevel as $career)
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
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>Experience*</label>
							<div class="input-area"> 
								<select class="form-control form-select " name="experience">
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
					
					<div class="col-md-8">
						<div class="form-inner mb-25">
							<label>Technical Skills*</label>
							<div class="input-area"> 
								<input type="text"  name="technical_skills" class="form-control" value="<?php echo $this->userskill ?>">
							</div>
						</div>
					</div>
					
					
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>Country*</label>
							<div class="input-area"> 
								<select class="form-control" name="country_id" id="country_id">
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
					
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>State*</label>
							<div class="input-area"> 
								<select class="form-control form-select " name="state" id="state_id">
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
					<div class="col-md-4">
						<div class="form-inner mb-25">
							<label>City*</label>
							<div class="input-area"> 
							<select class="form-control js-example-basic-single" name="city" id="city_id">
							    <option selected hidden>Select City ...</option>
								<?php
                                    if(!empty($city))
                                    {       
								    foreach($city as $cities)
									    {
									        if($cities->id == $this->usercity)
									        {
									            $sel='selected';
									        }
									        else
                                            {
                                                $sel='';
                                            }
                                        echo '<option value="'.$cities->id.'" '.$sel.'>'.$cities->name.'</option>';
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
								<input type="text" class="form-control" name="address" value="<?php echo $this->useraddress ?>">
							</div>
						</div>
					</div>
					
					<div class="col-md-12">
                    <div class="form-inner mb-50">
                    <label>Description*</label>
                    <textarea type="text" class="form-control" name="description" placeholder="Write something about yourself.........."><?php echo $this->userdescription ?></textarea>
                    </div>
                    </div>
				
					<div class="col-md-12">
						<div class="form-inner">
							<button class="primry-btn-2 lg-btn w-unset" type="submit">Update Profile</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="form-wrapper d-none">
			<div class="section-title">
				<h5>Social Network:</h5> </div>
			<form class="profile-form">
				<div class="row">
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Facebook</label>
							<div class="input-area"> <img src="assets/images/icon/facebook-2.svg" alt="">
								<input type="text" > </div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Twitter</label>
							<div class="input-area"> <img src="assets/images/icon/twiter-2.svg" alt="">
								<input type="text" > </div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>LinkedIn</label>
							<div class="input-area"> <img src="assets/images/icon/linkedin-2.svg" alt="">
								<input type="text" > </div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Pinterest</label>
							<div class="input-area"> <img src="assets/images/icon/pinterest-2.svg" alt="">
								<input type="text" > </div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Dribbble</label>
							<div class="input-area"> <img src="assets/images/icon/dribble-2.svg" alt="">
								<input type="text"> </div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-inner">
							<button class="primry-btn-2 lg-btn w-unset" type="submit">Update</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
		</div>
		
	</div>
</div>
	
		
	<?php echo $this->include ('includes/footer.php') ?>
	<?php echo $this->include ('includes/footerjs.php') ?>
	
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