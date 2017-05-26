<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

  	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?= base_url('themes/bootshop/bootstrap.min.css'); ?>" media="screen"/>
    <link href="<?= base_url('themes/css/base.css'); ?>" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="<?= base_url('themes/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet"/>
	<link href="<?= base_url('themes/css/font-awesome.css'); ?>" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?= base_url('themes/js/google-code-prettify/prettify.css'); ?>" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?= base_url('themes/images/ico/favicon.ico'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('themes/images/ico/apple-touch-icon-144-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('themes/images/ico/apple-touch-icon-114-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('themes/images/ico/apple-touch-icon-72-precomposed.png'); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('themes/images/ico/apple-touch-icon-57-precomposed.png'); ?>">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> User</strong></div>
	<div class="span6">
	<div class="pull-right">
		
		
<?php
	  if($this->session->userdata('user_login') == true){
	?>
		<a href="<?= base_url('Profile/viewProfile');?>"><span class="btn btn-mini" style="font-size:18px; width:6%; color:#FFFFFF; background:#0099FF;"><i class="icon-user"></i></span></a>
		
		<span class="btn btn-mini"><a href="<?= base_url('Order');?>">Order</a></span>
		<?php } ?>
		<?php
				
				 if($getCart = $this->cart->contents()){ 
				   $sum =0;
				   foreach($getCart as $Cart){$sum++;}
			  ?>
		<a href="<?= base_url('productsummary'); ?>"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ <?php echo $sum; ?>] Itemes in your cart </span> </a>
		<?php }else{ ?>
	<a href="<?= base_url('productsummary'); ?>"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 0 ] Iteme in your cart </span> </a>
		<?php } ?> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="<?= base_url('main'); ?>"><img src="<?= base_url('themes/images/logo.png'); ?>" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="post" action="<?= base_url('Search/searchQuery'); ?>" >
		<input class="srchTxt" type="text" name="searchkey" placeholder="search" />
		  <select class="srchTxt" name="optionkey">
			<option value="">All</option>
			<?php	
              if( count($srchCat) ){
			  foreach($srchCat as $searchCat){
            ?>
			<option value="<?= $searchCat->catId; ?>"><?= $searchCat->catName; ?></option>
			<?php }} ?>
		</select> 
		  <button type="submit" id="submitButton" name="submit" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="<?= base_url('specialOffer'); ?>">Specials Offer</a></li>
	 <li class=""><a href="normal.php">Delivery</a></li>
	 <li class=""><a href="contact.php">Contact</a></li>
	 <li class="">
	<?php if( $this->session->userdata('user_login') == true){ ?>
	 <a href="<?= base_url('user/logout'); ?>" role="button" style="padding-right:0"><span class="btn btn-large btn-success">LogOut</span></a>
	<?php } else {?> 
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	 <?php } ?>
	<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm" action="<?= base_url('user/login');?>" method="post">
			  <div class="control-group">								
				<input type="text" id="inputEmail" name="email" placeholder="Email" value="<?php if(isset($_COOKIE["user"])){echo $_COOKIE["user"];} ?>">
			  </div>
			  <div class="control-group">
				<input type="password" id="inputPassword" name="password" placeholder="Password" value="<?php if(isset($_COOKIE["pass"])){echo $_COOKIE["pass"];} ?>">
			  </div>
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox" name="remember" value="1"> Remember me
				</label>
			  </div>		
			<button type="submit" class="btn btn-success">Sign in</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</form>
		  </div>
	</div>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->