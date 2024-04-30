<?php 
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php echo $this->include ('includes/head.php') ?>
	<style>
	    .job-search-area {
        max-width: 100%;
        }
        
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
    					<h1>Jobs</h1> <span></span>
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
<h2>Trending Career <span>Level </span></h2>
<p>To choose your trending job dream & to make future bright.</p>
</div>
</div>
</div>
<div class="row g-4 justify-content-center">
    <?php 
    
       $careerlevellist=$this->commonModel->allFetch('job_attributes_career_levels',array('function_area_id'=>$functional->id));
        
        foreach($careerlevellist as $list){
            
            $id=$list->id;
             $jobcate=$list->jobcate_id;
             $currentdate = date('Y-m-d');
            $expire=$currentdate < $list->expiry_date;
             $jobcatelist=$this->commonModel->fs('job_category',array('id'=>$jobcate));
            //  $functionallist=$this->commonModel->fs('function_area',array('id'=>$functional->id));
             
            $appliedcount=$this->commonModel->allCount('jobs_list',array('career_level_id'=>$id,'expiry_date >' => $currentdate));
    ?>
    <div class="col-xl-3 col-lg-4 col-sm-6 ">
    <div class="single-category2">
    
    <div class="category-content">
        <h5><a href="<?= base_url('jobs-by-career-level/' . $jobcatelist->slug . '/' . $functional->slug.'/'.$list->slug) ?>"><?= esc($list->name) ?> <span class="span1"><?php echo $appliedcount ?></span></a></h5>


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