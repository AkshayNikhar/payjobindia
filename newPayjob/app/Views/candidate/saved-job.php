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
	<div class="applied-job-area">
		<div class="table-wrapper">
			<div class="table-title-filter">
				<div class="section-title">
					<h5>Saved Jobs:</h5> </div>
			</div>
			<table class="eg-table table category-table mb-30">
				<thead>
					<tr>
						<th>Job Tittle</th>
						<th>Expiry Date</th>
						<th>Company</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td data-label="Job Title">
							<div class="company-info">
								<div class="logo"> <img src="<?php echo base_url('front/assets/images/bg/company-logo/company-06.png') ?>" alt=""> </div>
								<div class="company-details">
									<div class="top">
										<h6><a href="job-details.html">Senior UI/UX Designer</a></h6> </div>
									<ul>
										<li>Pune, Maharashtra</li>
										<li> 
											<p><span class="title">Salary:</span> Rs. 6000-10000 / <span class="time">Per Month</span></p>
										</li>
									</ul>
								</div>
							</div>
						</td>
						<td data-label="Apply Job">03/07/2022</td>
						<td data-label="Company"><a class="view-btn" href="">Tech.Bath Com... </a></td>
						<td data-label="Status">
							<button class="view-btn">Apply Now</button>
						</td>
					</tr>
					<tr>
						<td data-label="Job Title">
							<div class="company-info">
								<div class="logo"> <img src="<?php echo base_url('front/assets/images/bg/company-logo/company-03.png') ?>" alt=""> </div>
								<div class="company-details">
									<div class="top">
										<h6><a href="job-details.html">App Developer</a></h6> </div>
									<ul>
										<li>Pune, Maharashtra</li>
										<li> 
											<p><span class="title">Salary:</span> Rs. 6000-10000 / <span class="time">Per Month</span></p>
										</li>
									</ul>
								</div>
							</div>
						</td>
						<td data-label="Apply Job">03/07/2022</td>
						<td data-label="Company"><a class="view-btn" href="">Tech.Bath Com... </a></td>
						<td data-label="Status">
							<button class="view-btn">Apply Now</button>
						</td>
					</tr>
					<tr>
						<td data-label="Job Title">
							<div class="company-info">
								<div class="logo"> <img src="<?php echo base_url('front/assets/images/bg/company-logo/company-01.png') ?>" alt=""> </div>
								<div class="company-details">
									<div class="top">
										<h6><a href="job-details.html">Web Developer</a></h6> </div>
									<ul>
										<li>Pune, Maharashtra</li>
										<li> 
											<p><span class="title">Salary:</span> Rs. 6000-10000 / <span class="time">Per Month</span></p>
										</li>
									</ul>
								</div>
							</div>
						</td>
						<td data-label="Apply Job">03/07/2022</td>
						<td data-label="Company"><a class="view-btn" href="">Tech.Bath Com... </a></td>
						<td data-label="Status">
							<button class="view-btn">Apply Now</button>
						</td>
					</tr>
					
				</tbody>
			</table>
			
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