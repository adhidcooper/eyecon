<?php 
$con = mysqli_connect("localhost", "root", "", "galaxy_database");

if(mysqli_connect_errno()){
    echo "The Connection was not established: " . mysqli_connect_errno();
}

function cart() {

    global $con;

    if(isset($_GET['add_cart'])) {
             
        $product_id = $_GET['add_cart'];

        $ip = get_ip();

        $run_check_pro = mysqli_query($con, "select * from cart where product_id='$product_id' ");

        if(mysqli_num_rows($run_check_pro) > 0) {
            echo "";
        }else {

            $fetch_pro = mysqli_query($con, "select * from products where product_id='$product_id' ");

            $fetch_pro = mysqli_fetch_array($fetch_pro);

            $pro_title = $fetch_pro['product_title'];

            $run_insert_pro = mysqli_query($con, "insert into cart (product_id, product_title, ip_address) values ('$product_id','$pro_title','$ip')" );
        
           
        }
    }


}


function total_price() {

    global $con;

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

                $run_qty = mysqli_query($con, "select * from cart where product_id = '$product_id' ");

                $row_qty = mysqli_fetch_array($run_qty);

                $qty = $row_qty['quality'];

                $values_qty = $values * $qty;


         $total += $values_qty;
 
        }
    }
 
    echo "₹".$total;
 

}


function total_items() {

    global $con;

    $ip = get_ip();
                                              
    $run_items = mysqli_query($con,"select * from cart where ip_address='$ip' ");

    echo $count_items = mysqli_num_rows($run_items);
                                          
}

function get_ip() {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}




function getCats() {

    global $con;

    $get_cats ="select * from categories";


    $run_cats = mysqli_query($con , $get_cats);

    while ($row_cats=mysqli_fetch_array($run_cats)) {
        $cat_id = $row_cats['cat_id'];

        $cat_title = $row_cats['cat_title'];

        echo "<li> <a href='index.php?cat=$cat_id' class='nav-link text-white'> <span class='ms-2'> $cat_title </span> </a> </li>";
    }
}

function getBrands() {
    
    global $con;

    $get_brands = "select * from brands";

    $run_brands = mysqli_query($con, $get_brands);

    while ($row_brands = mysqli_fetch_array($run_brands)) {
        $brand_id = $row_brands['brand_id'];

        $brand_title = $row_brands['brand_title'];

        echo "<li> <a href='index.php?brand=$brand_id' class='nav-link text-white'> <span class='ms-2'> $brand_title </span> </a> </li>";
    }
}


function getPro() {
    global $con;

    if(!isset($_GET['cat'])) {
        if(!isset($_GET['brand'])){

           

    $get_pro = " select * from products order by RAND() LIMIT 0,6";

    $run_pro = mysqli_query($con, $get_pro);
    
    while ($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];

         echo " 
                <div class='card ' style='width: 12rem;'>
                <img class='card-img-top' src='admin/product_images/$pro_image' alt='Card image cap'>
                <div class='card-body item'>
                    <h5 class='card-title'>$pro_title</h5>
                    <p class='card-text'><b>₹ $pro_price </b></p>
                    <a href='details.php?pro_id=$pro_id'>Details</a><br>
                    <a href='index.php?add_cart=$pro_id'>
                        <button class='class='btn btn-primary'>Add to Cart</button>
                    </a>
                </div>
                </div>
            "; 
    }

}
}
    
}

function get_pro_by_cat_id() {
    global $con;
    
if(isset($_GET['cat'])){
    $cat_id = $_GET['cat'];
    
    $get_cat_pro = "select * from products where product_cat='$cat_id' ";
    
    $run_cat_pro = mysqli_query($con, $get_cat_pro);
    
    $count_cats = mysqli_num_rows($run_cat_pro);
    
      if($count_cats == 0){
        echo "No products in this category";
 
      }else {
        echo "On sale";
      }
      
      while($row_cat_pro = mysqli_fetch_array($run_cat_pro)){
         $pro_id = $row_cat_pro['product_id'];
         
         $pro_cat = $row_cat_pro['product_cat'];
         
         $pro_brand = $row_cat_pro['product_brand'];
         $pro_title = $row_cat_pro['product_title'];
         $pro_price = $row_cat_pro['product_price'];
         $pro_image = $row_cat_pro['product_image'];
         
            echo "
            <div class='card ' style='width: 12rem;'>
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

}

function get_pro_by_brand_id() {
    global $con ;

    if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
        
        $get_brand_pro = "select * from products where product_brand='$brand_id' ";
        
        $run_brand_pro = mysqli_query($con, $get_brand_pro);
        
        $count_brands = mysqli_num_rows($run_brand_pro);
        
          if($count_brands == 0){
            echo "No products in this brand";
     
          }else {
            echo "On sale";
          }
          
          while($row_brand_pro = mysqli_fetch_array($run_brand_pro)){
             $pro_id = $row_brand_pro['product_id'];
             
             $pro_cat = $row_brand_pro['product_cat'];
             
             $pro_brand = $row_brand_pro['product_brand'];
             $pro_title = $row_brand_pro['product_title'];
             $pro_price = $row_brand_pro['product_price'];
             $pro_image = $row_brand_pro['product_image'];
             
                echo "
                <div class='card ' style='width: 12rem;'>
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
    
}
?>