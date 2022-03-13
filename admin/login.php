<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/desktop.css" type="text/css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!-- Bootstrap CDN -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="js/jquery-3.4.1.js"></script>
    <title>Lens Galaxy Admin Login Page</title>
</head>
<body>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            
          <form action="" method="post" enctype="multipart/form-data">

            <h3 class="mb-5">Login Admin Page</h3>

            <div class="form-outline mb-4">
              <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Email" />
              
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg"  placeholder="Password"/>
              
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
              />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>

            </form>

           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>


<?php 

 include('includes/db.php');

 if(isset($_POST['login'])){
 
 $email = trim(mysqli_real_escape_string($con,$_POST['email']));
 
 $password = trim(mysqli_real_escape_string($con,$_POST['password']));
 
 $hash_password = md5($password);
 
 $sel_user = "select * from users where email ='$email' AND password='$hash_password' ";
 
 $run_user = mysqli_query($con, $sel_user) or die ("error: " . mysqli_error($con));
 
 $check_user = mysqli_num_rows($run_user);
 
 if($check_user > 0){
 
 $db_row = mysqli_fetch_array($run_user);
 
 $_SESSION['email'] = $db_row['email']; 
 $_SESSION['name'] = $db_row['name'];
 $_SESSION['user_id'] = $db_row['id'];
 $_SESSION['role'] = $db_row['role'];
 
 if($db_row['role'] =='admin'){
 
 echo "<script>window.open('index.php?logged_in=You have successfully Logged In!','_self')</script>";
 
 }elseif($db_row['role'] =='guest'){
 echo "<script>alert('Password or Email is wrong, your are guest not admin!')</script>";
 
 }
 
 }else{
 echo "<script>alert('Password or Email is wrong, try again!')</script>";
 
 }
 
 }
?>



