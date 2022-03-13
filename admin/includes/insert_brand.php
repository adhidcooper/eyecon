
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
        <div class="card">
  <div class="card-body">
                        <h3>Add Brand</h3>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Add New Brand: </label>
    <input type="text" class="form-control" name="product_brand" size = "60" required/>
  </div>

 
  
  <div class="form-group">
    <div class="col-12">
    <input type="submit" name="insert_brand" value="Add Brand" class="btn btn-primary">
    </div>    
  </div>

</form>

</div>
</div>

</div>
</div>
</div>

<?php 

if(isset($_POST['insert_brand'])){   
   
   $product_brand = mysqli_real_escape_string($con,$_POST['product_brand']);
   
   $insert_brand = mysqli_query($con,"insert into brands (brand_title) values ('$product_brand') ");
   
   if($insert_brand){
    echo "<script>alert('Product brand has been inserted successfully!')</script>";
	
	echo "<script>window.open(window.location.href,'_self')</script>";
   }
   
   }
?>