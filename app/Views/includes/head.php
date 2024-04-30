<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $seotitle ?></title>
<meta name="description" content="<?php echo $seodesc ?>">
<meta name="keywords" content="<?php echo $seokeywords ?>">
<link rel="icon" href="<?php echo base_url('front/assets/images/favicon.png') ?>" type="image/gif" sizes="20x20">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/all.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/boxicons.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/summernote.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/bootstrap-icons.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/jquery-ui.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/swiper-bundle.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/select2.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/animate.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/jquery.fancybox.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/datepicker.min.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/jquery-ui.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/style2.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('front/assets/css/default.css') ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
.custom-btn {
    width: auto;
    height: 45px;
    color: #fff;
    border-radius: 5px;
    padding: 8px 25px;
    font-family: 'Lato', sans-serif;
    font-weight: 500;
    background: transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    box-shadow: inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
    outline: none;
    font-size: 20px;
}

.btn-11 {
  border: none;
  background: rgb(251,33,117);
    background: linear-gradient(0deg, rgba(251,33,117,1) 0%, rgba(234,76,137,1) 100%);
    color: #fff;
    overflow: hidden;
}
.btn-11:hover {
    text-decoration: none;
    color: #fff;
}
.btn-11:before {
    position: absolute;
    content: '';
    display: inline-block;
    top: -180px;
    left: 0;
    width: 30px;
    height: 100%;
    background-color: #fff;
    animation: shiny-btn1 3s ease-in-out infinite;
}
.btn-11:hover{
  opacity: .7;
}
.btn-11:active{
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.3),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.2),
    inset 4px 4px 6px 0 rgba(0, 0, 0, .2);
}
.user-card.dropdown-menu.show 
{
	transform: translate(-103px, 52px);
}

@-webkit-keyframes shiny-btn1 {
    0% { -webkit-transform: scale(0) rotate(45deg); opacity: 0; }
    80% { -webkit-transform: scale(0) rotate(45deg); opacity: 0.5; }
    81% { -webkit-transform: scale(4) rotate(45deg); opacity: 1; }
    100% { -webkit-transform: scale(50) rotate(45deg); opacity: 0; }
}

div#locationautocomplete-list {
    position: absolute;
    margin-top: 118px;
    background: white;
    padding: 15px;
    z-index:9;
}
</style>