<?php
$password=$_POST['password'];
session_start();
if(!(isset($_SESSION['email']) && isset($_SESSION['code'])))
{
   echo "FALSE";
}
else if ($_SESSION['code']==200) {
  require_once('db/dbConnection.php');
  $hash=password_hash($password, PASSWORD_DEFAULT);
  $query= "UPDATE user SET password='".$hash."' WHERE  email= '".$_SESSION['email']."'";
  mysqli_query($conn, $query) or die('ERROR'.mysqli_error($conn));
  echo "TRUE";
}
else {
  echo "FALSE";
}
 ?>
