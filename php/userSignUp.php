<?php
require_once('db/dbConnection.php');
$email      = strtolower($_POST['email']);
$firstname  = strtoupper($_POST['firstname']);
$lastname   = strtoupper($_POST['lastname']);
$password   = $_POST['password'];
if (isset($email) && isset($password)) {
$hash=password_hash($password, PASSWORD_DEFAULT);
$createdon  = date(DATE_RSS);
$username   = strtolower($firstname);
$query="SELECT count(username) AS count FROM user where username like '%$username%'";
$result=mysqli_query($conn, $query) or die('ERROR:'.mysqli_error($conn));
$totalusers=mysqli_fetch_assoc($result);
$username =$username.$totalusers['count'];
$query="INSERT INTO user (username,email,firstname,lastname,password,createdon) values ('$username','$email','$firstname','$lastname','$hash','$createdon')";
mysqli_query($conn, $query) or die('ERROR:'.mysqli_error($conn));
echo 'SUCCESS';
}
else {
  echo "ERROR";
}
?>
