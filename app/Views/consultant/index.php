<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Login | Pay Job India</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    <style>
.bg-success.bg-soft {

/*background-image: -webkit-linear-gradient(-180deg, rgb(162 13 25) 0%, rgb(18 57 112) 100%);*/
background: #212f7e !important;
}
.btn-success {
color: #fff;
background-color: #212f7e !important;
border-color: #000;
}
.btn-success:hover {
color: #fff;
background-color: #000 !important;
border-color: #212f7e;
}
    </style>
</head>

<body style="background-image: -webkit-linear-gradient(-180deg, rgb(224 138 56 / 64%) 0%, rgb(173 209 194) 64%);">
<!--<body style="background-image: -webkit-linear-gradient(-180deg, rgb(1 62 121) 0%, rgb(205 0 0) 100%);">-->
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-success bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-white">Welcome Back !</h5>
                                        <p class="text-white">Sign in to continue to Pay Job India.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?= base_url('back/assets/images/profile-img.png') ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="index.php" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?php echo base_url('front/assets/images/favicon.png') ?>" alt="" class="rounded-circle" width="50px">
                                            <!--<img src="<?= base_url('front/assets/img/Farm Easy Web Icon.png') ?>" alt="" class="rounded-circle" width="50px">-->
                                        </span>
                                    </div>
                                </a>

                                <a href="index.php" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?php echo base_url('front/assets/images/favicon.png') ?>" alt="" class="rounded-circle" width="50px">
                                            <!--<img src="<?= base_url('front/assets/img/Farm Easy Web Icon.png') ?>" alt="" class="rounded-circle" width="50px">-->
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                
                                <div>
                                    <?php if (session()->getFlashdata('success')) : ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <?= session()->getFlashdata('success') ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (session()->getFlashdata('error')) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= session()->getFlashdata('error') ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <form class="form-horizontal" action="<?php echo base_url('consultant/loginAuth'); ?>" id="loginForm" method="post">

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-success waves-effect waves-light" type="submit" value="Login" name="Login">Log In</button>
                                    </div>

                                    
                                </form>
                            </div>

                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="public/back/assets/js/app.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script>
$("#loginForm").validate();
</script>
</body>
</html>