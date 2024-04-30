<!--top header-->
<?php
    $mail = config('app.CONTACT_MAIL'); 
    $contact = config('app.CONTACT_NUMBER');
?>
<div class="top-header">
    <div class="container">
        <div class="d-flex">
          <div class="mr-auto p-2 text-white">Welcome To {{ config('app.name')}}</div>
          <div class="p-2 d-none d-lg-block" style="color: #f5a434;">
               @if(!empty($mail))
                <i class="mdi mdi-email-outline micons"></i>
              @endif
              {{ config('app.CONTACT_MAIL') }}
            </div>
            <div class="p-2 d-none d-lg-block" style="color: #f5a434;font-size: 14px;">
              @if(!empty($contact))
              <i class="mdi mdi-phone micons"></i> 
              @endif
              {{ config('app.CONTACT_NUMBER') }}
            </div>
          <div class="p-2 d-none d-lg-block"><a href="{{ config('app.TWITTER_URL') }}"><i class="mdi mdi-twitter text-white"></i></a></div>
          <div class="p-2 d-none d-lg-block"><a href="{{ config('app.FACEBOOK_URL') }}"><i class="mdi mdi-facebook text-white"></i></a></div>
          <div class="p-2 d-none d-lg-block"><a href="{{ config('app.INSTAGRAM_URL') }}"><i class="mdi mdi-instagram text-white"></i></a></div>
        </div>
    </div>
</div>
<!--top header ends-->
<!--mid header-->
<div class="mid-header">
    <!--<div class="container">-->
        <!--<div class="row">-->
            <!--<div class="col-md-6">-->
            <!--    <a class="navbar-brand logo text-uppercase" href="{{ url('/') }}">-->
            <!--    <img src="{{ asset(config('app.logo_frontend'))}}" alt="" height="50">-->
            <!--    </a>-->
            <!--</div>-->
            <?php
                // $mail = config('app.CONTACT_MAIL'); 
                // $contact = config('app.CONTACT_MAIL');
            ?>
            <!--<div class="col-md-3">-->
            <!--    <div class="row align-items-center">-->
            <!--        <div class="d-flex align-items-center">-->
            <!--            @if(!empty($mail))-->
            <!--            <i class="mdi mdi-email-outline micons"></i>-->
            <!--            @endif-->
            <!--        </div> -->
            <!--      <div>-->
            <!--          <h6>{{ config('app.CONTACT_MAIL') }}</h6>-->
            <!--      </div> -->
            <!--  </div>-->
            <!--</div>-->
            <!--<div class="col-md-3">-->
            <!--    <div class="row align-items-center">-->
            <!--      <div class="d-flex align-items-center">-->
            <!--           @if(!empty($contact))-->
            <!--            <i class="mdi mdi-phone micons"></i>-->
            <!--           @endif-->
            <!--      </div> -->
            <!--      <div>-->
            <!--          <h6>{{ config('app.CONTACT_NUMBER') }}</h6>-->
            <!--      </div> -->
            <!--  </div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
<!--mid header ends-->
<!-- Static navbar -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
/*Footer*/
.main-footer h3 {
    color: #ffffff;
    font-size: 1.3rem;
    margin-bottom: 15px;
    padding-bottom: 8px;
    border-bottom: 1px solid #f5a416;
}
.footerlist li {
    margin-bottom: 8px;
    padding-bottom: 6px;
    border-bottom: 1px dashed #f5a4166b;
}
.main-footer .quicklinks:hover {
    color: #f5a416;
    padding-left:5px;
}
/*Footer end*/
/*Common*/
::placeholder {
  color: #808080 !important;
  font-weight:500 !important;
  opacity: 1; /* Firefox */
}
.text-blue
{
    color:#4353ff;
}

.badge-outline-theme
{
    background: white;
    border: 1px solid #4353ff;
    color: black;
    font-size: 16px !important;
}
/*Common end*/

