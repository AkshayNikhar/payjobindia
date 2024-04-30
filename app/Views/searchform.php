<?php 
use App\Models\CommonModel;
$this->commonModel = new CommonModel();
// $data['state']=$this->commonModel->allFetchd('location_states',array('is_active'=>1));

?>
<form>
<div class="form-inner job-title">
	<input type="text" placeholder="Job title/Keyword"> </div>
<div class="form-inner category">
	<select class="form-select">
		<option value="" selected="" hidden="">State</option>
		<option value="">Maharashtra</option>
	</select>
</div>
<div class="form-inner category">
	<select class="form-select">
		<option value="" selected="" hidden="">City</option>
		<option value="1">Nagpur</option>
		
	</select>
</div>
<div class="form-inner">
	<button type="submit" class="primry-btn-2 "><img src="https://oskonlinestore.in/allci/payjob/front/assets/images/icon/search-icon.svg" alt=""> Search</button>
</div>
</form>

<div class="job-search-area d-none">
									<!--?php echo $this->include ('searchform.php') ?-->
								</div>