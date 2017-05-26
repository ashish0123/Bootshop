

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
	
	<?php if($this->session->flashdata('no_item')==true ){ ?>
	      <div class="alert alert-block alert-error fade in">
		     <button type="button" class="close" data-dismiss="alert">&times;</button>
		   <?php echo $this->session->flashdata('no_item'); ?>
	      </div>	
         <?php } ?>	
			
	<table class="table table-bordered">
              <thead>
                <tr>
				  <th width="10%">SL</th>
                  <th width="20%">Product</th>
                  <th width="20%">Product Name</th>
                  <th width="20%">Quantity/Update</th>
				  <th width="10%">Price</th>
                  <th width="10%">Total</th>
				  <th width="10%">Action</th>
				  
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
					   <form action="<?= base_url('productsummary/update');?>" method="post">
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
	              <td><a onclick="return confirm('Are you sure want to remove this product ?');" href="<?= base_url('productsummary/remove')."/".$Cart['rowid']; ?>">
				  <button class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button>
				  </a></td>
                </tr>
				<?php 
				   $sum = $sum + $total;
				?>
			<?php } ?>	
				
                <tr>
                  <td colspan="6" style="text-align:right">Total Price:	</td>
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
                  <td colspan="6" style="text-align:right">Total Tax:	</td>
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
                  <td colspan="6" style="text-align:right">
				    <?php
					   $Gtotal = $sum + $tax;
					?>
				  <strong>TOTAL ($<?php if(isset($sum)){ echo $sum; }else{ echo "0"; } ?> + $<?php echo $tax; ?>) =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> $<?php echo $Gtotal; ?> </strong></td>
                </tr>
				</tbody>
            </table>
		
		
            <table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-horizontal">
				<div class="control-group">
				<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
				<div class="controls">
				<input type="text" class="input-medium" placeholder="CODE">
				<button type="submit" class="btn"> ADD </button>
				</div>
				</div>
				</form>
				</td>
                </tr>
				
			</tbody>
			</table>
			
			<table class="table table-bordered">
			 <tr><th>ESTIMATE YOUR SHIPPING </th></tr>
			 <tr> 
			 <td>
				<form class="form-horizontal">
				  <div class="control-group">
					<label class="control-label" for="inputCountry">Country </label>
					<div class="controls">
					  <input type="text" id="inputCountry" placeholder="Country">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="inputPost">Post Code/ Zipcode </label>
					<div class="controls">
					  <input type="text" id="inputPost" placeholder="Postcode">
					</div>
				  </div>
				  <div class="control-group">
					<div class="controls">
					  <button type="submit" class="btn">ESTIMATE </button>
					</div>
				  </div>
				</form>				  
			  </td>
			  </tr>
            </table>		
	<a href="products.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="<?= base_url('user');?>" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
	
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->
