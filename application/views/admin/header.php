<!DOCTYPE html>
<html dir="ltr" lang="en">


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/nice-admin/html/ltr/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Jun 2020 07:47:19 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/footer-logo.ico') ?>">
    <title>Capital Revival - Admin</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/niceadmin/" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/libs/chartist/dist/chartist.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/extra-libs/c3/c3.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/dist/css/style.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="index.html" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <!-- <img src="<?php echo base_url('assets/images/logo-icon.png'); ?>" alt="homepage" class="dark-logo" /> -->
                                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="homepage" class="dark-logo w-80" />
                                <!-- Light Logo icon -->
                                <!-- <img src="<?php echo base_url('assets/images/logo-light-icon.png'); ?>" alt="homepage" class="light-logo" /> -->
                                <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="homepage" class="light-logo" style="height: 48px" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <!-- <span class="logo-text">
                                
                                <img src="<?php echo base_url('assets/images/logo-text.png'); ?>" alt="homepage" class="dark-logo" />
                              
                                <img src="<?php echo base_url('assets/images/logo-light-text.png'); ?>" class="light-logo" alt="homepage" />
                            </span> -->
                        </a>
                        <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                            <i class="mdi mdi-toggle-switch mdi-toggle-switch-off font-20"></i>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">

                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">

                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown border-right">

                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo base_url('assets/images/users/2.jpg'); ?>" alt="user" class="rounded-circle" width="40">
                                <span class="m-l-5 font-medium d-none d-sm-inline-block"><?php echo $this->session->userdata('username'); ?> <i class="mdi mdi-chevron-down"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="<?php echo base_url('assets/images/users/2.jpg'); ?>" alt="user" class="rounded-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php echo $this->session->userdata('username'); ?></h4>

                                    </div>
                                </div>
                                <div class="profile-dis scrollable">

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo site_url('ChangePassword'); ?>">
                                                <img src="<?php echo base_url('assets/images/change-pass.png'); ?>"  alt="change password"  height="18" style="margin-top:-5px; margin-right:8px;"/> Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" target="_blank" href="/">
                                        <i class="ti-settings m-r-5 m-l-5"></i> Edit Content</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo site_url('auth/logout'); ?>">
                                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    <div class="dropdown-divider"></div>
                                </div>

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
</header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
