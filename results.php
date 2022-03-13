<?php
    //include header.php
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

<div style="margin-top:150px;"></div>

<div id="products_box" >
 <div class="owl-carousel owl-theme ">
        <?php 
        
            if(isset($_GET['search'])){

                $search_query = $_GET['user_query'];

                $run_query_by_pro_id = mysqli_query($con, "select * from products where product_keywords like '%$search_query%' ");
            
                while($row_pro = mysqli_fetch_array($run_query_by_pro_id)) {
                
                  $pro_id = $row_pro['product_id'];
                  $pro_cat = $row_pro['product_cat'];
                  $pro_brand = $row_pro['product_brand'];
                  $pro_title = $row_pro['product_title'];
                  $pro_price = $row_pro['product_price'];
                  $pro_image = $row_pro['product_image'];	
                  $pro_desc = $row_pro['product_desc'];
                  
                           echo "   
                         
                           <div class='card' style='width: 12rem;'>
                           <img class='card-img-top' src='admin/product_images/$pro_image' alt='Card image cap'>
                           <div class='card-body item'>
                               <h5 class='card-title'>$pro_title</h5>
                               <p class='card-text'><b>₹ $pro_price </b></p>
                               <a href='details.php?pro_id=$pro_id'>Details</a><br>
                               <a href='index.php?add_cart=$pro_id'>
                                   <button class='btn btn-primary'>Add to Cart</button>
                               </a>
                           </div>
                           </div>
                          ";
                      }
            }
        
         ?>


        <?php get_pro_by_cat_id(); ?>


        <?php get_pro_by_brand_id(); ?>

        </div>
        </div>
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