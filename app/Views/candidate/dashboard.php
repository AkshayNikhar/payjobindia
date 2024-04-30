<!DOCTYPE html>

<html lang="en">

<head>
	<?php echo $this->include ('includes/head.php') ?>
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
    
    <div class="dashboard-area pt-50 mb-50">
	<div class="container-fluid">
		<div class="row g-lg-4 gy-5 mb-90"> 
		    
			<?php echo $this->include ('candidate/menu.php') ?>
			<div class="col-lg-9">
				<div class="dashboard-inner">
					<div class="author-area">
						<div class="author-img"> 
						    <?php 
						    if(empty($this->userimage)){
						    ?>
						    <img src="https://placehold.jp/50x50.png" alt=""> 
						    <?php } else { ?>
						    <img src="<?php echo base_url('back/assets/images/userProfile/'.$this->userimage) ?>" alt=""> 
						    <?php } ?>
						</div>
						<div class="author-content">
							<h4><?php echo $this->username ?></h4> 
						</div>
					</div>
					<div class="counter-area">
						<div class="row g-lg-4 g-md-5 gy-5">
							<div class="col-lg-3 col-sm-6">
								<div class="counter-single">
									<div class="counter-icon"> 
									    <img src="<?php echo base_url('front/assets/images/icon/tt-applied.svg') ?>" alt="image"> 
									</div>
									<div class="coundown">
										<p>Total Applied</p>
										<div class="d-flex align-items-center">
											<h3 class="odometer"><?php echo $totalapplied ?></h3> <span></span> 
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="counter-single two">
									<div class="counter-icon"> <img src="<?php echo base_url('front/assets/images/icon/save-job.svg') ?>" alt="image"> </div>
									<div class="coundown">
										<p>Saved Jobs</p>
										<div class="d-flex align-items-center">
											<h3 class="odometer"><?php echo $totalsave ?></h3> <span></span> </div>
									</div>
								</div>
							</div>
						</div>
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