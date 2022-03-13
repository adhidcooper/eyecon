




    


<?php 

$select_user = mysqli_query($con,"select * from users where id='$_SESSION[user_id]' ");

$fetch_user = mysqli_fetch_array($select_user);
?>
	
<div class="register_box container ml-5 mt-5">
  <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
    <div class="card ">
      <div class="card-body">
  <form method = "post" action="" enctype="multipart/form-data">
    
	<table align="left" width="70%">
	
	  <tr align="left">	   
	   <td colspan="4">
	   <h2>User Profile Picture.</h2><br />
     <hr>
	   
	   </td>	   
	  </tr>	  
	  
	  <tr>
	   <td width="15%"><b>Image:</b></td>
	   <td colspan="3">
       <input type="file" name="image" />
       <div>
       <img src="customer/customer_images/<?php echo $fetch_user['image']; ?>" width="100" />
       </div>
       </td>
	  </tr>	  
	  
	  <tr align="left">
	   <td></td>
	   <td colspan="4">
	   <input type="submit" class="btn btn-primary" name="user_profile_picture" value="Save" />
	   </td>
	  </tr>
	
	</table>
	
	
  </form>
  </div>
  </div>
  </div>

</div>

<?php 
if(isset($_POST['user_profile_picture'])){   
 
 // Check if file not empty 
 if(!empty($_FILES['image']['name'])){
 
   $image = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];   
   $target_file = "customer/customer_images/" . $image;   
   $uploadOk = 1;
   $message = '';  
   
   
   // Check if the file size more than 5 MB.
   if($_FILES["image"]["size"] < 5098888){
  
   // Check if file already exists
   if(file_exists($target_file)){
   
    $uploadOk = 0;
	$message .=" Sorry, file already exists. ";
	
   }if($uploadOk == 0){ // Check if uploadOk is set to 0 by an error
   
    $message .="Sorry, your file was not uploaded . ";
	
   }else{
    if(move_uploaded_file($image_tmp, $target_file)){
	
	$update_image = mysqli_query($con,"update users set image='$image' where id='$_SESSION[user_id]'");
	
	$message .= "The file" . basename($image) . " has been uploaded. ";
	}else{
	 $message .= "Sorry, there was an error uploading your file. ";
	}
   }
   
   }// End if the file size more than 5 MB.
   else{
    $message .= "File size max 5 MB. ";
   }
   
   }
  
}

?>

<p style="color:green;margin-left:15px">
<?php if(isset($message)){echo $message;} ?>
</p>





  
