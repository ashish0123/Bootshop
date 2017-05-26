<h4>Latest Products </h4>
			  <ul class="thumbnails">
			 <?php
			 	if( count($lePro) ){
			      foreach($lePro as $leResult){
			 ?> 
			 <form action="<?= base_url('productsummary/add');?>" method="post">
				<li class="span3">
				  <div class="thumbnail">
					<a  href="<?= base_url('ProductDetails/view').'/'.$leResult->productId; ?>"><img src="<?= base_url($leResult->image); ?>" alt=""/></a>
					<div class="caption">
					  <h5><?= $leResult->productName; ?></h5>
					  <p> 
						<?= word_limiter($leResult->body, 7); ?> 
					  </p>
					 
					  <h4 style="text-align:center">
					  <a class="btn" href="<?= $leResult->image; ?>"> <i class="icon-zoom-in"></i></a >
					  <input type="hidden" name="productId" value="<?= $leResult->productId; ?>" />
					 <button name="addtocart" style="border:0; padding:0;" ><a class="btn">Add to <i class="icon-shopping-cart"></i></a></button>
					  
					  <a class="btn btn-primary" href="#">$<?= $leResult->price; ?></a></h4>
					</div>
				  </div>
				</li>
				 </form>
				<?php }} ?>
			  </ul>	
		
			
		
		<div class="pagination" align="center">
		<?= $this->pagination->create_links(); ?>
	    </div>

     

</div>
	</div>
</div>
</div>

