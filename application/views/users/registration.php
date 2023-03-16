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
              
                <h3>Create a New Account</h3>
           
            </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
                 <div class="form-group">
                    <label>NAME</label>
                <input type="text" name="name"  class="form-control" value="<?php echo !empty($user['name'])?$user['name']:''; ?>" required>
                <?php echo form_error('name','<p class="help-block">','</p>'); ?>
            </div>
       
            <div class="form-group">
                 <label>EMAIL</label>
                <input type="email" name="email" class="form-control"  value="<?php echo !empty($user['email'])?$user['email']:''; ?>" required>
                <?php echo form_error('email','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                 <label>PASSWORD</label>
                <input type="password" name="password" class="form-control"  required>
                <?php echo form_error('password','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                 <label>CONFIRM PASSWORD</label>
                <input type="password" name="conf_password" class="form-control"  required>
                <?php echo form_error('conf_password','<p class="help-block">','</p>'); ?>
            </div>

             <div class="form-group">
                 <label>Person Contact</label>
                <input type="text" name="person_contact" class="form-control"  value="<?php echo !empty($user['person_contact'])?$user['person_contact']:''; ?>">
                <?php echo form_error('person_contact','<p class="help-block">','</p>'); ?>
            </div>




             <div class="form-group">
                 <label>IC Pictures</label>
                <input type="file" name="ic_pictures" class="form-control" value="<?php echo !empty($user['ic_pictures'])?$user['ic_pictures']:''; ?>" required>
                <?php echo form_error('ic_pictures','<p class="help-block">','</p>'); ?>
            </div>

             <div class="form-group">
                 <label>Address</label>
                 <textarea name="address" class="form-control"><?php echo !empty($user['address'])?$user['address']:''; ?></textarea>
                
            </div>

            <div class="form-group">
                 <label>Remarks</label>
                 <textarea name="remarks" class="form-control"><?php echo !empty($user['remarks'])?$user['remarks']:''; ?></textarea>
                
            </div>

            <div class="send-button">
                <input type="submit" name="signupSubmit" class="btn btn-success" value="CREATE ACCOUNT">
            </div>
            </div>
           
        </form>
        <p>Already have an account? <a href="<?php echo base_url('users/login'); ?>">Login here</a></p>
    </div>

        </div>
      </div>
</div>       
	