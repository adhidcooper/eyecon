<?php 
$con = mysqli_connect("localhost", "root", "", "galaxy_database");

if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" .mysqli_connect_error();  
}/*else {
  echo  "MySQL has sucessfully connected";
}*/

?>