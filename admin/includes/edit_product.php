<?php 
$edit_product = mysqli_query($con,"select * from products where product_id='$_GET[product_id]' ");

$fetch_edit = mysqli_fetch_array($edit_product);
?>




<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
        <div class="card">
  <div class="card-body">
                        <h3>Edit Product</h3>
                        <p>Fill in the data below.</p>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Product Title</label>
    <input type="text" class="form-control" name="product_title" value="<?php echo $fetch_edit['product_title'];  ?>" size = "60" required/>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Product Category:</label>
    <select name="product_cat" class="form-control" aria-label="Default select example">
        <option selected value="" disabled="disabled">Select a Category</option>
        <?php 
			  $get_cats ="select * from categories";
		
		$run_cats = mysqli_query($con, $get_cats);
		
		while($row_cats=mysqli_fetch_array($run_cats)){
		    $cat_id = $row_cats['cat_id'];
			
			$cat_title = $row_cats['cat_title'];
			
			if($fetch_edit['product_cat'] == $cat_id){
			echo "<option value='$fetch_edit[product_cat]' selected>$cat_title</option>";
			
			}else{
			echo "<option value='$cat_id'>$cat_title</option>";
			
			}
		}
			  ?>
    </select>
  </div>


  <div class="form-group">
    <label for="exampleFormControlSelect2">Product Brand:</label>
    <select name="product_brand" class="form-control" aria-label="Default select example">
        <option selected value="" disabled="disabled">Select a Brand</option>
        <?php
			  $get_brands = "select * from brands";
		
		$run_brands = mysqli_query($con, $get_brands);
		
		while($row_brands = mysqli_fetch_array($run_brands)){
		     $brand_id = $row_brands['brand_id'];
			 
			 $brand_title = $row_brands['brand_title'];
			 
			 if($fetch_edit['product_brand'] == $brand_id){
			 echo "<option value='$fetch_edit[product_brand]' selected>$brand_title</option>";
			 
			 }else{			 
			 echo "<option value='$brand_id'>$brand_title</option>";
			 
			 }
		}
		
		?>
    </select>
  </div>

  <div class="form-group">
    <label for="formFileLg" class="form-label" >Product Image:</label>
    <div class="edit_image">
		   <img src="product_images/<?php echo $fetch_edit['product_image']; ?>" width="100" height="70" />
	</div>

  </div>

  

  <div class="form-group">
    <label for="exampleFormControlInput3">Product Price:</label>
    <input type="text" class="form-control" name ="product_price"  value="<?php echo $fetch_edit['product_price']; ?>" required />
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Product Description:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="product_desc"><?php echo $fetch_edit['product_desc'];?></textarea>             
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea2">Product Keywords:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="product_keywords" ><?php echo $fetch_edit['product_keywords'];?></textarea>             
  </div>

  
  <div class="form-group">
    <div class="col-12">
    <input type="submit" name="edit_product"  value="Save" class="btn btn-primary">
    </div>    
  </div>

</form>

</div>
</div>

</div>
</div>
</div>

<?php 

if(isset($_POST['edit_product'])){
   $product_title = trim(mysqli_real_escape_string($con,$_POST['product_title']));
   $product_cat = $_POST['product_cat'];
   $product_brand = $_POST['product_brand'];
   $product_price = $_POST['product_price'];
   $product_desc = trim(mysqli_real_escape_string($con,$_POST['product_desc']));
   $product_keywords = $_POST['product_keywords']; 
   $date = date("F d, Y");
   
   // Getting the image from the field
   $product_image  = $_FILES['product_image']['name'];
   $product_image_tmp = $_FILES['product_image']['tmp_name'];
   
   if(!empty($_FILES['product_image']['name'])){
   
   if(move_uploaded_file($product_image_tmp,"product_images/$product_image")){
   
   $update_product = mysqli_query($con,"update products set product_cat='$product_cat', product_brand='$product_brand', product_title='$product_title', product_price='$product_price', product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords',date='$date' where product_id='$_GET[product_id]' ");
   
   }
   
   }else{
   $update_product = mysqli_query($con,"update products set product_cat='$product_cat', product_brand='$product_brand', product_title='$product_title', product_price='$product_price', product_desc='$product_desc',product_keywords='$product_keywords',date='$date' where product_id='$_GET[product_id]' ");
   
   }
   
   if($update_product){
   
   echo "<script>alert('Product was updated successfully!')</script>";
   
   echo "<script>window.open(window.location.href,'_self')</script>";
   }
   
   }
?>






