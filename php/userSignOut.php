<?php
session_start();
unset($_SESSION['username']);
require_once('db/dbConnection.php'); 
$sessionkey  = $_POST['sessionkey'];
$query       = "DELETE FROM session WHERE sessionkey='".$sessionkey."'";
$result = mysqli_query($conn, $query) or die('ERROR');
?>