 <!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Admin Login</title>
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

    
      

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">


 <div class="container-fluid">


   <?php  
        if(!empty($success_msg)){ 
            echo '<p class="status-msg success">'.$success_msg.'</p>'; 
        }elseif(!empty($error_msg)){ 
            echo '<p class="status-msg error">'.$error_msg.'</p>'; 
        } 
    ?>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
                <!-- Registration form -->
         <div class="box">
            <div class="box-header">
              
                <h3>Admin Login</h3>
           
            </div>

<div class="col-md-4">
            <form action="" method="post">

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="EMAIL" required="">
                <?php echo form_error('email','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="PASSWORD" required="">
                <?php echo form_error('password','<p class="help-block">','</p>'); ?>
            </div>
            
            <div class="send-button">
                <input type="submit" class="btn btn-success" name="loginSubmit" value="LOGIN">
            </div>
        </form>
        

  </div>
        </div>

        </div>
      </div>
</div>       
    


  </div>
            <!-- End Page-content -->

           
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <script src="<?php echo base_url(); ?>public/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url(); ?>public/assets/libs/jquery.easing/jquery.easing.min.js"></script>

    <script src="<?php echo base_url(); ?>public/assets/js/app.js"></script>

</body>

</html>



