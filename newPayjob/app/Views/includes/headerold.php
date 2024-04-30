<?php 
use App\Models\CommonModel;
$this->commonModel=new CommonModel();
$this->session = session();
$cusid= $this->session->get('cusid');
$farmerdetails=$this->commonModel->fs('far_customer_registration',array('cusid'=>$cusid));

 $username=$farmerdetails->cusfname.' '.$farmerdetails->cuslname;
 $useremail=$farmerdetails->cusemail;
 $userprofession=$farmerdetails->cusprofession;

$db = db_connect();

?>
<header id="masthead" class="header ttm-header-style-02">
            <!-- ttm-topbar-wrapper -->
            <div class="ttm-topbar-wrapper ttm-bgcolor-darkgrey ttm-textcolor-white clearfix">
                <div class="container">
                    <div class="ttm-topbar-content">
                        <ul class="top-contact text-left">
                            <li class="list-inline-item">
                            <?php 
                            if ($data && isset($data['current']['temperature'])) {
                                $temperature = $data['current']['temperature'];
                                echo "$city : $temperature 째C";
                            } else {
                                echo "Unable to fetch temperature data.";
                            }
                            ?>
                            </li>
                        </ul>
                        <div class="topbar-right text-right">
                            <div class="ttm-social-links-wrapper list-inline">
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="top-contact ttm-highlight-right">
                                <li><strong><i class="fa fa-phone"></i>Talk To Expert :</strong> <span class="tel-no">+91 9589706358</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- ttm-topbar-wrapper end -->
            <!-- ttm-header-wrap -->
            <div class="ttm-header-wrap">
                <!-- ttm-stickable-header-w -->
                <div id="ttm-stickable-header-w" class="ttm-stickable-header-w clearfix">
                    <div id="site-header-menu" class="site-header-menu">
                        <div class="site-header-menu-inner ttm-stickable-header">
	<div class="container">
		<!-- site-branding -->
		<div class="site-branding">
			<a class="home-link" href="<?php echo base_url('/') ?>" title="Farmeasy" rel="home"> <img id="logo-img" class="img-center" src="<?php echo base_url('front/assets/img/logo.png') ?>" alt="logo-img"> </a>
		</div>
		<!-- site-branding end -->
		<!--site-navigation -->
		<div id="site-navigation" class="site-navigation">
			<!-- header-icons -->
			<div class="ttm-header-icons "> 
			<span class="ttm-header-icon ttm-header-cart-link">
            <!--<div id="dropdown" class="ddmenu">-->
            
            <div class="ddmenu">
                <span class="dropbtn"><a href="<?= base_url('login') ?>" style="background: #0000;line-height: 0px;height: 30px;"><i class="fa fa-user-circle pr-2"></i>LOGIN</a></span>
            </div>
            <div id="dropdown1">
                <li><a href="<?php echo base_url('farmer/logout') ?>" id="dropdow2">Farmer</a></li>
            </div>
            
            
            <div id="dropdown1" style="display: none;">
                <ul>
                    <li><a href="<?= base_url('farmer-login') ?>" id="dropdow2">Farmer</a></li>
                    <li><a href="<?= base_url('advisor-login') ?>" id="dropdow2">Advisor</a></li>
                    <li><a href="<?= base_url('customer-login') ?>" id="dropdow2">Customer</a></li>
                </ul>
            </div>
                
			</span>
				<div class="ttm-header-icon ttm-header-search-link d-none"> <a href="#" class="sclose"><i class="ti ti-search"></i></a>
					<div class="ttm-search-overlay">
						<div class="ttm-bg-layer"></div>
						<div class="ttm-icon-close"></div>
						<div class="ttm-search-outer">
							<form method="get" class="ttm-site-searchform" action="#">
								<input type="search" class="field searchform-s" name="s" placeholder="Type Word Then Enter...">
								<button type="submit"> <i class="ti ti-search"></i> </button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- header-icons end -->
			<div class="ttm-menu-toggle">
				<input type="checkbox" id="menu-toggle-form" />
				<label for="menu-toggle-form" class="ttm-menu-toggle-block"> <span class="toggle-block toggle-blocks-1"></span> <span class="toggle-block toggle-blocks-2"></span> <span class="toggle-block toggle-blocks-3"></span> </label>
			</div>
			<nav id="menu" class="menu">
                <ul class="dropdown">
                    <li class="active"><a href="<?php echo base_url('/') ?>">Home</a></li>
                    <li><a href="<?php echo base_url('about') ?>">About US</a></li>
                    <li><a href="#">Daily Update</a>
                        <ul>
                            <li><a href="<?= base_url('government-scheme')?>">Government Scheme and Yojana</a></li>
                            <li><a href="<?= base_url('news')?>">News</a></li>
                            <li><a href="<?= base_url('product')?>">New Launch Product</a></li>
                            <li><a href="<?= base_url('wheather-update')?>">Weather Update</a></li>
                            <li><a href="<?= base_url('upcoming-events')?>">Upcoming Events</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Service</a>
                        <ul>
                            <li><a href="#">Community</a></li>
                            <li><a href="#">Expert Advices</a></li>
                            <li><a href="<?= base_url('agriculture-training')?>">Training Programs</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('crop')?>">Crops</a>
                        <ul>
                            <?php
                            $query = $db->table('far_crop');
                            $result = $query->get()->getResult();
                            if (!empty($result)) {
                                    // Loop through the results and process the data
                                    foreach ($result as $menus) {
                                        ?>
                                         <li><a href="<?= base_url('crop/'.$menus->crop_slug )?>"><?= esc($menus->crop_name) ?></a></li>
                                        <?php
                                        // Add other fields as needed
                                    }
                                } 
                            
                            ?>

                        </ul>
                    </li>
                    <!--<li><a href="<?= base_url('blog')?>">Blog</a></li>-->
                    <li><a href="<?= base_url('/')?>">Marketplace</a></li>
                    <li><a href="<?php echo base_url('contact') ?>">Contact</a></li>

                </ul>
            </nav>
		</div>
		<!-- site-navigation end-->
	</div>
</div>
                    </div>
                </div><!-- ttm-stickable-header-w end-->
            </div><!--ttm-header-wrap end -->
        </header>