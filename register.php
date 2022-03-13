<?php
    include('includes/header.php');
?>

<script>
 $(document).ready(function(){
  
  $("#password_confirm2").on('keyup',function(){   
   
   var password_confirm1 = $("#password_confirm1").val();
   
   var password_confirm2 = $("#password_confirm2").val();
   
   //alert(password_confirm2);
   
   if(password_confirm1 == password_confirm2){
   
    $("#status_for_confirm_password").html('<strong style="color:green">Password match</strong>');
   
   }else{
    $("#status_for_confirm_password").html('<strong style="color:red">Password do not match</strong>');
   
   }
   
  });
  
 });
</script>

<!-- Main content -->

<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
        <div class="card">
  <div class="card-body">
                        <h3 class=" d-flex justify-content-center align-items-center">Registration</h3>
<hr>
<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
    <label for="exampleFormControlInput5">Image</label>
        <input type="file" name="image"  class="form-control " />
    </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Country</label>
            <?php include('includes/country_list.php'); ?>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput2">City</label>
        <input type="text" name="city"  class="form-control "  />
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput2">Contact</label>
        <input type="text" name="contact"  class="form-control "  />
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput2">Address</label>
        <input type="text" name="address"  class="form-control "  />
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" name="name"  class="form-control" required  />
    </div>  

    <div class="form-group">
        <label for="exampleFormControlInput2">Email</label>
        <input type="text" name="email"  class="form-control " required  />
    </div>

    <div class="form-group">
    <label for="exampleFormControlInput3">Password</label>
        <input type="password" name="password" id="password_confirm1" class="form-control " required />
    </div>

    <div class="form-group">
    <label for="exampleFormControlInput4">Confirm Password</label>
        <input type="password" name="confirm_password" id="password_confirm2" class="form-control " required />
        
    </div>

    <div class="form-group">
    <label id="status_for_confirm_password"></label>
    </div>

    <div class="form-group">
    <div class="col-16">
    <input type="submit" name="register" value="Register" class="btn btn-success">
    </div>  

    <div>
        <p class="mt-2">Already have account? <a href="index.php?action=login" class="fw-bold">Login Now</a></p>
    </div>


 

</form>

</div>
</div>

</div>
</div>
</div>



<!-- Main content -->

<?php 
if(isset($_POST['register'])){  
  
  if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name'])){
   $ip = get_ip();
   $name = $_POST['name'];
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
   $hash_password = md5($password);
   $confirm_password = trim($_POST['confirm_password']);
   
   $image = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];
   $country = $_POST['country'];
   $city = $_POST['city'];
   $contact = $_POST['contact'];
   $address = $_POST['address'];
   
   $check_exist = mysqli_query($con,"select * from users where email = '$email'");
   
   $email_count = mysqli_num_rows($check_exist);
   
   $row_register = mysqli_fetch_array($check_exist);
   
   if($email_count > 0){
   echo "<script>alert('Sorry, your email $email address already exist in our database !')</script>";
   
   }elseif($row_register['email'] !=$email && $password == $confirm_password ){
   
    move_uploaded_file($image_tmp,"customer/customer_images/$image");
	
    $run_insert = mysqli_query($con,"insert into users (ip_address,name,email,password,country,city,contact,user_address,image) values ('$ip','$name','$email','$hash_password','$country','$city','$contact','$address','$image') ");
    
	if($run_insert){
	$sel_user = mysqli_query($con,"select * from users where email='$email' ");
	$row_user = mysqli_fetch_array($sel_user);
	
	$_SESSION['user_id'] = $row_user['id'] ."<br>";
	$_SESSION['role'] = $row_user['role'];	
	}
	
	$run_cart = mysqli_query($con,"select * from cart where ip_address='$ip'");
	
	$check_cart = mysqli_num_rows($run_cart);
	
	if($check_cart == 0){
	
	$_SESSION['email'] = $email;
	
	echo "<script>alert('Account has been created successfully!')</script>";
	
	echo "<script>window.open('my_account.php','_self')</script>";
	
	}else{
	
	$_SESSION['email'] = $email;
	
	echo "<script>alert('Account has been created successfully!')</script>";
	
	echo "<script>window.open('checkout.php','_self')</script>";
	
	}
	
   }
   
  }
  
}

?>







<!-- Footer -->
<?php
    //include footer.php file
    include('includes/footer.php');
?>

<!-- Footer -->