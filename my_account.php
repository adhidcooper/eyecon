<?php

    include('includes/header.php');

?>
<div class="row">
   
<?php if(isset($_SESSION['user_id'])){ ?>

    <div class="container col-3">
<?php 
  if(isset($_GET['action'])){
    $action = $_GET['action'];
  }else{
    $action = '';
}

switch($action){
  
    case "edit_account";
    include('users/edit_account.php');
    break;
    
    case "edit_profile";
    include('users/edit_profile.php');
    break;
    
    case "user_profile_picture";
    include('users/user_profile_picture.php');
    break;
    
    case "change_password";
    include('users/change_password.php');
    break;
    
    case "delete_account";
    include('users/delete_account.php');
    break;  
    
    default;
    echo "<div class='mt-5'><!-- <h1>something<h1> --> <div>";
    break;
    }
    
    /*if($_GET['action'] == 'edit_account'){
    echo $action;
    }*/
    
    ?>
    </div>
    <div class=" container col-3 ">

<div class="customer-nav  mb-5 mt-5 mr-5">
        
   
<?php 
  $run_image = mysqli_query($con,"select * from users where id='$_SESSION[user_id]'");
  
  $row_image = mysqli_fetch_array($run_image);
  
  if($row_image['image'] !=''){  
?>  
        <div class="card"style=" width: 25rem">

        <img class="card-img-top profile-img" src="customer/customer_images/<?php echo $row_image['image']; ?>" width="80px" alt="Card image cap">  
<?php }else{ ?>
        <img class="card-img-top profile-img" src="admin/images/img1.1.jpeg" width="128px" alt="Card image cap">
<?php } ?>
            <div class="card-body">

                <ul class="list-group">
                    <li class="list-group-item"><a href="my_account.php?action=my_order">My Order</a></li>
                    <li class="list-group-item"><a href="my_account.php?action=edit_account">Edit Account</a></li>
                    <li class="list-group-item"><a href="my_account.php?action=edit_profile">Edit Profile</a></li>
                    <li class="list-group-item"><a href="my_account.php?action=user_profile_picture">User Profile Picture</a></li>
                    <li class="list-group-item"><a href="my_account.php?action=change_password">Change Password</a></li>
                    <li class="list-group-item"><a href="my_account.php?action=delete_account">Delete Account</a></li>
                    <li class="list-group-item"><a href="logout.php">Logout</a></li>
                </ul>
  </div>
</div>
    </div>

<div>
<div>

      

<?php }else{ ?>
  
  <div class ="container py-5 pt-5">

  <h1 class="text-center pt-5 pb-2">Account Setting Page</h1>
  
  <a href="index.php?action=login"><b>Log In</a>&nbsp to Your Account!</b>
  <div class="pb-3 pt-5">
  
  </div>
  </div>
  <?php } ?>

<?php
    //include footer.php file
    include('includes/footer.php');
?>

