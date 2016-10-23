<?php
require_once('db/dbConnection.php'); 
$time=date(DATE_RSS);
$sessionkey  = $_POST['sessionkey'];
$query       = "UPDATE session SET lastlogin='$time' WHERE  sessionkey= '".$sessionkey."'";
mysqli_query($conn, $query) or die('ERROR'.mysqli_error($conn));
echo 'SUCCESS';  
?>