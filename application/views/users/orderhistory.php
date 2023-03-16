 <div class="container-fluid">
   <?php  
        if(!empty($success_msg)){ 
            echo '<p class="status-msg success">'.$success_msg.'</p>'; 
        }elseif(!empty($error_msg)){ 
            echo '<p class="status-msg error">'.$error_msg.'</p>'; 
        } 
    ?>

  <section class="content-header">
    <h1>Order History</h1>
</section>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              

           
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
              	<tr>
                  <th>Customer Name</th>
                  <th>Rate</th>
                  <th>Buy / Sell</th>
                  <th>Status</th>
                  <th>Customer Attachment</th>
                  <th>Admin Attachment</th>
                </tr>
               <?php 
               if(!empty($order)){
               	foreach ($order as $key => $value) {
            
               ?>
                <tr>
                  <td><?php echo $value['customer_name'] ;?></td>
                  <td><?php echo $value['rate'] ;?></td>
                  <td><?php echo $value['buy_sell'] ;?></td>
                  <td><?php echo $value['status']==1?'In Progress':'Complete' ;?></td>
                  <td>
                    <?php if(isset($value['customer_attachment'])) { ?>
                    <a href="<?php echo base_url().'uploads/'.$value['customer_attachment'] ;?>" download><img src="<?php echo base_url().'uploads/'.$value['customer_attachment'] ;?>" width="150"></a>
                  <?php } ?>
                  </td>
                  <td>
                    <?php if(isset($value['admin_attachment'])) { ?>
                    <a href="<?php echo base_url().'uploads/'.$value['admin_attachment'] ;?>" download><img src="<?php echo base_url().'uploads/'.$value['admin_attachment'] ;?>" width="150"></a>
                  <?php } ?>
                  </td>
                </tr>
            <?php } }?>
                
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</div>