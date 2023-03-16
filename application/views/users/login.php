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
              
                <h3>Login to Your Account</h3>
           
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
        <p>Don't have an account? <a href="<?php echo base_url('users/registration'); ?>">Register</a></p>

  </div>
        </div>

        </div>
      </div>
</div>       
    






