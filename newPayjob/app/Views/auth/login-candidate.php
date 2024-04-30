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
					<h1>Candidate Login</h1> <span></span>
				</div>
			</div>
		</div>
	</div>
    </div>
    
    <div class="form-bg mt-3 mb-3">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 col-lg-4 col-sm-6 mb-3">
                <div class="form-container">
                    <h3 class="title text-center mb-3">Candidate Login</h3>
                    <?php echo $this->include ('includes/displayerrors.php') ?>
                    <form class="form-horizontal" method="post" action="<?php echo base_url('login-candidate') ?>">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required="">
                        </div>
                        <div class="form-group text-center">
                           <a class="forgot-pass" href="<?php echo base_url('candidate-forgot-password') ?>"><i class="fa fa-key pr-1"></i> I Forgot Password</a>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-block mt-2 text-white" name="submit" id="submit">Login</button>
                        </div>
                        <div class="form-group text-center">
                             <a href="<?php echo base_url('candidate-registration') ?>" class="btn btn-block btn-warning mt-2">Create Account</a>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            <div class="col-md-5 col-lg-5 col-sm-6 mb-3">
                <img src="<?php echo base_url('front/assets/images/auth/candidate-login.png') ?>" class="img-fluid">
            </div>
        </div>
    </div>
    </div>
	
		
	<?php echo $this->include ('includes/footer.php') ?>
	<?php echo $this->include ('includes/footerjs.php') ?>
</body>

</html>