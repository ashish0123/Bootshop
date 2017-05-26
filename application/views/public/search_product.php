<h3> &nbsp; &nbsp; Searched Products </h3>
			  <ul class="thumbnails">
			 <?php
			 	if( count($srchPro) ){
			      foreach($srchPro as $searchResult){
			 ?> 
			 <form action="<?= base_url('productsummary/add');?>" method="post">
				<li class="span3">
				  <div class="thumbnail">
					<a  href="<?= base_url('ProductDetails/view').'/'.$searchResult->productId; ?>"><img src="<?= base_url($searchResult->image); ?>" alt=""/></a>
					<div class="caption">
					  <h5><?= $searchResult->productName; ?></h5>
					  <p> 
						<?= word_limiter($searchResult->body, 7); ?> 
					  </p>
					 
					  <h4 style="text-align:center">
					  <a class="btn" href="<?= $searchResult->image; ?>"> <i class="icon-zoom-in"></i></a >
					  <input type="hidden" name="productId" value="<?= $searchResult->productId; ?>" />
					 <button name="addtocart" style="border:0; padding:0;" ><a class="btn">Add to <i class="icon-shopping-cart"></i></a></button>
					  
					  <a class="btn btn-primary" href="#">$<?= $searchResult->price; ?></a></h4>
					</div>
				  </div>
				</li>
				 </form>
				<?php } ?>
			  </ul>	
		
			
		<?php } else { ?>
     			<center><h3 style="color:#3333FF">Oops, No Product Available !!</h3></center>
	 <?php }?>
	 <div class="pagination" align="center">
		<?= $this->pagination->create_links(); ?>
	    </div>

</div>
	</div>
</div>
</div>

