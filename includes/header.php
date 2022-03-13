<?php
    session_start();

    include("functions/functions.php");

    include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EyeCons</title>

      <!-- Bootstrap CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

      <!-- Owl-carousel CDN -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />
  
      <!-- font awesome icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  
      <!-- Custom CSS file -->
      <link rel="stylesheet" href="styles/style.css">

      <!-- Custom 2 CSS file -->
      <link rel="stylesheet" href="styles/style2.css">
      <!-- JQuery -->
      <script src="js/jquery-3.4.1.js"></script>

      <!-- Custom Javascript -->
      <script src="js/index.js"></script>

</head>
<body>
    
<!-- Start #header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale font-size-16 text-black-50 m-0">DSCASC</p>

<?php if(!isset($_SESSION['user_id'])) { ?>

        <div class="font-rale font-size-14">
            <a href="index.php?action=login" class="px-3 border-right border-left text-dark">Login</a>
            <a href="register.php" class="px-3 border-right border-left text-dark">Register now</a>
        </div>
        

        <?php }else{ ?>
  
  <?php 
      $select_user = mysqli_query($con,"select * from users where id='$_SESSION[user_id] '");
      $data_user = mysqli_fetch_array($select_user);
  ?>
  
  <div id="profile">
    
	<ul>
	  <li class="dropdown_header">
	   <a>
	   
        <?php if($data_user['image'] !='') { ?>
        
        <span><img style="width:25px; height:25px; border-radius:50%" src="customer/customer_images/<?php echo $data_user['image']; ?>"></span> 
        
        <?php }else{ ?>
        
        <span><img style="width:25px; height:25px; border-radius:50%" src="images/profile-icon.png"></span>
        
        <?php } ?>
	   
	   </a>
	   
	   <ul class="dropdown_menu_header">
	      <li><a href="my_account.php?action=edit_account">Account Settings</a></li>
		    <li><a href="logout.php">Logout</a></li>
	   </ul>
	   
	  </li>
	</ul>
  </div>
  
  <?php } ?>

    </div>

                <!-- Primary navigation Nav Bar -->
                <nav class="navbar navbar-expand-lg navbar-dark" style="background:crimson;">
                    <div class="container-fluid">
                      <a class="navbar-brand" href="index.php" style="font-weight: bold;">EYECONS</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-5">
                        <li class="nav-item">
                        <div id="form">
                         <form method="get" action="results.php" enctype="multipart/form-data" class="d-flex">
                          <input class="form-control me-2" type="text" name="user_query"  placeholder="Search a Product" aria-label="Search">
                          <button class="btn btn-success" type="submit"  name="search" value="Search">Search</button>
	                      </form>
                        </div>
                        </li>
                       </ul>
                        <ul class="navbar-nav  m-auto">
                          <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="all_products.php">All Product</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="my_account.php">My Account</a>
                          </li>
           
                          <li class="nav-item">
                            <a class="nav-link" href="cart.php">Shopping Cart</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                          </li>
                          
                         
                
                        </ul>
                        <form action="#" class="font-size-14 font-rale">
                            <a href="cart.php" class="py-2 rounded-pill bg-dark">
                                <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                                <span class="px-3 py-2 rounded-pill text-dark bg-light">
                                 <?php total_items(); ?> 
                                </span>
                            </a>
                        </form>
                      </div>
                    </div>
                  </nav>
                <!-- /Nav Bar -->

                <?php include('js/drop_down_menu.php'); ?>
  

                
  
</header>
<!--/End #header -->




<!-- Start #main-site -->
<main id="main-site">