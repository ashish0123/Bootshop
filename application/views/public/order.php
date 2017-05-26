
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> ORDERED PRODUCT</li>
    </ul>
	     <?php if($this->session->flashdata('feedback')==true ){ ?>
	      <div class="alert alert-block alert-error fade in">
		     <button type="button" class="close" data-dismiss="alert">&times;</button>
		   <?php echo $this->session->flashdata('feedback'); ?>
	      </div>	
         <?php } ?>	
	<h3> Ordered Product <a href="products.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>
		
			
	<table class="table table-bordered">
              <thead>
                <tr>
				  <th width="1%">SL</th>
                  <th width="20%">Product</th>
                  <th width="20%">Product Name</th>
                  <th width="10%">Quantity</th>
				  <th width="14%">Total Price</th>
                  <th width="5%">Status</th>
				  <th width="20%">Date</th>
				  <th width="10%">Action</th>
				  
				</tr>
              </thead>
              <tbody>
			  <?php 
			            if( count($odrData) ){
						$i=0;
						$sum=0;
			      foreach($odrData as $orderData){ $i++;
			  ?>
                <tr>
	              <td><?php echo $i; ?></td>
	              <td> <img width="50%" src="<?php echo $orderData->image;?>" alt=""/></td>
	              <td><?php echo $orderData->productName;?></td>
	              <td><?php echo $orderData->quantity;?></td>
	              <td>$<?php echo $orderData->price;?></td>
				  <td><?php echo $orderData->status;?></td>
				  <td><?php echo date('d M, Y g:i a', strtotime($orderData->date));?></td>
				  <td><a onclick="return confirm('Are you sure want to Cancel this product ?');" href="<?php echo base_url('Order/cancel').'/'.$orderData->id;?>">
				  <button class="btn btn-danger" type="button">cancel</button>
				  </a></td>
                </tr>
				<?php $sum = $sum + $orderData->price; }?>
				
				<tr>
				  <td colspan="7" style="text-align:right;">Total Price : </td>
				  <td> $<?php echo $sum; ?> </td>
				</tr>	
				
				<tr>
				  <td colspan="7" style="text-align:right;">Total Tax : (10%)</td>
				  <td> $<?php echo ($sum * 0.1); ?> </td>
				</tr>
				
				<tr>
				  <td colspan="7" style="text-align:right;"><b>Grand Total :</b></td>
				  <td> $<?php echo $sum + ($sum * 0.1); ?> </td>
				</tr>
				<?php } else {?>
				<tr>
				  <td colspan="8" style="text-align:center;"><h2>You didn't buy anything.</h2><br>
				  <h5>Why aren't you buy something !!</h5></td>
				</tr>
				<?php } ?>
				</tbody>
            </table>
	<?php	
	                  if( count($dlvrData) ){
						$i=0;
	?>	
	    <h3> Delivered Product</h3>
		<table class="table table-bordered">
              <thead>
                <tr>
				  <th width="1%">SL</th>
                  <th width="15%">Product</th>
                  <th width="20%">Product Name</th>
                  <th width="10%">Quantity</th>
				  <th width="14%">Total Price</th>
                  <th width="5%">Status</th>
				  <th width="20%">Order Date</th>
				  <th width="15%">Delivar Date</th>
				  
				</tr>
              </thead>
              <tbody>
			  <?php 
			            
						   foreach($dlvrData as $deliverData){
						      $i++;
			  ?>
                <tr>
	              <td><?php echo $i; ?></td>
	              <td> <img width="50%" src="<?php echo $deliverData->image;?>" alt=""/></td>
	              <td><?php echo $deliverData->productName;?></td>
	              <td><?php echo $deliverData->quantity;?></td>
	              <td>$<?php echo $deliverData->price;?></td>
				  <td><?php echo $deliverData->status;?></td>
				  <td><?php echo date('d M, Y g:i a', strtotime($deliverData->date));?></td>
				  <td><?php echo $deliverData->deldate;?></td>
                </tr>
				<?php  }?>
				</tbody>
		</table>
	<?php } ?>		
</div>
</div></div>
</div>			