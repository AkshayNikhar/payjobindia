<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->include ('includes/head.php') ?>
	<style>
    .line-3
    {
        display: -webkit-box; 
-webkit-line-clamp: 3; 
-webkit-box-orient: vertical; 
overflow: hidden;
margin-bottom:10px;
    }
    </style>
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
	
	<div class="blog-grid-area mt-5 mb-5">
	<div class="container">
		<div class="row g-lg-4 gy-5 justify-content-center">
		    <?php 
		    foreach($bloglist as $list){
		    ?>
			<div class="col-lg-4 col-md-6 col-sm-10 mb-20">
				<div class="recent-article-wrap">
					<div class="recent-article-img"> <img class="img-fluid" src="<?php echo base_url('/back/assets/images/blogs/'.$list->image) ?>" alt="">
						<div class="publish-area d-xl-none d-flex"> <a href="<?php echo base_url('blog-details/'.$list->slug) ?>"><span>02</span>March</a> </div>
					</div>
					<div class="recent-article-content">
						<div class="recent-article-meta">
							<div class="publish-area"> <a href="<?php echo base_url('blog-details/'.$list->slug) ?>"><?php echo date('d M, Y', strtotime($list->created)) ?></a> </div>
						</div>
						<h4><a href="<?php echo base_url('blog-details/'.$list->slug) ?>"><?php echo $list->title ?></a></h4>
						<div class="line-3"><?php echo $list->description ?></div>
						<div class="sign-btn text-center pb-2"> 
						<a href="<?php echo base_url('blog-details/'.$list->slug) ?>" class="text-center primry-btn-2 lg-btn">
						    Read More
						</a> 
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			
			
		</div>
	</div>
</div>
	
		
	<?php echo $this->include ('includes/footer.php') ?>
	<?php echo $this->include ('includes/footerjs.php') ?>
</body>

</html>