<?php
require_once('db/dbConnection.php');
$toEmail=$_POST['email'];
$toName=$_POST['name'];
$i=10;
$strength=true;
$bytes1 = openssl_random_pseudo_bytes($i,$strength);
$bytes2 = openssl_random_pseudo_bytes($i,$strength);
$key=bin2hex($bytes1)."_GAP_".bin2hex($bytes2);
$query="INSERT INTO signup_process(email,hashkey) values ('$toEmail','$key')";
mysqli_query($conn, $query) or die('ERROR'.mysqli_error($conn));
$body='Hi '.$toName.',<br>     Please click on the following link to confirm your email address <a href="http://localhost/Freelancer/IRO%20New/confirm/'.$key.'">http://localhost/Freelancer/IRO%20New/confirm/'.$key.'</a>';
$subject='Verify Your Email';
include ('emailConfig.php');
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = $hostName;
$mail->Port = $portNumber;
$mail->SMTPAuth = true;
$mail->Username = $formEmail;
$mail->Password = $passWord;
$mail->setFrom( $formEmail, $userName);
$mail->addReplyTo( $formEmail, $userName);
$mail->addAddress($toEmail, $toName);
$mail->Subject = $subject;
$mail->msgHTML($body);
$mail->AltBody = 'Please enable HTML to view this email';
if (!$mail->send()) {
echo "fail";
} else {
echo "success";
}

?>
