<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/sidemenu.php' ?>

  <section class="menuhead">
	
	    <h3 class="dash">Add Category</h3>
	     <form action="addcat.php" method="post">
		 
		   <table>
		     <tr>
			   <li class="lihead"><u>Category</u></li>
			   
			   <li class="litext"> 
			   <p style="font-size:18px; font-weight:bold; color:#000066">Add New Category &nbsp; :
			   <input type="text" name="catName" size="30" placeholder=" enter new category here" class="sicial"/></p>
			   </li>				 
			  
			   
			  </tr>
			    <li class="litext"><input type="submit" class="upd" name="submit" value="Update"/></li> 
			 
			 
		   </table>
		 </form>
  </section>
 
 
 
 <?php include 'inc/footer.php'?>