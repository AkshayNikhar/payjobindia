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
					<h1>Blogs</h1> <span></span>
				</div>
			</div>
		</div>
	</div>
    </div>
	
	<div class="blog-details-area mt-5 mb-5">
	<div class="container">
		<div class="row g-lg-4 gy-5 justify-content-center">
			<div class="col-lg-8">
				<div class="blog-details-wrap">
					<div class="recent-article-img"> <img class="img-fluid" src="<?php echo base_url('/back/assets/images/blogs/'.$bloglist->image) ?>" alt="">
						<div class="publish-area d-xl-none d-flex"> <?php echo $bloglist->created ?> </div>
					</div>
					<div class="recent-article-content">
						<div class="recent-article-meta">
							<div class="publish-area"> <a href="#"><span><?php echo date('d M, Y ', strtotime($bloglist->created)) ?></span></a> </div>
						</div>
						<h2><?php echo $bloglist->title ?> </h2>
						<div class="for-devider"></div>
						<?php echo $bloglist->description ?>
						
					</div>
				</div>
				
			</div>
			<div class="col-lg-4">
				<div class="job-sidebar mb-50">
					<div class="job-widget mb-20">
						<h5 class="job-widget-title mb-10">Recent Post</h5>
						<ul class="recent-activitys">
						    <?php
						    foreach ($bloglist1 as $list){
						    ?>
							<li>
								<div class="blog-img"> <img src="<?php echo base_url('/back/assets/images/blogs/'.$list->image) ?>" alt="" style="width: 74px;height: 74px;"> </div>
								<div class="content">
									<h6><a href="<?php echo base_url('blog-details/'.$list->slug) ?>"><?php echo $list->title ?>.</a></h6> 
									<span><img src="<?php echo base_url('front/assets/images/icon/calender2.svg') ?>" alt=""> <?php echo date('d M, Y ', strtotime($list->created)) ?></span> </div>
							</li>
						<?php } ?>
							
						</ul>
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