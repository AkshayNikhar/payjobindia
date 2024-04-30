<?php 
use App\Models\CommonModel;
$this->commonModel=new CommonModel();
$this->session = session();
$canid= $this->session->get('canid');
if(!empty($canid)){
$candidatedetails=$this->commonModel->fs('users',array('id'=>$canid));
$this->username=$candidatedetails->name;
$this->useremail=$candidatedetails->email;
$this->userphone=$candidatedetails->mobile;
$this->userrole=$candidatedetails->role;
$this->usergender=$candidatedetails->gender_id;
$this->useredu=$candidatedetails->education;
$this->useredutype=$candidatedetails->degree_type_id;
$this->userfunarea=$candidatedetails->functional_area_id;
$this->userexp=$candidatedetails->experience;
$this->userskill=$candidatedetails->technical_skills;
$this->usercountry=$candidatedetails->country_id;
$this->userstate=$candidatedetails->state;
$this->usercity=$candidatedetails->city;
$this->useraddress=$candidatedetails->address;
$this->userdescription=$candidatedetails->description;
$this->userimage=$candidatedetails->image;
}
$db = db_connect();

?>
<div class="top-bar2">
		<p class="text-white">Welcome To Pay Job India </p>
		<div class="top-bar-right">
			<div class="social-area">
				<ul>
					<li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
					<li><a href="https://twitter.com/"><i class="bx bxl-twitter"></i></a></li>
					<li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<header class="header-area style-3">
		<div class="menu-area">
			<div class="header-logo">
				<a href="<?php echo base_url('/') ?>"><img alt="image" class="img-fluid" src="<?php echo base_url('front/assets/images/logo.png') ?>"></a>
			</div>
			<div class="main-menu">
				<div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
					<div class="mobile-logo-wrap">
						<a href="<?php echo base_url('/') ?>"><img alt="image" src="<?php echo base_url('front/assets/images/logo.png') ?>"></a>
					</div>
					<div class="menu-close-btn"> <i class="bi bi-x-lg"></i> </div>
				</div>
				<ul class="menu-list">
					<li class="<?php if($activemenu=='home') {echo 'active';}?>"> <a href="<?php echo base_url('/') ?>" class="">Home</a> </li>
					<li class="<?php if($activemenu=='about') {echo 'active';}?>"> <a href="<?php echo base_url('about') ?>" class="">About Us</a> </li>
					<li class="<?php if($activemenu=='internships') {echo 'active';}?>"> <a href="<?php echo base_url('internships') ?>" class="">Internships</a> </li>
					<li class="menu-item-has-children"> <a href="#" class="drop-down">For Candidate</a>
						<ul class="sub-menu">
							<li><a href="">Job By City</a>
								<ul class="sub-menu">
									<li><a href="#" class="">Job in Agra</a></li>
									<li><a href="#" class="">Job in Pune</a></li>
									<li><a href="#" class="">Job in Mumbai</a></li>
									<li><a href="#" class="">Job in Nagpur</a></li>
								</ul>
							</li>
							<li><a href="">Job By Department</a>
								<ul class="sub-menu">
									<li><a href="#">Admin / Back Office</a></li>
									<li><a href="#">Advertising / Communication Jobs</a></li>
									<li><a href="#">Beauty / Fitness</a></li>
									<li><a href="#">Consulting</a></li>
									<li><a href="#">CSR</a></li>
									<li><a href="#">Banking</a></li>
									<li><a href="#">Customer Support</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="menu-item-has-children"> <a href="#" class="drop-down">For Employer</a>
						<ul class="sub-menu">
							<li><a href="#">Start Hiring</a></li>
							<li><a href="#">Refund Policy</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</li>
				</ul>
				<div class="for-mobile-menu d-lg-none d-block">
					<div class="sign-in-btn mb-25">
						<a class="primry-btn-1 lg-btn" href="">
							<svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
								<path d="M12.8033 2.19669C11.3868 0.780144 9.50329 0 7.5 0C5.49671 0 3.61324 0.780144 2.19669 2.19669C0.780144 3.61324 0 5.49671 0 7.5C0 9.50329 0.780144 11.3868 2.19669 12.8033C3.61324 14.2199 5.49671 15 7.5 15C9.50329 15 11.3868 14.2199 12.8033 12.8033C14.2199 11.3868 15 9.50329 15 7.5C15 5.49671 14.2199 3.61324 12.8033 2.19669ZM3.25504 12.5771C3.50269 10.4462 5.33478 8.80096 7.5 8.80096C8.64143 8.80096 9.71478 9.24568 10.5222 10.0529C11.2042 10.7351 11.6344 11.6258 11.7451 12.5769C10.5949 13.5402 9.11407 14.1211 7.5 14.1211C5.88593 14.1211 4.40517 13.5403 3.25504 12.5771ZM7.5 7.89574C6.24401 7.89574 5.22205 6.87378 5.22205 5.61779C5.22205 4.36169 6.24401 3.33984 7.5 3.33984C8.75599 3.33984 9.77795 4.36169 9.77795 5.61779C9.77795 6.87378 8.75599 7.89574 7.5 7.89574ZM12.5015 11.834C12.2776 10.9311 11.8105 10.0985 11.1436 9.43153C10.6034 8.89137 9.96437 8.48614 9.26743 8.23219C10.1052 7.66399 10.6569 6.70406 10.6569 5.61779C10.6569 3.87714 9.24065 2.46094 7.5 2.46094C5.75935 2.46094 4.34315 3.87714 4.34315 5.61779C4.34315 6.70464 4.89521 7.66491 5.73372 8.23299C5.09251 8.46668 4.49913 8.82797 3.98861 9.30359C3.24932 9.99207 2.73594 10.8699 2.4979 11.8333C1.48979 10.6712 0.878906 9.15562 0.878906 7.5C0.878906 3.84911 3.84911 0.878906 7.5 0.878906C11.1509 0.878906 14.1211 3.84911 14.1211 7.5C14.1211 9.15596 13.51 10.6718 12.5015 11.834Z" /> </svg> Sign In</a>
					</div>
					<div class="post-job-btn mb-30">
						<a class="primry-btn-2 lg-btn" href="#">
							<svg width="15" height="13" viewBox="0 0 15 13" xmlns="http://www.w3.org/2000/svg">
								<path d="M10.1367 0H4.86329C4.66914 0 4.51173 0.151188 4.51173 0.337662V1.79366H1.43168C0.642247 1.79363 0 2.41049 0 3.16868V11.6249C0 12.3831 0.642247 13 1.43168 13H13.5683C14.3578 13 15 12.3831 15 11.6249V3.16868C15 2.41049 14.3578 1.79363 13.5683 1.79363H10.4883V0.337662C10.4883 0.15116 10.3309 0 10.1367 0ZM5.21485 0.675325H9.78518V1.79366H5.21485V0.675325ZM13.5683 12.3247H1.43168C1.02996 12.3247 0.703126 12.0108 0.703126 11.625V5.31469L5.6836 7.11899V8.14608C5.6836 8.33255 5.84102 8.48374 6.03517 8.48374H8.96486C9.15901 8.48374 9.31642 8.33255 9.31642 8.14608V7.11899L14.2969 5.31472V11.625C14.2969 12.0108 13.9701 12.3247 13.5683 12.3247ZM6.38673 7.80841V6.79543H8.6133V7.80841H6.38673ZM14.2969 3.16868V4.59294L9.3108 6.39926C9.28191 6.24073 9.13821 6.1201 8.96486 6.1201H6.03517C5.86182 6.1201 5.71812 6.2407 5.68923 6.39926L0.703126 4.59297V3.16868C0.703126 2.78284 1.02993 2.46896 1.43168 2.46896H13.5683C13.9701 2.46896 14.2969 2.78284 14.2969 3.16868ZM13.4071 11.0443C13.4071 11.2308 13.2497 11.382 13.0555 11.382H10.1697C9.97558 11.382 9.81816 11.2308 9.81816 11.0443C9.81816 10.8578 9.97558 10.7067 10.1697 10.7067H13.0555C13.2497 10.7067 13.4071 10.8578 13.4071 11.0443ZM1.89337 3.67202C1.89337 3.48555 2.05079 3.33436 2.24494 3.33436H4.09064C4.28479 3.33436 4.44221 3.48555 4.44221 3.67202C4.44221 3.8585 4.28479 4.00968 4.09064 4.00968H2.24494C2.05079 4.00968 1.89337 3.8585 1.89337 3.67202Z" /> </svg> Post Job </a>
					</div>
					<div class="social-area">
						<ul>
							<li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
							<li><a href="https://twitter.com/"><i class="bx bxl-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/"><i class="bx bxl-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="nav-right d-flex jsutify-content-end align-items-center">
				<ul>
				    <?php 
                    if(!empty($canid))
                    {
                    ?>
                    <li class="">
	<div class="btn-group dropdown">
		<div class="notifications-area dropdown-toggle" role="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
		    <?php 
		    if(!empty($this->userimage)){
		    ?>
		    <img class="user-icon" src="<?php echo base_url('back/assets/images/userProfile/'.$this->userimage) ?>" alt="<?php echo $this->username ?>" style="width: 50px;height: 50px;"> <?php echo $this->username ?> 
		    <?php } else { ?>
		    <img class="user-icon" src="https://placehold.jp/50x50.png" alt="" style="width: 50px;height: 50px;"> <?php echo $this->username ?> 
		    <?php } ?>
		 </div>
		<div class="user-card dropdown-menu" aria-labelledby="dropdownMenuButton3" >
			<ul>
			    <li>
					<a href="<?php echo base_url('candidate/dashboard') ?>">
						<i class="fa fa-dashboard text-primary"></i> Dashboard </a>
				</li>
				<li>
					<a href="<?php echo base_url('candidate/profile') ?>">
						<i class="fa fa-user-circle text-primary"></i> My Profile </a>
				</li>
				<li>
					<a href="<?php echo base_url('candidate/applied-jobs') ?>">
						<i class="fa fa-briefcase text-primary"></i> Applied Jobs </a>
				</li>
				<li>
					<a href="<?php echo base_url('candidate/saved-jobs') ?>">
						<i class="fa fa-bookmark-o text-primary"></i> Saved Jobs </a>
				</li>
				<li>
					<a href="<?php echo base_url('candidate/setting') ?>">
						<i class="fa fa-bookmark-o text-primary"></i> Saved Jobs </a>
				</li>
				<li>
					<a href="<?php echo base_url('logout') ?>">
						<i class="fa fa-sign-out text-primary"></i> Log Out </a>
				</li>
			</ul>
		</div>
	</div>
</li>
                    <?php } else { ?>
					<li class="d-md-flex d-none">
						<div class="sign-in-btn">
							<a class="primry-btn-2 lg-btn" href="<?php echo base_url('candidate-login') ?>"> <i class="fa fa-user-circle pr-5"></i> Post Resume</a>
						</div>
					</li>
					<li class="d-md-flex d-none">
						<div class="post-job-btn"> <a class="primry-btn-2 lg-btn" href="<?php echo base_url('employer-login') ?>"><i class="fa fa-briefcase pr-5"></i> Post Job</a> </div>
					</li>
					 <?php } ?>
					
				</ul>
				<div class="sidebar-button mobile-menu-btn "> <i class="bi bi-list"></i> </div>
			</div>
		</div>
	</header>