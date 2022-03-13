
<?php 
$edit_brand = mysqli_query($con,"select * from brands where brand_id='$_GET[brand_id]'");

$fetch_brand = mysqli_fetch_array($edit_brand);

?>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
        <div class="card">
  <div class="card-body">
                        <h3>Edit Brand</h3>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">Edit Brand: </label>
    <input type="text" class="form-control" name="product_brand"  value="<?php echo $fetch_brand['brand_title']; ?>" size = "60" required/>
  </div>

 
  
  <div class="form-group">
    <div class="col-12">
    <input type="submit" name="edit_brand" value="Save" class="btn btn-primary">
    </div>    
  </div>

</form>

</div>
</div>

</div>
</div>
</div>



<?php 

if(isset($_POST['edit_brand'])){   
   
   $brand_title = mysqli_real_escape_string($con,$_POST['product_brand']);
   
   $edit_brand = mysqli_query($con,"update brands set brand_title='$brand_title' where brand_id='$_GET[brand_id]'");
   
   if($edit_brand){
    echo "<script>alert('Product brand was updated successfully!')</script>";
	
	echo "<script>window.open(window.location.href,'_self')</script>";
   }
   
   }
?>


