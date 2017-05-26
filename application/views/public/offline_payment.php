
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ 
	          <?php
				
				 if($getCart = $this->cart->contents()){ 
				   $sum =0;
				   foreach($getCart as $Cart){$sum++;
			  ?>
	<small><?php } echo $sum; ?> Item(s) </small>
	           <?php }else{ ?><small><?php echo "No Item"; }?>  </small>
	]<a href="products.php" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft"/>
		
			
	<table class="table table-bordered">
              <thead>
                <tr>
				  <th width="10%">SL</th>
                  <th width="20%">Product</th>
                  <th width="20%">Product Name</th>
                  <th width="20%">Quantity/Update</th>
				  <th width="10%">Price</th>
                  <th width="10%">Total</th>
				  
				</tr>
              </thead>
              <tbody>
			 <?php
			           if($getCart = $this->cart->contents())
						   $i = 0;
						   $sum = 0;
				           foreach($getCart as $Cart){
						   $i++;
			  ?>
                <tr>
	              <td><?php echo $i; ?></td>
				<?php if ($this->cart->has_options($Cart['rowid']) == TRUE) ?>
				<?php foreach ($this->cart->product_options($Cart['rowid']) as $option_name => $option_value)?>
	              <td> <img width="50%" src="<?= base_url($option_value); ?>" alt=""/></td>
	              <td><?= $Cart['name'];?></td>
	              <td>
		               <div class="input-append">
					   <form action="<?= base_url('offlinepayment/update');?>" method="post">
					   <input type="hidden" name="rowid" value="<?= $Cart['rowid'];?>" />
					   <input class="span1" style="max-width:34px" min="1" name="qty" value="<?= $Cart['qty'];?>"  size="16" type="number">
					   <button class="btn btn-danger" type="submit"><i class="icon-plus icon-white"></i></button>
					   </form>
					   </div>
	              </td>
	              <td>$<?= $Cart['price'];?></td>
	              <td>$<?php
		              $total = $Cart['price'] * $Cart['qty'];
		              echo $total;
                       ?></td>
	              
                </tr>
				<?php 
				   $sum = $sum + $total;
				?>
			<?php } ?>	
				
                <tr>
                  <td colspan="5" style="text-align:right">Total Price:	</td>
                  <td>
				   $<?php
				    if(isset($sum)){
				    echo $sum;
					}else{
					echo "0";
					} ?>
				   </td>
                </tr>
                 <tr>
                  <td colspan="5" style="text-align:right">Total Tax:	</td>
                  <td> 
				  <?php
				    $tax = $sum * 0.1;
				    if(isset($sum)){
				    echo "10% ($".$tax.")";
					}else{
					echo "0%";
					} ?>
				  </td>
                </tr>
				 <tr>
                  <td colspan="5" style="text-align:right">
				    <?php
					   $Gtotal = $sum + $tax;
					?>
				  <strong>TOTAL ($<?php if(isset($sum)){ echo $sum; }else{ echo "0"; } ?> + $<?php echo $tax; ?>) =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> $<?php echo $Gtotal; ?> </strong></td>
                </tr>
				</tbody>
            </table>
		
		  <?php
			 	if( count($cusData) ){
			      foreach($cusData as $custData){
				 
			 ?> 
            <table class="table table-bordered">
			<tbody>
				 
				   <tr>
						  <td> Name : </td>
						  <td><?php echo $custData->title; ?> <?php echo $custData->fname; ?> <?php echo $custData->lname; ?></td>
	               </tr>
				   
				   <tr>
						  <td>Address : </td>
						  <td><?php echo $custData->address1; ?>, <?php echo $custData->address2; ?> <?php echo $custData->city; ?> Pin- <?php echo $custData->pin; ?>, <?php echo $custData->state; ?></td>
						  <form action="<?= base_url('Order/completeOrder'); ?>" method="post" >
						  <td><button class="btn" style="background:#0066FF; text-shadow:none; padding:8px 10px; font-size:20px;color:#FFF;">Countinue with this address <i class="icon-arrow-right"></i></button></td>
						  </form>
	               </tr>
				
				
				   <tr>
						  <td>Phone No.: </td>
						  <td><?php echo $custData->phone; ?></td>
						   <td><a href="<?= base_url('Profile'); ?>" class="btn btn-large" style="background:#CCFF00">Edit Address</a></td>
	               </tr>
				   
				   
				
			</tbody>
			</table>
			<?php }} ?>
			
			
	<a href="products.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
