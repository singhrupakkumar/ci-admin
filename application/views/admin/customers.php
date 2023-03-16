<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">

        	 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customers</h3>

           
            </div>

        	<table class="table table-striped table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
				  <th scope="col">Customer Name</th>
			      <th scope="col">Email</th>
			      
			      <th scope="col">Address</th>
			      <th scope="col">Person Contact</th>
			      <th scope="col">Ic Pictures</th>
			      <th scope="col">Remarks</th>				  <th scope="col">Status</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
               if(!empty($user)){
               	foreach ($user as $key => $value) {
            
               ?>
			    <tr>
			      <th scope="row"><?php echo $key+1 ;?></th>
			      <td><?php echo $value['name'] ;?></td>
			      <td><?php echo $value['email'] ;?></td>
			      <td><?php echo $value['address'] ;?></td>
                  <td><?php echo $value['person_contact'] ;?></td>
                  <td>
                  
                   <?php if(isset($value['ic_pictures'])) { ?>
                    <a href="<?php echo base_url().'uploads/'.$value['ic_pictures'] ;?>" download><img src="<?php echo base_url().'uploads/'.$value['ic_pictures'] ;?>" width="150"></a>
                  <?php } ?>

                  </td>
                  <td><?php echo $value['remarks'] ;?></td>				  <td>					<?php										if($value['status']==0)					  { 					  ?>				  <a href="approval?user_id=<?php echo $value['id']; ?>" class="btn btn-info" onclick="return confirm('Are you sure you want to approved?')"> Approval</a>				  <?php }else{					  					  echo "Active";				  } ?>				  </td>
			    </tr>

			   <?php } }?>
			  
			  </tbody>
			</table>

 			</div>
        
        </div>
    </div>
    <!-- end row -->
    
</div> <!-- container-fluid -->