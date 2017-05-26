<?php include_once 'inc/header.php' ?>
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<?php include_once 'inc/sidemenu.php' ?>

  <section class="menuhead">
	
	    <h3 class="dash">Add Product</h3>
		<?php echo validation_errors('<div class="error">', '</div>');?>
		<?php if(isset($image_error)) echo $image_error; ?>
		
		 <form action="<?= base_url('Product/insertProduct');?>" method="post" enctype="multipart/form-data" class="myform1" >
<table class="tblone" style="width:700px; margin:5px 0">
  <tr>
    <td>Product Name</td>
    <td><?= form_input([ 'name'=>'productName', 'placeholder'=>'Product Name', 'value'=>set_value('productName') ]); ?></td>
  </tr>
  
  <tr>
    <td>Category</td>
    <td><select name="catId" class="opt">
	    <option value="" selected> select...</option> 
		<?php if( count($catData) ){
			      foreach($catData as $catResult){
			?>
		<option value="<?= $catResult->catId; ?>"><?= $catResult->catName; ?></option>
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
	      <option value="<?= $subCatResult->subCatId; ?>" ><?= $subCatResult->subCatName; ?></option>
		<?php }} ?>	
     </select></td>
  </tr>
  
  <tr>
    <td>Description</td>
    <td>
	  <textarea name="body"><?php echo set_value('body'); ?></textarea>
      <script>CKEDITOR.replace( 'body' );</script>
	</td>
  </tr>
  
  <tr>
    <td>Price</td>
    <td><input type="text" name="price"  /></td>
  </tr>

  <tr>
    <td>Image</td>
    <td>
	  <input type="file" name="image"/>
    </td>
  </tr>
  
  <tr>
    <td>Product Type</td>
    <td><select name="type" class="opt">
	   <option value="" selected> select Type</option>
	   <option value="0">Featured</option>
	   <option value="1">General</option>
	   <option value="2">Offer</option>
     </select></td>
  </tr>
  
  <tr>
    <td></td>
    <td><input type="submit" name="submit" class="upd" value="Add Product" /></td>
  </tr>

</table>
</form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>