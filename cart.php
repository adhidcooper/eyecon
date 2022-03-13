<?php

    include('includes/header.php');

?>

<div class="row">
<!-- Side Bar -->
<div class="col-3">

<div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark">
 <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <svg class="bi me-2" width="40" height="32"></svg>
    <div class="fs-4" id="sidebar_title">CATEGORIES</div>
 </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto" id="cats">
        <?php 
           getCats();
        ?>
    </ul>

    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <svg class="bi me-2" width="40" height="32"></svg>
    <div class="fs-4" id="sidebar_title">BRANDS</div> </a>
    <hr>
     
    <ul class="nav nav-pills flex-column mb-auto" id="cats">
        <?php
            getBrands();
        ?>
    </ul>
</div>
</div>
<!--- !Side Bar ---->
  

<!-- Main content -->
<div class="col-9" >
<div id="content_area" >
    
    <div class="shopping_cart_container >
	  
	  
	  <div id="shopping_cart" align="right" style="padding:15px">
        <?php
            if (isset($_SESSION['customer_email'])) {
                echo "<b> Your Email : <b>"; $_SESSION['customer_email'];

            }else {
                echo "";

            }
            ?>
         <h4 class="cart-heading"><b style="color:navy">Your Cart - </b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?></h4>
         </div>

         <form action="" method="post" enctype="multipart/form-data" style="overflow-y: scroll; height: 450px">
	   <table class="table" align="center" width="100%" >
	   
	     <tr align="center">
		   <th>Remove</th>
		   <th>Product</th>
		   <th>Quality</th>
		   <th>Price</th>
		 </tr>
		 
	<?php 
		 $total = 0;
   
   $ip = get_ip();
   
   $run_cart = mysqli_query($con, "select * from cart where ip_address='$ip' ");
   
   while($fetch_cart = mysqli_fetch_array($run_cart)){
       
	   $product_id = $fetch_cart['product_id'];
	   
	   $result_product = mysqli_query($con, "select * from products where product_id = '$product_id'");
	   
       while($fetch_product = mysqli_fetch_array($result_product)){
                
		$product_price = array($fetch_product['product_price']);

        $product_title = $fetch_product['product_title'];

        $product_image = $fetch_product['product_image'];
        
        $sing_price = $fetch_product['product_price'];
        
		$values = array_sum($product_price);
		
		// Getting Quality of the product
		
		$run_qty = mysqli_query($con, "select * from cart where product_id = '$product_id'");
		
		$row_qty = mysqli_fetch_array($run_qty);
		
		$qty = $row_qty['quality'];
		
		$values_qty = $values * $qty;
		
		$total += $values_qty;
				
   
   ?>
		 <tr align="center">
		   <td><input type="checkbox" name="remove[]" value="<?php echo $product_id;?>" /></td>
		   <td>
		   <?php echo $product_title;?>
		   <br />
		   <img style= "width: 5rem;"src="admin/product_images/<?php echo $product_image; ?> " />
		   </td>
		   <td><input type="text" size="4" name="qty" value="<?php echo $qty; ?>" /></td>
		   <td><?php echo "$" . $sing_price; ?></td>
		 </tr>
	   
	<?php } } // End While  ?> 
         
		<tr>
		   <td colspan="4" align="right"><b>Sub Total:</b></td>
		   <td><?php echo  total_price(); ?> </td>
		</tr>
	
	    <tr align="center">
		   <td colspan="2"><input class ="btn btn-warning"type="submit" name="update_cart" value="Update Cart" /></td>
		   <td><input class="btn btn-primary" type="submit" name="continue" value="Continue Shopping" /></td>
		   <td><button class="btn btn-success"><a  class="text-white"href="checkout.php">Checkout</a></td>
		</tr>
	   </table>
	   </form>
	   
	   <?php 
	   if(isset($_POST['remove'])){
	     
		 foreach($_POST['remove'] as $remove_id){
		   
		  $run_delete = mysqli_query($con,"delete from cart where product_id = '$remove_id' AND ip_address='$ip' ");
		 
		 if($run_delete){
		    echo "<script>window.open('cart.php','_self')</script>";
		 }
		 }
		 
	   }
	   
	   if(isset($_POST['continue'])){
	     echo "<script>window.open('index.php','_self')</script>";
	   }
	   
	   ?>
	   
	   </div><!-- /.shopping_cart_container-->



    </div>
 
</div>
</div>

<!-- Main content -->
</div>



<!-- Footer -->
<?php
    //include footer.php file
    include('includes/footer.php');
?>

<!-- Footer -->