<style>
   li.active {
    background: #4545453b !important;
}
</style>
<div class="col-lg-2">
				<div class="dashboard-sidebar">
					<div class="single-widget mb-60">
						<div class="dashboard-menu">
							<ul>
								<li class="<?php if($activemenu=='candidashboard') {echo 'active';}?>">
									<a  href="<?php echo base_url('candidate/dashboard') ?>">
										<i class="fa fa-dashboard icongap"></i> Dashboard </a>
								</li>
								<li class="<?php if($activemenu=='candiprofile') {echo 'active';}?>">
									<a href="<?php echo base_url('candidate/profile') ?>">
										<i class="fa fa-user-circle icongap"></i> My Profile </a>
								</li>
								<li class="<?php if($activemenu=='candiappliedjob') {echo 'active';}?>">
									<a href="<?php echo base_url('candidate/applied-jobs') ?>">
										<i class="fa fa-briefcase icongap"></i> Applied Jobs </a>
								</li>
								<li class="<?php if($activemenu=='candisavedjob') {echo 'active';}?>">
									<a href="<?php echo base_url('candidate/saved-jobs') ?>">
										<i class="fa fa-bookmark-o icongap"></i> Saved Jobs </a>
								</li>
								<li class="<?php if($activemenu=='candisetting') {echo 'active';}?>">
									<a href="<?php echo base_url('candidate/setting') ?>">
										<i class="fa fa-cog icongap"></i> Setting </a>
								</li>
								<li>
									<a href="<?php echo base_url('logout') ?>">
										<i class="fa fa-sign-out icongap"></i> Logout </a>
								</li>
								
							</ul>
						</div>
					</div>
					
				</div>
			</div>