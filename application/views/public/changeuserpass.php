
<style>
table tr:nth(2n+1){ background:#9999FF;}
</style>
<div style="width:60%; margin:0 auto;">		
<?php if(!empty(validation_errors()) or !empty($this->session->flashdata('feedback')) ){ ?>
	      <div class="alert alert-block alert-error fade in">
		     <button type="button" class="close" data-dismiss="alert">&times;</button>
		   <?php echo validation_errors(); echo $this->session->flashdata('feedback'); ?>
	      </div>	
<?php } ?>
 <form action="<?= base_url('Profile/password');?>" method="post">
	<table class="table">
	  <tr>
		  <td colspan="5">
		  <h2>Change Password </h2>
		  
		  </td>
	  </tr>
	  
	  <tr>
		  <td>Old Password : </td>
		  <td><input type="password" name="password" placeholder=" old password"></td>
	  </tr>
	  
	  <tr>
		  <td>New Password : </td>
		  <td><input type="password" name="newpassword" placeholder=" new password"></td>
	  </tr>
	  
	  <tr>
		  <td>Re-Type Password : </td>
		  <td><input type="password" name="new1password" placeholder=" re-type password"></td>
	  </tr>
	  
	  <tr>
	      <td></td>
	      <td><button type="submit" name="submit" value="1" style="background:#CCCCCC; border-radius:5px; border:none; padding:7px 5px;">Change Password</button></td>
	  </tr>	
</table>
</form>		 
</div>