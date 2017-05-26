
<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li><a href="products.php">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul>	
	<div class="row">	
	         <?php
			 	if( count($prodetail) ){
			      foreach($prodetail as $prodetail){
			 ?>
			<div id="gallery" class="span3">
            <a href="<?php echo base_url($prodetail->image); ?>" title="<?php echo $prodetail->productName;?>">
				<img src="<?php echo base_url($prodetail->image); ?>"  alt="<?php echo $prodetail->productName;?>"/>
            </a>
			</div>
			
			<div class="span6">
			
				<h3><?php echo $prodetail->productName;?></h3>
				<hr class="soft"/>
				<form action="<?= base_url('productdetails/add'); ?>" class="form-horizontal qtyFrm" method="post">
				  <div class="control-group">
					<label class="control-label"> <span>Price: $<?php echo $prodetail->price;?></span></label>
					<div class="controls">
					<input type="number" class="span1" value="1" min="1" name="quantity" placeholder="Qty."/>
					<input type="hidden" value="<?php echo $prodetail->productId;?>" name="productId" />
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
					</div>
				  </div>
				  <span style="font-size:20px; color:#FF0000; float:right"><?php if(isset($addCart)){ echo $addCart; } ?></span>
				</form>
				<hr class="soft clr"/>
				<p><?= word_limiter($prodetail->body, 15); ?>   </p>
				<a class="btn btn-small pull-right" href="#detail">More Details</a>
				<br class="clr"/>
				<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Category:</td><td class="techSpecTD2"><?php echo $prodetail->catName;?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2"><?php echo $prodetail->subCatName;?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"><?php echo $prodetail->date;?></td></tr>
				</tbody>
				</table>
				
				<h4>Product Features</h4>
				<p>
				<?php echo $prodetail->body;?><br/>
				</p>
              </div>
		  <?php }} ?>
		<div class="tab-pane fade" id="profile">
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr"/>
		<hr class="soft"/>
		<div class="tab-content">
			<div class="tab-pane" id="listView">
			 <?php
			 	if( count($relproduct) ){
			      foreach($relproduct as $relpro){
			 ?>
				<div class="row">	  
					<div class="span2">
						<a href=""><img src="<?php echo base_url($relpro->image); ?>" alt=""/></a>
					</div>
					<div class="span4">
						<h3>New | Available</h3>				
						<hr class="soft"/>
						<h5><?php echo $relpro->productName; ?></h5>
						<p>
						<?= word_limiter($relpro->body, 15); ?>
						</p>
						<a class="btn btn-small pull-right" href="">View Details</a>
						<br class="clr"/>
					</div>
					<div class="span3 alignR">
					<form class="form-horizontal qtyFrm" action="<?= base_url('productdetails/addSimilar');?>" method="post">
					<h3> $<?php echo $relpro->price; ?></h3>
					<label class="checkbox">
					    <input type="hidden" value="<?php echo $relpro->productId; ?>" name="productId" />
						
						<input type="number" class="span1" value="1" min="1" name="quantity" placeholder="Qty."/>
					</label><br/>
					<div class="btn-group">
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
					  <a href="<?php echo base_url($relpro->image); ?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soft"/>
			<?php }} ?>
					</div>
		<!--Block view -->
			<div class="tab-pane active" id="blockView">
				<ul class="thumbnails">
				<?php
			 	if( count($relproduct) ){
			      foreach($relproduct as $relpro1){
			 ?>
					<li class="span3">
					  <div class="thumbnail">
						<a href=""><img src="<?php echo base_url($relpro1->image); ?>" alt="<?php echo $relpro1->productName; ?>"/></a>
						<div class="caption">
						  <h5><?php echo $relpro1->productName; ?></h5>
						  <p> 
							<?= word_limiter($relpro1->body, 15); ?>
						  </p>
						  <form action="<?= base_url('productdetails/addSimilar');?>" method="post">
						  <h4 style="text-align:center">
						  <input type="hidden" value="<?php echo $relpro1->productId; ?>" name="productId" />
						  <input type="hidden" value="1" name="quantity" />
						  <a class="btn" href="<?php echo base_url($relpro1->image); ?>"> <i class="icon-zoom-in"></i></a> 
						  <button type="submit" class="btn">Add to <i class="icon-shopping-cart"></i></button> 
						  <a class="btn btn-primary" href="#">$<?php echo $relpro1->price; ?></a></h4>
						  </form>
						</div>
					  </div>
					</li>
				<?php }} ?>	
					
					
				  </ul>
			<hr class="soft"/>
			</div>
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>

	</div>
</div>
</div> </div>
</div>
