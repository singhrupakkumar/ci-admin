<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Customer Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Qovex Premium Multipurpose Admin & Dashboard Template documentation of PHP Ajax Codeigniter" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="keywords" content="Qovex admin documentation, Qovex PHP Ajax Codeigniter documentation, Qovex documentation">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>public/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
    <!-- Icons Css -->
    <link href="<?php echo base_url(); ?>public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url(); ?>public/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
       <!-- JAVASCRIPT -->
    <script src="<?php echo base_url(); ?>public/assets/libs/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</head>

<body data-topbar="dark" data-spy="scroll" data-target=".right-side-nav" data-offset="175">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="<?php echo base_url('users/account'); ?>" class="logo logo-light">
                             <span class="logo-sm header-item">
                               Customer Dashboard
                            </span>
                            <span class="logo-lg header-item">
                                Customer Dashboard
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect d-lg-none" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>

                <div class="d-flex">
                	<div class="d-md-inline-block">
                        
                        <a href="<?php echo base_url('users/account'); ?>" class="header-item">Dashboard</a>
                        <?php if($this->session->userdata('userId')) { ?>
                        <a href="<?php echo base_url('users/orderhistory'); ?>" class="header-item">Order History</a>
                          <a href="<?php echo base_url('users/logout'); ?>" class="header-item">Logout</a>
                         <?php }else{ ?> 
                            <a href="<?php echo base_url('users/login'); ?>" class="header-item">Login</a>
                          <?php } ?>  

                    </div>
                </div>
            </div>
        </header>

      

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

