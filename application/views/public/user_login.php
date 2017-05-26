
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<hr class="soft"/>
	
	<table class="table table-bordered">
		<tr><th> I AM ALREADY REGISTERED  </th>
		
		<!--  <h5 style="color:#00CC66;"> You registered successfully, Now Log In here.</h5>-->
		
	<?php if(!empty(validation_errors()) or !empty($this->session->flashdata('login_failed')) or !empty($this->session->flashdata('feedback')) ){ ?>
	      <div class="alert alert-block alert-error fade in">
		     <button type="button" class="close" data-dismiss="alert">&times;</button>
		   <?php echo validation_errors(); echo $this->session->flashdata('login_failed'); echo $this->session->flashdata('feedback'); ?>
	      </div>	
     <?php } ?>
		
		</tr>
		
		 <tr> 
		 <td>
			<form class="form-horizontal" action="<?= base_url('user/login');?>" method="post">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Username</label>
				  <div class="controls">
					<input type="text" name="email" id="inputUsername" placeholder="Email" value="<?php if(isset($_COOKIE["user"])){echo $_COOKIE["user"];} ?>">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input type="password" name="password" id="inputPassword1" placeholder="Password" value="<?php if(isset($_COOKIE["pass"])){echo $_COOKIE["pass"];} ?>">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" name="login" class="btn">Sign in</button> OR 
					<a href="<?= base_url('user/register');?>" style="background:#0066FF; color:#FFFFFF;" class="btn">Register Now!</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
					  <a href="forgetpass.php" style="text-decoration:underline">Forgot password ?</a>
					</div>
				</div>
			</form>
		  </td>
		  </tr>
	</table>
	
</div>
</div></div>
</div>
