<?php
$toEmail=$_POST['email'];
$toName=$toEmail;
$code=rand (111111,999999);
session_start();
$_SESSION['code']=$code;
$_SESSION['email']=$toEmail;
$body="<html><body style='background-color:d2d6de;width: 360px; margin: 7% auto;font-family: Source Sans Pro,Helvetica Neue,Helvetica,Arial,sans-serif;font-weight: 400;font-size: 14px;line-height: 1.42857143;color: #333;'><div class='login-box'><div align='center' style='padding:5%;'><a href='#' style='text-decoration:none;'><h3><b><span ><font color='black' >PHP API</b>{ }</font></span></h3></a></div><div style='background-color:#fff;padding:3%;'><div align='left'>Dear User,</div><br><div align='justify'>You have recently requested to reset your PHP API{ } account password. Your OTP is <b><i>".$code."</i></b>.<br>If you not requested reset, don't worry your account is safe.<br><br><br>Regards,<br>PHP API{ }</div><br></div></div></body></html>";
$subject='Verification code';
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
echo "FALSE";
} else {
echo "TRUE";
}

?>
