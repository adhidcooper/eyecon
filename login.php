
<section>
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="login-box col-12 col-md-8  col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-4 text-center">
            
            <div class=" mt-md-4 ">
            <form method = "post" action="">
              <h2 class="fw-bold mb-5 text-uppercase">Login</h2>

              <div class="form-outline form-white mb-4">
                <input type="text" name="email" placeholder="Email" id="typeEmailX" class="form-control form-control-lg" required  />
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="password" placeholder="Password" id="typePasswordX" class="form-control form-control-lg" required />
              </div>

              <p class="small pb-lg-2"><a class="text-white-50" href="checkout.php?forgot_pass">Forgot password?</a></p>

              <input name="login" class="btn btn-outline-danger btn-lg px-5 pb-2" type="submit" value ="Login">

            </div>

            <div>
              <p class="mt-2">Don't have an account? <a href="register.php" class="text-white-50 fw-bold">Register Here</a></p>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 

if(isset($_POST['login'])){
  
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $password = md5($password);
  
  $run_login = mysqli_query($con, "select * from users where password='$password' AND email='$email' " );
  
  $check_login = mysqli_num_rows($run_login);
  
  $row_login = mysqli_fetch_array($run_login);
  
  if($check_login == 0){
   echo "<script>alert('Password or email is incorrect, please try again!')</script>";
   exit();
  }
  $ip = get_ip();
  
  $run_cart = mysqli_query($con, "select * from cart where ip_address='$ip'");
  
  $check_cart = mysqli_num_rows($run_cart);
  
  if($check_login > 0 AND $check_cart==0){
  
  $_SESSION['user_id'] = $row_login['id'];
  
  $_SESSION['role'] = $row_login['role'];
  
  $_SESSION['email'] = $email;
  echo "<script>alert('You have logged in successfully !')</script>";
  echo "<script>window.open('my_account.php','_self')</script>";
  
  }else{
  $_SESSION['user_id'] = $row_login['id'];
  
  $_SESSION['role'] = $row_login['role'];
  
  $_SESSION['email'] = $email;
  echo "<script>alert('You have logged in successfully !')</script>";
  echo "<script>window.open('checkout.php','_self')</script>";
  }
  
}

?>
