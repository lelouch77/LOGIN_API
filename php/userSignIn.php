<?php
require_once('db/dbConnection.php');
$email     = strtolower($_POST['email']);
$password  = $_POST['password'];
$sessionrequired  = $_POST['needsession'];
$query     = "SELECT username,firstname,lastname,email,password,verified FROM user WHERE  email = '".$email."'";
$result = mysqli_query($conn, $query) or die('ERROR'.mysqli_error($conn));
$totalRows = mysqli_num_rows($result);
if( $totalRows != 0 )
	{
    $response=mysqli_fetch_assoc($result);
		if(password_verify($password,$response['password']))
		{
				$response['sessionkey']='GAP';
				if($sessionrequired=='TRUE')
				{
			    $response['sessionkey']= createSession($response['username'],$conn);
				}
				session_start();
				$_SESSION['username']=$response['username'];
				unset($response['username']);
				echo json_encode($response);
			}
			else {
				echo "FALSE";
			}
	}
else
	{
		echo "NOTEXIST";
	}

function createSession($email,$conn)
{
	$i=10;
	$strength=true;
	$bytes1 = openssl_random_pseudo_bytes($i,$strength);
	$bytes2 = openssl_random_pseudo_bytes($i,$strength);
	$sessionkey=bin2hex($bytes1)."_GAP_".bin2hex($bytes2);
	$time=date(DATE_RSS);
	$query="INSERT INTO session (sessionkey,username,createdon,lastlogin) values ('$sessionkey','$email','$time','$time')";
    mysqli_query($conn, $query)or die('ERROR'.mysqli_error($conn)."  ".$sessionkey);
	return $sessionkey;
}
?>
