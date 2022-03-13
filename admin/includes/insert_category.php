
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
        <div class="card">
  <div class="card-body">
                        <h3>Add Category</h3>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Add New Category: </label>
    <input type="text" class="form-control" name="product_cat" size = "60" required/>
  </div>

 
  
  <div class="form-group">
    <div class="col-12">
    <input type="submit" name="insert_cat" value="Add Category" class="btn btn-primary">
    </div>    
  </div>

</form>

</div>
</div>

</div>
</div>
</div>

<?php
if(isset($_POST['insert_cat'])){   
   
   $product_cat = mysqli_real_escape_string($con,$_POST['product_cat']);
   
   $insert_cat = mysqli_query($con,"insert into categories (cat_title) values ('$product_cat') ");
   
   if($insert_cat){
    echo "<script>alert('Product category has been inserted successfully!')</script>";
	
	echo "<script>window.open(window.location.href,'_self')</script>";
   }
   
   }
?>