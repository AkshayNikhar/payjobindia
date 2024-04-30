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
	<div class="form-wrapper">
		<form class="profile-form">
			<div class="section-title2">
				<h5 class="d-flex align-items-baseline gap-1"><img src="assets/images/icon/profile-settings.svg" alt=""> Profile Settings </h5> </div>
			<div class="change-password-area mb-40">
				<div class="row">
					<div class="col-lg-12">
						<div class="info-title">
							<h6>Change Your Password</h6>
							<div class="dash"></div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label for="password">New Password*</label>
							<div class="input-area"> <img src="assets/images/icon/lock-2.svg" alt="">
								<input type="password" name="password" id="password" placeholder="Password"> <i class="bi bi-eye-slash" id="togglePassword"></i> </div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-inner mb-25">
							<label for="password2">Confirm Password*</label>
							<div class="input-area"> <img src="assets/images/icon/lock-2.svg" alt="">
								<input type="password" name="confirmpassword" id="password2" placeholder="Confirm Password"> <i class="bi bi-eye-slash" id="togglePassword2"></i> </div>
						</div>
					</div>
					<div class="col-md-12 pt-10">
						<div class="form-inner">
							<button class="primry-btn-2 lg-btn w-unset" type="submit">Update</button>
						</div>
					</div>
				</div>
			</div>
			
		</form>
	</div>
</div>
		</div>
		
	</div>
</div>
	
		
	<?php echo $this->include ('includes/footer.php') ?>
	<?php echo $this->include ('includes/footerjs.php') ?>
</body>

</html>