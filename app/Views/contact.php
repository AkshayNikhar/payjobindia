<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->include ('includes/head.php') ?>
</head>

<body >
	<?php echo $this->include ('includes/header.php') ?>
	<div class="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="banner-content text-center">
					<h1>Contact Us</h1> <span></span>
				</div>
			</div>
		</div>
	</div>
    </div>
	
<div class="contact-support-area pt-120 mb-120">
    <div class="container">
        <div class="row g-lg-4 gy-5">
            <div class="col-lg-6">
                <div class="contect-content">
                <h4>For Any Kind of Help And Informations</h4>
                <p>We’re glad to discuss your organisation’s situation.
                So please contact us via the details below, or enter your request.</p>
                <div class="support">
                    <div class="icon">
                    <img src="<?php echo base_url('front/assets/images/icon/footer-support-icon.svg')?>" alt>
                    </div>
                    <div class="content">
                    <h5>Office Address : </h5><br><br>
                     <h5>Mumbai</h5>
                    </div>
                </div>
                <div class="support">
                    <div class="icon">
                    <img src="<?php echo base_url('front/assets/images/icon/footer-support-icon.svg')?>" alt>
                    </div>
                    <div class="content">
                    <h5>Call for help : </h5><br><br>
                     <a href="tel:8574963214">8574963214</a>
                    </div>
                </div>
                <div class="support">
                    <div class="icon">
                    <img src="<?php echo base_url('front/assets/images/icon/footer-support-icon.svg')?>" alt>
                    </div>
                    <div class="content">
                    <h5>Mail us for information : </h5><br><br>
                     <a href="mailto:support@payjobindia.com">support@payjobindia.com</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-6">
            <div class="contact-form form-wrapper">
            <form>
            <div class="row">
                <div class="col-md-6">
                <div class="form-inner mb-25">
                <label for="name">Full Name*</label>
                <div class="input-area">
                <img src="<?php echo base_url('front/assets/images/icon/user-2.svg')?>" alt>
                <input type="text" id="name" name="name" placeholder="">
                </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-inner mb-25">
                <label for="email">Email*</label>
                <div class="input-area">
                <img src="<?php echo base_url('front/assets/images/icon/email-2.svg')?>" alt>
                <input type="text" id="email" name="email" placeholder="">
                </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-inner mb-25">
                <label for="phonenumber">Phone*</label>
                <div class="input-area">
                <img src="<?php echo base_url('front/assets/images/icon/phone-2.svg')?>" alt>
                <input type="text" id="phonenumber" name="phonenumber" placeholder="">
                </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-inner mb-25">
                <label for="jobplace">Subject</label>
                <div class="input-area">
                <img src="<?php echo base_url('front/assets/images/icon/company-2.svg')?>" alt>
                <input type="text" id="jobplace" name="jobplace" placeholder="">
                </div>
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-inner mb-40">
                <label for="description">Message</label>
                <textarea name="description" id="description" placeholder="Message..."></textarea>
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-inner">
                <button class="primry-btn-2 lg-btn w-unset" type="submit">Send Message</button>
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