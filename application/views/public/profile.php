
<style>
table tr:nth(2n+1){ background:#9999FF;}
</style>
<div style="width:60%; margin:0 auto;">		
<?php	
              if( count($custData) ){
			  foreach($custData as $customerData){
?>
	<table class="table">
	  <tr>
		  <td colspan="5">
		  <h2>Your Profile </h2>
		  
		  <span style=" background:#CCCCCC; padding:4px 6px; border-radius:5px 2px; ">
		  <a style="text-decoration:none;" href="<?= base_url('Profile');?>">Edit profile</a>
		  </span>
		  
		  <span style=" background:#CCCCCC; padding:4px 6px; border-radius:5px 2px; margin-left:10px; ">
		  <a style="text-decoration:none;" href="<?= base_url('Profile/changepass');?>">Change Password</a>
		  </span>
		  
		     
		  </td>
	  </tr>
	  <?php if( !empty($this->session->flashdata('feedback')) ){ ?>
	      <div class="alert alert-block alert-error fade in">
		     <button type="button" class="close" data-dismiss="alert">&times;</button>
		   <?php echo $this->session->flashdata('feedback'); ?>
	      </div>	
<?php } ?>
	  <tr>
		  <td>Name Title : </td>
		  <td><?php echo $customerData->title; ?></td>
	  </tr>
	  
	  <tr>
		  <td>First Name : </td>
		  <td><?php echo $customerData->fname; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Last Name : </td>
		  <td><?php echo $customerData->lname; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Email : </td>
		  <td><?php echo $customerData->email; ?></td>
	  </tr>

	  <tr>
		  <td>Date Of Birth : </td>
		  <td><?php echo $customerData->dob; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Address 1 : </td>
		  <td><?php echo $customerData->address1; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Address 2 : </td>
		  <td><?php echo $customerData->address2; ?></td>
	  </tr>
	  
	  <tr>
		  <td>City : </td>
		  <td><?php echo $customerData->city; ?></td>
	  </tr>
	  
	  <tr>
		  <td>State : </td>
		  <td><?php echo $customerData->state; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Pin/Postal code : </td>
		  <td><?php echo $customerData->pin; ?></td>
	  </tr>
	 
	  <tr>
		  <td>Country : </td>
		  <td><?php echo $customerData->country; ?></td>
	  </tr>
	  
	  <tr>
		  <td>Phone : </td>
		  <td><?php echo $customerData->phone; ?></td>
	  </tr>
</table>	
<?php }} ?>  	 
</div>