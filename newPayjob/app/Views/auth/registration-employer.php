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
					<h1>Employer Registration</h1> <span></span>
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
                    <h3 class="title text-center mb-3">Employer Registration</h3>
                    <?php echo $this->include ('includes/displayerrors.php') ?>
                    <form class="form-horizontal" method="post" action="<?php echo base_url('store-employer') ?>">
                       <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Company Name" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Company Email" required="">
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="mobile" placeholder="Contact No" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" onkeyup="checkpassword()" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" onkeyup="checkpassword()" required="">
                                </div>
                            </div>
                            <div class="col-12 mb-2 text-center" id="error"></div>
                        </div>
                        
                        
                        <div class="form-group text-center">
                            <button class="btn btn-block btn-primary mt-2 text-white" type="submit" id="submit">Register</button>
                        </div>
                        <div class="form-group text-center">
                           <a class="forgot-pass" href="<?php echo base_url('employer-login') ?>"><i class="fa fa-user-circle pr-1"></i> Already have account login?</a>
                        </div>
                        
                        
                    </form>
                </div>
            </div>
            
            <div class="col-md-5 col-lg-5 col-sm-6 mb-3">
                <img src="<?php echo base_url('front/assets/images/auth/employer-registration.png') ?>" class="img-fluid">
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