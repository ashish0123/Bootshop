<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/sidemenu.php' ?>

  <section class="menuhead">
	
	    <h3 class="dash">View Product</h3>
		<div class="success"><?php echo $this->session->flashdata('feedback'); ?></div>
		 <li class="lihead"><u>Product List</u></li>
		 
		 <li class="litext" style="float:left">
		    <p style="font-size:15px; font-weight:bold; color:#000066">Show :
			<select Name="sort">
			<option value="-1" selected>select..</option>
			<option value="ten">10</option>
			<option value="twenty">20</option>
			<option value="thirty">30</option>
			<option value="fourty">40</option>
			</select> Entries</p>
		 </li>
		 
		 <li class="litext" style="float:right"> 
			   <p style="font-size:17px; font-weight:bold; padding-right:15px; height:22px; color:#000066">Search &nbsp;: &nbsp; 
			   <input type="text" name="fb" size="18" placeholder=" search category here..." class="sicial"/></p>
		 </li>
		 
		 
	     <form class="myform">
		   <table class="tbl">
                <tr>
                   <th width="3%">SN</th>
                   <th width="10%">Product Name</th>
				   <th width="10%">Cat Name</th>
				   <th width="10%">Sub Cat Name</th>
				   <th width="20%">Description</th>
				   <th width="10%">Price</th>
				   <th width="12%">Image</th>
				   <th width="10%">Type</th>
                   <th width="15%">Action</th>
                </tr>
			<?php if( count($data) ){
			      $i = $this->uri->segment(3, 0);
			      foreach($data as $result){
			?>
				<tr>
                   <td><?php echo ++$i;?></td>
				   <td><?= $result->productName; ?></td>
				   <td><?= $result->catName; ?></td>
				   <td><?= $result->subCatName; ?></td>
				   <td><?php $body = $result->body; echo word_limiter($body, 8); ?></td>
				   <td>$<?= $result->price; ?></td>
                   <td><img src="<?php $img = $result->image;  echo base_url().$img;?>" width="80%" height="50%" /></td>
				   <td><?= $result->type; ?></td>
                   <td>
				   <a href="<?= base_url('Product/editProduct/'.$result->productId);?>">Edit</a> ||
				   <a onclick="return confirm('Are you sure want to delete this?')" href="<?= base_url('Product/deleteProduct/'.$result->productId);?>">Delete</a>
				   </td>
				</tr>
			<?php }}else{ ?>
			       <td colspan="9"><h1>No Record Found !!</h1></td>
			<?php } ?>
				
			</table>
		 </form>
		
 <nav class='text-center'>
     <?= $this->pagination->create_links(); ?>
</nav>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>