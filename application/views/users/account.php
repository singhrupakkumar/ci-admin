

      <!-- Main content -->
    <section class="content">
       <?php  
        if(!empty($success_msg)){ 
            echo '<p class="status-msg success">'.$success_msg.'</p>'; 
        }elseif(!empty($error_msg)){ 
            echo '<p class="status-msg error">'.$error_msg.'</p>'; 
        } 
    ?>
       <div class="box box-default">
                <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Buy</label>
                <?php
                  $this->db->select('value'); 
                  $this->db->from('settings');
                  $this->db->where('meta_key','buy'); 
                  $query1 = $this->db->get(); 
                  $buyresult = $query1->row_array(); 
                
                ?>
              	<input type="text" name="buy"  id="buyrate" value="<?php echo isset($buyresult['value'])?$buyresult['value']:''; ?>" class="form-control" readonly="readonly">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Available Unit</label>
                <?php
                  $this->db->select('value'); 
                  $this->db->from('settings');
                  $this->db->where('meta_key','available_unit'); 
                  $query2 = $this->db->get(); 
                  $available_unitresult = $query2->row_array(); 
                
                ?>
                <input type="text" name="available_unit" value="<?php echo isset($available_unitresult['value'])?$available_unitresult['value']:0; ?>" class="form-control" readonly="readonly">
              </div>
              <!-- /.form-group -->

            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Sell</label>
                 <?php
                  $this->db->select('value'); 
                  $this->db->from('settings');
                  $this->db->where('meta_key','sell'); 
                  $query3 = $this->db->get(); 
                  $sellresult = $query3->row_array(); 
                
                ?>
              	<input type="text" name="sell" id="sellrate" class="form-control" value="<?php echo isset($sellresult['value'])?$sellresult['value']:''; ?>" readonly="readonly">
              </div>
              </div>
              <!-- /.form-group -->
             
              <!-- /.form-group -->
            </div>


            <div class="row">
            	<div class="col-md-6 mt-10">
            		 <div class="form-group">
                 <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="buy">Order</button>

              			</div>
            	</div>

            	<div class="col-md-6">
            		 <div class="form-group">
               		 
                   <button type="button" class="btn btn-warning mt-10" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="sell">Order</button>
              			</div>
            	</div>
            </div>	
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
      </div>
    </section>
    <!-- /.content -->



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Buy Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="buyform" value="1">
        <input type="hidden" name="buy" value="<?php echo isset($buyresult['value'])?$buyresult['value']:''; ?>">
      <div class="modal-body">


        

           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Unit:</label>
            <input type="text" class="form-control" id="buyunit" name="unit">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Total:</label>
            <input type="number" min="0" class="form-control" id="buytotal" name="total" readonly="readonly">
          </div>

            <?php
            $this->db->select('value'); 
            $this->db->from('settings');
            $this->db->where_in('meta_key',['bank_acc1','bank_acc2','bank_acc3']);
            $querybank = $this->db->get(); 
            $bankacc = $querybank->result_array(); 

            if(!empty($bankacc)){
              foreach ($bankacc as $key => $bank) {
                $num = $key+1;
                echo  "<strong> Bank Account ".$num." : </strong>". $bank['value']."<br/>";
              }
            }
          
          ?>

           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Attachment:</label>
            <input type="file" class="form-control" id="buycustomer_attachment" name="customer_attachment">
          </div>


       
         
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="orderbtn" class="btn btn-primary">Order Now</button>
      </div>
       </form>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sell Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="sellform" value="1">
        <input type="hidden" name="sell" value="<?php echo isset($sellresult['value'])?$sellresult['value']:''; ?>">
      <div class="modal-body">


        

           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Unit:</label>
            <input type="text" class="form-control" id="sellunit" name="unit">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Total:</label>
            <input type="number" min="0" class="form-control" id="selltotal" name="total" readonly="readonly">
          </div>

            <?php
            $this->db->select('value'); 
            $this->db->from('settings');
            $this->db->where_in('meta_key',['wallet_link1','wallet_link2','wallet_link3']);
            $querywallet = $this->db->get(); 
            $walletLink = $querywallet->result_array(); 

            if(!empty($walletLink)){
              foreach ($walletLink as $key => $bank) {
                $num = $key+1;
                echo  "<strong> Wallet Link ".$num." : </strong> ". $bank['value']."<br/>";
              }
            }
          
          ?>

           <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Attachment:</label>
            <input type="file" class="form-control" id="sellcustomer_attachment" name="customer_attachment">
          </div>


       
         
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="orderbtn" class="btn btn-primary">Order Now</button>
      </div>
       </form>
    </div>
  </div>
</div>




<script type="text/javascript">

  var userId = '<?php echo $this->session->userdata('userId') ;?>';

$('#buyunit').on('change',function(){
  var total = $('#buyrate').val()*$(this).val();
   $('#buytotal').val(total);
});

$('#sellunit').on('change',function(){
  var total = $('#sellrate').val()*$(this).val();
   $('#selltotal').val(total);
});

  const exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', event => {

  if(userId !== ''){

  }else{
    alert('You must login first!');
    window.location.href= 'login';
  }

})

const exampleModalSell = document.getElementById('exampleModal1')
exampleModalSell.addEventListener('show.bs.modal', event => {

  if(userId !== ''){

  }else{
    alert('You must login first!');
    window.location.href= 'login';
  }

})

</script>
