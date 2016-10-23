<?php
require_once('db/dbConnection.php'); 
$sessionkey  = $_POST['sessionkey'];
$query       = "SELECT username FROM session WHERE  sessionkey= '".$sessionkey."'";
$result = mysqli_query($conn, $query) or die('ERROR');
$totalRows = mysqli_num_rows($result);
if( $totalRows != 0 )
	{    
        $response=mysqli_fetch_assoc($result);
		session_start();
		$_SESSION['username']=$response['username'];
		$returnMsg=getUserDetail($response['username'],$conn);
		$returnMsg['sessionkey']=$sessionkey;
		echo json_encode($returnMsg);
	}
else 
	{
		echo "FALSE";
	}
function getUserDetail($username,$conn)
{
	$query="SELECT firstname,lastname,email FROM user WHERE username='$username'";
    $result=mysqli_query($conn, $query)or die('ERROR');
	$response=mysqli_fetch_assoc($result);
	return $response;
}

?>