<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Admin Login</title>

	<!-- Google Fonts -->
	<link href='#' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?= base_url('themes/admin/css/animate1.css'); ?>">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="<?= base_url('themes/admin/css/style1.css'); ?>">

	<script src="<?= base_url('themes/admin/js/jquery.min.js'); ?>"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">E-<span>mall</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
		   <?= form_open('Admin/login'); ?>
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<label for="username">Username</label>
			<br/>
			<?= form_input([ 'name'=>'adminUser', 'placeholder'=>'UserName', 'value'=>set_value('adminUser') ]); ?>
			<br/>
			<label for="password">Password</label>
			<br/>
			<?= form_input([ 'name'=>'adminPass', 'placeholder'=>'Password', 'type'=>'password', 'value'=>set_value('adminPass') ]); ?>
			<br/>
			<button type="submit">Sign In</button>
			<br/>
			<a href="#"><p class="small">Forgot your password?</p></a>
			</form>
			<span style="color:#FF0000; font-size:16px;"><?php echo validation_errors(); echo $this->session->flashdata('login_failed'); ?></span>
		</div>
	</div>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>