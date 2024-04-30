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
					<h1>Reset Password</h1> <span></span>
				</div>
			</div>
		</div>
	</div>
    </div>
    
    <div class="form-bg mt-5 mb-3">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 col-lg-4 col-sm-6 mb-3">
                <div class="form-container">
                    <h3 class="title text-center mb-3">Reset Password</h3>
                    <?php echo $this->include ('includes/displayerrors.php') ?>
                    <form class="form-horizontal" method="post" action="<?php echo base_url('password-reset-by-employer') ?>">
                        <div class="form-group">
                            <label class="mb-2">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $userdata->company_email ?>" readonly>
                        </div>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $userdata->id ?>" >
                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" onkeyup="checkpassword()" required="">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" onkeyup="checkpassword()" required="">
                        </div>
                        <div class="col-12 mb-2 text-center" id="error"></div>
                        <div class="form-group text-center">
                            <button class="btn btn-block btn-primary mt-2 text-white" type="submit" name="submit">Submit</button>
                        </div>
                        <div class="form-group text-center">
                             <a href="<?php echo base_url('candidate-registration') ?>" class="btn btn-block btn-warning mt-2 text-white">Create Account</a>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            <div class="col-md-4 col-lg-4 col-sm-6 mb-3">
                <img src="<?php echo base_url('front/assets/images/auth/forgot-password1.png') ?>" class="img-fluid">
            </div>
        </div>
    </div>
    </div>
	
		
	<?php echo $this->include ('includes/footer.php') ?>
	<?php echo $this->include ('includes/footerjs.php') ?>
	
<script>

    function checkpassword()
    {
        var pwd = document.getElementById("password").value;
        var cpwd = document.getElementById("cpassword").value;
        if (pwd !== "" && cpwd !== "") {
            if(pwd==cpwd)
            {
            document.getElementById("error").style.color ='Green';
            document.getElementById("error").innerHTML ="";
            }
            else
            {
            document.getElementById("error").style.color ='#ff192f';
            document.getElementById("error").innerHTML ="<span >The passwords you entered do not match.</span>";
            }
        }
    }
</script>    
</body>

</html>