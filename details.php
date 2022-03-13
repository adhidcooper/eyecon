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
    

        <?php

        if(isset($_GET['pro_id'])){
            $product_id = $_GET['pro_id'];
            
            $run_query_by_pro_id = mysqli_query($con, "select * from products where product_id='$product_id' ");
            
                 
		  while($row_pro = mysqli_fetch_array($run_query_by_pro_id)) {
		  
            $pro_id = $row_pro['product_id'];
            $pro_cat = $row_pro['product_cat'];
            $pro_brand = $row_pro['product_brand'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_image = $row_pro['product_image'];	
            $pro_desc = $row_pro['product_desc'];
            
                     echo " <div class='row'>
                     <div class='col-4'>
                      <div class='card mt-5' style='width: 20rem;'>
                            <img class='card-img-top' src='admin/product_images/$pro_image' alt='Card image cap'>
                            <div class='card-body'>
                                
                                <p class='card-text'><b>₹ $pro_price </b></p>
                                <a href='index.php?add_cart=$pro_id>
                                    <button class='class='btn btn-primary'>Add to Cart</button>
                                </a>
                            </div>
                            </div>
                            </div> 

                            <div class='col-5 mt-5'>
                            <h1 class='card-title'>$pro_title</h1>
                            <hr>
                            <h5>Description:<h5>
                            <br>
                                <p class='card-text'>$pro_desc</p>
                                <hr>
                                <div class='rating text-warning font-size-12'>
                                
                            <span><i class='fas fa-star'></i></span>
                            <span><i class='fas fa-star'></i></span>
                            <span><i class='fas fa-star'></i></span>
                            <span><i class='fas fa-star'></i></span>
                            <span><i class='far fa-star'></i></span>
                                 </div>
                                 <hr>
                                 <div id='policy'>
                                 <div class='d-flex'>
                                     <div class='return text-center mr-5'>
                                         <div class=' my-2 color-second'>
                                             <span class='fas fa-retweet border p-3 rounded-pill'></span>
                                         </div>
                                         <a href='#'>10 Days <br>Replacement</a>
                                     </div>
                                     <div class='return text-center mr-5'>
                                         <div class='font-size-20 my-2 color-second'>
                                             <span class='fas fa-truck border p-3 rounded-pill'></span>
                                         </div>
                                         <a href='#' class='font-rale font-size-12'>Daily Tution <br>Delivered</a>
                                     </div>
                                     <div class='return text-center mr-5'>
                                         <div class='font-size-20 my-2 color-second'>
                                             <span class='fas fa-check-double border p-3 rounded-pill'></span>
                                         </div>
                                         <a href='#'>1 Year <br>Warrenty</a>
                                     </div>
                                 </div>
                             </div>
                         <!-- # Policy -->
                         <hr>
         
                         <!-- Order Detail -->
                             <div id='order-details' class='font-rale d-flex flex-column text-dark'>
                                 <small>Delivery by : Mar 29 - Apr 1</small>
                                 <small><a href='#'>Daily Electronics</a>&nbsp;(4.5 out of 5| 18,198 ratings)</small>
                                 <small><i class='fas fa-map-marker-alt color-primary'></i>&nbsp;&nbsp;Delivery to Customer - 424201</small>
                             </div>
                         <!-- /Order Detail -->

                            </div>
                            
                            </div>
                            "; 
                }
            }
        ?>
       
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