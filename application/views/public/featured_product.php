<div class="span9">		
			<div class="well well-small">
			<h4>Featured Products <small class="pull-right">200+ featured products</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			
			
			  <div class="item active">
			  <ul class="thumbnails">
			  <?php
			 	if( count($fePro) ){
			      foreach($fePro as $feResult){
				 
			 ?> 
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="<?= $feResult->productId; ?>"><img src="<?= base_url($feResult->image); ?>" alt=""></a>
					<div class="caption">
					  <h5><?= $feResult->productName; ?></h5>
					  <h4><a class="btn" href="<?= $feResult->productId; ?>">VIEW</a> <span class="pull-right">$<?= $feResult->price; ?></span></h4>
					</div>
				  </div>
				</li>
				<?php }} ?>
				
			  </ul>
			  </div>
			  
			  
			  
			   
			  
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>