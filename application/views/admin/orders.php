<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">

        	 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Orders</h3>

           
            </div>

        	<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Customer Name</th>
			      <th scope="col">Rate</th>				  <th scope="col">Unit</th>				  <th scope="col">Total</th>
			      <th scope="col">Buy / Sell</th>
			      <th scope="col">Status</th>
			      <th scope="col">Customer Attachment</th>
			      <th scope="col">Admin Attachment</th>				  <th scope="col">Date Time</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
               if(!empty($order)){
               	foreach ($order as $key => $value) {
            
               ?>
			    <tr>
			      <th scope="row"><?php echo $key+1 ;?></th>
			      <td><?php echo $value['customer_name'] ;?></td>
			      <td><?php echo $value['rate'] ;?></td>				  <td><?php echo $value['unit'] ;?></td>				  <td><?php echo $value['total'] ;?></td>
			      <td><?php echo $value['buy_sell'] ;?></td>
			      <td>				  <?php				  				  if($value['status']==2){					  echo "Rejected";				  }else if($value['status']==3){					 echo "Complete"; 				  }else{					  echo "Pending";				  }				  if($value['status']==1)					  { 					  ?>				  <a href="reject?order_id=<?php echo $value['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to reject?')"> Reject</a>				  <?php } ?>				  </td>
                  <td>
                  	  <?php if(isset($value['customer_attachment'])) { ?>
                    <a href="<?php echo base_url().'uploads/'.$value['customer_attachment'] ;?>" download><img src="<?php echo base_url().'uploads/'.$value['customer_attachment'] ;?>" width="150"></a>
                  <?php } ?>
                  </td>
                  <td>
                  	 <?php if(isset($value['admin_attachment'])) { ?>
                    <a href="<?php echo base_url().'uploads/'.$value['admin_attachment'] ;?>" download><img src="<?php echo base_url().'uploads/'.$value['admin_attachment'] ;?>" width="150"></a>
                  <?php }else{

                  	?>
                  	 <form method="POST" enctype="multipart/form-data">
                  	 	<input type="hidden" name="order_id" value="<?php echo $value['id'] ;?>">
        				<input type="file" name="admin_attachment" class="form-control" required>
        				<input type="submit" class="btn btn-warning" name="sellform" value="Upload Attachment">
        			 

        			</form>			


                  <?php } ?>
                  </td>				  				  <td><?php echo $value['created_at'] ;?></td>
			    </tr>

			   <?php } }?>
			  
			  </tbody>
			</table>

 			</div>
        
        </div>
    </div>
    <!-- end row -->
    
</div> <!-- container-fluid -->