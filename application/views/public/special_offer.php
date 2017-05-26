
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Special offers</li>
    </ul>
	<h4> 20% Discount Special offer<small class="pull-right"> 40 products are available </small></h4>	
	<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Sort By </label>
			<select>
              <option>Priduct name A - Z</option>
              <option>Priduct name Z - A</option>
              <option>Priduct Stoke</option>
              <option>Price Lowest first</option>
            </select>
		</div>
	  </form>
	<div id="myTab" class="pull-right">
	 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
	 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
	</div>
<br class="clr"/>
<div class="tab-content">
	<div class="tab-pane" id="listView">
	<?php
			 	if( count($spclPro) ){
			      foreach($spclPro as $spclResult){
				 
	?> 
		<div class="row">	  
			<div class="span2">
			<a href="<?= base_url('ProductDetails/view').'/'.$spclResult->productId; ?>">
			<img src="<?= base_url($spclResult->image); ?>" alt=""/>
			</a>
			</div>
			<div class="span4">
				<h3>New | Available</h3>				
				<hr class="soft"/>
				<h5><?= $spclResult->productName; ?></h5>
				<p>
				<?= word_limiter($spclResult->body, 7); ?>
				</p>
				<a class="btn btn-small pull-right" href="<?= base_url('ProductDetails/view').'/'.$spclResult->productId; ?>">View Details</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm" action="<?= base_url('specialoffer/add');?>" method="post">
			<h3> $<?= $spclResult->price; ?></h3>
			<input type="hidden" value="<?= $spclResult->productId; ?>" name="productId" />
			<input type="number" class="span1" value="1" min="1" name="quantity" placeholder="Qty."/><br/><br/>
			  <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
			  <a href="<?= base_url($spclResult->image); ?>" class="btn btn-large"><i class="icon-zoom-in"></i></a>
				</form>
			</div>
	</div>
	<hr class="soft"/>
	<?php }} ?>
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
		<?php
			 	if( count($spclPro) ){
			      foreach($spclPro as $spclResult){
				 
	     ?>
			<li class="span3">
			  <div class="thumbnail">
				<a href="<?= base_url('ProductDetails/view').'/'.$spclResult->productId; ?>"><img src="<?= base_url($spclResult->image); ?>" alt=""/></a>
				<div class="caption">
				  <h5><?= $spclResult->productName; ?></h5>
				  <p> 
					<?= word_limiter($spclResult->body, 7); ?>
				  </p>
				  <form action="<?= base_url('specialoffer/add');?>" method="post">
					  <h4 style="text-align:center">
					  <input type="hidden" value="<?= $spclResult->productId; ?>" name="productId" />
					  <input type="hidden" value="1" name="quantity" />
					  <a class="btn" href="<?= base_url($spclResult->image); ?>"> <i class="icon-zoom-in"></i></a> 
					  <button type="submit" class="btn">Add to <i class="icon-shopping-cart"></i></button> 
					  <a class="btn btn-primary" href="#">$<?= $spclResult->price; ?></a></h4>
				  </form>
				</div>
			  </div>
			</li>
			<?php }} ?>
		  </ul>


	<hr class="soft"/>
	</div>
</div>
<a href="compair.html" class="btn btn-large pull-right">Compair Product</a>
	<div class="pagination" align="center">
		<?= $this->pagination->create_links(); ?>
	    </div>
<br class="clr"/>
</div>
</div></div>
</div>
<!-- MainBody End ============================= -->