/*FORM LOGIN*/
.form-container{
    background-color: #fff;
    font-family: 'Poppins', sans-serif;
    padding: 20px 25px;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 3px 8px;
    position: relative;
}
.form-container:before,
.form-container:after{
    content: '';
    background-color: #4353ff;
    height: 50%;
    width: 3px;
    position: absolute;
    left: 10px;
    top: 10px;
}
.form-container:after{
    top: auto;
    bottom: 10px;
    left: auto;
    right: 10px;
}
.form-container .title{
    color: #4353ff;
    font-size: 25px;
    font-weight: 700;
    text-transform: capitalize;
    margin: 0 0 15px;
}
.form-container .social-links{
    padding: 0;
    margin: 0 0 15px;
    list-style: none;
}
.form-container .social-links li{
    display: inline-block;
    margin: 0 3px;
}
.form-container .social-links li a{
    color: #555;
    line-height: 27px;
    height: 28px;
    width: 28px;
    border: 1px solid #555;
    border-radius: 50%;
    display: block;
    transition: all 0.3s ease 0s;
}
.form-container .social-links li a:hover{
    color: #fff;
    background-color: #4353ff;
}
.form-container .description{
    color: #555;
    font-size: 13px;
    margin: 0 0 10px;
    display: block;
}
.form-horizontal .form-group{ margin: 0 0 15px; }
.form-horizontal .form-group:last-of-type{
    text-align: left;
    margin-bottom: 18px;
}
.form-horizontal .form-control {
    color: #33324e;
    background: #ffffff;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1px;
    height: 40px;
    padding: 6px 12px;
    border-radius: 5px;
    border: 1px solid #d3d3d3;
    box-shadow: none;
}
.form-horizontal .form-control:focus{
    border-color: rgba(78, 76, 151, 0.5);
    box-shadow: none;
}
.form-horizontal .form-control::placeholder{
    color: #e1e1e1;
    font-size: 14px;
    font-weight: 300;
}
.form-horizontal .form-group .check-label{
    color: #555;
    font-size: 12px;
    font-weight: 400;
    text-transform: none;
    margin: -2.5px 0 0;
    vertical-align: text-top;
    display: inline-block;
}
.form-horizontal .form-group .check-label a{
    color: #4353ff;
    transition: all 0.3s ease;
}
.form-horizontal .form-group .check-label a:hover{ text-decoration: underline; }
.form-horizontal .checkbox{
    height: 17px;
    width: 17px;
    min-height: auto;
    margin: 0 3px 0 0;
    border: 1px solid #999;
    border-radius: 2px;
    cursor: pointer;
    display: inline-block;
    position: relative;
    appearance: none;
    -moz-appearance: none;
    -webkit-appearance: none;
    transition: all 0.3s ease;
}
.form-horizontal .checkbox:before{
    content: '';
    height: 6px;
    width: 12px;
    border-bottom: 2px solid #fff;
    border-left: 2px solid #fff;
    opacity: 1;
    transform: rotate(-45deg);
    position: absolute;
    left: 2px;
    top: 2.5px;
    transition: all 0.3s ease;
}
.form-horizontal .checkbox:checked{
    background-color: #4353ff;
    border-color: #4353ff;
}
.form-horizontal .checkbox:checked:before{ opacity: 1; }
.form-horizontal .checkbox:not(:checked):before{ opacity: 0; }
.form-horizontal .checkbox:focus{ outline: none; }

.form-horizontal .btn.signin:hover,
.form-horizontal .btn.signin:focus{
    text-shadow: 3px 3px rgba(0,0,0,0.3);
    box-shadow: 0 0 5px #4353ff;
}
/*FORM LOGIN END*/

.jobmeta
{
    font-size:20px;
}
.jobdes
{
    font-size:18px;
}
.btn-apply{
    color: #fff;
    background: #4353ff;
    font-size: 17px;
    font-weight: 600;
    text-transform: capitalize;
    padding: 8px 30px;
    border-radius: 7px !important;
    border: none;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease-out;
}

.btn-apply:hover{
    color: #fff;
    background: #212f7e !important;
    border-color: #212f7e !important;
}
/*NEW SEARCH*/
.banner-form-area {
    background-color: #fff;
    padding: 10px 30px;
    border-radius: 0;
    -webkit-box-shadow: 0 0 0 5px #dddddd;
    box-shadow: 0 0 0 3px #dddddd;
    margin-top:20px;
}

.banner-form-area form {
    position: relative;
    padding-right: 150px
}

.banner-form-area form .form-group {
    margin-bottom: 0;
    position: relative
}

