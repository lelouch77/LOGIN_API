<?php
require_once('db/dbConnection.php');
$key=$_GET['key'];
$query     = "SELECT email FROM keytable WHERE hashkey= '$key'";
$result = mysqli_query($conn, $query) or die('ERROR'.mysqli_error($conn));
$totalRows = mysqli_num_rows($result);
if( $totalRows != 0 )
	{
     $response=mysqli_fetch_assoc($result);
	   $email=$response['email'];
	   $query       = "UPDATE user SET verified=1 WHERE  email= '".$email."'";
     mysqli_query($conn, $query) or die('ERROR'.mysqli_error($conn));
	   $query       = "DELETE FROM keytable WHERE  email= '".$email."'";
     mysqli_query($conn, $query) or die('ERROR'.mysqli_error($conn));
	   echo 'SUCCESS';
	}
	else {
		echo "FALSE";
	}
?>
