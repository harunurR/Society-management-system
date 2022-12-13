<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Society Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
    <!-- App css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/libs/select2/select2.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/libs/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet" type="text/css" />
    
    <script>
        var baseUrl="<?= base_url() ?>";
    </script>
</head>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?= base_url('assets/images/users/avatar-1.jpg') ?>" alt="user-image" class="rounded-circle">
                            <span class="ml-1">Harunur Rashid <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock"></i>
                                <span>Lock Screen</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="<?= base_url('logout') ?>" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>
                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <!-- <img src="<?= base_url('assets/images/logo-dark.png') ?>" alt="" height="16"> -->
                            <span class="logo-lg-text-light">SKRAWS</span>
                        </span>
                        <span class="logo-sm">
                            <span class="logo-sm-text-dark">KHS</span>
                            <!-- <img src="<?= base_url('assets/images/logo-sm.png') ?>" alt="" height="24"> -->
                        </span>
                    </a>
                </div>

            </div> <!-- end container-fluid-->
        </div>
        <!-- end Topbar -->

        
        <!-- end navbar-custom -->

    
    <!-- End Navigation Bar-->