<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small"><a id="myCart" href="product_summary.php"><img src="<?= base_url('themes/images/ico-cart.png'); ?>" alt="cart">3 Items in your cart  <span class="badge badge-warning pull-right">$155.00</span></a></div>
		<ul id="sideManu" class="nav nav-tabs nav-stacked">
		<?php 
			if( count($catData) ){
			      foreach($catData as $catResult){
		?>
			<li class="subMenu open"><a href="<?= $catResult->catId; ?>"> <?= $catResult->catName; ?></a>
				<ul>
				<?php
					$catId =  $catResult->catId;
					if( count($subCatData) ){
			            foreach($subCatData as $subCatResult){
						if($catId == $subCatResult->catNameId){
				 ?>
				<li><a class="active" href="<?= $subCatResult->subCatId; ?>"><i class="icon-chevron-right"></i> <?= $subCatResult->subCatName; ?> </a></li>
		        <?php }}} ?>
				</ul>
			</li>
			<?php }} ?>
		</ul>
		<br/>
		  <br/>
		  <br/>
			<div class="thumbnail">
				<img src="<?= base_url('themes/images/payment_methods.png'); ?>" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->