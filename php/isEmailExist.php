<?php
require_once('db/dbConnection.php');
$email     = strtolower($_POST['email']); 
$query     = "SELECT * FROM user WHERE  email = '".$email."'";
$result = mysqli_query($conn, $query) or die('ERROR:'.mysqli_error($conn));
$totalRows = mysqli_num_rows($result);
if( $totalRows != 0 )
{    
    echo "TRUE";
} else {
    echo "FALSE";
}
?>