<!DOCTYPE html>
<html dir="ltr">


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/nice-admin/html/ltr/authentication-login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jun 2020 07:53:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="<?= base_url('assets/images/footer-logo.ico') ?>">
    <title>Capital Revival - Admin</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/niceadmin/" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/dist/css/style.min.css'); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script type="text/javascript">localStorage.removeItem('isAdmin');</script>
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?php echo base_url('assets/images/login-bg.jpg'); ?>) no-repeat center center; background-size:cover;">
            <div class="auth-box">
                <div id="loginform" class="loginform">
                    <div class="logo">
                        <span class="db"><img src="<?php echo base_url('assets/images/logo.png'); ?>" style='width: auto; height: 75px' alt="logo" /></span>
                        <h5 class="mb-4 pb-1">Sign In to Admin</h5>
                    </div>
                    <!-- Form -->
                    <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                            <?php endif; ?>
                    <form class="loginForm" id="loginform" action="<?php echo site_url('auth/login'); ?>" method="post">

                    <div class="form-group">
                        
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="username" name="username" required>
                       
                    </div>
                    <div class="form-group">
                        
                        <input type="password" class="form-control" placeholder="••••••••"  aria-label="Password" aria-describedby="basic-addon1" id="password" name="password" required type="password">
                    </div>
                    <div class="d-flex justify-content-center">
                    
                        <button type="submit"  class="btn btn-primary login-submit-button  mt-3" >Submit</button>
                    </div>
                    
                    </form>
                </div>
                <div id="recoverform">
                    <div class="logo">
                        <span class="db"><img src="<?php echo base_url('assets/images/logo-icon.png'); ?>" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Recover Password</h5>
                        <span>Enter your Email and instructions will be sent to you!</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" action="https://www.wrappixel.com/demos/admin-templates/nice-admin/html/ltr/index.html">
                            <!-- email -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control form-control-lg" type="email" required="" placeholder="Username">
                                </div>
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('assets/libs/popper.js/dist/umd/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    localStorage.removeItem('isAdmin');
    </script>
</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/nice-admin/html/ltr/authentication-login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jun 2020 07:53:39 GMT -->
</html>
