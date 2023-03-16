<div class="container-fluid">

    <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Admin Settings</h3>

           
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">

                <?php 
                foreach ($fields as $key => $value) {
                  
                 ?>
               <form method="POST">
                <tr>
                  <th><?php echo $value['label'];?></th>
                  <td><input type="<?php echo $value['type'];?>" name="<?php echo $value['name'];?>" placeholder="<?php echo $value['placeholder'];?>" class="form-control"></td>
                  <td><input type="submit" name="submit" value="Update" class="btn btn-success"></td>
                  <td><?php echo $value['value'];?></td>
                </tr>
               </form> 
             <?php } ?>
            
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    
</div> <!-- container-fluid -->

