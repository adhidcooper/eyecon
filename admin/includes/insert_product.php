

<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
        <div class="card">
  <div class="card-body">
                        <h3>Insert New Post Here</h3>
                        <p>Fill in the data below.</p>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Product Title</label>
    <input type="text" class="form-control" name="product_title" size = "60" required/>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Product Category:</label>
    <select name="product_cat" class="form-control" aria-label="Default select example">
        <option selected value="" disabled="disabled">Select a Category</option>
            <?php

                $get_cats ="select * from categories";
            
            
                $run_cats = mysqli_query($con , $get_cats);
            
                while ($row_cats=mysqli_fetch_array($run_cats)) {
                    $cat_id = $row_cats['cat_id'];
            
                    $cat_title = $row_cats['cat_title'];
            
                    echo "<option value='$cat_id'> $cat_title </option>";
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

                while ($row_brands = mysqli_fetch_array($run_brands)) {
                    $brand_id = $row_brands['brand_id'];

                    $brand_title = $row_brands['brand_title'];

                echo "<option value='$brand_id'> $brand_title </option>";
                }
                
            ?>
    </select>
  </div>

  <div class="form-group">
    <label for="formFileLg" class="form-label" >Product Image:</label>
    <input name="product_image" class="form-control form-control-lg" id="formFileLg"  type="file" /> 

  </div>

  

  <div class="form-group">
    <label for="exampleFormControlInput3">Product Price:</label>
    <input type="text" class="form-control" name ="product_price" required />
  </div>


  <div class="form-group">
    <label for="exampleFormControlTextarea1">Product Description:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="product_desc"></textarea>             
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea2">Product Keywords:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="product_keywords"></textarea>             
  </div>

  
  <div class="form-group">
    <div class="col-12">
    <input type="submit" name="insert_post" value="Insert Post Now" class="btn btn-primary">
    </div>    
  </div>

</form>

</div>
</div>

</div>
</div>
</div>


<?php 

if(isset($_POST['insert_post'])){
   $product_title = $_POST['product_title'];
   $product_cat = $_POST['product_cat'];
   $product_brand = $_POST['product_brand'];
   $product_price = $_POST['product_price'];
   $product_desc = trim(mysqli_real_escape_string($con,$_POST['product_desc']));
   $product_keywords = $_POST['product_keywords']; 
   
   
   // Getting the image from the field
   $product_image  = $_FILES['product_image']['name'];
   $product_image_tmp = $_FILES['product_image']['tmp_name'];
   
   move_uploaded_file($product_image_tmp,"product_images/$product_image");
   
   $insert_product = " insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) 
   values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords') ";

   $insert_pro = mysqli_query($con, $insert_product);
   
   if($insert_pro){
    echo "<script>alert('Product Has Been inserted successfully!')</script>";
	
	//echo "<script>window.open('index.php?insert_product','_self')</script>";
   }
   
   }
?>
