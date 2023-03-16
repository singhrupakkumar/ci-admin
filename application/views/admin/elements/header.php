<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Qovex Premium Multipurpose Admin & Dashboard Template documentation of PHP Ajax Codeigniter" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="keywords" content="Qovex admin documentation, Qovex PHP Ajax Codeigniter documentation, Qovex documentation">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url(); ?>public/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url(); ?>public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url(); ?>public/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-topbar="dark" data-spy="scroll" data-target=".right-side-nav" data-offset="175">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm header-item">
                               Admin Panel
                            </span>
                            <span class="logo-lg header-item">
                                 Admin Panel
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect d-lg-none" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>

                <div class="d-flex">

                    <div class="d-md-inline-block">

                        <a href="<?php echo base_url('admin/logout'); ?>" class="header-item">Logout</a>
                    </div>

                    

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Dashboard</li>

                        <li>
                            <a href="<?php echo base_url(); ?>admin/customers" class="waves-effect">
                                <i class="mdi mdi-account-multiple-plus"></i>
                                <span>Customers</span>
                            </a>
                        </li>

                         <li>
                            <a href="<?php echo base_url(); ?>admin/orders" class=" waves-effect">
                                <i class="mdi mdi-shopping"></i>
                                <span>Orders</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>admin/settings" class=" waves-effect">
                                <i class="mdi mdi-cog-outline"></i>
                                <span>Settings</span>
                            </a>
                        </li>

                        

                    

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">