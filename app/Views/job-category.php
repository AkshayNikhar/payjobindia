<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->include ('includes/head.php') ?>
	
	<style>
	    .span1 {
    color: #4353ff;
    font-size: 17px;
    padding: 10px;
    background: #00000000;
    border-radius: 100px;
}
	</style>
</head>

<body >
	<?php echo $this->include ('includes/header.php') ?>
	<div class="inner-banner d-none">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="banner-content text-center">
					<h1>Department</h1> <span></span>
				</div>
			</div>
		</div>
	</div>
    </div>
	
<div class="home2-category-area mt-50 mb-120">
<div class="container">
<div class="row mb-60">
<div class="col-12 d-flex justify-content-center gap-3">
<div class="section-title1 text-center">
<h2>Trending Functional <span>Area </span></h2>
<p>To choose your trending job dream & to make future bright.</p>
</div>
</div>
</div>
<div class="row g-4 justify-content-center">
    <?php 
    foreach($functional as $list)
    {
     $id=$list->function_area_id;  
     $currentdate = date('Y-m-d');
     $appliedcount=$this->commonModel->allCount('jobs_list',array('functional_area_id'=>$id,'expiry_date >' => $currentdate));
    ?>
    <div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="single-category2">
    
    <div class="category-content">
        <h5><a href="<?= base_url('jobs-by-functional-area/' . $list->job_category_slug . '/' .  $list->slug) ?>"><?= esc($list->function_area_name) ?> <span class="span1"><?php echo $appliedcount ?></span></a></h5>


    <!--<p>Job Available: <span>240</span></p>-->
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