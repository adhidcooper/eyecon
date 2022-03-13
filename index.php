<?php

    include('includes/header.php');

?>

<div class="content_wrapper row">
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
<!-- Side Bar -->
  

<!-- Main content -->
<div class="col-9" >

<div id="content_area" >
<?php  if(!isset($_GET['action'])){ ?>


    
    <div style="margin-top:150px;"></div>
    <?php cart(); ?>

    <div id="products_box" >
    <div class="owl-carousel owl-theme ">
     
        <?php getPro() ; ?>

        <?php get_pro_by_cat_id(); ?>

        <?php get_pro_by_brand_id(); ?>
        <?php }else{ ?>
       
      </div>
      
      <?php include('login.php'); } ?>
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