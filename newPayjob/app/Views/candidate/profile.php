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
	<div class="my-profile-inner">
		<div class="form-wrapper mb-60">
			<div class="section-title">
				<h5>My Profile</h5> 
			</div>
			<!--<form class="profile-form" method="POST" enctype="multipart/form-data" action="#">-->
			<form class="profile-form" method="POST" enctype="multipart/form-data" action="<?= base_url('candidate/edit-candidate-profile'); ?>">
				<div class="row">
				    <input type="hidden" class="form-control" name="id" value="<?php echo $this->session->get('canid') ?>"> 
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Name*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/user-2.svg')?>" alt="">
								<input type="text" name="name" class="form-control" value="<?php echo $this->username ?>"> 
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Email*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/clock-2.svg')?>" alt="">
								<input type="text" name="email" class="form-control" value="<?php echo $this->useremail ?>"> 
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Mobile Number*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/map-2.svg')?>" alt="">
								<input type="text" name="mobile" class="form-control" value="<?php echo $this->userphone ?>"> 
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Gender*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/phone-2.svg')?>" alt="">
								<select class="form-control form-select" name="gender_id">
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
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Education*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/email-2.svg')?>" alt="">
								<select class="form-control form-select" name="education">
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
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Degree*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/website-2.svg')?>" alt="">
								<select class="form-control form-select" name="degree_type_id">
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
					
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Functional Area*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/qualification-2.svg')?>" alt="">
							<select class="form-control form-select" name="functional_area_id">
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
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Experience*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/qualification-2.svg')?>" alt="">
								<select class="form-control form-select" name="experience">
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
					
					<div class="col-md-12">
						<div class="form-inner mb-25">
							<label>Technical Skills*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/map-2.svg')?>" alt="">
								<input type="text"  name="technical_skills" class="form-control" value="<?php echo $this->userskill ?>">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Image*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/map-2.svg')?>" alt="">
								<input type="file" name="image" class="form-control" accept=".jpg,.png,.jpeg">
							</div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Country*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/email-2.svg')?>" alt="">
								<select class="form-control form-select" name="country_id">
								    <option selected hidden>Select Country ...</option>
								<?php
                                           
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
							    ?>
							     </select>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>State*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/website-2.svg')?>" alt="">
								<select class="form-control form-select" name="state">
								    <option selected hidden>Select State ...</option>
								<?php
                                           
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
							    ?>
							     </select>
						    </div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>City*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/qualification-2.svg')?>" alt="">
							<select class="form-control form-select" name="city">
							    <option selected hidden>Select City ...</option>
								<?php
                                           
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
							    ?>
							     </select>
							
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Address*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/qualification-2.svg')?>" alt="">
								<input type="text" class="form-control" name="address" value="<?php echo $this->useraddress ?>">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label>Resume Upload*</label>
							<div class="input-area"> <img src="<?php echo base_url('front/assets/images/icon/map-2.svg')?>" alt="">
								<input type="file" name="resume" class="form-control" accept=".pdf,.docx">
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
</body>

</html>