.banner-form-area form .form-group i {
    background: -webkit-gradient(linear,left top,right top,from(#38a745),color-stop(63%,#4cce5b));
    background: linear-gradient(90deg,#38a745 0%,#4cce5b 63%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent
}

.banner-form-area form .form-group .form-control {
    height: 40px;
    border-radius: 0;
    border: 0;
    border-right: 1px solid #cacacd;
    padding-left: 0;
    padding-right: 40px
}

.banner-form-area form .form-group .form-control:focus {
    -webkit-box-shadow: none;
    box-shadow: none;
    border-right: 1px solid #4353ff;
}

.banner-form-area form .form-group ::-webkit-input-placeholder {
    color: #95969c
}

.banner-form-area form .form-group :-ms-input-placeholder {
    color: #95969c
}

.banner-form-area form .form-group ::-ms-input-placeholder {
    color: #95969c
}

.banner-form-area form .form-group ::placeholder {
    color: #95969c
}

.banner-form-area form .form-group label {
    margin-bottom: 0;
    position: absolute;
    top: 13px;
    right: 20px;
    display: block
}

.banner-form-area form .form-group label i {
    font-weight: 700;
    font-size: 25px
}

.banner-form-area .banner-form-btn {
    position: absolute;
    top: -5px;
    right: -31px;
    font-size: 18px;
    color: #fff;
    background: #212f7e;
    padding: 10px 45px;
    border-radius: 45px;
}

.banner-form-area .banner-form-btn:hover {
    background: #4353ff;
}

.form-select {
    width: 100%;
    display: block;
    border-radius: 0;
    height: 40px;
    color: #000000;
    border: 1px solid #cacacd;
    padding: 5px 10px;
    /* border: 0; */
    font-size: 16px;
    max-height: 200px;
    overflow-y: scroll;
}

.form-select:focus {
    border: 0;
    -webkit-box-shadow: none;
    box-shadow: none
}

.form-select ::-webkit-scrollbar {
    width: 6px
}

.form-select ::-webkit-scrollbar-track {
    background: #f1f1f1
}

.form-select ::-webkit-scrollbar-thumb {
    background: #888
}

.form-select ::-webkit-scrollbar-thumb:hover {
    background: #555
}

.banner-btn {
    margin-top: 70px;
    text-align: center
}

.banner-btn a {
    display: inline-block;
    font-weight: 500;
    font-size: 16px;
    color: #38a745;
    width: 210px;
    padding-top: 16px;
    padding-bottom: 16px;
    margin-right: 8px;
    margin-left: 8px;
    background-color: #fff
}

.banner-btn a:hover {
    color: #fff;
    background-color: #333
}

@media only screen and (max-width: 767px)
{
    .banner-form-area {
        padding: 5px 15px;
        border-radius: 20px;
        -webkit-box-shadow: 0 0 0 5px #ffffff80;
        box-shadow: 0 0 0 5px #ffffff80
    }

    .banner-form-area form {
        padding-right: 0
    }

    .banner-form-area form .form-group .nice-select {
        font-size: 14px
    }

    .banner-form-area form .form-group .form-control {
        height: 45px;
        font-size: 14px;
        border-right: 0
    }

    .banner-form-area form .form-group label {
        right: 13px
    }

    .banner-form-area form .form-group label i {
        font-size: 18px
    }

    .banner-form-area .banner-form-btn {
        position: relative;
        top: 0;
        right: 0;
        font-size: 14px;
        padding: 10px 40px;
        margin-top: 15px;
        margin-bottom: 25px;
        width: 100%
    }

    .banner-btn {
        margin-top: 50px
    }

    .banner-btn a {
        font-size: 14px;
        width: 210px;
        padding-top: 14px;
        padding-bottom: 14px;
        margin-bottom: 10px
    }
    .banner-form-area form .form-group .form-control {
    height: 40px;
    border-radius: 0;
    border: 1px solid #d3d3d6 !important;
    border-right: 1px solid #cacacd;
    padding-left: 13px;
    padding-right: 40px;
}
.banner-form-area form .form-group {
    margin-bottom: 15px;
    position: relative;
}
.p-5 {
    padding: 1.5rem!important;
}
}

/*NEW SEARCH*/

.container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
    width: 100%;
    padding-right: 50px;
    padding-left: 50px;
    margin-right: auto;
    margin-left: auto;
}
    :root {
  --background-color: #f1f1f1;
  --hover-color: rgb(102, 40, 245);
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: 0;
}
a {
  text-decoration: none;
}
ul,
ol {
  list-style-type: none;
}



.logo a {
  font-size: 20px;
  font-weight: 700;
  color: #353535;
  text-transform: uppercase;
}

/* normal menu css */

.main_menu > ul > li {
  display: inline-block;
  position: relative;
  margin: 0 -2px;
}
.main_menu ul li {
  position: relative;
}

.main_menu ul li a {
  font-size: 16px;
  color: #353535;
  padding: 15px 15px;
  display: block;
  font-weight: 800;
}

.main_menu ul li .active,
.main_menu ul li:hover > a {
  color: var(--hover-color);
}
/* Normal Dropdown menu */
.main_menu ul li ul {
  width: 230px;
  background: #fff;
  transition: 0.5s;
  box-shadow: 0px 5px 15px 0px rgba(212, 201, 201, 0.75);
}

.main_menu ul li ul li a {
  padding: 10px 25px;
  font-size: 15px;
}
.main_menu ul li ul li a i {
  float: right;
}

.main_menu ul li ul li ul {
  left: 100%;
  top: 0;
}

/* mega menu css */
.mega_menu_dropdown {
  position: static !important;
}
.mega_menu {
  left: 0;
  right: 0;
  background: #fff;
  display: flex;
  flex-wrap: wrap;
  transition: 0.5s;
  box-shadow: 0px 5px 15px 0px rgba(212, 201, 201, 0.75);
}
.mega_menu_item {
  width: 50%;
  padding: 30px 20px;
}
.main_menu ul li .mega_menu_item a {
  padding: 10px 0;
}

.main_menu ul li .mega_menu_item a:hover {
  color: var(--hover-color);
}
.mega_menu_item h3 {
  margin-bottom: 15px;
}
.mega_menu_item img {
  width: 100%;
}

/* demo_2 css */
.mega_menu_demo_2 .mega_menu {
  left: 70%;
  transform: translateX(-50%);
  width: 600px;
}

.mobile_btn {
  display: none;
}

/* responsive css */
@media (min-width: 992px) and (max-width: 1199.98px) {
  .container {
    width: 960px;
  }
  .mega_menu_demo_2 .mega_menu {
    width: 940px;
  }
  .main_menu ul li ul {
    width: 150px;
  }
}

@media (min-width: 768px) and (max-width: 991.98px) {
  .container {
    width: 720px;
  }
  .mega_menu_demo_2 .mega_menu {
    width: 700px;
  }
  .main_menu ul li a {
    font-size: 15px;
    padding: 20px 16px;
  }
  .main_menu ul li ul {
    width: 150px;
  }
}
@media (min-width: 768px) {
  .main_menu ul li ul {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    margin-top: 50px;
  }
  .main_menu ul li .mega_menu {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    margin-top: 50px;
  }
  .main_menu ul li:hover > ul {
    visibility: visible;
    opacity: 1;
    margin-top: 0px;
    z-index: 99;
  }
  .main_menu ul li:hover > .mega_menu {
    visibility: visible;
    opacity: 1;
    margin-top: 0;
    z-index: 99;
  }
}

@media (max-width: 767.98px) {
  .mega_menu_demo_2 .mega_menu,
  .container {
    width: 100%;
  }

  nav {
    padding: 15px;
  }
  .mobile_btn {
    cursor: pointer;
    display: block;
    font-size:25px;
  }

  .main_menu {
    display: none;
    width: 100%;
  }

  .main_menu ul li {
    display: block;
  }
  .main_menu ul li a i {
    float: right;
  }
  .main_menu ul li a {
    border-bottom: 1px solid #ddd;
  }
  .main_menu ul li ul {
    width: 100%;
  }
  .main_menu ul li ul li ul {
    left: 0;
    top: auto;
  }

  .mega_menu .mega_menu_item {
    width: 50%;
  }
  .main_menu ul li ul {
    display: none;
    transition: none;
  }
  .main_menu ul li .mega_menu {
    display: none;
    transition: none;
  }

  .mega_menu_demo_2 .mega_menu {
    transform: translateX(0);
  }
}

@media (max-width: 575.98px) {
  .mega_menu .mega_menu_item {
    width: 100%;
  }
  .authbtns {
    margin-top: 10px;
    padding:10px 1%
}
}

/*************************HERO*********************************/
.section-hero {
  background-color: #ecefff;
  /*background-color: #fdf2e9;*/
  padding: 2rem 0 1rem 0;
}

.hero {
  /* We'll not use px to define the length and will use rem. */
  /* max-width: 1300px; */
  max-width: 130rem;
  display: grid;
  grid-template-columns: 1fr 1fr;
  padding: 0 5rem;
  margin: 0 auto;
  align-items: center;
  gap: 0 9.6rem;
}

.heading-primary {
  font-size: 2.5rem;
  color: #212f7e;
  font-weight: 700;
  letter-spacing: -0.5px;
  line-height: 1.15;
  margin-bottom: 2.5rem;
}

.hero-description {
  font-size: 1.5rem;
  line-height: 1.5;
  margin-bottom: 3rem;
  font-weight:600;
}

.hero-img-box {
  grid-column: 2/3;
  grid-row: 1 / 3;
}

.hero-img {
  width: 100%;
}



/* We'll create a utility class that can be used for any element by simply adding a class. */
.margin-right-btn {
  margin-right: 2.4rem;
}

.delivered-meals {
  display: flex;
  align-items: center;
  gap: 3.2rem;
}

.delivered-imgs img {
  width: 4.8rem;
  height: 4.8rem;
  border-radius: 50%;
  margin-right: -1.6rem;
  outline: #fdf2e9 solid 3px;
}

.delivered-text {
  font-size: 1.8rem;
  font-weight: 600;
}

.delivered-text span {
  color: #cf711f;
}

@media only screen and (max-width: 500px) {
  .hero {
    display:block;
    padding: 0 1rem;
    gap: 0 1rem;
}
button.searchbtn {
    width: 100%;
}

.heading-primary {
    font-size: 2rem;
}
}
/*************************HERO*********************************/

/********************SEARCH****************************/


.searchfield {
    background: white;
    height: 30px;
    width: 100%;
    border: 1px solid #212f7e;
    border-radius: 10px;
    padding: 10px;
}

button.searchbtn {
    background: #212f7e;
    color: white;
    height: 50px;
    padding: 10px 25px;
    border-radius: 10px;
    border: 1px solid #212f7e;
}
 
 /******************************SEARCH********************************/
 
 /********************COUNTER**********************/
.ccounter{
    color: var(--main-color);
    font-family: 'Sarabun', sans-serif;
    width: 210px;
    padding: 12px;
    position: relative;
    margin: 0 auto;
    z-index: 1;
}
 
.ccounter .ccounter-icon{
    color: #fff;
    background: var(--main-color);
    font-size: 30px;
    line-height: 40px;
    width: 60px;
    height: 60px;
    text-align: right;
    padding: 6px 10px 0 0;
    border-radius: 0 0 0 100%;
    position: absolute;
    right: 0;
    top: 0;
}
 
.ccounter .ccounter-content{
    padding: 15px 10px;
    border: 2px solid var(--border-color);
    border-radius: 13px;
    box-shadow: 0 0 0 12px #fff, 0 0 35px rgba(0,0,0,0.7);
    font-size: 25px;
    font-weight: 700;
}
 
.ccounter .ccounter-value{
    font-size: 30px;
    line-height: 30px;
    font-weight: 600;
    margin: 0 0 10px;
}
 
.ccounter h3{
    font-size: 18px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: capitalize;
    
}
 
.ccounter.blue{ --main-color: #212f7e; }
 
.ccounter.blue1{ --main-color: #4353ff; }
 
.ccounter.purple{ --main-color: #942791; }
 
@media screen and (max-width:990px){
    .ccounter{ margin-bottom: 40px; }
}   

.bg-light-blue
{
    background:#ecefff;
}
 /********************COUNTER**********************/
 
 .section {
    padding-top: 60px;
    padding-bottom: 100px;
    position: relative;
}





/*************Category Corousel********************/

.sectionlogo {
    padding-top: 30px !important;
    padding-bottom: 10px !important;
    position: relative;
}
.badge-primary
{
    background-color: #4353ff;
}
.badge-primary1 {
    color: #fff;
    background-color: #4353ff;
    width: 100%;
}
.badge {
    padding: .7em 0.8em;
    font-size:84%;
}
.moretext {
  display: none;
}
a.moreless-button {
    color: black;
    font-weight: 800;
    padding-left: 15px;
}
.moretext1 {
  display: none;
}
a.moreless-button1 {
    color: black;
    font-weight: 800;
    padding-left: 15px;
}
a.btn.btn-lg.btn-primary.btn-round {
    font-size: 16px;
}
/***********************************/

.cat-slider
{
    padding:10px;
}
.cat-slider .owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-next, .owl-carousel button.owl-dot.owl-nav {
    position: absolute;
    right: -23px;
    top: 38%;
    background-color: transparent !important;
    display: block;
    padding: 5px !important;
    font-size: 3em;
    margin: 0;
    cursor: pointer;
    color: #b7b7b7;
    transform: translate(-50%, -50%);
}
.cat-slider .owl-carousel .owl-nav button.owl-prev, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot.owl-nav {
    position: absolute;
    left: 0;
    top: 38%;
    background-color: transparent !important;
    display: block;
    padding: 5px !important;
    font-size: 3em;
    margin: 0;
    cursor: pointer;
    color: #b7b7b7;
    transform: translate(-50%, -50%);
}

.owl-theme .owl-nav [class*=owl-]:hover {
    color: #212f7e;
    text-decoration: none;
}

/*************Category Corousel********************/

.section50 {
    padding-top: 50px;
    padding-bottom: 50px;
    position: relative;
}

.serviceBox{
    z-index: 1;
    position: relative;
}
.serviceBox .service-content {
    padding: 15px;
    background: #fff;
    border: 1px solid #cfcfcf;
    text-align: center;
    position: relative;
}
.serviceBox .service-content:after{
    content: "";
    width: 100%;
    height: 100%;
    background: #4353ff;
    position: absolute;
    top: 3px;
    left: 3px;
    z-index: -1;
    transition: all 0.5s ease 0s;
}
.serviceBox:hover .service-content:after{
    top: 0;
    left: 0;
}
.serviceBox .service-icon{
    display: inline-block;
    font-size: 50px;
    color: #212f7e;
    margin-bottom: 20px;
    transition: all 0.5s ease 0s;
}
.serviceBox:hover .service-icon{ transform: rotateY(180deg); }
.serviceBox .title {
    font-size: 16px;
    font-weight: 800;
    color: #000000;
    text-transform: uppercase;
    margin: 0 0 10px 0;
}
.serviceBox .description{
    font-size: 15px;
    color: #000;
    line-height: 25px;
    margin-bottom: 0;
}
@media only screen and (max-width:990px){
    .serviceBox{ margin-bottom: 30px; }
}
</style>
<nav>
  <div class="container-fluid">
    <div class="row d-flex justify-content-between align-items-center">
      <div class="logo">
        <a href="{{ url('/') }}"><img src="https://demo.payjobindia.com/storage/system/logo.png" width="200"></a>
      </div>
      <div class="mobile_btn">
        <i class="fa fa-bars"></i>
      </div>
      <div class="main_menu">
        <ul>
          <li><a class="nav-link active" href="{{ url('/') }}">
                            <strong>Home</strong>
                        </a></li>
           <li><a class="nav-link" href="{{ url('/page/about') }}">
                            <strong>About Us</strong>
                        </a></li>
           <li><a class="nav-link" href="{{ url('/jobs?jobtype=3') }}">
                            <strong>Internships</strong>
                        </a></li>
          
          <li class="has_dropdown"><a href="#">For Candidate <i class="fa fa-angle-down"></i></a>
            <ul class="sub_menu">
              <li class="has_dropdown"><a href="#">Jobs By City <i class="fa fa-angle-right"></i></a>
                <ul class="sub_menu">
                  <li><a href="#">Jobs in Agra</a></li>
                  <li><a href="#">Jobs in Ahmednagar</a></li>
                  <li><a href="#">Jobs in Aigarh</a></li>
                  <li><a href="#">Jobs in Bengaluru</a></li>
                  <li><a href="#">Jobs in Pune</a></li>
                  <li><a href="#">Jobs in Mumbai</a></li>
                </ul>
              </li>
              
              <li class="has_dropdown"><a href="#">Jobs By Department <i class="fa fa-angle-right"></i></a>
                <ul class="sub_menu">
                  <li><a href="#">Admin / Back Office</a></li>
                  <li><a href="#">Advertising / Communication Jobs</a></li>
                  <li><a href="#">Beauty / Fitness</a></li>
                  <li><a href="#">Consulting</a></li>
                  <li><a href="#">CSR</a></li>
                  <li><a href="#">Banking</a></li>
                  <li><a href="#">Customer Support</a></li>
                </ul>
              </li>
              
              
              
            </ul>
          </li>
          <li class="has_dropdown"><a href="#">For Employer <i class="fa fa-angle-down"></i></a>
            <ul class="sub_menu">
              <li class="has_dropdown"><a href="#">Jobs By City <i class="fa fa-angle-right"></i></a>
                <ul class="sub_menu">
                  <li><a href="#">Jobs in Agra</a></li>
                  <li><a href="#">Jobs in Ahmednagar</a></li>
                  <li><a href="#">Jobs in Aigarh</a></li>
                  <li><a href="#">Jobs in Bengaluru</a></li>
                  <li><a href="#">Jobs in Pune</a></li>
                  <li><a href="#">Jobs in Mumbai</a></li>
                </ul>
              </li>
              
              <li class="has_dropdown"><a href="#">Jobs By Department <i class="fa fa-angle-right"></i></a>
                <ul class="sub_menu">
                  <li><a href="#">Admin / Back Office</a></li>
                  <li><a href="#">Advertising / Communication Jobs</a></li>
                  <li><a href="#">Beauty / Fitness</a></li>
                  <li><a href="#">Consulting</a></li>
                  <li><a href="#">CSR</a></li>
                  <li><a href="#">Banking</a></li>
                  <li><a href="#">Customer Support</a></li>
                </ul>
              </li>
              
              
              
            </ul>
          </li>
          
          <li class="mega_menu_dropdown mega_menu_demo_2 has_dropdown d-none">
            <a href="#">Shop 2 <i class="fa fa-angle-down"></i></a>
            <div class="mega_menu sub_menu">
              
              <div class="mega_menu_item">
                <h3>Theme Elements</h3>
                <a href="#">Mega menu item</a>
                <a href="#">Mega menu item</a>
                <a href="#">Mega menu item</a>
                <a href="#">Mega menu item</a>
                <a href="#">Mega menu item</a>
              </div>
              <div class="mega_menu_item">
                <h3>Theme Elements</h3>
                <a href="#">Mega menu item</a>
                <a href="#">Mega menu item</a>
                <a href="#">Mega menu item</a>
                <a href="#">Mega menu item</a>
                <a href="#">Mega menu item</a>
              </div>
              
            </div>
          </li>
          <!--<li><a href="#">Contact Us</a></li>-->

        </ul>
      </div>
      <?php
      
      ?>
      <div class="authbtns">
        @auth
            @can('admin')
            <a href="{{ route('settings.dashboard') }}" class="btn btn-lg btn-primary btn-round">{{ $user->name }}</a>
            <a href="{{ route('logout') }}" class="btn btn-lg btn-primary btn-round">Logout</a>
            @endcan
            @can('candidate')
             <a href="{{ route('dashboard') }}" class="btn btn-lg btn-primary btn-round">{{ $user->name }}</a>
             <a href="{{ route('logout') }}" class="btn btn-lg btn-primary btn-round">Logout</a>
            @endcan
            @can('employer')
            <a href="{{ route('company.dashboard') }}" class="btn btn-lg btn-primary btn-round">{{ $user->name }}</a>
            <a href="{{ route('logout') }}" class="btn btn-lg btn-primary btn-round">Logout</a>
            @endcan
                
        @else
            <a href="https://demo.payjobindia.com/employer-login" class="btn btn-lg btn-primary btn-round">Post Your Job</a>
            <a href="https://demo.payjobindia.com/candidate-login" class="btn btn-lg btn-primary btn-round">Post Your Resume</a>
        @endauth
      </div>
    </div>
  </div>
</nav>
<!-- Navbar End -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(function ($) {
  $(".mobile_btn").on("click", function () {
    $(".main_menu").slideToggle();
    $(".mobile_btn i").toggleClass("fa-xmark fa-xl");
  });

  if ($(window).width() < 768) {
    $(".main_menu  ul li a").on("click", function () {
      $(this)
        .parent(".has_dropdown")
        .children(".sub_menu")
        .css({ "padding-left": "15px" })
        .stop()
        .slideToggle();

      $(this)
        .parent(".has_dropdown")
        .children("a")
        .find(".fa-angle-right")
        .stop()
        .toggleClass("fa-rotate-90");
    });
  }
});

</script>
