<?php include_once 'inc/header.php' ?>
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<?php include_once 'inc/sidemenu.php' ?>
  <section class="menuhead">
	
	    <h3 class="dash">Update Product</h3>
		<?php echo validation_errors('<div class="error">', '</div>');?>
		<?php if(isset($image_error)) echo $image_error; ?>
	     <form action="<?= base_url('Product/updateProduct');?>" method="post" class="myform1" enctype="multipart/form-data">
		 <?php if( count($proById) ){
			      foreach($proById as $proResult){
			?>
<table class="tblone" style="width:700px; margin:5px 0">
  <tr>
    <td>Name</td>
	<input type="hidden" name="productId" value="<?=  $proResult->productId; ?>" />
    <td><input type="text" name="productName" value="<?=  $proResult->productName; ?>"  /></td>
  </tr>
  
  <tr>
    <td>Category</td>
    <td><select name="catId" class="opt">
	    <option value="" selected> select...</option> 
		<?php if( count($catData) ){
			      foreach($catData as $catResult){
			?>
		<option 
		  <?php if($catResult->catId == $proResult->catId){?>
		  selected="selected"
		  <?php } ?>
		value="<?= $catResult->catId; ?>"><?= $catResult->catName; ?></option>
		<?php }} ?>	
     </select></td>
  </tr>
  
  <tr>
    <td>Sub Category</td>
    <td>
	  <select name="subCatId" class="opt">
	     <option value="" selected> select...</option>
		<?php if( count($subCatData) ){
			      foreach($subCatData as $subCatResult){
			?>
	      <option 
		  <?php if($subCatResult->subCatId == $proResult->subCatId){?>
		  selected="selected"
		  <?php } ?>
		  value="<?= $subCatResult->subCatId; ?>" ><?= $subCatResult->subCatName; ?></option>
		<?php }} ?>	
     </select></td>
  </tr>

  <tr>
    <td>Description</td>
    <td>
	  <textarea  name="body"><?=  $proResult->body; ?></textarea>
      <script>CKEDITOR.replace( 'body' );</script>
	</td>
  </tr>
  
  <tr>
    <td>Price</td>
    <td><input type="text" name="price" value="<?=  $proResult->price; ?>"  /></td>
  </tr>

  <tr>
    <td>Image</td>
    <td>
	   <img src="<?php $img = $proResult->image;  echo base_url().$img;?>" width="100px" height="100px" /><br /><br />
       <input type="file" name="image" /><br />
    </td>
  </tr>
  
  <tr>
    <td>Product Type</td>
    <td><select name="type" class="opt">
	   <option value="">select type</option>
	    
	      <?php if($proResult->type == '0') { ?>
	   <option selected="selected" value="0">Featured</option>
	   <option value="1">General</option>
	   <option value="2">Offer</option>
	      <?php } ?>
		  <?php if($proResult->type == '1') { ?>
	   <option selected="selected" value="1">General</option>
	   <option value="0">Featured</option>
	   <option value="2">Offer</option>
	      <?php } ?>
		  <?php if($proResult->type == '2') { ?>
	   <option selected="selected" value="2">Offer</option>
	   <option value="0">Featured</option>
	   <option value="1">General</option>
	      <?php } ?>
	   
     </select></td>
  </tr>
  
  <tr>
    <td></td>
    <td><input type="submit" name="submit" class="upd" value="Update Product" /></td>
  </tr>

</table>
<?php }} ?>
</form>

  </section>
 
 
 
 <?php include 'inc/footer.php'?>